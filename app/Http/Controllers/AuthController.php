<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.login');
    }

    public function auth()
    {
        $credentials = [
            'email' => request('email'),
            'password' => request('password'),
        ];

        $validation = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect('dashboard/login')->withErrors($validation)->withInput($credentials);
        }

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            // return auth()->user()->email;
            return redirect()->intended('dashboard/book');
        }

        return back()->withInput($credentials)->with(['loginError' => 'Email atau password yang anda masukan salah']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('dashboard/login');
    }
}