<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe = JFactory::getApplication();
$mainframe->registerEvent( 'onAfterRoute', 'aposterOnAfterRoute' );

function aposterOnAfterRoute()
{

	$document = JFactory::getDocument();
	$baseurl = JURI::base();
	$document->addCustomTag('<script src="/components/com_poster/assets/loader.js" type="text/javascript"></script>');

}

