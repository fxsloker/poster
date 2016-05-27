<?php

defined('_JEXEC') or die('Restricted access');

class PPath
{

    protected $_namespaces = array();

    protected function __construct() 
    {
        $this->_init();
    }    

    public static function &getInstance($name = 'poster') 
    {
        static $instances;
        if (!isset($instances[$name])) {
            $instances[$name] = new PPath();
        }
        return $instances[$name];
    }

    protected function _init() 
    {
        $this->registerNamespace('poster', JPATH_ROOT . '/components/com_poster');
        /* Templates */
        $this->registerNamespace('template', JPATH_ROOT . '/components/com_poster/templates/poster'); 
        //$this->registerNamespace('template', JPATH_ROOT . '/components/com_poster/templates/' . PFactory::getConfig()->get('template', 'default')); 
        $this->registerNamespace('template', JPATH_ROOT . '/templates/' . JFactory::getApplication()->getTemplate() . '/html/com_poster');
        /* Assets */
        $this->registerNamespace('assets', JPATH_ROOT . '/administrator/components/com_poster/assets');
        $this->registerNamespace('assets', JPATH_ROOT . '/components/com_poster/assets'); 
        $this->registerNamespace('assets', JPATH_ROOT . '/administrator/templates/' . JFactory::getApplication()->getTemplate() . '/html/com_poster/assets');


    }

    public function registerNamespace($namespace, $path) {
        if (!isset($this->_namespaces[$namespace])) {
            $this->_namespaces[$namespace] = array();
        }
        array_unshift($this->_namespaces[$namespace], $path);
        return $this;
    }    

    public function getPath($key, $showError = false) {

        $parts = explode('://', $key);
        if (is_array($parts) && count($parts) == 2) {
            $namespace = $parts[0];
            $path = $parts[1];

            /* Make sure this namespace is registered */
            if (isset($this->_namespaces[$namespace])) {
                /* Find first exists filePath */
                foreach ($this->_namespaces[$namespace] as $namespace) {
                    $physicalPath = $namespace . '/' . $path;
                    if (JFile::exists($physicalPath)) {
                        return str_replace('/', DIRECTORY_SEPARATOR, $physicalPath);
                    } elseif (JFolder::exists($physicalPath)) {
                        return str_replace('/', DIRECTORY_SEPARATOR, $physicalPath);
                    }
                }
            }
        }
        if ($showError)
            JFactory::getApplication()->enqueueMessage('Path not found: ' . $key, 'error');
        return false;
    }

    public function toUrl($path) {
        return JUri::root(true) . str_replace('\\', '/', str_replace(JPATH_ROOT, '', $path));
    }                

}