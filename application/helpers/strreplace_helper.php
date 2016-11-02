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


if ( ! function_exists('replace_currency'))
{
    function replace_currency($string)
    {
        $string = str_replace('Rp. ','',$string);
        $string = str_replace(',','',$string);
        
        return strtolower($string);
    }
}

if ( ! function_exists('replace_tipeexam'))
{
    function replace_tipeexam($string)
    {
        $string = str_replace('|',' ',$string);
        
        return strtolower($string);
    }
}

if ( ! function_exists('replace_sasaran'))
{
    function replace_sasaran($string)
    {
        $string = str_replace(';',',',$string);
        
        return strtolower($string);
    }
}