<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Validator;

class VisitorController extends Controller
{
    public function index()
    {
        if (auth()->guard('visitor')->check() == false) {
            return redirect('login');
        }
        return view('profile');
    }
    public function login()
    {
        if (auth()->guard('visitor')->check() == false) {
            return view('login');
        } else {
            return back();
        }
    }

    public function register()
    {
        if (auth()->guard('visitor')->check() == false) {
            return view('register');
        } else {
            return back();
        }
    }

    public function auth_register()
    {
        $data = [
            'name' => request('name'),
            'phone' => request('phone'),
            'city' => request('city'),
            'sub' => request('sub'),
            'area' => request('area'),
            'status' => request('status'),
            'email' => request('email'),
            'password' => request('password'),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'sub' => 'required',
            'area' => 'required',
            'status' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }

        $data = [
            'name' => request('name'),
            'phone' => request('phone'),
            'city' => request('city'),
            'sub' => request('sub'),
            'area' => request('area'),
            'status' => request('status'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ];
        Visitor::create($data);

        return redirect('login');
    }

    public function auth_login(Request $request)
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
            return redirect('login')->withErrors($validation)->withInput($credentials);
        }
        if (Auth::guard('visitor')->attempt($credentials)) {
            request()->session()->regenerate();
            return redirect()->intended();

        } else {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors(["Incorrect user login details!"]);

        }

        return back()->withInput($credentials)->with(['loginError' => 'Email atau password yang anda masukan salah']);

    }

    public function update()
    {
        if (auth()->guard('visitor')->check() == 'false') {
            redirect('login');
        }

        $data = [
            'name' => request('name'),
            'email' => request('email'),
            'address' => request('address'),
            'city' => request('city'),
            'sub' => request('sub'),
            'area' => request('area'),
            'profession' => request('profession'),
            'level' => request('level'),
            'instansi' => request('instansi'),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'sub' => 'required',
            'area' => 'required',
            'profession' => 'required',
            'level' => 'required',
            'instansi' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }

        Visitor::where('id', auth()->guard('visitor')->user()->id)->update($data);

        return back();
    }

    public function profile_image()
    {
        if (auth()->guard('visitor')->check() == 'false') {
            redirect('login');
        }
        if ($_FILES['image']['name'] !== "") {
            $data = [
                'image' => $this->upload_img(request(), 416, 416, "image"),
            ];

            Visitor::where('id', auth()->guard('visitor')->user()->id)->update($data);
        }

        return back();
    }

    public function logout()
    {
        auth()->guard('visitor')->logout();

        return redirect('login');
    }

    public function upload_img($request, $fit_width = 100, $fit_height = 100, $name = "cover")
    {
        $path = $request->file($name)->store('image');
        $resize = Image::make($request->file($name))->fit($fit_width, $fit_height);
        $resize->save($this->storage_path($path));
        $disk = Storage::disk('gcs')->put('thumb-' . $path, $resize);
        $disk = Storage::disk('gcs');
        $thumbUrl = $disk->url('thumb-' . $path);
        return $thumbUrl;
    }
    public function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }
}