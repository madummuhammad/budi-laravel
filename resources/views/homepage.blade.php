@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div class="slider">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banners as $banner)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ $banner->image }}" class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon-container">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-prev-icon-container">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="d-flex justify-content-center">
            <div class="home-tab">
                <h2 class="text-center title fw-bold fs-4 mb-4">Temukan Buku sesuai minat dan kebutuhanmu</h2>
                <div class="home-tab-body">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle green" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                        <button class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle dropdown-toggle blue"
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
    </div>
    <div class="container">
        <div class="row">
            <h2 class="text-center fw-bold">Jelajahi Lebih Dari 700 Buku Bacaan, Buku Komik, Buku Audio, dan
                Buku Video
            </h2>
        </div>
        <div class="row tab-book mt-3">
            <div class="d-flex justify-content-center">
                <ul class="nav nav-pills">
                    @foreach ($levels as $level)
                        <li class="nav-item">
                            @if ($loop->first)
                                <a class="nav-link active" data-bs-toggle="pill"
                                    href="#theme{{ Str::slug($level->name) }}"
                                    aria-selected="true">{{ $level->name }}</a>
                            @else
                                <a class="nav-link" data-bs-toggle="pill" href="#theme{{ Str::slug($level->name) }}"
                                    aria-selected="false">{{ $level->name }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab-content mt-5">
                @foreach ($levels as $level)
                    @if ($loop->first)
                        <div class="tab-pane container active" id="theme{{ Str::slug($level->name) }}">
                        @else
                            <div class="tab-pane container" id="theme{{ Str::slug($level->name) }}">
                    @endif
                    <div class="row row-cols-6">
                        @foreach ($books as $book)
                            @if ($book->display_homepage == 1)
                                @if ($book->level == $level->id)
                                    <a href="{{ url('/book') }}/{{ $book->id }}">
                                        <div class="col mb-4">
                                            <div class="img-container-for-icon">
                                                <img src="{{ $book->cover }}" alt="" class="img-fluid">
                                                @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                    <div class="icon">
                                                        <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                            alt="">
                                                    </div>
                                                @endif
                                                @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                    <div class="icon">
                                                        <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                            alt="">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endif
                        @endforeach
                    </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                <button class="btn bg-blue text-white rounded-5">Akses Gratis ! <span><i
                            class="fa-solid fa-chevron-right"></i></span></button>
            </div>
            <p class="text-center mt-2">Kapan pun & Di mana pun</p>
        </div>
    </div>
    {{-- <section id="section-2" class="mt-5">
        <div class="header d-flex justify-content-between">
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
    </section> --}}
    </div>
    {{-- <div class="container-fluid">
        <div class="row pt-3 px-5">
            <img class="img-fluid" src="{{ asset('web') }}/assets/icon/board.svg" alt="">
        </div>
    </div> --}}
    <div class="container">
        <div id="section-3" class="mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="fw-bold">Bacaan Literasi Untuk Semua</h2>
                    <p class="mt-4">Melalui Budi (Buku Digital) ini, kami memberikan layanan Bahan Bacaan Literasi
                        yang di dalamnya terdapat nilai-nilai moral, inspirasi, serta semangat kecintaan terhadap
                        budaya Indonesia.</p>
                    <p class="mt-5">Buku Digital ini didedikasikan untuk Anda, baik itu siswa sekolah, guru, orang
                        tua hingga
                        masyarakat pecinta buku di tanah air maupun pecinta buku bahasa & budaya Indonesia di
                        mancanegara.</p>
                    <p class="mt-5">Seluruh buku dapat diakses (baca, dengar, tonton) diunduh secara gratis pecinta
                        buku di tanah air
                        maupun di mancanegara.</p>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('web') }}/assets/img/ilustrasi-1.svg" alt="">
                </div>
            </div>
        </div>
        <div id="section-4" class="mt-5">
            <div class="row">
                <h2 class="fw-bold ff-bubblewump text-end mb-5 mt-4 fs-3">Buku Pilihan Bulan ini</h2>
                @foreach ($book_of_the_months as $botm)
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="fw-600 fs-6">{{ $botm->books->name }}</p>
                                <p class="mt-3">
                                    @php
                                        echo $botm->books->name;
                                    @endphp
                                </p>
                                <div class="mt-5">
                                    @foreach ($botm->books->authors as $author)
                                        <p><span class="fw-bold">Pengarang : </span>{{ $author->name }}</p>
                                    @endforeach
                                    <p><span class="fw-bold">Rating : </span><img
                                            src="{{ asset('web') }}/assets/icon/star.svg" alt=""> 4.9
                                    </p>
                                </div>
                                <a href="{{ url('/book') }}/{{ $botm->books->id }}" class="text-blue">Lihat Buku</a>
                            </div>
                            <div class="col-lg-6">
                                <div class="card border-0 shadow">
                                    <div class="card-body">
                                        <a href="{{ url('/book') }}/{{ $botm->books->id }}">
                                            <img class="img-fluid w-100" src="{{ $botm->books->cover }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="section-5" style="margin-top: 100px;">
            <h2 class="ff-bubblewump text-center fw-bold">Pilihan Tema Yang Mungkin Kamu Suka </h2>
            <div class="container mt-4">
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel owl-theme px-5" id="owl-carousel-1">
                            @foreach ($themes as $theme)
                                <div class="item">
                                    <img class="img-fluid" src="{{ $theme->image }}" alt="">
                                    <div class="title fw-bold">
                                        <p class="p-0 text-white">{{ $theme->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="section-6" class="mt-5">
        <div class="container text-white">
            @foreach ($audio_book_homepages as $abh)
                <div class="row py-5">
                    <div class="col-6 pb-5 me-5">
                        <h2 class="h2 text-center fw-bolder">Dengarkan Cerita Menarik Setiap Hari</h2>
                        <div class="d-flex justify-content-center">
                            <img class="img" src="{{ $abh->books->cover }}" alt="">
                        </div>
                        <div class="audio-player" data-audio="{{ asset('storage') }}/{{ $abh->books->content }}"
                            style="margin-top: 10px">
                            <div class="controls">
                                <div class="play-container">
                                    <div class="toggle-play toggle-play-2 play">
                                    </div>
                                </div>
                                <div class="timeline d-flex justify-content-start border-0
									style=" height: 100px;
                                    width: 90%;">
                                    <div class="progress" style="background-color: #2B388B;"></div>
                                </div>
                                <div class="volume-container">
                                    <div class="volume-button">
                                        <div class="volume icono-volumeMedium"></div>
                                    </div>

                                    <div class="volume-slider">
                                        <div class="volume-percentage"></div>
                                    </div>
                                </div>
                                <div class="time" style="display: none;">
                                    <div class="current">0:00</div>
                                    <div class="divider">/</div>
                                    <div class="length"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 pb-5">
                        <a href="buku_audio.html" class="text-white">Lihat semua Buku Audio</a>
                        <h2 class="ff-kidzone fs-48px">{{ $abh->books->name }}</h2>
                        @php
                            echo $abh->books->sinopsis;
                        @endphp
                        @foreach ($abh->books->authors as $author)
                            <p class="fw-bold">Pengarang : {{ $author->name }}</p>
                        @endforeach
                        <p><span class="fw-bold">Rating : </span> 4.9</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <section id="section-7">
        <div class="container mt-5">
            <h2 class="ff-bubblewump text-center fw-bold">Banyak Membaca, Kunci Kreativitas dan Keberhasilan</h2>
            <p class="text-center fs-4">Bagaimana kami membantu mewujudkanya?</p>
            <div class="row mt-5">
                <div class="col-lg-6">
                    <img src="{{ asset('web') }}/assets/img/ilustrasi-section5a.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="">
                        <h2 class="ff-bubblewump fs-4 fw-bold">Membaca Jadi lebih Mudah</h2>
                        <p>Dapatkan beragam konten buku menarik dalam format teks, audio dan video yang bisa diakses
                            melalui desktop
                            maupun telepon pintar.</p>
                        <p>Konten bisa diunduh kemudian bisa dibaca, didengarkan, atau ditonton tanpa internet.
                            Gratis.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="">
                        <h2 class="ff-bubblewump fs-4 fw-bold">Miliki Perpustakaanku</h2>
                        <p>Simpan buku yang kamu suka. Akses dan lanjutkan kapan pun. Dapatkan juga rekomendasi
                            terbaik sesuai minat dan
                            jenjang sekolahmu saat ini.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('web') }}/assets/img/ilustrasi-section5b.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('web') }}/assets/img/ilustrasi-section5c.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="">
                        <h2 class="ff-bubblewump fs-4 fw-bold">Budi Tumbuh Bersama Kamu</h2>
                        <p>Budi (Buku Digital) akan terus meningkatkan jumlah, jenis dan kualitas konten seiring
                            berkembangnya literasi
                            dan wawasan kamu.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="">
                        <h2 class="ff-bubblewump fs-4 fw-bold">Bersama Teman, Membaca Jadi Hobi
                            Menyenangkan</h2>
                        <p>Saling berbagi buku dengan teman dengan minat yang sama. Bantu teman memilih buku yang
                            sesuai dengan rating
                            dan komentar yang membangun.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('web') }}/assets/img/ilustrasi-section5d.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section id="section-8">
        <div class="container">
            <div class="row pb-5">
                <div class="col-lg-6 py-5">
                    <div class="img-container">
                        <img src="{{ asset('web') }}/assets/img/sepasang_mata.jpg" alt=""
                            class="img-1 img-fluid" style="width:40% ;">
                        <img src="{{ asset('web') }}/assets/img/ada_apa_sih.jpg" alt="" class="img-2 img-fluid"
                            style="width:40% ;">
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center text-white">
                    <div class="">
                        <h2 class="ff-kidzone fs-50px text-white">Ayo Kirimkan Karyamu !</h2>
                        <h4>Dan jadi bagian dair komunitas penulis Budi</h4>
                        <p class="mt-5">Jika kamu suka menulis cerpen atau blog pribadi, kini karyamu bisa
                            dinikmati
                            oleh lebih
                            banyak orang. Segera
                            kirimkan karyamu dalam format buku bacaan atau buku komik ke tim redaksi Budi.</p>
                        <a href="kirimkan_karyamu.html" class="btn bg-oldblue text-white btn-section-8">Lebih
                            Lanjut</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-9" class="" style="margin-top: 80px;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold fs-25px">Info Seputar Budi</h2>
                <a href="info_seputar_budi.html" class="text-blue">Lihat Semua</a>
            </div>
            <div class="row row-cols-4 mt-4">
                @foreach ($blogs as $blog)
                    <div class="col">
                        <a href="{{ url('blog/detail/') . '/' . $blog->id }}" class="text-decoration-none text-dark">
                            <div class="card card-news">
                                <img src="{{ $blog->cover }}" class="card-img-top" alt="...">
                                <div class="card-body px-0">
                                    <h5 class="card-title fw-bold">{{ $blog->name }}
                                    </h5>
                                    <div class="card-text">
                                        @php
                                            echo $blog->content;
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="section-10" style="margin-top: 80px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 bg-aqua py-5">
                    <h2 class="text-center ff-andika fw-bold">Sahabat Pilihan Budi ini</h2>
                    <div class="row mt-5">
                        <div class="col-7">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('web') }}/assets/icon/gold_medal.svg" alt="">
                                <h3 class="ff-andika">Medali Emas</h3>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                <div class="img-gold-medal">
                                    <img src="{{ asset('web') }}/assets/img/young.png" alt="">
                                    <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                        alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-5 text-decoration-underline mb-2">Andika Syarif</h3>
                                    <p class="m-0">300 Buku Dibaca,</p>
                                    <p class="m-0">100 Buku Diunduh</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center mt-3">
                                        <div class="img-gold-medal">
                                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                                alt="">
                                            <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                                alt="">
                                        </div>
                                        <div class="ms-2">
                                            <h3 class="ff-andika fs-6 text-decoration-underline mb-2">Agustina H
                                            </h3>
                                            <p class="m-0 fs-6">150 Buku Dibaca,</p>
                                            <p class="m-0 fs-6">170 Buku Diunduh</p>
                                        </div>
                                    </div>
                                    <div class="dash mt-3"></div>
                                    <div class="d-flex justify-content-center align-items-center mt-3">
                                        <div class="img-gold-medal">
                                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                                alt="">
                                            <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                                alt="">
                                        </div>
                                        <div class="ms-2">
                                            <h3 class="ff-andika fs-6 text-decoration-underline mb-2">Feri Trianto
                                            </h3>
                                            <p class="m-0 fs-6">120 Buku Dibaca,</p>
                                            <p class="m-0 fs-6">80 Buku Diunduh</p>
                                        </div>
                                    </div>
                                    <div class="dash mt-3"></div>
                                    <div class="d-flex justify-content-center align-items-center mt-3">
                                        <div class="img-gold-medal">
                                            <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                                alt="">
                                            <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                                alt="">
                                        </div>
                                        <div class="ms-2">
                                            <h3 class="ff-andika fs-6 text-decoration-underline mb-2">Wina Rahma
                                            </h3>
                                            <p class="m-0 fs-6">110 Buku Dibaca,</p>
                                            <p class="m-0 fs-6">70 Buku Diunduh</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="w-25" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                <h4 class="ff-andika fw-bold">Medali Perak</h4>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                        alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">Hermawan
                                    </h3>
                                    <p class="m-0 fs-6">100 Buku Dibaca,</p>
                                    <p class="m-0 fs-6">50 Buku Diunduh</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-4">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                        alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">Julianti
                                    </h3>
                                    <p class="m-0 fs-6">80 Buku Dibaca,</p>
                                    <p class="m-0 fs-6">40 Buku Diunduh</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="dash" style="width: 60%;"></div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                        alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">Riani Juliani
                                    </h3>
                                    <p class="m-0 fs-6">70 Buku Dibaca,</p>
                                    <p class="m-0 fs-6">70 Buku Diunduh</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="w-25" src="{{ asset('web') }}/assets/icon/bronze_medal.svg"
                                    alt="">
                                <h4 class="ff-andika fw-bold">Medali Perunggu</h4>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/bronze_medal.svg"
                                        alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">Qoriah Rei
                                    </h3>
                                    <p class="m-0 fs-6">60 Buku Dibaca,</p>
                                    <p class="m-0 fs-6">50 Buku Diunduh</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-4">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/bronze_medal.svg"
                                        alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">Alvin Dior
                                    </h3>
                                    <p class="m-0 fs-6">50 Buku Dibaca,</p>
                                    <p class="m-0 fs-6">40 Buku Diunduh</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="dash" style="width: 60%;"></div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-4">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/bronze_medal.svg"
                                        alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">Hermesiani
                                    </h3>
                                    <p class="m-0 fs-6">40 Buku Dibaca,</p>
                                    <p class="m-0 fs-6">10 Buku Diunduh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-11">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="ff-bubblewump mb-4 fw-bold">Profil Penulis Bulan Ini</h2>
                    <h3 class="text-blue">Asma Nadia</h3>
                    <p>Asmarani Rosalba adalah nama asli Asma Nadia. Ia adalah adik kandung Helvy Tiana Rosa,
                        seorang
                        penulis muda. Ia
                        mulai berkecimpung di dunia tulis-menulis ketika mulai mencipta lagu di sekolah dasar.
                        Setelah lulus
                        dari SMA 1
                        Budi Utomo, Jakarta, Asma Nadia melanjutkan kuliah di Fakultas Teknologi Pertanian, Institut
                        Pertanian Bogor.
                        Namun, kuliah yang dijalaninya tidak tamat. Dia harus beristirahat karena penyakit yang
                        dideritanya.
                    </p>
                    <p>Asma mempunyai obsesi untuk terus menulis. Itulah sebabnya, ketika kesehatannya menurun, ia
                        tetap
                        bersemangat
                        menulis</p>
                    <a href="profile_penulis.html" class="text-blue">Yuk, berkenalan lebih lanjut</a>
                </div>
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="img-section-11">
                        <img class="thumbnail-section-11" src="{{ asset('web') }}/assets/img/asma_nadia.jpg"
                            alt="">
                        <img class="border-section-11" src="{{ asset('web') }}/assets/icon/footer-border.svg"
                            alt="">
                    </div>
                </div>
            </div>
            <div class="dash" style="margin-top: 100px;"></div>
        </div>
    </section>

@endsection
