<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel;
use Symfony\Component\Routing;
use DI\Container;

class Application
{
    protected $routes;
    protected $context;
    protected $container;

    function __construct(
        Routing\RouteCollection $routes,
        Routing\RequestContext $context,
        Container $container)
    {
        $this->routes = $routes;
        $this->context = $context;
        $this->container = $container;
    }

    public function handle(Request $request)
    {
        $this->context->fromRequest($request);
        $matcher = new Routing\Matcher\UrlMatcher($this->routes, $this->context);
        $resolver = new HttpKernel\Controller\ControllerResolver();

        $response = null;

        try {
            $request->attributes->add($matcher->match($request->getPathInfo()));
            $controllerInfo = explode("::", $request->get("_controller"));
            $action = $controllerInfo[1];

            $controller = $this->container->make($controllerInfo[0]);
            $response = $controller->$action($request);
        } catch (Routing\Exception\ResourceNotFoundException $e) {
            $response = new Response('Not Found', 404);
        } catch (Exception $e) {
            $response = new Response($e->getMessage(), 500);
        }

        return $response;
    }
}
