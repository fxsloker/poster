<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.application.component.view');

class Form2ContentViewTemplates extends JViewLegacy
{
	protected $items;
	
	function display($tpl = null)
	{
		// Authorization check
		if (!JFactory::getUser()->authorise('core.admin')) 
		{
			return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
		}
		
		if ($this->getLayout() !== 'modal')
		{
			Form2ContentHelperAdmin::addSubmenu('templates');
		}
		
		$this->items = $this->get('Items');
	
		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
	
		// We don't need toolbar in the modal window.
		if ($this->getLayout() !== 'modal') 
		{
			$this->addToolbar();
			$this->sidebar = JHtmlSidebar::render();
		}
				
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JHtmlSidebar::setAction('index.php?option=com_form2content&view=templates');
		
		JToolBarHelper::title(JText::_('COM_FORM2CONTENT_FORM2CONTENT') . ': ' . JText::_('COM_FORM2CONTENT_TEMPLATE_MANAGER'), 'generic.png');
		JToolBarHelper::custom('template.upload','upload','upload',JText::_('COM_FORM2CONTENT_UPLOAD'),false);
		JToolBarHelper::editList('template.edit','JTOOLBAR_EDIT');			
		JToolBarHelper::trash('template.delete','JTOOLBAR_TRASH');
	}
}
?>