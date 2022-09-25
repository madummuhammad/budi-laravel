<?php

namespace App\Http\Controllers;

use App\Models\AudioBookHomepage;
use App\Models\Author;
use App\Models\AuthorOfTheMonth;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Book;
use App\Models\BookOfTheMonth;
use App\Models\BookReadStatistic;
use App\Models\Book_type;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Level;
use App\Models\Mylibrary;
use App\Models\ReferenceBook;
use App\Models\ReferenceBookDownload;
use App\Models\ReferenceBookLiked;
use App\Models\ReferenceBookType;
use App\Models\ReferenceComment;
use App\Models\ReferenceTheme;
use App\Models\SendCreation;
use App\Models\Tag;
use App\Models\Theme;
use App\Models\VisitorVisit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\ImageManagerStatic as Image;
use setasign\Fpdi\Fpdi;
use Storage;
use Validator;

class WebController extends Controller
{
    public function index()
    {
        $data['levels'] = Level::all();
        $data['books'] = Book::where('display_homepage', 1)->get();
        $data['themes'] = Theme::all();
        $data['blogs'] = Blog::where('display_homepage', 1)->limit(4)->get();
        $data['banners'] = Banner::where('page_id', "b732f255-2544-4966-933c-263fdaa27bd0")->get();
        $data['book_of_the_months'] = BookOfTheMonth::with('books', 'books.authors', 'books.comments')->get();
        $data['audio_book_homepages'] = AudioBookHomepage::with('books', 'books.authors', 'books.comments')->get();
        $data['aotm'] = AuthorOfTheMonth::with('authors', 'authors.books')->get();
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
        $data['saved_number'] = Mylibrary::where('saved', 1)->where('book_id', $id)->count();
        $data['liked_number'] = Mylibrary::where('liked', 1)->where('book_id', $id)->count();
        $data['comment_number'] = Comment::where('book_id', $id)->count();
        $data['read_number'] = BookReadStatistic::where('book_id', $id)->count();
        if ($data['comment_number'] == 0) {
            $data['ratting_number'] = 0;
        } else {
            $data['ratting_number'] = Comment::where('book_id', $id)->sum('star') / $data['comment_number'];
        }
        if (auth()->guard('visitor')->check() == true) {
            $data['saveds'] = Mylibrary::where('book_id', $id)->where('visitor_id', auth()->guard('visitor')->user()->id)->where('saved', 1)->first();
            $data['likeds'] = Mylibrary::where('book_id', $id)->where('visitor_id', auth()->guard('visitor')->user()->id)->where('liked', 1)->first();
            $data['reads'] = Mylibrary::where('book_id', $id)->where('visitor_id', auth()->guard('visitor')->user()->id)->first();
        }
        $data['related_books'] = Book::where('theme', $data['book_detail']->theme)->orWhere('level', $data['book_detail']->level)->limit(6)->get();
        return view('book', $data);
    }

    public function book_type($id)
    {
        $data['themes'] = Theme::all();
        $data['books'] = Book::with('authors', 'themes')->where('book_type', $id)->paginate(10);
        $data['book_types'] = Book_type::where('id', $id)->first();
        $data['most_reads'] = Book::orderBy('number_read', 'DESC')->limit(8)->get();
        if (auth()->guard('visitor')->check() == true) {
            $data['nexts'] = Mylibrary::with('books')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('read', 3)->get();
        }
        $data['books'] = Book::with('authors', 'themes', 'mylibraries')->where('book_type', $id)->paginate(10);

        return view('booktype', $data);
    }

