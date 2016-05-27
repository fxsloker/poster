<?php
class Form2ContentHelperAdmin
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
		$canDo	= Form2ContentHelperAdmin::getActions();
		
		if ($canDo->get('core.admin'))
		{
			JHtmlSidebar::addEntry(JText::_('COM_FORM2CONTENT_CONTENTTYPE_MANAGER'), 
									'index.php?option=com_form2content&view=projects', $vName == 'projects');
		}
		
		JHtmlSidebar::addEntry(JText::_('COM_FORM2CONTENT_ARTICLE_MANAGER'), 
								'index.php?option=com_form2content&view=forms',	$vName == 'forms');

		if ($canDo->get('core.admin'))
		{
			JHtmlSidebar::addEntry(JText::_('COM_FORM2CONTENT_TEMPLATE_MANAGER'), 
									'index.php?option=com_form2content&view=templates',	$vName == 'templates');
		}
		
		JHtmlSidebar::addEntry(JText::_('COM_FORM2CONTENT_DOCUMENTATION'), 
								'index.php?option=com_form2content&view=documentation',	$vName == 'documentation');
		JHtmlSidebar::addEntry(JText::_('COM_FORM2CONTENT_ABOUT'), 
								'index.php?option=com_form2content&view=about', $vName == 'about');
	}
	
	public static function getActions($categoryId = 0, $formId = 0)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_form2content';

		if (empty($formId) && empty($categoryId)) 
		{
			$assetName = 'com_form2content';
		}
		else if (empty($categoryId)) 
		{
			$assetName = 'com_form2content.category.'.(int) $categoryId;
		}
		else 
		{
			$assetName = 'com_form2content.form.'.(int) $formId;
		}
		
		$actions = array(	'core.admin', 'core.manage', 'core.create', 
							'core.edit', 'core.edit.own', 
							'core.edit.state', 'form2content.edit.state.own',
							'form2content.trash', 'form2content.trash.own',
							'core.delete', 'form2content.delete.own');
		
		foreach ($actions as $action) 
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
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
