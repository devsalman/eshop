<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        return parent::response($request, "welcome");
    }
}