    public function book_type_filter($id)
    {
        $data['liked_number'] = Mylibrary::where('liked', 1)->get();
        $data['read_number'] = BookReadStatistic::get();
        if (request('jenjang') == null and request('tema') == null and request('bahasa') == null and request('search') == null) {
            $data['books'] = Book::with('authors', 'themes', 'mylibraries')->where('book_type', $id)->paginate(10);
        } else {
            $queryData = $data['books'] = Book::with('authors', 'themes', 'mylibraries')->where('book_type', $id);
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
        $data['most_downloaded'] = ReferenceBook::orderBy('number_downloaded', 'DESC')->limit(8)->get();
        $data['reference_books'] = ReferenceBook::with('authors', 'reference_themes', 'mylibraries')->where('reference_book_type', $id)->paginate(10);
        return view('reference_book', $data);
    }

    public function reference_book_filter($id)
    {
        $data['liked_number'] = ReferenceBookLiked::get();
        $data['download_number'] = ReferenceBookDownload::get();
        if (request('jenjang') == null and request('tema') == null and request('bahasa') == null and request('search') == null) {
            $data['reference_books'] = ReferenceBook::with('authors', 'reference_themes')->where('reference_book_type', $id)->get();
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
            $data['reference_books'] = $query->get();
        }
        $data['themes'] = ReferenceTheme::get();
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        // $data['reference_books'] = ReferenceBook::with('authors', 'reference_themes')->where('reference_book_type', $id)->paginate(10);
        return view('referencebookfilter', $data);
    }

    public function reference_book_detail($id)
    {
        $data['liked_number'] = ReferenceBookLiked::where('book_id', $id)->get();
        $data['download_number'] = ReferenceBookDownload::where('book_id', $id)->get();
        $data['comments'] = ReferenceComment::with('visitors')->where('book_id', $id)->limit(3)->orderBy('created_at', 'DESC')->get();
        // $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['comment_number'] = ReferenceComment::where('book_id', $id)->count();
        if ($data['comment_number'] == 0) {
            $data['ratting_number'] = 0;
        } else {
            $data['ratting_number'] = ReferenceComment::where('book_id', $id)->sum('star') / $data['comment_number'];
        }

        $data['reference_book'] = ReferenceBook::with('authors', 'reference_themes', 'reference_book_types')->where('id', $id)->first();
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
        $data['pustakaku'] = Banner::where('page_id', '889ebf6f-4bdb-46ad-9a69-e4bee0e6ace6')->first();
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
        $data['liked_number'] = Mylibrary::where('liked', 1)->get();
        $data['read_number'] = BookReadStatistic::get();
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

            // Number next

            $data['next_digital'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '2fd97285-08d0-4d81-83f2-582f0e8b0f36');
            })->where('read', 3)->count();

