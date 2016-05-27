<?php

defined('_JEXEC') or die();

class PString 
{

    static public function str_ireplace($search, $replace, $str, $count = NULL) {
        if ($count === FALSE) {
            return self::_utf8_ireplace($search, $replace, $str);
        } else {
            return self::_utf8_ireplace($search, $replace, $str, $count);
        }
    }

    static public function _utf8_ireplace($search, $replace, $str, $count = NULL) {

        if (!is_array($search)) {

            $slen = strlen($search);
            $lendif = strlen($replace) - $slen;
            if ($slen == 0) {
                return $str;
            }

            $search = JString::strtolower($search);

            $search = preg_quote($search, '/');
            $lstr = JString::strtolower($str);
            $i = 0;
            $matched = 0;
            while (preg_match('/(.*)' . $search . '/Us', $lstr, $matches)) {
                if ($i === $count) {
                    break;
                }
                $mlen = strlen($matches[0]);
                $lstr = substr($lstr, $mlen);
                $str = substr_replace($str, $replace, $matched + strlen($matches[1]), $slen);
                $matched += $mlen + $lendif;
                $i++;
            }
            return $str;
        } else {

            foreach (array_keys($search) as $k) {

                if (is_array($replace)) {

                    if (array_key_exists($k, $replace)) {

                        $str = PString::_utf8_ireplace($search[$k], $replace[$k], $str, $count);
                    } else {

                        $str = PString::_utf8_ireplace($search[$k], '', $str, $count);
                    }
                } else {

                    $str = PString::_utf8_ireplace($search[$k], $replace, $str, $count);
                }
            }
            return $str;
        }
    }        

}