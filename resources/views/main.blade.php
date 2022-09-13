<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('web') }}/assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/vendor/OwlCarousel2-2.3.4/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/vendor/pdf/wow_book/wow_book.css" type="text/css" />
    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent justify-content-center budi-navbar">
        <div class="container px-5">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('web') }}/assets/img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item px-3">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item px-3 dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Buku
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item"
                                    href="{{ url('book_type/2fd97285-08d0-4d81-83f2-582f0e8b0f36') }}">Buku Digital</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ url('book_type/31ba455c-c9c7-4a3c-a2b1-62915546eaba') }}">Buku Komik</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ url('book_type/9e30a937-0d60-49ad-9775-c19b97cfe864') }}">Buku Audio</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ url('book_type/bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') }}">Buku Video</a>
                            </li>
                        </ul>
                    <li class="nav-item px-3">
                        <a class="nav-link active" aria-current="page" href="{{ url('pustakaku') }}">Pustakaku</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" aria-current="page" href="referensi_buku.html">Referensi</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" aria-current="page" href="kontak_kami.html">Kontak Kami</a>
                    </li>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a class="btn text-blue" href="login.html">Masuk</a>
                <a class="btn bg-blue text-white" href="registrasi.html">Daftar</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container-fluid footer">
            <div class="row">
                <div class="col-4">
                    <div class="row">
                        <div class="col-2">
                            <img src="{{ asset('web') }}/assets/img/logo.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-10">
                            <p class="text-dark fw-bold">Kementerian Pendidikan, Kebudayaan, Riset, dan
                                Teknologi
                                Badan Pengembangan dan Pembinaan Bahasa
                                Pusat Pembinaan Bahasa dan Sastra</p>
                            <p>Menuju terwujudnya insan berkarakter dan jati diri bangsa melalui bahasa dan sastra
                                Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <p class="fw-bold fs-5 text-dark">Produk</p>
                    <a href="" class="d-block text-decoration-none mb-3">Buku Digital</a>
                    <a href="" class="d-block text-decoration-none mb-3">Buku Komik</a>
                    <a href="" class="d-block text-decoration-none mb-3">Buku Audio</a>
                    <a href="" class="d-block text-decoration-none mb-3">Buku Video</a>
                    <a href="" class="d-block text-decoration-none mb-3">Referensi</a>
                </div>
                <div class="col-2">
                    <p class="fw-bold fs-5 text-dark">Panduan</p>
                    <a href="" class="d-block text-decoration-none mb-3">Tentang Budi</a>
                    <a href="" class="d-block text-decoration-none mb-3">Kebijakan</a>
                    <a href="" class="d-block text-decoration-none mb-3">Kontak Kami</a>
                </div>
                <div class="col-4">
                    <p class="fw-bold fs-5 text-dark">Kontak Kami</p>
                    <p class="p-0"><img src="{{ asset('web') }}/assets/icon/evelope.svg" alt="">
                        badan.bahasa@kemdikbud.go.id
                    </p>
                    <p><img src="{{ asset('web') }}/assets/icon/telephone.svg" alt=""> (021) 4750406</p>
                    <p><img src="{{ asset('web') }}/assets/icon/pin.svg" alt=""> Jalan Daksinapati Barat
                        IV, Rawamangun, Jakarta
                        13220</p>
                </div>
            </div>
            <div class="row sosmed-icon">
                <div class="col-4">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <img src="{{ asset('web') }}/assets/icon/instagram.svg" alt="">
                            <img src="{{ asset('web') }}/assets/icon/facebook.svg" alt="">
                            <img src="{{ asset('web') }}/assets/icon/twitter.svg" alt="">
                            <img src="{{ asset('web') }}/assets/icon/youtube.svg" alt="">
                            <img src="{{ asset('web') }}/assets/icon/tiktok.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <p class="text-end">Jam Operasional : (Senin - Kamis : 09.00 - 17.00 WIB, Jumat : 09.00 - 16.00
                        WIB)</p>
                </div>
            </div>
            <div class="dash"></div>
            <div class="copyright py-4 px-5 text-dark">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Copyright &copy 2022
                    </div>
                    <div>
                        All right reserved
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class='book_container'>
        <div id="book"></div>
    </div>
</body>
<script src="{{ asset('web') }}/assets/js/jquery.js"></script>
<script src="{{ asset('web') }}/assets/js/bootstrap.js"></script>
<script src="{{ asset('web') }}/assets/js/bootstrap.bundle.js"></script>
<script src="{{ asset('web') }}/assets/vendor/fontawesome/js/all.js"></script>
<script src="{{ asset('web') }}/assets/vendor/OwlCarousel2-2.3.4/js/owl.carousel.js"></script>
<script type="text/javascript" src="{{ asset('web') }}/assets/vendor/pdf/wow_book/pdf.combined.min.js"></script>
<script src="{{ asset('web') }}/assets/vendor/pdf/wow_book/wow_book.min.js"></script>
{{-- <script src="js/main.js"></script> --}}
<script src="{{ asset('web') }}/assets/js/script.js"></script>
<script src="{{ asset('web') }}/assets/js/player.js"></script>

</html>
