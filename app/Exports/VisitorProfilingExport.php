<?php

namespace App\Exports;

use App\Models\VisitorVisit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VisitorProfilingExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('dashboard.visitorprofilingexport', [
            'visitors' => VisitorVisit::with('visitors', 'book_read_statistics', 'book_read_statistics.books', 'book_read_statistics.books.themes', 'book_read_statistics.books.levels', 'book_read_statistics.books.book_types')->where('id', request('id'))->get(),

            'likeds' => VisitorVisit::with('visitors', 'visitors.mylibraries', 'visitors.mylibraries.books', 'visitors.mylibraries.books.levels', 'visitors.mylibraries.books.themes', 'visitors.mylibraries.books.book_types')->where('id', request('id'))->get(),

            'downloaded' => VisitorVisit::with('visitors', 'book_download_statistics', 'book_download_statistics.books', 'book_download_statistics.books.themes', 'book_download_statistics.books.levels', 'book_download_statistics.books.book_types')->where('id', request('id'))->get(),

            'comments' => VisitorVisit::with('visitors', 'visitors.comments', 'visitors.comments.books', 'visitors.comments.books.levels', 'visitors.comments.books.themes', 'visitors.comments.books.book_types')->where('id', request('id'))->get(),

            'shared' => VisitorVisit::with('visitors', 'visitors.shares', 'visitors.shares.books', 'visitors.shares.books.levels', 'visitors.shares.books.themes', 'visitors.shares.books.book_types')->where('id', request('id'))->get(),

        ]);

    }
}