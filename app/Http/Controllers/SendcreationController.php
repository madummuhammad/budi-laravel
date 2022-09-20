<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\SendCreation;
use App\Models\SendCreationImage;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class SendcreationController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::where('page_id', "32b7ab7f-00e7-40a9-b609-52a33c66ad17")->first();
        $data['send_creations'] = SendCreation::with('send_creation_images')->where('id', '3644ed15-5e90-4c47-913a-fc1524768f7a')->first();
        return view('dashboard.send_creation', $data);
    }

    public function banner()
    {
        $page_id = '32b7ab7f-00e7-40a9-b609-52a33c66ad17';
        $data = [
            'tagline' => request('tagline'),
        ];

        $validation = Validator::make($data, [
            'tagline' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }

        Banner::where('page_id', $page_id)->update($data);

        if ($_FILES['image']['name'] !== "") {
            $data = [
                'image' => $this->storage() . $this->upload_img(request(), 1440, 247, "image"),
            ];
            Banner::where('page_id', $page_id)->update($data);
        }

        return back();

    }

    public function update()
    {
        $page_id = '32b7ab7f-00e7-40a9-b609-52a33c66ad17';
        $data = [
            'heading' => request('header'),
            'sub_heading' => request('sub_heading'),
            'content' => request('content'),
        ];

        $validation = Validator::make($data, [
            'heading' => 'required',
            'sub_heading' => 'required',
            'content' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }

        SendCreation::where('id', '3644ed15-5e90-4c47-913a-fc1524768f7a')->update($data);

        if ($_FILES['image']['name'] !== "") {
            $image = [
                'image' => $this->storage() . $this->upload_img(request(), 1162, 475, "image"),
            ];
            SendCreationImage::where('id', 'ba5db980-4caa-4de1-be49-c9c86ba091ad')->update($image);
        }

        if ($_FILES['content-image']['name'] !== "") {
            $image = [
                'image' => $this->storage() . $this->upload_img(request(), 400, 451, "content-image"),

            ];
            SendCreationImage::where('id', '05685906-5ae1-4f01-b290-09be406aa91d')->update($image);
        }

        return back();

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
}