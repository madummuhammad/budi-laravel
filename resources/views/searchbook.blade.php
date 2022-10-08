@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
<div id="hero">
    <img class="w-100" src="{{ url('web') }}/assets/img/cari_bukuku.png" alt="">
    <h2 class="ms-4 ff-kidzone tagline text-white">Cari Bukuku</h2>
</div>
<img src="" alt="">
<div class="container">
    <!-- Tab panes -->
    <div class="tab-content mt-3">
        <div class="tab-pane container active" id="buku_bacaan">
            <div class="d-flex justify-content-center">
                <div class="home-tab bg-young-blue">
                    <h4 class="text-center text-white mb-3"><img src="assets/icon/book_2.svg" alt="">
                        Temukan
                        Buku
                    sesuai minat dan kebutuhanmu</h4>
                    <div class="home-tab-body w-100" id="home-tab-body">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <p class="text-white d-block d-sm-none text-center mx-auto dropdown-toggle fs-12px"
                                onclick="this.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');">
                                Pilih
                            Jenjang, Tema, Bahasa, dan Format</p>
                            <div class="d-none d-sm-block col-12 col-md-2 my-1">
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
                                        data-value="0207580f-6a98-477b-a19f-35bfc0f938e9">SD</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                        data-value="2070db95-9133-4aa1-9f3f-f711f10df750">SMP</a></li>
                                        <li><a class="dropdown-item"
                                            data-value="555c961c-fb2a-4a25-8829-4a12c7d2afc0">SMA</a></li>
                                            <li><a class="dropdown-item"
                                                data-value="a26a4afd-7226-434c-83f3-9ca3ce4af523">UMUM</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-none d-sm-block col-12 col-md-2 my-1">
                                        <div class="dropdown w-100" id="tema">
                                            <button
                                            class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle orange dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                            data-value="">
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
                                    <div class="d-none d-sm-block col-12 col-md-2 my-1">
                                        <div class="dropdown w-100" id="bahasa">
                                            <button
                                            class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle dropdown-toggle green"
                                            type="button" data-bs-toggle="dropdown" aria-expanded="true"
                                            data-value="">
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
                                        <div class="d-none d-sm-block col-12 col-md-2 my-1">
                                            <div class="dropdown w-100" id="format">
                                                <button
                                                class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle dropdown-toggle blue"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="true"
                                                data-value="">
                                                <p>Format</p>
                                            </button>
                                            <input type="text" name="format" value="" hidden>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-danger" data-value="">Format</a></li>
                                                <li><a class="dropdown-item"
                                                    data-value="2fd97285-08d0-4d81-83f2-582f0e8b0f36">Buku
                                                Bacaan</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                data-value="31ba455c-c9c7-4a3c-a2b1-62915546eaba">Buku
                                            Komik</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                            data-value="9e30a937-0d60-49ad-9775-c19b97cfe864">Buku
                                        Audio</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                        data-value="bfe3060d-5f2e-4a1b-9615-40a9f936c6cc">Buku
                                    Video</a>
                                </li>
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
    <!-- asdfasdf -->
    <div class="row">
        <h2 class="fw-bold">Hasil Pencarian :</h2>
        <div class="d-block d-md-flex">
            <div class="ms-2 fs-5">Jenjang: <span class="fw-bold fs-5">
                @if ($s_levels !== null)
                {{ $s_levels->name }}
                @else
                Semua,
                @endif
            </span></div>
            <div class="ms-2 fs-5">Tema: <span class="fw-bold fs-5">
                @if ($s_themes !== null)
                {{ $s_themes->name }}
                @else
                Semua,
                @endif
            </span></div>
            <div class="ms-2 fs-5">Bahasa: <span class="fw-bold fs-5">
                @if ($s_languages !== null)
                {{ $s_languages->name }}
                @else
                Semua,
                @endif
            </span></div>
            <div class="ms-2 fs-5">Format: <span class="fw-bold fs-5">
                @if ($s_format !== null)
                {{ $s_format->name }}
                @else
                Semua,
                @endif
            </span></div>
        </div>
    </div>
    @foreach ($format as $format)
    <div class="d-flex justify-content-between">
        <h5 class="mt-5 mb-3">{{ $format->name }}</h5>
        {{-- <h5 class="mt-5 mb-3">( 10 /50 )</h5> --}}
    </div>
    <div class="row row-cols-2 row-cols-md-5 paginate-search{{ $loop->index }}">
        @foreach ($books->with('mylibraries')->get() as $book)
        @if ($book->book_type == $format->id)
        <div class="col mb-4 item-paginate">
            <div class="card p-2">
                <a href="{{ url('book/') }}/{{ $book->id }}">
                    <img src="{{ $book->cover }}" alt="" class="img-fluid">
                </a>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <span>
                            @if (auth()->guard('visitor')->check() == true)
                            @if ($liked_number->where('book_id', $book->id)->where(
                            'visitor_id',
                            auth()->guard('visitor')->user()->id)->count() == 1)
                            <span class="liked active" style="cursor: pointer"
                            data-book_id="{{ $book->id }}">
                            <i class="fa-solid fa-heart text-danger"></i>
                        </span>{{ $liked_number->where('book_id', $book->id)->count() }}
                        @else
                        <span class="liked" style="cursor: pointer"
                        data-book_id="{{ $book->id }}">
                        <i class="fa-regular fa-heart"></i>
                    </span>{{ $liked_number->where('book_id', $book->id)->count() }}
                    @endif
                    @else
                    <a data-bs-toggle="modal" class="text-dark text-decoration-none"
                    href="#menyukai"><i class="fa-regular fa-heart"></i>
                    {{ $liked_number->where('book_id', $book->id)->count() }}</a>
                    @endif
                </span>
                <span class="ms-1"><img class="pb-1"
                    src="{{ asset('web') }}/assets/icon/little-book.svg"
                    alt="">
                    {{ $read_number->where('book_id', $book->id)->count() }} </span>
                </div>
                <style>
                    .dropdown-item {
                        cursor: pointer;
                    }
                </style>
                <div class="dropdown dropstart">
                    <a href="" data-bs-toggle="dropdown"><i
                        class="bi bi-three-dots-vertical"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                @if (auth()->guard('visitor')->check() == true)
                                @php
                                $visitor_id = auth()
                                ->guard('visitor')
                                ->user()->id;
                                @endphp
                                <a class="dropdown-item saved @foreach ($book->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                    @if ($mylibrary->saved == 1)
                                    on
                                    @endif @endforeach"
                                    data-bookid="{{ $book->id }}">
                                    @if ($book->mylibraries->where('book_id', $book->id)->where('saved', 1)->where(
                                    'visitor_id',
                                    auth()->guard('visitor')->user()->id)->count() == 1)
                                    <i class="fa-solid fa-bookmark"></i>
                                    Disimpan
                                    @else
                                    <i class="fa-regular fa-bookmark"></i>
                                    Baca Nanti
                                    @endif
                                </a>
                                @else
                                <a href="#menyimpan" data-bs-toggle="modal"
                                class="dropdown-item">
                                <i class="fa-regular fa-bookmark"></i>
                                Baca Nanti
                            </a>
                            @endif
                        </li>
                        <li>
                            <form action="{{ url('download') }}" method="post">
                                @csrf
                                <input type="text" name="file"
                                value="{{ $book->content }}" style="display: none">
                                <input type="text" name="name"
                                value="{{ $book->name }}" style="display: none">
                                <input type="text" name="book_type"
                                value="{{ $book->book_type }}" style="display: none">
                                @method('POST')
                                @if (auth()->guard('visitor')->check() == true)
                                <button type="submit" data-book_id="{{ $book->id }}"
                                    class="dropdown-item download" href="#"><i
                                    class="bi bi-download fs-6"></i>
                                Unduh</button>
                                @else
                                <button data-bs-toggle="modal" data-bs-target="#mengunduh"
                                data-book_id="{{ $book->id }}"
                                class="dropdown-item download" href="#"><i
                                class="bi bi-download fs-6"></i>
                            Unduh</button>
                            @endif
                        </form>
                    </li>
                    <li><a data-book_id="{{ $book->id }}" class="dropdown-item share"
                        href="whatsapp://send?text={{ url('book/') }}/{{ $book->id }}"><i
                        class="fa-solid
                        fa-share-nodes"></i>
                    Share</a></li>
                </ul>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="card-title fw-bold"
            style="white-space:nowrap; overflow:hidden; text-overflow: ellipsis; width:100%">
            {{ $book->name }}
        </div>
        @foreach ($book->authors as $author)
        <p class="card-text m-0">Penulis: {{ $author->name }}</p>
        @endforeach
        @foreach ($book->themes as $theme)
        <p class="card-text">Tema: {{ $theme->name }}</p>
        @endforeach

    </div>
