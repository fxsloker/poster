<?php

defined('_JEXEC') or die('Restricted access');

class PosterRegisterController extends PosterBaseController
{

    public function display($cacheable = false, $urlparams = false)
    {

        $this->register();
    
    }    

    public function register()
    {

        $my = PFactory::getUser();

        if ($my->id != 0) {
            $mainframe = JFactory::getApplication();
            $mainframe->redirect('index.php?option=com_poster&view=frontpage');
        }

        $rModel = PFactory::getModel('register');
        $rModel->cleanTempUser();     
        
        $view = $this->getView('register');
        echo $view->get('register');
    
    }

    public function register_save()
    {
        $mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;
        $modelRegister = PFactory::getModel('register');

        $mySess = JFactory::getSession();

        if (!$mySess->has('JS_REG_TOKEN')) {
            echo '<div class="error-box">' . JText::_('COM_COMMUNITY_INVALID_SESSION') . '</div>';
            return;
        }

        $token = $mySess->get('JS_REG_TOKEN', '');
        $ipAddress = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
        $authKey = $modelRegister->getAssignedAuthKey($token, $ipAddress);
        $formToken = $jinput->request->get('authkey', '', 'STRING');

        if (empty($formToken) || empty($authKey) || ($formToken != $authKey)) {
            echo '<div class="error-box">' . JText::_('COM_COMMUNITY_INVALID_TOKEN') . '</div>';
            return;
        }

        //update the auth key life span to another 180 sec.
        $modelRegister->updateAuthKey($token, $authKey, $ipAddress);

        $post = JRequest::get('post');

        //adding to temp reg table.
        if (!$modelRegister->addTempUser($post)->return_value['addTempUser']) {
            JError::raiseWarning('', JText::_('COM_COMMUNITY_ERROR_IN_REGISTRATION'));
            $this->register();
            return false;
        }

        $modelProfile = PFactory::getModel('profile');
        $modelProfile->getProfileTypes();

        $mainframe->redirect('index.php?option=com_poster&view=register&task=chooseGroup');
    }

    public function chooseGroup()
    {

        $mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;
        $mySess = JFactory::getSession();

        if (!$mySess->has('JS_REG_TOKEN')) {
            $mainframe->redirect(CRoute::_('index.php?option=com_community&view=register', false));
            return;
        }    

        $view = $this->getView('register');

        if ($jinput->getMethod() == 'POST') {

            $type = $jinput->get('profileType', 0, 'INT');
            
            if ($type) {
                $mainframe->redirect('index.php?option=com_poster&view=register&task=registerProfile&profileType=' . $type);                

            } else {
                $mainframe->enqueueMessage(JText::_('COM_COMMUNITY_NO_PROFILE_TYPE_SELECTED'), 'error');
            }

        }

        echo $view->get('chooseGroup');

    }  

    public function registerProfile()
    {

        $mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;
        $mySess = JFactory::getSession();

        if (!$mySess->has('JS_REG_TOKEN')) {
            $mainframe->redirect('index.php?option=com_community&view=register');
            return;
        }

        $token = $mySess->get('JS_REG_TOKEN', '');

        $profileType = $jinput->get('profileType', 0, 'INT'); 
        
        $profileModel = PFactory::getModel('profile');
        $fields = $profileModel->getAllFields($profileType);     

        $view = $this->getView('register');

        echo $view->get('registerProfile', $fields); 

    }  

    public function ajaxGenerateAuthKey()
    {
        
        $mySess = JFactory::getSession();

        $newToken = $mySess->getToken(true);
        $mySess->set('JS_REG_TOKEN', $newToken);

        $json = array();

        if (!$mySess->has('JS_REG_TOKEN')) {
            $json['error'] = JText::_('COM_COMMUNITY_REGISTER_AUTH_ERROR');
            die(json_encode($json));
        }

        $authKey = JSession::getFormToken();
        $model = $this->getModel('register');
        $json['authKey'] = $authKey;
        if ($model->addAuthKey($authKey)->return_value['addAuthKey']) {
            $json['authKey'] = $authKey;
        } else {
            $json['error'] = JText::_('COM_COMMUNITY_REGISTER_AUTH_ERROR');
        }
        die(json_encode($json));
    }

