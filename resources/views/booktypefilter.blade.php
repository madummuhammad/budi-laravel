<h3 class="mt-5 mb-3 fw-bold">Hasil Pencarian {{ $book_types->name }}</h3>
<div class="row row-cols-2 row-cols-md-5">
    @foreach ($books as $book)
    <div class="col mb-4">
        <div class="card p-2">
            <a href="{{ url('/book') }}/{{ $book->id }}" class="text-decoration-none text-dark">
                <div class="img-container-for-icon">
                    <img src="{{ $book->cover }}" alt="" class="img-fluid w-100">
                    @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                    <div class="icon">
                        <img src="{{ asset('web') }}/assets/icon/mic.svg" alt="">
                    </div>
                    @endif
                    @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                    <div class="icon">
                        <img src="{{ asset('web') }}/assets/icon/play.svg" alt="">
                    </div>
                    @endif
                </div>
            </a>
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    @if (auth()->guard('visitor')->check() == true)
                    @if (
                    $liked_number->where('book_id', $book->id)->where(
                    'visitor_id',
                    auth()->guard('visitor')->user()->id)->count() == 1)
                    <span class="liked active" style="cursor: pointer" data-book_id="{{ $book->id }}">
                        <i class="fa-solid fa-heart text-danger"></i>
                    </span>{{ $liked_number->where('book_id', $book->id)->count() }}
                    @else
                    <span class="liked" style="cursor: pointer" data-book_id="{{ $book->id }}">
                        <i class="fa-regular fa-heart"></i>
                    </span>{{ $liked_number->where('book_id', $book->id)->count() }}
                    @endif
                    @else
                    <a data-bs-toggle="modal" class="text-dark text-decoration-none" href="#menyukai"><i
                        class="fa-regular fa-heart"></i>
                        {{ $liked_number->where('book_id', $book->id)->count() }}</a>
                        @endif
                        <span class="ms-1"><img class="pb-1" src="{{ asset('web') }}/assets/icon/little-book.svg"
                            alt="">
                            {{ $read_number->where('book_id', $book->id)->count() }} </span>
                        </div>
                        <style>
                            .dropdown-item {
                                cursor: pointer;
                            }
                        </style>
                        <div class="dropdown dropstart">
                            <a href="" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    @if (auth()->guard('visitor')->check() == true)
                                    @php
                                    $visitor_id = auth()
                                    ->guard('visitor')
                                    ->user()->id;
                                    @endphp
                                    <a class="dropdown-item saved @foreach ($book->mylibraries->where('visitor_id', $visitor_id) as $mylibrary)
                                        @if ($mylibrary->saved == 1)
                                        on
                                        @endif @endforeach"
                                        data-bookid="{{ $book->id }}">
                                        @if (
                                        $book->mylibraries->where('book_id', $book->id)->where('saved', 1)->where(
                                        'visitor_id',
                                        auth()->guard('visitor')->user()->id)->count() == 1)
                                        <i class="fa-solid fa-bookmark"></i>
                                        Disimpan
                                        @else
                                        <i class="fa-regular fa-bookmark"></i>
                                        Baca Nanti
                                        @endif
                                    </a>
                                    @else
                                    <a data-bs-toggle="modal" href="#menyimpan" class="dropdown-item">
                                        <i class="fa-regular fa-bookmark"></i>
                                        Baca Nanti
                                    </a>
                                    @endif
                                </li>
                                <li>
                                    <form action="{{ url('download') }}" method="post">
                                        @csrf
                                        <input type="text" name="file" value="{{ $book->content }}"
                                        style="display: none">
                                        <input type="text" name="name" value="{{ $book->name }}"
                                        style="display: none">
                                        <input type="text" name="book_type" value="{{ $book->book_type }}"
                                        style="display: none">
                                        @method('POST')
                                        <button type="submit" data-book_id="{{ $book->id }}"
                                            class="dropdown-item download" href="#"><i
                                            class="bi bi-download fs-6"></i>
                                        Unduh</button>
                <!--                     @if (auth()->guard('visitor')->check() == false)
                                        <a href="#mengunduh" data-bs-toggle="modal" type="submit"
                                            data-book_id="{{ $book->id }}" class="dropdown-item download"
                                            href="#"><i class="bi bi-download fs-6"></i>
                                            Unduh</a>
                                            @else -->
                                            <!-- @endif -->
                                        </form>
                                    </li>
                                    <li><a data-book_id="{{ $book->id }}" target="_blank" class="dropdown-item share"
                                        href="https://wa.me/?text={{ url('book/') }}/{{ $book->id }}"><i
                                        class="fa-solid
                                        fa-share-nodes"></i>
                                    Share</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body p-1">
                            <div class="card-title fw-bold"
                            style="white-space:nowrap; overflow:hidden; text-overflow: ellipsis; width:100%">
                            {{ $book->name }}
                        </div>
                        @foreach ($book->authors as $author)
                        <p class="card-text m-0"
                        style="white-space:nowrap; overflow:hidden; text-overflow: ellipsis; width:100%">
                        Penulis: {{ $author->name }}</p>
                        @endforeach
                        @foreach ($book->themes as $theme)
                        <p class="card-text m-0"
                        style="white-space:nowrap; overflow:hidden; text-overflow: ellipsis; width:100%">
                        Tema: {{ $theme->name }}</p>
                        @endforeach

                    </div>
                </div>
                <div class="card-body p-1">
                </div>
            </div>
            @endforeach
            {{-- @foreach ($themes as $theme)
            <div class="tab-pane container" id="theme{{ $theme->id }}">
                <div class="row row-cols-5">
                    @foreach ($books as $book)
                    @if ($theme->id == $book->theme)
                    <div class="col mb-4">
                        <div class="card p-2">
                            <a href="{{ url('/book') }}/{{ $book->id }}"
                                class="text-decoration-none text-dark">
                                <div class="img-container-for-icon">
                                    <img src="{{ $book->cover }}" alt="" class="img-fluid">
                                    @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    <div class="icon">
                                        <img src="{{ asset('web') }}/assets/icon/mic.svg" alt="">
                                    </div>
                                    @endif
                                    @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    <div class="icon">
                                        <img src="{{ asset('web') }}/assets/icon/play.svg" alt="">
                                    </div>
                                    @endif
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt="">
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
                                <p class="card-text">Penulis: {{ $author->name }}</p>
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
            @endforeach --}}
            @csrf
        </div>
