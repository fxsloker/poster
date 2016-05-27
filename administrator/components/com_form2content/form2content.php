<?php
defined('_JEXEC') or die;

require_once JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'const.form2content.php';
require_once JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'factory.form2content.php';

jimport('joomla.application.component.controller');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_form2content')) 
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

jimport('joomla.log.log');
JLog::addLogger(array('text_file' => 'f2c.log.php'),JLog::ALL);

// Check if we need to enable the logging
$f2cConfig = F2cFactory::getConfig();

if($f2cConfig->get('enable_logging', 0))
{
	jimport('joomla.log.log');
	JLog::addLogger(array('text_file' => 'com_form2content.logging.php'), JLog::ALL, array('com_form2content'));		
}

JLoader::register('Form2ContentHelperAdmin', __DIR__ . '/helpers/form2content.php');
JLoader::registerPrefix('F2c', JPATH_COMPONENT_SITE.DIRECTORY_SEPARATOR.'libraries'.DIRECTORY_SEPARATOR.'form2content');

$controller = JControllerLegacy::getInstance('Form2Content');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
?>