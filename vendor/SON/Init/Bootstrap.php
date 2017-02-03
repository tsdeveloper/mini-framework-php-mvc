<?php


namespace SON\Init;


abstract class Bootstrap
{
    private $routes;

    function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }

    abstract protected function initRoutes();
//    {
////        $routes['home'] = array("route" => '/', "controller" => "indexController", "action" => "index");
////        $routes['contact'] = array("route" => '/contact', "controller" => "indexController", "action" => "contact");
//
////        $this->setRoutes($routes);
//    }

    protected function run($url)
    {
        array_walk($this->routes,function ($route) use ($url){
            if ($url== $route['route']){
                $class = "App\\Controllers\\".ucfirst($route['controller']);
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();
            }
        });
    }

    protected  function setRoutes(array $routes)
    {
        $this->routes = $routes;
    }

    protected  function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}