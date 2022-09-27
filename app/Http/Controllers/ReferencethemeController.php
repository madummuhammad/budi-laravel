<?php

namespace App\Http\Controllers;

use App\Models\ReferenceTheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class ReferencethemeController extends Controller
{
    public function index()
    {
        $data['themes'] = ReferenceTheme::orderBy('name', 'ASC')->get();
        return view('dashboard.referencetheme', $data);
    }

    public function add(Request $request)
    {

        $validationData = [
            'name' => $request->name,
            'image' => $request->image,
        ];

        $validation = Validator::make($validationData, [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($validation->fails()) {
            return back()->with(['message' => $validation->errors()]);
        }

        if ($_FILES['image']['name'] == "") {
            $image = url('storage/image/default_book.png');
        } else {
            $image = $this->storage() . $this->upload_img($request, 'image');
        }
        $data = [
            'name' => $request->name,
            'image' => $image,
        ];
        ReferenceTheme::create($data);

        return redirect('dashboard/reference_theme');

    }

    public function update(Request $request)
    {
        $theme = ReferenceTheme::where('id', $request->id)->first();

        $url_unlink = storage_path('app/public') . str_replace(url('storage'), "", $theme->image);
        $validationData = [
            'name' => $request->name,
            'image' => $request->image,
        ];

        if ($_FILES['image']['name'] !== "") {
            $validation = Validator::make($validationData, [
                'name' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg',
            ]);
        } else {
            $validation = Validator::make($validationData, [
                'name' => 'required',
            ]);

        }

        $data = [
            'name' => $request->name,
        ];

        if ($validation->fails()) {
            return $validation->errors();
            return back()->with(['message' => $validation->errors()]);
        }
        ReferenceTheme::where('id', $request->id)->update($data);

        if ($_FILES['image']['name'] !== "") {
            $image = $this->storage() . $this->upload_img($request, 'image');
            $data = [
                'image' => $image,
            ];
            ReferenceTheme::where('id', $request->id)->update($data);
        }

        return redirect('dashboard/reference_theme');

    }

    public function upload_img($request, $name)
    {
        $path = $request->file($name)->store('image');
        $resize = Image::make($request->file($name))->fit(192, 272);
        $resize->save($this->storage_path('public/' . $path));
        unlink(storage_path('app/' . $path));
        return $path;
    }

    public function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }

    public function storage()
    {
        return url('storage') . '/';
    }

    public function destroy()
    {
        $id = request('id');
        ReferenceTheme::where('id', $id)->delete();
        return back();
    }
}