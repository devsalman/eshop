<?php

use Pixie\Connection;
use Interop\Container\ContainerInterface;

return [
    'Pixie\Connection' => function (ContainerInterface $c) {
        $config = [
            'driver'    => $_ENV['DB_DRIVER'],
            'host'      => $_ENV['DB_HOST'],
            'database'  => $_ENV['DB_NAME'],
            'username'  => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'charset'   => $_ENV['DB_CHARSET'],
            'collation' => $_ENV['DB_COLLATION'],
            'prefix'    => $_ENV['DB_PREFIX'],
        ];

        return new Connection($config['driver'], $config);
    },
];
