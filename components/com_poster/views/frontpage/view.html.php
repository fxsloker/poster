<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla view library
jimport('joomla.application.component.view');
/**
 * HTML View class for the HelloWorld Component
 */
class PosterViewFrontpage extends JViewLegacy
{

    protected $_url;

    function __construct($config=array())
    {
        
        $this->_url = 'index.php?option=com_poster&view=frontpage';
        parent::__construct($config);
    }    

    // Overwriting JView display method
    function display($tpl = null)
    {
echo 'frontpage';
        
    }
}