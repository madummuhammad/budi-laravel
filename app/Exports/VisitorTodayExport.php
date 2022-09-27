<?php

namespace App\Exports;

use App\Models\VisitorVisit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VisitorTodayExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('dashboard.visitortodayexport', [
            'visitors' => VisitorVisit::with('visitors')->orderBy('created_at', 'DESC')->get(),
        ]);

    }
}