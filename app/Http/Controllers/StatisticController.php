<?php

namespace App\Http\Controllers;

use App\Exports\BookExport;
use App\Exports\BookStatisticExport;
use App\Exports\VisitorAlltimeExport;
use App\Exports\VisitorExport;
use App\Exports\VisitorTodayExport;
use App\Models\Book;
use App\Models\Mylibrary;
use App\Models\ReferenceBook;
use App\Models\VisitorVisit;
use Maatwebsite\Excel\Facades\Excel;

class StatisticController extends Controller
{
    public function visitor()
    {
        $data['visitors'] = VisitorVisit::with('visitors')->orderBy('created_at', 'DESC')->get();
        return view('dashboard.visitorstatistic', $data);
    }

    public function book()
    {
        $mylibrary = Mylibrary::get();

        $data['books'] = Book::with('themes', 'book_types', 'levels', 'book_read_statistics', 'book_download_statistics', 'mylibraries', 'comments', 'shares')->orderBy('created_at', 'DESC')->get();

        return view('dashboard.bookstatistic', $data);
    }

    public function referensi()
    {
        $mylibrary = Mylibrary::get();

        $data['books'] = ReferenceBook::with('reference_themes', 'reference_book_types', 'levels', 'reference_book_downloads', 'reference_book_likeds', 'reference_comments')->orderBy('created_at', 'DESC')->get();

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

    public function book_statistic_export()
    {
        return Excel::download(new BookStatisticExport, 'analitik_buku' . date('d-m-Y') . '.xlsx');
    }

    public function visitor_export()
    {
        return Excel::download(new VisitorExport, 'analitik_pengguna' . date('d-m-Y') . '.xlsx');
    }

    public function book_export()
    {
        return Excel::download(new BookExport, 'daftar_buku' . date('d-m-Y') . '.xlsx');
    }

    public function visitor_today_export()
    {
        return Excel::download(new VisitorTodayExport, 'pengunjung_hari_ini' . date('d-m-Y') . '.xlsx');
    }

    public function visitor_alltime_export()
    {
        return Excel::download(new VisitorAlltimeExport, 'semua_pengunjung' . date('d-m-Y') . '.xlsx');
    }
}