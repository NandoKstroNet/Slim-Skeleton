<?php

namespace Service;

class ConfigReader
{
    static private $config;

    public static function read()
    {
        if (null != self::$config)
            return self::$config;

        if (! file_exists(CONFIG_FILE))
            return false;

        $json = file_get_contents(CONFIG_FILE);
        self::$config = json_decode($json);

        if (\JSON_ERROR_NONE != json_last_error()) {            
            throw new \Exception(sprintf(
                "Error parsing config file: %s",
                json_last_error_msg()
            ), 500);
        }

        if (isset($_ENV['docker']))
            self::$config->logger->level = 'php://stdout';

        switch (self::$config->logger->level) {
            case 'debug':
                self::$config->logger->level = \Monolog\Logger::DEBUG;
                break;
            case 'info':
                self::$config->logger->level = \Monolog\Logger::INFO;
                break;
            case 'notice':
                self::$config->logger->level = \Monolog\Logger::NOTICE;
                break;
            case 'warning':
                self::$config->logger->level = \Monolog\Logger::WARNING;
                break;
            case 'error':
                self::$config->logger->level = \Monolog\Logger::ERROR;
                break;
            case 'critical':
                self::$config->logger->level = \Monolog\Logger::CRITICAL;
                break;
            case 'alert':
                self::$config->logger->level = \Monolog\Logger::ALERT;
                break;
            case 'emergency':
                self::$config->logger->level = \Monolog\Logger::EMERGENCY;
                break;
            default:
                self::$config->logger->level = \Monolog\Logger::ERROR;
        }

        self::$config->settings = [
            'displayErrorDetails' => self::$config->displayErrorDetails,
            'addContentLengthHeader' => self::$config->addContentLengthHeader,
            'renderer' => self::$config->renderer,
            'logger' => self::$config->logger
        ];

        return self::$config;
    }
}