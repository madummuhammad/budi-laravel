<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Image;
use Storage;

class AboutController extends Controller
{
    public function about($id)
    {
        $data['about']=About::where('id',$id)->first();
        return view('dashboard.about',$data);
    }

    public function update($id)
    {
        $data = [
            'tagline' => request('tagline'),
        ];
        About::where('id', $id)->update($data);

        if ($_FILES['image']['name'] !== "") {
            $data = [
                'banner' => $this->storage() . $this->upload(request()),
            ];

            About::where('id', $id)->update($data);
        }

        return back();
    }

    public function update_content($id)
    {
        $data = [
            'content' => request('content'),
        ];
        About::where('id', $id)->update($data);

        return back();
    }

    public function upload($request, $w = "1419", $h = "200")
    {
        $path = $request->file('image')->store('image');
        $resize = Image::make($request->file('image'))->fit($w, $h);
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
