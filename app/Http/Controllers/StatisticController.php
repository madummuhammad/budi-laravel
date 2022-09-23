<?php

namespace App\Http\Controllers;

use App\Models\VisitorVisit;

class StatisticController extends Controller
{
    public function visitor()
    {
        $data['visitors'] = VisitorVisit::with('visitors')->get();
        return view('dashboard.visitorstatistic', $data);
    }
}