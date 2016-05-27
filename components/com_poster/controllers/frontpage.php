<?php

defined('_JEXEC') or die('Restricted access');

class PosterFrontpageController extends PosterBaseController {

    function __construct($config=array())
    {
        parent::__construct($config);
        $this->app = JFactory::getApplication();
        $this->db = JFactory::getDbo();
    }    

    
}