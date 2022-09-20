<?php

namespace App\Http\Controllers;

use App\Models\Book_type;
use Intervention\Image\ImageManagerStatic as Image;
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
            'banner' => $this->storage() . $this->upload(request()),
        ];
        Book_type::where('id', $id)->update($data);

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