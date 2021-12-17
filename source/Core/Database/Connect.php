<?php


namespace Source\Core\Database;

use const CONF_DB_HOST;
use const CONF_DB_NAME;
use const CONF_DB_PASSWD;
use const CONF_DB_USER;

class Connect
{
    private const OPTIONS = [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::ATTR_CASE => \PDO::CASE_NATURAL
    ];

    private static $instance;

    public static function getInstance(): ?\PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new \PDO(
                    "mysql:host=" . CONF_DB_HOST . ";dbname=" . CONF_DB_NAME,
                    CONF_DB_USER,
                    CONF_DB_PASSWD,
                    self::OPTIONS
                );
            } catch (\PDOException $exception) {
                throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
            }
        }
        return self::$instance;
    }
}
