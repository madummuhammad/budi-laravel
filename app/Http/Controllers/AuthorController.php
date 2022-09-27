<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $data['authors'] = Author::orderBy('name', 'ASC')->get();
        return view('dashboard.author', $data);
    }

    public function add()
    {
        $data = [
            'name' => request('name'),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
        ]);
        if ($validation->fails()) {
            return back();
        }

        Author::create($data);

        return redirect('dashboard/author');
    }

    public function update()
    {
        $data = [
            'name' => request('name'),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
        ]);
        if ($validation->fails()) {
            return back();
        }

        Author::where('id', request('id'))->update($data);

        return redirect('dashboard/author');
    }

    public function destroy()
    {
        $id = request('id');
        Author::where('id', $id)->delete();
        return back();
    }
}