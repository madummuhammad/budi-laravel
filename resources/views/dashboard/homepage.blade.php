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
                                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel"
                                        data-interval="false">
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
                                                            <button class="btn badge-success" data-toggle="modal"
                                                                data-target="#editbanner{{ $banner->id }}"><i
                                                                    class="bi bi-pencil-square"></i></button>
                                                            <div class="modal fade" id="editbanner{{ $banner->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Edit Banner</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal"><span>&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form
                                                                            action="{{ url('dashboard/homepage/banner') }}"
                                                                            method="POST" enctype="multipart/form-data">
                                                                            <div class="modal-body">
                                                                                @method('patch')
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">Tagline</label>
                                                                                            <input type="text"
                                                                                                name="id"
                                                                                                value="{{ $banner->id }}"
                                                                                                hidden>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="exampleInputEmail1"
                                                                                                aria-describedby="emailHelp"
                                                                                                name="tagline"
                                                                                                value="{{ $banner->tagline }}">
                                                                                            <input type="text"
                                                                                                name="page_id"
                                                                                                value="b732f255-2544-4966-933c-263fdaa27bd0"
                                                                                                hidden>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">Gambar
                                                                                                Banner</label><br>
                                                                                            <img class="img-fluid mb-3"
                                                                                                src="{{ $banner->image }}"
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
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Tutup</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Kirim</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img src="{{ $banner->image }}" class="d-block w-100"
                                                        alt="...">
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
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#tambah-banner"><i class="bi bi-plus-lg"></i></button>
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
                                                                        <input type="file"
                                                                            class="form-control file-input-custom"
                                                                            id="cover-buku" aria-describedby="emailHelp"
                                                                            name="image">
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
                            <div id="section-4" class="mt-5">
                                <h2 class="fw-bold ff-bubblewump text-end mb-5 mt-4 fs-3">Buku Pilihan Bulan ini
                                    @if (count($book_of_the_months) < 2)
                                        <button class="btn badge-primary text-white" data-toggle="modal"
                                            data-target="#tambahbukupilihan"><i class="bi bi-plus-lg"></i></button>
                                    @endif
                                </h2>
                                <div class="modal" tabindex="-1" id="tambahbukupilihan">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header border-0 py-0">
                                                <h5 class="modal-title"></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body py-0">
                                                <div class="table-responsive">
                                                    <table id="" class="display book_of_the_month"
                                                        style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Cover</th>
                                                                <th>Judul</th>
                                                                <th>Jenis Buku</th>
                                                                <th>Tema</th>
                                                                <th>Jenjang</th>
                                                                <th>Action</th>
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
                                                                    <td>
                                                                        <div class="img-container-for-icon">
                                                                            <img src="{{ $book->cover }}"
                                                                                class="img-fluid w-50" alt="">
                                                                            @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                                                <div class="icon">
                                                                                    <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                                                        alt="">
                                                                                </div>
                                                                            @endif
                                                                            @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                                                <div class="icon">
                                                                                    <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                                                        alt="">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </td>
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
                                                                    <td>
                                                                        <form
                                                                            action="{{ url('dashboard/homepage/book_of_the_month/') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('post')
                                                                            <input type="text" name="book_id"
                                                                                value="{{ $book->id }}" hidden>
                                                                            <button type="submit"
                                                                                class="btn badge-primary">Pilih</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer pt-0 pb-1 border-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-dark">
                                    @foreach ($book_of_the_months as $botm)
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn badge-success" data-toggle="modal"
                                                    data-target="#edit{{ $botm->id }}"><i
                                                        class="bi bi-pencil-square"></i></button>
                                                <div class="modal" tabindex="-1" id="edit{{ $botm->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-0 py-0">
                                                                <h5 class="modal-title"></h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body py-0">
                                                                <div class="table-responsive">
                                                                    <table id=""
                                                                        class="display book_of_the_month"
                                                                        style="min-width: 845px">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No</th>
                                                                                <th>Cover</th>
                                                                                <th>Judul</th>
                                                                                <th>Jenis Buku</th>
                                                                                <th>Tema</th>
                                                                                <th>Jenjang</th>
                                                                                <th>Action</th>
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
                                                                                    <td>
                                                                                        <div
                                                                                            class="img-container-for-icon">
                                                                                            <img src="{{ $book->cover }}"
                                                                                                class="img-fluid w-50"
                                                                                                alt="">
                                                                                            @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                                                                <div class="icon">
                                                                                                    <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                                                                        alt="">
                                                                                                </div>
                                                                                            @endif
                                                                                            @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                                                                <div class="icon">
                                                                                                    <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                                                                        alt="">
                                                                                                </div>
                                                                                            @endif
                                                                                        </div>
                                                                                    </td>
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
                                                                                    <td>
                                                                                        <form
                                                                                            action="{{ url('dashboard/homepage/book_of_the_month/') }}"
                                                                                            method="post">
                                                                                            @csrf
                                                                                            @method('patch')
                                                                                            <input type="text"
                                                                                                name="id"
                                                                                                value="{{ $botm->id }}"
                                                                                                hidden>
                                                                                            <input type="text"
                                                                                                name="book_id"
                                                                                                value="{{ $book->id }}"
                                                                                                hidden>
                                                                                            <button type="submit"
                                                                                                class="btn badge-primary">Pilih</button>
                                                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer pt-0 pb-1 border-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    @foreach ($botm->books as $book)
                                                        <p class="fw-600 fs-6">{{ $book->name }}</p>
                                                    @endforeach
                                                    <div class="mt-3 sinopsis-text">
                                                        @foreach ($botm->books as $book)
                                                            @php
                                                                echo $book->sinopsis;
                                                            @endphp
                                                        @endforeach
                                                    </div>
                                                    <div class="mt-5">
                                                        @foreach ($botm->books as $book)
                                                            @foreach ($book->authors as $author)
                                                                <p><span class="fw-bold">Pengarang :
                                                                        {{ $author->name }}</span>
                                                                </p>
                                                            @endforeach
                                                        @endforeach
                                                        <p><span class="fw-bold">Rating : </span><img
                                                                src="{{ asset('web') }}/assets/icon/star.svg"
                                                                alt="">
                                                            4.9
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="card border-0 shadow">
                                                        <div class="card-body">
                                                            @foreach ($botm->books as $book)
                                                                <img class="img-fluid" src="{{ $book->cover }}"
                                                                    alt="">
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="section-4" class="mt-5">
                                <h2 class="fw-bold ff-bubblewump text-end mb-5 mt-4 fs-3">Dengarkan Cerita Menarik Setiap
                                    Hari @if (count($audio_book_homepages) < 1)
                                        <button class="btn badge-primary text-white" data-toggle="modal"
                                            data-target="#tambahaudiobook"><i class="bi bi-plus-lg"></i></button>
                                    @endif
                                </h2>
                                <div class="modal" tabindex="-1" id="tambahaudiobook">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header border-0 py-0">
                                                <h5 class="modal-title"></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body py-0">
                                                <div class="table-responsive">
                                                    <table id="" class="display book_of_the_month"
                                                        style="min-width: 845px">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Cover</th>
                                                                <th>Judul</th>
                                                                <th>Jenis Buku</th>
                                                                <th>Tema</th>
                                                                <th>Jenjang</th>
                                                                <th>Action</th>
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
                                                                    <td>
                                                                        <div class="img-container-for-icon">
                                                                            <img src="{{ $book->cover }}"
                                                                                class="img-fluid w-50" alt="">
                                                                            @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                                                <div class="icon">
                                                                                    <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                                                        alt="">
                                                                                </div>
                                                                            @endif
                                                                            @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                                                <div class="icon">
                                                                                    <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                                                        alt="">
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    </td>
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
                                                                    <td>
                                                                        <form
                                                                            action="{{ url('dashboard/homepage/audio_book_homepage/') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('post')
                                                                            <input type="text" name="book_id"
                                                                                value="{{ $book->id }}" hidden>
                                                                            <button type="submit"
                                                                                class="btn badge-primary">Pilih</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer pt-0 pb-1 border-0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-dark">
                                    @foreach ($audio_book_homepages as $abh)
                                        <div class="col-lg-8">
                                            <div class="d-flex justify-content-end">
                                                <button class="btn badge-success" data-toggle="modal"
                                                    data-target="#edit{{ $abh->id }}"><i
                                                        class="bi bi-pencil-square"></i></button>
                                                <div class="modal" tabindex="-1" id="edit{{ $abh->id }}">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header border-0 py-0">
                                                                <h5 class="modal-title"></h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body py-0">
                                                                <div class="table-responsive">
                                                                    <table id="audiobook" class="display"
                                                                        style="min-width: 845px">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No</th>
                                                                                <th>Cover</th>
                                                                                <th>Judul</th>
                                                                                <th>Jenis Buku</th>
                                                                                <th>Tema</th>
                                                                                <th>Jenjang</th>
                                                                                <th>Action</th>
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
                                                                                @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                                                    <tr>
                                                                                        <td>{{ $no }}</td>
                                                                                        <td>
                                                                                            <div
                                                                                                class="img-container-for-icon">
                                                                                                <img src="{{ $book->cover }}"
                                                                                                    class="img-fluid w-50"
                                                                                                    alt="">
                                                                                                @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                                                                    <div class="icon">
                                                                                                        <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                                                                            alt="">
                                                                                                    </div>
                                                                                                @endif
                                                                                                @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                                                                    <div class="icon">
                                                                                                        <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                                                                            alt="">
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </td>
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
                                                                                        <td>
                                                                                            <form
                                                                                                action="{{ url('dashboard/homepage/audio_book_homepage/') }}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                                @method('patch')
                                                                                                <input type="text"
                                                                                                    name="id"
                                                                                                    value="{{ $abh->id }}"
                                                                                                    hidden>
                                                                                                <input type="text"
                                                                                                    name="book_id"
                                                                                                    value="{{ $book->id }}"
                                                                                                    hidden>
                                                                                                <button type="submit"
                                                                                                    class="btn badge-primary">Pilih</button>
                                                                                            </form>
                                                                                        </td>
                                                                                    </tr>
                                                                                @endif
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer pt-0 pb-1 border-0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="img-container-for-icon bg-danger">
                                                        @foreach ($abh->books as $book)
                                                            <img src="{{ $book->cover }}" class="img-fluid w-100"
                                                                alt="">
                                                            @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                                <div class="icon" style="left: 40%">
                                                                    <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                                        alt="">
                                                                </div>
                                                            @endif
                                                            @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                                <div class="icon">
                                                                    <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                                        alt="">
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @foreach ($abh->books as $book)
                                                    <div class="col-lg-6">
                                                        <p class="fw-600 fs-6">{{ $book->name }}</p>
                                                        <p class="mt-3">
                                                            @php
                                                                echo $book->sinopsis;
                                                            @endphp
                                                        </p>
                                                        <div class="mt-5">
                                                            @foreach ($book->authors as $author)
                                                                <p><span class="fw-bold">Pengarang :
                                                                        {{ $author->name }}</span>
                                                                </p>
                                                            @endforeach
                                                            <p><span class="fw-bold">Rating : </span><img
                                                                    src="{{ asset('web') }}/assets/icon/star.svg"
                                                                    alt="">
                                                                4.9
                                                            </p>
                                                        </div>
                                                        <div class="mt-5">
                                                            <audio controls>
                                                                <source
                                                                    src="{{ asset('storage/') }}/{{ $book->content }}"
                                                                    type="audio/mpeg">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="section-4" class="mt-5">
                                <h2 class="fw-bold ff-bubblewump text-end mb-5 mt-4 fs-3">Ayo Kirimkan Karyamu</h2>
                                <div class="row text-dark">
                                    @foreach ($send_creations as $send_creation)
                                        @if ($loop->first)
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn badge-success" data-toggle="modal"
                                                        data-target="#sendcreation"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <div class="modal" tabindex="-1" id="sendcreation">
                                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 py-0">
                                                                    <h5 class="modal-title"></h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body py-0">
                                                                    <form
                                                                        action="{{ url('dashboard/homepage/send_creation') }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            @method('patch')
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div class="row">
                                                                                        @foreach ($send_creation->send_creation_images as $send_creation_image)
                                                                                            <div class="col-6">
                                                                                                <img src="{{ $send_creation_image->image }}"
                                                                                                    class="img-fluid w-100"
                                                                                                    alt="">
                                                                                                <input type="file"
                                                                                                    class="form-control file-input-custom"
                                                                                                    id="cover-buku"
                                                                                                    aria-describedby="emailHelp"
                                                                                                    name="image{{ $loop->index }}">
                                                                                                <input type="text"
                                                                                                    name="image_id{{ $loop->index }}"
                                                                                                    value="{{ $send_creation_image->id }}"
                                                                                                    hidden>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Heading</label>
                                                                                        <input type="text"
                                                                                            name="id"
                                                                                            value="{{ $send_creation->id }}"
                                                                                            hidden>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            name="heading"
                                                                                            value="{{ $send_creation->heading }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="exampleInputEmail1">Sub
                                                                                            Heading</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            name="sub_heading"
                                                                                            value="{{ $send_creation->sub_heading }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Konten
                                                                                        </label>
                                                                                        <textarea name="content" class="form-control" id="" cols="30" rows="10">
                                                                                    {{ $send_creation->content }}
                                                                                </textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Kirim</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer pt-0 pb-1 border-0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="img-container-for-icon">
                                                            <div class="row">
                                                                @foreach ($send_creation->send_creation_images as $send_creation_image)
                                                                    <div class="col-6">
                                                                        <img src="{{ $send_creation_image->image }}"
                                                                            class="img-fluid w-100" alt=""><br>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <h2 class="fw-600 fs-6">{{ $send_creation->heading }}</h2>
                                                        <p class="mt-3">
                                                            @php
                                                                echo $send_creation->sub_heading;
                                                            @endphp
                                                        </p>
                                                        <div class="mt-5">
                                                            @php
                                                                echo $send_creation->content;
                                                            @endphp
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
