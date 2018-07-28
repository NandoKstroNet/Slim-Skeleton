<?php

namespace Model\DataMapper;

use \Slim\App;

class DataMapper
{
    private $app;
    private $container;

    public function __construct($app)
    {
        $this->app = $app;
        $this->container = $this->app->getContainer();
    }
    public function getLink($linkName)
    {
        return $this->container['db.' . $linkName];
    }
    public function query($sql)
    {

    }
}
