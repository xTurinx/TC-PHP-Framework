<?php 

namespace Framework;

class System
{
    const FRAMEWORK_DIRNAME      = "Framework";
    const APPLICATION_DIRNAME    = "App";
    const PUBLIC_DIRNAME         = "Public";
    const NAMESPACE_SEPERATOR    = "\\";
    const PHP_FILE_ENDING        = ".php";

    private function __construct()
    { }

    public static function init()
    { }

    public static function getRootDirectory(): string
    {
        $currentDirectory = str_replace("Framework", NULL, __DIR__);
        $currentDirectory = str_replace("\\", DIRECTORY_SEPARATOR, $currentDirectory);
        return $currentDirectory;
    }
}
