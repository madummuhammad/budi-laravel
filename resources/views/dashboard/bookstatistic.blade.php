@extends('dashboard.main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            {{-- <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Datatable</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                    </ol>
                </div>
            </div> --}}
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Analitik Buku</h4>
                            <a href="{{ url('dashboard/statistic/book/export') }}" class="btn btn-success text-white"><i
                                    class="fa-regular fa-file-excel"></i> export</a>
                        </div>
                        <div class="card-body">
                            {{-- <img class="img-fluid mb-3" src="{{ $books->cover }}" alt=""> --}}
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Format</th>
                                            <th>Tema</th>
                                            <th>Jenjang</th>
                                            <th>Baca</th>
                                            <th>Unduh</th>
                                            <th>Like</th>
                                            <th>Share</th>
                                            <th>Simpan</th>
                                            <th>Komentar</th>
                                            <th>Ratting</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($books as $book)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td><img class="img-fluid" src="{{ $book->cover }}" alt=""></td>
                                                <td>{{ $book->name }}</td>
                                                @foreach ($book->book_types as $book_type)
                                                    <td>{{ $book_type->name }}</td>
                                                @endforeach
                                                @foreach ($book->themes as $theme)
                                                    <td>{{ $theme->name }}</td>
                                                @endforeach
                                                @foreach ($book->levels as $level)
                                                    <td>{{ $level->name }}</td>
                                                @endforeach
                                                <td>{{ $book->book_read_statistics->count() }}</td>
                                                <td>{{ $book->book_download_statistics->count() }}</td>
                                                <td>{{ $book->mylibraries->where('liked', 1)->count() }}</td>
                                                <td>{{ $book->shares->count() }}</td>
                                                <td>{{ $book->mylibraries->where('saved', 1)->count() }}</td>
                                                <td>{{ $book->comments->count() }}</td>
                                                @if ($book->comments->count() == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ number_format($book->comments->sum('star') / $book->comments->count(), 1) }}
                                                    </td>
                                                @endif
                                                {{-- <td>
                                                    <button class="btn badge badge-danger" data-toggle="modal"
                                                        data-target="#hapus{{ $book->id }}"><i
                                                            class="bi bi-trash3"></i></button>
                                                    <div class="modal" tabindex="-1" id="hapus{{ $book->id }}">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 py-0">
                                                                    <h5 class="modal-title"></h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body py-0">
                                                                    <p class="p-0 m-0 fs-4">Hapus komentar ini?</p>
                                                                </div>
                                                                <div class="modal-footer pt-0 pb-1 border-0">
                                                                    <form
                                                                        action="{{ url('dashboard/book/comment/') }}/{{ $book->id }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="text" name="id"
                                                                            value="{{ $book->id }}" hidden>
                                                                        <button type="submit" class="btn badge-danger"><i
                                                                                class="bi bi-trash3"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn badge badge-primary" data-toggle="modal"
                                                        data-target="#edit{{ $book->id }}"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                </td> --}}
                                            </tr>
                                            {{-- <div class="modal fade" id="edit{{ $book->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                Komentar</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ url('dashboard/book/comment/') }}/{{ $book->id }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @method('patch')
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Komentar
                                                                            </label>
                                                                            <input type="text" name="id"
                                                                                value="{{ $book->id }}" hidden>
                                                                            <textarea class="form-control" name="comment" id="" cols="30" rows="10">{</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Ratting
                                                                            </label>
                                                                            <input class="form-control" type="number"
                                                                                name="star" value=""
                                                                                max="5">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Kirim
                                                                    Perubahan
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
