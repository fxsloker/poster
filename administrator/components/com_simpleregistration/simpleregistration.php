<?php defined('_JEXEC') or die('The way is shut!');
/**
* @version		  $Id: simpleregistration.php 2013-03-17 15:35:00Z zanardi $
* @package		  GiBi SimpleRegistration
* @author       GiBiLogic
* @authorEmail  info@gibilogic.com
* @authorUrl    http://www.gibilogic.com
* @copyright	  Copyright (C) 2011-2013 GiBiLogic snc. All rights reserved.
* @license		  GNU/GPL v2 or later
*/

jimport('joomla.application.component.helper');
require_once(JPATH_COMPONENT.'/controller.php');
$controller = new SimpleregistrationController();
$controller->execute(JRequest::getCmd('task', null, 'default', 'cmd'));
$controller->redirect();
