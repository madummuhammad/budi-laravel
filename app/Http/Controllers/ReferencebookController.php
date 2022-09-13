<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book_type;
use App\Models\Language;
use App\Models\Level;
use App\Models\ReferenceBook;
use App\Models\ReferenceBookType;
use App\Models\Theme;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Validator;

class ReferencebookController extends Controller
{
    public function index($id)
    {
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['books'] = ReferenceBook::with('authors', 'book_pdfs', 'book_types')->where('reference_book_type', $id)->get();
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
        $data['book_types'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();

        return view('dashboard.reference_book', $data);
    }

    public function add($id)
    {
        if ($id == '5cbb48f9-aed4-44a9-90c2-71cbcef71264') {
            $content = $this->upload_pdf(request());
        }

        if ($id == '220843b8-4f60-4e47-9aca-cf6ea0d54afe') {
            $content = $this->upload_video(request());
        }
        $data = [
            'name' => request()->name,
            'author' => request()->author,
            'theme' => request()->theme,
            'page' => request()->page,
            'sinopsis' => request()->sinopsis,
            'reference_book_type' => $id,
            'level' => request()->level,
            'language' => request()->language,
            'cover' => $this->upload_img(request()),
            'content' => $content,
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'author' => 'required',
            'theme' => 'required',
            'page' => 'numeric',
            'sinopsis' => 'required',
            'reference_book_type' => 'required',
            'level' => 'required',
            'language' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect('dashboard/referenceadfasf_book/' . $id)->with(['message' => $validation->errors()]);
        }
        ReferenceBook::create($data);
        return redirect('dashboard/reference_book/' . $id);

    }

    public function upload_img($request)
    {
        $path = $request->file('cover')->store('image');
        $resize = Image::make($request->file('cover'))->fit(192, 272);
        $resize->save($this->storage_path($path));
        $disk = Storage::disk('gcs')->put('thumb-' . $path, $resize);
        $disk = Storage::disk('gcs');
        $thumbUrl = $disk->url('thumb-' . $path);
        return $thumbUrl;
    }

    public function upload_pdf($request)
    {
        $disk = Storage::disk('public')->put('book', $request->file('content'));
        return $disk;
    }

    public function upload_video($request)
    {
        $disk = Storage::disk('public')->put('video', $request->file('video'));
        return $disk;

    }

    public function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }

    public function destroy()
    {
        $id = request('id');
        ReferenceBook::where('id', $id)->delete();
        return back();
    }
}