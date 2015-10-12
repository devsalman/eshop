<?php

require_once __DIR__.'/vendor/autoload.php';

use Framework\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Dotenv\Dotenv;

$routes = include __DIR__.'/app/routes.php';
$dotenv = new Dotenv(__DIR__);
$dotenv->load();

$builder = new DI\ContainerBuilder();
$builder->useAutowiring(true);
$builder->useAnnotations(false);
$builder->addDefinitions('framework/definitions.php');

$container = $builder->build();
$app = $container->make("Framework\Application");
$app->setRoutes($routes);
$app->setDIContainer($container);

$request = Request::createFromGlobals();
$response = $app->handle($request);
$response->send();
