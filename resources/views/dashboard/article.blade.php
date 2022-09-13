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
                            <h4 class="card-title">Artikel</h4>
                        </div>
                        <div class="card-body">
                            <a href="#tambahbuku" data-toggle="modal" class="btn btn-primary mb-3">Tulis Artikel</a>
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($articles as $article)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>
                                                    <img src="{{ $article->cover }}" class="img-fluid w-50" alt="">
                                                </td>
                                                <td>{{ $article->name }}</td>
                                                <td>{{ $article->writer }}</td>
                                                <td>
                                                    <button class="btn badge badge-danger" data-toggle="modal"
                                                        data-target="#hapus{{ $article->id }}"><i
                                                            class="bi bi-trash3"></i></button>
                                                    <div class="modal" tabindex="-1" id="hapus{{ $article->id }}">
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
                                                                    <p class="p-0 m-0 fs-4">Hapus data buku ini?</p>
                                                                </div>
                                                                <div class="modal-footer pt-0 pb-1 border-0">
                                                                    <form action="{{ url('dashboard/author') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="text" name="id"
                                                                            value="{{ $article->id }}" hidden>
                                                                        <button type="submit" class="btn badge-danger"><i
                                                                                class="bi bi-trash3"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn badge badge-primary" data-toggle="modal"
                                                        data-target="#edit{{ $article->id }}"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                </td>
                                            </tr>
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
