<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla view library
jimport('joomla.application.component.view');
/**
 * HTML View class for the HelloWorld Component
 */
class PosterViewProject extends PosterView
{

    public function project($data)
    {

        $tmpl = new PTemplate();

        $title = $data[0]->title;
        $images = json_decode($data[0]->images);

        echo $tmpl->set('title', $title)
                  ->set('images', $images)
                  ->fetch('project/base');

    }

}