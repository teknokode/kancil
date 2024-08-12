<<?php 
require_once ("./vendor/autoload.php");

use Medoo\Medoo;
 
$database = new Medoo([
    // [required]
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'sertifikasi_240625',
    'username' => 'root',
    'password' => 'root',
 
    // [optional]
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_general_ci',
    'port' => 3306,
 ]);

$data = $database->select("skema", "*");

print_r($data);
 
