<?php

namespace Framework;

use Framework\Http\Request;
use Framework\Http\Session;
use Framework\Http\Route;
use Framework\Http\RouteProvider;

class Kernel
{
    public static function start()
    {
        System::init();
        $httpHandler = new Http\Handler(Request::instance());
        Route::create("/Test")->controller("TestController")->action("index")->argument("id");
        $result = RouteProvider::instance()->handleRequest(Request::instance());
        Kernel::write($result);
    }

    public static function write(string $content)
    {
        print($content);
    }
}
