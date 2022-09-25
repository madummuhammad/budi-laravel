<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book_type;
use App\Models\Language;
use App\Models\Level;
use App\Models\ReferenceBook;
use App\Models\ReferenceBookDownload;
use App\Models\ReferenceBookLiked;
use App\Models\ReferenceBookType;
use App\Models\ReferenceComment;
use App\Models\ReferenceTheme;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Validator;

class ReferencebookController extends Controller
{
    public function index($id)
    {
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['books'] = ReferenceBook::with('authors', 'book_pdfs', 'reference_book_types')->where('reference_book_type', $id)->get();
        $data['authors'] = Author::all();
        $data['themes'] = ReferenceTheme::all();
        $data['book_types'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();

        return view('dashboard.reference_book', $data);
    }

    public function book_filter($id)
    {
        if (request('theme') == null and request('level') == null and request('language') == null) {
            $data['books'] = ReferenceBook::with('authors', 'book_pdfs', 'reference_book_types')->where('reference_book_type', $id)->get();
        } else {
            $queryData = ReferenceBook::with('authors', 'book_pdfs', 'reference_book_types')->where('reference_book_type', $id);
            if (request('theme') !== null) {
                $query = $queryData->where('theme', request('theme'));
            }
            if (request('level') !== null) {
                $query = $queryData->where('level', request('level'));
            }
            if (request('language') !== null) {
                $query = $queryData->where('language', request('language'));
            }
            $data['books'] = $query->get();
        }
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['authors'] = Author::all();
        $data['themes'] = ReferenceTheme::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();

        return view("dashboard.referencebookfilter", $data);
    }

    public function edit($id)
    {
        $data['book'] = ReferenceBook::with('authors', 'reference_book_types')->where('id', $id)->first();
        $data['authors'] = Author::all();
        $data['themes'] = ReferenceTheme::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();

        return view('dashboard.reference_book_edit', $data);
    }

    public function add($id)
    {

        $data = [
            'name' => request()->name,
            'author' => request()->author,
            'theme' => request()->theme,
            'page' => request()->page,
            'sinopsis' => request()->sinopsis,
            'reference_book_type' => $id,
            'level' => request()->level,
            'language' => request()->language,
            'cover' => $this->storage() . $this->upload_img(request()),
        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'author' => 'required',
            'theme' => 'required',
            'page' => 'numeric',
            'sinopsis' => 'required',
            'reference_book_type' => 'required',
            'level' => 'required',
            'language' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect('dashboard/referenceadfasf_book/' . $id)->with(['message' => $validation->errors()]);
        }

        $reference_book = ReferenceBook::create($data);

        if ($_FILES['content']['name'] !== "") {
            if ($id == '5cbb48f9-aed4-44a9-90c2-71cbcef71264') {
                $content = $this->upload_pdf(request());
            }

            if ($id == '220843b8-4f60-4e47-9aca-cf6ea0d54afe') {
                $content = $this->upload_video(request());
            }
        }

        $data = [
            'content' => $content,
        ];

        ReferenceBook::where('id', $reference_book->id)->update($data);

        return redirect('dashboard/reference_book/' . $id);

    }

    public function update($id)
    {
        $data = [
            'name' => request()->name,
            'author' => request()->author,
            'theme' => request()->theme,
            'page' => request()->page,
            'sinopsis' => request()->sinopsis,
            'level' => request()->level,
            'language' => request()->language,

        ];

        $validation = Validator::make($data, [
            'name' => 'required',
            'author' => 'required',
            'theme' => 'required',
            'page' => 'numeric',
            'sinopsis' => 'required',
            'level' => 'required',
            'language' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect('dashboard/reference_book/' . request('reference_book_type'))->with(['message' => $validation->errors()]);
        }

        ReferenceBook::where('id', $id)->update($data);

        if ($_FILES['content']['name'] !== "") {
            if ($id == '5cbb48f9-aed4-44a9-90c2-71cbcef71264') {
                $content = $this->upload_pdf(request());
            }

            if ($id == '220843b8-4f60-4e47-9aca-cf6ea0d54afe') {
                $content = $this->upload_video(request());
            }

            $data = [
                'content' => $content,
            ];

            ReferenceBook::where('id', $id)->update($data);
        }

        if ($_FILES['cover']['name'] !== "") {
            $data = [
                'cover' => $this->storage() . $this->upload_img(request()),
            ];

            ReferenceBook::where('id', $id)->update($data);
        }

        return redirect('dashboard/reference_book/' . request('reference_book_type'));

    }

    public function liked()
    {
        $data = [
            'book_id' => request('book_id'),
            'visitor_id' => request('visitor_id'),
        ];

        $validation = Validator::make($data, [
            'book_id' => 'required',
            'visitor_id' => 'required',
        ]);
        $ReferenceBookLiked = ReferenceBookLiked::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->first();
        if ($validation->fails()) {
            return back();
        }
        if (request('status') == "unliked") {
            // if ($mylibrary) {
            //     RerenceBookLiked::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->update(['liked' => 1]);
            // } else {
            ReferenceBookLiked::create($data);
            // }
        } else {
            ReferenceBookLiked::where('book_id', request('book_id'))->where('visitor_id', request('visitor_id'))->delete();
        }
    }

    public function download(Request $request)
    {
        $file = public_path() . '/storage' . '/' . request('file');
        if (request('book_type') == '5cbb48f9-aed4-44a9-90c2-71cbcef71264') {
            // bacaan
            $headers = array(
                'Content-Type: application/pdf',
            );
            if (file_exists($file) !== false) {
                $data = [
                    'book_id' => request('book_id'),
                ];

                $validation = Validator::make($data, [
                    'book_id' => 'required',
                ]);

                if (auth()->guard('visitor')->check() == false) {
                    $visitor_id = null;
                } else {
                    $visitor_id = auth()->guard('visitor')->user()->id;
                }

                $dataVisitor = json_decode($request->cookie('visitor_session'));
                ReferenceBookDownload::create(['book_id' => request('book_id'), 'visitor_id' => $visitor_id, 'visitor_visit_id' => $dataVisitor->id]);
                $count = ReferenceBookDownload::where('book_id', request('book_id'))->count();
                ReferenceBook::where('id', request('book_id'))->update(['number_downloaded' => $count]);
                return response()->download($file, request('name') . '.pdf', $headers);
                if ($validation->fails()) {
                    return back();
                }
            } else {
                return back();
            }
        }

        if (request('book_type') == '220843b8-4f60-4e47-9aca-cf6ea0d54afe') {
            // video
            $headers = array(
                'Content-Type: video/mp4',
            );
            if (file_exists($file) !== false) {
                $data = [
                    'book_id' => request('book_id'),
                ];

                $validation = Validator::make($data, [
                    'book_id' => 'required',
                ]);

                if (auth()->guard('visitor')->check() == false) {
                    $visitor_id = null;
                } else {
                    $visitor_id = auth()->guard('visitor')->user()->id;
                }

                $dataVisitor = json_decode($request->cookie('visitor_session'));
                ReferenceBookDownload::create(['book_id' => request('book_id'), 'visitor_id' => $visitor_id, 'visitor_visit_id' => $dataVisitor->id]);

                $count = ReferenceBookDownload::where('book_id', request('book_id'))->count();
                ReferenceBook::where('id', request('book_id'))->update(['number_downloaded' => $count]);
                return response()->download($file, request('name') . '.mp4', $headers);
                if ($validation->fails()) {
                    return back();
                }
            } else {
                return back();
            }
        } else {
            return back();
        }

    }

    public function comment()
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

        ReferenceComment::create($data);
        return back();
    }

    public function upload_img($request)
    {
        $path = $request->file('cover')->store('image');
        $resize = Image::make($request->file('cover'))->fit(192, 272);
        $resize->save($this->storage_path('public/' . $path));
        unlink(storage_path('app/' . $path));
        return $path;
    }

    public function storage()
    {
        return url('storage') . '/';
    }

    public function upload_pdf($request)
    {
        $disk = Storage::disk('public')->put('book', $request->file('content'));
        return $disk;
    }

    public function upload_video($request)
    {
        $disk = Storage::disk('public')->put('video', $request->file('content'));
        return $disk;

    }

    public function storage_path($path = '')
    {
        return env('STORAGE_PATH', base_path('storage/app')) . ($path ? '/' . $path : $path);
    }

    public function destroy()
    {
        $id = request('id');
        ReferenceBook::where('id', $id)->delete();
        return back();
    }
}