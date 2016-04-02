<?php

namespace Framework\Http;

class ActionResult
{
    public function __construct()
    { }

    private $content;

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function appendContent(string $content)
    {
        $this->content .= $content;
    }

    public function __toString()
    {
        return $this->content;
    }
}
