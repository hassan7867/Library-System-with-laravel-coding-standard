<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function showAdminLogin()
    {
        return view('template/pages/authentication/admin/admin-login');
    }

    public function showClientLogin()
    {
        return view('template/pages/authentication/user/user-login');
    }

    public function showSignup()
    {
        return view('template/pages/authentication/user/add-user');
    }

    public function index()
    {
       return view('template/index');
    }
}
