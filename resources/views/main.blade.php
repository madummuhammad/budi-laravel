<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/mobile.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('web') }}/assets/css/mobile-view.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('web') }}/assets/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/vendor/OwlCarousel2-2.3.4/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/vendor/OwlCarousel2-2.3.4/css/owl.theme.default.css">
    <link rel="stylesheet" href="{{ asset('web') }}/assets/vendor/pdf/wow_book/wow_book.css" type="text/css" />
    <title>Homepage</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent justify-content-center budi-navbar">
        <div class="container px-md-5">
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
                    <li class="nav-item px-0 px-md-3">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item px-0 px-md-3 dropdown">
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
                    <li class="nav-item px-0 px-md-3">
                        <a class="nav-link active" aria-current="page" href="{{ url('mylibrary') }}">Pustakaku</a>
                    </li>
                    <li class="nav-item px-0 px-md-3 dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Referensi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item"
                                    href="{{ url('reference_book/5cbb48f9-aed4-44a9-90c2-71cbcef71264') }}">Referensi
                                    Buku</a>
                            </li>
                            <li><a class="dropdown-item"
                                    href="{{ url('reference_book/220843b8-4f60-4e47-9aca-cf6ea0d54afe') }}">Referensi
                                    Video</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item px-0 px-md-3">
                        <a class="nav-link active" aria-current="page" href="{{ url('contact') }}">Kontak Kami</a>
                    </li>
                    </li>
                    @if (auth()->guard('visitor')->check() == false)
                        <div class="d-flex d-md-none">
                            <a class="btn text-blue ps-0" href="{{ url('login') }}">Masuk</a>
                            <a class="btn bg-blue text-white" href="{{ url('register') }}">Daftar</a>
                        </div>
                    @endif
                    @if (auth()->guard('visitor')->check() == 1)
                        <div class="d-flex d-lg-none navbar-profile align-items-center">
                            <img src="{{ auth()->guard('visitor')->user()->image }}" alt="">
                            <div class="nav-item px-0 px-md-3 dropdown">
                                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ auth()->guard('visitor')->user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                                    <form method="POST" action="{{ url('logout') }}">
                                        @csrf
                                        @method('POST')
                                        <li><button type="submit" class="dropdown-item text-blue">Keluar</button>
                                        </li>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    @endif
                </ul>
            </div>
            @if (auth()->guard('visitor')->check() == false)
                <div class="d-md-flex d-none">
                    <a class="btn text-blue" href="{{ url('login') }}">Masuk</a>
                    <a class="btn bg-blue text-white" href="{{ url('register') }}">Daftar</a>
                </div>
            @endif
            @if (auth()->guard('visitor')->check() == 1)
                <div class="d-lg-flex d-none navbar-profile align-items-center">
                    <img src="{{ auth()->guard('visitor')->user()->image }}" alt="">
                    <div class="nav-item px-0 px-md-3 dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->guard('visitor')->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
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

    @yield('content')

    @php
        use App\Models\Contact;
        $footer = Contact::where('id', 'f1c3ae2b-7111-4b2f-9d48-3a2bebb66f8b')->first();
    @endphp

    <footer>
        <div class="container-fluid footer">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="row">
                        <div class="col-12 col-md-2 d-flex d-md-block justify-content-center mb-4">
                            <img src="{{ url('web') }}/assets/img/logo.png" alt=""
                                class="img-fluid col-4 col-md-12">
                        </div>
                        <div class="col-12 col-md-10">


                            <div class="text-dark fw-bold fs-m-14px">@php echo $footer->heading @endphp</div>

                            <p>{{ $footer->sub_heading }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <p class="fw-bold fs-5 text-dark text-start">Produk</p>
                    <a href="{{ url('book_type/2fd97285-08d0-4d81-83f2-582f0e8b0f36') }}"
                        class="d-block text-decoration-none mb-3">Buku Digital</a>
                    <a href="{{ url('book_type/31ba455c-c9c7-4a3c-a2b1-62915546eaba') }}"
                        class="d-block text-decoration-none mb-3">Buku Komik</a>
                    <a href="{{ url('book_type/9e30a937-0d60-49ad-9775-c19b97cfe864') }}"
                        class="d-block text-decoration-none mb-3">Buku Audio</a>
                    <a href="{{ url('book_type/bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') }}"
                        class="d-block text-decoration-none mb-3">Buku Video</a>
                    <a href="{{ url('reference_book/5cbb48f9-aed4-44a9-90c2-71cbcef71264') }}"
                        class="d-block text-decoration-none mb-3">Referensi</a>
                </div>
                <div class="col-6 col-md-2">
                    <p class="fw-bold fs-5 text-dark text-start">Panduan</p>
                    <a href="{{ url('about') }}" class="d-block text-decoration-none mb-3">Tentang Budi</a>
                    <a href="{{ url('policy') }}" class="d-block text-decoration-none mb-3">Informasi</a>
                    <a href="{{ url('contact') }}" class="d-block text-decoration-none mb-3">Kontak Kami</a>
                </div>
                <div class="col-12 col-md-4">
                    <p class="fw-bold fs-5 text-dark text-center text-md-start">Kontak Kami</p>
                    <div class="d-flex justify-content-center d-md-none">
                        <img src="{{ url('web') }}/assets/icon/evelope.svg" alt="">
                    </div>
                    <p class="p-0 text-center text-md-start"><img class="d-none d-md-inline"
                            src="{{ url('web') }}/assets/icon/evelope.svg" alt="">
                        {{ $footer->email }}</p>
                    <div class="d-flex justify-content-center d-md-none">
                        <img src="{{ url('web') }}/assets/icon/telephone.svg" alt="">
                    </div>
                    <p class="text-md-start text-center"><img class="d-none d-md-inline"
                            src="{{ url('web') }}/assets/icon/telephone.svg" alt=""> {{ $footer->phone }}
                    </p>
                    <div class="d-flex justify-content-center d-md-none">
                        <img src="{{ url('web') }}/assets/icon/pin.svg" alt="">
                    </div>
                    <p class="text-center text-md-start"><img class="d-none d-md-inline"
                            src="{{ url('web') }}/assets/icon/pin.svg" alt="">
                        {{ $footer->address }}</p>
                </div>
            </div>
            <div class="row sosmed-icon">
                <div class="col-12 col-md-4">
                    <div class="row">
                        <div class="col-12 col-md-2"></div>
                        <div class="col-12 col-md-10 d-flex d-md-block justify-content-center">
                            <a class="d-inline-block" href="https://www.instagram.com/badanbahasakemendikbud/"
                                target="_blank"><img class="mx-2"
                                    src="{{ asset('web') }}/assets/icon/instagram.svg" alt=""></a>
                            <a class="d-inline-block" href="https://www.facebook.com/Badan.Bahasa/"
                                target="_blank"><img class="mx-2"
                                    src="{{ asset('web') }}/assets/icon/facebook.svg" alt=""></a>
                            <a class="d-inline-block" href="https://twitter.com/badanbahasa" target="_blank"><img
                                    class="mx-2" src="{{ asset('web') }}/assets/icon/twitter.svg"
                                    alt=""></a>
                            <a class="d-inline-block" href="https://www.youtube.com/BadanBahasa" target="_blank"><img
                                    class="mx-2" src="{{ asset('web') }}/assets/icon/youtube.svg"
                                    alt=""></a>
                            <a class="d-inline-block" href="https://www.tiktok.com/@badanbahasa" target="_blank"><img
                                    class="mx-2" src="{{ asset('web') }}/assets/icon/tiktok.svg"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                    <p class="text-md-end text-center">Jam Operasional : (Senin <i class="fa-solid fa-minus"></i>
                        Jumat : 09.00 - 16.00 WIB)</p>
                </div>
            </div>
            <div class="dash"></div>
            <div class="copyright py-4 px-5 text-dark">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="text-center text-md-start">
                            Copyright &copy 2022
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="text-center text-md-end">
                            All right reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class='book_container'>
        <div id="book"></div>
    </div>
    @php
        use App\Models\Mylibrary;
        if (
            auth()
                ->guard('visitor')
                ->check() == true
        ) {
            $reads = Mylibrary::with('books')
                ->where(
                    'visitor_id',
                    auth()
                        ->guard('visitor')
                        ->user()->id,
                )
                ->where('read', 1)
                ->first();
        }
    @endphp
    @if (auth()->guard('visitor')->check() == true)
        @if ($reads !== null)
            <div class="modal fade model-centered" id="being_read" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            {{-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}

                            <h5>Kamu belum selesai @if ($reads->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    mendengar
                                @elseif ($reads->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    menonton
                                @else
                                    membaca
                                @endif !</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-12">
                                    <h4 class="text-center">{{ $reads->books->name }}</h4>
                                    <div class="d-flex justify-content-center">
                                        <img class="w-50" src="{{ $reads->books->cover }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="selesai"
                                data-bs-dismiss="modal">Tandai
                                Selesai</button>
                            <button type="button" data-bs-dismiss="modal" id="next"
                                class="btn btn-primary">Lanjutkan @if ($reads->books->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                    Dengar
                                @elseif ($reads->books->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                    Tonton
                                @else
                                    Membaca
                                @endif
                                nanti</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endif
    @csrf
    <div class="modal fade" id="menyukai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Masuk/ daftar untuk menyukai</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="{{ url('login') }}" type="button" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mengunduh" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Masuk/ daftar untuk mengunduh</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="{{ url('login') }}" type="button" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="menyimpan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Masuk/ daftar untuk menyimpan</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="{{ url('login') }}" type="button" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('web') }}/assets/js/jquery.js"></script>
<script src="{{ asset('web') }}/assets/js/bootstrap.bundle.js"></script>
{{-- <script src="{{ asset('web') }}/assets/js/bootstrap.js"></script> --}}
<script src="{{ asset('web') }}/assets/vendor/fontawesome/js/all.js"></script>
<script src="{{ asset('web') }}/assets/vendor/OwlCarousel2-2.3.4/js/owl.carousel.js"></script>
<script type="text/javascript" src="{{ asset('web') }}/assets/vendor/pdf/wow_book/pdf.combined.min.js"></script>
<script src="{{ asset('web') }}/assets/vendor/pdf/wow_book/wow_book.min.js"></script>
{{-- <script src="js/main.js"></script> --}}
<script src="{{ asset('web') }}/assets/js/script.js"></script>
<script src="{{ asset('web') }}/assets/js/player.js"></script>

<script>
    @if (auth()->guard('visitor')->check() == true)
        @if ($reads !== null)
            var myModal = new bootstrap.Modal(document.getElementById('being_read'), {
                keyboard: false
            });
            myModal.show()
            $("#selesai").on('click', function() {
                var token = $("input[name=_token]").val();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('done') }}",
                    data: {
                        _method: "POST",
                        book_id: "{{ $reads->books->id }}",
                        _token: token
                    },
                    success: function(hasil) {}
                });
            });

            $("#next").on('click', function() {
                var token = $("input[name=_token]").val();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('next') }}",
                    data: {
                        _method: "POST",
                        book_id: "{{ $reads->books->id }}",
                        _token: token
                    },
                    success: function(hasil) {}
                });
            });
        @endif
    @endif
    $(document).ready(function() {
        navigator.geolocation.getCurrentPosition(function(position) {
            var token = $("[name=_token]").val();
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            $.ajax({
                type: 'POST',
                url: "{{ url('set_cookie') }}",
                data: {
                    _method: "POST",
                    _token: token,
                    latitude: latitude,
                    longitude: longitude,
                    width: screen.width,
                    height: screen.height

                },
                success: function(hasil) {}
            });
        }, function(e) {
            $.ajax({
                type: 'POST',
                url: "{{ url('set_cookie') }}",
                data: {
                    _method: "POST",
                    _token: token,
                    latitude: latitude,
                    longitude: longitude
                },
                success: function(hasil) {}
            });
            alert('Geolocation Tidak Mendukung Pada Browser Anda');
        }, {
            enableHighAccuracy: true
        });
    });
</script>

</html>
