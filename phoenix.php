<?php

return [
    'migration_dirs' => [
        'first' => __DIR__ . '/../project/database/migrations',
        'second' => __DIR__ . '/../project/database/migrations',
    ],
    'environments' => [
        'local' => [
            'adapter' => config('database.connections.mysql.driver'),
            'host' => config('database.connections.mysql.host'),
            'port' => config('database.connections.mysql.port'),
            // optional
            'username' => config('database.connections.mysql.username'),
            'password' => config('database.connections.mysql.password'),
            'db_name' => config('database.connections.mysql.database'),
            'charset' => config('database.connections.mysql.charset'),
            'collation' => config('database.connections.mysql.collation'),
            // optional, if not set default collation for utf8mb4 is used
        ],
        'production' => [
            'adapter' => 'mysql',
            'host' => 'production_host',
            'port' => 3306,
            // optional
            'username' => 'user',
            'password' => 'pass',
            'db_name' => 'my_production_db',
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            // optional, if not set default collation for utf8mb4 is used
        ],
    ],
    'default_environment' => 'local',
    'log_table_name' => 'phoenix_log',
];