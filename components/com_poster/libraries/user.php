<?php

defined('_JEXEC') or die();

class PUser extends JUser 
{

    public $userid = 0;
    public $init = false;
    public $avatar = '';
    public $cover = '';
    public $followers = 0;
    public $following = 0;

    public function PUser($id) {

        if ($id == null) {
            $user = JFactory::getUser($id);
            $id = $user->id;
        }

        $this->id = $id;
    }

    public function init($initObj = null) {
        $isNewUser = false;

        if (!$this->init) {
            $db = JFactory::getDBO();
            $obj = $initObj;

            if ($initObj == null) {
                $query = 'SELECT '
                        . ' a.' . $db->quoteName('userid') . ' as userid , '
                        . ' a.' . $db->quoteName('avatar') . '  as avatar , '
                        . ' a.' . $db->quoteName('cover') . '   as cover , '
                        . ' a.' . $db->quoteName('followers') . '   as followers , '
                        . ' a.' . $db->quoteName('following') . '   as following , u.* '
                        . ' FROM ' . $db->quoteName('#__poster_users') . ' as a '
                        . ' LEFT JOIN ' . $db->quoteName('#__users') . ' u '
                        . ' ON u.' . $db->quoteName('id') . '=a.' . $db->quoteName('userid')
                        . ' WHERE a.' . $db->quoteName('userid') . '=' . $db->Quote($this->id);

                $db->setQuery($query);
                $obj = $db->loadObject();
                if ($db->getErrorNum()) {
                    JError::raiseError(500, $db->stderr());
                }
            }

            // Initialise new user
            if (empty($obj)) {
                if (!$obj && ($this->id != 0)) {
                    // @rule: ensure that the id given is correct and exists in #__users
                    $existQuery = 'SELECT COUNT(1) FROM ' . $db->quoteName('#__users') . ' '
                            . 'WHERE ' . $db->quoteName('id') . '=' . $db->Quote($this->id);

                    $db->setQuery($existQuery);

                    $isValid = $db->loadResult() > 0 ? true : false;

                    if ($isValid) {
                        // We need to create a new record for this specific user first.

                        $obj = new stdClass();

                        $obj->userid = $this->id;
                        $obj->avatar = '';

                        $db->insertObject('#__poster_users', $obj);

                        if ($db->getErrorNum()) {
                            JError::raiseError(500, $db->stderr());
                        }

                        // Reload the object
                        $db->setQuery($query);
                        $obj = $db->loadObject();

                        $isNewUser = true;
                    }
                }
            }


            if ($obj) {
                $thisVars = get_object_vars($this);

                foreach ($thisVars as $key => $val) {
                    if (isset($obj->$key)) {
                        $this->$key = $obj->$key;
                    }
                }

                #correct the friendcount here because blocked user are still counted in "friendcount"
                //$model    = CFactory::getModel( 'friends' );
                //$realfriendcount = $model->getFriendsCount($this->id);
                //$this->_friendcount = $realfriendcount;
                // Update group list if we haven't get
                    $this->save();
            } else {
                // this is a visitor, we still have to create params object for them

            }

            $this->init = true;
        }

        return $isNewUser;
    }

}