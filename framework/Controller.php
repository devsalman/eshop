<?php

namespace Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function response(Request $request, $view, $data = null)
    {
        if ($data != null) {
            extract($data, EXTR_SKIP);
        }

        ob_start();
        include 'functions.php';
        include sprintf(__DIR__.'/../views/%s.php', $view);
        return new Response(ob_get_clean());
    }
}
