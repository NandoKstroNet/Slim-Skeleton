<?php

namespace Service;

use Slim\Http\Request;
use Slim\Http\Response;

abstract class Provider
{
    abstract public static function setup($app);
}