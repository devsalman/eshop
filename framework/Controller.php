<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class Controller
{
    public function response(Request $request, $view, $data = [])
    {
        if (!empty($data)) {
            extract($data, EXTR_SKIP);
        }

        extract($request->attributes->all(), EXTR_SKIP);
        ob_start();
        include __DIR__ . '/functions.php';
        include sprintf(__DIR__ . '/../views/%s.php', $view);

        return new Response(ob_get_clean());
    }

    public function redirect(Request $request, $url)
    {
        $redirectUrl = sprintf('%s://%s:%d%s',
        $this->getRequestProtocol($request),
        $request->server->get('SERVER_NAME'),
        $request->server->get('SERVER_PORT'), $url);

        return new RedirectResponse($redirectUrl);
    }

    private function getRequestProtocol(Request $request)
    {
        return ((!is_null($request->server->get('HTTPS')))
            && $request->server->get('HTTPS') != 'off') ? 'https' : 'http';
    }
}
