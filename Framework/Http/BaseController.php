<?php

namespace Framework\Http;

use Framework\System;
use Framework\Http\ActionResult;

abstract class BaseController
{
    public function executeActionForRoute(Route $route, Request $request): ActionResult
    {
        return call_user_func_array([$this, $route->getActionName()], $route->getArgumentsForRequest($request));
    }

    public function view(string $viewName = ""): ActionResult
    {
        $fileContent = file_get_contents(System::getRootDirectory() . System::APPLICATION_DIRNAME . "/Views/" . $viewName . ".php");

        $result = new ActionResult();

        ob_start();
        eval("?>" . $fileContent . "<?php");
        ob_end_flush();
        $content = ob_get_contents();
        ob_clean();

        $result->setContent($content);
        return $result;
    }

    public function content(string $content)
    {
        $result = new ActionResult();
        $result->setContent($content);
        return $result;
    }
}
