<?php

defined('_JEXEC') or die('Restricted access');

class PosterCategoryController extends PosterBaseController
{

    public function display($cacheable = false, $urlparams = false)
    {

        $this->category();
    
    }   	

	public function category()
	{

		$mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;

        $id = $jinput->get('category_id', '', 'INT');

        $modelProject = PFactory::getModel('category');

        $category['categoryName'] = $modelProject->getCategoryTitle($id);

        $category['projects'] = $modelProject->getProjectsByCategory($id);

        $view = $this->getView('category');

        echo $view->get('category', $category); 

	}

}