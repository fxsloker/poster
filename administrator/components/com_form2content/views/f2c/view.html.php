<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.application.component.view');

class Form2ContentViewF2C extends JView
{
	function display($tpl = null)
	{
		if(JFactory::getApplication()->input->get('layout') == 'about')
		{
			$title = JText::_('Form2Content') . ' - ' . JText::_('About');
		}
		else
		{
			$title = JText::_('Form2Content') . ' - ' . JText::_('CONTROL_PANEL');			
		}
		
		JToolBarHelper::title($title, 'generic.png');
		parent::display($tpl);
	}
}

?>