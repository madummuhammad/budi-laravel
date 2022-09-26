<?php

namespace App\Exports;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookStatisticExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.bookstatisticexport', [
            'books' => Book::with('themes', 'book_types', 'levels', 'book_read_statistics', 'book_download_statistics', 'mylibraries', 'comments', 'shares')->get(),
        ]);
    }
}