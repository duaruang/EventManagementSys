<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('length'))
{
    function length($text, $length = 100)
    {
        $text = substr($text, 0, $length);
        $text2 = strrev($text);
        $pos = strpos($text2, ' ')+1;
        $text = trim(substr($text, 0, $length-$pos));
        return $text;
    }
}