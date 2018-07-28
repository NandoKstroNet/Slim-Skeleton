<?php

define('CONFIG_FILE', 'private/config.json');

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

session_start();

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

$config = \Service\ConfigReader::read();

$app = new \Slim\App((array) $config);

\Service\DependencyProvider::setup($app);
\Service\RouteProvider::setup($app);
\Service\ConfigProvider::setup($app);
\Service\DatabaseProvider::setup($app);

$app->run();