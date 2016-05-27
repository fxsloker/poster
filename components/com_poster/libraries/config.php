<?php

defined('_JEXEC') or die('Restricted access');

class PConfig 
{

/*    static public function &getInstance() {
        static $instance = null;
        if (!$instance) {
            jimport('joomla.filesystem.file');

            $ini = JPATH_ROOT . '/administrator/components/com_poster/default.ini';
            $data = JFile::read($ini);

            $instance = new PConfig();
            $instance->_jparam = new PParameter($data);

            JTable::addIncludePath(JPATH_ROOT . '/administrator/components/com_poster/tables');
            $config = JTable::getInstance('configuration', 'CommunityTable');
            $config->load('config');

            $instance->_jparam->bind($config->params);

            // call trigger to allow configuration override
            $appsLib = CAppPlugins::getInstance();
            $appsLib->loadApplications();

            $args = array();
            $args[] = $instance;
            $appsLib->triggerEvent('onAfterConfigCreate', $args);

            $overrideTimeFormat = array('%b %d' => 'M d Y', '%d %b' => 'd M Y');
            $eventdateFormat = $instance->_jparam->get('eventdateformat');
            if (strpos($eventdateFormat, '%') !== false) {
                $eventdateFormat = $overrideTimeFormat[$eventdateFormat];
            }

            $profileDateFormat = $instance->_jparam->get('profileDateFormat');
            $profileDateFormat = str_replace('%', '', $profileDateFormat);

            $instance->_jparam->set('profileDateFormat', $profileDateFormat);
            $instance->_jparam->set('eventdateformat', $eventdateFormat);
            $instance->_jparam->set('activitiesdayformat', 'F d');
            $instance->_jparam->set('activitiestimeformat', 'h:i A');
        }

        return $instance;
    }    */

}