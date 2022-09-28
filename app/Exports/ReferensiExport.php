<?php

namespace App\Exports;

use App\Models\ReferenceBook;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReferensiExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.referensiexport', [
            'books' => ReferenceBook::with('reference_themes', 'reference_book_types', 'levels', 'reference_book_downloads', 'reference_book_likeds', 'reference_comments')->orderBy('created_at', 'DESC')->get(),
        ]);
    }
}