    private function _createUser($tmpUser, $requireApproval = false, $profileType = 0)
    {
        if (empty($tmpUser) || !isset($tmpUser->username)) {
            JError::raiseError(500, JText::_('COM_COMMUNITY_REGISTRATION_MISSING_USER_OBJ'));
            return;
        }

        //Remove whitespace infront of username
        $tmpUser->username = trim($tmpUser->username);
        $tmpUser->name = trim($tmpUser->username);
        $user = clone(JFactory::getUser());
        $authorize = JFactory::getACL();
        $usersConfig = JComponentHelper::getParams('com_users');
        /*$cacl = CACL::getInstance();*/
        $userObj = get_object_vars($tmpUser);

        // Get usertype from configuration. If tempty, user 'Registered' as default
        $newUsertype = $usersConfig->get('new_usertype');

        if (!$newUsertype) {
            $newUsertype = 'Registered';
        }

        // Bind the post array to the user object
        if (!$user->bind($userObj, 'usertype')) {
            JError::raiseError(500, $user->getError());
        }

        // Initialize user default values
        $date = JFactory::getDate();

        if ($requireApproval) {
            $user->set('block', 1);
        }

        $user->set('id', 0);
        $user->set('usertype', $newUsertype);
        $user->set('gid', ($newUsertype));

        //set group for J1.6
        $user->set('groups', array($newUsertype => $newUsertype));

        $user->set('registerDate', $date->toSql());

        $useractivation = $usersConfig->get('useractivation');

        if ($useractivation != 0 && (!$requireApproval)) {
            jimport('joomla.user.helper');
            $user->set('block', '1');
        }

        //Jooomla 3.2.0 fix. TO be remove in future
        if (version_compare(JVERSION, '3.2.0', '=')) {
            $salt = JUserHelper::genRandomPassword(32);
            $crypt = JUserHelper::getCryptedPassword($userObj['password2'], $salt);
            $password = $crypt . ':' . $salt;
        } else {
            $password = $userObj['password2'];
        }

        $user->set('password', $password);

        if($useractivation != 0) {
            $user->set('activation', JApplication::getHash(JUserHelper::genRandomPassword()));
        }

        // If there was an error with registration, set the message and display the form
        if (!$user->save()) {
            JError::raiseWarning('', JText::_($user->getError()));
            //$this->register();
            return false;
        }

        if ($user->id == 0) {
            $uModel = $this->getModel('user');
            $newUserId = $uModel->getUserId($user->username);
            $user = JFactory::getUser($newUserId);
        }

        return $user;
    }            
    
