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
                        <a href="#next"
                            class="text-blue text-decoration-none fs-5 nav-link @if ($filter == 1) active @endif mylibrary"
                            data-bs-toggle="pill"><i class="bi bi-book"></i>
                            Lanjutkan
                            Membaca</a>
                    </div>
                    <div class="col-6 col-md-2 nav-item text-center">
                        <a href="#liked"
                            class="text-decoration-none fs-5 text-dark nav-link mylibrary @if ($filter == 2) active @endif"
                            data-bs-toggle="pill"><i class="bi bi-heart"></i></i>
                            Disukai</a>
                    </div>
                    <div class="col-6 col-md-2 nav-item text-center">
                        <a href="#saved"
                            class="text-decoration-none fs-5 text-dark nav-link mylibrary @if ($filter == 3) active @endif"
                            data-bs-toggle="pill"><i class="bi bi-book"></i>
                            Disimpan</a>
                    </div>
                    <div class="col-6 col-md-2 nav-item text-center">
                        <a href="#done"
                            class="text-decoration-none fs-5 text-dark nav-link mylibrary @if ($filter == 4) active @endif"
                            data-bs-toggle="pill"><i class="bi bi-book"></i>
                            Selesai</a>
                    </div>
                </div>
                <div class="tab-content mt-3">
                </div>
                <div class="tab-content mt-3">
                    {{-- Lanjutkan Yuk --}}
                    <div class="tab-pane container @if ($filter == 1) active @endif" id="next">
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4 d-block">
                            <h3 class="mb-3 text-center text-md-start">Buku Bacaan</h3>
                            <div class="d-flex justify-content-center pagination-container-1">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5">
                            @foreach ($nexts as $saved)
                                @if ($saved->books->book_type == '2fd97285-08d0-4d81-83f2-582f0e8b0f36')
                                    <div class="col mb-4 item-paginate-1">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid w-100">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
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
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download" href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Komik</h3>
                            <div class="d-flex justify-content-center pagination-container-2">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($nexts as $saved)
                                @if ($saved->books->book_type == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                    <div class="col mb-4 item-pagination-2">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Audio</h3>
                            <div class="d-flex justify-content-center pagination-container-3">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($nexts as $saved)
                                @if ($saved->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="col mb-4 item-pagination-3">
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
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Video</h3>
                            <div class="d-flex justify-content-center item-pagination-4">
                            </div>
                        </div>
                        <div class="row row-cols-5 card-pagintion next-paginate next-paginate">
                            @foreach ($nexts as $saved)
                                @if ($saved->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="col mb-4 item-pagination-4">
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
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                    {{-- Disukai --}}
                    <div class="tab-pane container @if ($filter == 2) active @endif" id="liked">
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Bacaan</h3>
                            <div class="d-flex justify-content-center pagination-container-5">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($likeds as $saved)
                                @if ($saved->books->book_type == '2fd97285-08d0-4d81-83f2-582f0e8b0f36')
                                    <div class="col mb-4 item-pagination-5">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Komik</h3>
                            <div class="d-flex justify-content-center pagination-container-6">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($likeds as $saved)
                                @if ($saved->books->book_type == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                    <div class="col mb-4 item-pagination-6">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Audio</h3>
                            <div class="d-flex justify-content-center pagination-container-7">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($likeds as $saved)
                                @if ($saved->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="col mb-4 item-pagination-7">
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
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Video</h3>
                            <div class="d-flex justify-content-center pagination-container-8">
                            </div>
                        </div>
                        <div class="row row-cols-5 card-pagintion next-paginate next-paginate">
                            @foreach ($likeds as $saved)
                                @if ($saved->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="col mb-4 item-pagination-8">
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
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                    {{-- Disimpan --}}
                    <div class="tab-pane container @if ($filter == 3) active @endif" id="saved">
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Bacaan</h3>
                            <div class="d-flex justify-content-center pagination-container-9">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($saveds as $saved)
                                @if ($saved->books->book_type == '2fd97285-08d0-4d81-83f2-582f0e8b0f36')
                                    <div class="col mb-4 item-pagination-9">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Komik</h3>
                            <div class="d-flex justify-content-center pagination-container-10">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($saveds as $saved)
                                @if ($saved->books->book_type == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                    <div class="col mb-4 item-pagination-10">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Audio</h3>
                            <div class="d-flex justify-content-center pagination-container-11">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($saveds as $saved)
                                @if ($saved->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="col mb-4 item-pagination-11">
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
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Video</h3>
                            <div class="d-flex justify-content-center pagination-container-12">
                            </div>
                        </div>
                        <div class="row row-cols-5 card-pagintion next-paginate">
                            @foreach ($saveds as $saved)
                                @if ($saved->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="col mb-4 item-pagination-12">
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
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                    {{-- Selesai --}}
                    <div class="tab-pane container @if ($filter == 4) active @endif" id="done">
                        <div class="d-md-flex d-block align-items-center justify-content-between mt-4">
                            <h3 class="mb-3 text-center text-md-start">Buku Bacaan</h3>
                            <div class="d-flex justify-content-center pagination-container-13">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($done as $saved)
                                @if ($saved->books->book_type == '2fd97285-08d0-4d81-83f2-582f0e8b0f36')
                                    <div class="col mb-4 item-paginate-13">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Komik</h3>
                            <div class="d-flex justify-content-center pagination-container-14">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($done as $saved)
                                @if ($saved->books->book_type == '31ba455c-c9c7-4a3c-a2b1-62915546eaba')
                                    <div class="col mb-4 item-paginate-14">
                                        <div class="card p-2">
                                            <a href="{{ url('book') }}/{{ $saved->books->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $saved->books->cover }}" class="w-100" alt=""
                                                    class="img-fluid">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Audio</h3>
                            <div class="d-flex justify-content-center pagination-container-15">
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-5 card-paginaton next-paginate">
                            @foreach ($done as $saved)
                                @if ($saved->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="col mb-4 item-paginate-15">
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
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
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
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                            <h3 class="mb-3 text-center text-md-start">Buku Video</h3>
                            <div class="d-flex justify-content-center pagination-container-16">
                            </div>
                        </div>
                        <div class="row row-cols-5 card-pagintion next-paginate">
                            @foreach ($done as $saved)
                                @if ($saved->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="col mb-4 item-paginate-16">
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
                                                        @if ($liked_number->where('book_id', $saved->books->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $saved->books->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $saved->books->id)->count() }}
                                                        @endif
                                                        <span class="ms-2"><img style="padding-bottom: 5px"
                                                                src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            {{ $read_number->where('book_id', $saved->books->id)->count() }}
                                                        </span>
                                                    </div>
                                                    <div class="dropdown dropstart">
                                                        <a href="" data-bs-toggle="dropdown"><i
                                                                class="bi bi-three-dots-vertical"></i></a>
                                                        <ul class="dropdown-menu"
                                                            aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if (auth()->guard('visitor')->check() == true)
                                                                    @php
                                                                        $visitor_id = auth()
                                                                            ->guard('visitor')
                                                                            ->user()->id;
                                                                    @endphp
                                                                    <a class="dropdown-item saved @foreach ($saved->books->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                                                    @if ($mylibrary->saved == 1)
                                                                    on
                                                                    @endif @endforeach"
                                                                        data-bookid="{{ $saved->books->id }}">
                                                                        @foreach ($saved->books->mylibraries as $mylibrary)
                                                                            @if ($mylibrary->saved == 1)
                                                                                <i class="fa-solid fa-bookmark"></i>
                                                                                Disimpan
                                                                            @else
                                                                                <i class="fa-regular fa-bookmark"></i>
                                                                                Baca Nanti
                                                                            @endif
                                                                        @endforeach
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('login') }}"
                                                                        class="dropdown-item">
                                                                        <i class="fa-regular fa-bookmark"></i>
                                                                        Baca Nanti
                                                                    </a>
                                                                @endif
                                                            </li>
                                                            <li>
                                                                <form action="{{ url('download') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="text" name="file"
                                                                        value="{{ $saved->books->content }}"
                                                                        style="display: none">
                                                                    <input type="text" name="name"
                                                                        value="{{ $saved->books->name }}"
                                                                        style="display: none">
                                                                    @method('POST')
                                                                    <button type="submit"
                                                                        data-book_id="{{ $saved->books->id }}"
                                                                        class="dropdown-item download"
                                                                        href="#"><i
                                                                            class="fa-solid fa-download"></i>
                                                                        Download</button>
                                                                </form>
                                                            </li>
                                                            <li><a data-book_id="{{ $saved->books->id }}"
                                                                    class="dropdown-item share"
                                                                    href="whatsapp://send?text={{ url('book/') }}/{{ $saved->books->id }}"><i
                                                                        class="fa-solid
                                                                fa-share-nodes"></i>
                                                                    Share</a></li>
                                                        </ul>
                                                    </div>
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
                <script src="{{ asset('web') }}/assets/js/jquery.simplePagination.js"></script>
                <script>
                    var items = $(".item-paginate-1");
                    var numItems = items.length;
                    var perPage = 10;
                    items.slice(perPage).hide();

                    $('.pagination-container-1').pagination({
                        items: numItems,
                        itemsOnPage: perPage,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber) {
                            var showFrom = perPage * (pageNumber - 1);
                            var showTo = showFrom + perPage;
                            items.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items2 = $(".item-pagination-2");
                    var numItems2 = items2.length;
                    var perPage2 = 10;
                    items2.slice(perPage2).hide();

                    $('.pagination-container-2').pagination({
                        items: numItems2,
                        itemsOnPage: perPage2,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber2) {
                            var showFrom = perPage * (pageNumber2 - 1);
                            var showTo = showFrom + perPage2;
                            items2.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items3 = $(".item-pagination-3");
                    var numItems3 = items3.length;
                    var perPage3 = 10;
                    items3.slice(perPage3).hide();

                    $('.pagination-container-3').pagination({
                        items: numItems3,
                        itemsOnPage: perPage3,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber3) {
                            var showFrom = perPage * (pageNumber3 - 1);
                            var showTo = showFrom + perPage3;
                            items3.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items4 = $(".item-pagination-4");
                    var numItems4 = items4.length;
                    var perPage4 = 10;
                    items4.slice(perPage4).hide();

                    $('.pagination-container-4').pagination({
                        items: numItems4,
                        itemsOnPage: perPage4,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber4) {
                            var showFrom = perPage * (pageNumber4 - 1);
                            var showTo = showFrom + perPage4;
                            items4.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items5 = $(".item-pagination-5");
                    var numItems5 = items5.length;
                    var perPage5 = 10;
                    items5.slice(perPage5).hide();

                    $('.pagination-container-5').pagination({
                        items: numItems5,
                        itemsOnPage: perPage5,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber5) {
                            var showFrom = perPage * (pageNumber5 - 1);
                            var showTo = showFrom + perPage5;
                            items5.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items6 = $(".item-pagination-6");
                    var numItems6 = items6.length;
                    var perPage6 = 10;
                    items6.slice(perPage6).hide();

                    $('.pagination-container-6').pagination({
                        items: numItems6,
                        itemsOnPage: perPage6,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber6) {
                            var showFrom = perPage * (pageNumber6 - 1);
                            var showTo = showFrom + perPage6;
                            items6.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items7 = $(".item-pagination-7");
                    var numItems7 = items7.length;
                    var perPage7 = 10;
                    items7.slice(perPage7).hide();

                    $('.pagination-container-7').pagination({
                        items: numItems7,
                        itemsOnPage: perPage7,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber7) {
                            var showFrom = perPage * (pageNumber7 - 1);
                            var showTo = showFrom + perPage7;
                            items7.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items8 = $(".item-pagination-8");
                    var numItems8 = items8.length;
                    var perPage8 = 10;
                    items8.slice(perPage8).hide();

                    $('.pagination-container-8').pagination({
                        items: numItems8,
                        itemsOnPage: perPage8,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber8) {
                            var showFrom = perPage * (pageNumber8 - 1);
                            var showTo = showFrom + perPage8;
                            items8.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items9 = $(".item-pagination-9");
                    var numItems9 = items9.length;
                    var perPage9 = 10;
                    items9.slice(perPage9).hide();

                    $('.pagination-container-9').pagination({
                        items: numItems9,
                        itemsOnPage: perPage9,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber9) {
                            var showFrom = perPage * (pageNumber9 - 1);
                            var showTo = showFrom + perPage9;
                            items9.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items10 = $(".item-pagination-10");
                    var numItems10 = items10.length;
                    var perPage10 = 10;
                    items10.slice(perPage10).hide();

                    $('.pagination-container-10').pagination({
                        items: numItems10,
                        itemsOnPage: perPage10,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber10) {
                            var showFrom = perPage * (pageNumber10 - 1);
                            var showTo = showFrom + perPage10;
                            items10.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items11 = $(".item-pagination-11");
                    var numItems11 = items11.length;
                    var perPage11 = 10;
                    items11.slice(perPage11).hide();

                    $('.pagination-container-11').pagination({
                        items: numItems11,
                        itemsOnPage: perPage11,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber11) {
                            var showFrom = perPage * (pageNumber11 - 1);
                            var showTo = showFrom + perPage11;
                            items11.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items12 = $(".item-pagination-12");
                    var numItems12 = items12.length;
                    var perPage12 = 10;
                    items12.slice(perPage12).hide();

                    $('.pagination-container-12').pagination({
                        items: numItems12,
                        itemsOnPage: perPage12,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber12) {
                            var showFrom = perPage * (pageNumber12 - 1);
                            var showTo = showFrom + perPage12;
                            items12.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items13 = $(".item-pagination-13");
                    var numItems13 = items13.length;
                    var perPage13 = 10;
                    items13.slice(perPage13).hide();

                    $('.pagination-container-13').pagination({
                        items: numItems13,
                        itemsOnPage: perPage13,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber13) {
                            var showFrom = perPage * (pageNumber13 - 1);
                            var showTo = showFrom + perPage13;
                            items13.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items14 = $(".item-pagination-14");
                    var numItems14 = items14.length;
                    var perPage14 = 10;
                    items14.slice(perPage14).hide();

                    $('.pagination-container-14').pagination({
                        items: numItems14,
                        itemsOnPage: perPage14,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber14) {
                            var showFrom = perPage * (pageNumber14 - 1);
                            var showTo = showFrom + perPage14;
                            items14.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items15 = $(".item-pagination-15");
                    var numItems15 = items15.length;
                    var perPage15 = 10;
                    items15.slice(perPage15).hide();

                    $('.pagination-container-15').pagination({
                        items: numItems15,
                        itemsOnPage: perPage15,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber15) {
                            var showFrom = perPage * (pageNumber15 - 1);
                            var showTo = showFrom + perPage15;
                            items15.hide().slice(showFrom, showTo).show();
                        }
                    });

                    var items16 = $(".item-pagination-16");
                    var numItems16 = items16.length;
                    var perPage16 = 10;
                    items16.slice(perPage16).hide();

                    $('.pagination-container-16').pagination({
                        items: numItems16,
                        itemsOnPage: perPage16,
                        prevText: "g",
                        nextText: "g",
                        onPageClick: function(pageNumber16) {
                            var showFrom = perPage * (pageNumber16 - 1);
                            var showTo = showFrom + perPage16;
                            items16.hide().slice(showFrom, showTo).show();
                        }
                    });
                </script>
