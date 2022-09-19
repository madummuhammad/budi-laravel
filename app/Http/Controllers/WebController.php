<?php

namespace App\Http\Controllers;

use App\Models\AudioBookHomepage;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Book;
use App\Models\BookOfTheMonth;
use App\Models\Book_type;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Level;
use App\Models\ReferenceBook;
use App\Models\ReferenceBookType;
use App\Models\Saved;
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

    public function homebookfilter()
    {
        if (request('jenjang') == null and request('tema') == null and request('bahasa') == null and request('format') == null and request('search') == null) {
            $data['books'] = Book::where('display_homepage', 1)->get();
        } else {
            $queryData = $data['books'] = Book::where('display_homepage', 1);
            if (request('jenjang') !== null) {
                $query = $queryData->where('level', request('jenjang'));
            }
            if (request('tema') !== null) {
                $query = $queryData->where('theme', request('tema'));
            }

            if (request('bahasa') !== null) {
                $query = $queryData->where('language', request('bahasa'));
            }

            if (request('format') !== null) {
                $query = $queryData->where('book_type', request('format'));
            }

            if (request('search') !== null) {
                $query = $queryData->where('name', 'LIKE', '%' . request('search') . '%');
            }
            $data['books'] = $query->get();
        }
        $data['languages'] = Language::all();
        $data['format'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['themes'] = Theme::all();
        $data['blogs'] = Blog::where('display_homepage', 1)->get();
        $data['banners'] = Banner::where('page_id', "b732f255-2544-4966-933c-263fdaa27bd0")->get();
        $data['book_of_the_months'] = BookOfTheMonth::with('books', 'books.authors')->get();
        $data['audio_book_homepages'] = AudioBookHomepage::with('books', 'books.authors')->get();
        $data['send_creations'] = SendCreation::with('send_creation_images')->where('id', '058015aa-510f-42fe-8dd7-82ba10ae9782')->get();
        return view('homebookfilter', $data);
    }

    public function contact()
    {
        return view('contact');
    }

    public function book($id)
    {
        $data['comments'] = Comment::with('visitors')->where('book_id', $id)->limit(3)->orderBy('created_at', 'DESC')->get();
        $data['book_detail'] = Book::where('id', $id)->with('authors', 'themes', 'book_types', 'book_pdfs', 'saveds')->first();
        $data['saveds'] = Saved::where('book_id', $id)->where('visitor_id', auth()->guard('visitor')->user()->id)->first();
        return view('book', $data);
    }

    public function book_type($id)
    {
        $data['themes'] = Theme::all();
        $data['books'] = Book::with('authors', 'themes')->where('book_type', $id)->paginate(10);
        $data['book_types'] = Book_type::where('id', $id)->first();
        return view('booktype', $data);
    }

    public function book_type_filter($id)
    {
        if (request('jenjang') == null and request('tema') == null and request('bahasa') == null and request('search') == null) {
            $data['books'] = Book::with('authors', 'themes')->where('book_type', $id)->paginate(10);
        } else {
            $queryData = $data['books'] = Book::with('authors', 'themes')->where('book_type', $id);
            if (request('jenjang') !== null) {
                $query = $queryData->where('level', request('jenjang'));
            }
            if (request('tema') !== null) {
                $query = $queryData->where('theme', request('tema'));
            }

            if (request('bahasa') !== null) {
                $query = $queryData->where('language', request('bahasa'));
            }

            if (request('search') !== null) {
                $query = $queryData->where('name', 'LIKE', '%' . request('search') . '%');
            }
            $data['books'] = $query->paginate(10);
        }
        $data['themes'] = Theme::all();
        $data['book_types'] = Book_type::where('id', $id)->first();
        return view('booktypefilter', $data);
    }

    public function reference_book($id)
    {
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['reference_books'] = ReferenceBook::with('authors', 'themes')->where('reference_book_type', $id)->paginate(10);
        return view('reference_book', $data);
    }

    public function reference_book_filter($id)
    {
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['reference_books'] = ReferenceBook::with('authors', 'themes')->where('reference_book_type', $id)->paginate(10);
        return view('referencebookfilter', $data);
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

    public function my_library()
    {
        if (auth()->guard('visitor')->check() == false) {
            return redirect('login');
        }
        return view('mylibrary');
    }
}