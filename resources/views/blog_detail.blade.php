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
            <div class="row">
                <div class="col-md-7 my-5">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            Oleh: @if ($blog->writer !== null)
                                @foreach ($blog->writers as $writer)
                                    {{ $writer->name }}
                                @endforeach
                            @else
                                {{ $blog->uploader }}
                            @endif
                        </div>
                        <div class="col-md-4 col-6">{{ $blog->uploaded_at }}</div>
                        <div class="col-md-2 col-3"><img src="{{ asset('web') }}/assets/icon/little-book.svg"
                                alt=""> 100
                        </div>
                        <div class="col-md-2 col-3"><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100
                        </div>
                    </div>
                </div>
            </div>
            <div class="news-body">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <img class="img-fluid w-100 mb-4" src="{{ $blog->cover }}" alt="">
                        @php
                            echo $blog->content;
                        @endphp
                    </div>
                    <div class="col-12 col-md-5">
                        {{-- <p>Kegiatan Diseminasi Pengembangan Kosakata: Kamus Masuk Sekolah ini juga akan
                            diselenggarakan secara bertahap pada bulan Agustus dan September di beberapa sekolah
                            lainnya di DKI Jakarta dengan perincian, yakni 2 sekolah dasar, 2 sekolah menengah
                            pertama, dan 2 sekolah menengah atas.   (EK/HS)</p> --}}
                        <h5 class="fw-bold">Kategori</h5>
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
                        <div class="tag mt-4">
                            <h5 class="fw-bold mb-4">Tag:</h5>
                            @foreach ($blog->tags as $tag)
                                <span class="tag-item">{{ $tag->tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach ($blog->writers as $writer)
                    <div class="row mt-5">
                        <div class="col-12 col-md-7">
                            <div class="dash mb-3"></div>
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <img src="{{ $writer->image }}" alt="">
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="fw-bold">{{ $writer->name }}</h4>
                                        <div class="d-flex">
                                            <img class="w-25 mx-2" src="{{ asset('web') }}/assets/icon/instagram.svg"
                                                alt="">
                                            <img class="w-25 mx-2" src="{{ asset('web') }}/assets/icon/twitter.svg"
                                                alt="">
                                        </div>
                                    </div>
                                    <p class="mt-4 pe-5">
                                        {{ $writer->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Tab panes -->
        <div class="tab-content" style="margin-top: 80px;">
            <div class="tab-pane container active" id="buku_bacaan">
                <!-- asdfasdf -->
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">
                        @if ($blog->blog_type == 'News')
                            Berita
                        @endif
                        @if ($blog->blog_type == 'Article')
                            Artikel
                        @endif Terkait
                    </h3>
                    <a href="info_seputar_budi.html">Lihat Semua</a>
                </div>
                <div class="row row-cols-1 row-cols-md-4 mt-4">
                    @foreach ($related_news->unique('blog_id') as $data)
                        @if ($data->blogs !== null)
                            @if ($loop->index <= 4 and $blog->id !== $data->blogs->id)
                                <div class="col">
                                    <a href="{{ url('blog/detail/') . '/' . $data->blogs->id }}"
                                        class="text-decoration-none text-dark">
                                        <div class="card card-news">
                                            <img src="{{ $data->blogs->cover }}" class="card-img-top" alt="...">
                                            <div class="card-body px-0">
                                                <h5 class="card-title fw-bold">{{ $data->blogs->name }}
                                                </h5>
                                                <div class="card-text">
                                                    @php
                                                        echo $data->blogs->content;
                                                    @endphp
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
