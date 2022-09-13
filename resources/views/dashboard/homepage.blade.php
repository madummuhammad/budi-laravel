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
                            <h4 class="card-title">Homepage</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="text-center">Banner</h4>
                                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($banners as $banner)
                                                <div class="carousel-item @if ($loop->first) active @endif">
                                                    <div class="d-flex justify-content-center mb-3">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="btn badge-danger" data-toggle="modal"
                                                                data-target="#hapus{{ $banner->id }}"><i
                                                                    class="bi bi-trash"></i></button>
                                                            <div class="modal" tabindex="-1"
                                                                id="hapus{{ $banner->id }}">
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
                                                                            <form
                                                                                action="{{ url('dashboard/homepage/banner') }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <input type="text" name="id"
                                                                                    value="{{ $banner->id }}" hidden>
                                                                                <button type="submit"
                                                                                    class="btn badge-danger"><i
                                                                                        class="bi bi-trash3"></i></button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button class="btn badge-success"><i
                                                                    class="bi bi-pencil-square"></i></button>
                                                        </div>
                                                    </div>
                                                    <img src="{{ $banner->image }}" class="d-block w-100" alt="...">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>{{ $banner->tagline }}</h5>
                                                        {{-- <p>Some representative placeholder content for the first slide.</p> --}}
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev border-0" style="background:transparent;"
                                            type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </button>
                                        <button class="carousel-control-next border-0" style="background:transparent;"
                                            type="button" data-target="#carouselExampleCaptions" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </button>
                                    </div>
                                    <div class="py-4">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambah-banner"><i
                                                class="bi bi-plus-lg"></i></button>
                                        <div class="modal fade" id="tambah-banner" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Tema</h5>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ url('dashboard/homepage/banner') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @method('POST')
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Tagline</label>
                                                                        <input type="text" class="form-control"
                                                                            id="exampleInputEmail1"
                                                                            aria-describedby="emailHelp" name="tagline">
                                                                        <input type="text" name="page_id"
                                                                            value="b732f255-2544-4966-933c-263fdaa27bd0"
                                                                            hidden>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Gambar
                                                                            Banner</label><br>
                                                                        <input type="file" class="form-control"
                                                                            id="cover-buku" aria-describedby="emailHelp"
                                                                            hidden name="image">
                                                                        <label for="cover-buku"
                                                                            class="label-upload-custom btn btn-secondary">Pilih
                                                                            File</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
