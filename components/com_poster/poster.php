<?php

defined('_JEXEC') or die('Restricted access');

defined('JPATH_COMPONENT') or define('JPATH_COMPONENT', dirname(__FILE__));

require_once JPATH_ROOT . '/components/com_poster/defines_poster.php';

require_once POSTER_COM_PATH . '/controllers/controller.php';
require_once POSTER_COM_PATH . '/libraries/core.php';
require_once POSTER_COM_PATH . '/views/views.php';

$tmpl = JRequest::getCmd('tmpl', '', 'GET');

PFactory::setCurrentURI();

$config = array('name' => JString::strtolower(JRequest::getCmd('view', 'frontpage')));

$viewController = $config['name'];

jimport('joomla.filesystem.file');

if (JFile::exists(JPATH_COMPONENT . '/controllers/' . $viewController . '.php')) {
    require_once JPATH_COMPONENT . '/controllers/' . $viewController . '.php';
} else {
    return JError::raiseWarning(404, JText::_('COM_POSTER_CONTROLLER_MISSING'));
}

$viewController = JString::ucfirst($viewController);
$viewController = 'Poster' . $viewController . 'Controller';



$controller = new $viewController($config);
$controller->execute(JRequest::getCmd('task', ''));