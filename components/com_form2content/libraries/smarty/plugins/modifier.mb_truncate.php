<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty multibyte truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a multibyte string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author  Opensource Design, code modifications based on Truncate modifier by Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @param string
 * @return string
 */
function smarty_modifier_mb_truncate($string, $length = 80, $etc = '...',
                                  $break_words = false, $middle = false, $encoding = 'UTF-8')
{
    if ($length == 0)
    {
        return '';
    }
    
    if (mb_strlen($string, $encoding) > $length) 
    {
        $length -= min($length, mb_strlen($etc, $encoding));
        
        if (!$break_words && !$middle) 
        {
            $string = preg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $length + 1, $encoding));
        }
        
        if(!$middle) 
        {
            return mb_substr($string, 0, $length, $encoding) . $etc;
        }
        else 
        {
            return mb_substr($string, 0, $length / 2, $encoding) . $etc . mb_substr($string, -$length / 2, $encoding);
        }
    } 
    else 
    {
        return $string;
    }
}

/* vim: set expandtab: */

?>
