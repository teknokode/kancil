<?php

//E_ALL & ~E_WARNING & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT 
error_reporting(0 & ~E_WARNING & ~E_STRICT & ~E_NOTICE & ~E_PARSE & ~E_DEPRECATED);
ini_set('display_errors', false);
ini_set('display_startup_errors', false);

$str = "";
for($i=1; $i<=200; $i++)
{
    $str.= date("Y-m-d H:i:s") . ": Log #$i, ada apa dengan kamu?\n";
}

//file_put_contents("./storage/Logs/logs.txt", $str);
//function errorHandler(int $errNo, string $errMsg, string $file, int $line) {
function errorHandler() 
{
    $exceptions = [
        E_ERROR => "FATAL",
        E_WARNING => "WARNING",
        E_PARSE => "PARSE",
        E_NOTICE => "NOTICE",
        E_CORE_ERROR => "CORE_ERROR",
        E_CORE_WARNING => "CORE_WARNING",
        E_COMPILE_ERROR => "COMPILE_ERROR",
        E_COMPILE_WARNING => "COMPILE_WARNING",
        E_USER_ERROR => "USER_ERROR",
        E_USER_WARNING => "USER_WARNING",
        E_USER_NOTICE => "USER_NOTICE",
        E_STRICT => "STRICT",
        E_RECOVERABLE_ERROR => "RECOVERABLE_ERROR",
        E_DEPRECATED => "DEPRECATED",
        E_USER_DEPRECATED => "USER_DEPRECATED",
        E_ALL => "ALL"
    ];

    $error = error_get_last();
    if ($error)
    {
        if ($error["type"]==E_ERROR ||
            $error["type"]==E_WARNING ||
            $error["type"]==E_PARSE ||
            $error["type"]==E_USER_ERROR ||
            $error["type"]==E_USER_WARNING ||
            $error["type"]==E_USER_NOTICE ||
            $error["type"]==E_DEPRECATED ||
            $error["type"]==E_ALL)
        {

            $type = $exceptions[ $error["type"] ];
            $file = $error["file"];
            $line = $error["line"];
            $message = preg_replace('/(\s\s+|\t|\n)/', ' ', $error["message"]);
            $str = "$type - $file [$line] - $message";
            addLog( __DIR__."/storage/Logs/logs.txt", $str );

            print "Ada kesalahan, silakan periksa log error.";
            // Ganti dengan tampilan yang lebih baik
        }
    }
    return false;
}

register_shutdown_function('errorHandler');

aaaaddLog("./storage/Logs/logs.txt", "Ada error lhoo...." );

function addLog( $filename, $log)
{
    $lines = file( $filename, FILE_IGNORE_NEW_LINES );
    $count =  count( $lines );

    if( $count >= 100 )
    {
        $remove = ($count-100)+1;
        $lines = array_slice( $lines, $remove );
    }
    $lines[] = date("Y-m-d H:i:s") . ": $log\n";
    file_put_contents( $filename, substr(implode( "\n", $lines ),0,-1));
}