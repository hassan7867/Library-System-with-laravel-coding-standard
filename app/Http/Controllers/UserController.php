<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAdminLogin(){
        return view('template/pages/authentication/admin/admin-login');
    }
}
