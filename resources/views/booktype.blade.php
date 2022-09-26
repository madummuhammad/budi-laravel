@extends('main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ $book_types->banner }}" alt="">
        <h2 class="ff-kidzone tagline text-white">{{ $book_types->tagline }}</h2>
    </div>
    <img src="" alt="">
    <div class="container">
        <div class="row tab-book-2 mt-3 justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-6">
                    <ul class="nav nav-pills">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 col-md-3">
                                    <li class="nav-item">
                                        <a class="nav-link active d-flex flex-column align-items-center"
                                            href="{{ url('book_type/2fd97285-08d0-4d81-83f2-582f0e8b0f36') }}">
                                            @if ($book_types->id == '2fd97285-08d0-4d81-83f2-582f0e8b0f36')
                                                <img src="{{ asset('web') }}/assets/icon/book_active.svg" alt="">
                                            @else
                                                <img src="{{ asset('web') }}/assets/icon/book.svg" alt="">
                                            @endif
                                            <span class="fw-bold text-blue">Buku Bacaan</span>
                                        </a>
                                    </li>
                                </div>
                                <div class="col-6 col-md-3">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex flex-column align-items-center"
                                            href="{{ url('book_type/31ba455c-c9c7-4a3c-a2b1-62915546eaba') }}">
                                            @if ($book_types->id == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                                <img src="{{ asset('web') }}/assets/icon/komik_active.svg" alt="">
                                            @else
                                                <img src="{{ asset('web') }}/assets/icon/komik.svg" alt="">
                                            @endif
                                            <span>Buku Komik</span>
                                        </a>
                                    </li>
                                </div>
                                <div class="col-6 col-md-3">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex flex-column align-items-center"
                                            href="{{ url('book_type/9e30a937-0d60-49ad-9775-c19b97cfe864') }}">
                                            @if ($book_types->id == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                <img src="{{ asset('web') }}/assets/icon/audio_active.svg" alt="">
                                            @else
                                                <img src="{{ asset('web') }}/assets/icon/audio.svg" alt="">
                                            @endif
                                            <span>Buku Audio</span>
                                        </a>
                                    </li>
                                </div>
                                <div class="col-6 col-md-3">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex flex-column align-items-center"
                                            href="{{ url('book_type/bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') }}">
                                            @if ($book_types->id == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                <img src="{{ asset('web') }}/assets/icon/video_active.svg" alt="">
                                            @else
                                                <img src="{{ asset('web') }}/assets/icon/video.svg" alt="">
                                            @endif
                                            <span>Buku Video</span>
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <div class="d-flex justify-content-center">
                    <div class="home-tab" style="background-color: {{ $book_types->color }}">
                        <div class="home-tab-body w-100" id="home-tab-body">
                            <div class="container">
                                <div class="row">
                                    <button class="d-block d-sm-none text-center mx-auto btn text-decoration-underline mb-2"
                                        onclick="this.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');">Pilih
                                        Jenjang, Tema, dan Bahasa</button>
                                    <div class="d-none d-sm-block col-12 col-md-3 my-1">
                                        <div class="dropdown w-100" id="jenjang">
                                            <button
                                                class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle green"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <p>Jenjang</p>
                                            </button>
                                            <input type="text" name="jenjang" value="" hidden>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-danger">Jenjang</a></li>
                                                <li><a class="dropdown-item"
                                                        data-value="014453da-54e6-41b5-be05-952bc233f144">PAUD</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        data-value="0207580f-6a98-477b-a19f-35bfc0f938e9">SD
                                                        (123)</a></li>
                                                <li><a class="dropdown-item"
                                                        data-value="0207580f-6a98-477b-a19f-35bfc0f938e9">SD
                                                        (456)</a></li>
                                                <li><a class="dropdown-item"
                                                        data-value="2070db95-9133-4aa1-9f3f-f711f10df750">SMP</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        data-value="555c961c-fb2a-4a25-8829-4a12c7d2afc0">SMA</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        data-value="a26a4afd-7226-434c-83f3-9ca3ce4af523">UMUM</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-none d-sm-block col-12 col-md-3 my-1">
                                        <div class="dropdown w-100" id="tema">
                                            <button
                                                class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle orange dropdown-toggle"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <p>Tema</p>
                                            </button>
                                            <input type="text" name="tema" value="" hidden>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-danger" data-value="">Tema</a></li>
                                                @foreach ($themes as $theme)
                                                    <li><a class="dropdown-item"
                                                            data-value="{{ $theme->id }}">{{ $theme->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-none d-sm-block col-12 col-md-3 my-1">
                                        <div class="dropdown w-100" id="bahasa">
                                            <button
                                                class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle dropdown-toggle green"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                                <p>Bahasa</p>
                                            </button>
                                            <input type="text" name="bahasa" value="" hidden>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-danger">Bahasa</a></li>
                                                <li><a class="dropdown-item"
                                                        data-value="31d76818-3c8a-4f54-aa65-f14dd5c71008">Indonesia</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        data-value="62efa3bd-5db5-4627-aabc-5c180f58cf26">Inggris</a></li>
                                                <li><a class="dropdown-item"
                                                        data-value="886bcb5a-43a8-4801-8a76-109b173cdb51">Daerah</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3 my-1">
                                        <div class="input-search w-100">
                                            <input type="text" class="form-control" id="search"
                                                placeholder="Cari">
                                            <button class="btn" id="search-button"><i
                                                    class="bi bi-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="book_type">

                </div>
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation" id="pagin" class="d-flex">
                        <span class="page-item prev">
                            <button class="page-link" href="">
                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                            </button>
                        </span>
                        <ul class="pagination">
                            @for ($i = 0; $i < ceil($books->total() / 10); $i++)
                                <li
                                    class="page-item pagination-link active @if ($i >= 2) d-none @endif">
                                    <a class="page-link" href="#">{{ $i + 1 }}</a>
                                </li>
                            @endfor
                            <input type="number" name="page-link" value="0" hidden>
                        </ul>
                        <span class="page-item next">
                            <button class="page-link" href="">
                                <img src="{{ asset('web') }}/assets/icon/next-2.svg" alt="">
                            </button>
                        </span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div id="section-5" style="margin-top:80px">
        <h2 class="text-center mb-4 fw-bold">Paling Banyak @if ($book_types->id == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                Didengar
            @elseif ($book_types->id == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                Ditonton
            @else
                Dibaca
            @endif
        </h2>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme px-5" id="owl-carousel-2">
                        @foreach ($most_reads as $book_read)
                            <div class="item">
                                <img class="img-fluid" src="{{ $book_read->cover }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (auth()->guard('visitor')->check() == true)
        @if (count($nexts) > 0)
            <section id="section-2" class="" style="margin-top:80px">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header d-flex justify-content-center justify-content-md-between">
                                <h2 class="fw-bold fs-3 text-center text-md-start">Lanjutkan yuk,
                                    {{ auth()->guard('visitor')->user()->name }}</h2>
                                <a class="d-none d-sm-block" href="{{ url('mylibrary') }}">Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="owl-carousel owl-theme px-5" id="owl-carousel-3">
                                @foreach ($nexts as $next)
                                    <div class="item">
                                        <div class="img-container-for-icon">
                                            <img class="img-fluid" src="{{ $next->books->cover }}" alt="">
                                            @if ($next->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                <div class="icon">
                                                    <img class="w-50" src="{{ asset('web') }}/assets/icon/play.svg"
                                                        alt="">
                                                </div>
                                            @endif
                                            @if ($next->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                <div class="icon">
                                                    <img class="w-50" src="{{ asset('web') }}/assets/icon/mic.svg"
                                                        alt="">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container-fluid pb-5">
                <div class="row pt-3 px-5">
                    <img class="img-fluid" src="{{ asset('web') }}/assets/icon/board.svg" alt="">
                </div>
                <a class="d-block d-md-none my-2 text-center" href="{{ url('mylibrary') }}">Lihat Semua</a>
            </div>
        @endif
    @endif
    @csrf
    <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
    <script>
        var pagination_link = $(".pagination-link").length;
        var token = $("input[name=_token]").val();
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: "{{ url('book_type/') }}/{{ $book_types->id }}?page=1",
                data: {
                    _method: "POST",
                    _token: token,
                },
                success: function(hasil) {
                    $("#book_type").html(hasil);
                    $(".next").on('click', function() {
                        var page_link_number = parseInt($("[name=page-link]").val());
                        if (page_link_number >= {{ ceil($books->total() / 10) }}) {
                            page_link = page_link_number;
                        } else {
                            page_link = page_link_number + 1
                        }
                        $.ajax({
                            type: 'POST',
                            url: "{{ url('book_type/') }}/{{ $book_types->id }}?page=" +
                                page_link,
                            data: {
                                _method: "POST",
                                _token: token,
                            },
                            success: function(hasil) {
                                $("#book_type").html(hasil);
                            }
                        });
                    })
                    $(".prev").on('click', function() {
                        var page_link = parseInt($("[name=page-link]").val()) + 1;
                        $.ajax({
                            type: 'POST',
                            url: "{{ url('book_type/') }}/{{ $book_types->id }}?page=" +
                                page_link,
                            data: {
                                _method: "POST",
                                _token: token,
                            },
                            success: function(hasil) {
                                $("#book_type").html(hasil);
                            }
                        });
                    })
                    $("#pagin ul a").click(function(e) {
                        e.preventDefault();
                        var page_link = parseInt($(this).parent().index()) + 1;
                        $.ajax({
                            type: 'POST',
                            url: "{{ url('book_type/') }}/{{ $book_types->id }}?page=" +
                                page_link,
                            data: {
                                _method: "POST",
                                _token: token,
                            },
                            success: function(hasil) {
                                $("#book_type").html(hasil);
                            }
                        });
                    });
                    $("#search-button").on('click', function() {
                        var jenjang = $("[name=jenjang]").val();
                        var tema = $("[name=tema]").val();
                        var bahasa = $("[name=bahasa]").val();
                        var search = $("#search").val();
                        $.ajax({
                            type: 'POST',
                            url: "{{ url('book_type/') }}/{{ $book_types->id }}?page=1",
                            data: {
                                _method: "POST",
                                _token: token,
                                jenjang: jenjang,
                                tema: tema,
                                bahasa: bahasa,
                                search: search
                            },
                            success: function(hasil) {
                                $(".next").on('click', function() {
                                    var page_link_number = parseInt($(
                                        "[name=page-link]").val());
                                    if (page_link_number >=
                                        {{ ceil($books->total() / 10) }}) {
                                        page_link = page_link_number;
                                    } else {
                                        page_link = page_link_number + 1
                                    }
                                    $.ajax({
                                        type: 'POST',
                                        url: "{{ url('book_type/') }}/{{ $book_types->id }}?page=" +
                                            page_link,
                                        data: {
                                            _method: "POST",
                                            _token: token,
                                            jenjang: jenjang,
                                            tema: tema,
                                            bahasa: bahasa,
                                            search: search
                                        },
                                        success: function(hasil) {
                                            $("#book_type")
                                                .html(hasil);
                                        }
                                    });
                                })
                                $(".prev").on('click', function() {
                                    var page_link = parseInt($(
                                        "[name=page-link]").val()) + 1;
                                    $.ajax({
                                        type: 'POST',
                                        url: "{{ url('book_type/') }}/{{ $book_types->id }}?page=" +
                                            page_link,
                                        data: {
                                            _method: "POST",
                                            _token: token,
                                            jenjang: jenjang,
                                            tema: tema,
                                            bahasa: bahasa,
                                            search: search
                                        },
                                        success: function(hasil) {
                                            $("#book_type")
                                                .html(hasil);
                                        }
                                    });
                                })
                                $("#pagin ul a").click(function(e) {
                                    e.preventDefault();
                                    var page_link = parseInt($(this)
                                        .parent().index()) + 1;
                                    $.ajax({
                                        type: 'POST',
                                        url: "{{ url('book_type/') }}/{{ $book_types->id }}?page=" +
                                            page_link,
                                        data: {
                                            _method: "POST",
                                            _token: token,
                                            jenjang: jenjang,
                                            tema: tema,
                                            bahasa: bahasa,
                                            search: search
                                        },
                                        success: function(hasil) {
                                            $("#book_type")
                                                .html(hasil);
                                        }
                                    });
                                });
                                $("#book_type").html(hasil);
                            }
                        });
                    })

                }
            });
        });
    </script>
@endsection
