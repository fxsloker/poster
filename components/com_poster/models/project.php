<?php

defined('_JEXEC') or die('Restricted access');

class PosterModelProject extends JModelLegacy
{

    public function getProject($id) 
    {

        $this->_db = $this->getDbo();
        

        $query = 'SELECT title, permalink, content, images, intro, category_id, published, created_by, created, modified FROM '.$this->_db->quoteName('#__poster_projects').' WHERE id='.$id;

        $this->_db->setQuery($query);
        $rows = $this->_db->loadObjectList();

        return $rows;
    
    }

}