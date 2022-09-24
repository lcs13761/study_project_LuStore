<?php


namespace Database;

use PDO;

class Connect
{
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static ?PDO $instance;

    public static function getInstance(): ?PDO
    {
        if (empty(self::$instance)) {

            $configValues = config('database.connections.mysql');
            try {

                if($configValues['url']){
                    self::$instance = new PDO($configValues['url']);
                }
                self::$instance = new PDO(
                    "mysql:host=" . $configValues['host'] . ";port=". $configValues['port'] .";dbname=" . $configValues['database'] . ";charset=" . $configValues['charset'],
                    $configValues['username'],
                    $configValues['password'],
                    self::OPTIONS
                );
            } catch (\PDOException $exception) {
                throw new \PDOException($exception->getMessage(), (int)$exception->getCode());
            }
        }
        return self::$instance;
    }
}