</div>
<div class="card-body p-1">

</div>
</div>
@endif
@endforeach
</div>
<div class="d-flex justify-content-center pagination-container{{ $loop->index }}">
</div>
@endforeach
</div>
</div>
</div>
<script src="{{ asset('web') }}/assets/js/jquery.js"></script>
<script src="{{ asset('web') }}/assets/js/jquery.simplePagination.js"></script>
<script>
    var token = $("input[name=_token]").val();

    var perPage = 20;
    @foreach ($format as $value)
    var items{{ $loop->index }} = $(".paginate-search{{ $loop->index }} .item-paginate");
    var numItems{{ $loop->index }} = items{{ $loop->index }}.length;

    items{{ $loop->index }}.slice(perPage).hide();

    $('.pagination-container{{ $loop->index }}').pagination({
        items: numItems{{ $loop->index }},
        itemsOnPage: perPage,
        prevText: "g",
        nextText: "g",
        onPageClick: function(pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items{{ $loop->index }}.hide().slice(showFrom, showTo).show();
        }
    });
    @endforeach

    $("#search-button").on('click', function() {
        var jenjang = $("[name=jenjang]").val();
        var tema = $("[name=tema]").val();
        var bahasa = $("[name=bahasa]").val();
        var format = $("[name=format]").val();
        var search = $("#search").val();
        window.location.href =
        "{{ url('search?') }}level=" + jenjang + "&theme=" + tema +
        "&language=" + bahasa + "&format=" + format + "&keyword=" + search
    });
