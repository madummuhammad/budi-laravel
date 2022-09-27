<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\VisitorVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
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

    public function confirm($id)
    {
        $token = Visitor::where('token', $id)->where('status', 'Pending')->first();
        if ($token) {
            Visitor::where('token', $id)->update(['status' => 'Active']);
            return redirect('login')->with(['success' => 'Kredensial berhasil dikonfirmasi! Silakan Login']);
        } else {
            return abort(404);
        }
    }

    public function auth_register()
    {
        $email = "";
        $phone = "";
        $str_random = Str::random(60) . time();
        $check_email = Validator::make(['surel' => request('surel')], ['surel' => 'required|email']);

        if ($check_email->fails()) {
            $phone = request('surel');
        } else {
            $email = request('surel');
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            $from = "support@ansol.id";
            $to = $email;
            $subject = "Verifikasi Email Anda";
            $message = "Link verifikasi anda " . url('confirm/') . '/' . $str_random;
            $headers = "From:" . $from;
            mail($to, $subject, $message, $headers);
        }

        $data = [
            'name' => request('name'),
            'city' => request('city'),
            'sub' => request('sub'),
            'area' => request('area'),
            'status' => request('status'),
            'username' => request('username'),
            'password' => request('password'),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'city' => 'required',
            'sub' => 'required',
            'area' => 'required',
            'status' => 'required',
            'username' => 'required|unique:visitors,username',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return back()->withErrors($validation)->withInput($data);
        }

        $data = [
            'name' => request('name'),
            'phone' => $phone,
            'email' => $email,
            'image' => url('/storage/image/default.jpg'),
            'city' => request('city'),
            'sub' => request('sub'),
            'area' => request('area'),
            'status' => 'Pending',
            'token' => $str_random,
            'profession' => request('status'),
            'level' => request('sub-status'),
            'username' => request('username'),
            'password' => Hash::make(request('password')),
        ];
        Visitor::create($data);

        return back()->with(['message' => 'Silakan periksa Pos-el atau No Ponsel Untuk Konfirmasi']);
    }

    public function auth_login(Request $request)
    {
        $credentials = [
            'username' => request('username'),
            'password' => request('password'),
        ];

        $validation = Validator::make($credentials, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect('login')->withErrors($validation)->withInput($credentials);
        }

        $is_active = Visitor::where('username', request('username'))->where('status', 'Pending')->count();
        if ($is_active == 1) {
            return back()->with(['loginError' => 'Anda belum mengonfirmasi pos-el/no ponsel']);
        }
        if (Auth::guard('visitor')->attempt($credentials)) {
            $data = json_decode($request->cookie('visitor_session'));
            $id = auth()->guard('visitor')->user()->id;
            VisitorVisit::where('id', $data->id)->update(['visitor_id' => $id]);
            request()->session()->regenerate();
            return redirect()->intended();

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
            'city' => request('city'),
            'sub' => request('sub'),
            'area' => request('area'),
            'profession' => request('status'),
            'level' => request('sub-status'),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'city' => 'required',
            'sub' => 'required',
            'area' => 'required',
            'profession' => 'required',
            'level' => 'required',
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
                'image' => $this->storage() . $this->upload_img(request(), 416, 416, "image"),
            ];

            Visitor::where('id', auth()->guard('visitor')->user()->id)->update($data);
        }

        return back();
    }

    public function delete_profile()
    {
        if (auth()->guard('visitor')->check() == 'false') {
            redirect('login');
        }

        Visitor::where('id', auth()->guard('visitor')->user()->id)->update(['image' => url('/storage/image/default.jpg')]);

        return back();
    }

    public function visitor_get()
    {
        $data['visitors'] = Visitor::get();
        return view('dashboard.visitor', $data);
    }

    public function logout()
    {
        auth()->guard('visitor')->logout();

        return redirect('login');
    }

    public function profiling($id)
    {
        $data['visitors'] = Visitor::with('book_read_statistics', 'book_read_statistics.books', 'book_read_statistics.books.themes', 'book_read_statistics.books.levels', 'book_read_statistics.books.book_types')->where('id', $id)->first();

        $data['likeds'] = Visitor::with('mylibraries', 'mylibraries.books', 'mylibraries.books.levels', 'mylibraries.books.themes', 'mylibraries.books.book_types')->where('id', $id)->first();

        $data['downloaded'] = Visitor::with('book_download_statistics', 'book_download_statistics.books', 'book_download_statistics.books.themes', 'book_download_statistics.books.levels', 'book_download_statistics.books.book_types')->where('id', $id)->first();

        $data['comments'] = Visitor::with('comments', 'comments.books', 'comments.books.levels', 'comments.books.themes', 'comments.books.book_types')->where('id', $id)->first();

        $data['shared'] = Visitor::with('shares', 'shares.books', 'shares.books.levels', 'shares.books.themes', 'shares.books.book_types')->where('id', $id)->first();

        return view('dashboard.visitorprofiling', $data);
    }

    public function upload_img($request, $fit_width = 100, $fit_height = 100, $name = "cover")
    {
        $path = $request->file($name)->store('image');
        $resize = Image::make($request->file($name))->fit($fit_width, $fit_height);
        $resize->save($this->storage_path('public/' . $path));
        unlink(storage_path('app/' . $path));
        return $path;
    }

    public function storage()
    {
        return url('storage') . '/';
    }

    public function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }

    public function destroy()
    {
        $id = request('id');
        $validation = Validator::make(['id' => $id], [
            'id' => 'required',
        ]);

        Visitor::where('id', $id)->delete();
        return back();

    }
}