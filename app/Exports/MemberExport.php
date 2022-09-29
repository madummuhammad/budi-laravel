<?php

namespace App\Exports;

use App\Models\Visitor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MemberExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('dashboard.memberexport', [
            'visitors' => Visitor::with('book_read_statistics', 'book_read_statistics.books', 'book_read_statistics.books.themes', 'book_read_statistics.books.levels', 'book_read_statistics.books.book_types')->where('id', request('id'))->first(),

            'likeds' => Visitor::with('mylibraries', 'mylibraries.books', 'mylibraries.books.levels', 'mylibraries.books.themes', 'mylibraries.books.book_types')->where('id', request('id'))->first(),

            'downloaded' => Visitor::with('book_download_statistics', 'book_download_statistics.books', 'book_download_statistics.books.themes', 'book_download_statistics.books.levels', 'book_download_statistics.books.book_types')->where('id', request('id'))->first(),

            'comments' => Visitor::with('comments', 'comments.books', 'comments.books.levels', 'comments.books.themes', 'comments.books.book_types')->where('id', request('id'))->first(),

            'shared' => Visitor::with('shares', 'shares.books', 'shares.books.levels', 'shares.books.themes', 'shares.books.book_types')->where('id', request('id'))->first(),

        ]);

    }
}