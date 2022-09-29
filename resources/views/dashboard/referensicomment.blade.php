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
                            <h4 class="card-title">Komentar Buku {{ $books->name }}</h4>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid mb-3" src="{{ $books->cover }}" alt="">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengguna</th>
                                            <th>Komentar</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($books->reference_comments as $comment)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $comment->visitors->name }}</td>
                                                <td>{{ $comment->comment }}</td>
                                                <td>
                                                    @for ($i = 0; $i < $comment->star; $i++)
                                                        <i class="fa-regular fa-star"></i>
                                                    @endfor
                                                </td>
                                                {{-- <td>{{ $books->name }}</td> --}}
                                                <td>
                                                    <button class="btn badge badge-danger" data-toggle="modal"
                                                        data-target="#hapus{{ $comment->id }}"><i
                                                            class="bi bi-trash3"></i></button>
                                                    <div class="modal" tabindex="-1" id="hapus{{ $comment->id }}">
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
                                                                        action="{{ url('dashboard/statistic/referensi/comment/') }}/{{ $books->id }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="text" name="id"
                                                                            value="{{ $comment->id }}" hidden>
                                                                        <button type="submit" class="btn badge-danger"><i
                                                                                class="bi bi-trash3"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn badge badge-primary" data-toggle="modal"
                                                        data-target="#edit{{ $comment->id }}"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="edit{{ $comment->id }}" tabindex="-1"
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
                                                            action="{{ url('dashboard/statistic/referensi/comment/') }}/{{ $books->id }}"
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
                                                                                value="{{ $comment->id }}" hidden>
                                                                            <textarea class="form-control" name="comment" id="" cols="30" rows="10">{{ $comment->comment }}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Ratting
                                                                            </label>
                                                                            <input class="form-control" type="number"
                                                                                name="star" value="{{ $comment->star }}"
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
                                            </div>
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
