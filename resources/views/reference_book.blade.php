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
                            <span class="text-blue fw-bold">Referensi Buku</span>
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
                            <span>Referensi Video</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <div class="d-flex justify-content-center">
                    <div class="home-tab" style="background-color: {{ $reference_book_types->color }}">
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
                <h3 class="mt-5 mb-3">Hasil Pencarian <span class="fw-bold fs-4">Referensi Buku</span> </h3>
                <div class="row row-cols-5 card-pagination">
                    @foreach ($reference_books as $book)
                        <div class="col mb-4">
                            <div class="card p-2">
                                <a href="{{ url('reference_book_detail') }}/{{ $book->id }}"
                                    class="text-decoration-none text-dark">
                                    <img src="{{ $book->cover }}" alt="" class="img-fluid">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt="">
                                                100</span>
                                            <span><img src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                    alt=""> 100</span>
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
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation" id="pagin" class="d-flex">
                        <span class="page-item prev"><button class="page-link" href=""><img
                                    src="assets/icon/prev-2.svg" alt=""></button></span>
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                        </ul>
                        <span class="page-item next"><button class="page-link" href=""><img
                                    src="assets/icon/next-2.svg" alt=""></button></button></span>
                    </nav>
                </div>
            </div>
            <div class="tab-pane container fade" id="sd">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="assets/img/1.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/2.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/3.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/4.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/5.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/6.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/1.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/2.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/3.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/4.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/5.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/6.jpg" alt="" class="img-fluid"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="smp">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="assets/img/1.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/2.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/3.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/4.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/5.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/6.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/1.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/2.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/3.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/4.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/5.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/6.jpg" alt="" class="img-fluid"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="sma">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="assets/img/1.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/2.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/3.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/4.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/5.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/6.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/1.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/2.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/3.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/4.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/5.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/6.jpg" alt="" class="img-fluid"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="umum">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="assets/img/1.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/2.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/3.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/4.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/5.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/6.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/1.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/2.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/3.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/4.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/5.jpg" alt="" class="img-fluid"></div>
                        <div class="col mb-4"><img src="assets/img/6.jpg" alt="" class="img-fluid"></div>
                    </div>
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
                        <div class="item">
                            <img class="img-fluid" src="assets/img/smp/3.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="assets/img/lanjutkan_yuk/3.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="assets/img/paling_dibaca/3.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="assets/img/sma/1.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="assets/img/smp/3.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="assets/img/lanjutkan_yuk/3.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="assets/img/paling_dibaca/3.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-fluid" src="assets/img/sma/1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5">
        <div class="row pt-3 px-5">
            <img class="img-fluid" src="assets/icon/board.svg" alt="">
        </div>
    </div>
@endsection
