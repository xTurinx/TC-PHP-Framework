<?php

namespace Framework\Http;

use Framework\System;

class RouteProvider
{
    private static $instance;

    private $routes;
    private $notFoundRoute;

    private function __construct()
    { 
        $this->routes = [];
    }

    public function add(Route $route)
    {
        $this->routes[] = $route;
    }

    public function getRoute(Request $request): Route
    {
        foreach ($this->routes as $route)
        {
            if ($route->validate($request))
            {
                return $route;
            }
        }

        return $this->notFoundRoute;
    }

    public function handleRequest(Request $request): ActionResult
    {
        $route = $this->getRoute($request);

        $controllerClass = System::CONTROLLER_NAMESPACE . $route->getControllerName();

        $controller = new $controllerClass;
        return $controller->executeActionForRoute($route, $request);
    }

    public static function instance(): RouteProvider
    {
        if (RouteProvider::$instance == null)
        {
            RouteProvider::$instance = new RouteProvider();
        }

        return RouteProvider::$instance;
    }
}
