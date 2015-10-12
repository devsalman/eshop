<?php

require_once __DIR__.'/vendor/autoload.php';

use Framework\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Dotenv\Dotenv;
use Pixie\Connection;
use Interop\Container\ContainerInterface;

$routes = include __DIR__.'/app/routes.php';
$dotenv = new Dotenv(__DIR__);
$dotenv->load();

$builder = new DI\ContainerBuilder();
$builder->useAutowiring(true);
$builder->useAnnotations(false);
$builder->addDefinitions([
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

]);

$container = $builder->build();
$app = $container->make("Framework\Application");
$app->setRoutes($routes);
$app->setDIContainer($container);

$request = Request::createFromGlobals();
$response = $app->handle($request);
$response->send();
