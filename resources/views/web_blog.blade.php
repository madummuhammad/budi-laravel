@extends('main')
@section('judul_halaman', 'Info Seputar Budi')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ $banners->image }}" alt="">
        <h2 class="ff-kidzone tagline text-white">Info Seputar Budi</h2>
    </div>
    <div class="container">

        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <!-- asdfasdf -->
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">Berita (8/30)</h3>
                </div>
                <div class="row row-cols-4 mt-4 card-pagination">
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
                    <nav aria-label="Page navigation" id="pagin" class="d-flex">
                        <span class="page-item prev"><button class="page-link" href=""><img
                                    src="{{ url('asset') }}/assets/icon/prev-2.svg" alt=""></button></span>
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                        </ul>
                        <span class="page-item next"><button class="page-link" href=""><img
                                    src="{{ url('asset') }}/assets/icon/next-2.svg"
                                    alt=""></button></button></span>
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
                <div class="row row-cols-4 mt-4 card-pagintion">
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
                    <nav aria-label="Page navigation" id="pagin" class="d-flex">
                        <span class="page-item prev"><button class="page-link" href=""><img
                                    src="{{ url('asset') }}/assets/icon/prev-2.svg" alt=""></button></span>
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                        </ul>
                        <span class="page-item next"><button class="page-link" href=""><img
                                    src="{{ url('asset') }}/assets/icon/next-2.svg"
                                    alt=""></button></button></span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
