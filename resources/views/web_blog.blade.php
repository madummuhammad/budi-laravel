@extends('main')
@section('judul_halaman', 'Info Seputar Budi')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ $banners->image }}" alt="">
        <h2 class="ff-kidzone tagline text-white">{{ $banners->tagline }}</h2>
    </div>
    <div class="container">

        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <!-- asdfasdf -->
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">Berita (8/30)</h3>
                </div>
                <style>
                    #pagin li {
                        list-style: none;
                    }

                    #pagin .page-item {
                        border: 2px solid #DDDDDD;
                        background-color: transparent;
                        margin-left: 10px;
                        margin-right: 10px;
                        width: 35px;
                        height: 35px;
                    }

                    #pagin a {
                        text-decoration: none;
                        width: 100px;
                        display: block;
                        text-align: center;
                    }


                    #pagin .page-item.prev,
                    #pagin .next {
                        height: 35px;
                        width: 35px;
                        display: flex;
                        align-items: center;
                    }

                    .paginate-pagination {
                        display: none
                    }

                    a.page-item.active {
                        color: white;
                        background-color: #3C6EFD !important;
                    }
                </style>
                <div class="row row-cols-1 row-cols-md-4 mt-4 card-pagination paginate-news">
                    @foreach ($blogs as $blog)
                        @if ($blog->blog_type == 'News')
                            <div class="col">
                                <a href="{{ url('blog/detail/') . '/' . $blog->id }}"
                                    class="text-decoration-none text-dark">
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
                        @endif
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <nav id="pagin" class="paginate-pagination paginate-pagination-0 d-block" data-parent="0">
                        <ul class="d-flex">
                            <li class="page-item prev"><a href="#" data-page="prev"
                                    class="page page-prev deactive prev page-link">
                                    <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                </a>
                            </li>
                            @for ($i = 0; $i < ceil($blogs->where('blog_type', 'News')->count() / 8); $i++)
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
        </div>
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <!-- asdfasdf -->
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">Artikel (8/30)</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-4  mt-4 card-pagintion paginate-article">
                    @foreach ($blogs as $blog)
                        @if ($blog->blog_type == 'Article')
                            <div class="col">
                                <a href="{{ url('blog/detail/') . '/' . $blog->id }}"
                                    class="text-decoration-none text-dark">
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
                        @endif
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    <nav id="pagin" class="paginate-pagination paginate-pagination-1 d-block" data-parent="1">
                        <ul class="d-flex">
                            <li class="page-item prev"><a href="#" data-page="prev"
                                    class="page page-prev deactive prev page-link">
                                    <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                </a>
                            </li>
                            @for ($i = 0; $i < ceil($blogs->where('blog_type', 'Article')->count() / 8); $i++)
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
        </div>
    </div>
    <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
    <script src="{{ asset('web') }}/assets/js/jquery.paginate.js"></script>
    <script>
        $(".paginate-news").paginate({
            perPage: 8,
            paginatePosition: ['top'],
            useHashLocation: false,
        });

        $(".paginate-article").paginate({
            perPage: 8,
            paginatePosition: ['top'],
            useHashLocation: false,
        });
    </script>
@endsection
