@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div class="dash"></div>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class=" text-decoration-none" href="{{ url('/') }}">Beranda</a></li>
                @foreach ($book_detail->book_types as $book_type)
                    <li class="breadcrumb-item"><a class="text-decoration-none"
                            href="{{ url('book_type/') . '/' . $book_type->id }}">{{ $book_type->name }}</a>
                @endforeach
                </li>
                <li class="breadcrumb-item active">{{ $book_detail->name }}</li>
            </ol>
        </nav>
        <div class="row mt-3">
            <div class="col-12 col-md-3">
                <img class="img-fluid w-100" src="{{ $book_detail->cover }}" alt="">
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="d-flex align-items-center">
                        <span
                            class="d-flex align-items-center me-3 @if (auth()->guard('visitor')->check() == true) @if ($likeds) active @endif
                        @endif "
                            id="liked" style="cursor: pointer"><span class="pe-1" id="liked-icon">
                                @if (auth()->guard('visitor')->check() == true)
                                    @if ($likeds)
                                        <i class="fa-solid fa-heart text-danger"></i>
                                    @else
                                        <i class="fa-regular fa-heart"></i>
                                    @endif
                                @else
                                    <a href="{{ url('login') }}" class="text-dark"><i class="fa-regular fa-heart"></i></a>
                                @endif
                            </span>
                            {{ $liked_number }}</span>
                        <span class="d-flex align-items-center me-3"><img
                                src="{{ asset('web') }}/assets/icon/little-book.svg" class="me-1" alt="">
                            {{ $read_number }}</span>
                        <span class="d-flex align-items-center me-3"><img src="{{ asset('web') }}/assets/icon/comment.svg"
                                class="me-1" alt="">
                            {{ $comment_number }}</span>
                    </div>
                    <span class="d-flex">
                        <img class="img-fluid" src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        {{ number_format($ratting_number, 1) }}
                    </span>
                </div>
                <div class="row">
                    <div class="col-4 mb-2">
                        <span>Pengarang</span>
                    </div>
                    <div class="col-8 mb-2">
                        @foreach ($book_detail->authors as $author)
                            <span>: {{ $author->name }}</span>
                        @endforeach
                    </div>
                    <div class="col-4 mb-2">
                        <span>Tema</span>
                    </div>
                    <div class="col-8 mb-2">
                        @foreach ($book_detail->themes as $theme)
                            <span>: {{ $theme->name }}</span>
                        @endforeach
                    </div>
                    <div class="col-4 mb-2">
                        <span>Halaman</span>
                    </div>
                    <div class="col-8 mb-2">
                        <span>: {{ $book_detail->page }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-12 book-detail-content">
                <div class="row d-md-flex justify-content-between align-items-start">
                    <div class="col-9">
                        <h1 class="fw-bold mb-5">{{ $book_detail->name }}</h1>
                    </div>
                    <div class="col-3 d-flex justify-content-end pt-2">
                        <a class="mx-2 text-dark" id="liked-top" style="cursor: pointer">
                            <span id="liked-top-icon">
                                @if (auth()->guard('visitor')->check() == true)
                                    @if ($likeds)
                                        <i class="fa-solid fa-heart text-danger"></i>
                                    @else
                                        <i class="fa-regular fa-heart"></i>
                                    @endif
                                @else
                                    <a href="{{ url('login') }}" class="text-dark"><i class="fa-regular fa-heart"></i></a>
                                @endif
                            </span>
                        </a>
                        <a data-book_id="{{ $book_detail->id }}" class="dropdown-item share ms-3"
                            href="whatsapp://send?text={{ url('book/') }}/{{ $book_detail->id }}"><i
                                class="fa-solid fa-share-nodes"></i>
                        </a>
                    </div>
                </div>
                @php
                    echo $book_detail->sinopsis;
                @endphp
                @csrf
                @if ($book_detail->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                    <div class="d-flex align-items-center">
                        <span class="me-5">Dengarkan</span>
                        <div class="audio-player pt-4" data-audio="../storage/{{ $book_detail->content }}"
                            style="margin: 0 auto">
                            <div class="controls">
                                <div class="play-container shows"
                                    data-status="@if (auth()->guard('visitor')->check() == true) @if ($reads) {{ $reads->read }}
                                @else
                                0 @endif
                            @endif">
                                    <div class="toggle-play play">
                                    </div>
                                </div>
                                <div class="timeline d-flex justify-content-start">
                                    <div class="progress"></div>
                                </div>
                                <div class="volume-container">
                                    <div class="volume-button">
                                        <div class="volume icono-volumeMedium"></div>
                                    </div>

                                    <div class="volume-slider">
                                        <div class="volume-percentage"></div>
                                    </div>
                                </div>
                                <div class="time">
                                    <div class="current">0:00</div>
                                    <div class="divider">/</div>
                                    <div class="length"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($book_detail->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                    {{-- audio --}}
                    <div class="baca-button-group d-md-flex mt-5 pt-5">
                        <form class="w-100 me-4" action="{{ url('download') }}" method="post">
                            @csrf
                            <input type="text" name="file" value="{{ $book_detail->content }}" style="display: none">
                            <input type="text" name="name" value="{{ $book_detail->name }}" style="display: none">
                            <input type="text" name="book_type" value="{{ $book_detail->book_type }}"
                                style="display: none">
                            @method('POST')
                            <button
                                class="w-100 my-2 btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2 me-4 w-100 download"><i
                                    class="bi bi-download fs-5 me-3"></i> Unduh</button>
                        </form>
                        <button type="button"
                            class="w-100 my-2 btn btn-outline-blue d-flex justify-content-center align-items-center
                        py-2 me-4"
                            id="saved"
                            @if (auth()->guard('visitor')->check() == true) @if ($saveds) status="saved"
                            style="background-color: grey; color:white"
                                @else
                                status="unsaved" @endif
                            @endif
                            ><i class="bi bi-bookmark fs-5 me-3"></i> Simpan</button>

                        @if ($book_detail['book_pdfs'] !== null)
                            <button id="show_book" data-book="../storage/{{ $book_detail['book_pdfs']->content }}"
                                class="w-100 my-2 btn btn-outline-blue d-flex justify-content-center align-items-center
                                            py-2 me-4"
                                data-status="@if (auth()->guard('visitor')->check() == true) @if ($reads) {{ $reads->read }}
                                @else
                                0 @endif
                            @endif"><i
                                    class="bi bi-book me-3 fs-5"></i> Baca
                                Versi Buku</button>
                        @endif

                    </div>
                @elseif($book_detail->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                    {{-- video --}}
                    <div class="baca-button-group d-md-flex mt-5 pt-5">
                        <button
                            class="w-100 shows my-2 btn btn-primary bg-blue text-white d-flex justify-content-center align-items-center py-2 me-4"
                            id="show_si_saloi" data-bs-toggle="modal" data-bs-target="#tonton-video"><img
                                src="{{ asset('web/') }}/assets/icon/play-2.svg" alt=""
                                data-status="@if (auth()->guard('visitor')->check() == true) @if ($reads) {{ $reads->read }}
                                @else
                                0 @endif
                            @endif">
                            Tonton
                            Sekarang</button>
                        <form class="w-100 me-4" action="{{ url('download') }}" method="post">
                            @csrf
                            <input type="text" name="file" value="{{ $book_detail->content }}"
                                style="display: none">
                            <input type="text" name="name" value="{{ $book_detail->name }}"
                                style="display: none">
                            <input type="text" name="book_type" value="{{ $book_detail->book_type }}"
                                style="display: none">
                            @method('POST')
                            <button
                                class="w-100 my-2 btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2 me-4 w-100 download"><i
                                    class="bi bi-download fs-5 me-3"></i> Unduh</button>
                        </form>
                        <button
                            class="w-100 my-2 btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2 me-4"
                            id="saved"
                            @if (auth()->guard('visitor')->check() == true) @if ($saveds) status="saved"
                            style="background-color: grey; color:white"
                                @else
                                status="unsaved" @endif
                            @endif><i class="bi bi-bookmark fs-5 me-3"></i> Simpan</button>
                        @if ($book_detail['book_pdfs'] !== null)
                            <button
                                class="w-100 my-2 btn btn-outline-blue d-flex justify-content-center align-items-center
                                py-2"
                                id="show_book" data-book="../storage/{{ $book_detail['book_pdfs']->content }}"><i
                                    class="bi bi-book me-3 fs-5"
                                    data-status="@if (auth()->guard('visitor')->check() == true) @if ($reads) {{ $reads->read }}
                                @else
                                0 @endif
                            @endif"></i>
                                Baca
                                Versi Buku</button>
                        @endif

                        <div class="modal fade" id="tonton-video" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex justify-content-center">
                                        <video controls style="width: 100%;" autoplay muted>
                                            <source src="{{ $book_detail->content }}" type="video/mp4">
                                            Your browser does not support HTML video.
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="baca-button-group d-md-flex mt-5 pt-5">
                        <button
                            class="w-100 my-2 btn bg-blue text-white d-flex justify-content-center align-items-center py-2 me-4"
                            id="show_book" data-book="../storage/{{ $book_detail->content }}"
                            data-status="@if (auth()->guard('visitor')->check() == true) @if ($reads) {{ $reads->read }}
                                @else
                                0 @endif
                            @endif "><i
                                class="bi bi-book me-3 fs-5"></i>
                            Baca
                            Sekarang</button>
                        <form class="me-4 w-100" action="{{ url('download') }}" method="post">
                            @csrf
                            <input type="text" name="file" value="{{ $book_detail->content }}"
                                style="display: none">
                            <input type="text" name="name" value="{{ $book_detail->name }}"
                                style="display: none">
                            @method('POST')
                            <button
                                class="w-100 my-2 btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2 me-4 download"><i
                                    class="bi bi-download fs-5 me-3"></i> Unduh</button>
                        </form>
                        <button
                            class="w-100 my-2 btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2"
                            id="saved"
                            @if (auth()->guard('visitor')->check() == true) @if ($saveds) status="saved"
                            style="background-color: grey; color:white"
                                @else
                                status="unsaved" @endif
                            @endif><i class="bi bi-bookmark fs-5 me-3"></i> Simpan</button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mt-5 row-comment">
            <form action="{{ url('comment') }}" method="POST">
                @csrf
                @method('POST')
                <input type="text" name="id" value="{{ $book_detail->id }}" hidden>
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
                                        <h5 class="modal-title" id="staticBackdropLabel">Masuk/ daftar untuk memberikan
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
            @endforeach
            <div class="row mt-5 mb-5" id>
                <div class="header d-flex justify-content-between" style="padding-right: 35px;">
                    <h2 class="fw-bold">Referensi Buku Sejenis</h2>
                    <a href="{{ url('book_type/') }}/{{ $book_type->id }}">Lihat Semua</a>
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
        $(document).ready(function() {
            var token = $("input[name=_token]").val();
            var book_id = "{{ $book_detail->id }}";
            @if (auth()->guard('visitor')->check() == true)
                var visitor_id = "{{ auth()->guard('visitor')->user()->id }}";
            @else
                var visitor_id = null;
            @endif
            $("#saved").on('click', function() {
                window.location = "{{ url('login') }}";
                @if (auth()->guard('visitor')->check() == false)
                @endif
                var saved = $(this).attr("status");
                $.ajax({
                    type: 'POST',
                    url: "{{ url('saved') }}",
                    data: {
                        _method: "POST",
                        status: saved,
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {
                        if (saved == "unsaved") {
                            $("#saved").removeAttr("status");
                            $("#saved").attr("status", "saved");
                            $("#saved").css("background-color", "grey");
                            $("#saved").css("color", "white");
                        } else {
                            $("#saved").removeAttr("status");
                            $("#saved").removeAttr("style");
                            $("#saved").attr("status", "unsaved");
                        }
                    }
                });
            })

            $("#liked").on('click', function() {
                var liked = $("#liked").hasClass("active");
                if (liked == false) {
                    var status = "unliked";
                } else {
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
                    success: function(hasil) {
                        if (liked == false) {
                            $("#liked").addClass('active');
                            $("#liked #liked-icon").html(
                                `<i class="fa-solid fa-heart text-danger"></i>`)
                        } else {
                            $("#liked").removeClass('active');
                            $("#liked #liked-icon").html(`<i class="fa-regular fa-heart"></i>`)
                        }
                    }
                });

            });

            $("#liked-top").on('click', function() {
                var liked_top = $("#liked-top").hasClass("active");
                if (liked_top == false) {
                    var status = "unliked";
                } else {
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
                    success: function(hasil) {
                        if (liked_top == false) {
                            $("#liked-top").addClass('active');
                            $("#liked-top #liked-top-icon").html(
                                `<i class="fa-solid fa-heart text-danger"></i>`)
                        } else {
                            $("#liked-top").removeClass('active');
                            $("#liked-top #liked-top-icon").html(
                                `<i class="fa-regular fa-heart"></i>`)
                        }
                    }
                });

            });


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

            $("#show_book").on('click', function() {
                var status = $(this).data('status');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('being_read') }}",
                    data: {
                        _method: "POST",
                        status: status,
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {
                        if (status == 0) {
                            $("#show_book").attr("data-status", '1');
                        } else if (status == 3) {
                            $("#show_book").attr("data-status", '1');
                        } else {
                            $("#show_book").attr("data-status", status);
                        }
                    }
                });
            });

            $(".shows").on('click', function() {
                var status = $(this).data('status');
                $.ajax({
                    type: 'POST',
                    url: "{{ url('being_read') }}",
                    data: {
                        _method: "POST",
                        status: status,
                        book_id: book_id,
                        visitor_id: visitor_id,
                        _token: token
                    },
                    success: function(hasil) {
                        if (status == 0) {
                            $(".show").attr("data-status", '1');
                        } else if (status == 3) {
                            $(".show").attr("data-status", '1');
                        } else {
                            $(".show").attr("data-status", status);
                        }
                    }
                });
            });

            $(".download").on('click', function() {
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
        })
    </script>
@endsection
