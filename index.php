<?php

require_once __DIR__.'/vendor/autoload.php';

use Framework\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;

$builder = new DI\ContainerBuilder();
$builder->useAutowiring(true);
$builder->useAnnotations(false);

$container = $builder->build();

$routes = include __DIR__.'/app/routes.php';
$context = new Routing\RequestContext();
$app = new Application($routes, $context, $container);

$request = Request::createFromGlobals();
$response = $app->handle($request);
$response->send();
