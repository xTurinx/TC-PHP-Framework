<?php

namespace Framework\Http;

class Request
{
    private static $instance;

    private $requestTimestamp;
    private $routeName;
    private $session;

    private function __construct()
    {
        $this->init();
    }

    private function init()
    {
        $calledScript = $_SERVER['SCRIPT_NAME'];
        $requestUri = $_SERVER['REQUEST_URI'];

        // remove name of php file to get the base path
        $basePath = str_replace("index.php", "", $calledScript);
        $this->routeName = "/" . str_replace($basePath, "", $requestUri);

        $this->session = Session::current();
    }

    public function getRequestTimestamp(): int
    {
        return $this->requestTimestamp;
    }

    public function getRouteName(): string
    {
        return $this->routeName;
    }

    public function getSession(): Session
    {
        return $this->session;
    }

    // There can only be one Request object per http request (makes sense isn't it? :D)
    public static function instance(): Request
    {
        if (Request::$instance == null)
        {
            Request::$instance = new Request();
        }

        return Request::$instance;
    }
}
