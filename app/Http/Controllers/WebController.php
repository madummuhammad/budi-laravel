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
use App\Models\Mylibrary;
use App\Models\ReferenceBook;
use App\Models\ReferenceBookType;
use App\Models\ReferenceTheme;
use App\Models\SendCreation;
use App\Models\Tag;
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
        if (auth()->guard('visitor')->check() == true) {
            $data['nexts'] = Mylibrary::with('books')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('read', 3)->get();
        }
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
        $data['book_detail'] = Book::where('id', $id)->with('authors', 'themes', 'book_types', 'book_pdfs')->first();
        if (auth()->guard('visitor')->check() == true) {
            $data['saveds'] = Mylibrary::where('book_id', $id)->where('visitor_id', auth()->guard('visitor')->user()->id)->where('saved', 1)->first();
            $data['likeds'] = Mylibrary::where('book_id', $id)->where('visitor_id', auth()->guard('visitor')->user()->id)->where('liked', 1)->first();
            $data['reads'] = Mylibrary::where('book_id', $id)->where('visitor_id', auth()->guard('visitor')->user()->id)->first();
            $data['saved_number'] = Mylibrary::where('saved', 1)->where('book_id', $id)->count();
            $data['liked_number'] = Mylibrary::where('liked', 1)->where('book_id', $id)->count();
            $data['comment_number'] = Comment::where('book_id', $id)->count();
            if ($data['comment_number'] == 0) {
                $data['ratting_number'] = 0;
            } else {
                $data['ratting_number'] = Comment::where('book_id', $id)->sum('star') / $data['comment_number'];
            }
        }
        $data['related_books'] = Book::where('theme', $data['book_detail']->theme)->orWhere('level', $data['book_detail']->level)->limit(6)->get();
        return view('book', $data);
    }

    public function book_type($id)
    {
        $data['themes'] = Theme::all();
        $data['books'] = Book::with('authors', 'themes')->where('book_type', $id)->paginate(10);
        $data['book_types'] = Book_type::where('id', $id)->first();
        if (auth()->guard('visitor')->check() == true) {
            $data['nexts'] = Mylibrary::with('books')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('read', 3)->get();
        }
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
        $data['themes'] = ReferenceTheme::get();
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['reference_books'] = ReferenceBook::with('authors', 'reference_themes')->where('reference_book_type', $id)->paginate(10);
        return view('reference_book', $data);
    }

    public function reference_book_filter($id)
    {
        if (request('jenjang') == null and request('tema') == null and request('bahasa') == null and request('search') == null) {
            $data['reference_books'] = ReferenceBook::with('authors', 'reference_themes')->where('reference_book_type', $id)->paginate(10);
        } else {
            $queryData = $data['reference_books'] = ReferenceBook::with('authors', 'reference_themes')->where('reference_book_type', $id);
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
            $data['reference_books'] = $query->paginate(10);
        }
        $data['themes'] = ReferenceTheme::get();
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        // $data['reference_books'] = ReferenceBook::with('authors', 'reference_themes')->where('reference_book_type', $id)->paginate(10);
        return view('referencebookfilter', $data);
    }

    public function reference_book_detail($id)
    {
        // $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['reference_book'] = ReferenceBook::with('authors', 'reference_themes')->where('id', $id)->first();
        return view('reference_book_detail', $data);
    }

    public function blog_detail($id)
    {

        $data['total_article'] = Blog::where('blog_type', 'article')->count();
        $data['total_news'] = Blog::where('blog_type', 'news')->count();
        $data['blog'] = Blog::with('tags', 'writers')->where('id', $id)->first();
        $queryData = Tag::with('blogs');
        foreach ($data['blog']->tags as $key => $value) {
            if ($key == 0) {
                $query = $queryData->where('tag', 'LIKE', '%' . $value['tag'] . '%');
            } else {
                $query = $queryData->orWhere('tag', 'LIKE', '%' . $value['tag'] . '%');
            }
        }
        $data['related_news'] = $query->get();

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
        $data['number_of_done'] = Mylibrary::where('visitor_id', auth()->guard('visitor')->user()->id)->where('read', 2)->count();

        // $book = Book::get();
        // return $data['saveds'] = Saved::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
        //     $query->where('name', 'LIKE', '%%');
        // })->get();
        return view('mylibrary', $data);
    }

    public function my_library_filter()
    {
        if (auth()->guard('visitor')->check() == false) {
            return redirect('login');
        }

        $book = Book::get();

        if (request('keyword') !== null) {
            $data['saveds'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%');
            })->where('saved', 1)->get();

            $data['likeds'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%');
            })->where('liked', 1)->get();

            $data['nexts'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%');
            })->where('read', 3)->get();

            $data['done'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%');
            })->where('read', 2)->get();
        } else {
            $data['saveds'] = Mylibrary::with('books', 'books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('saved', 1)->get();
            $data['likeds'] = Mylibrary::with('books', 'books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('liked', 1)->get();
            $data['nexts'] = Mylibrary::with('books', 'books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('read', 3)->get();
            $data['done'] = Mylibrary::with('books', 'books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('read', 2)->get();
        }
        return view('mylibraryfilter', $data);

    }

    public function info_seputar_budi()
    {
        $data['blogs'] = Blog::get();
        $data['banners'] = Banner::where('page_id', "5db1210c-d350-4abd-b09b-eb33058b93e1")->first();
        return view('web_blog', $data);

    }
}