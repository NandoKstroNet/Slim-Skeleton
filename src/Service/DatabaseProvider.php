<?php

namespace Service;

class DatabaseProvider extends Provider
{
    public static function setup($app)
    {
        $container = $app->getContainer();
        $config = $container['config'];

        foreach ($config->db as $name => $parameters) {
            $container['db.' . $name] = function() use ($parameters) {
                $conn = new \PDO(
                    $parameters->host,
                    $parameters->user,
                    $parameters->password
                );
                $conn->setAttribute(
                    \PDO::ATTR_DEFAULT_FETCH_MODE, 
                    \PDO::FETCH_OBJ
                ); 
                $conn->setAttribute(
                    \PDO::ATTR_ERRMODE,
                    \PDO::ERRMODE_EXCEPTION
                );
                foreach ($parameters->autorun as $command) {
                    $conn->exec($command);
                }
                return $conn;
            };
        }
    }
}
