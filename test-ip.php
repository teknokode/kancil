<?php

print "IP Address:".getUserIP();

function getSimpleUserIP() 
{
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function getUserIP($default = NULL) 
{
    //$filter_options = 12582912;
    $filter = FILTER_FLAG_IPV6 | FILTER_FLAG_IPV4;
    
    $forwarded = isset($_SERVER) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : getenv('HTTP_X_FORWARDED_FOR');
    $client = isset($_SERVER) ? $_SERVER["HTTP_CLIENT_IP"] : getenv('HTTP_CLIENT_IP');
    $cf = isset($_SERVER) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : getenv('HTTP_CF_CONNECTING_IP');
    $remote = isset($_SERVER) ? $_SERVER["REMOTE_ADDR"] : getenv('REMOTE_ADDR');

    $all = explode(",", "$forwarded,$client,$cf,$remote");
    foreach ($all as $ip) 
    {
        if ($ip = filter_var($ip, FILTER_VALIDATE_IP, $filter)) break;
    }
    return $ip ? $ip : $default;
}