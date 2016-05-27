<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

jimport('joomla.application.component.view');

require_once(JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'shared.form2content.php');

class Form2ContentViewProjectField extends JViewLegacy
{
	protected $form;
	protected $item;	
	protected $state;
	protected $fieldTypeName;
	
	function display($tpl = null)
	{
		$this->form		= $this->get('Form');
		$this->item		= $this->get('Item');
		$this->state	= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			throw new Exception(implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		
		$db 	= JFactory::getDbo();
		$query 	= $db->getQuery(true);
		$query->select('name')->from('#__f2c_fieldtype')->where('id = '. $this->item->fieldtypeid);
		$db->setQuery($query);
		$this->fieldTypeName = $db->loadResult();
		
		parent::display($tpl);		
	}
	
	protected function addToolbar()
	{
		$contentType = F2cFactory::getContentType($this->item->projectid);

		$isNew = ($this->item->id == 0);
		$formTitle = JText::_('COM_FORM2CONTENT_CONTENTTYPE_FIELDS_MANAGER') . ' : ';
		$formTitle .= $isNew ? JText::_('COM_FORM2CONTENT_NEW') : JText::_('COM_FORM2CONTENT_EDIT') . ' ';
		$formTitle .= JText::_('COM_FORM2CONTENT_PROJECTFIELD') . ' - ' . $contentType->title;
		
		JToolBarHelper::title($formTitle);
		JToolBarHelper::save('projectfield.save', 'JTOOLBAR_SAVE');
		JToolBarHelper::apply('projectfield.apply', 'JTOOLBAR_APPLY');
		JToolBarHelper::save2new('projectfield.save2new');
		
		if ($isNew)  
		{
			JToolBarHelper::cancel('projectfield.cancel', 'JTOOLBAR_CANCEL');
		} 
		else 
		{
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel('projectfield.cancel', 'JTOOLBAR_CLOSE');
		}
		
		//JToolbarHelper::help('JHELP_CONTENT_ARTICLE_MANAGER', false, F2C_DOCUMENTATION_URL);
	}
}
?>