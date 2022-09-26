<?php

namespace App\Http\Controllers;

use App\Exports\BookStatisticExport;
use App\Models\Book;
use App\Models\Mylibrary;
use App\Models\ReferenceBook;
use App\Models\VisitorVisit;
use Maatwebsite\Excel\Facades\Excel;

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

        $data['books'] = Book::with('themes', 'book_types', 'levels', 'book_read_statistics', 'book_download_statistics', 'mylibraries', 'comments', 'shares')->get();

        return view('dashboard.bookstatistic', $data);
    }

    public function referensi()
    {
        $mylibrary = Mylibrary::get();

        $data['books'] = ReferenceBook::with('reference_themes', 'reference_book_types', 'levels', 'reference_book_downloads', 'reference_book_likeds', 'reference_comments')->get();

        return view('dashboard.referencebookstatistic', $data);
    }

    public function profiling($id)
    {
        $data['visitors'] = VisitorVisit::with('visitors', 'book_read_statistics', 'book_read_statistics.books', 'book_read_statistics.books.themes', 'book_read_statistics.books.levels', 'book_read_statistics.books.book_types')->where('id', $id)->get();

        $data['likeds'] = VisitorVisit::with('visitors', 'visitors.mylibraries', 'visitors.mylibraries.books', 'visitors.mylibraries.books.levels', 'visitors.mylibraries.books.themes', 'visitors.mylibraries.books.book_types')->where('id', $id)->get();

        $data['downloaded'] = VisitorVisit::with('visitors', 'book_download_statistics', 'book_download_statistics.books', 'book_download_statistics.books.themes', 'book_download_statistics.books.levels', 'book_download_statistics.books.book_types')->where('id', $id)->get();

        $data['comments'] = VisitorVisit::with('visitors', 'visitors.comments', 'visitors.comments.books', 'visitors.comments.books.levels', 'visitors.comments.books.themes', 'visitors.comments.books.book_types')->where('id', $id)->get();

        $data['shared'] = VisitorVisit::with('visitors', 'visitors.shares', 'visitors.shares.books', 'visitors.shares.books.levels', 'visitors.shares.books.themes', 'visitors.shares.books.book_types')->where('id', $id)->get();

        return view('dashboard.profiling', $data);
    }

    public function book_export()
    {
        return Excel::download(new BookStatisticExport, 'siswa.xlsx');
    }
}