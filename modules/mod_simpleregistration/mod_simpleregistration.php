<?php
/**
* @version		  mod_simpleregistration.php 2013-09-04 19:12:00 UTC zanardi
* @package		  GiBi SimpleRegistration
* @author       GiBiLogic <info@gibilogic.com>
* @authorUrl    http://www.gibilogic.com
* @copyright	  Copyright (C) 2011-2013 GiBiLogic snc. All rights reserved.
* @license		  GNU/GPL v2 or later
*/
defined('_JEXEC') or die();
jimport( 'joomla.application.component.helper');
$params->merge(JComponentHelper::getParams('com_simpleregistration'));
$action_url = 'index.php?option=com_simpleregistration&view=registrationform&task=save&return='.base64_encode(JFactory::getURI()->toString());
require JModuleHelper::getLayoutPath('mod_simpleregistration', $params->get('layout', 'default'));