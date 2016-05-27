<?php

defined('_JEXEC') or die('Restricted access');

class PRoute
{

    static function _($url, $xhtml = true, $ssl = null) {
        global $Itemid;

        $mainframe = JFactory::getApplication();
        $jinput = $mainframe->input;

        $cache = PFactory::getFastCache();
        $cacheid = __FILE__ . __LINE__ . serialize(func_get_args()) . $Itemid;
        if ($data = $cache->get($cacheid)) {
            $data = JRoute::_($data, $xhtml, $ssl);
            return $data;
        }

        static $itemid = array();

        parse_str(JString::str_ireplace('index.php?', '', $url));

        if (empty($view)) {
            $view = 'frontpage';
        }

        if (isset($option) && $option != 'com_poster') {
            if (!$Itemid) {
                $db = JFactory::getDBO();
                $query = 'SELECT ' . $db->quoteName('id') . ' FROM ' . $db->quoteName('#__menu') . ' '
                        . 'WHERE ' . $db->quoteName('link') . ' LIKE ' . $db->Quote('%' . $url . '%');
                $db->setQuery($query);
                $id = $db->loadResult();

                $url .= '&Itemid=' . $id;
            }

            return JRoute::_($url, $xhtml, $ssl);
        }

        if (empty($itemid[$view])) {
            global $Itemid;
            $isValid = false;

            $currentView = $jinput->get('view', 'frontpage', 'NONE'); //JRequest::getVar('view', 'frontpage');
            $currentOption = $jinput->get('option', '', 'STRING'); //JRequest::getVar('option');
            // If the current Itemid match the expected Itemid based on view
            // we'll just use it
            $db = JFactory::getDBO();
            $viewId = PRoute::_getViewItemid($view);

            // if current itemid
            if ($currentOption == 'com_community' && $currentView == $view && $Itemid != 0) {
                $itemid[$view] = $Itemid;
                $isValid = true;
            } else if ($viewId === $Itemid && !is_null($viewId) && $Itemid != 0) {
                $itemid[$view] = $Itemid;
                $isValid = true;
            } else if ($viewId !== 0 && !is_null($viewId)) {
                $itemid[$view] = $viewId;
                $isValid = true;
            }

            if (!$isValid) {
                $id = PRoute::_getDefaultItemid();
                if ($id !== 0 && !is_null($id)) {
                    $itemid[$view] = $id;
                }
                $isValid = true;
            }

            // Search the mainmenu for the 1st itemid of jomsocial we can find, that match the current language code
            if (!$isValid) {


                $db = JFactory::getDBO();
                $query = 'SELECT ' . $db->quoteName('id') . ' FROM ' . $db->quoteName('#__menu') . ' WHERE '
                        . $db->quoteName('link') . ' LIKE ' . $db->Quote('%com_community%')
                        . 'AND ' . $db->quoteName('published') . '=' . $db->Quote(1) . ' '
                        . 'AND ' . $db->quoteName('menutype') . '=' . $db->Quote('{CRoute::menuname}')
                        . 'AND ' . $db->quoteName('menutype') . '!=' . $db->Quote(CFactory::getConfig()->get('toolbar_menutype')) . ' '
                        . 'AND ' . $db->quoteName('type') . '=' . $db->Quote('component');
                $db->setQuery($query);
                $isValid = $db->loadResult();

                if (!empty($isValid)) {
                    $itemid[$view] = $isValid;
                }
            }

            // If not in mainmenu, seach in any menu
            if (!$isValid) {
                $query = 'SELECT ' . $db->quoteName('id') . ' FROM ' . $db->quoteName('#__menu') . ' WHERE '
                        . $db->quoteName('link') . ' LIKE ' . $db->Quote('%com_community%')
                        . 'AND ' . $db->quoteName('published') . '=' . $db->Quote(1) . ' '
                        . 'AND ' . $db->quoteName('menutype') . '!=' . $db->Quote($config->get('toolbar_menutype')) . ' '
                        . 'AND ' . $db->quoteName('type') . '=' . $db->Quote('component');
                $db->setQuery($query);
                $isValid = $db->loadResult();
                if (!empty($isValid))
                    $itemid[$view] = $isValid;
            }
        }

        $pos = strpos($url, '#');
        if ($pos === false) {
            if (isset($itemid[$view])) {
                if (strpos($url, 'Itemid=') === false && strpos($url, 'com_community') !== false) {
                    $url .= '&Itemid=' . $itemid[$view];
                }
            }
        } else {
            if (isset($itemid[$view]))
                $url = str_ireplace('#', '&Itemid=' . $itemid[$view] . '#', $url);
        }

        $data = JRoute::_($url, $xhtml, $ssl);
        $cache->store($url, $cacheid);
        return $data;
    }

    static function getURI($xhtml = true) {
        return htmlspecialchars(JUri::getInstance()->toString());
    }        
    
}