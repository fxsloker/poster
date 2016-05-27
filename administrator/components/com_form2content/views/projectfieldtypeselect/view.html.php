<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

jimport('joomla.application.component.view');

class Form2ContentViewProjectFieldTypeSelect extends JViewLegacy
{
	protected $fieldTypeList;	

	function display($tpl = null)
	{
		$this->addToolbar();

		$db 	= JFactory::getDbo();
		$query 	= $db->getQuery(true);
		
		$query->select('id, description')->from('#__f2c_fieldtype')->order('description');
		$db->setQuery($query);
		
		$this->fieldTypeList = $db->loadObjectList('id');		

		parent::display($tpl);				
	}
	
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_FORM2CONTENT_CONTENTTYPE_FIELDS_MANAGER').': '. JText::_('COM_FORM2CONTENT_SELECT_PROJECTFIELD'));
		JToolBarHelper::custom('projectfield.add','forward','forward',JText::_('COM_FORM2CONTENT_NEXT'), false);
		JToolBarHelper::cancel('projectfieldtypeselect.cancel', 'JTOOLBAR_CANCEL');	
		//JToolbarHelper::help('JHELP_CONTENT_ARTICLE_MANAGER', false, F2C_DOCUMENTATION_URL);
	}	
}

?>