    public function sendEmail($type, $user, $password = null, $requireApproval = false)
    {
        $mainframe = JFactory::getApplication();
        /*$config = CFactory::getConfig();*/
        $modelRegister = $this->getModel('register');

        $sitename = $mainframe->getCfg('sitename');
        $mailfrom = $mainframe->getCfg('mailfrom');
        $fromname = $mainframe->getCfg('fromname');
        $siteURL = JURI::base();

        $name = $user->get('name');
        $email = $user->get('email');
        $username = $user->get('username');

        $com_user_config = JComponentHelper::getParams('com_users');
        $com_user_activation_type = $com_user_config->get('useractivation');

        if (is_null($password)) {
            $password = $user->get('password');
        }

        //Disallow control chars in the email
        $password = preg_replace('/[\x00-\x1F\x7F]/', '', $password);

        $params = JComponentHelper::getParams('com_users');
        if ($params->get('sendpassword', 1) == 0) {
            $password = '***';
        }

        // Load Super Administrator email list
        $rows = $modelRegister->getSuperAdministratorEmail();

        //getting superadmin email address.
        if (!$mailfrom || !$fromname) {
            foreach ($rows as $row) {
                if ($row->sendEmail) {
                    $fromname = $row->name;
                    $mailfrom = $row->email;
                    break;
                }
            }

            //if still empty, then we just pick one of the admin email
            if (!$mailfrom || !$fromname) {
                $fromname = $rows[0]->name;
                $mailfrom = $rows[0]->email;
            }
        }

        $subject = JText::sprintf('COM_COMMUNITY_ACCOUNT_DETAILS_FOR', $name, $sitename);
        $subject = html_entity_decode($subject, ENT_QUOTES);

        $baseUrl = JUri::base();
        $activationURL = $baseUrl . 'index.php?option=' . COM_COMMUNITY_NAME . '&view=register&task=activate&' . ACTIVATION_KEYNAME . '=' . $user->get(
                'activation'
            );

        switch ($type) {
            case 'registration' :

                // This section will only be called when there are no custom fields created and we just proceed like how Joomla
                // registers a user.
                if ($requireApproval || $com_user_activation_type == 1) {
                    $message = JText::sprintf(
                        'COM_COMMUNITY_EMAIL_REGISTRATION_REQUIRES_ACTIVATION',
                        $name,
                        $sitename,
                        $activationURL,
                        $siteURL,
                        $username,
                        $password
                    );

                    //@since 4.1, no need to send email because the user will still get it when the registration is complete to avoid multiple email, just in case if this is needed, just uncomment the return;
                    return;
                } else {
                    $message = JText::sprintf(
                        'COM_COMMUNITY_EMAIL_REGISTRATION',
                        $name,
                        $sitename,
                        $username,
                        $password
                    );
                }

                break;
            case 'registration_uncomplete' :
                $subject = JText::sprintf('COM_COMMUNITY_ACCOUNT_DETAILS_FOR_WELCOME', $sitename);
                $subject = html_entity_decode($subject, ENT_QUOTES);

                if ($requireApproval || $com_user_activation_type == 2) {
                    $message = JText::sprintf(
                        'COM_COMMUNITY_EMAIL_REGISTRATION_ACCOUNT_DETAILS_REQUIRES_ACTIVATION',
                        $name,
                        $sitename,
                        $username,
                        $password
                    );
                } else {
                    $message = JText::sprintf(
                        'COM_COMMUNITY_EMAIL_REGISTRATION_ACCOUNT_DETAILS',
                        $name,
                        $sitename,
                        $username,
                        $password
                    );
                }

                break;
            case 'registration_complete' :

                if ($requireApproval || $com_user_activation_type == 2) {
                    // if approval is required, send an email to both admin and user, admin - to activate the user, user - to wait for admin approval

                    /* @since 4.1, there is a new requirement to send the activation to user to make sure the email is valid first before letting admin verify the account
                     *
                     * so we will make the user activate first but still in disabled state
                     *
                     * */

                    $activationURL = $baseUrl . 'index.php?option=' . COM_COMMUNITY_NAME . '&view=register&task=verifyemail&' . ACTIVATION_KEYNAME . '=' . $user->get(
                            'activation'
                        );
                    $message = JText::sprintf(
                        'COM_COMMUNITY_EMAIL_REGISTRATION_COMPLETED_REQUIRES_ADMIN_ACTIVATION',
                        $name,
                        $sitename,
                        $activationURL
                    );
                } else {
                    $message = JText::sprintf(
                        'COM_COMMUNITY_EMAIL_REGISTRATION_COMPLETED_REQUIRES_ACTIVATION',
                        $name,
                        $sitename,
                        $activationURL,
                        $siteURL
                    );
                }

                break;
            case 'resend_activation' :

                if ($config->get('activationresetpassword')) {
                    $message = JText::sprintf(
                        'COM_COMMUNITY_ACTIVATION_MSG_WITH_PWD',
                        $name,
                        $sitename,
                        $activationURL,
                        $siteURL,
                        $username,
                        $password
                    );
                } else {
                    $message = JText::sprintf(
                        'COM_COMMUNITY_ACTIVATION_MSG',
                        $name,
                        $sitename,
                        $activationURL,
                        $siteURL
                    );
                }
                break;
        }

        $message = html_entity_decode($message, ENT_QUOTES);
        $sendashtml = false;
        /*$copyrightemail = JString::trim($config->get('copyrightemail'));*/

        // this is used to send the username and password email if the settings of user configuration -> send username and password is enabled from the backend
        if ($type == 'registration_uncomplete' && $com_user_config->get('sendpassword')) {
            //check if HTML emails are set to ON
/*            if ($config->get('htmlemail')) {
                $sendashtml = true;
                $tmpl = new CTemplate();
                $message = CString::str_ireplace(array("\r\n", "\r", "\n"), '<br />', $message);

                $tmpl->set('name', $name);
                $tmpl->set('email', $email);

                $message = $tmpl->set(
                    'unsubscribeLink',
                    CRoute::getExternalURL('index.php?option=com_community&view=profile&task=email'),
                    false
                )
                    ->set('content', $message)
                    ->set('copyrightemail', 'copyrightemail')
                    ->set('sitename', 'sitename')
                    ->set('recepientemail',$email)
                    ->fetch('email.html');
            }*/
            $mail = JFactory::getMailer();
            $mail->sendMail($mailfrom, $fromname, $email, $subject, $message, $sendashtml);
        }

        // Send email to user
        //if ( ! ($type == 'registration_complete' && !$requireApproval && !$needActivation))
        if ($type != 'registration_uncomplete' && ($com_user_activation_type != 0 || $requireApproval)) {
            if ($requireApproval || $com_user_activation_type == 2) {
                $subject = JText::sprintf('COM_COMMUNITY_USER_REGISTERED_WAITING_APPROVAL_TITLE', $sitename);
            }

            $mail = JFactory::getMailer();
            $mail->sendMail($mailfrom, $fromname, $email, $subject, $message, $sendashtml);
        }

        // after registration(even without any activation yet) it will trigger a message to admin
        if ($type == 'registration_complete') {

            //reset the subject just in case it has been set for the user above
            $subject = JText::sprintf('COM_COMMUNITY_ACCOUNT_DETAILS_FOR', $name, $sitename);
            $subject = html_entity_decode($subject, ENT_QUOTES);

            foreach ($rows as $row) {
                if ($row->sendEmail) {
                    $model = CFactory::getModel('Profile');
                    $profileTypes = $model->getProfileTypes();
                    $message2 = JText::sprintf(
                        JText::_('COM_COMMUNITY_SEND_MSG_ADMIN'),
                        $row->name,
                        $sitename,
                        $name,
                        $email,
                        $username
                    );

                    $message2 = html_entity_decode($message2, ENT_QUOTES);

                    $mail = JFactory::getMailer();
                    $mail->sendMail($mailfrom, $fromname, $row->email, $subject, $message2, $sendashtml);
                }
            }
        }

    }     

}