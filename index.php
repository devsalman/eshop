<?php

require_once __DIR__.'/vendor/autoload.php';

use Framework\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$routes = include __DIR__.'/app/routes.php';
$configs = include __DIR__.'/framework/config.php';

$builder = new DI\ContainerBuilder();
$builder->useAutowiring(true);
$builder->useAnnotations(false);
$container = $builder->build();

$app = $container->make("Framework\Application");
$app->setConfigs($configs);
$app->setRoutes($routes);

$request = Request::createFromGlobals();
$response = $app->handle($request);
$response->send();
