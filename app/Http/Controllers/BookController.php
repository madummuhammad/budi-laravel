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
        $data['paud_count'] = Book::where('level', '014453da-54e6-41b5-be05-952bc233f144')->where('display_homepage', 1)->count();
        $data['sd_count'] = Book::where('level', '0207580f-6a98-477b-a19f-35bfc0f938e9')->where('display_homepage', 1)->count();
        $data['smp_count'] = Book::where('level', '2070db95-9133-4aa1-9f3f-f711f10df750')->where('display_homepage', 1)->count();
        $data['sma_count'] = Book::where('level', '555c961c-fb2a-4a25-8829-4a12c7d2afc0')->where('display_homepage', 1)->count();
        $data['umum_count'] = Book::where('level', 'a26a4afd-7226-434c-83f3-9ca3ce4af523')->where('display_homepage', 1)->count();
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
            $data['books'] = Book::with('authors', 'book_pdfs', 'book_types')->orderBy('created_at', 'DESC')->get();
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
            $data['books'] = $query->orderBy('created_at', 'DESC')->get();
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
        $data['paud_count'] = Book::where('level', '014453da-54e6-41b5-be05-952bc233f144')->where('display_homepage', 1)->count();
        $data['sd_count'] = Book::where('level', '0207580f-6a98-477b-a19f-35bfc0f938e9')->where('display_homepage', 1)->count();
        $data['smp_count'] = Book::where('level', '2070db95-9133-4aa1-9f3f-f711f10df750')->where('display_homepage', 1)->count();
        $data['sma_count'] = Book::where('level', '555c961c-fb2a-4a25-8829-4a12c7d2afc0')->where('display_homepage', 1)->count();
        $data['umum_count'] = Book::where('level', 'a26a4afd-7226-434c-83f3-9ca3ce4af523')->where('display_homepage', 1)->count();
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
        $data['book_types'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();
        $data['book'] = Book::where('id', $id)->first();
        $data['book']->book_type;
        $data['count'] = Book::where('level', $data['book']->level)->where('display_homepage', 1)->count();
        return view('dashboard.editbook', $data);
    }

    public function add(Request $request)
    {
        if ($request->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864') {
            $content = $this->upload_audio($request);
        } elseif ($request->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') {
            $content = request('content');
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

        if (request('content') !== null) {
            $content = request('content');
            $contents = [
                'content' => $content,
            ];
            Book::where('id', $id)->update($contents);
        }
        if ($_FILES['content']['name'] !== "") {
            if (request($name) == '9e30a937-0d60-49ad-9775-c19b97cfe864') {
                $content = $this->upload_audio(request());
            } elseif (request($name) == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') {
                $content = request('content');
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
        if (request('book_type') == '9e30a937-0d60-49ad-9775-c19b97cfe864') {
            if (file_exists($file) == false) {
                return back();
            }
            $file = public_path() . '/storage' . '/' . request('file');
            $headers = array(
                'Content-Type: audio/mpeg',
            );
            return response()->download($file, request('name') . '.mp3', $headers);
        } elseif (request('book_type') == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') {
            // Video
            $video_url=str_replace(url('storage/'), "", request('file'));
            $file = public_path() . '/storage' . '/' . $video_url;
            if (file_exists($file) == false) {
                return back();
            }
            $headers = array(
                'Content-Type: video/mp4',
            );
            return response()->download($file, request('name') . '.mp4', $headers);
        } else {
            if (file_exists($file) == false) {
                return back();
            }
            $file = public_path() . '/storage' . '/' . request('file');
            $headers = array(
                'Content-Type: application/pdf',
            );
            return response()->download($file, request('name') . '.pdf', $headers);
        }

    }
}
