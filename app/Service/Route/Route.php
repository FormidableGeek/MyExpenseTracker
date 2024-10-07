<?php

namespace Plg\MyMoneyExpenseTracker\Service\Route;
use Plg\MyMoneyExpenseTracker\Controllers\UserController;



class Route{
    protected array $route=[];

    public function get($uri,$controller)
    {
        $this->route['GET'][$uri]=$controller;
    }

    public function post($uri,$controller)
    {
        $this->route['POST'][$uri]=$controller;
    }

    public function dispatch($method,$uri)
    {
        if(array_key_exists($uri,$this->route[$method])){
            $controllerAction=explode('.',$this->route[$method][$uri]);
            $c= $controllerAction[0];
            $controller= new $c();
            $controllerMethod=$controllerAction[1];
            $controller->$controllerMethod();


        }else{
            echo "Page not found";
        }


    }
}
