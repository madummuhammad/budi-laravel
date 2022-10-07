@extends('main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
<div id="hero">
    <img class="w-100" src="{{ $reference_book_types->banner }}" alt="">
    <h2 class="ff-kidzone tagline text-white">{{ $reference_book_types->tagline }}</h2>
</div>
<img src="" alt="">
<div class="container">
    <div class="row tab-book-2 mt-3">
        <div class="d-flex justify-content-center">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active d-flex flex-column align-items-center"
                    href="{{ url('reference_book/5cbb48f9-aed4-44a9-90c2-71cbcef71264') }}">
                    @if ($reference_book_types->id == '5cbb48f9-aed4-44a9-90c2-71cbcef71264')
                    <img src="{{ asset('web') }}/assets/icon/book_active.svg" alt="">
                    @else
                    <img src="{{ asset('web') }}/assets/icon/book.svg" alt="">
                    @endif
                    <span style="font-size: 14px" class="text-blue fw-bold">Referensi Buku</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex flex-column align-items-center"
                href="{{ url('reference_book/220843b8-4f60-4e47-9aca-cf6ea0d54afe') }}">
                @if ($reference_book_types->id == '220843b8-4f60-4e47-9aca-cf6ea0d54afe')
                <img src="{{ asset('web') }}/assets/icon/video_active.svg" alt="">
                @else
                <img src="{{ asset('web') }}/assets/icon/video.svg" alt="">
                @endif
                <span style="font-size: 14px">Referensi Video</span>
            </a>
        </li>
    </ul>
</div>
</div>

<!-- Tab panes -->
<div class="tab-content mt-3">
    <div class="tab-pane container active" id="buku_bacaan">
       <!--  <div class="d-flex justify-content-center">
            <div class="home-tab" style="background-color: {{ $reference_book_types->color }}">
                <div class="home-tab-body w-100" id="home-tab-body">
                    <div class="container">
                        <div class="row">
                            <p class="text-white d-block d-sm-none text-center fs-m-12px dropdown-toggle"
                            onclick="this.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');">
                            Pilih
                        Jenjang & Tema</p>
                        <div class="d-none d-sm-block col-12 col-md-2-5 my-1">
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
                                </a></li>
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
                    <div class="d-none d-sm-block col-12 col-md-2-5 my-1">
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
                    <div class="d-none d-sm-block col-12 col-md-2-5 my-1">
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
                        <div class="col-12 col-md-4 my-1">
                            <div class="input-search w-100">
                                <input type="text" class="form-control" id="search" placeholder="Cari">
                                <button class="btn" id="search-button"><i
                                    class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-5 filter-theme nav nav-pills"
        style="padding-left: 10%; padding-right:10%;">
        <div class="col nav-item nav-pills-semua"><a class="nav-link active" data-bs-toggle="pill"
            href="#semua" data-semua="0">Semua
        Tema</a></div>
        @foreach ($themes as $theme)
        <div class="col nav-item nav-pills{{ $theme->id }}"><a class="nav-link" data-bs-toggle="pill"
            href="" data-id="{{ $theme->id }}">{{ $theme->name }}</a></div>
            @endforeach
        </div> -->
        <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
            <h3 class="">Hasil Pencarian <span class="fw-bold fs-4">Referensi @if ($reference_book_types->id == '5cbb48f9-aed4-44a9-90c2-71cbcef71264')
                Buku
                @else
                Video
                @endif
            </span> </h3>
            <div class="input-search d-flex">
                <input type="text" class="form-control" id="search" placeholder="Cari">
                <button class="btn" id="search-button"><i
                    class="bi bi-search"></i></button>
                </div> 
            </div>

            <div class="row" id="reference_book">

            </div>
        </div>
    </div>
</div>
<div id="section-5" style="margin-top:80px">
    <h2 class="ff-bubblewump text-center mb-4">Paling Banyak Diunduh</h2>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme px-5" id="owl-carousel-2">
                    @foreach ($most_downloaded as $most_download)
                    <div class="item">
                        <img class="img-fluid" src="{{ $most_download->cover }}" alt="">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-5">
    <div class="row pt-3 px-5">
        <img class="img-fluid" src="assets/icon/board.svg" alt="">
        @csrf
    </div>
</div>
<script src="{{ asset('web') }}/assets/js/jquery.js"></script>
<script>
    var pagination_link = $(".pagination-link").length;
    var token = $("input[name=_token]").val();
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: "{{ url('reference_book/') }}/{{ $reference_book_types->id }}",
            data: {
                _method: "POST",
                _token: token,
            },
            success: function(hasil) {
                $("#reference_book").html(hasil);
                $("#search-button").on('click', function() {
                    var jenjang = $("[name=jenjang]").val();
                    var tema = $("[name=tema]").val();
                    var bahasa = $("[name=bahasa]").val();
                    var search = $("#search").val();
                    $.ajax({
                        type: 'POST',
                        url: "{{ url('reference_book/') }}/{{ $reference_book_types->id }}",
                        data: {
                            _method: "POST",
                            _token: token,
                            jenjang: jenjang,
                            tema: tema,
                            bahasa: bahasa,
                            search: search
                        },
                        success: function(hasil) {
                            $("#reference_book").html(hasil);
                        }
                    });
                })
            }
        });
        var filter_theme = $(".filter-theme .nav-item a");

        for (let i = 0; i < filter_theme.length; i++) {
            $(filter_theme[i]).on('click', function() {
                var tema = $(this).data('id');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('reference_book/') }}/{{ $reference_book_types->id }}",
                    data: {
                        _method: "POST",
                        _token: token,
                        tema: tema,
                    },
                    success: function(hasil) {
                        $("#reference_book").html(hasil);
                    }
                });
                if ($(this).data('semua') == 0) {
                    $("#tema button").html("<p class='overflow-hidden'>Tema</p>");
                } else {
                    $("#tema button").html("<p class='overflow-hidden'>" + $(this)
                        .html() + "</p>");
                }
                $("[name=tema]").val(tema);
            })
        }
    });
</script>
@endsection
