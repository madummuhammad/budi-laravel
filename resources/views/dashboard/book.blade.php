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
                            <h4 class="card-title">Daftar Buku</h4>
                        </div>
                        <div class="card-body">
                            <a href="#tambahbuku" data-toggle="modal" class="btn btn-primary mb-3">Tambah Buku</a>
                            <!-- Modal -->
                            <div class="modal fade" id="tambahbuku" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('dashboard/book') }}" method="POST"
                                            enctype="multipart/form-data">
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
                                                                    <option value="{{ $author->id }}">{{ $author->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tema</label>
                                                            <select class="single-select" name="theme">
                                                                <option selected disabled>--Pilih Tema--</option>
                                                                @foreach ($themes as $theme)
                                                                    <option value="{{ $theme->id }}">{{ $theme->name }}
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
                                                            <label for="exampleInputEmail1">Jenis Buku</label><br>
                                                            @foreach ($book_types as $book_type)
                                                                <div class="form-check form-check-inline ">
                                                                    <input class="form-check-input book_type" type="radio"
                                                                        id="book_type{{ $book_type->id }}"
                                                                        value="{{ $book_type->id }}" name="book_type">
                                                                    <label class="form-check-label"
                                                                        for="book_type{{ $book_type->id }}">{{ $book_type->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
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
                                                            <input type="file" class="form-control" id="cover-buku"
                                                                aria-describedby="emailHelp" hidden name="cover">
                                                            <label for="cover-buku"
                                                                class="label-upload-custom btn btn-secondary">Pilih
                                                                File</label>
                                                        </div>
                                                        <div id="file">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">File PDF</label><br>
                                                                <input type="file" class="form-control" id="content-buku"
                                                                    aria-describedby="emailHelp" hidden name="content">
                                                                <label for="content-buku"
                                                                    class="label-upload-custom btn btn-secondary">Pilih
                                                                    File PDF</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check mb-2">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="check1" value="1"
                                                                    name="display_homepage">
                                                                <label class="form-check-label" for="check1">Tampilkan
                                                                    di homepage?</label>
                                                            </div>
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
                            <div class="col-md-12">
                                <div class="row d-flex justify-content-end filter">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Jenis Buku</label>
                                            <select class="form-control filter-book" name="book_type">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($book_types as $book_type)
                                                    <option value="{{ $book_type->id }}">{{ $book_type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
        $(document).ready(function() {
            var token = $(".datatable input[name=_token]").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('dashboard/book_filter') }}",
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
                }
            });

            $(".filter-book").on('change', function() {
                var book_type = $(".filter-book[name=book_type]").val();
                var theme = $(".filter-book[name=theme]").val();
                var level = $(".filter-book[name=level]").val();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('dashboard/book_filter') }}",
                    data: {
                        _method: "POST",
                        _token: token,
                        book_type: book_type,
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

            // for (let i = 0; i < filter_book.length; i++) {
            //     filter_book[i].onchange = function() {

            //     }
            // }
        });
    </script>
@endsection
