<?php

if (!function_exists('vb_encrypt')) {
    function vb_encrypt($string)
    {
        $result = "";
        $chars = str_split(trim($string));

        foreach ($chars as $c) {
            $ascii = ord($c);
            $enc = 255 - $ascii;
            $hex = strtoupper(str_pad(dechex($enc), 2, '0', STR_PAD_LEFT));
            $result .= $hex;
        }

        return $result;
    }
}
