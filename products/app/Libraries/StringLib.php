<?php

namespace App\Libraries;

class StringLib
{
    public static function slug($str)
    {
        $str = \Str::slug($str);
        return $str;
    }
}