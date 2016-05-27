<?php

defined('_JEXEC') or die('Restricted access');

class PosterModelCategory extends JModelLegacy
{

    public function getCategoryTitle($id) 
    {

        $this->_db = $this->getDbo();
        

        $query = 'SELECT title FROM '.$this->_db->quoteName('#__poster_categories').' WHERE category_id='.$id;

        $this->_db->setQuery($query);
        $categoryTitle = $this->_db->loadRow();

        return $categoryTitle;
    
    }    

    public function getProjectsByCategory($id)
    {

		$this->_db = $this->getDbo();

		$query = 'SELECT * FROM '.$this->_db->quoteName('#__poster_projects').' WHERE category_id='.$id;

		$this->_db->setQuery($query);

		$rows = $this->_db->loadObjectList();

		return $rows;

    }

}