<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogWriter;
use App\Models\Tag;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Validator;

class BlogController extends Controller
{
    public function index($id)
    {
        $data['blogs'] = Blog::with('writers')->where('blog_type', $id)->orderBy('created_at', 'DESC')->get();
        $data['id'] = $id;
        return view('dashboard.blog', $data);
    }

    public function banner()
    {
        $data['pustakaku'] = Banner::where('page_id', '5db1210c-d350-4abd-b09b-eb33058b93e1')->first();
        return view('dashboard.blogbanner', $data);
    }

    public function banner_update()
    {
        $data = [
            'page_id' => '5db1210c-d350-4abd-b09b-eb33058b93e1',
            'tagline' => request('tagline'),
        ];

        $validation = Validator::make($data, [
            'page_id' => 'required',
        ]);

        Banner::where('page_id', '5db1210c-d350-4abd-b09b-eb33058b93e1')->update($data);

        if ($_FILES['cover']['name'] !== "") {
            $data = [
                'image' => $this->storage() . $this->upload_img(request(), 615, 86),
            ];

            Banner::where('page_id', '5db1210c-d350-4abd-b09b-eb33058b93e1')->update($data);
        }

        return back();

    }

    public function create($id)
    {
        $data['id'] = $id;
        $data['articlewriters'] = BlogWriter::all();
        return view('dashboard.createblog', $data);
    }

    public function edit($id, $blog_id)
    {
        $data['id'] = $id;
        $data['articlewriters'] = BlogWriter::all();
        $data['display_number'] = Blog::where('display_homepage', 1)->count();
        $data['blogs'] = Blog::with('tags')->where('id', $blog_id)->first();
        return view('dashboard.editblog', $data);
    }

    public function store($id)
    {
        $tags = json_decode(request('tags'));
        $data = [
            'name' => request('name'),
            'cover' => $this->storage() . $this->upload_img(request()),
            'content' => request('content'),
            'blog_type' => $id,
            'uploader' => auth()->user()->name,
            'writer' => request('writer'),
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
        return redirect('dashboard/blog/' . Str::slug($id));
    }

    public function update($id, $blog_id)
    {
        $tags = json_decode(request('tags'));
        $data = [
            'name' => request('name'),
            'content' => request('content'),
            'blog_type' => $id,
            'uploader' => auth()->user()->name,
            'writer' => request('writer'),
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
        $blog = Blog::where('id', $blog_id)->update($data);

        if ($_FILES['cover']['name'] !== "") {
            $data = [
                'cover' => $this->storage() . $this->upload_img(request()),
            ];
            $blog = Blog::where('id', $blog_id)->update($data);
        }

        Tag::where('blog_id', $blog_id)->forceDelete();

        for ($i = 0; $i < count($tags); $i++) {
            $dataTag = [
                'tag' => $tags[$i]->value,
                'blog_id' => $blog_id,
            ];
            Tag::create($dataTag);
        }
        return redirect('dashboard/blog/' . Str::slug($id));
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

    public function upload_img($request, $fit_width = "396", $fit_height = "222")
    {
        $path = $request->file('cover')->store('image');
        $resize = Image::make($request->file('cover'))->fit($fit_width, $fit_height);
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
        Blog::where('id', $id)->delete();
        return back();
    }
}