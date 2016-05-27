<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla view library
jimport('joomla.application.component.view');

class PosterViewCategory extends PosterView
{

    public function category($data = null) 
    {
        $tmpl = new PTemplate();

        $categoryName = $data['categoryName'][0];
        $projects = $data['projects'];

        foreach ($projects as $project) {
            $images = json_decode($project->images);
            $project->image = $images[0];
        }

        echo $tmpl->set('categoryName', $categoryName)
                  ->set('projects', $projects)
                  ->fetch('category/base');                        
    }

}