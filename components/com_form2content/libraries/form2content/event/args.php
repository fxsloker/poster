<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_form2content
 *
 * @copyright   Copyright (C) 2006 - 2014 Open Source Design. All rights reserved.
 * @author      Open Source Design <info@opensourcedesign.nl>
 */
defined('JPATH_PLATFORM') or die('Restricted acccess');

/**
 * Event Arguments
 * 
 * This class is used to exchange F2C article information during events.
 * 
 * @package     Joomla.Site
 * @subpackage  com_form2content
 * @since       5.5.0
 */
class F2cEventArgs extends JObject
{
	/**
	 * The action that triggered this event
	 *
	 * @var    string
	 * @since  5.5.0
	 */
	public $action 			= null;
	
	/**
	 * True when the F2C Article is a new article
	 *
	 * @var    boolean
	 * @since  5.5.0
	 */
	public $isNew 				= false;
	
	/**
	 * The existing form data before it was modified
	 *
	 * @var    object
	 * @since  5.5.0
	 */
	public $formOld 			= null;
	
	/**
	 * The existing custom fields data before it was modified
	 *
	 * @var    object
	 * @since  5.5.0
	 */
	public $fieldsOld 			= null;
	
	/**
	 * The form data after it was modified
	 *
	 * @var    object
	 * @since  5.5.0
	 */
	public $formNew 			= null;
	
	/**
	 * The custom fields data after it was modified
	 *
	 * @var    object
	 * @since  5.5.0
	 */
	public $fieldsNew 			= null;
	
	/**
	 * The generated HTML intro content for the article
	 *
	 * @var    string
	 * @since  5.5.0
	 */
	public $parsedIntroContent = null;
	
	/**
	 * The generated HTML main content for the article
	 *
	 * @var    string
	 * @since  5.5.0
	 */
	public $parsedMainContent 	= null;
}
?>