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
                            <h4 class="card-title">Kirimkan Karyamu </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="text-center">Banner</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn badge badge-success mb-2" data-toggle="modal"
                                                    data-target="#edit-banner"><i class="bi bi-pencil-square"></i></button>
                                                <div class="modal fade" id="edit-banner" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Banner
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ url('dashboard/send_creation/banner') }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    @method('patch')
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="exampleInputEmail1">Tagline</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="exampleInputEmail1"
                                                                                    aria-describedby="emailHelp"
                                                                                    name="tagline"
                                                                                    value="{{ $banners->tagline }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Gambar
                                                                                    Banner</label><br>
                                                                                <img class="img-fluid mb-3"
                                                                                    src="{{ $banners->image }}"
                                                                                    alt="">
                                                                                <input type="file"
                                                                                    class="form-control file-input-custom"
                                                                                    id="cover-buku"
                                                                                    aria-describedby="emailHelp"
                                                                                    name="image">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Kirim</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <img class="img-fluid" src="{{ $banners->image }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h4 class="card-title">Edit {{ $send_creations->heading }}</h4> --}}
                        </div>
                        <div class="card-body">
                            <div class="modal fade" id="tambahbuku" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('dashboard/send_creation') }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @method('patch')
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Header</label><br>
                                                            <input type="text" class="form-control"
                                                                aria-describedby="emailHelp" name="header"
                                                                value="{{ $send_creations->heading }}">
                                                        </div>
                                                        <div class="form-group">
                                                            @foreach ($send_creations->send_creation_images as $send_creation_image)
                                                                @if ($loop->index == 1)
                                                                    <img class="img-fluid mb-3"
                                                                        src="{{ $send_creation_image->image }}"
                                                                        alt=""><br>
                                                                @endif
                                                            @endforeach
                                                            <label for="exampleInputEmail1">Cover Buku</label><br>
                                                            <input type="file" class="form-control file-input-custom"
                                                                id="cover" aria-describedby="emailHelp"
                                                                name="image">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Sub Heading Konten</label><br>
                                                            <textarea class="blog" name="sub_heading">{{ $send_creations->sub_heading }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            @foreach ($send_creations->send_creation_images as $send_creation_image)
                                                                @if ($loop->index == 0)
                                                                    <img class="img-fluid mb-3"
                                                                        src="{{ $send_creation_image->image }}"
                                                                        alt=""><br>
                                                                @endif
                                                            @endforeach
                                                            <label for="exampleInputEmail1">Konten Image</label><br>
                                                            <input type="file" class="form-control file-input-custom"
                                                                aria-describedby="emailHelp" name="content-image">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Konten</label><br>
                                                            <textarea class="blog" name="content">{{ $send_creations->content }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>{{ $send_creations->heading }} <a href="#tambahbuku" data-toggle="modal"
                                            class="btn btn-success mb-3"><i class="bi bi-pencil-square"></i>
                                        </a></h2>
                                    @foreach ($send_creations->send_creation_images as $send_creation_image)
                                        @if ($loop->index == 1)
                                            <img class="img-fluid" src="{{ $send_creation_image->image }}"
                                                alt="">
                                        @endif
                                    @endforeach
                                    @php
                                        echo $send_creations->sub_heading;
                                    @endphp
                                </div>
                                <div class="col-lg-6 pt-3">
                                    @php
                                        echo $send_creations->content;
                                    @endphp
                                </div>
                                <div class="col-lg-6 pt-3">
                                    @foreach ($send_creations->send_creation_images as $send_creation_image)
                                        @if ($loop->index == 0)
                                            <img class="img-fluid" src="{{ $send_creation_image->image }}"
                                                alt="">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
