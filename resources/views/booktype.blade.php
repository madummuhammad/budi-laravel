@extends('main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
<div id="hero">
    <img class="w-100 d-none d-md-block" src="{{ $book_types->banner }}" alt="">
    <img class="w-100 d-block d-md-none" src="{{ $book_types->banner_mobile }}" alt="">
    <h2 class="ms-4 ff-kidzone tagline text-white">{{ $book_types->tagline }}</h2>
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
                                    <img src="{{ asset('web') }}/assets/icon/book_active.png" alt="">
                                    @else
                                    <img src="{{ asset('web') }}/assets/icon/book.png" alt="">
                                    @endif
                                    <span style="font-size: 14px" class="fw-bold text-blue">Buku Bacaan</span>
                                </a>
                            </li>
                        </div>
                        <div class="col-6 col-md-3">
                            <li class="nav-item">
                                <a class="nav-link d-flex flex-column align-items-center"
                                href="{{ url('book_type/31ba455c-c9c7-4a3c-a2b1-62915546eaba') }}">
                                @if ($book_types->id == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                <img src="{{ asset('web') }}/assets/icon/komik_active.png" alt="">
                                @else
                                <img src="{{ asset('web') }}/assets/icon/komik.png" alt="">
                                @endif
                                <span style="font-size: 14px">Buku Komik</span>
                            </a>
                        </li>
                    </div>
                    <div class="col-6 col-md-3">
                        <li class="nav-item">
                            <a class="nav-link d-flex flex-column align-items-center"
                            href="{{ url('book_type/9e30a937-0d60-49ad-9775-c19b97cfe864') }}">
                            @if ($book_types->id == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                            <img src="{{ asset('web') }}/assets/icon/audio_active.png" alt="">
                            @else
                            <img src="{{ asset('web') }}/assets/icon/audio.png" alt="">
                            @endif
                            <span style="font-size: 14px">Buku Audio</span>
                        </a>
                    </li>
                </div>
                <div class="col-6 col-md-3">
                    <li class="nav-item">
                        <a class="nav-link d-flex flex-column align-items-center"
                        href="{{ url('book_type/bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') }}">
                        @if ($book_types->id == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                        <img src="{{ asset('web') }}/assets/icon/video_active.png" alt="">
                        @else
                        <img src="{{ asset('web') }}/assets/icon/video.png" alt="">
                        @endif
                        <span style="font-size: 14px">Buku Video</span>
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
                            <div class="input-search">
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
        <div class="row row-cols-2 row-cols-md-5 filter-theme nav nav-pills"
        style="padding-left: 10%; padding-right:10%">
        <div class="col nav-item nav-pills-semua"><a class="nav-link active fs-m-12px" data-semua="0"
            data-bs-toggle="pill" href="#semua">Semua
        Tema</a></div>
        @foreach ($themes as $theme)
        <div class="col nav-item nav-pills{{ $theme->id }}"><a class="nav-link fs-m-11px px-0"
            href="" data-bs-toggle="pill"
            data-id="{{ $theme->id }}">{{ $theme->name }}</a></div>
            @endforeach
        </div>
        <div class="row loading d-none">
            <div class="d-flex justify-content-center"><img class="w-25"
                src="{{ asset('web/assets/loading.gif') }}" alt=""></div>
            </div>
            <div class="row" id="book_type">
            </div>
            <div class="d-flex justify-content-center pagination-container light-theme simple-pagination">
                <ul id="pagination">
<!--                     <li class="disabled">
                        <span class="current prev">g</span>
                    </li>
                    <li class="active">
                        <span class="current">1</span>
                    </li>
                    <li>
                        <a href="?page=1"  class="page-link">2</a>
                    </li>
                    <li>
                        <a href="?page=2"  class="page-link next">g</a>
                    </li> -->
                </ul>
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
                        <a href="{{ url('book/') }}/{{ $book_read->id }}">
                            <img class="img-fluid" src="{{ $book_read->cover }}" alt="">
                        </a>
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
            get();
            button_pagination();

            function button_pagination()
            {                
                $("#pagination a").on('click',function(event){
                    // alert('asdf')
                $("#book_type").addClass('d-none');
                    event.preventDefault();
                    var newUrl = $(this).attr("href");
                    history.pushState(null, null, newUrl);
                    var jenjang = $("[name=jenjang]").val();
                    var tema = $("[name=tema]").val();
                    var bahasa = $("[name=bahasa]").val();
                    var search = $("#search").val();
                    search_function();
                    pagination(token,jenjang,tema,bahasa,search);
                })
            }

            function search_function()
            {
                $(".loading").removeClass('d-none');
                $(".loading").addClass('d-flex');
                $("#book_type").addClass('d-none');
                var jenjang = $("[name=jenjang]").val();
                var tema = $("[name=tema]").val();
                var bahasa = $("[name=bahasa]").val();
                var search = $("#search").val();
                pagination(token,jenjang,tema,bahasa,search);
                $.ajax({
                    type: 'POST',
                    url: window.location.href,
                    data: {
                        _method: "POST",
                        _token: token,
                        jenjang: jenjang,
                        tema: tema,
                        bahasa: bahasa,
                        search: search
                    },
                    success: function(hasil) {
                        $(".loading").removeClass('d-flex');
                        $(".loading").addClass('d-none');
                        $("#book_type").removeClass('d-none');
                        $("#book_type").html(hasil);
                    }
                });
            }

            function pagination(token,jenjang,tema,bahasa,search)
            {
                $.ajax({
                    type: 'POST',
                    url: window.location.href,
                    data: {
                        _method: "PATCH",
                        _token: token,
                        jenjang: jenjang,
                        tema: tema,
                        bahasa: bahasa,
                        search: search
                    },
                    success: function(hasil) {
                        if(hasil.current_page>hasil.last_page){
                            var url = '?page=1';
                            console.log('asdf',url)
                            history.pushState({}, '', url);

                            var event = new Event('popstate');
                            window.dispatchEvent(event);
                            search_function(token,jenjang,tema,bahasa,search);
                        }
                        $("#pagination").html('');
                        for (var i = hasil.links.length-1; i >= 0; i--) {
                            if(i==0){
                                if(hasil.links[i].url==null){
                                    $("#pagination").prepend(`<li class="disabled">
                                        <span class="current prev">g</span>
                                        </li>`) 
                                } else {
                                   $("#pagination").prepend(`<li>
                                    <a href="`+hasil.links[i].url+`"  class="page-link prev">g</a>
                                    </li>`) 
                               }
                           }
                           if(i!==0 && i!== hasil.links.length-1){
                            if(hasil.links[i].active==true){
                               $("#pagination").prepend(`<li class="active"><span class="current">`+hasil.links[i].label+`</span></li>`)
                           } else {
                            if(hasil.links[i].url!==null){
                                $("#pagination").prepend(`<li>
                                    <a href="`+hasil.links[i].url+`"  class="page-link">`+hasil.links[i].label+`</a>
                                    </li>`)
                            } else {
                             $("#pagination").prepend(`<li>
                                <a href=""  class="page-link">`+hasil.links[i].label+`</a>
                                </li>`)
                         }
                     }
                 }

                 if(i==hasil.links.length-1){
                   if(hasil.links[i].url==null){
                    $("#pagination").prepend(`<li class="disabled">
                        <span class="current next">g</span>
                        </li>`) 
                } else {
                   $("#pagination").prepend(`<li>
                    <a href="`+hasil.links[i].url+`"  class="page-link next">g</a>
                    </li>`) 
               }
           }
       }
       $("#book_type").removeClass('d-flex');
       button_pagination();
   }
})
            }


            function get()
            {
                $("#book_type").addClass('d-none');
                $(".loading").removeClass('d-none');
                $(".loading").addClass('d-flex');
                pagination(token,null,null,null,null);
                $.ajax({
                    type: 'POST',
                    url: window.location.href,
                    data: {
                        _method: "POST",
                        _token: token,
                    },
                    success: function(hasil) {
                        $(".loading").removeClass('d-flex');
                        $(".loading").addClass('d-none');
                        $("#book_type").removeClass('d-none');
                        $("#book_type").html(hasil);
                        $("#search-button").on('click', function() {
                            search_function();
                        })
                        var filter_theme = $(".filter-theme .nav-item a");

                        for (let i = 0; i < filter_theme.length; i++) {
                            $(filter_theme[i]).on('click', function() {
                                $(".loading").removeClass('d-none');
                                $(".loading").addClass('d-flex');
                                $("#book_type").addClass('d-none');
                                var tema = $(this).data('id');
                                pagination(token,null,tema,null,null)
                                $.ajax({
                                    type: 'POST',
                                    url: window.location.href,
                                    data: {
                                        _method: "POST",
                                        _token: token,
                                        tema: tema,
                                    },
                                    success: function(hasil) {
                                        $(".loading").removeClass('d-flex');
                                        $(".loading").addClass('d-none');
                                        $("#book_type").removeClass('d-none');
                                        $("#book_type").html(hasil);
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
                    }
                });
            }
        });
    </script>
    @endsection
