<?php 

namespace Framework\Http;

use Framework\Exception\NotImplementedException;
use Framework\Exception\NotAllowedException;

class Route
{
    private $routeName;
    private $controllerName;
    private $actionName;
    private $actionArgs;

    private function __construct(string $name)
    {
        $this->controllerName = false;
        $this->actionName = false;
        $this->routeName = $name;
        $this->actionArgs = [];

        RouteProvider::instance()->add($this);
    }

    public function getRouteName(): string
    {
        return $this->routeName;
    }

    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    public function getActionName(): string
    {
        return $this->actionName;
    }

    public function getActionArguments(): array
    {
        return $this->actionArgs;
    }

    public function getArgumentsForRequest(Request $request): array
    {
        $route = $request->getRouteName();
        $query = str_replace($this->routeName . "/", "", $route);

        $parameters = explode("/", $query);
        return $parameters;
    }

    public function validate(Request $request)
    {
        return strpos($request->getRouteName(), $this->routeName) !== false;
    }

    public function controller(string $name): Route
    {
        if ($this->controllerName !== false)
        {
            throw new NotAllowedException("Controller already set!");
        }

        $this->controllerName = $name;
        return $this;
    }

    public function action(string $name): Route
    {
        if ($this->actionName !== false)
        {
            throw new NotAllowedException("Action already set!");
        }

        $this->actionName = $name;
        return $this;
    }

    public function argument(string $argName): Route
    {
        $this->actionArgs[] = $argName;
        return $this;
    }

    public static function create(string $name): Route
    {
        return new Route($name);
    }
}
