<?php defined('_JEXEC') or die( 'The way is shut' );
/**
* @version		  $Id: views/registrationform/view.html.php 2013-03-17 14:31:00Z zanardi $
* @package		  GiBi SimpleRegistration
* @author       GiBiLogic
* @authorEmail  info@gibilogic.com
* @authorUrl    http://www.gibilogic.com
* @copyright	  Copyright (C) 2011-2013 GiBiLogic snc. All rights reserved.
* @license		  GNU/GPL v2 or later
*/

jimport( 'joomla.application.component.view');
jimport( 'joomla.application.component.helper');

class SimpleregistrationViewRegistrationform extends JViewLegacy
{
	protected $_url;

	function __construct($config=array())
	{
		$this->_url = 'index.php?option=com_simpleregistration&view=registrationform';
		parent::__construct($config);
	}

	function display($tpl = null)
	{
		$app =& JFactory::getApplication();
		$pathway	=& $app->getPathway();
		$params 	=& $app->getParams();
		$document	=& JFactory::getDocument();
		$user		=& JFactory::getUser();

		if ( $user->guest ) {
			$params->set('page_title', JText::_('REGISTRATION_FORM_TITLE') );
		} else {
			$params->set('page_title', JText::_('ALREADY_REGISTERED_FORM_TITLE') );
		}

		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();
		if( is_object( $menu ) ) {
			$menu_params = new JRegistry( $menu->params );
			if( $menu_params->get( 'page_title') ) {
				$params->set('page_title', $menu_params->get( 'page_title') );
			}
		}

		$document->setTitle( $params->get( 'page_title' ) );
		// TODO add JavaScript validation from Bootstrap or JQuery
		$pathway->addItem(JText::_('New'), '');

		JHTML::_('behavior.formvalidation');

		$this->assignRef('params', $params);
		parent::display($tpl);
	}
}