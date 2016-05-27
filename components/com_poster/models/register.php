<?php

defined('_JEXEC') or die('Restricted access');

class PosterModelRegister extends JModelLegacy
{

    public $return_value = array();

    public function addTempUser($data)
    {
        $db    = $this->getDBO();

        //get current session id.
        $mySess     = JFactory::getSession();
        $token      = $mySess->get('JS_REG_TOKEN','');

        $nowDate = JFactory::getDate();
        $nowDate = $nowDate->toSql();

        $obj = new stdClass();
        $obj->username          = $data['username'];
        $obj->token         = $token;
        $obj->email         = $data['email'];
        $obj->password      = $data['password'];
        $obj->created       = $nowDate;
        $obj->ip            = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

        //@todo Temp fix for joomla 3.2.0.Remove in the future.
        if(!version_compare(JVERSION,'3.2.0','='))
        {
            //no clear text password store in db
            jimport('joomla.user.helper');
            $salt           = JUserHelper::genRandomPassword(32);
            $crypt          = JUserHelper::getCryptedPassword($obj->password, $salt);
            $obj->password  = $crypt.':'.$salt;
        }

        $db->insertObject('#__poster_register', $obj);

        if($db->getErrorNum()) {
            JError::raiseError( 500, $db->stderr());
        }

        $this->return_value[__FUNCTION__] = true;
        return $this;
    }

    public function getTempUser($token) {
        $db    = $this->getDBO();

        $query = 'SELECT *, '.$db->quoteName('password').' as '.$db->quoteName('password2')
                .' FROM '.$db->quoteName('#__poster_register');
        $query .= ' WHERE '.$db->quoteName('token').' = '.$db->Quote($token);
        $db->setQuery($query);
        if($db->getErrorNum()) {
            JError::raiseError( 500, $db->stderr());
        }
        $result = $db->loadObject();

        $user   = new JObject;
        $user->setProperties($result);

        return $user;
    }    

    public function addAuthKey ($authKey='')
    {
        $db    = $this->getDBO();

        //get current session id.
        $mySess     = JFactory::getSession();
        $token      = $mySess->get('JS_REG_TOKEN','');

        $nowDate = JFactory::getDate();
        $nowDate = $nowDate->toSql();

        $obj = new stdClass();
        $obj->token         = $token;
        $obj->auth_key      = $authKey;
        $obj->created       = $nowDate;
        $obj->ip            = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];

        $db->insertObject('#__poster_register_auth_token', $obj);

        if($db->getErrorNum()) {
            JError::raiseError( 500, $db->stderr());
        }

        $this->return_value[__FUNCTION__] = true;
        return $this;
    }

    public function cleanTempUser(){
        $nowDate        = JFactory::getDate();
        $nowDateMysql   = $nowDate->toSql();
        $app = JFactory::getApplication();

        $lifetime   = $app->getCfg('lifetime');

        $db    = $this->getDBO();

        $query = 'DELETE FROM '.$db->quoteName('#__poster_register');
        $query .= ' WHERE '.$db->quoteName('created').' <= DATE_SUB('.$db->Quote($nowDateMysql).',  INTERVAL '.$lifetime.' MINUTE)';

        $db->setQuery($query);
        $db->query();

        //
        $query = 'DELETE FROM '.$db->quoteName('#__poster_register_auth_token');
        $query .= ' WHERE '.$db->quoteName('created').' <= DATE_SUB('.$db->Quote($nowDateMysql).',  INTERVAL '.$lifetime.' MINUTE)';

        $db->setQuery($query);
        $db->query();

    }   

    public function getAssignedAuthKey ($token='', $ip='')
    {
        $authKey        = "";
        $curDate        = JFactory::getDate();
        $curDateMysql   = $curDate->toSql();

        $db    = $this->getDBO();

        $query = 'SELECT '.$db->quoteName('auth_key').' FROM '.$db->quoteName('#__poster_register_auth_token');
        $query .= ' WHERE '.$db->quoteName('token').' = ' . $db->Quote($token);
        $query .= ' AND '.$db->quoteName('ip').' = ' . $db->Quote($ip);

        $db->setQuery($query);

        if($db->getErrorNum()) {
            JError::raiseError( 500, $db->stderr());
        }

        $authKey    = $db->loadResult();
        return $authKey;
    }

    public function updateAuthKey ($token='', $authKey='',$ip='')
    {
        $authKey    = "";
        $db         = $this->getDBO();

        $expiryPeriod   = "600";

        $query = 'UPDATE '.$db->quoteName('#__poster_register_auth_token');
        $query .= ' SET '.$db->quoteName('created').' = DATE_ADD('.$db->quoteName('created').', INTERVAL '. $expiryPeriod . ' SECOND)';
        $query .= ' WHERE '.$db->quoteName('token').' = ' . $db->Quote($token);
        $query .= ' AND '.$db->quoteName('auth_key').' = ' . $db->Quote($authKey);
        $query .= ' AND '.$db->quoteName('ip').' = ' . $db->Quote($ip);

        $db->setQuery($query);
        $db->query();

        if($db->getErrorNum())
        {
            JError::raiseError( 500, $db->stderr());
        }

        return $this;
    }

    public function removeTempUser($token){
        $db    = $this->getDBO();

        $query = 'DELETE FROM '.$db->quoteName('#__poster_register');
        $query .= ' WHERE '.$db->quoteName('token').' = '.$db->Quote($token);

        $db->setQuery($query);
        $db->query();
        if($db->getErrorNum()) {
            JError::raiseError( 500, $db->stderr());
        }
    }

    public function removeAuthKey ($token='')
    {
        $db    = $this->getDBO();

        $query = 'DELETE FROM '.$db->quoteName('#__poster_register_auth_token');
        $query .= ' WHERE '.$db->quoteName('token').' = '.$db->Quote($token);

        $db->setQuery($query);
        $db->query();
        if($db->getErrorNum()) {
            JError::raiseError( 500, $db->stderr());
        }
    } 

    public function getSuperAdministratorEmail()
    {
        $db         = $this->getDBO();

        $query      = 'SELECT a.' . $db->quoteName('name').', a.'.$db->quoteName('email').', a.'.$db->quoteName('sendEmail')
                        . ' FROM ' . $db->quoteName('#__users') . ' as a, '
                        . $db->quoteName('#__user_usergroup_map') . ' as b'
                        . ' WHERE a.' . $db->quoteName('id') . '= b.' . $db->quoteName('user_id')
                        . ' AND b.' . $db->quoteName( 'group_id' ) . '=' . $db->Quote( 8 ) ;

        $db->setQuery( $query );

        if($db->getErrorNum()) {
            JError::raiseError( 500, $db->stderr());
        }

        $result = $db->loadObjectList();
        return $result;

    }                            

}