<?php
/**
 * @version		$Id: users.php 20228 2011-01-10 00:52:54Z eddieajau $
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

/**
 * Users list controller class.
 *
 * @package		Joomla.Administrator
 * @subpackage	com_users
 * @since		1.6
 */
class Form2ContentControllerUsers extends JControllerLegacy
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * @since	1.6
	 */
	protected $text_prefix = 'COM_FORM2CONTENT_USERS';

	/**
	 * Constructor.
	 *
	 * @param	array An optional associative array of configuration settings.
	 * @see		JController
	 * @since	1.6
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
	}
	
	function display($cachable = false, $urlparams = array())
	{
		// Check if the user is allowed to add or edit Form2Content forms
		$user = JFactory::getUser();

		if($user->authorise('core.create', 'com_form2content') ||
		   $user->authorise('core.edit', 'com_form2content'))
		{			
			$this->input->set('view', 'users');
			parent::display();
		}
		else
		{
			return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
		}
	}
	
	/**
	 * Proxy for getModel.
	 *
	 * @since	4.0.0
	 */
	public function getModel($name = 'User', $prefix = 'Form2ContentModel', $config = array('ignore_request' => true))
	{
		return parent::getModel($name, $prefix, $config);
	}
}