@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div class="dash"></div>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class=" text-decoration-none" href="{{ url('/') }}">Beranda</a></li>
                @foreach ($reference_book->reference_book_types as $book_type)
                    <li class="breadcrumb-item"><a class="text-decoration-none"
                            href="{{ url('book_type/') . '/' . $book_type->id }}">{{ $book_type->name }}</a>
                @endforeach
                <li class="breadcrumb-item active">{{ $reference_book->name }}</li>
            </ol>
        </nav>
        <div class="row mt-3">
            <div class="col-md-3 col-12">
                <div class="img-container-for-icon">
                    <img class="img-fluid w-100" src="{{ $reference_book->cover }}" alt="">
                    @if ($reference_book->reference_book_type == '220843b8-4f60-4e47-9aca-cf6ea0d54afe')
                        <div class="icon">
                            <img class="w-50" src="{{ asset('web') }}/assets/icon/play.svg" alt="">
                        </div>
                    @endif
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="d-flex ">
                        @if (auth()->guard('visitor')->check() == true)
                            @if ($liked_number->where(
                                    'visitor_id',
                                    auth()->guard('visitor')->user()->id)->count() == 1)
                                <span class="liked active" style="cursor: pointer" data-book_id="{{ $reference_book->id }}">
                                    <i class="fa-solid fa-heart text-danger"></i>
                                </span> {{ $liked_number->count() }}
                            @else
                                <span class="liked" style="cursor: pointer" data-book_id="{{ $reference_book->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </span> {{ $liked_number->count() }}
                            @endif
                        @else
                            <a data-bs-toggle="modal" class="text-dark text-decoration-none" href="#menyukai"><i
                                    class="fa-regular fa-heart"></i>
                                {{ $liked_number->count() }}</a>
                        @endif
                        <span class="ms-2">
                            <form action="{{ url('reference_download') }}" method="post">
                                @csrf
                                <input type="text" name="file" value="{{ $reference_book->content }}"
                                    style="display: none">
                                <input type="text" name="name" value="{{ $reference_book->name }}"
                                    style="display: none">
                                <input type="text" name="book_id" value="{{ $reference_book->id }}"
                                    style="display: none">
                                @method('POST')
                                @if (auth()->guard('visitor')->check() == true)
                                    <button type="submit" data-book_id="{{ $reference_book->id }}"
                                        class="dropdown-item download me-1" href="#"><i
                                            class="bi bi-download fs-6"></i>
                                        {{ $download_number->where('book_id', $reference_book->id)->count() }}
                                    </button>
                                @else
                                    <a type="button" data-bs-toggle="modal" data-book_id="{{ $reference_book->id }}"
                                        class="dropdown-item download me-1" href="#mengunduh"><i
                                            class="bi bi-download fs-6"></i>
                                        {{ $download_number->where('book_id', $reference_book->id)->count() }}</a>
                                @endif
                            </form>
                        </span>
                        <span class="d-flex align-items-center me-3"><img src="{{ asset('web') }}/assets/icon/comment.svg"
                                class="me-1" alt="">
                            {{ $comment_number }}</span>
                    </div>
                    <span class="d-flex">
                        <img src="{{ url('web') }}/assets/icon/star.svg" alt="">
                        {{ number_format($ratting_number, 1) }}
                    </span>
                </div>
                <div class="row">
                    <div class="col-4 mb-2">
                        <span>Pengarang</span>
                    </div>
                    <div class="col-8 mb-2">
                        @foreach ($reference_book->authors as $author)
                            <span>: {{ $author->name }}</span>
                        @endforeach
                    </div>
                    <div class="col-4 mb-2">
                        <span>Tema</span>
                    </div>
                    <div class="col-8 mb-2">
                        @foreach ($reference_book->reference_themes as $theme)
                            <span>: {{ $theme->name }}</span>
                        @endforeach
                    </div>
                    <div class="col-4 mb-2">
                        <span>Halaman</span>
                    </div>
                    <div class="col-8 mb-2">
                        <span>: {{ $reference_book->page }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-12 book-detail-content">
                <div class="row d-md-flex justify-content-between align-items-start">
                    <div class="col-9">
                        <h1 class="fw-bold mb-5">{{ $reference_book->name }}</h1>
                    </div>
                    <div class="col-3 d-flex justify-content-end pt-2">
                        <a class="mx-2 text-dark" id="liked-top" style="cursor: pointer">
                            <span id="liked-top-icon" class="liked">
                                @if (auth()->guard('visitor')->check() == true)
                                    @if ($liked_number->where(
                                            'visitor_id',
                                            auth()->guard('visitor')->user()->id)->count() == 1)
                                        <i class="fa-solid fa-heart text-danger"></i>
                                    @else
                                        <i class="fa-regular fa-heart"></i>
                                    @endif
                                @else
                                    <a href="#menyukai" data-bs-toggle="#menyukai" class="text-dark"><i
                                            class="fa-regular fa-heart"></i></a>
                                @endif
                            </span>
                        </a>
                        <a class="mx-2 text-dark share" data-book_id="{{ $reference_book->id }}"
                            class="dropdown-item share"
                            href="whatsapp://send?text={{ url('book/') }}/{{ $reference_book->id }}"><i
                                class="fa-solid fa-share-nodes"></i>
                        </a>
                    </div>
                </div>
                @php
                    echo $reference_book->sinopsis;
                @endphp
                <div class="baca-button-group d-flex mt-5 pt-5">
                    <form class="w-100" action="{{ url('reference_download') }}" method="post">
                        @csrf
                        <input type="text" name="file" value="{{ $reference_book->content }}"
                            style="display: none">
                        <input type="text" name="name" value="{{ $reference_book->name }}" style="display: none">
                        <input type="text" name="book_id" value="{{ $reference_book->id }}" style="display: none">
                        <input type="text" name="book_type" value="{{ $reference_book->reference_book_type }}"
                            style="display: none">
                        @method('POST')
                        <div class="row">
                            <div class="col-12 col-md-3">
                                @if (auth()->guard('visitor')->check() == false)
                                    <a data-bs-toggle="modal" href="#mengunduh" type="submit"
                                        class="btn w-100 bg-blue d-flex justify-content-center align-items-center
                                        py-2 me-4 col-12"><i
                                            class="bi bi-download fs-5 me-3"></i> Unduh</a>
                                @else
                                    <button type="submit"
                                        class="btn w-100 bg-blue d-flex justify-content-center align-items-center
                                        py-2 me-4 col-12"><i
                                            class="bi bi-download fs-5 me-3"></i> Unduh</button>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="modal fade" id="tonton-video" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    <video controls style="width: 100%;">
                                        <source src="assets/img/buku_video/selamat_tidur_kola.mp4" type="video/mp4">
                                        <!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
                                        Your browser does not support HTML video.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 row-comment">
            <form action="{{ url('reference_comment') }}" method="POST">
                @csrf
                @method('POST')
                <input type="text" name="id" value="{{ $reference_book->id }}" hidden>
                <h3 class="fw-bold">Berikan Komentarmu: </h3>
                <div class="comment-profile mb-3 mt-4">
                    @if (auth()->guard('visitor')->check() == true)
                        <img src="{{ auth()->guard('visitor')->user()->image }}" alt="">
                        <span class="fw-bold fs-4 ms-3">{{ auth()->guard('visitor')->user()->name }}</span>
                    @else
                        <img src="{{ url('storage/image/default.jpg') }}" alt="">
                        <span class="fw-bold fs-4 ms-3">Anonim</span>
                    @endif
                </div>
                <div class="ratting">
                    <div class="star d-inline nonactive" data-star='1'>
                        <i class="fa-regular fa-star fs-3"></i>
                    </div>
                    <div class="star d-inline nonactive" data-star='2'>
                        <i class="fa-regular fa-star fs-3"></i>
                    </div>
                    <div class="star d-inline nonactive" data-star='3'>
                        <i class="fa-regular fa-star fs-3"></i>
                    </div>
                    <div class="star d-inline nonactive" data-star='4'>
                        <i class="fa-regular fa-star fs-3"></i>
                    </div>
                    <div class="star d-inline nonactive" data-star='5'>
                        <i class="fa-regular fa-star fs-3"></i>
                    </div>
                    <input type="text" name="star" value="0" hidden>
                    <span class="ms-3"> Nilai</span>
                </div>
                <textarea class="form-control mt-3" name="comment" id="" cols="30" rows="6"></textarea>
                <div>
                    @if (auth()->guard('visitor')->check() == true)
                        <button type="submit" class="btn bg-blue text-white px-4 py-2 mt-3">Kirim</button>
                    @else
                        <button type="button" class="btn bg-blue text-white px-4 py-2 mt-3" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Kirim
                        </button>

                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Masuk/ daftar untuk
                                            memberikan
                                            komentar</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <a href="{{ url('login') }}" type="button" class="btn btn-primary">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>

        <div class="row row-review mt-5">
            @if ($comments->count() !== 0)
                <h3 class="fw-bold">Komentar Terbaru</h3>
            @endif
            @foreach ($comments as $comment)
                <div class="card-comment mb-4">
                    <div class="d-block d-md-flex card-comment-header col-12 col-md-5">
                        <div class="d-md-flex d-block align-items-center">
                            <img src="{{ $comment->visitors->image }}" alt="">
                            <span class="fs-5 fw-bold ms-3">{{ $comment->visitors->name }}</span>
                        </div>
                        <div class="d-flex ratting">
                            @for ($i = 0; $i < $comment->star; $i++)
                                <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                            @endfor
                            <span>{{ $comment->star }}</span>
                        </div>
                    </div>
                    <div class="card-comment-body mt-3">
                        <p>{{ $comment->comment }}</p>
                    </div>
                </div>
                @csrf
            @endforeach
            <div class="row mt-5 mb-5" id>
                <div class="header d-flex justify-content-between" style="padding-right: 35px;">
                    <h2 class="fw-bold">Referensi Buku Sejenis</h2>
                    <a href="{{ url('reference_book/') }}/{{ $reference_book->reference_book_type }}">Lihat Semua</a>
                </div>
                <div class="col-12">
                    <div class="row row-cols-md-6 row-cols-1">
                        @foreach ($related_books as $related_book)
                            <div class="col">
                                <img class="img-fluid w-100" src="{{ $related_book->cover }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
    <script>
        var token = $("input[name=_token]").val()
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
                alert(token)
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
@endsection
