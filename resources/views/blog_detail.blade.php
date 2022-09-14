@extends('main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ asset('web') }}/assets/img/info_seputar_budi.png" alt="">
        <h2 class="ff-kidzone tagline text-white">Info Seputar Budi</h2>
    </div>
    <div class="container">
        <div class="row mt-5">
            <h2 class="text-green" style="font-size: 38px;">
                @if ($blog->blog_type == 'News')
                    Berita
                @endif
                @if ($blog->blog_type == 'Article')
                    Artikel
                @endif
            </h2>
        </div>
        <div class="news-detail">
            <div class="title">
                <h1>{{ $blog->name }}</h1>
                <div class="share">
                    <a class=""><i class="bi bi-heart"></i></a>
                    <a class=""><i class="bi bi-share"></i></a>
                </div>
            </div>
            <div class="author my-5">
                <div>Oleh: {{ $blog->writer }}</div>
                <div>{{ $blog->uploaded_at }}</div>
                <div><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt=""> 100</div>
                <div><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</div>
            </div>
            <div class="news-body">
                <div class="row">
                    <div class="col-7">
                        <img class="img-fluid w-100" src="{{ $blog->cover }}" alt="">
                        @php
                            echo $blog->content;
                        @endphp
                    </div>
                    <div class="col-5">
                        {{-- <p>Kegiatan Diseminasi Pengembangan Kosakata: Kamus Masuk Sekolah ini juga akan
                            diselenggarakan secara bertahap pada bulan Agustus dan September di beberapa sekolah
                            lainnya di DKI Jakarta dengan perincian, yakni 2 sekolah dasar, 2 sekolah menengah
                            pertama, dan 2 sekolah menengah atas.   (EK/HS)</p> --}}
                        <h5>Kategori</h5>
                        <div class="d-flex justify-content-between w-75 mt-4 mb-4">
                            <div class="fs-5">Berita</div>
                            <div class="text-green fw-bold">{{ $total_news }}</div>
                        </div>
                        <div class="dash w-75"></div>
                        <div class="d-flex justify-content-between w-75 mt-4 mb-4">
                            <div class="fs-5">Artikel</div>
                            <div class="text-green fw-bold">{{ $total_article }}</div>
                        </div>
                        <div class="dash w-75"></div>
                        <div class="tag">
                            <h3 class="fw-bold mb-4">Tag:</h3>
                            @foreach ($blog->tags as $tag)
                                <span class="tag-item">{{ $tag->tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- <div class="row mt-5">
                    <div class="col-7">
                        <div class="dash mb-3"></div>
                        <div class="row">
                            <div class="col-3">
                                <img src="assets/img/ilham_sailar.png" alt="">
                            </div>
                            <div class="col-9">
                                <div class="d-flex justify-content-between">
                                    <h4 class="fw-bold">Ilham Sailar</h4>
                                    <div class="d-flex">
                                        <img class="w-25 mx-2" src="assets/icon/instagram.svg" alt="">
                                        <img class="w-25 mx-2" src="assets/icon/twitter.svg" alt="">
                                    </div>
                                </div>
                                <p class="mt-4 pe-5">Merupakan penulis produktif yang berfokus pada aspek pendidikan
                                    literasi di
                                    tingkat sekolah dasar. Penulis sudah menerbitkan 3 buku dan 4 jurnal ilmiah</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <!-- Tab panes -->
        <div class="tab-content" style="margin-top: 80px;">
            <div class="tab-pane container active" id="buku_bacaan">
                <!-- asdfasdf -->
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">Berita Terkait</h3>
                    <a href="info_seputar_budi.html">Lihat Semua</a>
                </div>
                <div class="row row-cols-4 mt-4">
                    <div class="col">
                        <a href="kenalkan_kemahiran_merujuk.html" class="text-decoration-none text-dark">
                            <div class="card card-news">
                                <img src="assets/img/news1.jpeg" class="card-img-top" alt="...">
                                <div class="card-body px-0">
                                    <h5 class="card-title fw-bold">Kenalkan Kemahiran Merujuk, Badan Bahasa
                                        Selenggarakan
                                        Kegiatan
                                        Kamus Masuk Sekolah
                                    </h5>
                                    <p class="card-text">Dalam rangka mengenalkan kemahiran merujuk (reference
                                        skill)
                                        kepada
                                        siswa sekolah dasar dan
                                        menengah...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="kerjasama_peningkatan.html" class="text-decoration-none text-dark">
                            <div class="card card-news">
                                <img src="assets/img/berita/kerjasama_peningkatan_literasi.jpeg" class="card-img-top"
                                    alt="...">
                                <div class="card-body px-0">
                                    <h5 class="card-title fw-bold">Kerja Sama untuk Peningkatan Literasi dan
                                        Revitalisasi Bahasa
                                        Daerah di Sulawesi Selatan
                                    </h5>
                                    <p class="card-text"> Badan Pengembangan dan Pembinaan Bahasa
                                        menjalin kerja sama
                                        dengan
                                        Pemerintah Kota...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="kerjasama_peningkatan.html" class="text-decoration-none text-dark">
                            <div class="card card-news">
                                <img class="img-fluid" src="assets/img/berita/penghargaan_humas_indonesia.jpg"
                                    class="card-img-top" alt="...">
                                <div class="card-body px-0">
                                    <h5 class="card-title fw-bold">Penghargaan Humas Indonesia untuk Program
                                        Revitalisasi
                                        Bahasa
                                        Daerah
                                    </h5>
                                    <p class="card-text">Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi
                                        menerima
                                        penghargaan IDEAS 2022
                                        kategori Kebijakan ...
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="seminat_leksikografi_indonesia.html" class="text-decoration-none text-dark">
                            <div class="card card-news">
                                <img src="assets/img/berita/seminar_leksikografi_indonesia.png" class="card-img-top"
                                    alt="...">
                                <div class="card-body px-0">
                                    <h5 class="card-title fw-bold">Seminar Leksikografi Indonesia Tahun 2022
                                    </h5>
                                    <p class="card-text">Dalam rangka memperkaya dan memutakhirkan kamus bahasa
                                        Indoenesia, Badan Pengembangan dan
                                        Pembinaan Bahasa melalui Pusat Pengembangan...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
