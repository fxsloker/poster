<?php
defined('JPATH_PLATFORM') or die('Restricted acccess');

jimport('joomla.application.component.controllerform');

class Form2ContentControllerProjectFieldTypeSelect extends JControllerLegacy
{
	public function select()
	{
		$view = $this->getView('projectfieldtypeselect', 'html');
		$view->display();
	}
	
	public function cancel()
	{
		$this->setRedirect('index.php?option=com_form2content&view=projectfields&projectid='.JFactory::getApplication()->input->get('projectid'));
	}
}	
?>