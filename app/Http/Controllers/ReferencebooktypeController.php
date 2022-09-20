<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBookType;
use Intervention\Image\ImageManagerStatic as Image;


class ReferencebooktypeController extends Controller
{
    public function update($id)
    {
        $data = [
            'tagline' => request('tagline'),
            'banner' => $this->storage() . $this->upload(request()),
        ];
        ReferenceBookType::where('id', $id)->update($data);

        return back();

    }

    public function upload($request)
    {
        $path = $request->file('image')->store('image');
        $resize = Image::make($request->file('image'))->fit(615, 86);
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