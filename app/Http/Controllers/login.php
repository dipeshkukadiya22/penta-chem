<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class login extends Controller
{
    public function loginview()
    {
        return view('Auth.login');
    }

    public function authlogin(Request $req)
    {

        $email = $req->login_email;
        $password = $req->login_password;

        if (FacadesAuth::attempt(['email' => $email, 'password' => $password],$remember=true)) {
            $userId = FacadesAuth::id();
            $user = FacadesAuth::user();
            return redirect()->route('viewallproducts');
        }
        return redirect()->route('cockpit')->with('error', 'Invalid Username or Password');
    }

    public function addadmin()
    {
        $adduser = new User();
        $adduser->name = 'Admin';
        $adduser->email = 'work@teque7.com';
        $adduser->password = Hash::make('123');
        $adduser->save();
        dd('user added');
    }
    public function destroy(){
        return view('Auth.login');
    }
}
