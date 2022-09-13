@extends('main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ $book_types->banner }}" alt="">
        <h2 class="ff-kidzone tagline text-white">{{ $book_types->tagline }}</h2>
    </div>
    <img src="" alt="">
    <div class="container">
        <div class="row tab-book-2 mt-3">
            <div class="d-flex justify-content-center">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active d-flex flex-column align-items-center"
                            href="{{ url('book_type/2fd97285-08d0-4d81-83f2-582f0e8b0f36') }}">
                            <img src="{{ asset('web') }}/assets/icon/book_active.svg" alt="">
                            <span class="fw-bold text-blue">Buku Bacaan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex flex-column align-items-center"
                            href="{{ url('book_type/31ba455c-c9c7-4a3c-a2b1-62915546eaba') }}">
                            <img src="{{ asset('web') }}/assets/icon/komik.svg" alt="">
                            <span>Buku Komik</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex flex-column align-items-center"
                            href="{{ url('book_type/9e30a937-0d60-49ad-9775-c19b97cfe864') }}">
                            <img src="{{ asset('web') }}/assets/icon/audio.svg" alt="">
                            <span>Buku Audio</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex flex-column align-items-center"
                            href="{{ url('book_type/bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') }}">
                            <img src="{{ asset('web') }}/assets/icon/video.svg" alt="">
                            <span>Buku Video</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <div class="d-flex justify-content-center">
                    <div class="home-tab" style="background-color: {{ $book_types->color }}">
                        <div class="home-tab-body">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle green"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <p>Jenjang</p>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">SD (123)</a></li>
                                    <li><a class="dropdown-item" href="#">SD (456)</a></li>
                                    <li><a class="dropdown-item" href="#">SMP</a></li>
                                    <li><a class="dropdown-item" href="#">SMA</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle orange dropdown-toggle"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <p>Tema</p>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Kuliner</a></li>
                                    <li><a class="dropdown-item" href="#">Petualangan</a></li>
                                    <li><a class="dropdown-item" href="#">Seni & Budaya</a></li>
                                    <li><a class="dropdown-item" href="#">Tokoh Indonesia</a></li>
                                    <li><a class="dropdown-item" href="#">Alam & Lingkungan</a></li>
                                    <li><a class="dropdown-item" href="#">Anak Indonesia</a></li>
                                    <li><a class="dropdown-item" href="#">Arsitektur</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle dropdown-toggle green"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                    <p>Bahasa</p>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Indonesia</a></li>
                                    <li><a class="dropdown-item" href="#">Inggris</a></li>
                                    <li><a class="dropdown-item" href="#">Daerah</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button
                                    class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle dropdown-toggle blue"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="true">
                                    <p>Format</p>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Buku Bacaan</a></li>
                                    <li><a class="dropdown-item" href="#">Buku Komik</a></li>
                                    <li><a class="dropdown-item" href="#">Buku Audio</a></li>
                                    <li><a class="dropdown-item" href="#">Buku Video</a></li>
                                </ul>
                            </div>
                            <div class="input-search">
                                <input type="text" class="form-control" placeholder="Cari">
                                <button class="btn"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-5 filter-theme">
                    <div class="col"><a class="active" href="">Semua Tema</a></div>
                    <div class="col"><a href="">Kuliner</a></div>
                    <div class="col"><a href="">Petualangan</a></div>
                    <div class="col"><a href="">Seni dan Budaya</a></div>
                    <div class="col"><a href="">Tokoh Indonesia</a></div>
                    <div class="col"><a href="">Alam dan Lingkungan</a></div>
                    <div class="col"><a href="">Anak Indonesia</a></div>
                    <div class="col"><a href="">Arsitektur</a></div>
                    <div class="col"><a href="">Bahasa</a></div>
                    <div class="col"><a href="">Cerita Rakyat</a></div>
                    <div class="col"><a href="">Ekonomi Kreatif</a></div>
                    <div class="col"><a href="">Hewan dan Tumbuhan</a></div>
                    <div class="col"><a href="">Kebencanaan</a></div>
                    <div class="col"><a href="">Keberagaman</a></div>
                    <div class="col"><a href="">Kesehatan</a></div>
                    <div class="col"><a href="">Transportasi</a></div>
                </div>
                <!-- asdfasdf -->
                <h3 class="mt-5 mb-3 fw-bold">Hasil Pencarian Buku Bacaan</h3>
                <div class="row row-cols-5 card-pagination">
                    @foreach ($books as $book)
                        <div class="col mb-4">
                            <div class="card p-2">
                                <a href="{{ url('/book') }}/{{ $book->id }}"
                                    class="text-decoration-none text-dark">
                                    <div class="img-container-for-icon">
                                        <img src="{{ $book->cover }}" alt="" class="img-fluid">
                                        @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                            <div class="icon">
                                                <img src="{{ asset('web') }}/assets/icon/mic.svg" alt="">
                                            </div>
                                        @endif
                                        @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                            <div class="icon">
                                                <img src="{{ asset('web') }}/assets/icon/play.svg" alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt="">
                                                100</span>
                                            <span><img src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                    alt="">
                                                100</span>
                                        </div>
                                        <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                    </div>
                                </a>
                                <div class="card-body p-1">
                                    <div class="card-title fw-bold">
                                        {{ $book->name }}
                                    </div>
                                    @foreach ($book->authors as $author)
                                        <p class="card-text">Author: {{ $author->name }}</p>
                                    @endforeach
                                    @foreach ($book->themes as $theme)
                                        <p class="card-text">Tema: {{ $theme->name }}</p>
                                    @endforeach

                                </div>
                            </div>
                            <div class="card-body p-1">

                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="row row-cols-5 card-pagination">
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/1.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Ada Apa dengan Gugu
                                </div>
                                <p class="card-text">Author: Nindia Maya</p>
                                <p class="card-text">Tema: Cerita Raykat</p>
                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/2.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Aku Bisa!
                                </div>
                                <p class="card-text">Author: Kayla Mubara</p>
                                <p class="card-text">Tema: Anak Indonesia</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/3.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Ayo, Mengenal Negara ASEAN
                                </div>
                                <p class="card-text">Author: Olany Agus Widiyani</p>
                                <p class="card-text">Tema: Anak Indonesia</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/4.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Baju Kesayangan Ayu
                                </div>
                                <p class="card-text">Author: Rindhani Pangestuti</p>
                                <p class="card-text">Tema: Anak Indonesia</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/5.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Banyu dan Manu
                                </div>
                                <p class="card-text">Author: Widjati Hartiningtyas</p>
                                <p class="card-text">Tema: Anak Indonesia</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/6.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Bintang Penunjuk Arah
                                </div>
                                <p class="card-text">Author: Muhanmmad Randhy Akbar</p>
                                <p class="card-text">Tema: Alam dan Lingkungan</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/7.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Festival Cap Go Meh di Kota Seribu Kelenteng
                                </div>
                                <p class="card-text">Author: Dewi Cholidatul</p>
                                <p class="card-text">Tema: Anak Indonesia</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/8.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Jaka dan Naga Sakti
                                </div>
                                <p class="card-text">Author: Dina Alfiyanti Fasa</p>
                                <p class="card-text">Tema: Cerita Rakyat</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/9.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Ketika Yanti Pindah Ke Yogya
                                </div>
                                <p class="card-text">Author: Novel Meilanie</p>
                                <p class="card-text">Tema: Anak Indonesia</p>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/10.jpg" alt=""
                                class="img-fluid">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex">
                                    <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                    <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                        100</span>
                                </div>
                                <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                            </div>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Kue Lapis Harimau
                                </div>
                                <p class="card-text">Author: Salma Intifada</p>
                                <p class="card-text">Tema: Anak Indonesia</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation" id="pagin" class="d-flex">
                        <span class="page-item prev"><button class="page-link" href=""><img
                                    src="{{ asset('web') }}/assets/icon/prev-2.svg" alt=""></button></span>
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                        </ul>
                        <span class="page-item next"><button class="page-link" href=""><img
                                    src="{{ asset('web') }}/assets/icon/next-2.svg"
                                    alt=""></button></button></span>
                    </nav>
                </div>
            </div>
            <div class="tab-pane container fade" id="sd">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="smp">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="sma">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="umum">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid"></div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="section-5" style="margin-top:80px">
        <h2 class="text-center mb-4 fw-bold">Paling Banyak Dibaca</h2>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme px-5" id="owl-carousel-2">
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/smp/3.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/lanjutkan_yuk/3.png"
                                alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/paling_dibaca/3.png"
                                alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/sma/1.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/smp/3.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/lanjutkan_yuk/3.png"
                                alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/paling_dibaca/3.png"
                                alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/sma/1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="section-2" class="" style="margin-top:80px">
        <div class="container">
            <div class="header d-flex justify-content-between" style="padding-right: 35px;">
                <h2 class="fw-bold fs-3">Lanjutkan yuk, Febri</h2>
                <a href="pustakaku.html">Lihat Semua</a>
            </div>
            <div class="row row-cols-5 mt-4">
                <div class="col">
                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/lanjutkan_yuk/1.png" alt="">
                    <div class="icon">
                        <img src="{{ asset('web') }}/assets/icon/play.svg" alt="">
                    </div>
                </div>
                <div class="col">
                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/lanjutkan_yuk/2.png" alt="">
                    <div class="icon">
                        <img src="{{ asset('web') }}/assets/icon/mic.svg" alt="">
                    </div>
                </div>
                <div class="col">
                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/lanjutkan_yuk/3.png" alt="">
                    <div class="icon">
                        <img src="{{ asset('web') }}/assets/icon/mic.svg" alt="">
                    </div>
                </div>
                <div class="col">
                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/lanjutkan_yuk/4.png" alt="">
                </div>
                <div class="col">
                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/lanjutkan_yuk/5.png" alt="">
                </div>
            </div>
        </div>

    </section>
    <div class="container-fluid pb-5">
        <div class="row pt-3 px-5">
            <img class="img-fluid" src="{{ asset('web') }}/assets/icon/board.svg" alt="">
        </div>
    </div>
@endsection
