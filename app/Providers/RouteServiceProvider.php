<?php 

namespace App\Providers;

use App\Core\Route;

class RouteServiceProvider extends Route
{

    public function resolve()
    {
        $action = array_key_exists($this->uri(), self::$routes[$this->method()]) ? self::$routes[$this->method()][$this->uri()] : null;
        is_null($action) ? $this->handleFalseRoutes() : $this->handleTrueRoutes();
    }

    public function handleTrueRoutes()
    {
        echo 'this is a valid route';
    }

    public function handleFalseRoutes()
    {
        echo 'this route does not exist';
    }

}