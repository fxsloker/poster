<?php
defined('_JEXEC') or die('Restricted acccess');

class Form2ContentViewDocumentation extends JViewLegacy
{
	function display($tpl = null)
	{
		// We don't need toolbar in the modal window.
		if ($this->getLayout() !== 'modal') 
		{
			Form2ContentHelperAdmin::addSubmenu('documentation');
			$this->addToolbar();
			$this->sidebar = JHtmlSidebar::render();
		}

		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JHtmlSidebar::setAction('index.php?option=com_form2content&view=documentation');
		
		$title = JText::_('COM_FORM2CONTENT_FORM2CONTENT') . ': ' . JText::_('COM_FORM2CONTENT_DOCUMENTATION');			
		JToolBarHelper::title($title, 'generic.png');		
	}
}

?>