                    <div class="tab-content mt-5">
                        <div class="tab-pane container active" id="semua">
                            <div class="row row-cols-1 row-cols-md-5 paginate">
                                @foreach ($reference_books as $book)
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('reference_book_detail') }}/{{ $book->id }}"
                                                class="text-decoration-none text-dark">
                                                <div class="img-container-for-icon">
                                                    <img src="{{ $book->cover }}" alt=""
                                                        class="img-fluid w-100">
                                                    @if ($book->reference_book_type == '220843b8-4f60-4e47-9aca-cf6ea0d54afe')
                                                        <div class="icon">
                                                            <img class="w-50"
                                                                src="{{ asset('web') }}/assets/icon/play.svg"
                                                                alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    @if (auth()->guard('visitor')->check() == true)
                                                        @if ($liked_number->where('book_id', $book->id)->where(
                                                                'visitor_id',
                                                                auth()->guard('visitor')->user()->id)->count() == 1)
                                                            <span class="liked active" style="cursor: pointer"
                                                                data-book_id="{{ $book->id }}">
                                                                <i class="fa-solid fa-heart text-danger"></i>
                                                            </span>{{ $liked_number->where('book_id', $book->id)->count() }}
                                                        @else
                                                            <span class="liked" style="cursor: pointer"
                                                                data-book_id="{{ $book->id }}">
                                                                <i class="fa-regular fa-heart"></i>
                                                            </span>{{ $liked_number->where('book_id', $book->id)->count() }}
                                                        @endif
                                                    @else
                                                        <a class="text-dark text-decoration-none"
                                                            href="{{ url('login') }}"><i
                                                                class="fa-regular fa-heart"></i>
                                                            {{ $liked_number->where('book_id', $book->id)->count() }}</a>
                                                    @endif
                                                    <span class="ms-2">
                                                        <form action="{{ url('reference_download') }}" method="post">
                                                            @csrf
                                                            <input type="text" name="file"
                                                                value="{{ $book->content }}" style="display: none">
                                                            <input type="text" name="name"
                                                                value="{{ $book->name }}" style="display: none">
                                                            <input type="text" name="book_id"
                                                                value="{{ $book->id }}" style="display: none">
                                                            <input type="text" name="book_type"
                                                                value="{{ $book->reference_book_type }}"
                                                                style="display: none">
                                                            @method('POST')
                                                            <button type="submit" data-book_id="{{ $book->id }}"
                                                                class="dropdown-item download" href="#"><i
                                                                    class="fa-solid fa-download"></i>
                                                                {{ $download_number->where('book_id', $book->id)->count() }}
                                                            </button>
                                                        </form>
                                                    </span>
                                                </div>
                                                <div class="dropdown dropstart">
                                                    <a href="" data-bs-toggle="dropdown"><i
                                                            class="bi bi-three-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li>
                                                            <form action="{{ url('reference_download') }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="text" name="file"
                                                                    value="{{ $book->content }}" style="display: none">
                                                                <input type="text" name="name"
                                                                    value="{{ $book->name }}" style="display: none">
                                                                <input type="text" name="book_id"
                                                                    value="{{ $book->id }}" style="display: none">
                                                                <input type="text" name="book_type"
                                                                    value="{{ $book->reference_book_type }}"
                                                                    style="display: none">
                                                                @method('POST')
                                                                <button type="submit"
                                                                    data-book_id="{{ $book->id }}"
                                                                    class="dropdown-item download" href="#"><i
                                                                        class="fa-solid fa-download"></i>
                                                                    Unduh
                                                                </button>
                                                            </form>
                                                        </li>
                                                        <li><a data-book_id="{{ $book->id }}"
                                                                class="dropdown-item share"
                                                                href="whatsapp://send?text={{ url('book/') }}/{{ $book->id }}"><i
                                                                    class="fa-solid
                                                                fa-share-nodes"></i>
                                                                Share</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $book->name }}
                                                </div>
                                                @foreach ($book->authors as $author)
                                                    <p class="card-text m-0">Penulis: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($book->reference_themes as $theme)
                                                    <p class="card-text">Tema: {{ $theme->name }}</p>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="card-body p-1">

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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


                        /* a.page-item.active {
                            color: white;
                            background-color: #3C6EFD !important;
                        } */

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
                    <div class="d-flex justify-content-center">
                        <nav id="pagin" class="paginate-pagination paginate-pagination-1 d-block" data-parent="1">
                            <ul class="d-flex">
                                <li class="page-item prev"><a href="#" data-page="prev"
                                        class="page page-prev deactive prev page-link">
                                        <img src="{{ asset('web') }}/assets/icon/prev-2.svg" alt="">
                                    </a>
                                </li>
                                @for ($i = 0; $i < ceil($reference_books->count() / 20); $i++)
                                    <li><a href="#paginate-{{ $i + 1 }}" data-page="{{ $i + 1 }}"
                                            class="page page-{{ $i + 1 }} page-item">{{ $i + 1 }}</a>
                                    </li>
                                @endfor
                                <li class="page-item next"><a href="#" data-page="next"
                                        class="page page-next-link"><img
                                            src="{{ asset('web') }}/assets/icon/next-2.svg" alt=""></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    {{-- <div class="tab-content mt-5">
                        <div class="tab-pane container active" id="semua">
                            <div class="row row-cols-5">
                                @foreach ($reference_books as $book)
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('/book') }}/{{ $book->id }}"
                                                class="text-decoration-none text-dark">
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
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $book->name }}
                                                </div>
                                                @foreach ($book->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($book->themes as $theme)
                                                    <p class="card-text">Tema: {{ $theme->name }}</p>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="card-body p-1">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @foreach ($themes as $theme)
                            <div class="tab-pane container" id="theme{{ $theme->id }}">
                                <div class="row row-cols-5">
                                    @foreach ($books as $book)
                                        @if ($theme->id == $book->theme)
                                            <div class="col mb-4">
                                                <div class="card p-2">
                                                    <a href="{{ url('/book') }}/{{ $book->id }}"
                                                        class="text-decoration-none text-dark">
                                                        <div class="img-container-for-icon">
                                                            <img src="{{ $book->cover }}" alt=""
                                                                class="img-fluid">
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
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex">
                                                                <span><img
                                                                        src="{{ asset('web') }}/assets/icon/love.svg"
                                                                        alt="">
                                                                    100</span>
                                                                <span><img
                                                                        src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                        alt="">
                                                                    100</span>
                                                            </div>
                                                            <a href=""><i
                                                                    class="bi bi-three-dots-vertical"></i></a>
                                                        </div>
                                                    </a>
                                                    <div class="card-body p-1">
                                                        <div class="card-title fw-bold">
                                                            {{ $book->name }}
                                                        </div>
                                                        @foreach ($book->authors as $author)
                                                            <p class="card-text">Author: {{ $author->name }}</p>
                                                        @endforeach
                                                        @foreach ($book->themes as $theme)
                                                            <p class="card-text">Tema: {{ $theme->name }}</p>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                <div class="card-body p-1">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                    <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
                    <script src="{{ asset('web') }}/assets/js/jquery.paginate.js"></script>
                    <script>
                        $(".paginate").paginate({
                            perPage: 20,
                            paginatePosition: ['bottom'],
                            useHashLocation: false,
                        });
                        @if (auth()->guard('visitor')->check() == true)
                            var visitor_id = "{{ auth()->guard('visitor')->user()->id }}";
                        @else
                            var visitor_id = null;
                        @endif
                        var likeds = $('.liked')
                        for (let i = 0; i < likeds.length; i++) {
                            $(likeds[i]).on('click', function() {
                                var book_id = $(this).data('book_id');
                                if ($(this).hasClass('active') == false) {
                                    $(this).addClass('active');
                                    $(this).html(' <i class="fa-solid fa-heart text-danger"></i>')
                                    var status = "unliked";
                                } else {
                                    $(this).removeClass('active');
                                    $(this).html('<i class="fa-regular fa-heart"></i>')
                                    var status = "liked";
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: "{{ url('reference_liked') }}",
                                    data: {
                                        _method: "POST",
                                        status: status,
                                        book_id: book_id,
                                        visitor_id: visitor_id,
                                        _token: token
                                    },
                                    success: function(hasil) {}
                                });

                            });
                        }

                        // var download = $('.download')
                        // for (let i = 0; i < download.length; i++) {
                        //     $(download[i]).on('click', function() {
                        //         var book_id = $(this).data('book_id');
                        //         $.ajax({
                        //             type: 'POST',
                        //             url: "{{ url('reference_downloaded') }}",
                        //             data: {
                        //                 _method: "POST",
                        //                 book_id: book_id,
                        //                 visitor_id: visitor_id,
                        //                 _token: token
                        //             },
                        //             success: function(hasil) {}
                        //         });
                        //     });
                        // }
                    </script>
