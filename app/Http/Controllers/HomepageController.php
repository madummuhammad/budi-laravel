<?php

namespace App\Http\Controllers;

use App\Models\AudioBookHomepage;
use App\Models\Banner;
use App\Models\Book;
use App\Models\BookOfTheMonth;

class HomepageController extends Controller
{
    public function index()
    {
        $data['books'] = Book::all();
        $data['banners'] = Banner::where('page_id', "b732f255-2544-4966-933c-263fdaa27bd0")->get();
        $data['book_of_the_months'] = BookOfTheMonth::with('books', 'books.authors')->get();
        $data['audio_book_homepages'] = AudioBookHomepage::with('books', 'books.authors')->get();
        // return $data['audio_book_homepages'] = AudioBookHomepage::with('books', 'books.authors')->whereHas('books', function ($query) {
        //     return $query->where('book_type', '=', '9e30a937-0d60-49ad-9775-c19b97cfe864');
        // })->get();

        return view('dashboard.homepage', $data);
    }

    public function book_of_the_month()
    {
        $id = request('id');
        $book_id = request('book_id');
        $data = [
            'book_id' => request('book_id'),
        ];
        BookOfTheMonth::where('id', $id)->update($data);
        return back();
    }
}