<?php

defined('_JEXEC') or die();

class PosterProfileController extends PosterBaseController 
{

    public function display()
    {

        $this->profile();

    }

    public function profile()
    {

        $jinput = JFactory::getApplication()->input;
        $userid = $jinput->get('userid', 0, 'INT');

        $data = new stdClass();
        $model = $this->getModel('profile');
        $my = PFactory::getUser();

        $view = $this->getView('profile');
        echo $view->get('profile', $my);
        
    }

}