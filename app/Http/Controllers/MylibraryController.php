<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookDownloadStatistic;
use App\Models\BookReadStatistic;
use App\Models\Liked;
use App\Models\Mylibrary;
use App\Models\Saved;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;

class MylibraryController extends Controller
{
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
            $minutes = 1;
            $response = new Response("");
            $response->withCookie(cookie(request('book_id'), $book_read_statistic, $minutes));
            return $response;
        }

        if (auth()->guard('visitor')->check() == true) {
            if ($request->cookie($request->book_id) !== null) {
                $data = json_decode($request->cookie(request('book_id')));
                $id = auth()->guard('visitor')->user()->id;
                BookReadStatistic::where('id', $data->id)->update(['visitor_id' => $id]);
            }
        }

        if ($validation->fails()) {
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