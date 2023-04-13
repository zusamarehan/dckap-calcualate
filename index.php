<?php

$app = [];
session_start();
require 'connection.php';
$app['db'] = (new Database())->db;

$routes = [
    '/' => 'Controllers/home.php',
    '/list' => 'Controllers/list.php',
    '/calculate' => 'Controllers/calculate.php',
    '/delete' => 'Controllers/delete.php',
    '/edit' => 'Controllers/edit.php',
    '/update' => 'Controllers/update.php',
    '/registration' => 'Controllers/Registration/registration.php',
    '/register' => 'Controllers/Registration/register.php',
    '/logout' => 'Controllers/Logout/logout.php',
    // to display the form
    '/login' => 'Controllers/Login/login.php',
    // to do the actual login logic
    '/login-logic' => 'Controllers/Login/login-logic.php',
];

if (array_key_exists($_SERVER['REQUEST_URI'], $routes)) {
    require $routes[$_SERVER['REQUEST_URI']];
} else {
    http_response_code(404);
    require 'Views/errors/404.view.php';
}

?>
