<?php

namespace src\Core;


use src\Controllers\Controller;

class Router
{
    private array $routes;
    private string $uri;
    private Controller $controller;
    private string $method;

    public function __construct()
    {
        $this->routes = require_once $_SERVER['DOCUMENT_ROOT'] . '/routes.php';
        $this->parseUri()->routeExists()->buildController()->callAction();

    }

    private function parseUri()
    {
        $this->uri = strtok($_SERVER["REQUEST_URI"], '?');
        return $this;
    }

    private function routeExists()
    {
        if (array_key_exists($this->uri, $this->routes)) {
            return $this;
        } else {
            http_response_code(404);
            die('Not found');
        }
    }

    private function buildController()
    {
        if (class_exists($this->routes[$this->uri][0])) {
            $this->controller = new $this->routes[$this->uri][0]();
            if ($this->controller instanceof Controller) {
                $this->method = $this->routes[$this->uri][1];
                return $this;
            } else {
                die ('Controller must be instanceof Controller::class');
            }
        } else {
            die ('Class: ' . $this->routes[$this->uri][0] . ' not found');
        }
    }

    private function callAction()
    {
        $method = $this->method;
        return $this->controller->$method();
    }
}


