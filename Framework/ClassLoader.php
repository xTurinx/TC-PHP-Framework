<?php 

namespace Framework;

class ClassLoader
{
    private $className;

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    public function validate()
    {
        // Todo: validate namespace and path
    }

    public function getFilePath(): string
    {
        $rootDir = System::getRootDirectory();
        return $rootDir . str_replace(System::NAMESPACE_SEPERATOR, DIRECTORY_SEPARATOR, $this->className) . System::PHP_FILE_ENDING;
    }

    public function includeFile()
    {
        require_once $this->getFilePath();
    }
}
