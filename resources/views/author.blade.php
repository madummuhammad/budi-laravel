@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
<div id="hero">
    <img class="banner-img-size img-fluid" src="{{ asset('web') }}/assets/img/profile_penulis.png" alt="">
    <h2 class="ff-kidzone tagline text-white">Profil Penulis</h2>
</div>
<div class="container">
    <div class="row mt-5">
        <h2 class="text-red fw-bold" style="font-size: 38px;">Penulis Pilihan Budi Bulan Ini</h2>
    </div>
    <div class="news-detail">
        <div class="title">
            @if ($aotm->authors !== null)
            <h1 class="fw-bold w-100">{{ $aotm->authors->name }}</h1>
            @endif
            <div class="share">
                <div>
                <a style="cursor:pointer" class="liked @if($liked !==0) active @endif">
                    @if($liked==0)
                        <i class="bi bi-heart"></i>
                        @else
                        <i class="fa-solid fa-heart text-danger mt-1" style="font-size:20px"></i>
                        @endif
                </a>
                </div>
                <a class="" href="https://wa.me/?text={{ url('author_profile') }}"><i class="bi bi-share"></i></a>
            </div>
        </div>
        <div class="my-5">
            <div class="d-flex align-items-center">
                <div class="d-flex flex-column flex-md-row me-5 me-md-0">
                    <div class="me-md-3 text-capitalize">
                        {{$aotm->user_id}}
                    </div>
                    <div class="me-md-3">{{$aotm->uploaded_at}}</div>
                </div>

                <div class="d-flex flex-column flex-md-row">
                    <div class="me-md-3"><img src="{{ asset('web') }}/assets/icon/little-book.svg" alt=""> {{$number_reads->count()}}
                    </div>
                    <div><img src="{{ asset('web') }}/assets/icon/love.svg" alt=""> {{$number_liked}}</div>
                </div>
            </div>
        </div>
        <div class="news-body">
            <div class="row">
                <div class="col-12 col-lg-4 text-center mb-3 mb-lg-0">
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
        <div class="d-lg-flex justify-content-center d-none">
            <nav id="pagin" class="paginate-pagination paginate-pagination-0 d-block" data-parent="0">
                <ul class="d-flex">
                    <li class="page-item prev"><a href="#" data-page="prev"
                            class="page page-prev deactive prev page-link">
                            <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                        </a>
                    </li>
                    @if ($aotm->authors !== null)
                    @for ($i = 0; $i < ceil(count($aotm->authors->books) / 5); $i++)
                        <li><a href="#paginate-{{ $i + 1 }}" data-page="{{ $i + 1 }}"
                                class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                        </li>
                        @endfor
                        @endif
                        <li class="page-item next"><a href="#" data-page="next" class="page page-next-link"><img
                                    src="{{ asset('web') }}/assets/icon/next-2.svg" alt=""></a>
                        </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row row-cols-5 next-pagination">
        @if ($aotm->authors !== null)
        @foreach ($aotm->authors->books as $book)
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card p-2">
                <a href="{{url('book/')}}/{{$book->id}}" class="text-decoration-none text-dark">
                    <div class="img-container-for-icon">
                        <img src="{{ $book->cover }}" alt="" class="img-fluid w-100">
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
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="d-flex align-items-center">
                            <span class="me-2 d-flex align-items-center">
                                <img src="{{ asset('web') }}/assets/icon/love.svg" alt="">
                                <span class="ms-1">100</span>
                            </span>
                            <span class="d-flex align-items-center">
                                <img src="{{ asset('web') }}/assets/icon/little-book.svg" alt="">
                                <span class="ms-1">100</span>
                            </span>
                        </div>
                        <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                    </div>
                    <div class="card-body p-1">
                        <div class="card-title fw-bold">
                            Alia Juga Berani
                        </div>
                        <p class="card-text m-0" style="color: #939393">Author: Raline</p>
                        <p class="card-text m-0" style="color: #939393">Tema: Pelajaran</p>
                    </div>
                </a>
            </div>
            <div class="card-body p-1">

            </div>
        </div>
        @endforeach
        @endif
    </div>

    <div class="d-flex justify-content-center d-lg-none mt-3">
        <nav id="pagin" class="paginate-pagination paginate-pagination-0 d-block" data-parent="0">
            <ul class="d-flex">
                <li class="page-item prev"><a href="#" data-page="prev"
                        class="page page-prev deactive prev page-link">
                        <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                    </a>
                </li>
                @if ($aotm->authors !== null)
                @for ($i = 0; $i < ceil(count($aotm->authors->books) / 5); $i++)
                    <li><a href="#paginate-{{ $i + 1 }}" data-page="{{ $i + 1 }}"
                            class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                    </li>
                    @endfor
                    @endif
                    <li class="page-item next"><a href="#" data-page="next" class="page page-next-link"><img
                                src="{{ asset('web') }}/assets/icon/next-2.svg" alt=""></a>
                    </li>
            </ul>
        </nav>
    </div>
    @csrf
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
        var likeds = $('.liked')

        for (let i = 0; i < likeds.length; i++) {
            $(likeds[i]).on('click', function() {
                var token = $("input[name=_token]").val();
                if ($(this).hasClass('active') == false) {
                    $(this).addClass('active');
                    $(this).html(' <i class="fa-solid fa-heart text-danger" style="font-size:20px"></i>')
                    var status = "unliked";
                } else {
                    $(this).removeClass('active');
                    $(this).html('<i class="fa-regular fa-heart" style="font-size:20px"></i>')
                    var status = "liked";
                }
                $.ajax({
                    type: 'POST',
                    url: "{{ url('author_profile') }}",
                    data: {
                        _method: "POST",
                        status: status,
                        author_id:'{{$aotm->author_id}}',
                        _token: token
                    },
                    success: function(hasil) {}
                });

            });
        }
</script>
@endsection