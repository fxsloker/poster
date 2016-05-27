<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.file');

class PAssets 
{

    protected function __construct($name = 'default') {
        $this->_init($name);
    }

    public static function &getInstance($name = 'default') {
        static $instances;
        if (!isset($instances[$name])) {
            $instances[$name] = new PAssets();
        }
        return $instances[$name];
    }

    public function attach($path, $type, $assetPath = '') {
        $document = JFactory::getDocument();
        if ($document->getType() != 'html')
            return;

      if (!empty($assetPath)) {
            $path = $assetPath . $path;
        } else {
            $path = JURI::root(true) . '/components/com_poster/' . JString::ltrim($path, '/');
        }

      switch ($type) {
            case 'js':
                $document->addScript($path);
                break;
            case 'css':
                //do not attach style.css if current direction is rtl (style.rtl is loaded from views/view)
                if($document->direction == 'rtl' && strpos($path,'style.css') !== false){
                    break;
                }
                $document->addStyleSheet($path);
                break;
        }
    }        

    public function _init($name) {
        $document = JFactory::getDocument();
        if ($document->getType() == 'html') {
            $document->addScriptDeclaration("post_base_url = '" . JURI::root() . "';");
            $document->addScriptDeclaration("post_assets_url = '" . JURI::root(true) . "/components/com_poster/assets/';");
            // Legacy script relative path.
            $document->addScriptDeclaration("post_script_url = '" . JURI::root(true) . "/components/com_poster/assets/_release/js/';");
        }
        /* Assets init */
        $assetFile = PFactory::getPath('assets://default.json');
        if ($assetFile) {
            $assets = json_decode(file_get_contents($assetFile));
            foreach ($assets->core->css as $css) {
                $cssFile = PFactory::getPath('assets://' . $css . '.css');
                if ($cssFile) {
                    $this->attach(JFile::getName($css) . '.css', 'css', PPath::getInstance()->toUrl(dirname($cssFile)) . '/');
                }
            }
            foreach ($assets->core->js as $js) {
                $jsFile = PFactory::getPath('assets://' . $js . '.js');
                if ($jsFile) {
                    $this->attach(JFile::getName($js) . '.js', 'js', PPath::getInstance()->toUrl(dirname($jsFile)) . '/');
                }
            }
        }

      if (JFactory::getApplication()->isSite()) {
            /* Template init */
            $lang = JFactory::getLanguage();
            $templateFile = PFactory::getPath('template://assets/' . $name . '.json');


         if ($templateFile) {
                $assets = json_decode(file_get_contents($templateFile));
                /* Load template core files */
                foreach ($assets->core->css as $css) {
                    $cssFile = PFactory::getPath('template://assets/css/' . $css . '.css');
                    if ($cssFile) {
                        $this->attach(JFile::getName($css) . '.css', 'css', PPath::getInstance()->toUrl(dirname($cssFile)) . '/');
                    }
                }
                foreach ($assets->core->js as $js) {
                    $jsFile = PFactory::getPath('template://assets/js/' . $js . '.js');
                    if ($jsFile) {
                        $this->attach(JFile::getName($js) . '.js', 'js', PPath::getInstance()->toUrl(dirname($jsFile)) . '/');
                    }
                }
                /* Load template view files */
                $view = JFactory::getApplication()->input->getWord('view');
                if (isset($assets->views->$view)) {
                    if (isset($assets->views->$view->css)) {
                        foreach ($assets->views->$view->css as $css) {
                            $cssFile = PFactory::getPath('template://assets/css/view.' . $css . '.css');
                            if ($cssFile) {
                                $this->attach('view.' . JFile::getName($css) . '.css', 'css', PPath::getInstance()->toUrl(dirname($cssFile)) . '/');
                            }
                        }
                    }
                }
                if (isset($assets->views->$view)) {
                    if (isset($assets->views->$view->js)) {
                        foreach ($assets->views->$view->js as $js) {
                            $jsFile = PFactory::getPath('template://assets/js/view.' . $js . '.js');
                            if ($jsFile) {
                                $this->attach('view.' . JFile::getName($js) . '.js', 'js', PPath::getInstance()->toUrl(dirname($jsFile)) . '/');
                            }
                        }
                    }
                }
            }
        }
    }    

}