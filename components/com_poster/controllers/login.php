<?php

defined('_JEXEC') or die('Restricted access');

class PosterLoginController extends PosterBaseController
{

    public function display($cacheable = false, $urlparams = false)
    {

        $this->showLogin();
    
    }  	

	public function showLogin()
	{

        $mainframe = JFactory::getApplication();
        $mySess = JFactory::getSession(); 		

        if ($mySess->get('loggedin','')) 
        {

            $mainframe->redirect('/');

        }

        $view = $this->getView('login');

        echo $view->get('showLogin'); 		

	} 

    public function login()
    {

        $mainframe = JFactory::getApplication();
        $mySess = JFactory::getSession();

        $post = JRequest::get('post');

        $model = PFactory::getModel('user');

        $user = $model->getMemberHash($post['email']);

        if (PPassword::verify($post['password'], $user[0]->password)) {

            $mySess->set('userid', $user[0]->userid);
            $mySess->set('username', $user[0]->username);
            $mySess->set('loggedin', true);

            $mainframe->redirect('index.php?option=com_poster&view=profile');

        }

    }	

}