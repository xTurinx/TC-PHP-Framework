<?php

namespace Framework;

use Framework\Http\Request;
use Framework\Http\Session;

class Kernel
{
    public static function start()
    {
        System::init();

        $httpHandler = new Http\Handler(Request::instance());
    }
}
