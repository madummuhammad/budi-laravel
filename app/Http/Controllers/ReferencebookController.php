<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book_type;
use App\Models\Language;
use App\Models\Level;
use App\Models\ReferenceBook;
use App\Models\ReferenceBookType;
use App\Models\Theme;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use Validator;

class ReferencebookController extends Controller
{
    public function index($id)
    {
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['books'] = ReferenceBook::with('authors', 'book_pdfs', 'book_types')->where('reference_book_type', $id)->get();
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
        $data['book_types'] = Book_type::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();

        return view('dashboard.reference_book', $data);
    }

    public function book_filter($id)
    {
        if (request('theme') == null and request('level') == null) {
            $data['books'] = ReferenceBook::with('authors', 'book_pdfs', 'reference_book_types')->where('reference_book_type', $id)->get();
        } else {
            $queryData = ReferenceBook::with('authors', 'book_pdfs', 'reference_book_types')->where('reference_book_type', $id);
            if (request('theme') !== null) {
                $query = $queryData->where('theme', request('theme'));
            }
            if (request('level') !== null) {
                $query = $queryData->where('level', request('level'));
            }
            $data['books'] = $query->get();
        }
        $data['reference_book_types'] = ReferenceBookType::where('id', $id)->first();
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
        $data['levels'] = Level::all();
        $data['languages'] = Language::all();

        return view("dashboard.referencebookfilter", $data);
    }

    public function edit($id)
    {
        $data['book'] = ReferenceBook::with('authors', 'reference_book_types')->where('id', $id)->first();
        $data['authors'] = Author::all();
        $data['themes'] = Theme::all();
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