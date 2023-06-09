<?php

namespace App\Core;

class Route
{

    protected static $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function get($path, array $action)
    {
        self::$routes['GET'][$path] = $action; 
    }

    public static function post($path, array $action)
    {
        self::$routes['POST'][$path] = $action; 
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function uri()
    {
        return $_SERVER['REQUEST_URI'];
    }
}