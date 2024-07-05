<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Validator;

class FooterController extends Controller
{
    public function index()
    {
        $data['contact']=Contact::first();
        return view('dashboard.footer',$data);
    }

    public function update()
    {
        $data=[
            'heading'=>request('heading'),
            'sub_heading'=>request('sub_heading'),
            'phone'=>request('phone'),
            'email'=>request('email'),
            'address'=>request('address')
        ];

        // $validation=Validator::make($data,[
        //     'heading'=>'required',
        //     'sub_heading'=>'required',
        //     'phone'=>'required',
        //     'email'=>'required',
        //     'address'=>'required',
        // ]);

        // if($validation->fails())
        // {
        //     return back();
        // }

        Contact::where('id','f1c3ae2b-7111-4b2f-9d48-3a2bebb66f8b')->update($data);
        return back();
    }
}
