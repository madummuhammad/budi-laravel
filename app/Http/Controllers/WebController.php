<?php

namespace App\Http\Controllers;

use App\Models\AudioBookHomepage;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Book;
use App\Models\BookOfTheMonth;
use App\Models\Book_type;
use App\Models\Level;
use App\Models\ReferenceBook;
use App\Models\ReferenceBookType;
use App\Models\SendCreation;
use App\Models\Theme;

class WebController extends Controller
{
    public function index()
    {
        $data['levels'] = Level::all();
        $data['books'] = Book::where('display_homepage', 1)->get();
        $data['themes'] = Theme::all();
        $data['blogs'] = Blog::where('display_homepage', 1)->get();
        $data['banners'] = Banner::where('page_id', "b732f255-2544-4966-933c-263fdaa27bd0")->get();
        $data['book_of_the_months'] = BookOfTheMonth::with('books', 'books.authors')->get();
        $data['audio_book_homepages'] = AudioBookHomepage::with('books', 'books.authors')->get();
        $data['send_creations'] = SendCreation::with('send_creation_images')->where('id', '058015aa-510f-42fe-8dd7-82ba10ae9782')->get();
        return view('homepage', $data);
    }

    public function contact()
    {
        return view('contact');
    }

    public function book($id)
    {
        $data['book_detail'] = Book::where('id', $id)->with('authors', 'themes', 'book_types', 'book_pdfs')->first();
        // return $data;
        return view('book', $data);
    }

    public function book_type($id)
    {
        $data['books'] = Book::with('authors', 'themes')->where('book_type', $id)->get();
        $data['book_types'] = Book_type::where('id', $id)->first();
        return view('booktype', $data);
    }

    public function pustakaku()
    {
        return view('pustakaku');
    }

    public function reference_book($id)
    {
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['reference_books'] = ReferenceBook::with('authors', 'themes')->where('reference_book_type', $id)->get();
        return view('reference_book', $data);
    }

    public function reference_book_detail($id)
    {
        // $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['reference_book'] = ReferenceBook::with('authors', 'themes')->where('id', $id)->first();

        return view('reference_book_detail', $data);
    }

    public function blog_detail($id)
    {
        $data['total_article'] = Blog::where('blog_type', 'article')->count();
        $data['total_news'] = Blog::where('blog_type', 'news')->count();
        $data['blog'] = Blog::with('tags', 'writers')->where('id', $id)->first();
        return view('blog_detail', $data);
    }

    public function send_creation()
    {
        $data['send_creations'] = SendCreation::with('send_creation_images')->where('id', '3644ed15-5e90-4c47-913a-fc1524768f7a')->first();
        $data['banners'] = Banner::where('page_id', "32b7ab7f-00e7-40a9-b609-52a33c66ad17")->first();
        return view('send_creation', $data);
    }
}