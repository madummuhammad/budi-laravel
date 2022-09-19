<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('web') }}/assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <title>Registrasi</title>
</head>

<body class="registrasi">
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
                        <a class="nav-link active" aria-current="page"
                            href="{{ url('reference_book/5cbb48f9-aed4-44a9-90c2-71cbcef71264') }}">Referensi</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link active" aria-current="page" href="{{ url('contact') }}">Kontak Kami</a>
                    </li>
                    </li>
                </ul>
            </div>
            @if (auth()->guard('visitor')->check() == false)
                <div class="d-flex">
                    <a class="btn text-blue" href="{{ url('login') }}">Masuk</a>
                    <a class="btn bg-blue text-white" href="{{ url('register') }}">Daftar</a>
                </div>
            @endif
            @if (auth()->guard('visitor')->check() == 1)
                <div class="d-flex navbar-profile align-items-center">
                    <img src="{{ asset('web') }}/assets/img/profile.png" alt="">
                    <div class="nav-item px-3 dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->guard('visitor')->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <form method="POST" action="{{ url('logout') }}">
                                @csrf
                                @method('POST')
                                <li><button type="submit" class="dropdown-item text-blue">Keluar</button></li>
                            </form>
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </nav>
    <div class="container mt-5 pt-5" style="padding-bottom: 200px;">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('web') }}/assets/img/logo.png" alt="" style="width:120px">
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6 bg-white">
                <h5 class="fw-bold">Selamat Datang</h5>
                <p class="card-text">Silakan masukan Email dan Kata Sandi</p>
                <form action="{{ url('register') }}" class="mb-5" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control mb-3 py-3" placeholder="Nama"
                                aria-label="Full Name" name="name">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3 py-3"
                                placeholder=" Pos-el atau No. Ponsel" aria-label="Last name" name="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <select class="form-select mb-3 py-3" aria-label="size 3 select example"
                                placeholder="adfadf" name="city">
                                <option selected>Kota/Kabupaten</option>
                                <option value="1">Kota A</option>
                                <option value="2">Kota B</option>
                                <option value="3">Kota C</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select mb-3 py-3" aria-label="size 3 select example"
                                placeholder="adfadf" name="sub">
                                <option selected>Kecamatan</option>
                                <option value="1">Kecamatan A</option>
                                <option value="2">Kecamatan B</option>
                                <option value="3">Kecamatan C</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select mb-3 py-3" aria-label="size 3 select example"
                                placeholder="adfadf" name="area">
                                <option selected>Kelurahan</option>
                                <option value="1">Kelurahan A</option>
                                <option value="2">Kelurahan B</option>
                                <option value="3">Kelurahan C</option>
                            </select>
                        </div>
                    </div>
                    <select class="form-select mb-3 py-3" aria-label="size 3 select example" placeholder="adfadf"
                        name="status">
                        <option selected disabled>Status</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <input type="email" class="form-control mb-3 py-3" id="exampleFormControlInput1"
                        placeholder="Pengguna  (Contoh : @Budiberbudi)" name="email">
                    <input type="password" class="form-control mb-3 py-3" id="exampleFormControlInput1"
                        placeholder="Kata sandi" name="password">
                    <button class="btn bg-blue text-white w-100 py-2 ">Buat Akun</button>
                </form>
                <p class="text-center mt-5">Sudah memiliki akun? <a href="{{ url('login') }}"
                        class="text-decoration-none text-blue fw-bold">Masuk</a></p>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('web') }}/assets/js/bootstrap.js"></script>
<script src="{{ asset('web') }}/assets/js/bootstrap.bundle.js"></script>

</html>
