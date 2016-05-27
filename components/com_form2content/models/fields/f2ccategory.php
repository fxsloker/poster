<?php
defined('JPATH_BASE') or die;

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'form2content.php');

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldF2cCategory extends JFormFieldList
{
	public $type = 'F2cCategory';

	protected function getOptions()
	{
		// Initialise variables.
		$options		= array();
		$extension		= $this->element['extension'] ? (string) $this->element['extension'] : (string) $this->element['scope'];
		$published		= (string)$this->element['published'];
		$rootCategoryId	= $this->element['rootCategoryId'];
		$behaviour		= $this->element['behaviour'];
		$config			= null;
		
		// Load the category options for a given extension.
		if (!empty($extension)) 
		{
			// Filter over published state or not depending upon if it is present.
			if ($published) 
			{
				$config = array('filter.published' => explode(',', $published));
			}
			else 
			{
				$config = array('filter.published' => array(0,1));
			}

			$categories = Form2ContentHelper::getCategoryList($behaviour, $extension, $rootCategoryId, $config);
			
			if(count($categories))
			{
				foreach($categories as $category)
				{
					$options[] = JHtml::_('select.option', $category->id, $category->title);
				}
			}
			
			// Verify permissions.  If the action attribute is set, then we scan the options.
			if ($action	= (string) $this->element['action']) 
			{

				// Get the current user object.
				$user = JFactory::getUser();
			
				foreach($options as $i => $option)
				{
					// To take save or create in a category you need to have create rights for that category
					// unless the item is already in that category.
					// Unset the option if the user isn't authorised for it. In this field assets are always categories.
					if ($user->authorise('core.create', $extension.'.category.'.$option->value) != true ) 
					{
						unset($options[$i]);
					}
				}
				
			}

			if (isset($this->element['show_root'])) 
			{
				array_unshift($options, JHtml::_('select.option', '0', JText::_('JGLOBAL_ROOT')));
			}
		}
		else 
		{
			JError::raiseWarning(500, JText::_('JLIB_FORM_ERROR_FIELDS_CATEGORY_ERROR_EXTENSION_EMPTY'));
		}

		// Merge any additional options in the XML definition.
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}