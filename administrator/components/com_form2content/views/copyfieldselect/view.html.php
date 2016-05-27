<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

jimport('joomla.application.component.view');

require_once(JPATH_ADMINISTRATOR.DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_form2content'.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'form.php');

class Form2ContentViewCopyFieldSelect extends JViewLegacy
{
	protected $contentTypeList;	

	function display($tpl = null)
	{
		$this->addToolbar();

		$doc = JFactory::getDocument();
		$doc->addStyleDeclaration('.icon-forward:before { content: ""; }');
		
		$model = new Form2ContentModelForm();
		$this->contentTypeList = $model->getContentTypeSelectList(false);		

		parent::display($tpl);				
	}
	
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_FORM2CONTENT_CONTENTTYPE_FIELDS_MANAGER').': '. JText::_('COM_FORM2CONTENT_COPY_FIELD'));
		JToolBarHelper::custom('projectfield.copy','forward','forward',JText::_('COM_FORM2CONTENT_NEXT'), false);
		JToolBarHelper::cancel('projectfield.cancel', 'JTOOLBAR_CANCEL');	
	}	
}

?>