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
        $data['digital_count'] = Book::where('book_type', '2fd97285-08d0-4d81-83f2-582f0e8b0f36')->where('display_homepage', 1)->count();
        $data['komik_count'] = Book::where('book_type', '31ba455c-c9c7-4a3c-a2b1-62915546eaba')->where('display_homepage', 1)->count();
        $data['audio_count'] = Book::where('book_type', '9e30a937-0d60-49ad-9775-c19b97cfe864')->where('display_homepage', 1)->count();
        $data['video_count'] = Book::where('book_type', 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')->where('display_homepage', 1)->count();
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
        $data['book_types'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();
        return view('dashboard.book', $data);
    }

    public function book_filter()
    {
        if (request('book_type') == null and request('theme') == null and request('level') == null and request('language') == null) {
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

            if (request('language') !== null) {
                $query = $queryData->where('language', request('language'));
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

    public function edit($id)
    {
        $data['digital_count'] = Book::where('book_type', '2fd97285-08d0-4d81-83f2-582f0e8b0f36')->where('display_homepage', 1)->count();
        $data['komik_count'] = Book::where('book_type', '31ba455c-c9c7-4a3c-a2b1-62915546eaba')->where('display_homepage', 1)->count();
        $data['audio_count'] = Book::where('book_type', '9e30a937-0d60-49ad-9775-c19b97cfe864')->where('display_homepage', 1)->count();
        $data['video_count'] = Book::where('book_type', 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')->where('display_homepage', 1)->count();
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
        $data['book_types'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();
        $data['book'] = Book::where('id', $id)->first();
        $data['count'] = Book::where('book_type', $data['book']->book_type)->where('id', $id)->where('display_homepage', 1)->count();
        return view('dashboard.editbook', $data);
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
            'cover' => $this->storage() . $this->upload_img(request()),
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

    public function update()
    {
        $id = request('id');
        $name = 'book_type_edit' . $id;

        $data = [
            'name' => request('name'),
            'author' => request('author'),
            'theme' => request('theme'),
            'page' => request('page'),
            'sinopsis' => request('sinopsis'),
            'book_type' => request($name),
            'level' => request('level'),
            'language' => request('language'),
            'display_homepage' => request('display_homepage'),
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

        Book::where('id', $id)->update($data);

        if ($_FILES['cover']['name'] !== "") {
            $cover = [
                'cover' => $this->storage() . $this->upload_img(request()),
            ];
            Book::where('id', $id)->update($cover);
        }

        if ($_FILES['content']['name'] !== "") {
            if (request($name) == '9e30a937-0d60-49ad-9775-c19b97cfe864') {
                $content = $this->upload_audio(request());
            } elseif (request($name) == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') {
                $content = $this->upload_video(request());
            } else {
                $content = $this->upload_pdf(request());
            }

            $contents = [
                'content' => $content,
            ];
            Book::where('id', $id)->update($contents);
        }

        $having_pdf = Book_pdf::where('book_id', $id)->first();

        if ($having_pdf !== null) {
            if (request('having_pdf') !== null) {
                $book_id = Book::where('id', $id)->first();
                $name = 'content-versi-pdf';
                if ($_FILES['content-versi-pdf']['name'] !== "") {
                    $content2 = [
                        'content' => $this->upload_pdf(request(), $name),
                        'book_id' => $book_id->id,
                    ];
                    Book_pdf::where('book_id', $id)->update($content2);
                }
            } else {
                Book_pdf::where('book_id', $id)->delete();
            }
        } else {
            if (request('having_pdf') !== null) {
                $book_id = Book::where('id', $id)->first();
                $name = 'content-versi-pdf';
                if ($_FILES['content-versi-pdf'] !== null) {
                    $content2 = [
                        'content' => $this->upload_pdf(request(), $name),
                        'book_id' => $book_id->id,
                    ];
                    Book_pdf::create($content2);
                }

            }
        }
        return redirect('dashboard/book');

    }

    public function upload_img($request)
    {
        $path = $request->file('cover')->store('image');
        $resize = Image::make($request->file('cover'))->fit(192, 272);
        $resize->save($this->storage_path('public/' . $path));
        unlink(storage_path('app/' . $path));
        return $path;

    }

    public function storage()
    {
        return url('storage') . '/';
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

    public function download()
    {
        $file = public_path() . '/storage' . '/' . request('file');
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($file, request('name') . '.pdf', $headers);

    }
}