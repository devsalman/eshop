<?php

use Symfony\Component\Routing;

$routes = new Routing\RouteCollection();

$routes->add('index', new Routing\Route('/', [
    'controller' => 'App\Controllers\WelcomeController::index',
]));

$routes->add('login_form', new Routing\Route('/user/login', [
    'controller' => 'App\Controllers\LoginController::index',
]));

$routes->add('login_auth', new Routing\Route('/user/authenticate', [
    'controller' => 'App\Controllers\LoginController::authenticate',
]));

return $routes;
