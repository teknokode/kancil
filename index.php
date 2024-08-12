<?php
// Mulai session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Autoload
require_once("./vendor/autoload.php");
//require_once("app/Functions/helpers.php");

use Kancil\Core\Router;

// Muat file .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeload();

$_ENV["BASE_URL"] = rtrim( $_ENV["BASE_URL"],"/");        
$_ENV["APP_PATH"] = __dir__;

// Definisikan semua env agar mudah diakses
foreach( $_ENV as $key => $env )
{
    define($key, $env);    
}

// Mulai router
$router = new Router;

// Definisikan route (Todo: File terpisah)
require_once(__DIR__."/routes.php");

// Cari kecocokan router dan jalankan controller yang terkait
$router->execute();

// =========================
// Selesai index
// =========================

