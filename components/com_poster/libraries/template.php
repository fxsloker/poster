<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');

class PTemplate 
{

    protected $_vars;
    protected $_internalView;

    public $file;

    public function __construct($file = null) {
        // $file can also be a view object. If it is an object, assign to internal object
        if (is_object($file)) {
            $this->_internalView = $file;
        } else {
            $this->file = $file;
        }

/*        if (!isset($this->params) && empty($this->params)) {
            $this->params = $this->getTemplateParams();
        }*/
    }

    public function set($name, $value) {
        $this->_vars[$name] = $value;
        return $this;
    }

    public function fetch($file = null) {

        if (empty($file)) {
            $file = $this->file;
        }
        $tplFile = $this->_getTemplateFile('layouts/' . $file);

        if ($tplFile) {
            // Template variable: $my;
            /*$my = PFactory::getUser();
            $this->setRef('my', $my);*/

/*            if (!isset($this->_vars['config']) && empty($this->vars['config'])) {
                $this->_vars['config'] = PFactory::getConfig();
            }*/

            if ($this->_vars) {
                extract($this->_vars, EXTR_REFS);
            }

            ob_start();                   
            require($tplFile);      
            $contents = ob_get_contents(); 
            ob_end_clean();                
            $contents = PTemplate::quote($contents);
            return $contents;              
        }

        return '';
    }

    protected function _getTemplateFile($file) 
    {
        $tplFile = PFactory::getPath('template://' . $file . '.php');
        return $tplFile;
    }

    public function setRef($name, &$value) {
        $this->_vars[$name] = $value;

        return $this;
    } 

    public static function quote($str) {
        $str = str_replace('_QQQ_', '"', $str);
        return $str;
    }                   

}