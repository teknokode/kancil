<?php
// Mulai session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Autoload
require_once("./vendor/autoload.php");
require_once("app/Functions/helpers.php");

//use App\Core\Database;
use Kancil\Core\Router;
//use App\Drivers\Mysql;

// Muat file .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeload();

$_ENV["BASE_URL"] = rtrim( $_ENV["BASE_URL"],"/");        

// Definisikan semua env agar mudah diakses
foreach( $_ENV as $key => $env )
{
    define($key, $env);    
}

define("APP_PATH", __dir__);

//print $_SERVER['REQUEST_URI'];

//print "<pre><code>";
//print_r($_ENV);
//pd($_ENV);

// Definisikan base_url, dst


//print_r(get_defined_constants(true)["user"]);
// $dbObject = Database::getInstance();
// $this->db = $dbObject->getConnection();

// $db = new Database;
// $my = new Mysql;

// Mulai router
$router = new Router;

// Definisikan route (Todo: File terpisah)
require_once(__DIR__."/routes.php");

//print "Route match\n";

// Cari kecocokan router dan jalankan controller yang terkait
$router->execute();

// Check router
// $result = $router->match();

// // Bila route ditemukan, panggil target class/method nya

// //pd($result);
// $target = $result["target"];
// $filter = $result["filter"];

// $success = true;
// if (!empty($filter))
// {
//     list($class,$method) = explode("::", $filter);
//     $object = new $class();
//     $success = call_user_func_array(array($object, $method), $result["params"]);
// }

// if ($success)
// {
//     list($class,$method) = explode("::", $target);
//     $object = new $class();
//     call_user_func_array(array($object, $method), $result["params"]);
// }

