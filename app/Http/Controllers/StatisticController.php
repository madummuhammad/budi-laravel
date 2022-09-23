<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Mylibrary;
use App\Models\VisitorVisit;

class StatisticController extends Controller
{
    public function visitor()
    {
        $data['visitors'] = VisitorVisit::with('visitors')->get();
        return view('dashboard.visitorstatistic', $data);
    }

    public function book()
    {
        $mylibrary = Mylibrary::get();

        $data['books'] = Book::with('themes', 'book_types', 'levels', 'book_read_statistics', 'book_download_statistics', 'mylibraries', 'comments')->get();

        return view('dashboard.bookstatistic', $data);
    }

    public function profiling($id)
    {
        $data['visitors'] = VisitorVisit::with('visitors', 'book_read_statistics', 'book_read_statistics.books', 'book_read_statistics.books.themes', 'book_read_statistics.books.levels', 'book_read_statistics.books.book_types')->where('id', $id)->get();

        $data['likeds'] = VisitorVisit::with('visitors', 'visitors.mylibraries', 'visitors.mylibraries.books', 'visitors.mylibraries.books.levels', 'visitors.mylibraries.books.themes', 'visitors.mylibraries.books.book_types')->where('id', $id)->get();

        $data['downloaded'] = VisitorVisit::with('visitors', 'book_download_statistics', 'book_download_statistics.books', 'book_download_statistics.books.themes', 'book_download_statistics.books.levels', 'book_download_statistics.books.book_types')->where('id', $id)->get();

        return view('dashboard.profiling', $data);
    }
}