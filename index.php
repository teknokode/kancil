<?php
// Mulai session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Autoload
require_once ("./vendor/autoload.php");
//require_once("app/Functions/helpers.php");

use Kancil\Core\Router;

// Inisialisai umum, silakan disesuaikan
set_time_limit(60 * 10);
date_default_timezone_set('Asia/Jakarta');

// Muat file .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeload();

// Cek mode dan set error report
if ($_ENV["MODE"]=="development")
{
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

} elseif ($_ENV["MODE"]=="production") 
{
    error_reporting(0 & ~E_WARNING & ~E_STRICT & ~E_NOTICE );
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
}

$_ENV["BASE_URL"] = rtrim( $_ENV["BASE_URL"],"/");        
$_ENV["APP_PATH"] = __dir__;

// Definisikan semua env agar mudah diakses
foreach( $_ENV as $key => $env )
{
    define($key, $env);    
}

// Mulai router
$router = new \Kancil\Core\Router;

// Definisikan route (Todo: File terpisah)
require_once(__DIR__."/routes.php");

// Cari kecocokan router dan jalankan controller yang terkait
$router->execute();

// =========================
// Selesai index
// =========================

