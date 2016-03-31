<?php 

namespace Framework;

use \Framework\Exception\NotImplementedException;

class Error
{
    public function __construct()
    {
        throw new NotImplementedException("Error class is currently not implemented!");
    }
}
