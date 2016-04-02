<?php

namespace Framework\Http;

interface IMiddleware
{
    function canContinue(): bool;
    function redirect();
}
