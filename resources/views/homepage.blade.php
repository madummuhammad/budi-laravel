@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
<div class="slider">
    <div id="carouselExampleFade" class="carousel slide carousel-fade d-none d-md-block" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($banners as $banner)
            <div class="carousel-item @if ($loop->first) active @endif">
                <img src="{{ $banner->image }}" class="d-block w-100" alt="...">
                <h1 class="ff-kidzone tagline"
                style="top:{{ $banner->top }}%;left:{{ $banner->left }}%;color:{{ $banner->color }}">
                {{ $banner->tagline }}</h1>
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
    <div id="carouselExampleFade" class="carousel slide carousel-fade d-block d-md-none" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($banner_mobiles as $banner)
            <div class="carousel-item @if ($loop->first) active @endif">
                <img src="{{ $banner->image }}" class="d-block w-100" alt="...">
                <h1 class="ff-kidzone tagline"
                style="top:{{ $banner->top }}%;left:{{ $banner->left }}%;color:{{ $banner->color }}">
                {{ $banner->tagline }}</h1>
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
    <div class="d-flex justify-content-center home">
        <div class="home-tab">
            <h2 class="text-center title fw-bold fs-4 mb-4 fs-m-14px">Temukan buku sesuai minat dan kebutuhanmu !</h2>
            <div class="home-tab-body w-100" id="home-tab-body">
                <div class="container">
                    <div class="row">
                        <p class="d-block d-sm-none text-center fs-m-12px dropdown-toggle"
                        onclick="this.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');this.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.classList.toggle('d-none');">
                        Pilih
                    Jenjang & Tema</p>
                    <div class="d-none d-sm-block col-12 col-md-2 my-1">
                        <div class="dropdown w-100" id="jenjang">
                            <button class="btn btn-secondary dropdown-toggle home-tab-body-dropdown-toggle green"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <p>Jenjang</p>
                        </button>
                        <input type="text" name="jenjang" value="" hidden>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item text-danger">Jenjang</a></li>
                            <li><a class="dropdown-item" data-value="014453da-54e6-41b5-be05-952bc233f144">PAUD
                            </a>
                        </li>
                        <li><a class="dropdown-item" data-value="0207580f-6a98-477b-a19f-35bfc0f938e9">SD
                        </a>
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
                            type="button" data-bs-toggle="dropdown" aria-expanded="false" data-value="">
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
                            type="button" data-bs-toggle="dropdown" aria-expanded="true" data-value="">
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
                                type="button" data-bs-toggle="dropdown" aria-expanded="true" data-value="">
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
    <div class="col-12 col-md-4 my-1">
        <div class="input-search">
            <input type="text" class="form-control" id="search" placeholder="Cari">
            <button class="btn" id="search-button"><i class="bi bi-search"></i></button>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="container">
    <div class="row">
        <h3 class="text-center fw-bold">Jelajahi Lebih Dari 700 Buku Bacaan, Buku Komik, Buku Audio, dan
            Buku Video
        </h3>
    </div>
    <div id="tab-book">
        @csrf;
    </div>
    @if (auth()->guard('visitor')->check() == true)
    @if (count($nexts) > 0)
    <section id="section-2" class="mt-5">
        <div class="row">
            <div class="col">
                <div class="header d-flex justify-content-center justify-content-md-between">
                    <h2 class="fw-bold fs-3">Lanjutkan yuk, {{ auth()->guard('visitor')->user()->name }}</h2>
                    <a class="d-none d-sm-block" href="{{ url('mylibrary') }}">Lihat Semua</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="owl-carousel owl-theme px-5" id="owl-carousel-3">
                    @foreach ($nexts as $next)
                    @if($next->books !==null)
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
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    @endif
</div>
</div>
@if (auth()->guard('visitor')->check() == true)
@if (count($nexts) > 0)
<div class="container-fluid">
    <div class="row pt-3 px-5">
        <img class="img-fluid" src="{{ asset('web') }}/assets/icon/board.svg" alt="">
    </div>
    <a class="d-block d-md-none my-2 text-center" href="{{ url('mylibrary') }}">Lihat Semua</a>
