<?php defined('_JEXEC') or die('The way is shut!');
/**
* @version		  $Id: views/simpleregistration/tmpl/default.php 2013-03-17 15:35:00Z zanardi $
* @package		  GiBi SimpleRegistration
* @author       GiBiLogic
* @authorEmail  info@gibilogic.com
* @authorUrl    http://www.gibilogic.com
* @copyright	  Copyright (C) 2011-2013 GiBiLogic snc. All rights reserved.
* @license		  GNU/GPL v2 or later
*/

JToolBarHelper::title( JText::_( 'SIMPLEREGISTRATION' ), 'generic.png' );
JToolBarHelper::preferences( 'com_simpleregistration' );
?>
<p><?php echo JText::_('SIMPLEREGISTRATION_USAGE') ?></p>
