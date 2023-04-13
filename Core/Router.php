<?php

namespace Core;

use Core\AuthMiddleware;
use Core\GuestMiddleware;

class Router
{
    public $routes = [];

    public function only($middleware)
    {
        $this->routes[count($this->routes) - 1]['middleware'] = $middleware;
    }

    public function get($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET',
            'middleware' => null
        ];

        return $this;
    }

    public function post($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST',
            'middleware' => null
        ];

        return $this;
    }

    public function delete($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE',
            'middleware' => null
        ];

        return $this;
    }

    public function patch($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PATCH',
            'middleware' => null
        ];

        return $this;
    }

    public function route()
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $_SERVER['REQUEST_URI']) {
                
                if ($route['middleware'] === 'auth') {
                    (new AuthMiddleware())->handle();
                }

                if ($route['middleware'] === 'guest') {
                    (new GuestMiddleware())->handle();
                }

                return $route['controller'];
            }
        }

        exit();
    }
}
