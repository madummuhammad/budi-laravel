@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ asset('web') }}/assets/img/profile_penulis.png" alt="">
        <h2 class="ff-kidzone tagline text-white">Profil Penulis</h2>
    </div>
    <div class="container">
        <div class="row mt-5">
            <h2 class="text-red fw-bold" style="font-size: 38px;">Penulis Pilihan Budi Bulan Ini</h2>
        </div>
        <div class="news-detail">
            <div class="title">
                <h1 class="fw-bold w-100">{{ $aotm->authors->name }}</h1>
                <div class="share">
                    <a class=""><i class="bi bi-heart"></i></a>
                    <a class=""><i class="bi bi-share"></i></a>
                </div>
            </div>
            <div class="author my-5">
                <div>Agustina Septi</div>
                <div>2 Agustus 2022</div>
                <div><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt=""> 200</div>
                <div><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> 100</div>
            </div>
            <div class="news-body">
                <div class="row">
                    <div class="col-4">
                        <img class="img-fluid" src="{{ $aotm->cover }}" alt="">
                    </div>
                    @php
                        echo $aotm->content;
                    @endphp
                </div>
            </div>
        </div>
        <style>
            .paginate-pagination {
                display: none
            }

            #pagin li {
                list-style: none;
            }

            #pagin li .page-item {
                /* width: 38px !important; */
                padding-left: 10px;
                padding-right: 10px;
                padding-bottom: 10px;
                text-decoration: none;
            }

            #pagin li .page-item.active {
                background: #6899FD;
                color: white;
            }
        </style>
        <div class="d-flex align-items-center justify-content-between mt-4">
            <h3 class="mb-3">Buku yang telah dipublikasikan di situs budi</h3>
            <div class="d-flex justify-content-center">
                <nav id="pagin" class="paginate-pagination paginate-pagination-0 d-block" data-parent="0">
                    <ul class="d-flex">
                        <li class="page-item prev"><a href="#" data-page="prev"
                                class="page page-prev deactive prev page-link">
                                <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                            </a>
                        </li>
                        @for ($i = 0; $i < ceil(count($aotm->authors->books) / 5); $i++)
                            <li><a href="#paginate-{{ $i + 1 }}" data-page="{{ $i + 1 }}"
                                    class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                            </li>
                        @endfor
                        <li class="page-item next"><a href="#" data-page="next" class="page page-next-link"><img
                                    src="{{ asset('web') }}/assets/icon/next-2.svg" alt=""></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row row-cols-5 next-pagination">
            @foreach ($aotm->authors->books as $book)
                <div class="col mb-4">
                    <div class="card p-2">
                        <a href="audio.html" class="text-decoration-none text-dark">
                            <div class="img-container-for-icon">
                                <img src="{{ $book->cover }}" alt="" class="img-fluid">
                                @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="icon icon-center">
                                        <img src="{{ asset('web') }}/assets/icon/mic.svg" alt="">
                                    </div>
                                @endif
                                @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="icon icon-center">
                                        <img src="{{ asset('web') }}/assets/icon/play.svg" alt="">
                                    </div>
                                @endif
                            </div>
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
                                    Alia Juga Berani
                                </div>
                                <p class="card-text">Author: Raline</p>
                                <p class="card-text">Tema: Pelajaran</p>
                            </div>
                        </a>
                    </div>
                    <div class="card-body p-1">

                    </div>
                </div>
            @endforeach
        </div>
        <div class="dash" style="margin: 80px 0px;"></div>
    </div>
    <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
    <script src="{{ asset('web') }}/assets/js/jquery.paginate.js"></script>
    <script>
        $(".next-pagination").paginate({
            perPage: 5,
            paginatePosition: ['top'],
            useHashLocation: false,
        });
    </script>
@endsection
