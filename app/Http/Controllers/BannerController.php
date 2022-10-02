<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BannerMobile;
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
            'top' => request('top'),
            'left' => request('left'),
            'color' => request('color'),
            'image' => $this->storage() . $this->upload(request()),
        ];

        $validation = Validator::make($data, [
            'page_id' => 'required',
        ]);

        Banner::create($data);

        return back();
    }

    public function add_mobile()
    {
        $data = [
            'page_id' => request('page_id'),
            'tagline' => request('tagline'),
            'color' => request('color'),
            'image' => $this->storage() . $this->upload(request(), 393, 400),
        ];

        $validation = Validator::make($data, [
            'page_id' => 'required',
        ]);

        BannerMobile::create($data);

        return back();
    }

    public function update()
    {
        $data = [
            'page_id' => request('page_id'),
            'tagline' => request('tagline'),
            'top' => request('top'),
            'left' => request('left'),
            'color' => request('color'),
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

    public function update_mobile()
    {
        $data = [
            'page_id' => request('page_id'),
            'tagline' => request('tagline'),
            'color' => request('color'),
        ];

        $validation = Validator::make($data, [
            'page_id' => 'required',
        ]);

        BannerMobile::where('id', request('id'))->update($data);

        if ($_FILES['image']['name'] !== "") {
            $data = [
                'image' => $this->storage() . $this->upload(request(), 393, 400),
            ];

            BannerMobile::where('id', request('id'))->update($data);
        }

        return back();
    }

    public function upload($request, $fit_width = "1190", $fit_height = "414")
    {
        $path = $request->file('image')->store('image');
        $resize = Image::make($request->file('image'))->fit($fit_width, $fit_height);
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

    public function destroy_mobile()
    {
        $id = request('id');
        BannerMobile::where('id', $id)->delete();
        return back();
    }
}