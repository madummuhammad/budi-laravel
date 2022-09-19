@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ asset('web') }}/assets/img/pustakaku.png" alt="">
        <h2 class="ff-kidzone tagline text-white">Pustakaku</h2>
    </div>
    <div class="container">

        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <div class="d-flex ">
                    <div class="home-tab bg-white w-100 px-5">
                        <div class="row">
                            <div class="col-5">
                                <p class="fs-5 m-0 fw-light">Koleksi Pribadi</p>
                                <h3 class="fw-bold mt-3 mb-5">{{ auth()->guard('visitor')->user()->name }}</h3>
                            </div>
                            <div class="col-4">
                                <p class="fs-5 m-0 fw-light">Medali</p>
                                <h3 class="fw-bold mt-3 mb-5">Perunggu</h3>
                            </div>
                            <div class="col-3">
                                <p class="fs-5 m-0 fw-light">Jumlah</p>
                                <h3 class="fw-bold mt-3 mb-5">300 Buku</h3>
                            </div>
                        </div>
                        <div class="home-tab-body p-0">
                            <div class="input-group input-search w-100 p-0">
                                <input type="text" class="form-control " placeholder="Cari">
                                <button class="btn" style="border-left: 0;"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-3 text-center">
                        <a href="" class="text-blue text-decoration-none fs-5"><i class="bi bi-book"></i>
                            Lanjutkan
                            Membaca</a>
                    </div>
                    <div class="col-2 text-center">
                        <a href="" class="text-decoration-none fs-5 text-dark"><i class="bi bi-heart"></i></i>
                            Disukai</a>
                    </div>
                    <div class="col-2 text-center">
                        <a href="" class="text-decoration-none fs-5 text-dark "><i class="bi bi-book"></i>
                            Disimpan</a>
                    </div>
                    <div class="col-2 text-center">
                        <a href="" class="text-decoration-none fs-5 text-dark"><i class="bi bi-book"></i>
                            Selesai</a>
                    </div>
                </div>
                <!-- asdfasdf -->
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">Buku Bacaan (10/50)</h3>
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation" id="pagin" class="d-flex">
                            <span class="page-item prev"><button class="page-link" href=""><img
                                        src="{{ asset('web') }}/assets/icon/prev-2.svg" alt=""></button></span>
                            <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                            </ul>
                            <span class="page-item next"><button class="page-link" href=""><img
                                        src="{{ asset('web') }}/assets/icon/next-2.svg"
                                        alt=""></button></button></span>
                        </nav>
                    </div>
                </div>
                <div class="row row-cols-5 card-pagination">
                    <div class="col mb-4">
                        <div class="card p-2">
                            <a href="alia_juga_berani.html" class="text-decoration-none text-dark">
                                <img src="{{ asset('web') }}/assets/img/paud/1.jpg" alt="" class="img-fluid">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</span>
                                        <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                            100</span>
                                    </div>
                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                </div>
                            </a>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Alia Juga Berani
                                </div>
                                <p class="card-text">Author: Raline</p>
                                <p class="card-text">Tema: Pelajaran</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                </div>
                <div class="row row-cols-5 card-pagination">
                    <div class="col mb-4">
                        <div class="card p-2">
                            <img src="{{ asset('web') }}/assets/img/buku_bacaan/1.jpg" alt="" class="img-fluid">
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
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">Buku Komik (10/50)</h3>
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation" id="pagin" class="d-flex">
                            <span class="page-item prev"><button class="page-link" href=""><img
                                        src="{{ asset('web') }}/assets/icon/prev-2.svg" alt=""></button></span>
                            <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                            </ul>
                            <span class="page-item next"><button class="page-link" href=""><img
                                        src="{{ asset('web') }}/assets/icon/next-2.svg"
                                        alt=""></button></button></span>
                        </nav>
                    </div>
                </div>
                <div class="row row-cols-5 card-paginaton">
                    <div class="col mb-4">
                        <div class="card p-2">
                            <a href="si_saloi.html" class="text-decoration-none text-dark">
                                <img src="{{ asset('web') }}/assets/img/komik/1.jpg" alt="" class="img-fluid">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt="">
                                            100</span>
                                        <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                            100</span>
                                    </div>
                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                </div>
                            </a>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Si Saloi
                                </div>
                                <p class="card-text">Author: Laveta Pamela Rianas</p>
                                <p class="card-text">Tema: Anak Indonesia</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">Buku Audio (10/50)</h3>
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation" id="pagin" class="d-flex">
                            <span class="page-item prev"><button class="page-link" href=""><img
                                        src="{{ asset('web') }}/assets/icon/prev-2.svg" alt=""></button></span>
                            <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                            </ul>
                            <span class="page-item next"><button class="page-link" href=""><img
                                        src="{{ asset('web') }}/assets/icon/next-2.svg"
                                        alt=""></button></button></span>
                        </nav>
                    </div>
                </div>
                <div class="row row-cols-5 card-paginaton">
                    <div class="col mb-4">
                        <div class="card p-2">
                            <a href="audio.html" class="text-decoration-none text-dark">
                                <div class="img-container-for-icon">
                                    <img src="{{ asset('web') }}/assets/img/buku_audio/aku_sayang_ayah.jpg"
                                        alt="" class="img-fluid">
                                    <div class="icon icon-center">
                                        <img src="{{ asset('web') }}/assets/icon/mic.svg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt="">
                                            100</span>
                                        <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                            100</span>
                                    </div>
                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                </div>
                                <div class="card-body p-1">
                                    <div class="card-title fw-bold">
                                        Aku Sayang Ayah
                                    </div>
                                    <p class="card-text">Author: Nurani Widaningsih</p>
                                    <p class="card-text">Tema/Tingkatan: SD</p>

                                </div>
                            </a>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">Buku Video (10/50)</h3>
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation" id="pagin" class="d-flex">
                            <span class="page-item prev"><button class="page-link" href=""><img
                                        src="{{ asset('web') }}/assets/icon/prev-2.svg" alt=""></button></span>
                            <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                            </ul>
                            <span class="page-item next"><button class="page-link" href=""><img
                                        src="{{ asset('web') }}/assets/icon/next-2.svg"
                                        alt=""></button></button></span>
                        </nav>
                    </div>
                </div>
                <div class="row row-cols-5 card-pagintion">
                    <div class="col mb-4">
                        <div class="card p-2">
                            <a href="selamat_tidur_kola.html" class="text-decoration-none text-dark">
                                <div class="img-container-for-icon">
                                    <img src="{{ asset('web') }}/assets/img/buku_video/selamat_tidur_kola.jpg"
                                        alt="" class="img-fluid">
                                    <div class="icon icon-center">
                                        <img src="{{ asset('web') }}/assets/icon/play.svg" alt="">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt="">
                                            100</span>
                                        <span><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                            100</span>
                                    </div>
                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                </div>
                            </a>
                            <div class="card-body p-1">
                                <div class="card-title fw-bold">
                                    Selamat Tidur Kola
                                </div>
                                <p class="card-text">Author: Veronica W</p>
                                <p class="card-text">Tema: Pelajaran</p>

                            </div>
                        </div>
                        <div class="card-body p-1">

                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="sd">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="smp">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="sma">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane container fade" id="umum">
                <div class="tab-pane container active" id="paud">
                    <div class="row row-cols-6">
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/1.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/2.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/3.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/4.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/5.jpg" alt=""
                                class="img-fluid">
                        </div>
                        <div class="col mb-4"><img src="{{ asset('web') }}/assets/img/6.jpg" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
