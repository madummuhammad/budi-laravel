@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div class="dash"></div>
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class=" text-decoration-none" href="index.html">Beranda</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="referensi_buku_video.html">Referensi
                        Video</a>
                </li>
                <li class="breadcrumb-item active">Selamat Tidur Kola</li>
            </ol>
        </nav>
        <div class="row mt-3">
            <div class="col-3">
                <img class="img-fluid" src="{{ $reference_book->cover }}" alt="">
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
                        <img src="assets/icon/star.svg" alt="">
                        4.9
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
                        @foreach ($reference_book->themes as $theme)
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
            <div class="col-9">
                <h1 class="fw-bold mb-5">{{ $reference_book->name }}</h1>
                @php
                    echo $reference_book->sinopsis;
                @endphp
                <div class="baca-button-group d-flex mt-5 pt-5">
                    <button
                        class="btn btn-outline-blue d-flex justify-content-center align-items-center
                            py-2 me-4"><i
                            class="bi bi-download fs-5 me-3"></i> Unduh</button>
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
            <h3 class="fw-bold">Berikan Komentarmu: </h3>
            <div class="comment-profile mb-3">
                <img src="assets/img/profile.png" alt="">
                <span class="fw-bold fs-2 ms-3">Febri</span>
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
                        <img src="assets/img/andi.png" alt="">
                        <span class="fs-5 fw-bold ms-3">Andi</span>
                    </div>
                    <div class="ratting">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
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
                        <img src="assets/img/sinta.png" alt="">
                        <span class="fs-5 fw-bold ms-3">Sinta</span>
                    </div>
                    <div class="ratting">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
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
                        <img src="assets/img/miftah.png" alt="">
                        <span class="fs-5 fw-bold ms-3">Miftah</span>
                    </div>
                    <div class="ratting">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
                        <img src="assets/icon/star.svg" alt="">
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
                        <img class="img-fluid" src="assets/img/referensi_sejenis/1.jpg" alt="">

                    </div>
                    <div class="col">
                        <img class="img-fluid" src="assets/img/referensi_sejenis/2.jpg" alt="">

                    </div>
                    <div class="col">
                        <img class="img-fluid" src="assets/img/referensi_sejenis/3.jpg" alt="">

                    </div>
                    <div class="col">
                        <img class="img-fluid" src="assets/img/referensi_sejenis/4.jpg" alt="">
                    </div>
                    <div class="col">
                        <img class="img-fluid" src="assets/img/referensi_sejenis/5.jpg" alt="">
                    </div>
                    <div class="col">
                        <img class="img-fluid" src="assets/img/referensi_sejenis/6.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
