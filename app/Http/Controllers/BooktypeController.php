<?php

namespace App\Http\Controllers;

use App\Models\Book_type;
use Storage;

class BooktypeController extends Controller
{
    public function index($id)
    {
        $data['book_types'] = Book_type::where('id', $id)->first();
        return view('dashboard.booktype', $data);
    }

    public function update($id)
    {
        $data = [
            'tagline' => request('tagline'),
            'banner' => $this->upload(request()),
        ];
        Book_type::where('id', $id)->update($data);

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