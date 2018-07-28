<?php

namespace Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\App;

class Controller 
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function getApp()
    {
        return $this->app;
    }
}
