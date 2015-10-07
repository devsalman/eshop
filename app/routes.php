<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('index', new Routing\Route('/', [
    '_controller' => 'App\Controllers\WelcomeController::index',
]));

return $routes;
