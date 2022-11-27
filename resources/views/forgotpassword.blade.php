<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/mobile-view.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css"
    href="{{ asset('web') }}/assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <title>Lupa Sandi</title>
</head>

<body>
    <div class="background-dot-right-top">
        <img class="d-none d-md-block" src="{{ asset('web') }}/assets/img/dot.png" alt="">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent justify-content-center budi-navbar">
        <div class="container px-4 px-md-0">
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
                    <a class="nav-link active" aria-current="page" href="{{ url('mylibrary') }}">Pustakaku</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link active" aria-current="page"
                    href="{{ url('reference_book/5cbb48f9-aed4-44a9-90c2-71cbcef71264') }}">Referensi</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link active" aria-current="page" href="{{ url('contact') }}">Kontak Kami</a>
                </li>
                <li class="nav-item d-lg-none mt-4">
                    <a class="btn text-blue" href="{{ url('login') }}">Masuk</a>
                    <a class="btn bg-blue text-white" href="{{ url('register') }}">Daftar</a>
                </li>
            </li>
        </ul>
    </div>
    @if (auth()->guard('visitor')->check() == false)
    <div class="d-none d-lg-flex">
        <a class="btn text-blue" href="{{ url('login') }}">Masuk</a>
        <a class="btn bg-blue text-white" href="{{ url('register') }}">Daftar</a>
    </div>
    @endif
    @if (auth()->guard('visitor')->check() == 1)
    <div class="d-flex d-lg-none navbar-profile align-items-center">
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
<div class="bg-login">
    <div class="container d-block">
        <div class="row">
            <div class="col-12 col-lg-8 d-none d-lg-flex">
                <img class="img-fluid rounded-50px" src="{{ asset('web') }}/assets/img/ilustrasi-login.png"
                alt="">
            </div>
            <div class="col-12 d-lg-none py-4">
                <h2 class="ff-kidzone tagline text-white text-center login-title" style="margin-top: 4rem;">Kenali
                Budaya Bangsa dengan Budi</h2>
            </div>
            <div class="col-12 col-lg-4 login card-login-x text-md-center">
                <div class="card card-login p-3 w-100">
                    <div class="card-body">
                        <img class="logo mb-2" src="{{ asset('web') }}/assets/img/logo.png" alt="">
                        <h5 class="card-title fw-bold">Lupa Sandi</h5>
                        <p class="card-text">Silakan masukkan Pos-el Anda</p>
                        @if (session()->has('message'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('message') }}
                        </div>
                        @endif
                        @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form action="{{ url('forgot_password') }}" method="POST">
                            @method('POST')
                            @csrf
                            <input type="text"
                            class="form-control mb-3 py-3 @error('username')
                            is-invalid @enderror "
                            id="exampleFormControlInput1" placeholder="Pos-el" name="email">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <button id="btn-login" type="submit"
                            class="btn bg-blue text-white w-100">Kirim</button>
                        </form>
                        <p class="mt-2 text-center">Sudah ingat sandi Anda? <a href="{{ url('login') }}"
                            class="text-decoration-none text-blue fw-bold">Masuk</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('web') }}/assets/js/jquery.js"></script>
<script src="{{ asset('web') }}/assets/js/bootstrap.js"></script>
<script src="{{ asset('web') }}/assets/js/bootstrap.bundle.js"></script>
<script>
    $(document).ready(function() {
        $("#btn-eye").on('click', function() {
            if ($("input[name=password]").hasClass('show') == false) {
                $("input[name=password]").attr('type', 'text');
                $("input[name=password]").addClass('show');
            } else {
                $("input[name=password]").attr('type', 'password');
                $("input[name=password]").removeClass('show');
            }
        })
    });
</script>

</html>
