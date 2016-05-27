<?php
defined('_JEXEC') or die('Restricted acccess');

class Form2ContentViewTemplate extends JViewLegacy
{
	protected $item;
	protected $id;	

	function display($tpl = null)
	{
		$model = $this->getModel();
	
		$this->item	= $this->get('Item');
		$this->id	= $model->get('id');
		
		$this->addToolbar();
		
		parent::display($tpl);		
	}
	
	protected function addToolbar()
	{
		$formTitle = JText::_('COM_FORM2CONTENT_TEMPLATE_MANAGER') . ' : ';
		$formTitle .= JText::_('COM_FORM2CONTENT_EDIT') . ' ' . JText::_('COM_FORM2CONTENT_TEMPLATE');
		
		JToolBarHelper::title($formTitle);
		JToolBarHelper::save('template.save', 'JTOOLBAR_SAVE');
		JToolBarHelper::cancel('template.cancel', 'JTOOLBAR_CANCEL');
	}
}
?>