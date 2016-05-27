<?php
defined('_JEXEC') or die('Restricted acccess');

class Form2ContentHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param	string	The name of the active view.
	 *
	 * @return	void
	 * @since	1.6
	 */
	public static function addSubmenu($vName)
	{
		$canDo	= Form2ContentHelper::getActions();
		
		if ($canDo->get('core.admin'))
		{
			JHtmlSidebar::addEntry(
				JText::_('COM_FORM2CONTENT_CONTENTTYPE_MANAGER'),
				'index.php?option=com_form2content&view=projects',
				$vName == 'banners'
			);
		}
		
		JHtmlSidebar::addEntry(
			JText::_('COM_FORM2CONTENT_ARTICLE_MANAGER'),
			'index.php?option=com_form2content&view=forms',
			$vName == 'banners'
		);

		if ($canDo->get('core.admin'))
		{
			JHtmlSidebar::addEntry(
				JText::_('COM_FORM2CONTENT_TEMPLATE_MANAGER'),
				'index.php?option=com_form2content&view=templates',
				$vName == 'banners'
			);
		}
		
		JHtmlSidebar::addEntry(
			JText::_('COM_FORM2CONTENT_DOCUMENTATION'),
			'index.php?option=com_form2content&view=documentation',
			$vName == 'banners'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_FORM2CONTENT_ABOUT'),
			'index.php?option=com_form2content&view=about',
			$vName == 'banners'
		);
	}
	
	public static function getActions($contentTypeId, $categoryId = 0, $formId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_form2content';

		if (empty($contentTypeId) && empty($formId) && empty($categoryId)) 
		{
			$assetName = 'com_form2content';
		}
		
		if(!empty($formId))
		{
			$assetName = 'com_form2content.form.'.(int) $formId;
		}
		else if(!empty($contentTypeId))
		{
			$assetName = 'com_form2content.project.'.(int) $contentTypeId;
		}
		else 
		{
			$assetName = 'com_form2content.category.'.(int) $categoryId;
		}
		
		$actions = array('core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete', 'form2content.delete.own', 'form2content.trash', 'form2content.trash.own');

		foreach ($actions as $action) 
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}

	/*
	 * Get a list of categories.
	 *
	 * @param	int		The option list behaviour: 0 = get all, 1 = get all below root element, 2 = get root only (fixed category)
	 * @param	string	The component to get the categories for
	 * @param	int		The id of the root category
	 * @param	array	Config parameters
	 *
	 * @return	array
	 * @since	3.0.0
	 */
	public static function getCategoryList($behaviour = 0, $extension = 'com_content', $rootCategoryId = null, $config = array('filter.published' => array(0,1)))
	{
		$config		= (array)$config;
		$db			= JFactory::getDbo();
		$query		= $db->getQuery(true);
		$options	= array();
		
		$query->select('a.id, a.title, a.level');
		$query->from('#__categories AS a');
		$query->where('a.parent_id > 0');

		// Filter on extension.
		$query->where('extension = '.$db->quote($extension));

		// Filter on the published state
		if (isset($config['filter.published'])) 
		{
			if (is_numeric($config['filter.published'])) 
			{
				$query->where('a.published = '.(int) $config['filter.published']);
			} 
			else if (is_array($config['filter.published'])) 
			{
				JArrayHelper::toInteger($config['filter.published']);
				$query->where('a.published IN ('.implode(',', $config['filter.published']).')');
			}
		}

		switch($behaviour)
		{
			case 0:
				// get all
				break;
			case 1:
				// only get categories below root
				$queryRootCategory = $db->getQuery(true);
				$queryRootCategory->select('a.lft, a.rgt');
				$queryRootCategory->from('#__categories AS a');
				$queryRootCategory->where('a.id = ' . (int)$rootCategoryId);
				
				$db->setQuery($queryRootCategory);
				$rootCategory = $db->loadObject();
				
				$query->where('a.lft > ' . (int)$rootCategory->lft);
				$query->where('a.rgt < ' . (int)$rootCategory->rgt);
				break;
			case 2:
				// only get root
				$query->where('a.id =  ' . (int)$rootCategoryId);
				break;				
		}

		$query->order('a.lft');
		$db->setQuery($query);
		$items = $db->loadObjectList();

		// Assemble the list options.
		if(count($items))
		{
			$rootLevel = $items[0]->level;

			foreach ($items as &$item) 
			{
				$repeat = ( $item->level - $rootLevel >= 0 ) ? $item->level - $rootLevel : 0;
				$item->title = str_repeat('- ', $repeat).$item->title;
			}
		}
		
		return $items;
	}

	/*
	 * Unify a datetime value
	 *
	 * @param	string	The date formatted according to the F2C format
	 *
	 * @return	string	The date formatted as MySQL date
	 * @since	3.1.2
	 */
	public static function filterUserUtcWithFormat($value)
	{
		if (intval($value) > 0) 
		{
			// Convert the date from the user format to a unified format
			if(!($date = F2cDateTimeHelper::ParseDate($value, F2cFactory::getConfig()->get('date_format'))))
			{
				JFactory::getApplication()->enqueueMessage(sprintf(JText::_('COM_FORM2CONTENT_ERROR_DATE_FIELD_INCORRECT_DATE_ENTERED'), F2cDateTimeHelper::getTranslatedDateFormat()), 'Warning');
				return '';				
			}
			
			// Get the user timezone setting defaulting to the server timezone setting.
			$offset	= JFactory::getUser()->getParam('timezone', JFactory::getConfig()->get('offset'));

			// Return a MySQL formatted datetime string in UTC.
			$dateWithOffset = new JDate($date->toSql(), $offset);
			
			$return = $dateWithOffset->toSql();
		}
		else 
		{
			$return = '';
		}

		return $return;
	}
	
	public static function CreateFeaturedButton($value = 0, $i, $canChange = true)
	{
		JHtml::_('bootstrap.tooltip');

		// Array of image, task, title, action
		$states	= array(
			0	=> array('star-empty',	'forms.featured',	'COM_FORM2CONTENT_UNFEATURED',	'COM_FORM2CONTENT_TOGGLE_TO_FEATURE'),
			1	=> array('star',		'forms.unfeatured',	'COM_FORM2CONTENT_FEATURED',		'COM_FORM2CONTENT_TOGGLE_TO_UNFEATURE'),
		);
		$state	= JArrayHelper::getValue($states, (int) $value, $states[1]);
		$icon	= $state[0];
		if ($canChange) {
			$html	= '<a href="#" onclick="return listItemTask(\'cb'.$i.'\',\''.$state[1].'\')" class="btn btn-micro hasTooltip' . ($value == 1 ? ' active' : '') . '" title="'.JText::_($state[3]).'"><i class="icon-'
					. $icon.'"></i></a>';
		}

		return $html;
		
	}
}
?>
