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
                    <h3 class="mb-3">Berita</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-4 mt-4 card-pagination paginate-news">
                    @foreach ($blogs as $blog)
                        @if ($blog->blog_type == 'News')
                            <div class="col item-pagination-1">
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
                <div class="d-flex justify-content-center pagination-container-1">
                </div>
            </div>
        </div>
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <!-- asdfasdf -->
                <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-3">Artikel</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-4  mt-4 card-pagintion paginate-article">
                    @foreach ($blogs as $blog)
                        @if ($blog->blog_type == 'Article')
                            <div class="col item-pagination-2">
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
                <div class="d-flex justify-content-center pagination-container-2">
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
    <script src="{{ asset('web') }}/assets/js/jquery.simplePagination.js"></script>
    <script>
        var items = $(".item-pagination-1");
        var numItems = items.length;
        var perPage = 8;
        items.slice(perPage).hide();

        $('.pagination-container-1').pagination({
            items: numItems,
            itemsOnPage: perPage,
            prevText: "g",
            nextText: "g",
            onPageClick: function(pageNumber) {
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                items.hide().slice(showFrom, showTo).show();
            }
        });

        var items2 = $(".item-pagination-2");
        var numItems2 = items2.length;
        var perPage2 = 8;
        items2.slice(perPage2).hide();

        $('.pagination-container-2').pagination({
            items: numItems2,
            itemsOnPage: perPage2,
            prevText: "g",
            nextText: "g",
            onPageClick: function(pageNumber2) {
                var showFrom = perPage * (pageNumber2 - 1);
                var showTo = showFrom + perPage2;
                items2.hide().slice(showFrom, showTo).show();
            }
        });
    </script>
@endsection
