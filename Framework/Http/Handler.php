<?php

namespace Framework\Http;

use Framework\Exception\NotImplementedException;

class Handler
{
    private $request;

    public function __construct(Request $r)
    {
        $this->request = $r;
    }

    public function getResponse()
    {
        throw new NotImplementedException("getResponse is currently not implemented!");
    }
}
