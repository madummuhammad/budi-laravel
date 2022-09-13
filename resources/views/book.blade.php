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
            <div class="col-3">
                <img class="img-fluid" src="{{ $book_detail->cover }}" alt="">
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="d-flex ">
                        <span class="d-flex align-items-center me-3"><img src="{{ asset('web') }}/assets/icon/love.svg"
                                class="me-1" alt="">
                            100</span>
                        <span class="d-flex align-items-center me-3"><img
                                src="{{ asset('web') }}/assets/icon/little-book.svg" class="me-1" alt="">
                            100</span>
                        <span class="d-flex align-items-center me-3"><img src="{{ asset('web') }}/assets/icon/comment.svg"
                                class="me-1" alt="">
                            100</span>
                    </div>
                    <span class="d-flex">
                        <img class="img-fluid" src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        4.9
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
            <div class="col-9 ps-3">
                <h1 class="fw-bold mb-5">{{ $book_detail->name }}</h1>
                @php
                    echo $book_detail->sinopsis;
                @endphp
                @if ($book_detail->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                    <div class="d-flex align-items-center">
                        <span class="me-5">Dengarkan</span>
                        <div class="audio-player" data-audio="../storage/{{ $book_detail->content }}"
                            style="margin: 0 auto">
                            <div class="controls">
                                <div class="play-container">
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
                    <div class="baca-button-group d-flex mt-5 pt-5">
                        <button
                            class="btn btn-outline-blue d-flex justify-content-center align-items-center
                        py-2 me-4"><i
                                class="bi bi-download fs-5 me-3"></i> Unduh</button>
                        <button
                            class="btn btn-outline-blue d-flex justify-content-center align-items-center
                        py-2 me-4"><i
                                class="bi bi-bookmark fs-5 me-3"></i> Simpan</button>
                        @if ($book_detail['book_pdfs'] !== null)
                            <button id="show_book" data-book="../storage/{{ $book_detail['book_pdfs']->content }}"
                                class="btn btn-outline-blue d-flex justify-content-center align-items-center
                                            py-2 me-4"><i
                                    class="bi bi-book me-3 fs-5"></i> Baca
                                Versi Buku</button>
                        @endif

                    </div>
                @elseif($book_detail->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                    <div class="baca-button-group d-flex mt-5 pt-5">
                        <button class="btn bg-blue text-white d-flex justify-content-center align-items-center py-2 me-4"
                            id="show_si_saloi" data-bs-toggle="modal" data-bs-target="#tonton-video"><img
                                src="{{ asset('web/') }}/assets/icon/play-2.svg" alt=""> Tonton
                            Sekarang</button>
                        <button
                            class="btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2 me-4"><i
                                class="bi bi-download fs-5 me-3"></i> Unduh</button>
                        <button
                            class="btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2 me-4"><i
                                class="bi bi-bookmark fs-5 me-3"></i> Simpan</button>
                        <button
                            class="btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2"
                            id="show_book" data-book="../storage/{{ $book_detail['book_pdfs']->content }}"><i
                                class="bi bi-book me-3 fs-5"></i> Baca
                            Versi Buku</button>

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
                                            <source src="../storage/{{ $book_detail->content }}" type="video/mp4">
                                            <!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
                                            Your browser does not support HTML video.
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="baca-button-group d-flex mt-5 pt-5">
                        <button class="btn bg-blue text-white d-flex justify-content-center align-items-center py-2 me-4"
                            id="show_book" data-book="../storage/{{ $book_detail->content }}"><i
                                class="bi bi-book me-3 fs-5"></i>
                            Baca
                            Sekarang</button>
                        <button
                            class="btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2 me-4"><i
                                class="bi bi-download fs-5 me-3"></i> Unduh</button>
                        <button
                            class="btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2"><i
                                class="bi bi-bookmark fs-5 me-3"></i> Simpan</button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row mt-5 row-comment">
            <h3 class="fw-bold">Berikan Komentarmu: </h3>
            <div class="comment-profile mb-3 mt-4">
                <img src="{{ asset('web') }}/assets/img/profile.png" alt="">
                <span class="fw-bold fs-4 ms-3">Febri</span>
            </div>
            <div class="ratting">
                <i class="fa-regular fa-star fs-3"></i>
                <i class="fa-regular fa-star fs-3"></i>
                <i class="fa-regular fa-star fs-3"></i>
                <i class="fa-regular fa-star fs-3"></i>
                <i class="fa-regular fa-star fs-3"></i>
                <span class="ms-3"> Nilai</span>
            </div>
            <textarea class="form-control mt-3" name="" id="" cols="30" rows="6"></textarea>
            <div>
                <button class="btn bg-blue text-white px-4 py-2 mt-3">Kirim</button>
            </div>
        </div>

        <div class="row row-review mt-5">
            <h3 class="fw-bold">Komentar Terbaru</h3>
            <div class="card-comment mb-4">
                <div class="card-comment-header">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('web') }}/assets/img/andi.png" alt="">
                        <span class="fs-5 fw-bold ms-3">Andi</span>
                    </div>
                    <div class="ratting">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <span>5</span>
                    </div>
                </div>
                <div class="card-comment-body mt-3">
                    <p>Buku ini enak dibaca. Ga berasa udah 1 jam membaca dan masih seru. Semoga diperbanyak karya
                        seperti ini.</p>
                </div>
            </div>
            <div class="card-comment mb-4">
                <div class="card-comment-header">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('web') }}/assets/img/sinta.png" alt="">
                        <span class="fs-5 fw-bold ms-3">Sinta</span>
                    </div>
                    <div class="ratting">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <span>5</span>
                    </div>
                </div>
                <div class="card-comment-body mt-3">
                    <p>Buku hebat yang secara luar biasa menggambarkan problem, mengartikulasi nilai, memaparkan
                        risiko, dan menawarkan cara yang bisa dipahami dan dipraktikkan untuk menanggapi kesulitan
                        yang dialami jurnalisme saat ini.</p>
                </div>
            </div>
            <div class="card-comment mb-4">
                <div class="card-comment-header">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('web') }}/assets/img/miftah.png" alt="">
                        <span class="fs-5 fw-bold ms-3">Miftah</span>
                    </div>
                    <div class="ratting">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <img src="{{ asset('web') }}/assets/icon/star.svg" alt="">
                        <span>5</span>
                    </div>
                </div>
                <div class="card-comment-body mt-3">
                    <p>Buku ini sangat bagus dan pastinya berisi ajaran positif yang bisa bermanfaat bagi para
                        pembaca. Khususnya bagi anak-anak yang masih dalam tahap belajar.</p>
                </div>
            </div>
            <div class="row mt-5 mb-5" id>
                <div class="header d-flex justify-content-between" style="padding-right: 35px;">
                    <h2 class="fw-bold">Referensi Buku Sejenis</h2>
                    <a href="">Lihat Semua</a>
                </div>
                <div class="row row-cols-6">
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/referensi_sejenis/1.jpg"
                            alt="">

                    </div>
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/referensi_sejenis/2.jpg"
                            alt="">

                    </div>
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/referensi_sejenis/3.jpg"
                            alt="">

                    </div>
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/referensi_sejenis/4.jpg"
                            alt="">
                    </div>
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/referensi_sejenis/5.jpg"
                            alt="">
                    </div>
                    <div class="col">
                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/referensi_sejenis/6.jpg"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
