<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;

class LoginController extends Controller
{
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin-dashboard')->withSuccess('Login Successfull');
        }

        return redirect('/')->withSuccess('Invalid Login Details');
    }

    public function userLogout() 
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function adminDashboard()
    {
        if(Auth::check())
        {
            return view('admin.dashboard.index');
        }

        return redirect('/')->withSuccess('You are not allowed!');
    }
}
