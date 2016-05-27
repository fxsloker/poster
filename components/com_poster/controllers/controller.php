<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_poster
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
/**
 * Poster Component Controller
 */
class PosterBaseController extends JControllerLegacy
{

    public $_name;
    public $my = null;

    function __construct($config=array())
    {
        if(!empty($config)){
            $this->_name = $config['name'];
        }
        //$this->my = PFactory::getUser();
    }

    public function getName(){
        return $this->_name;
    }    

    public function getView($viewName ='frontpage', $prefix = '', $viewType = '', $config=array())
    {
        return PFactory::getView($viewName, $prefix, $viewType);
    }

    public function getModel( $name = '', $prefix = '', $config = array() )
    {
        return PFactory::getModel($name, $prefix, $config);
    }

    public function execute($task)
    {
        $mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;
        $document = JFactory::getDocument();
        //$my = PFactory::getUser();

        $viewName = JString::strtolower($jinput->request->get('view', '', 'STRING'));

        $html = '<div id="poster-wrap" class="poster-wrapper ' . ' p' . ucfirst($viewName) . '">';
        $html .= '<div class="poster">';
        if (!empty($task) && method_exists($this, $task)) {
            ob_start();
            $this->$task();
            $output = ob_get_contents();
            ob_end_clean();
        } else {
            ob_start();
            $this->display();
            $output = ob_get_contents();
            ob_end_clean();
        }


        $html .= $output . '</div></div>';

        $html = PString::str_ireplace(array('{error}', '{warning}', '{info}'), '', $html);

        echo $html;
    }

    public function display($cachable = false, $urlparams = false)
    {
        $document = JFactory::getDocument();

        $viewType   = $document->getType();
        $viewName   = JInput::get( 'view', $this->getName() );
        $viewLayout = JInput::get( 'layout', 'default' );

        $view = $this->getView( $viewName, '', $viewType);
        
        // Display the view
        if ($cachable) {
            global $option;
            $cache = JFactory::getCache($option, 'view');
            $cache->get($view, 'display');
        } else {
            $view->profile();
        }
    }            

}