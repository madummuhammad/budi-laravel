@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div class="dash"></div>
    <div class="container page-profile">
        <div class="row mt-5">
            <h2 class="text-dark fw-bold mb-5 text-center text-md-start" style="font-size: 38px;">Profile</h2>
            <div class="col-12 col-md-4">
                <div class="profile-container">
                    <img class="img-fluid profile" src="{{ auth()->guard('visitor')->user()->image }}" alt="">
                    <div class="profile-medal-container">
                        <img class="profile-medal" src="{{ asset('web') }}/assets/icon/medali.png" alt="">
                    </div>
                </div>
                <div class="input-file d-flex justify-content-center">
                    <button data-bs-toggle="modal" data-bs-target="#image-profile"
                        class="text-decoration-underline text-center text-blue mt-2 btn" for="upload">Ganti
                        Foto</button>
                    <div class="modal fade" id="image-profile" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <form action="{{ url('profile_image') }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn badge-danger text-danger"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </form>
                                                <img class="img-fluid w-100"
                                                    src="{{ auth()->guard('visitor')->user()->image }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ url('profile_image') }}" method="POST" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="modal-footer">
                                        <input type="file" class="form-control" id="pilih_gambar" name="image">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 px-4 px-md-0 ps-md-5">
                <div class="d-flex justify-content-between align-items-start mt-5 mt-md-0 mb-4">
                    <h2 class="fw-bold">{{ auth()->guard('visitor')->user()->name }}</h2>
                    <button data-bs-toggle="modal" data-bs-target="#profile" class="btn text-blue"><i
                            class="fas fa-edit"></i></button>

                    <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            @method('patch')
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nama
                                                        </label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" name="name"
                                                            value="{{ auth()->guard('visitor')->user()->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email
                                                        </label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" name="email"
                                                            value="{{ auth()->guard('visitor')->user()->email }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Provinsi
                                                        </label>
                                                        <select name="province" id="" class="form-select">
                                                            <option value="">--Pilih Provinsi--</option>
                                                        </select>
                                                    </div>
                                                    <div class="row row-cols-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Kota
                                                                </label>
                                                                <select name="city" id=""
                                                                    class="form-select">
                                                                    <option value="">--Pilih Kota--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Kecamatan
                                                                </label>
                                                                <select name="district" id=""
                                                                    class="form-select">
                                                                    <option value="">--Pilih Kecamatan--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Kelurahan
                                                                </label>
                                                                <select name="sub_district" id=""
                                                                    class="form-select">
                                                                    <option value="">--Pilih Kelurahan--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                    <label for="exampleInputEmail1">Alamat
                                                    </label>

                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="address"
                                                        value="{{ auth()->guard('visitor')->user()->address }}">
                                                </div> --}}
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Profesi
                                                        </label>
                                                        <select id="status" class="form-control"
                                                            aria-label="size 3 select example" placeholder=""
                                                            name="status">
                                                            <option value="">--pilih--</option>
                                                            <option value="Siswa"
                                                                @if (auth()->guard('visitor')->user()->profession == 'Siswa') selected @endif>Siswa
                                                            </option>
                                                            <option value="Guru / Tenaga Pendidik"
                                                                @if (auth()->guard('visitor')->user()->profession == 'Guru / Tenaga Pendidik') selected @endif>Guru/
                                                                Tenaga Pendidik
                                                            </option>
                                                            <option value="Orang Tua Siswa"
                                                                @if (auth()->guard('visitor')->user()->profession == 'Orang Tua Siswa') selected @endif>Orang Tua
                                                                Siswa</option>
                                                            <option value="Umum"
                                                                @if (auth()->guard('visitor')->user()->profession == 'Umum') selected @endif>Umum
                                                            </option>
                                                        </select>
                                                        {{-- <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="profession"
                                                        value="{{ auth()->guard('visitor')->user()->profession }}"> --}}
                                                    </div>
                                                    @if (auth()->guard('visitor')->user()->profession == 'Siswa')
                                                        <div class="form-group" id="sub-status">
                                                            <label for="exampleInputEmail1">Jenjang
                                                            </label>
                                                            <select id="sub-status" class="form-control"
                                                                aria-label="size 3 select example" placeholder=""
                                                                name="sub-status">
                                                                <option value="">--pilih--</option>
                                                                <option value="SD"
                                                                    @if (auth()->guard('visitor')->user()->level == 'SD') selected @endif>
                                                                    SD</option>
                                                                <option value="SMP"
                                                                    @if (auth()->guard('visitor')->user()->level == 'SMP') selected @endif>
                                                                    SMP</option>
                                                                <option value="SMA"
                                                                    @if (auth()->guard('visitor')->user()->level == 'SMA') selected @endif>
                                                                    SMA</option>
                                                            </select>
                                                        </div>
                                                    @endif
                                                    @if (auth()->guard('visitor')->user()->profession ==
                                                        'Guru / Tenaga Pendidik' or
                                                        auth()->guard('visitor')->user()->profession ==
                                                            'Orang Tua Siswa')
                                                        <div class="form-group" id="sub-status">
                                                            <label for="exampleInputEmail1">Jenjang
                                                            </label>
                                                            <select class="form-control"
                                                                aria-label="size 3 select example" placeholder=""
                                                                name="sub-status">
                                                                <option value="">--pilih--</option>
                                                                <option value="PAUD"
                                                                    @if (auth()->guard('visitor')->user()->level == 'PAUD') selected @endif>
                                                                    PAUD</option>
                                                                <option value="SD"
                                                                    @if (auth()->guard('visitor')->user()->level == 'SD') selected @endif>
                                                                    SD</option>
                                                                <option value="SMP"
                                                                    @if (auth()->guard('visitor')->user()->level == 'SMP') selected @endif>
                                                                    SMP</option>
                                                                <option value="SMA"
                                                                    @if (auth()->guard('visitor')->user()->level == 'SMA') selected @endif>
                                                                    SMA</option>
                                                            </select>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row mb-3">
                        <div class="col-4 col-md-3 d-flex">
                            <div class="me-2"> <img style="max-widht: 20px;"
                                    src="{{ asset('web') }}/assets/icon/email.svg" alt="">
                            </div>
                            <div class="me-3 fw-bold">Email</div>
                        </div>
                        <div class="col d-flex">
                            <div class="me-1">:</div>
                            <div class="w-100 text-break pe-2">{{ auth()->guard('visitor')->user()->email }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 col-md-3 d-flex">
                            <div class="me-2"><img style="max-widht: 20px;"
                                    src="{{ asset('web') }}/assets/icon/medal.svg" alt="">
                            </div>
                            <div class="me-3 fw-bold">Medali</div>
                        </div>
                        <div class="col d-flex">
                            <div class="me-1">:</div>
                            <div class="w-100 text-break pe-2">-</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 col-md-3 d-flex">
                            <div class="me-2"><img style="max-widht: 20px;"
                                    src="{{ asset('web') }}/assets/icon/pin-2.svg" alt="">
                            </div>
                            <div class="me-3 fw-bold">Alamat</div>
                        </div>
                        <div class="col d-flex">
                            <div class="me-1">:</div>
                            <div class="w-100 text-break pe-2">{{ auth()->guard('visitor')->user()->address }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 col-md-3 d-flex">
                            <div class="me-2"><img style="max-widht: 20px;"
                                    src="{{ asset('web') }}/assets/icon/profesi.svg" alt="">
                            </div>
                            <div class="me-3 fw-bold">Profesi</div>
                        </div>
                        <div class="col d-flex">
                            <div class="me-1">:</div>
                            <div class="w-100 text-break pe-2">{{ auth()->guard('visitor')->user()->profession }}</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4 col-md-3 d-flex">
                            <div class="me-2"><img style="max-widht: 20px;"
                                    src="{{ asset('web') }}/assets/icon/toga.svg" alt="">
                            </div>
                            <div class="me-3 fw-bold">Jenjang</div>
                        </div>
                        <div class="col d-flex">
                            <div class="me-1">:</div>
                            <div class="w-100 text-break pe-2">{{ auth()->guard('visitor')->user()->level }}</div>
                        </div>
                    </div>

                    {{-- <div class="row mb-3">
                        <div class="col-4 col-md-3 d-flex">
                            <div class="me-2"><img style="max-widht: 20px;"
                                    src="{{ asset('web') }}/assets/icon/building.svg" alt="">
                            </div>
                            <div class="me-3 fw-bold">Instansi</div>
                        </div>
                        <div class="col d-flex">
                            <div class="me-1">:</div>
                            <div class="w-100 text-break pe-2">{{ auth()->guard('visitor')->user()->instansi }}</div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="profile-banner">
                <div class="col-12 profile-banner-img">
                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/profile-banner.png" alt="">
                </div>
                <div class="profile-banner-tagline">
                    <h4>Selamat {{ auth()->guard('visitor')->user()->name }} sudah mencapai Medali Perunggu</h4>
                    <p>Terus tingkatkan prestasi membacamu dan capai medali Emasnya !</p>
                </div>
            </div>
        </div> --}}

        <div class="row my-5">
            <div class="col-12">
                <div class="px-5 profile-achive-container">
                    <img src="{{ asset('web/assets/img/platinum.svg') }}" class="img-top">
                    <div class="profile-achive-text">
                        <h4>Hallo {{ auth()->guard('visitor')->user()->name }}, Budi punya medali untukmu</h4>
                        {{-- <p class="m-0">Terus tingkatkan prestasi membacamu dan capai medali Emasnya !</p> --}}
                    </div>

                    <img src="{{ asset('web/assets/img/daun.svg') }}" class="img-bottom">
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="profile-list">
            <h5 class="fw-bold">Syarat dan Ketentuan Medali</h5>
            <div class="row">
                <div class="col-12">
                    <div class="profile-list-item">
                        <div class="number">
                            #1
                        </div>
                        <div class="profile-list-content ms-4 ms-md-5">
                            <h5 class="fw-bold mb-4">Medali Emas</h5>
                            <p>Membaca minimal 100 buku (hingga selesai)</p>
                            <p>Mengunduh minimal 150 buku</p>
                            <p>Membagikan buku kepada teman minimal 20 buku</p>
                        </div>
                    </div>
                    <div class="profile-list-item">
                        <div class="number">
                            #2
                        </div>
                        <div class="profile-list-content ms-4 ms-md-5">
                            <h5 class="fw-bold mb-4">Medali Perak</h5>
                            <p>Membaca minimal 80 buku (hingga selesai)</p>
                            <p>Mengunduh minimal 100 buku</p>
                            <p>Membagikan buku kepada teman minimal 10 buku</p>
                        </div>
                    </div>
                    <div class="profile-list-item">
                        <div class="number">
                            #3
                        </div>
                        <div class="profile-list-content ms-4 ms-md-5">
                            <h5 class="fw-bold mb-4">Medali Perunggu</h5>
                            <p>Membaca minimal 50 buku (hingga selesai)</p>
                            <p>Mengunduh minimal 70 buku</p>
                            <p>Membagikan buku kepada teman minimal 10 buku</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
    <script>
        $("#status").on('change', function() {
            if ($(this).val() == 'Siswa') {
                $("#sub-status").html(`
                <div class="form-group" id="sub-status">
                                                            <label for="exampleInputEmail1">Jenjang
                                                            </label>
            <select id="status" class="form-control mt-3 " aria-label="size 3 select example"
                            placeholder="" name="sub-status">
                            <option selected value="">--Pilih Jenjang--</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                        </select>
                        </div>
            `);
            } else if ($(this).val() == 'Guru / Tenaga Pendidik' ||
                $(this).val() == 'Orang Tua Siswa') {
                $("#sub-status").html(`
                <div class="form-group" id="sub-status">
                    <label for="exampleInputEmail1">Jenjang</label>
        <select id="status" class="form-control mt-3 " aria-label="size 3 select example"
                        placeholder="" name="sub-status">
                        <option selected value="">--Pilih Jenjang--</option>
                        <option value="PAUD">PAUD</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                    </select>
                    </div>
        `);
            } else {
                $("#sub-status").html(``);
            }
        })
    </script>
    <script>
        $(document).ready(function() {

            var u_province_id = {{ auth()->guard('visitor')->user()->province }};
            var u_city_id = {{ auth()->guard('visitor')->user()->city }};
            var u_district_id = {{ auth()->guard('visitor')->user()->district }};
            var u_sub_district_id = {{ auth()->guard('visitor')->user()->sub_district }};
            $.ajax({
                type: 'GET',
                url: "{{ url('province') }}",
                success: function(hasil) {
                    var province = hasil.provinsi;
                    for (let i = 0; i < province.length; i++) {
                        if (u_province_id == province[i].id) {
                            $("select[name=province]").append("<option value='" + province[i].id +
                                "' selected>" +
                                province[i].nama + "</option>")
                        } else {
                            $("select[name=province]").append("<option value='" + province[i].id +
                                "'>" +
                                province[i].nama + "</option>")
                        }
                    }
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('city') }}/" + u_province_id,
                        success: function(hasil) {
                            var city = hasil.kota_kabupaten;
                            $("select[name=city]").html("");
                            $("select[name=city]").append(
                                "<option value=''>--Pilih Kota--</option>")
                            for (let i = 0; i < city.length; i++) {
                                if (u_city_id == city[i].id) {
                                    $("select[name=city]").append("<option value='" + city[
                                            i]
                                        .id + "' selected>" +
                                        city[i].nama + "</option>")
                                } else {

                                    $("select[name=city]").append("<option value='" + city[
                                            i]
                                        .id + "'>" +
                                        city[i].nama + "</option>")
                                }

                            }
                        }
                    });
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('district') }}/" + u_city_id,
                        success: function(hasil) {
                            var district = hasil.kecamatan;
                            $("select[name=district]").html("");
                            $("select[name=district]").append(
                                "<option value=''>--Pilih Kecamatan--</option>")
                            for (let i = 0; i < district.length; i++) {
                                if (u_district_id == district[i].id) {
                                    $("select[name=district]").append("<option value='" +
                                        district[i]
                                        .id + "' selected>" +
                                        district[i].nama + "</option>")
                                } else {

                                    $("select[name=district]").append("<option value='" +
                                        district[i]
                                        .id + "'>" +
                                        district[i].nama + "</option>")
                                }
                            }
                        }
                    });
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('sub_district') }}/" + u_district_id,
                        success: function(hasil) {
                            var district = hasil.kelurahan;
                            $("select[name=sub_district]").html("");
                            $("select[name=sub_district]").append(
                                "<option value=''>--Pilih Kelurahan--</option>")
                            for (let i = 0; i < district.length; i++) {
                                if (u_sub_district_id == district[i].id) {
                                    $("select[name=sub_district]").append(
                                        "<option value='" +
                                        district[
                                            i]
                                        .id + "' selected>" +
                                        district[i].nama + "</option>")
                                } else {
                                    $("select[name=sub_district]").append(
                                        "<option value='" +
                                        district[
                                            i]
                                        .id + "'>" +
                                        district[i].nama + "</option>")
                                }
                            }
                        }
                    });
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
                            if (u_city_id == city[i].id) {
                                $("select[name=city]").append("<option value='" + city[i]
                                    .id + "' selected>" +
                                    city[i].nama + "</option>")
                            }
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
                            "<option value=''>--Pilih Kelurahan--</option>")
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
@endsection
