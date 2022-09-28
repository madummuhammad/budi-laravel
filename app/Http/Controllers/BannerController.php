<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class BannerController extends Controller
{
    public function add()
    {
        $data = [
            'page_id' => request('page_id'),
            'tagline' => request('tagline'),
            'image' => $this->storage() . $this->upload(request()),
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
                'image' => $this->storage() . $this->upload(request()),
            ];

            Banner::where('id', request('id'))->update($data);
        }

        return back();
    }

    public function upload($request)
    {
        $path = $request->file('image')->store('image');
        $resize = Image::make($request->file('image'))->fit(1190, 414);
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
        Banner::where('id', $id)->delete();
        return back();
    }
}