</script>
<script>
    $(document).ready(function() {
        var saved = $(".saved");
        @if (auth()->guard('visitor')->check() == true)
        var visitor_id = "{{ auth()->guard('visitor')->user()->id }}";
        @else
        var visitor_id = null;
        @endif
        var token = $("input[name=_token]").val();
        for (let i = 0; i < saved.length; i++) {
            $(saved[i]).on('click', function() {
                var book_id = $(this).data('bookid');
                if ($(this).hasClass('on') == false) {
                    $(this).addClass('on');
                    $(this).html(' <i class="fa-solid fa-bookmark"></i> Disimpan')
                    var status = "unsaved";
                } else {
                    $(this).removeClass('on');
                    var status = "saved";
                    $(this).html(' <i class="fa-regular fa-bookmark"></i> Baca Nanti')
                }
                $.ajax({
                    type: 'POST',
                    url: "{{ url('saved') }}",
                    data: {
                        _method: "POST",
                        status: status,
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {
                        console.log(hasil);
                    }
                });
            })
        }
        var download = $('.download')
        for (let i = 0; i < download.length; i++) {
            $(download[i]).on('click', function() {
                var book_id = $(this).data('book_id');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('downloaded') }}",
                    data: {
                        _method: "POST",
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {}
                });
            });
        }

        var share = $('.share')
        for (let i = 0; i < share.length; i++) {
            $(share[i]).on('click', function() {
                var book_id = $(this).data('book_id');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('share') }}",
                    data: {
                        _method: "POST",
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {}
                });
            });
        }

        var likeds = $('.liked')

        for (let i = 0; i < likeds.length; i++) {
            $(likeds[i]).on('click', function() {
                var book_id = $(this).data('book_id');
                if ($(this).hasClass('active') == false) {
                    $(this).addClass('active');
                    $(this).html(' <i class="fa-solid fa-heart text-danger"></i>')
                    var status = "unliked";
                } else {
                    $(this).removeClass('active');
                    $(this).html('<i class="fa-regular fa-heart"></i>')
                    var status = "liked";
                }
                $.ajax({
                    type: 'POST',
                    url: "{{ url('liked') }}",
                    data: {
                        _method: "POST",
                        status: status,
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {}
                });

            });
        }
    })
</script>
@endsection
