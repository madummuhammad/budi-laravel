<?php

namespace App\Exports;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BookExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.bookexport', [
            'books' => Book::with('themes', 'book_types', 'levels')->orderBy('created_at', 'DESC')->get(),
        ]);
    }
}