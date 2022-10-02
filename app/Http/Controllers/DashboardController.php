<?php

namespace App\Http\Controllers;

use Active;
use App\Models\AnalyticsUser;
use App\Models\Book_type;
use App\Models\Level;
use App\Models\Theme;
use App\Models\PageView;
use Carbon\Carbon;
use DatePeriod;
use DateTime;
use DateInterval;

class DashboardController extends Controller
{
    public function index()
    {
        $users = Active::users()->count();
        $guests = Active::guests()->count();
        $totalActiveUser = $users+$guests;
        $pengunjung = AnalyticsUser::get();
        $kunjungan = PageView::whereDate('created_at', Carbon::today())->get();
        $kunjunganAll = PageView::get();

        $from = date('Y-m-d 00:00:00', strtotime('-1 month'));
        $from = new DateTime($from);
        $from = $from->modify('+1 day');
        $from = $from->format('Y-m-d').' 00:00:00';
        $to = date('Y-m-d 23:59:59');


        if(request('filter_pengunjung')){
            $filter = explode('/', request('filter_pengunjung'));
            $from = $filter[0].' 00:00:00';
            $to = $filter[1].' 23:59:59';
        }
        
       if($to < date('Y-m-d 00:00:00', strtotime('+1 month', strtotime($from)))){
        $period = new DatePeriod(
            new DateTime($from),
            new DateInterval('P1D'),
            new DateTime($to)
        );
       }else{
        $start = new DateTime($from);
        $end = new DateTime($to);

        $inc = DateInterval::createFromDateString('first day of next month');
        $end->modify('+1 day');
        $period = new DatePeriod($start,$inc,$end);
       }

       $tema = Theme::with(['book' => function($query){
        $query->withCount('book_read_statistics');
        $query->withCount('book_download_statistics');
        $query->withCount('mylibraries');
       }])->get();

       $jenis = Book_type::with(['book' => function($query){
        $query->withCount('book_read_statistics');
        $query->withCount('book_download_statistics');
        $query->withCount('mylibraries');
       }])->get();

       $jenjang = Level::with(['book' => function($query){
        $query->withCount('book_read_statistics');
        $query->withCount('book_download_statistics');
        $query->withCount('mylibraries');
       }])->get();

        $datapengunjung = PageView::whereBetween('created_at', [$from, $to])->get();

        return view('dashboard.dashboard', compact(
            'totalActiveUser', 
            'pengunjung', 
            'kunjunganAll', 
            'kunjungan', 
            'datapengunjung', 
            'to', 
            'from', 
            'tema', 
            'jenis', 
            'jenjang', 
            'period'
        ));
    }
}