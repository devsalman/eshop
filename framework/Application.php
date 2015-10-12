<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
use DI\Container;

class Application
{
    function __construct(Routing\RequestContext $context)
    {
        $this->context = $context;
    }

    public function handle(Request $request)
    {
        $this->context->fromRequest($request);
        $matcher = new Routing\Matcher\UrlMatcher($this->routes, $this->context);
        $resolver = new HttpKernel\Controller\ControllerResolver();

        $response = null;

        try {
            $request->attributes->add($matcher->match($request->getPathInfo()));
            $controllerInfo = explode("::", $request->get("controller"));
            $className = $controllerInfo[0];
            $action = $controllerInfo[1];

            $controller = $this->container->make($className);
            $response = $controller->$action($request);
        } catch (Routing\Exception\ResourceNotFoundException $e) {
            $response = new Response('Not Found', 404);
        } catch (Exception $e) {
            $response = new Response($e->getMessage(), 500);
        }

        return $response;
    }

    public function setDIContainer(Container $container)
    {
        $this->container = $container;
    }

    public function setRoutes($routes = [])
    {
        $this->routes = $routes;
    }
}
