<?php

defined('_JEXEC') or die('Restricted access');

class PosterModelUser extends JModelLegacy
{

    public function getUserId($username, $useRealName = false) {
        $db = $this->getDBO();

        $param = 'username';

        if ($useRealName)
            $param = 'name';

        $sql = 'SELECT ' . $db->quoteName('id') . ' FROM ' . $db->quoteName('#__users')
                . ' WHERE ' . $db->quoteName($param) . '=' . $db->Quote($username);

        $db->setQuery($sql);
        $result = $db->loadResult();

        if ($db->getErrorNum()) {
            JError::raiseError(500, $db->stderr());
        }

        return $result;
    }

}