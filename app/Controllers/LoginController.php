<?php

namespace App\Controllers;

use Framework\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Models\User;

class LoginController extends Controller
{
    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        return parent::response($request, "auth/login");
    }

    public function authenticate(Request $request)
    {
        $email = $request->get('email');
        $password = sha1($request->get('password'));

        $user = $this->user
            ->where('email', '=', $email)
            ->where('password', '=', $password)
            ->get();

        return parent::response($request, "auth/login");
    }
}
