<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Book;
use App\Models\BookDownloadStatistic;
use App\Models\BookReadStatistic;
use App\Models\BookShare;
use App\Models\Liked;
use App\Models\Mylibrary;
use App\Models\Saved;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Validator;

class MylibraryController extends Controller
{
    public function index()
    {
        $data['pustakaku'] = Banner::where('page_id', '889ebf6f-4bdb-46ad-9a69-e4bee0e6ace6')->first();
        return view('dashboard.pustakaku', $data);
    }

    public function update()
    {
        $data = [
            'page_id' => '889ebf6f-4bdb-46ad-9a69-e4bee0e6ace6',
            'tagline' => request('tagline'),
        ];

        $validation = Validator::make($data, [
            'page_id' => 'required',
        ]);

        Banner::where('page_id', '889ebf6f-4bdb-46ad-9a69-e4bee0e6ace6')->update($data);

        if ($_FILES['image']['name'] !== "") {
            $data = [
                'image' => $this->storage() . $this->upload(request()),
            ];

            Banner::where('page_id', '889ebf6f-4bdb-46ad-9a69-e4bee0e6ace6')->update($data);
        }

        return back();
    }

    public function upload($request)
    {
        $path = $request->file('image')->store('image');
        $resize = Image::make($request->file('image'))->fit(1419, 200);
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
    public function digital()
    {
        return view('mylibrarydigitalfilter');
    }
    public function komik()
    {
        return view('mylibrarykomikfilter');
    }
    public function audio()
    {
        return view('mylibraryaudiofilter');
    }
    public function video()
    {
        return view('mylibraryvideofilter');
    }
    //0 Belum baca
    // 1 Proses Baca
    // 2 Tandai Selesai
    // 3 Lanjut baca nanti
    public function saved()
    {
        $data = [
            'book_id' => request('book_id'),
            'visitor_id' => request('visitor_id'),
            'saved' => 1,
        ];

        $validation = Validator::make($data, [
            'book_id' => 'required',
            'visitor_id' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }
        $mylibrary = Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->first();

        if (request('status') == "unsaved") {
            if ($mylibrary) {
                Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['saved' => 1]);
            } else {
                Mylibrary::create($data);
            }

        } else {
            Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['saved' => 0]);
        }
    }
    public function liked()
    {
        $data = [
            'book_id' => request('book_id'),
            'visitor_id' => request('visitor_id'),
            'liked' => 1,
        ];

        $validation = Validator::make($data, [
            'book_id' => 'required',
            'visitor_id' => 'required',
        ]);
        $mylibrary = Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->first();
        if ($validation->fails()) {
            return back();
        }
        if (request('status') == "unliked") {
            if ($mylibrary) {
                Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['liked' => 1]);
            } else {
                Mylibrary::create($data);
            }
        } else {
            Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['liked' => 0]);
        }
    }

    public function being_read(Request $request)
    {
        $data = [
            'book_id' => request('book_id'),
            'visitor_id' => request('visitor_id'),
            'read' => 1,
        ];

        $validation = Validator::make($data, [
            'book_id' => 'required',
            'visitor_id' => 'required',
        ]);

        if ($request->cookie($request->book_id) == null) {
            $dataVisitor = json_decode($request->cookie('visitor_session'));
            $book_read_statistic = BookReadStatistic::create(['book_id' => request('book_id'), 'visitor_id' => request('visitor_id'), 'visitor_visit_id' => $dataVisitor->id]);
            $minutes = 1440;
            $response = new Response("");
            $response->withCookie(cookie(request('book_id'), $book_read_statistic, $minutes));
            $mylibrary = Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->first();
            if (request('status') == 0 or request('status') == 3) {
                if ($mylibrary) {
                    Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['read' => 1]);
                } else {
                    Mylibrary::create($data);
                }
            } else {
                Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['read' => request('status')]);
            }
            $count = BookReadStatistic::where(['book_id' => request('book_id')])->count();
            Book::where('id', request('book_id'))->update(['number_read' => $count]);
            return $response;
        }

        if (auth()->guard('visitor')->check() == true) {
            if ($request->cookie($request->book_id) !== null) {
                $dataVisitor = json_decode($request->cookie(request('book_id')));
                $id = auth()->guard('visitor')->user()->id;
                BookReadStatistic::where('id', $dataVisitor->id)->update(['visitor_id' => $id]);
            }
        }

        if ($validation->fails()) {
            return $validation->errors();
            return back();
        }

        $mylibrary = Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->first();
        if (request('status') == 0 or request('status') == 3) {
            if ($mylibrary) {
                Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['read' => 1]);
            } else {
                Mylibrary::create($data);
            }
        } else {
            Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['read' => request('status')]);
        }
        $count = BookReadStatistic::where(['book_id' => request('book_id')])->count();
        Book::where('id', request('book_id'))->update(['number_read' => $count]);
    }

    public function download(Request $request)
    {
        $data = [
            'book_id' => request('book_id'),
            'visitor_id' => request('visitor_id'),
            'downloaded' => 1,
        ];

        $validation = Validator::make($data, [
            'book_id' => 'required',
            'visitor_id' => 'required',
        ]);
        $dataVisitor = json_decode($request->cookie('visitor_session'));
        BookDownloadStatistic::create(['book_id' => request('book_id'), 'visitor_id' => request('visitor_id'), 'visitor_visit_id' => $dataVisitor->id]);
        if ($validation->fails()) {
            return back();
        }

        $mylibrary = Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->first();
        if ($mylibrary) {
            Mylibrary::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['downloaded' => 1]);
        } else {
            Mylibrary::create($data);
        }
    }

    public function share(Request $request)
    {

        $data = [
            'book_id' => request('book_id'),
            'visitor_id' => request('visitor_id'),
            'shared' => 1,
        ];

        $validation = Validator::make($data, [
            'book_id' => 'required',
            'visitor_id' => 'required',
        ]);

        $dataVisitor = json_decode($request->cookie('visitor_session'));
        BookShare::create(['book_id' => request('book_id'), 'visitor_id' => request('visitor_id'), 'visitor_visit_id' => $dataVisitor->id]);
        if ($validation->fails()) {
            return back();
        }
    }

    public function done()
    {
        $visitor_id = auth()->guard('visitor')->user()->id;
        $data = [
            'book_id' => request('book_id'),
            'visitor_id' => $visitor_id,
            'read' => 2,
        ];

        $validation = Validator::make($data, [
            'book_id' => 'required',
            'visitor_id' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }
        Mylibrary::where('visitor_id', $visitor_id)->where('book_id', request('book_id'))->where('read', 1)->update(['read' => 2]);
    }

    public function next()
    {
        $visitor_id = auth()->guard('visitor')->user()->id;
        $data = [
            'book_id' => request('book_id'),
            'visitor_id' => $visitor_id,
            'read' => 3,
        ];

        $validation = Validator::make($data, [
            'book_id' => 'required',
            'visitor_id' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }
        Mylibrary::where('book_id', request('book_id'))->where('read', 1)->update(['read' => 3]);
    }
}