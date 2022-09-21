<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

    public function index()
    {
        if (auth()->user()->role !== 1) {
            return redirect("dashboard");
        }
        $data['users'] = User::get();
        return view('dashboard.user', $data);
    }

    public function store()
    {
        $dataValidation = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => request('password'),
            'role' => request('role'),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }

        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'role' => request('role'),
        ];

        User::create($data);
        return back();

    }

    public function update()
    {
        $id = request('id');
        if (request('password') !== null) {
            $data = [
                'name' => request('name'),
                // 'email' => request('email'),
                'role' => request('role'),
                'password' => Hash::make(request('password')),
            ];
        } else {
            $data = [
                'name' => request('name'),
                // 'email' => request('email'),
                'role' => request('role'),
            ];
        }
        $validation = Validator::make($data, [
            'name' => 'required',
            // 'email' => 'required|email|unique:users,email',
            'role' => 'required',
        ]);

        if ($validation->fails()) {
            return $validation->errors();
            return back();
        }

        User::where('id', $id)->update($data);
        return back();

    }

    public function destroy()
    {
        $id = request('id');
        $validation = Validator::make(['id' => $id], [
            'id' => 'required',
        ]);

        User::where('id', $id)->delete();
        return back();
    }
}