<?php

defined('_JEXEC') or die('Restricted access');

class PosterProjectController extends PosterBaseController
{

    public function display($cacheable = false, $urlparams = false)
    {
        $this->getProject();
    
    }   

    public function getProject() 
    {

        $mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;

        $id = $jinput->get('project_id', '', 'INT');

        $modelProject = PFactory::getModel('project');

        $project = $modelProject->getProject($id);

        $view = $this->getView('project');
        echo $view->get('project', $project); 
    
    }

}