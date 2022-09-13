<?php

namespace App\Http\Controllers;

use App\Models\ReferenceBookType;
use Storage;

class ReferencebooktypeController extends Controller
{
    public function update($id)
    {
        $data = [
            'tagline' => request('tagline'),
            'banner' => $this->upload(request()),
        ];
        ReferenceBookType::where('id', $id)->update($data);

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

}