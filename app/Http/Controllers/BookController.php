<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Book_pdf;
use App\Models\Book_type;
use App\Models\Language;
use App\Models\Level;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

class BookController extends Controller
{
    public function index()
    {
        $data['books'] = Book::with('authors', 'book_pdfs', 'book_types')->get();
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
        $data['book_types'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();
        return view('dashboard.book', $data);
    }

    public function book_filter()
    {
        if (request('book_type') == null and request('theme') == null and request('level') == null) {
            $data['books'] = Book::with('authors', 'book_pdfs', 'book_types')->get();
        } else {
            $queryData = $data['books'] = Book::with('authors', 'book_pdfs', 'book_types');
            if (request('book_type') !== null) {
                $query = $queryData->where('book_type', request('book_type'));
            }
            if (request('theme') !== null) {
                $query = $queryData->where('theme', request('theme'));
            }

            if (request('level') !== null) {
                $query = $queryData->where('level', request('level'));
            }
            $data['books'] = $query->get();
        }
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
        $data['book_types'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();
        return view('dashboard.bookfilter', $data);
    }

    public function table()
    {
        $data['books'] = Book::with('authors', 'book_pdfs', 'book_types')->get();
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
        $data['book_types'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();

        return view('dashboard.booktable', $data);
    }

    public function create()
    {
        return view('dashboard.createbook');
    }

    public function add(Request $request)
    {
        if ($request->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864') {
            $content = $this->upload_audio($request);
        } elseif ($request->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') {
            $content = $this->upload_video($request);
        } else {
            $content = $this->upload_pdf($request);
        }

        $data = [
            'name' => $request->name,
            'author' => $request->author,
            'theme' => $request->theme,
            'page' => $request->page,
            'sinopsis' => $request->sinopsis,
            'book_type' => $request->book_type,
            'level' => $request->level,
            'language' => $request->language,
            'display_homepage' => $request->display_homepage,
            'cover' => $this->upload_img($request),
            'content' => $content,
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'author' => 'required',
            'theme' => 'required',
            'page' => 'numeric',
            'sinopsis' => 'required',
            'book_type' => 'required',
            'level' => 'required',
            'language' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect('dashboard/book')->with(['message' => $validation->errors()]);
        }
        Book::create($data);

        if ($request->having_pdf !== null) {
            $book_id = Book::where('content', $content)->first();
            $name = 'content-versi-pdf';
            $data = [
                'content' => $this->upload_pdf($request, $name),
                'book_id' => $book_id->id,
            ];
            Book_pdf::create($data);
        }
        return redirect('dashboard/book');

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

    public function upload_pdf($request, $name = 'content')
    {
        $disk = Storage::disk('public')->put('book', $request->file($name));
        return $disk;
    }

    public function upload_audio($request)
    {
        $disk = Storage::disk('public')->put('audio', $request->file('content'));
        return $disk;

    }

    public function upload_video($request)
    {
        $disk = Storage::disk('public')->put('video', $request->file('content'));
        return $disk;

    }
    public function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }

    public function destroy()
    {
        $id = request('id');
        Book::where('id', $id)->delete();
        return back();
    }
}