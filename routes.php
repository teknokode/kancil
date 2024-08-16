<?php

// Contoh route untuk non-API
$router->get('/', "App\Controllers\Home::index", "App\Filters\Login::index");
$router->get('/home', "App\Controllers\Home::index");
$router->get('/skema/:id', "App\Controllers\Home::index");
$router->get('/skema', "App\Controllers\Home::index");

// Contoh route untuk API
$router->get('/api', "App\Controllers\Testapi::index");
$router->get('/api/auth', "App\Controllers\Testapi::auth");
$router->get('/api/skema', "App\Controllers\Testapi::skema");
$router->get('/api/token', "App\Controllers\Testapi::token");
