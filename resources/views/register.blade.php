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
            <div class="col-12 col-md-6 bg-white">
                <h5 class="fw-bold">Selamat Datang</h5>
                <p class="card-text"> Silahkan isi data diri anda untuk menjadi bagian
                    dari keluarga Budi</p>
                @if (session()->has('message'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ url('register') }}" class="mb-5" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text"
                                class="form-control mt-3 py-3 @error('name')
                                is-invalid
                            @enderror"
                                placeholder="Nama Lengkap" aria-label="Full Name" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text"
                                class="form-control mt-3 py-3 @error('phone')
                                    is-invalid
                                @enderror"
                                placeholder="Pos-el atau No. Ponsel " aria-label="Last name" name="surel">
                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-12">
                            <select name="province" id="" class="form-select py-3 mt-3">
                                <option value="">--Pilih Provinsi--</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <select name="city" id="" class="form-select py-3 mt-3">
                                <option value="">--Pilih Kota--</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <select name="district" id="" class="form-select py-3 mt-3">
                                <option value="">--Pilih Kecamatan--</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <select name="sub_district" id="" class="form-select py-3 mt-3">
                                <option value="">--Pilih Kelurahan--</option>
                            </select>
                        </div>
                    </div>
                    <select id="status" class="form-select mt-3 py-3" aria-label="size 3 select example"
                        placeholder="" name="status">
                        <option selected value="">Status</option>
                        <option value="Siswa">Siswa</option>
                        <option value="Guru / Tenaga Pendidik">Guru/ Tenaga Pendidik</option>
                        <option value="Orang Tua Siswa">Orang Tua Siswa</option>
                        <option value="Umum">Umum</option>
                    </select>
                    <div id="sub-status"></div>
                    <input type="text" autocomplete="true"
                        class="form-control mt-3 py-3 @error('username')
                        is-invalid
                    @enderror"
                        id="exampleFormControlInput1" placeholder="Nama Akun Pengguna  (Contoh : Budiberbudi)"
                        name="username" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="input-group mt-3">
                        <input type="password" autocomplete="true"
                            class="form-control py-3 @error('password')
                            is-invalid
                        @enderror"
                            id="exampleFormControlInput2" placeholder="Kata sandi" name="password">
                        <button id="btn-eye" type="button" class="input-group-text bg-white"><i
                                class="bi bi-eye"></i></button>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn bg-blue text-white w-100 py-2 mt-3">Buat Akun</button>
                </form>
                <p class="text-center mt-5">Sudah memiliki akun? <a href="{{ url('login') }}"
                        class="text-decoration-none text-blue fw-bold">Masuk</a></p>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('web') }}/assets/js/jquery.js"></script>
<script src="{{ asset('web') }}/assets/js/bootstrap.js"></script>
<script src="{{ asset('web') }}/assets/js/bootstrap.bundle.js"></script>
<script>
    $("#btn-eye").on('click', function() {
        if ($("input[name=password]").hasClass('show') == false) {
            $("input[name=password]").attr('type', 'text');
            $("input[name=password]").addClass('show');
        } else {
            $("input[name=password]").attr('type', 'password');
            $("input[name=password]").removeClass('show');
        }
    })
    $("#status").on('change', function() {
        if ($(this).val() == 'Siswa') {
            $("#sub-status").html(`
            <select id="status" class="form-select mt-3 py-3" aria-label="size 3 select example"
                            placeholder="" name="sub-status">
                            <option selected value="">--Pilih Jenjang--</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                        </select>
            `);
        } else if ($(this).val() == 'Guru / Tenaga Pendidik' ||
            $(this).val() == 'Orang Tua Siswa') {
            $("#sub-status").html(`
        <select id="status" class="form-select mt-3 py-3" aria-label="size 3 select example"
                        placeholder="" name="sub-status">
                        <option selected value="">--Pilih Jenjang--</option>
                        <option value="PAUD">PAUD</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                    </select>
        `);
        } else {
            $("#sub-status").html(``);
        }
    })
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'GET',
            url: "{{ url('province') }}",
            success: function(hasil) {
                var province = hasil.provinsi;
                for (let i = 0; i < province.length; i++) {
                    $("select[name=province]").append("<option value='" + province[i].id +
                        "'>" +
                        province[i].nama + "</option>")
                }
            }
        });

        $("select[name=province]").on('change', function() {
            var province_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ url('city') }}/" + province_id,
                success: function(hasil) {
                    var city = hasil.kota_kabupaten;
                    $("select[name=city]").html("");
                    $("select[name=city]").append(
                        "<option value=''>--Pilih Kota--</option>")
                    for (let i = 0; i < city.length; i++) {
                        $("select[name=city]").append("<option value='" + city[i]
                            .id + "'>" +
                            city[i].nama + "</option>")
                    }
                }
            });
        });

        $("select[name=city]").on('change', function() {
            var city_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ url('district') }}/" + city_id,
                success: function(hasil) {
                    var district = hasil.kecamatan;
                    $("select[name=district]").html("");
                    $("select[name=district]").append(
                        "<option value=''>--Pilih Kecamatan--</option>")
                    for (let i = 0; i < district.length; i++) {
                        $("select[name=district]").append("<option value='" + district[i]
                            .id + "'>" +
                            district[i].nama + "</option>")
                    }
                }
            });
        });

        $("select[name=district]").on('change', function() {
            var district_id = $(this).val();
            $.ajax({
                type: 'GET',
                url: "{{ url('sub_district') }}/" + district_id,
                success: function(hasil) {
                    var district = hasil.kelurahan;
                    $("select[name=sub_district]").html("");
                    $("select[name=sub_district]").append(
                        "<option value=''>--Pilih Kecamatan--</option>")
                    for (let i = 0; i < district.length; i++) {
                        $("select[name=sub_district]").append("<option value='" + district[
                                i]
                            .id + "'>" +
                            district[i].nama + "</option>")
                    }
                }
            });
        });
    })
</script>

</html>
