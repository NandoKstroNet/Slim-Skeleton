<?php

namespace Service;

class RouteProvider extends Provider
{
    public static function setup($app)
    {
        $app->get('/', [new \Controller\Manual($app), 'show']);
        $app->get('/v1/index/{id}', [new \Controller\Index($app), 'get']);
        $app->post('/v1/index', [new \Controller\Index($app), 'add']);
        $app->put('/v1/index/{id}', [new \Controller\Index($app), 'update']);
        $app->delete('/v1/index/{id}', [new \Controller\Index($app), 'delete']);
    }
}