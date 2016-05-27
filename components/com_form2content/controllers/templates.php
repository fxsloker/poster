<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.application.component.controller');

class Form2ContentControllerTemplates extends JControllerLegacy
{
	function display($cachable = false, $urlparams = array())
	{
		$this->input->set('view', 'templates');
		parent::display();
	}
}
?>