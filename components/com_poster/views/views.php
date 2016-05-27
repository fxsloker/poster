<?php

defined('_JEXEC') or die();

jimport('joomla.application.component.view');

class PosterView extends JViewLegacy 
{

    public $_info = array();
    public $_warning = array();

    public function __construct($config = array()) {
        $mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;
        //$this->my = PFactory::getUser();

        parent::__construct($config);

        $view = $jinput->request->get('view', '');
        
        $this->set('assets', PAssets::getInstance());
    }    

    public function get($tplName, $data = null, $cached = false) {

        if (!empty($tplName) && is_callable(array($this, $tplName))) {
            ob_start();
            $this->$tplName($data);
            $html = ob_get_contents();
            ob_end_clean();

            
            $info = '';
            if (!empty($this->_info)) {
                foreach ($this->_info as $msg) {
                    $info .= $this->info($msg);
                }
            }

            $warning = '';
            if (!empty($this->_warning)) {
                foreach ($this->_warning as $msg) {
                    $warning .= $this->warning($msg);
                }
            }

            $error = '';
            $messages = array($error, $warning, $info);

            // append all warning, error and info
            $html = PString::str_ireplace(array('{error}', '{warning}', '{info}'), $messages, $html);
            return $html;
        } else {
            JError::raiseError(500, JText::sprintf('COM_COMMUNITY_VIEW_NOT_FOUND', $tplName));
        }
    }

    public function addWarning($message) 
    {

        $mainframe = JFactory::getApplication();
        $mainframe->enqueueMessage($message, 'notice');
    
    }        
    
}