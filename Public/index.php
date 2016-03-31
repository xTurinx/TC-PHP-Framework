<?php

declare(strict_types=1);
error_reporting(-1);
session_start();

include "../Framework/ClassLoader.php";
include "../Framework/System.php";
include "../Framework/Error.php";

function __autoload($name)
{
    $loader = new \Framework\ClassLoader($name);
    if ($loader->validate() == NULL)
    {
        $loader->includeFile();
    }
}

Framework\Kernel::start();
