<div class="row row-cols-2 row-cols-md-5 paginate">
    @foreach ($reference_books as $book)
        <div class="col mb-4 item-paginate">
            <div class="card p-2">
                <a href="{{ url('reference_book_detail') }}/{{ $book->id }}" class="text-decoration-none text-dark">
                    <div class="img-container-for-icon">
                        <img src="{{ $book->cover }}" alt="" class="img-fluid w-100">
                        @if ($book->reference_book_type == '220843b8-4f60-4e47-9aca-cf6ea0d54afe')
                            <div class="icon">
                                <img class="w-50" src="{{ asset('web') }}/assets/icon/play.svg" alt="">
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
                                <span class="liked active" style="cursor: pointer" data-book_id="{{ $book->id }}">
                                    <i class="fa-solid fa-heart text-danger"></i>
                                </span>{{ $liked_number->where('book_id', $book->id)->count() }}
                            @else
                                <span class="liked" style="cursor: pointer" data-book_id="{{ $book->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </span>{{ $liked_number->where('book_id', $book->id)->count() }}
                            @endif
                        @else
                            <a class="text-dark text-decoration-none" data-bs-toggle="modal" href="#menyukai"><i
                                    class="fa-regular fa-heart"></i>
                                {{ $liked_number->where('book_id', $book->id)->count() }}</a>
                        @endif
                        <span class="ms-2">
                            <form action="{{ url('reference_download') }}" method="post">
                                @csrf
                                <input type="text" name="file" value="{{ $book->content }}"
                                    style="display: none">
                                <input type="text" name="name" value="{{ $book->name }}" style="display: none">
                                <input type="text" name="book_id" value="{{ $book->id }}" style="display: none">
                                <input type="text" name="book_type" value="{{ $book->reference_book_type }}"
                                    style="display: none">
                                @method('POST')
                                @if (auth()->guard('visitor')->check() == false)
                                    <a href="#mengunduh" data-bs-toggle="modal" type="submit"
                                        data-book_id="{{ $book->id }}" class="dropdown-item" href="#"><i
                                            class="bi bi-download fs-6"></i>
                                        {{ $download_number->where('book_id', $book->id)->count() }}
                                    </a>
                                @else
                                    <button type="submit" data-book_id="{{ $book->id }}"
                                        class="dropdown-item download" href="#"><i
                                            class="bi bi-download fs-6"></i>
                                        {{ $download_number->where('book_id', $book->id)->count() }}
                                    </button>
                                @endif
                            </form>
                        </span>
                    </div>
                    <div class="dropdown dropstart">
                        <a href="" data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li>
                                <form action="{{ url('reference_download') }}" method="post">
                                    @csrf
                                    <input type="text" name="file" value="{{ $book->content }}"
                                        style="display: none">
                                    <input type="text" name="name" value="{{ $book->name }}"
                                        style="display: none">
                                    <input type="text" name="book_id" value="{{ $book->id }}"
                                        style="display: none">
                                    <input type="text" name="book_type" value="{{ $book->reference_book_type }}"
                                        style="display: none">
                                    @method('POST')
                                    @if (auth()->guard('visitor')->check() == false)
                                        <a href="#mengunduh" data-bs-toggle="modal" data-book_id="{{ $book->id }}"
                                            class="dropdown-item download" href="#"><i
                                                class="bi bi-download fs-6"></i>
                                            Unduh
                                        </a>
                                    @else
                                        <button type="submit" data-book_id="{{ $book->id }}" class="dropdown-item"
                                            href="#"><i class="bi bi-download fs-6"></i>
                                            Unduh
                                        </button>
                                    @endif
                                </form>
                            </li>
                            <li><a data-book_id="{{ $book->id }}" class="dropdown-item share"
                                    href="https://wa.me/?text={{ url('book/') }}/{{ $book->id }}"><i
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
<div class="d-flex justify-content-center pagination-container">
</div>
<script src="{{ asset('web') }}/assets/js/jquery.js"></script>
<script src="{{ asset('web') }}/assets/js/jquery.simplePagination.js"></script>
<script>
    var items = $(".item-paginate");
    var numItems = items.length;
    var perPage = 10;

    items.slice(perPage).hide();

    $('.pagination-container').pagination({
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

    var share = $('.share')
    for (let i = 0; i < share.length; i++) {
        $(share[i]).on('click', function() {
            var book_id = $(this).data('book_id');
            $.ajax({
                type: 'POST',
                url: "{{ url('reference_share') }}",
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
</script>
