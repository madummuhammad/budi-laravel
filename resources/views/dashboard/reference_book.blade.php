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
                            <h4 class="card-title">Referensi {{ $reference_book_types->name }}</h4>
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
                                                            <form
                                                                action="{{ url('dashboard/reference_book_type/') . '/' . $reference_book_types->id }}"
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
                                                                                    value="{{ $reference_book_types->name }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Gambar
                                                                                    Banner</label><br>
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
                                            <img class="img-fluid w-100" src="{{ $reference_book_types->banner }}"
                                                alt="">
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
                            <h4 class="card-title">Daftar Referensi {{ $reference_book_types->name }} </h4>
                        </div>
                        <div class="card-body">
                            <a href="#tambahbuku" data-toggle="modal" class="btn btn-primary mb-3">Tambah Referensi
                                {{ $reference_book_types->name }}</a>
                            <!-- Modal -->
                            <div class="modal fade" id="tambahbuku" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Referensi
                                                {{ $reference_book_types->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('dashboard/reference_book') }}/{{ $reference_book_types->id }}"
                                            method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @method('POST')
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Judul</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Penulis</label>
                                                            <select class="single-select" name="author"
                                                                placeholder="asdfasdf">
                                                                <option selected disabled>--Pilih Penulis--</option>
                                                                @foreach ($authors as $author)
                                                                    <option value="{{ $author->id }}">
                                                                        {{ $author->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tema</label>
                                                            <select class="single-select" name="theme">
                                                                <option selected disabled>--Pilih Tema--</option>
                                                                @foreach ($themes as $theme)
                                                                    <option value="{{ $theme->id }}">
                                                                        {{ $theme->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Jumlah Halaman</label>
                                                            <input type="text" name="page" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Sinopsis</label>
                                                            <textarea class="sinopsis" name="sinopsis"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Jenjang</label>
                                                            <select class="single-select" name="level">
                                                                <option selected disabled>--Pilih Jenjang--</option>
                                                                @foreach ($levels as $level)
                                                                    <option value="{{ $level->id }}">
                                                                        {{ $level->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Bahasa</label>
                                                            <select class="single-select" name="language">
                                                                <option selected disabled>--Pilih Bahasa--</option>
                                                                @foreach ($languages as $language)
                                                                    <option value="{{ $language->id }}">
                                                                        {{ $language->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cover Buku</label><br>
                                                            <input type="file" class="form-control file-input-custom"
                                                                id="cover" aria-describedby="emailHelp"
                                                                name="cover">
                                                        </div>
                                                        @if ($reference_book_types->id == '5cbb48f9-aed4-44a9-90c2-71cbcef71264')
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">File PDF</label><br>
                                                                <input type="file"
                                                                    class="form-control file-input-custom" id="cover"
                                                                    aria-describedby="emailHelp" name="content">
                                                            </div>
                                                        @endif
                                                        @if ($reference_book_types->id == '220843b8-4f60-4e47-9aca-cf6ea0d54afe')
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">File Video</label><br>
                                                                <input type="file"
                                                                    class="form-control file-input-custom" id="cover"
                                                                    aria-describedby="emailHelp" name="content">
                                                            </div>
                                                        @endif
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
                            <div class="col-md-12">
                                <div class="row d-flex justify-content-end filter">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tema</label>
                                            <select class="form-control filter-book" name="theme">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($themes as $theme)
                                                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Jenjang</label>
                                            <select class="form-control filter-book" name="level">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="datatable">
                                @csrf
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets') }}/vendor/global/global.min.js"></script>
    <script>
        var token = $(".datatable input[name=_token]").val();
        $.ajax({
            type: 'POST',
            url: "{{ url('dashboard/reference_book/book_filter/') }}/{{ $reference_book_types->id }}",
            data: {
                _method: "POST",
                _token: token
            },
            success: function(hasil) {
                $('.datatable').html(hasil);
                var table = $('#example').DataTable({
                    createdRow: function(row, data, index) {
                        $(row).addClass('selected')
                    }
                });

                table.on('click', 'tbody tr', function() {
                    var $row = table.row(this).nodes().to$();
                    var hasClass = $row.hasClass('selected');
                    if (hasClass) {
                        $row.removeClass('selected')
                    } else {
                        $row.addClass('selected')
                    }
                })

                table.rows().every(function() {
                    this.nodes().to$().removeClass('selected')
                });

                jQuery(document).ready(function() {
                    $(".single-select").select2();
                    $(".sinopsis").summernote({
                        height: 190,
                        minHeight: null,
                        maxHeight: null,
                        focus: !1
                    }), $(".inline-editor").summernote({
                        airMode: !0
                    })
                }), window.edit = function() {
                    $(".click2edit").summernote()
                }, window.save = function() {
                    $(".click2edit").summernote("destroy")
                };
            }
        });

        $(".filter-book").on('change', function() {
            var theme = $(".filter-book[name=theme]").val();
            var level = $(".filter-book[name=level]").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('dashboard/reference_book/book_filter/') }}/{{ $reference_book_types->id }}",
                data: {
                    _method: "POST",
                    _token: token,
                    theme: theme,
                    level: level,
                    status: true
                },
                success: function(hasil) {
                    $('.datatable').html(hasil);
                    var table = $('#example').DataTable({
                        createdRow: function(row, data, index) {
                            $(row).addClass('selected')
                        }
                    });

                    table.on('click', 'tbody tr', function() {
                        var $row = table.row(this).nodes().to$();
                        var hasClass = $row.hasClass('selected');
                        if (hasClass) {
                            $row.removeClass('selected')
                        } else {
                            $row.addClass('selected')
                        }
                    })

                    table.rows().every(function() {
                        this.nodes().to$().removeClass('selected')
                    });
                }
            });
        })
    </script>
@endsection
