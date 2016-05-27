<?php
/**
 * @version		  controller.php 2013-08-29 20:25:00 UTC zanardi
 * @package		  GiBi SimpleRegistration
 * @author      GiBiLogic
 * @authorEmail info@gibilogic.com
 * @authorUrl   http://www.gibilogic.com
 * @copyright	  Copyright (C) 2011-2013 GiBiLogic. All rights reserved.
 * @license		  GNU/GPL v2 or later
 */
defined('_JEXEC') or die('The way is shut');
jimport('joomla.application.component.controller');
jimport('joomla.html.parameter');

class SimpleregistrationController extends JControllerLegacy
{

	private $url = 'index.php?option=com_simpleregistration&view=registrationform';

	function __construct($config=array())
	{
		parent::__construct($config);
    $this->app = JFactory::getApplication();
    $this->db = JFactory::getDbo();
	}

	// show registration form
	function display()
	{
		if (!$this->app->input->get('view')) {
			$this->app->input->set('view', 'registrationform');
		}
		parent::display(false);
	}

	// create new user
	function save()
	{
    if ($this->app->input->get('return','')) {
        $this->url = base64_decode(JFactory::getApplication()->input->get('return',''));
    }

		jimport('joomla.filter.filterinput');

		$filter = JFilterInput::getInstance();
		$email = $filter->clean($this->app->input->getString('email'));

		// Check that e-mail is not already taken
		$query = 'SELECT COUNT(*) FROM #__users WHERE email = ' . $this->db->quote($email);
		$this->db->setQuery($query);
		if ($this->db->loadResult() > 0) {
			$message = "COM_SIMPLEREGISTRATION_EMAIL_EXIST";
			$type = "error";
			$this->setRedirect($this->url, $message, $type);
			return false;
		}

		jimport('joomla.application.component.helper');
		$params = JComponentHelper::getParams('com_simpleregistration');

		jimport('joomla.mail.helper');
		jimport('joomla.user.helper');

		$lang = JFactory::getLanguage();
		$lang->load('com_user');
		$lang->load('com_users');

		if (!JMailHelper::isEmailAddress($email)) {
			JError::raiseWarning('', JText::_('SIMPLEREGISTRATION_EMAIL_NOT_VALID'));
			return false;
		}

		$user = JFactory::getUser(0);

		$usersParams = JComponentHelper::getParams('com_users');
		$usertype = $usersParams->get('new_usertype');

		$data = array();

		$data['name'] = $email;
		$data['email'] = $email;
		$data['email1'] = $email;
		$data['gid'] = $usertype;
		$data['sendEmail'] = 0;

		if ($params->get('extractusername', 0) == 1) {
			$tmp_array = explode('@', $email);
			$data['username'] = $tmp_array[0];
		}
		else {
			$data['username'] = $email;
		}

		if ($params->get('requestpassword', 0) == 0) {
			$password = JUserHelper::genRandomPassword();
		}
		else {
			$password = $filter->clean(JRequest::getVar('password'));
		}
		$data['password'] = $password;
		$data['password1'] = $password;
		$data['password2'] = $password;

		require_once(JPATH_COMPONENT. '/models/registration.php');
		$model = new SimpleregistrationModelRegistration();
		$activation = $model->register($data);

		switch ($activation) {
			case 'useractivate':
				$message = JText::_('COM_USERS_REGISTRATION_COMPLETE_ACTIVATE');
				break;
			case 'adminactivate':
				$message = JText::_('COM_USERS_REGISTRATION_COMPLETE_VERIFY');
				break;
			default:
				$message = JText::_('COM_USERS_REGISTRATION_ACTIVATE_SUCCESS');
		}

		if ($params->get('autologin', 0) == 1) {
			$credentials = array("username" => $data['username'], "password" => $data['password']);
      $this->app->login($credentials);
		}

		$this->setRedirect($this->url, $message);
	}

}