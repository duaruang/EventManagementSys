<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('strreplace'))
{
    function strreplace($string)
    {
        $string = str_replace(' ','-',$string);
        $string = str_replace(' ','-',$string);
        $string = str_replace('/','',$string);
        $string = str_replace(',','',$string);
        $string = str_replace('.','',$string);
        
        return strtolower($string);
    }
}