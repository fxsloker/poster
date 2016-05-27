<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

jimport('joomla.application.component.view');

class Form2ContentViewProjectSelect extends JViewLegacy
{
	protected $contentTypeList;

	function display($tpl = null)
	{
		$contentTypeId = 0;
		$this->addToolbar();

		$doc = JFactory::getDocument();
		$doc->addStyleDeclaration('.icon-forward:before { content: ""; }');
				
		$model = $this->getModel('form');
		$this->contentTypeList = $model->getContentTypeSelectList(false);		

		if(count($this->contentTypeList) == 1)
		{
			foreach($this->contentTypeList as $contentType)
			{
				$contentTypeId = $contentType->value;
			}
			
			return $contentTypeId;
		}
		
		parent::display($tpl);
		
		return $contentTypeId;				
	}
	
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_FORM2CONTENT_ARTICLE_MANAGER').': '. JText::_('COM_FORM2CONTENT_ADD_NEW_FORM'));
		JToolBarHelper::custom('form.add','forward','forward',JText::_('COM_FORM2CONTENT_NEXT'), false);
		JToolBarHelper::cancel('form.cancel', 'JTOOLBAR_CANCEL');	
	}
}

?>