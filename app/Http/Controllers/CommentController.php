<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use App\Models\ReferenceComment;
use Validator;

class CommentController extends Controller
{
    public function dashboard($id)
    {
        $data['books'] = Book::with('comments')->where("id", $id)->first();
        return view('dashboard.comment', $data);
    }

    public function allcomment()
    {
        $data['books']=Comment::with('visitors','books')->orderBy('created_at','DESC')->get();
        $data['reference_books']=ReferenceComment::with('visitors','reference_books')->orderBy('created_at','DESC')->get();
        return view('dashboard.allcomment',$data);
    }

    public function add()
    {
        $data = [
            'visitor_id' => auth()->guard('visitor')->user()->id,
            'book_id' => request('id'),
            'star' => request('star'),
            'comment' => request('comment'),
        ];

        $validation = Validator::make($data, [
            'visitor_id' => 'required',
            'book_id' => 'required',
            'star' => 'required',
            'comment' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }

        Comment::create($data);
        return back();
    }

    public function update()
    {
        $data = [
            'star' => request('star'),
            'comment' => request('comment'),
        ];

        $validation = Validator::make($data, [
            'star' => 'required',
            'comment' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }

        Comment::where('id', request('id'))->update($data);
        return back();

    }

    public function destroy()
    {
        $id = request('id');
        Comment::where('id', $id)->delete();
        return back();
    }
}