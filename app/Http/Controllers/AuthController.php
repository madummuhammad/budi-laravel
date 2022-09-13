<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.login');
    }

    public function auth()
    {
        $credentials=[
            'email'=>request('email'),
            'password'=>request('password')
        ];

        $validation=Validator::make($credentials,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if ($validation->fails()) {
            return redirect('dashboard/login')->withErrors($validation)->withInput($credentials);
        }

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withInput($credentials)->with(['loginError'=>'Email atau password yang anda masukan salah']);
    }
}