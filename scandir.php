<?php

$buffer="";

function getDirContents($dir, &$results = array()) 
{
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if ( $value!="vendor" &&
             $value!="storage" && 
             $value!=".phpdoc" &&
             $value!=".git" ) {

            if (!is_dir($path)) 
            {
                if (strpos($value,".php")) {
                    $results[] = $path;
                    //$php["$path"] = $value;
                    $newPath = str_replace( __DIR__,"", $path);
                    $newPath = str_replace( "/".$value,"", $path);
                    $GLOBALS["buffer"] .= "$newPath|$value\n";
                }
            } else if ($value != "." && $value != "..") {
                getDirContents($path, $results);
                $results[] = $path;
            }
        }
    }
    return $results;
}


var_dump(getDirContents('.'));

print __DIR__;
print "\n\n";
print $buffer;
file_put_contents("scandir.txt", $buffer);

Regex: function [A-Za-z0-9]+\((.*)\)