<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;
use Storage;

class HomepageController extends Controller
{
    function index(){
        $data['banners']=Banner::where('page_id',"b732f255-2544-4966-933c-263fdaa27bd0")->get();
        return view('dashboard.homepage',$data);
    }
}