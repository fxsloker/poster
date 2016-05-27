<?php

defined('_JEXEC') or die('Restricted access');

class PPassword
{

    public static function make($password, $algo = PASSWORD_DEFAULT, array $options = array())
    {

        return password_hash($password, $algo, $options);
    
    }	

    public static function verify($password, $hash)
    {

        return password_verify($password, $hash);
    
    }    

}