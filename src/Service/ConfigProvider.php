<?php

namespace Service;

class ConfigProvider extends Provider
{
    public static function setup($app)
    {
        $container = $app->getContainer();
        $container['config'] = ConfigReader::read();
    }
}