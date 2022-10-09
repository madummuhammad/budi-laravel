<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mylibrary;
use App\Models\BookShare;
use App\Models\Visitor;

class MedaliController extends Controller
{
    public function medal()
    {
        if($this->gold($this->read(),$this->downloaded(),$this->share())==true)
        {
            return 'gold';
        }

        if($this->silver($this->read(),$this->downloaded(),$this->share())==true)
        {
            return 'silver';
        }

        if($this->bronze($this->read(),$this->downloaded(),$this->share())==true)
        {
            return 'bronze';
        }
    }

    public function medal_clasification($read=0,$downloaded=0,$share=0)
    {
        if($this->gold($read,$downloaded,$share)==true)
        {
            return 'gold';
        }

        if($this->silver($read,$downloaded,$share)==true)
        {
            return 'silver';
        }

        if($this->bronze($read,$downloaded,$share)==true)
        {
            return 'bronze';
        }
    }


    public function read()
    {
        $visitor_id=auth()->guard('visitor')->user()->id;
        $query=Mylibrary::where('visitor_id',$visitor_id);
        $result=$query->where('read',2)->count();
        return $result;
    }

    public function downloaded()
    {
        $visitor_id=auth()->guard('visitor')->user()->id;
        $query=Mylibrary::where('visitor_id',$visitor_id);
        $result=$query->where('downloaded',1)->count();
        return $result;
    }

    public function share()
    {
        $visitor_id=auth()->guard('visitor')->user()->id;
        $query=BookShare::where('visitor_id',$visitor_id);
        $result=$query->count();
        return $result;
    }

    public function gold($read=0, $downloaded=0,$share=0)
    {
        if ($read>=3 AND $downloaded>=3 AND $share>=3) {
            return true;
        } else {
            return false;
        }
    }

    public function silver($read=0, $downloaded=0,$share=0)
    {
        if ($read>=2 AND $downloaded>=2 AND $share>=2) {
            return true;
        } else {
            return false;
        }
    }

    public function bronze($read=0, $downloaded=0,$share=0)
    {
        if ($read>=1 AND $downloaded>=1 AND $share>=1) {
            return true;
        } else {
            return false;
        }
    }

    public function homepage()
    {
       $result= Visitor::withCount(['read'=>function($query){
        $query->where('read',2);
       },'downloaded'=>function($query2){
        $query2->where('downloaded',1);
       },'shares'=>function($query3){
        $query3;
       }])->orderByRaw('read_count DESC, downloaded_count DESC, shares_count DESC')->get();
       return $result;
   }
}
