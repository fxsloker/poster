<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla view library
jimport('joomla.application.component.view');

class PosterViewRegister extends PosterView
{

    public function register($data = null) 
    {

        $mainframe = JFactory::getApplication();
        $my = PFactory::getUser();
        
        if ($my->id) {
            $mainframe->enqueueMessage(JText::_('COM_POSTER_REGISTER_ALREADY_USER'), 'warning');
            return;
        }
        
        $fields = array();
        $post = JRequest::get('post');  
        
        $data = array();

        $tmpl = new PTemplate();

        $content = $tmpl->set('data', $data);
        $content = $content->fetch('register/base');
        
        echo $content;                         
    }

    public function chooseGroup()
    {

        $model = PFactory::getModel('Profile');
        $profileTypes = $model->getProfileTypes();

        $tmpl = new PTemplate();

        echo $tmpl->set('profileTypes', $profileTypes)
                ->fetch('register/category');
    }

    public function registerProfile($fields) {

        $mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;

        $model = PFactory::getModel('profile');

        $profileType = $jinput->get->get('profileType', 0, 'INT');

        $tmpl = new PTemplate();

        echo $tmpl->set('fields', $fields)
                ->set('profileType', $profileType)
                ->fetch('register/profile');
    }    

}