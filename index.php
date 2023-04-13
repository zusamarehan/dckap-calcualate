<?php

$app = [];
session_start();
require 'connection.php';
require 'Core/Router.php';
$app['db'] = (new Database())->db;

$router = new \Core\Router();

$router->get('/', 'Controllers/home.php');
$router->get('/registration', 'Controllers/Registration/registration.php');
$router->get('/register', 'Controllers/Registration/register.php');
$router->get('/logout', 'Controllers/Logout/logout.php');
$router->get('/login', 'Controllers/Login/login.php');
$router->get('/login-logic', 'Controllers/Login/login-logic.php');

require $router->route();

?>