            $data['next_komik'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '31ba455c-c9c7-4a3c-a2b1-62915546eaba');
            })->where('read', 3)->count();

            $data['next_audio'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '9e30a937-0d60-49ad-9775-c19b97cfe864');
            })->where('read', 3)->count();

            $data['next_video'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc');
            })->where('read', 3)->count();

            // Number like

            $data['liked_digital'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '2fd97285-08d0-4d81-83f2-582f0e8b0f36');
            })->where('liked', 1)->count();

            $data['liked_komik'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '31ba455c-c9c7-4a3c-a2b1-62915546eaba');
            })->where('liked', 1)->count();

            $data['liked_audio'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '9e30a937-0d60-49ad-9775-c19b97cfe864');
            })->where('liked', 1)->count();

            $data['liked_video'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc');
            })->where('liked', 1)->count();

            // Number saved
            $data['saved_digital'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '2fd97285-08d0-4d81-83f2-582f0e8b0f36');
            })->where('saved', 1)->count();

            $data['saved_komik'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '31ba455c-c9c7-4a3c-a2b1-62915546eaba');
            })->where('saved', 1)->count();

            $data['saved_audio'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '9e30a937-0d60-49ad-9775-c19b97cfe864');
            })->where('saved', 1)->count();

            $data['saved_video'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc');
            })->where('saved', 1)->count();

            // Done
            $data['done_digital'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '2fd97285-08d0-4d81-83f2-582f0e8b0f36');
            })->where('read', 2)->count();

            $data['done_komik'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '31ba455c-c9c7-4a3c-a2b1-62915546eaba');
            })->where('read', 2)->count();

            $data['done_audio'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', '9e30a937-0d60-49ad-9775-c19b97cfe864');
            })->where('read', 2)->count();

            $data['done_video'] = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->whereHas('books', function ($query) use ($book) {
                $query->where('name', 'LIKE', '%' . request('keyword') . '%')->where('book_type', 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc');
            })->where('read', 2)->count();

        } else {
            $data['saveds'] = Mylibrary::with('books', 'books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('saved', 1)->get();
            $data['likeds'] = Mylibrary::with('books', 'books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('liked', 1)->get();
            $data['nexts'] = Mylibrary::with('books', 'books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('read', 3)->get();
            $data['done'] = Mylibrary::with('books', 'books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id)->where('read', 2)->get();

            $numberQueryD = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryK = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryA = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryV = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);

            $numberQueryDigital = $numberQueryD->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "2fd97285-08d0-4d81-83f2-582f0e8b0f36");
            });
            $numberQueryKomik = $numberQueryK->whereHas('books', function ($querys) use ($book) {
                $querys->where('book_type', "31ba455c-c9c7-4a3c-a2b1-62915546eaba");
            });
            $numberQueryAudio = $numberQueryA->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "9e30a937-0d60-49ad-9775-c19b97cfe864");
            });
            $numberQueryVideo = $numberQueryV->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "bfe3060d-5f2e-4a1b-9615-40a9f936c6cc");
            });

            $data['next_digital'] = ceil($numberQueryDigital->where('read', 3)->count() / 10);
            $data['next_komik'] = ceil($numberQueryKomik->where('read', 3)->count() / 10);
            $data['next_audio'] = ceil($numberQueryAudio->where('read', 3)->count() / 10);
            $data['next_video'] = ceil($numberQueryVideo->where('read', 3)->count() / 10);

            $numberQueryD2 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryK2 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryA2 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryV2 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);

            $numberQueryDigital2 = $numberQueryD2->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "2fd97285-08d0-4d81-83f2-582f0e8b0f36");
            });
            $numberQueryKomik2 = $numberQueryK2->whereHas('books', function ($querys) use ($book) {
                $querys->where('book_type', "31ba455c-c9c7-4a3c-a2b1-62915546eaba");
            });
            $numberQueryAudio2 = $numberQueryA2->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "9e30a937-0d60-49ad-9775-c19b97cfe864");
            });
            $numberQueryVideo2 = $numberQueryV2->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "bfe3060d-5f2e-4a1b-9615-40a9f936c6cc");
            });

            $data['liked_digital'] = ($numberQueryDigital2->where('liked', 1)->count() / 10);
            $data['liked_komik'] = ($numberQueryKomik2->where('liked', 1)->count() / 10);
            $data['liked_audio'] = ($numberQueryAudio2->where('liked', 1)->count() / 10);
            $data['liked_video'] = ($numberQueryVideo2->where('liked', 1)->count() / 10);

            $numberQueryD3 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryK3 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryA3 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryV3 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);

            $numberQueryDigital3 = $numberQueryD3->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "2fd97285-08d0-4d81-83f2-582f0e8b0f36");
            });
            $numberQueryKomik3 = $numberQueryK3->whereHas('books', function ($querys) use ($book) {
                $querys->where('book_type', "31ba455c-c9c7-4a3c-a2b1-62915546eaba");
            });
            $numberQueryAudio3 = $numberQueryA3->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "9e30a937-0d60-49ad-9775-c19b97cfe864");
            });
            $numberQueryVideo3 = $numberQueryV3->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "bfe3060d-5f2e-4a1b-9615-40a9f936c6cc");
            });

            $data['saved_digital'] = ($numberQueryDigital3->where('saved', 1)->count() / 10);
            $data['saved_komik'] = ($numberQueryKomik3->where('saved', 1)->count() / 10);
            $data['saved_audio'] = ($numberQueryAudio3->where('saved', 1)->count() / 10);
            $data['saved_video'] = ($numberQueryVideo3->where('saved', 1)->count() / 10);

            $numberQueryD4 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryK4 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryA4 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);
            $numberQueryV4 = Mylibrary::with('books.authors', 'books.themes')->where('visitor_id', auth()->guard('visitor')->user()->id);

            $numberQueryDigital4 = $numberQueryD4->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "2fd97285-08d0-4d81-83f2-582f0e8b0f36");
            });
            $numberQueryKomik4 = $numberQueryK4->whereHas('books', function ($querys) use ($book) {
                $querys->where('book_type', "31ba455c-c9c7-4a3c-a2b1-62915546eaba");
            });
            $numberQueryAudio4 = $numberQueryA4->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "9e30a937-0d60-49ad-9775-c19b97cfe864");
            });
            $numberQueryVideo4 = $numberQueryV4->whereHas('books', function ($query) use ($book) {
                $query->where('book_type', "bfe3060d-5f2e-4a1b-9615-40a9f936c6cc");
            });

            $data['done_digital'] = ceil($numberQueryDigital4->where('read', 2)->count() / 10);
            $data['done_komik'] = ceil($numberQueryKomik4->where('read', 2)->count() / 10);
            $data['done_audio'] = ceil($numberQueryAudio4->where('read', 2)->count() / 10);
            $data['done_video'] = ceil($numberQueryVideo4->where('read', 2)->count() / 10);

        }
        return view('mylibraryfilter', $data);

    }

    public function info_seputar_budi()
    {
        $data['blogs'] = Blog::get();
        $data['banners'] = Banner::where('page_id', "5db1210c-d350-4abd-b09b-eb33058b93e1")->first();
        return view('web_blog', $data);

    }

    public function pdf()
    {
        // download sample file.
        // Storage::disk('local')->put('test.pdf', file_get_contents('http://www.africau.edu/images/default/sample.pdf'));

        $outputFile = Storage::disk('local')->path('output.pdf');
        // fill data
        $this->fillPDF(Storage::disk('local')->path('alia_juga_berani.pdf'), $outputFile);
        //output to browser
        return response()->file($outputFile);
    }

    public function fillPDF($file, $outputFile)
    {
        $fpdi = new FPDI;
        // merger operations
        $count = $fpdi->setSourceFile($file);
        for ($i = 1; $i <= $count; $i++) {
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $left = 10;
            $top = 10;
            $text = "asdfasdfsadfasfd.com";
            $fpdi->SetFont("helvetica", "", 15);
            $fpdi->SetTextColor(153, 0, 153);
            $fpdi->Text($left, $top, $text);
        }
        return $fpdi->Output($outputFile, 'F');
    }

    public function author_profile()
    {
        $data['aotm'] = AuthorOfTheMonth::with('authors', 'authors.books')->first();
        return view('author', $data);
    }

    public function author_of_the_month()
    {
        $data['authors'] = Author::get();
        $data['aotm'] = AuthorOfTheMonth::where('id', "595c5999-b984-4400-b03d-0bf62574477e")->first();
        return view('dashboard.authorofthemonth', $data);
    }

    public function author_of_the_month_edit()
    {
        $author_id = request('author');
        $content = request('content');
        $content_homepage = request('content_homepage');
        $data = [
            'author_id' => $author_id,
            'content' => $content,
            'content_homepage' => $content_homepage,
        ];
        $validation = Validator::make($data, [
            'author_id' => 'required',
            'content' => 'required',
            'content_homepage' => 'required',
        ]);
        if ($validation->fails()) {
            return back();
        }

        AuthorOfTheMonth::where('id', "595c5999-b984-4400-b03d-0bf62574477e")->update($data);
        if ($_FILES['cover']['name'] !== "") {
            $img = $this->storage() . $this->upload_img(request(), 'cover');
            AuthorOfTheMonth::where('id', "595c5999-b984-4400-b03d-0bf62574477e")->update(['cover' => $img]);
        }
        return back();
    }

    public function set_cookies(Request $request)
    {
        // $longitude = request('longitude');
        // $latitude = request('latitude');
        // if (!empty($latitude) && !empty($longitude)) {
        //     $gmap = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($latitude) . ',' . $longitude . '&sensor=false';
        //     // curl
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, $gmap);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //     curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //     $response = curl_exec($ch);
        //     curl_close($ch);
        //     // end curl
        //     return $data = json_decode($response);

        //     if ($response) {
        //         return json_encode($data->results[0]->formatted_address);
        //     } else {
        //         return json_encode(false);
        //     }
        // }
        if (auth()->guard('visitor')->check() == false) {
            if ($request->cookie('visitor_session') == null) {
                $data = [
                    'device' => request('width') . '  X' . request('height'),
                    'browser' => $_SERVER['HTTP_USER_AGENT'],
                    'time' => time(),
                ];
                $visitorvisit = VisitorVisit::create($data);
                $minutes = 1440;
                $response = new Response("");
                $response->withCookie(cookie('visitor_session', $visitorvisit, $minutes));
                return $response;
            }
        } else {
            if ($request->cookie('visitor_session') == null) {
                $data = [
                    'visitor_id' => auth()->guard('visitor')->user()->id,
                    'device' => request('width') . '  X' . request('height'),
                    'browser' => $_SERVER['HTTP_USER_AGENT'],
                    'time' => time(),
                ];
                $visitorvisit = VisitorVisit::create($data);
                $minutes = 1440;
                $response = new Response("");
                $response->withCookie(cookie('visitor_session', $visitorvisit, $minutes));
                return $response;
            }
        }
    }

    public function about()
    {
        return view('about');
    }

    public function policy()
    {
        return view('policy');
    }

    public function upload_img($request, $name)
    {
        $path = $request->file($name)->store('image');
        $resize = Image::make($request->file($name))->fit(300, 380);
        $resize->save($this->storage_path('public/' . $path));
        unlink(storage_path('app/' . $path));
        return $path;
    }

    public function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }

    public function storage()
    {
        return url('storage') . '/';
    }
}