<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class BannerController extends Controller
{
    public function add()
    {
        $data = [
            'page_id' => request('page_id'),
            'tagline' => request('tagline'),
            'image' => $this->upload(request()),
        ];

        $validation = Validator::make($data, [
            'page_id' => 'required',
        ]);

        Banner::create($data);

        return back();
    }

    public function update()
    {
        $data = [
            'page_id' => request('page_id'),
            'tagline' => request('tagline'),
        ];

        $validation = Validator::make($data, [
            'page_id' => 'required',
        ]);

        Banner::where('id', request('id'))->update($data);

        if ($_FILES['image']['name'] !== "") {
            $data = [
                'image' => $this->upload(request()),
            ];

            Banner::where('id', request('id'))->update($data);
        }

        return back();
    }

    public function upload($request)
    {
        $path = $request->file('image')->store('image');
        $disk = Storage::disk('gcs')->put('image', $request->file('image'));
        $disk = Storage::disk('gcs');
        $url = $disk->url($path);
        return $url;
    }

    public function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }

    public function destroy()
    {
        $id = request('id');
        Banner::where('id', $id)->delete();
        return back();
    }
}