<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

class ThemeController extends Controller
{
    public function index()
    {
        $data['themes'] = Theme::all();
        return view('dashboard.theme', $data);
    }

    public function add(Request $request)
    {
        $data = [
            'name' => $request->name,
            'image' => $this->upload_img($request),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect('dashboard/books')->with(['message' => $validation->errors()]);
        }
        Theme::create($data);

        return redirect('dashboard/theme');

    }

    public function update(Request $request)
    {
        $data = [
            'name' => $request->name,
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect('dashboard/books')->with(['message' => $validation->errors()]);
        }
        Theme::where('id', $request->id)->update($data);

        if ($_FILES['image']['name'] !== "") {
            $data = [
                'image' => $this->upload_img($request),
            ];

            Theme::where('id', $request->id)->update($data);
        }

        return redirect('dashboard/theme');

    }

    public function upload_img($request)
    {
        $path = $request->file('image')->store('image');
        $resize = Image::make($request->file('image'))->fit(192, 272);
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

    public function destroy()
    {
        $id = request('id');
        Theme::where('id', $id)->delete();
        return back();
    }
}