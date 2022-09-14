<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Validator;

class BlogController extends Controller
{
    public function index($id)
    {
        $data['blogs'] = Blog::where('blog_type', $id)->get();
        $data['id'] = $id;
        return view('dashboard.blog', $data);
    }

    public function create($id)
    {
        $data['id'] = $id;
        return view('dashboard.createblog', $data);
    }

    public function store($id)
    {
        $tags = json_decode(request('tags'));
        $data = [
            'name' => request('name'),
            'cover' => $this->upload_img(request()),
            'content' => request('content'),
            'writer' => auth()->user()->name,
            'display_homepage' => request('display_homepage'),
            'uploaded_at' => $this->ind_date(date('Y-m-d')),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'content' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }
        $blog = Blog::create($data);
        for ($i = 0; $i < count($tags); $i++) {
            $dataTag = [
                'tag' => $tags[$i]->value,
                'blog_id' => $blog->id,
            ];
            Tag::create($dataTag);
        }
        return redirect('dashboard/blog/' . $id);

    }

    public function ind_date($tanggal)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
        );
        $explode = explode('-', $tanggal);

        return $explode[2] . ' ' . $bulan[(int) $explode[1]] . ' ' . $explode[0];
    }

    public function upload_img($request)
    {
        $path = $request->file('cover')->store('image');
        $resize = Image::make($request->file('cover'))->fit(396, 222);
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

    public function destroy()
    {
        $id = request('id');
        Blog::where('id', $id)->delete();
        return back();
    }
}