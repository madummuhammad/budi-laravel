<?php

namespace App\Http\Controllers;

use App\Models\Saved;
use Validator;

class MylibraryController extends Controller
{
    public function saved()
    {
        $data = [
            'book_id' => request('book_id'),
            'visitor_id' => request('visitor_id'),
        ];

        $validation = Validator::make($data, [
            'book_id' => 'required',
            'visitor_id' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }
        if (request('status') == "unsaved") {
            Saved::create($data);
        } else {
            Saved::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->forceDelete();
        }
    }
}