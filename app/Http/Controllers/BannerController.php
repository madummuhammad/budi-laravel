<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;
use Storage;

class BannerController extends Controller
{
    function add(){
        $data=[
            'page_id'=>request('page_id'),
            'tagline'=>request('tagline'),
            'image'=>$this->upload(request()),
        ];

        $validation=Validator::make($data,[
            'page_id'=>'required'
        ]);

        Banner::create($data);

        return back();
    }

    function upload($request){
      $path = $request->file('image')->store('image');
      $disk = Storage::disk('gcs')->put('image',$request->file('image'));
      $disk = Storage::disk('gcs');
      $url = $disk->url($path);
      return $url;
    }

    function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }

    function destroy(){
        $id=request('id');
        Banner::where('id',$id)->delete();
        return back();
    }
}