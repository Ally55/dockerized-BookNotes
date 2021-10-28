<?php

namespace BookNotes\Core;

class Router
{
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file) {
        $router = new static;
        require $file;

        return $router;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function direct($uri, $requestedMethod) {
        if (array_key_exists($uri, $this->routes[$requestedMethod])) {
            return $this->action(...explode('@', $this->routes[$requestedMethod][$uri]));
        }

        return $this->action('ErrorsController', 'notFound');
    }

    protected function action($controller, $action) {
        $controller = "BookNotes\\Controllers\\{$controller}";

        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new \Exception("{$controller} does not respond to the {$action} action.");
        }
        return $controller->$action();
    }
}