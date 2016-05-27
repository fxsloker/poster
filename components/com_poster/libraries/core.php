<?php

defined('_JEXEC') or die('Restricted access');

JLoader::discover('P', POSTER_COM_PATH . '/libraries');

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

spl_autoload_register('PFactory::autoload_libraries');

class PFactory 
{

    static $instances = array();

    public static function getUser($id = null, $obj = null) {
        $db = JFactory::getDBO();
        $mainframe = JFactory::getApplication();

        if ($id === 0) {
            $user = JFactory::getUser();
            $id = $user->id;
        } else {
            if ($id == null) {
                $user = JFactory::getUser();
                $id = $user->id;
            }

            if ($id != null && !is_numeric($id)) {
                $db = JFactory::getDBO();
                $query = 'SELECT ' . $db->quoteName('id') . ' FROM ' . $db->quoteName('#__users') . ' WHERE UCASE(' . $db->quoteName('username') . ') like UCASE(' . $db->Quote($id) . ')';
                $db->setQuery($query);
                $id = $db->loadResult();
            }
        }

        if (empty(self::$instances[$id])) {
            if (!is_numeric($id) && !is_null($id)) {
                JError::raiseError(500, JText::sprintf('COM_COMMUNITY_CANNOT_LOAD_USER', $id));
            }

            self::$instances[$id] = new PUser($id);
            $isNewUser = self::$instances[$id]->init();

            if ($isNewUser) {
                // New user added to jomSocial database
                // trigger event onProfileInit
/*                $appsLib = CAppPlugins::getInstance();
                $appsLib->loadApplications();*/

                $args = array();
                $args[] = self::$instances[$id];
/*                $appsLib->triggerEvent('onProfileCreate', $args);*/
            }

            // Guess need to have avatar as well.
            if ($id == 0) {
                JFactory::getLanguage()->load('com_poster');

                self::$instances[$id]->name = JText::_('COM_COMMUNITY_ACTIVITIES_GUEST');
                self::$instances[$id]->username = JText::_('COM_COMMUNITY_ACTIVITIES_GUEST');
                self::$instances[$id]->avatar = 'components/com_community/assets/default.jpg';
                self::$instances[$id]->thumb = 'components/com_community/assets/default_thumb.jpg';
            }
        }
        return self::$instances[$id];        

    }

    static function autoload_libraries($classname) {
        $classes = array(
            'PUser' => '/libraries/user.php',
            'PPath' => '/libraries/path.php',
            'PTemplate' => '/libraries/template.php',
            'PRoute' => '/libraries/route.php',
            'PString' => '/libraries/string.php',
            'PPassword' => '/libraries/password.php',
            'PAssets' => '/libraries/assets.php'
        );

        if (array_key_exists($classname, $classes)) {
            if (!class_exists($classname)) {
                require_once(JPATH_ROOT . '/components/com_poster' . $classes[$classname]);
            }
        }
    }

    public static function getPath($key) {
        $path = PPath::getInstance();
        return $path->getPath($key);
    }

    static public function setCurrentURI() {
        $uri = JFactory::getURI();
        $current = $uri->toString();

        setcookie('currentURI', $current, time() + 60 * 60 * 24, '/');
    }   
    
    static public function getModel($name = '', $prefix = '', $config = array()) {
        static $modelInstances = null;

        if (!isset($modelInstances)) {
            $modelInstances = array();
            //include_once(JPATH_ROOT . '/components/com_poster/libraries/error.php');
        }

        if (!isset($modelInstances[$name . $prefix])) {
            include_once( JPATH_ROOT . '/components/com_poster/models/models.php');

            $modelFile = JPATH_ROOT . '/components/com_poster/models/' . strtolower($name) . '.php';
            if (!JFile::exists($modelFile)) {
                $modelInstances[$name . $prefix] = false;
            } else {
                include_once( $modelFile );
                $classname = $prefix . 'PosterModel' . $name;
                $modelInstances[$name . $prefix] = new $classname;
            }
        }

        return $modelInstances[$name . $prefix];
    }

    static public function getView($name = '', $prefix = '', $viewType = '') {
        static $viewInstances = null;

/*        if (!isset($viewInstances)) {
            $viewInstances = array();
            include_once(JPATH_ROOT . '/components/com_community/libraries/error.php');
        }*/

        $mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;

        $viewType = $jinput->request->get('format', 'html', 'NONE'); 

        if ($viewType == 'json')
            $viewType = 'html';

        if (!isset($viewInstances[$name . $prefix . $viewType])) {

            jimport('joomla.filesystem.file');

            $viewFile = JPATH_COMPONENT . '/views' . '/' . $name . '/view.' . $viewType . '.php';
            if (JFile::exists($viewFile)) {
                include_once( $viewFile );
            } else {
                //@rule: when feed is not available, we include the main view file.
                if ($viewType == 'feed') {
                    include_once( JPATH_COMPONENT . '/views' . '/' . $name . '/view.html.php' );
                } else {
                    return JError::raiseError(404, JText::_('COM_POSTER_VIEW_NOT_FOUND'));
                }
            }

            $classname = $prefix . 'PosterView' . ucfirst($name);
            if (!class_exists($classname)) {
                return JError::raiseError(404, JText::_('COM_POSTER_VIEW_NOT_FOUND'));
            }

            $viewInstances[$name . $prefix . $viewType] = new $classname;
        }

        return $viewInstances[$name . $prefix . $viewType];
    }                 

}