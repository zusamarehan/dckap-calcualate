<?php

$app = [];
session_start();
require 'connection.php';
require 'Core/Router.php';
$app['db'] = (new Database())->db;

$router = new \Core\Router();

$router->get('/', 'Controllers/home.php')->only('auth');
$router->get('/registration', 'Controllers/Registration/registration.php');
// $router->get('/register', 'Controllers/Registration/register.php')->only('guest');
// $router->get('/logout', 'Controllers/Logout/logout.php')->only('auth');
// $router->get('/login', 'Controllers/Login/login.php')->only('guest');
// $router->get('/login-logic', 'Controllers/Login/login-logic.php')->only('guest');


$router->route();
var_dump($router->routes);
die();

?>