</div>
@endif
@endif
<div class="container">
        <!-- <div id="section-3" class="mt-5">
            <h2 class="fw-bold">Bacaan Literasi Untuk Semua</h2>
            <div class="row">
                <div class="col-lg-6">
                    <p class="mt-4 text-m-center fs-m-12px">Melalui Budi (Buku Digital) ini, kami memberikan layanan Bahan
                        Bacaan
                        Literasi
                        yang di dalamnya terdapat nilai-nilai moral, inspirasi, serta semangat kecintaan terhadap
                        budaya Indonesia.</p>
                    <p class="mt-2 text-m-center fs-m-12px">Buku Digital ini didedikasikan untuk Anda, baik itu siswa
                        sekolah, guru,
                        orang
                        tua hingga
                        masyarakat pecinta buku di tanah air maupun pecinta buku bahasa & budaya Indonesia di
                        mancanegara.</p>
                    <p class="mt-2 text-m-center fs-m-12px">Seluruh buku dapat diakses (baca, dengar, tonton) diunduh
                        secara gratis
                        pecinta
                        buku di tanah air
                        maupun di mancanegara.</p>
                </div>
                <div class="col-lg-6 ps-5 ps-m-0 order-first order-md-last d-flex justify-content-center">
                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/ilustrasi-1.svg" alt="">
                </div>
            </div>
        </div> -->
        <div id="section-4" class="mt-5">
            <div class="row">
                <h2 class="fw-bold ff-bubblewump text-end mb-5 mt-4 fs-3 text-m-center">Buku Pilihan Bulan ini</h2>
                @foreach ($book_of_the_months as $botm)
                @foreach ($botm->books as $book)
                <div class="col-lg-6 mb-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="fw-600 fs-6 text-center text-md-start">{{ $book->name }}</p>
                            <div class="mt-3 sinopsis-text text-m-center">
                                @php
                                echo $book->sinopsis;
                                @endphp
                            </div>
                            <div class="mt-5">
                                @foreach ($book->authors as $author)
                                <p class="text-center text-md-start"><span
                                    class="fw-bold text-center text-md-start">Penulis :
                                </span>{{ $author->name }}
                            </p>
                            @endforeach
                            <p class="text-center text-md-start"><span class="fw-bold">Rating : </span><img
                                src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                                @if ($book->comments->where('book_id', $book->id)->count() == 0)
                                0.0
                                @else
                                {{ number_format($book->comments->where('book_id', $book->id)->sum('star') / $book->comments->where('book_id', $book->id)->count(), 1) }}
                                @endif
                            </p>
                        </div>
                        <div class="d-flex d-md-block justify-content-center">
                            <a href="{{ url('/book') }}/{{ $book->id }}"
                                class="text-blue text-center text-md-start">Lihat Buku</a>
                            </div>
                        </div>
                        <div
                        class="col-lg-6 order-first order-md-last mb-5 mb-md-0 d-flex d-md-block justify-content-center">
                        <div class="card border-0 shadow col-lg-12 col-8">
                            <div class="card-body">
                                <a href="{{ url('/book') }}/{{ $book->id }}">
                                    <img class="img-fluid w-100" src="{{ $book->cover }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
        @foreach ($abh->books as $book)
        <div class="row py-5 position-relative">
            <div class="col-12 col-md-6 pb-5 me-5">
                <h2 class="h2 text-center fw-bolder">Dengarkan Cerita Menarik Setiap Hari</h2>

                <div class="d-flex justify-content-center mt-5">
                    <a href="{{url('book')}}/{{$book->id}}">
                        <img class="img" src="{{ $book->cover }}" alt="">
                    </a>
                </div>   
                <div class="audio-player" id="audio-player-home"
                data-audio="{{ asset('storage') }}/{{ $book->content }}" style="margin-top: 10px">
                <div class="controls">
                    <div class="play-container">
                        <div class="toggle-play toggle-play-2 play">
                        </div>
                    </div>
                    <div class="timeline d-flex justify-content-start border-0">
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
        <div class="col-12 col-md-5 pb-5">
            <a class="d-none d-md-block text-white"
            href="{{ url('book_type') }}/9e30a937-0d60-49ad-9775-c19b97cfe864"
            class="text-white">Lihat semua Buku Audio</a>
            <h2 class="ff-kidzone fs-48px fs-m-30px">{{ $book->name }}</h2>
            @php
            echo $book->sinopsis;
            @endphp
            @foreach ($book->authors as $author)
            <p class="fw-bold">Penulis : {{ $author->name }}</p>
            @endforeach
            <p><span class="fw-bold">Rating : </span>
                @if ($book->comments->where('book_id', $book->id)->count() == 0)
                0.0
                @else
                {{ number_format($book->comments->where('book_id', $book->id)->sum('star') / $book->comments->where('book_id', $book->id)->count(), 1) }}
                @endif
            </p>
            <div class="audio-player audio-player-2"
            data-audio="{{ asset('storage') }}/{{ $book->content }}"
            style="margin-top: 10px; visibility:hidden">
            <div class="controls controls-2">
                <div class="play-container">
                    <div class="toggle-play toggle-play-2 play">
                    </div>
                </div>
                <div class="timeline timeline-2 d-flex justify-content-start border-0">
                    <div class="progress progress-2" style="background-color: #2B388B;"></div>
                </div>
                <div class="volume-container">
                    <div class="volume-button">
                        <div class="volume icono-volumeMedium"></div>
                    </div>

                    <div class="volume-slider volume-slider-2">
                        <div class="volume-percentage"></div>
                    </div>
                </div>
                <div class="time time-2" style="display: none;">
                    <div class="current current-2">0:00</div>
                    <div class="divider">/</div>
                    <div class="length length-2"></div>
                </div>
            </div>
        </div>
        <a class="d-block d-md-none text-white"
        href="{{ url('book_type') }}/9e30a937-0d60-49ad-9775-c19b97cfe864">Lihat semua Buku
    Audio</a>
