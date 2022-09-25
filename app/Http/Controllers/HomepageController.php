<?php

namespace App\Http\Controllers;

use App\Models\AudioBookHomepage;
use App\Models\Banner;
use App\Models\Book;
use App\Models\BookOfTheMonth;
use App\Models\SendCreation;
use App\Models\SendCreationImage;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class HomepageController extends Controller
{
    public function index()
    {
        $data['books'] = Book::all();
        $data['banners'] = Banner::where('page_id', "b732f255-2544-4966-933c-263fdaa27bd0")->get();
        $data['book_of_the_months'] = BookOfTheMonth::with('books', 'books.authors')->get();
        $data['audio_book_homepages'] = AudioBookHomepage::with('books', 'books.authors')->get();
        $data['send_creations'] = SendCreation::with('send_creation_images')->get();
        return view('dashboard.homepage', $data);
    }

    public function book_of_the_month()
    {
        $id = request('id');
        $book_id = request('book_id');
        $data = [
            'book_id' => request('book_id'),
        ];
        BookOfTheMonth::where('id', $id)->update($data);
        return back();
    }

    public function add_book_of_the_month()
    {
        $book_id = request('book_id');
        $data = [
            'book_id' => request('book_id'),
        ];
        BookOfTheMonth::create($data);
        return back();
    }

    public function audio_book_homepage()
    {
        $id = request('id');
        $book_id = request('book_id');
        $data = [
            'book_id' => request('book_id'),
        ];
        AudioBookHomepage::where('id', $id)->update($data);
        return redirect('dashboard/homepage');
    }

    public function add_audio_book_homepage()
    {
        $book_id = request('book_id');
        $data = [
            'book_id' => request('book_id'),
        ];
        AudioBookHomepage::create($data);
        return redirect('dashboard/homepage');
    }

    public function send_creation()
    {
        $id = request('id');
        $data = [
            'heading' => request('heading'),
            'sub_heading' => request('sub_heading'),
            'content' => request('content'),
        ];

        $validation = Validator::make($data, [
            'heading' => 'required',
            'sub_heading' => 'required',
            'content' => 'required',
        ]);

        if ($validation->fails()) {
            return back();
        }
        SendCreation::where('id', $id)->update($data);

        if ($_FILES['image0']['name'] !== "") {
            $data = [
                'image' => $this->storage() . $this->upload_img(request(), 192, 272, "image0"),
            ];
            SendCreationImage::where('id', request('image_id0'))->update($data);
        }

        if ($_FILES['image1']['name'] !== "") {
            $data = [
                'image' => $this->storage() . $this->upload_img(request(), 192, 272, "image1"),

            ];
            SendCreationImage::where('id', request('image_id1'))->update($data);
        }

        return back();
    }

    public function upload_img($request, $fit_width = 100, $fit_height = 100, $name = "cover")
    {
        $path = $request->file($name)->store('image');
        $resize = Image::make($request->file($name))->fit($fit_width, $fit_height);
        $resize->save($this->storage_path('public/' . $path));
        unlink(storage_path('app/' . $path));
        return $path;
    }

    public function storage()
    {
        return url('storage') . '/';
    }

    public function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }
}