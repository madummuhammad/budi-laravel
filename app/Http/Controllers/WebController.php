<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Book;
use App\Models\Book_type;
use App\Models\Level;
use App\Models\Theme;

class WebController extends Controller
{
    public function index()
    {
        $data['levels'] = Level::all();
        $data['books'] = Book::all();
        $data['themes'] = Theme::all();
        $data['banners'] = Banner::where('page_id', "b732f255-2544-4966-933c-263fdaa27bd0")->get();
        return view('homepage', $data);
    }

    public function book($id)
    {
        $data['book_detail'] = Book::where('id', $id)->with('authors', 'themes', 'book_types', 'book_pdfs')->first();
        // return $data;
        return view('book', $data);
    }

    public function book_type($id)
    {
        $data['books'] = Book::with('authors', 'themes')->where('book_type', $id)->get();
        $data['book_types'] = Book_type::where('id', $id)->first();
        return view('booktype', $data);
    }

    public function pustakaku()
    {
        return view('pustakaku');
    }
}