<!--         <div class="d-flex justify-content-center pagination-container light-theme simple-pagination">
            <ul>
                <li class="disabled">
                    <span class="current prev">g</span>
                </li>
                <li class="active">
                    <span class="current">1</span>
                </li>
                <li class="disabled">
                    <span class="current next">g</span>
                </li>
            </ul>
        </div> -->
        <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
        <!-- <script src="{{ asset('web') }}/assets/js/jquery.simplePagination.js"></script> -->
        <script>
            $(document).ready(function() {
        // var items = $(".item-paginate");
        // var numItems = 20;
        // if (window.screen.width < 768) {
        //     var perPage = 4;
        // } else {
        //     var perPage = 10;

        // }

        // items.slice(perPage).hide();

        // $('.pagination-container').pagination({
        //     items: numItems,
        //     itemsOnPage: perPage,
        //     prevText: "g",
        //     nextText: "g",
        //     onPageClick: function(pageNumber) {
        //         var showFrom = perPage * (pageNumber - 1);
        //         var showTo = showFrom + perPage;
        //         items.hide().slice(showFrom, showTo).show();
        //     }
        // });

        var saved = $(".saved");
        @if (auth()->guard('visitor')->check() == true)
        var visitor_id = "{{ auth()->guard('visitor')->user()->id }}";
        @else
        var visitor_id = null;
        @endif
        var token = $("input[name=_token]").val();
        for (let i = 0; i < saved.length; i++) {
            $(saved[i]).on('click', function() {
                var book_id = $(this).data('bookid');
                if ($(this).hasClass('on') == false) {
                    $(this).addClass('on');
                    $(this).html(' <i class="fa-solid fa-bookmark"></i> Disimpan')
                    var status = "unsaved";
                } else {
                    $(this).removeClass('on');
                    var status = "saved";
                    $(this).html(' <i class="fa-regular fa-bookmark"></i> Baca Nanti')
                }
                $.ajax({
                    type: 'POST',
                    url: "{{ url('saved') }}",
                    data: {
                        _method: "POST",
                        status: status,
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {
                        console.log(hasil);
                    }
                });
            })
        }
        var download = $('.download')
        for (let i = 0; i < download.length; i++) {
            $(download[i]).on('click', function() {
                var book_id = $(this).data('book_id');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('downloaded') }}",
                    data: {
                        _method: "POST",
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {}
                });
            });
        }

        var share = $('.share')
        for (let i = 0; i < share.length; i++) {
            $(share[i]).on('click', function() {
                var book_id = $(this).data('book_id');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('share') }}",
                    data: {
                        _method: "POST",
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {}
                });
            });
        }

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
                    url: "{{ url('liked') }}",
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
    })
</script>
