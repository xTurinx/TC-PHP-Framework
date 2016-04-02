<?php

namespace App\Controller;

use \Framework\Http\BaseController;
use \Framework\Http\ActionResult;

class TestController extends BaseController
{
    public function index($id): ActionResult
    {
        return $this->view("Test");
    }
}