</div>
</div>
@endforeach
@endforeach
</div>
</div>
<section id="section-7">
    <div class="container mt-5">
        <h2 class="ff-bubblewump text-center fw-bold">Banyak Membaca, Kunci Kreativitas dan Keberhasilan</h2>
        <p class="text-center fs-4">Bagaimana kami membantu mewujudkanya?</p>
        @foreach($section_sixs as $value)
        <div class="row mt-5">
            <div class="col-lg-6 mb-4 mb-md-0 @if($loop->index==1) order-first order-md-last @endif @if($loop->index==3) order-first order-md-last @endif">
                <img src="{{$value->image}}" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 d-flex align-items-center">
                <div class="">
                    <h2 class="ff-bubblewump fs-4 fw-bold text-center text-md-start">{{$value->title}}</h2>
                    <p class="text-center text-md-start">{{$value->content}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section id="section-8">
    <div class="container">
        @foreach ($send_creations as $send_creation)
        <div class="row pb-5">
            <div class="col-lg-6 py-5">
                <div class="img-container">
                    @foreach ($send_creation->send_creation_images as $send_creation_image)
                    <img src="{{ $send_creation_image->image }}" alt=""
                    class="@if ($loop->first) ms-5 img-1 @else img-2 @endif img-fluid"
                    style="width:40% ;">
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center text-white text-center text-md-start">
                <div class="">
                    <h2 class="ff-kidzone fs-50px text-white fs-m-40px">{{ $send_creation->heading }}</h2>
                    <h4>{{ $send_creation->sub_heading }}</h4>
                    <p class="mt-5">{{ $send_creation->content }}</p>
                    <a href="{{ url('send_creation') }}" class="btn bg-oldblue text-white btn-section-8">Lebih
                    Lanjut</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section id="section-9" class="" style="margin-top: 80px;">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center justify-content-md-between">
            <h2 class="fw-bold fs-25px text-center text-md-start">Pojok Baca</h2>
            <a href="{{ url('info_seputar_budi') }}" class="text-blue d-none d-md-block">Lihat Semua</a>
        </div>
        <div class="row row-cols-4 mt-4">
            @foreach ($blogs as $blog)
            <div class="col-12 col-md-3 p-4">
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
        <div class="d-flex justify-content-center">
            <a href="{{ url('info_seputar_budi') }}" class="text-blue text-center d-block d-md-none w-100">Lihat
            Semua</a>
        </div>
    </div>
</section>

<section id="section-10" style="margin-top: 80px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 bg-aqua py-5">
                <h2 class="text-center ff-andika fw-bold">Sahabat Pilihan Budi ini</h2>
                <div class="row mt-5">
                    <div class="col-12 col-md-7 mt-2 mb-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('web') }}/assets/icon/gold_medal.svg" alt="">
                            <h3 class="ff-andika">Medali Emas</h3>
                        </div>
                        @php
                        $no=0;
                        @endphp
                        @foreach($medal as $medal1)
                        @if($medalC->medal_clasification($medal1->read_count,$medal1->downloaded_count,$medal1->shares_count)=='gold')
                        @php
                        $no++;
                        @endphp
                        @if($no==1)
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <div class="img-gold-medal">
                                <img src="{{ asset('web') }}/assets/img/young.png" alt="">
                                <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                alt="">
                            </div>
                            <div class="ms-2">
                                <h3 class="ff-andika fs-5 text-decoration-underline mb-2">{{$medal1->name}}</h3>
                                <p class="m-0">{{$medal1->read_count}} Buku Dibaca,</p>
                                <p class="m-0">{{$medal1->downloaded_count}} Buku Diunduh</p>
                            </div>
                        </div>
                        @endif
                        @endif
                        @if($no==0 AND $loop->index==0)
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            -
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-12 col-md-5 my-2">
                        <div class="card">
                            <div class="card-body">
                                @php
                                $no=0;
                                @endphp
                                @foreach($medal as $medal2)
                                @if($medalC->medal_clasification($medal2->read_count,$medal2->downloaded_count,$medal2->shares_count)=='gold')
                                @php
                                $no++;
                                @endphp
                                @if($no==2)
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <div class="img-gold-medal">
                                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                        <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                        alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                            {{$medal2->name}}
                                        </h3>
                                        <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                        <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                    </div>
                                </div>
                                @else
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                @endif
                                @if($no==3)
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <div class="img-gold-medal">
                                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                        <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                        alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                            {{$medal2->name}}
                                        </h3>
                                        <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                        <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                    </div>
                                </div>
                                @else
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                @endif
                                @if($no==4)
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <div class="img-gold-medal">
                                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                        <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                        alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                            {{$medal2->name}}
                                        </h3>
                                        <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                        <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                    </div>
                                </div>
                                @else
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                @endif
                                @endif
                                @if($no==0 AND $loop->index==0)
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                <div class="dash mt-3"></div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-none d-sm-block">
                    <div class="row">
                        <div class="col-12 col-md-6 my-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="w-25" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                alt="">
                                <h4 class="ff-andika fw-bold">Medali Perak</h4>
                            </div>
                            @php
                            $no=0;
                            @endphp
                            @foreach($medal as $medal2)
                            @if($medalC->medal_clasification($medal2->read_count,$medal2->downloaded_count,$medal2->shares_count)=='silver')
                            @php
                            $no++;
                            @endphp
                            @if($no==1)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal2->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @if($no==2)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal2->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @if($no==3)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal2->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @endif
                            @if($no==0 AND $loop->index==0)
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="w-25" src="{{ asset('web') }}/assets/icon/bronze_medal.svg"
                                alt="">
                                <h4 class="ff-andika fw-bold">Medali Perunggu</h4>
                            </div>
                            @php
                            $no=0;
                            @endphp
                            @foreach($medal as $medal3)
                            @if($medalC->medal_clasification($medal3->read_count,$medal3->downloaded_count,$medal3->shares_count)=='bronze')
                            @php
                            $no++;
                            @endphp
                            @if($no==1)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal3->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal3->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal3->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @if($no==2)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal3->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal3->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal3->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @if($no==3)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal3->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal3->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal3->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @endif
                            @if($no==0 AND $loop->index==0)
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <button class="d-block d-sm-none text-center mx-auto btn mt-4 text-decoration-underline"
                onclick="(this.previousSibling.previousSibling.classList.toggle('d-none'));">Lihat
            Semua</button>
        </div>
    </div>
</div>
</section>
<section id="section-11">
    <div class="container">
        <div class="row">
            @foreach ($aotm as $aotm)
            <div class="col-12 order-first">
                <h2 class="ff-bubblewump mb-4 fw-bold text-center text-md-start">Profil Penulis Bulan Ini</h2>
            </div>
            <div class="col-lg-6 p-md-2 p-4">
                @if ($aotm->authors !== null)
                <h3 class="text-blue">{{ $aotm->authors->name }}</h3>
                @endif
                <div class="text-justify mb-4" style="text-align: justify">
                    @php
                    echo $aotm->content_homepage;
                    @endphp
                </div>
                <a href="{{ url('author_profile') }}" class="text-blue">Yuk, berkenalan lebih lanjut</a>
            </div>
            <div class="col-lg-6 d-flex justify-content-center order-first order-md-last">
                <div class="img-section-11  mb-5 overflow-hidden">
                    <img class="thumbnail-section-11" src="{{ $aotm->cover }}" alt="">
                    <img class="border-section-11" src="{{ asset('web') }}/assets/icon/footer-border.svg"
                    alt="">
                </div>
            </div>
            @endforeach
        </div>
        <div class="dash" style="margin-top: 100px;"></div>
    </div>
</section>
<script src="{{ asset('web') }}/assets/js/jquery.js"></script>
<script>
    var token = $("input[name=_token]").val();
    $.ajax({
        type: 'POST',
        url: "{{ url('homebookfilter') }}",
        data: {
            _method: "POST",
            _token: token,
        },
        success: function(hasil) {
            $("#search-button").on('click', function() {
                var jenjang = $("[name=jenjang]").val();
                var tema = $("[name=tema]").val();
                var bahasa = $("[name=bahasa]").val();
                var format = $("[name=format]").val();
                var search = $("#search").val();
                window.location.href =
                "{{ url('search?') }}level=" + jenjang + "&theme=" + tema +
                "&language=" + bahasa + "&format=" + format + "&keyword=" + search
                    // $.ajax({
                    //     type: 'POST',
                    //     url: "{{ url('homebookfilter') }}",
                    //     data: {
                    //         _method: "POST",
                    //         _token: token,
                    //         jenjang: jenjang,
                    //         tema: tema,
                    //         bahasa: bahasa,
                    //         format: format,
                    //         search: search
                    //     },
                    //     success: function(hasil) {
                    //         $("#tab-book").html(hasil);
                    //     }
                    // });
                });
            $("#tab-book").html(hasil);
        }
    });
</script>
@endsection
