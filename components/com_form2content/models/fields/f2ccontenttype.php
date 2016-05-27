<?php
defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldF2cContentType extends JFormFieldList
{
	public $type = 'F2cContentType';

	protected function getOptions()
	{
		// Initialise variables.
		$options		= array();
		$extension		= $this->element['extension'] ? (string) $this->element['extension'] : (string) $this->element['scope'];
		$published		= (int)$this->element['published'];
		$db				= JFactory::getDbo();
		$query			= $db->getQuery(true);
		
		$query->select('a.id, a.title');
		$query->from('#__f2c_project AS a');
		
		if($published)
		{
			$query->where('a.published = 1');
		}

		$query->order('a.title');
		$db->setQuery($query);
		$items = $db->loadObjectList();

		// Assemble the list options.
		foreach ($items as &$item) 
		{
			$options[] = JHtml::_('select.option', $item->id, $item->title);
		}

		/*
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
		*/
		
		return $options;
	}
}