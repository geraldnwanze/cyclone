<?php 

namespace App\Providers;

use App\Core\Route;

class RouteServiceProvider extends Route
{

    protected $action;

    public function resolve()
    {
        $this->action = array_key_exists($this->uri(), self::$routes[$this->method()]) ? self::$routes[$this->method()][$this->uri()] : null;
        is_null($this->action) ? $this->handleFalseRoutes() : $this->handleTrueRoutes();
    }

    public function handleTrueRoutes()
    {
        $this->classExists()->methodExists()->initiate();
        
    }

    private function classExists()
    {
        if (!class_exists($this->action[0])) {
            echo "Controller not found";
            return;
        }
        return $this;
    }

    private function methodExists()
    {
        if (!method_exists($this->action[0], $this->action[1])) {
            echo "Method not found";
            return;
        }
        return $this;
    }

    private function initiate()
    {
        call_user_func([new $this->action[0], $this->action[1]]);
        return $this;
    }

    private function handleFalseRoutes()
    {
        echo 'this route does not exist';
    }

}