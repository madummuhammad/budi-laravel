                <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/jquery.paginate.css">
                <div class="row d-flex justify-content-center nav nav-pills">
                    <style>
                        .nav-item .mylibrary {
                            color: black;
                        }

                        .nav-item .mylibrary.active {
                            color: blue !important;
                            background-color: transparent;
                        }
                    </style>
                    <div class="col-6 col-md-3 nav-item text-center">
                        <a href="#next" class="text-blue text-decoration-none fs-5 nav-link active mylibrary"
                            data-bs-toggle="pill"><i class="bi bi-book"></i>
                            Lanjutkan
                            Membaca</a>
                    </div>
                    <div class="col-6 col-md-2 nav-item text-center">
                        <a href="#liked" class="text-decoration-none fs-5 text-dark nav-link mylibrary"
                            data-bs-toggle="pill"><i class="bi bi-heart"></i></i>
                            Disukai</a>
                    </div>
                    <div class="col-6 col-md-2 nav-item text-center">
                        <a href="#saved" class="text-decoration-none fs-5 text-dark nav-link mylibrary"
                            data-bs-toggle="pill"><i class="bi bi-book"></i>
                            Disimpan</a>
                    </div>
                    <div class="col-6 col-md-2 nav-item text-center">
                        <a href="#done" class="text-decoration-none fs-5 text-dark nav-link mylibrary"
                            data-bs-toggle="pill"><i class="bi bi-book"></i>
                            Selesai</a>
                    </div>
                </div>
                <div class="tab-content mt-3">
                </div>
                <div class="tab-content mt-3">
                    <div class="tab-pane container active" id="next">
                        <div class="d-md-md-flex d-block align-items-center justify-content-between mt-4 d-block">
                            <style>
                                a.page-item.active {
                                    color: white;
                                    background-color: #3C6EFD !important;
                                }
                            </style>
                            <h3 class="mb-3 text-center text-md-start">Buku Bacaan (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-0 d-block"
                                    data-parent="0">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $next_digital; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}" data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg" alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <style>
                            .paginate-pagination {
                                display: none
                            }
                        </style>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($nexts as $saved)
                                @if ($saved->books->book_type == '2fd97285-08d0-4d81-83f2-582f0e8b0f36')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid w-100">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Komik (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-1 d-block"
                                    data-parent="1">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $next_komik; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($nexts as $saved)
                                @if ($saved->books->book_type == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Audio (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-2 d-block"
                                    data-parent="2">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $next_audio; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($nexts as $saved)
                                @if ($saved->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <div class="img-container-for-icon">
                                                    <img src="{{ $saved->books->cover }}" class="w-100"
                                                        alt="" class="img-fluid">
                                                    <div class="icon icon-center">
                                                        <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                                <div class="card-body p-1">
                                                    <div class="card-title fw-bold">
                                                        {{ $saved->books->name }}
                                                    </div>
                                                    @foreach ($saved->books->authors as $author)
                                                        <p class="card-text">Author: {{ $author->name }}</p>
                                                    @endforeach
                                                    @foreach ($saved->books->themes as $theme)
                                                        <p class="card-text">Tema: {{ $theme->name }}</p>
                                                    @endforeach

                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body p-1">

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Video (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-3 d-block"
                                    data-parent="3">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $next_video; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-5 card-pagintion next-paginate next-paginate">
                            @foreach ($nexts as $saved)
                                @if ($saved->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <div class="img-container-for-icon">
                                                    <img src="{{ $saved->books->cover }}" class="w-100"
                                                        alt="" class="img-fluid">
                                                    <div class="icon icon-center">
                                                        <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                    </div>
                    <div class="tab-pane container" id="liked">
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Bacaan (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-4 d-block"
                                    data-parent="4">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $liked_digital; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($likeds as $saved)
                                @if ($saved->books->book_type == '2fd97285-08d0-4d81-83f2-582f0e8b0f36')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Komik (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-5 d-block"
                                    data-parent="5">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $liked_komik; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($likeds as $saved)
                                @if ($saved->books->book_type == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Audio (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-6 d-block"
                                    data-parent="6">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $liked_audio; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($likeds as $saved)
                                @if ($saved->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <div class="img-container-for-icon">
                                                    <img src="{{ $saved->books->cover }}" class="w-100"
                                                        alt="" class="img-fluid">
                                                    <div class="icon icon-center">
                                                        <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                                <div class="card-body p-1">
                                                    <div class="card-title fw-bold">
                                                        {{ $saved->books->name }}
                                                    </div>
                                                    @foreach ($saved->books->authors as $author)
                                                        <p class="card-text">Author: {{ $author->name }}</p>
                                                    @endforeach
                                                    @foreach ($saved->books->themes as $theme)
                                                        <p class="card-text">Tema: {{ $theme->name }}</p>
                                                    @endforeach

                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body p-1">

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Video (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-7 d-block"
                                    data-parent="7">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg"
                                                    alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $liked_video; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-5 card-pagintion next-paginate next-paginate">
                            @foreach ($likeds as $saved)
                                @if ($saved->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <div class="img-container-for-icon">
                                                    <img src="{{ $saved->books->cover }}" class="w-100"
                                                        alt="" class="img-fluid">
                                                    <div class="icon icon-center">
                                                        <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                    </div>
                    <div class="tab-pane container" id="saved">
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Bacaan (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-8 d-block"
                                    data-parent="8">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg"
                                                    alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $saved_digital; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($saveds as $saved)
                                @if ($saved->books->book_type == '2fd97285-08d0-4d81-83f2-582f0e8b0f36')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Komik (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-9 d-block"
                                    data-parent="9">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg"
                                                    alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $saved_komik; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($saveds as $saved)
                                @if ($saved->books->book_type == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Audio (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-10 d-block"
                                    data-parent="10">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg"
                                                    alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $saved_audio; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($saveds as $saved)
                                @if ($saved->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <div class="img-container-for-icon">
                                                    <img src="{{ $saved->books->cover }}" class="w-100"
                                                        alt="" class="img-fluid">
                                                    <div class="icon icon-center">
                                                        <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                                <div class="card-body p-1">
                                                    <div class="card-title fw-bold">
                                                        {{ $saved->books->name }}
                                                    </div>
                                                    @foreach ($saved->books->authors as $author)
                                                        <p class="card-text">Author: {{ $author->name }}</p>
                                                    @endforeach
                                                    @foreach ($saved->books->themes as $theme)
                                                        <p class="card-text">Tema: {{ $theme->name }}</p>
                                                    @endforeach

                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body p-1">

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Video (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-11 d-block"
                                    data-parent="11">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg"
                                                    alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $saved_video; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-5 card-pagintion next-paginate">
                            @foreach ($saveds as $saved)
                                @if ($saved->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <div class="img-container-for-icon">
                                                    <img src="{{ $saved->books->cover }}" class="w-100"
                                                        alt="" class="img-fluid">
                                                    <div class="icon icon-center">
                                                        <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                    </div>
                    <div class="tab-pane container" id="done">
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Bacaan (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-12 d-block"
                                    data-parent="12">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg"
                                                    alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $done_digital; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($done as $saved)
                                @if ($saved->books->book_type == '2fd97285-08d0-4d81-83f2-582f0e8b0f36')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Komik (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-13 d-block"
                                    data-parent="13">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg"
                                                    alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $done_komik; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($done as $saved)
                                @if ($saved->books->book_type == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Audio (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-14 d-block"
                                    data-parent="14">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg"
                                                    alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $done_audio; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($done as $saved)
                                @if ($saved->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <div class="img-container-for-icon">
                                                    <img src="{{ $saved->books->cover }}" class="w-100"
                                                        alt="" class="img-fluid">
                                                    <div class="icon icon-center">
                                                        <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                                <div class="card-body p-1">
                                                    <div class="card-title fw-bold">
                                                        {{ $saved->books->name }}
                                                    </div>
                                                    @foreach ($saved->books->authors as $author)
                                                        <p class="card-text">Author: {{ $author->name }}</p>
                                                    @endforeach
                                                    @foreach ($saved->books->themes as $theme)
                                                        <p class="card-text">Tema: {{ $theme->name }}</p>
                                                    @endforeach

                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body p-1">

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Video (10/50)</h3>
                            <div class="d-flex justify-content-center">
                                <nav id="pagin" class="paginate-pagination paginate-pagination-15 d-block"
                                    data-parent="15">
                                    <ul class="d-flex">
                                        <li class="page-item prev"><a href="#" data-page="prev"
                                                class="page page-prev deactive prev page-link">
                                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg"
                                                    alt="">
                                            </a>
                                        </li>
                                        @for ($i = 0; $i < $done_video; $i++)
                                            <li><a href="#paginate-{{ $i + 1 }}"
                                                    data-page="{{ $i + 1 }}"
                                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item next"><a href="#" data-page="next"
                                                class="page page-next-link"><img
                                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="row row-cols-5 card-pagintion next-paginate">
                            @foreach ($done as $saved)
                                @if ($saved->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <div class="img-container-for-icon">
                                                    <img src="{{ $saved->books->cover }}" class="w-100"
                                                        alt="" class="img-fluid">
                                                    <div class="icon icon-center">
                                                        <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $saved->books->name }}
                                                </div>
                                                @foreach ($saved->books->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($saved->books->themes as $theme)
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
                    </div>
                </div>
                <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
                <script src="{{ asset('web') }}/assets/js/jquery.paginate.js"></script>
                <script>
                    var token = $("input[name=_token]").val();
                    $(".next-paginate").paginate({
                        perPage: 10,
                        paginatePosition: ['bottom'],
                        useHashLocation: false,
                    });
                </script>
