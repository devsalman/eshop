<?php

namespace App\Controllers;

use Framework\Controller;
use Symfony\Component\HttpFoundation\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        return $this->response($request, "welcome");
    }
}
