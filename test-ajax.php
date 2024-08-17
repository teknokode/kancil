<?php

print "Request from: ";
print isBrowser() ? "Browser" : "API";

function isBrowser()
{
    $browserList[] = 'chrome';
    $browserList[] = 'chromium';
    $browserList[] = 'firefox';
    $browserList[] = 'edge';
    $browserList[] = 'opera';
    $browserList[] = 'safari';
    $browserList[] = 'samsungbrowser';
    $browserList[] = 'redmi';
    $browserList[] = 'iphone';
    $browserList[] = 'uc browser';
    $browserList[] = 'vivaldi';
    $browserList[] = 'brave';
    $browserList[] = 'maxthon';
    $browserList[] = 'palemoon';
    $browserList[] = 'blisk';
    $browserList[] = 'thorium';
    $browserList[] = 'yandex';
    $browserList[] = 'puffin';
    $browserList[] = 'qqbrowser';
    $browserList[] = 'coc coc';
    $browserList[] = 'whale';
    $browserList[] = '2345 explorer';
    $browserList[] = 'icecat';
    $browserList[] = 'lunascape';
    $browserList[] = 'seznam browser';
    $browserList[] = 'sleipnir';
    $browserList[] = 'sputnik';
    $browserList[] = 'oculus';
    $browserList[] = 'salamweb';
    $browserList[] = 'swing';
    $browserList[] = 'safe exam';
    $browserList[] = 'colibri';
    $browserList[] = 'xvast';
    $browserList[] = 'atom';
    $browserList[] = 'netcast';
    $browserList[] = 'lg browser';

    $nonBrowser = true;
    foreach($browserList as $key)
    {
        if ( isset($_SERVER['HTTP_USER_AGENT']) && (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), $key) !== false) )
        {
            //print "Check $key - true<br>";
            $nonBrowser = false;
            break;
        } else {
            //print "Check $key - false<br>";
        }
    }

    //print "nonBrowser = $nonBrowser";

    $isAjax = ( isset($_SERVER['X_REQUESTED_WITH']) && strtolower($_SERVER['X_REQUESTED_WITH']) == 'xmlhttprequest');
    $isAcceptJSON = ( isset($_SERVER['HTTP_ACCEPT']) && (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) );
    
    //print "<pre>";
    //print_r($_SERVER);

    //print "isAjax = $isAjax<br>";
    //print "isAcceptJSON = $isAcceptJSON<br>";

    if ($isAjax || $isAcceptJSON || $nonBrowser)
    {
        return false;
    }
    return true;
}

