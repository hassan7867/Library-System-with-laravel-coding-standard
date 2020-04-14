<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use library_system\authentication\Email;
use library_system\authentication\Password;

class AuthController extends Controller
{
    public function login(Request $request){
        if(User::where(['email' => $request->email])->exists()){
            $dbpassword = User::where(['email' => $request->email])->first();
            if(password_verify(($request->password), $dbpassword->password)){
                $roleId = UserRole::where('id_user')->first()['id_role'];
                Session::put('role', $roleId);
                return redirect('racks')->with(['role' => $roleId]);
            }else{
                return view('template/pages/authentication/admin/admin-login')->with(['error' => 'Invalid email or Password']);
            }
        }
        else{
            return view('template/pages/authentication/admin/admin-login')->with(['error' => 'Invalid email or Password']);
        }
    }

    public function clientLogin(Request $request){
        if(User::where(['email' => $request->email])->exists()){
            $dbpassword = User::where(['email' => $request->email])->first();
            if(password_verify(($request->password), $dbpassword->password)){
                $roleId = UserRole::where('id_user')->first()['id_role'];
                Session::put('role', $roleId);
                return redirect('racks')->with(['role' => $roleId]);
            }else{
                return view('template/pages/authentication/user/user-login')->with(['error' => 'Invalid email or Password']);
            }
        }
        else{
            return view('template/pages/authentication/user/user-login')->with(['error' => 'Invalid email or Password']);
        }
    }

    public function signup(Request $request)
    {
        try{
            $name = new \NonEmptyString($request->name);
            $email = new Email($request->email);
            $password = new Password(new \NonEmptyString($request->password));
            if (!User::where(['email' => $request->email])->exists()) {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = password_hash($request->password, PASSWORD_DEFAULT);
                $user->save();
                $userRole = new UserRole();
                $userRole->id_user = $user->id;
                $userRole->id_role = 2;
                $userRole->save();
                Session::put('role', 2);
                return redirect('racks')->with(['role' => 2]);
            } else {
                return view('template/pages/authentication/user/add-user')->with(['error' => 'Email Already Exists']);
            }
        }catch (\Exception $exception){
            return view('template/pages/authentication/user/add-user')->with(['error' => $exception->getMessage()]);

        }

    }
}
