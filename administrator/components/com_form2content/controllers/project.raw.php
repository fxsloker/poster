<?php
defined('_JEXEC') or die('Restricted acccess');

jimport('joomla.application.component.controllerform');

class Form2ContentControllerProject extends JControllerForm
{
	public function __construct($config = array())
	{
		// Access check.
		if (!JFactory::getUser()->authorise('core.admin')) 
		{
			return JError::raiseError(404, JText::_('JERROR_ALERTNOAUTHOR'));
		}
		
		parent::__construct($config);
	}

	public function getModel($name = 'Project', $prefix = 'Form2ContentModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	
	public function export()
	{
		$model = $this->getModel();
		$model->export();
		parent::display();
	}
	
	public function InstallSamples()
	{
		require_once(JPATH_COMPONENT_ADMINISTRATOR.'/sample_data/samples.form2content.php');
		
		$sampleDataHelper = new F2cSampleDataHelper();
		$sampleDataHelper->install();
		
		ob_clean();	
		echo '';
	}
}
?>