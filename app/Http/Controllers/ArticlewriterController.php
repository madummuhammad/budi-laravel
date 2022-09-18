<?php

namespace App\Http\Controllers;

use App\Models\BlogWriter;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Validator;

class ArticlewriterController extends Controller
{
    public function index()
    {
        $data['articlewriters'] = BlogWriter::all();
        return view('dashboard.articlewriter', $data);
    }
    public function store($id)
    {
        $data = [
            'name' => request('name'),
            'description' => request('description'),
            'instagram' => request('instagram'),
            'twitter' => request('twitter'),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }
        $blog = BlogWriter::create($data);
        $id = $blog->id;
        $data = [
            'image' => $this->upload_img(request()),
        ];

        $blog = BlogWriter::where('id', $id)->update($data);
        return redirect('dashboard/blog/article/writer/');
    }

    public function update($id)
    {
        $writer_id = request('id');
        $data = [
            'name' => request('name'),
            'description' => request('description'),
            'instagram' => request('instagram'),
            'twitter' => request('twitter'),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }
        $blog = BlogWriter::where('id', $writer_id)->update($data);
        if ($_FILES['cover']['name'] !== "") {
            $data = [
                'image' => $this->upload_img(request()),
            ];
            $blog = BlogWriter::where('id', $writer_id)->update($data);
        }

        return redirect('dashboard/blog/article/writer');
    }

    public function destroy()
    {
        $id = request('id');
        BlogWriter::where('id', $id)->delete();
        return back();
    }

    public function upload_img($request, $fit_width = 100, $fit_height = 100, $name = "cover")
    {
        $path = $request->file($name)->store('image');
        $resize = Image::make($request->file($name))->fit($fit_width, $fit_height);
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
}