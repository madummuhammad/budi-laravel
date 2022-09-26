@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div class="dash"></div>
    <div class="container page-profile">
        <div class="row mt-5">
            <h2 class="text-dark fw-bold mb-5" style="font-size: 38px;">Profile</h2>
            <div class="col-4">
                <div class="profile-container">
                    <img class="img-fluid profile" src="{{ auth()->guard('visitor')->user()->image }}" alt="">
                    <div class="profile-medal-container">
                        <img class="profile-medal" src="{{ asset('web') }}/assets/icon/medali.png" alt="">
                    </div>
                </div>
                <div class="input-file d-flex justify-content-center">
                    <button data-bs-toggle="modal" data-bs-target="#image-profile"
                        class="text-decoration-underline text-center text-blue mt-4 btn" for="upload">Ganti
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
                                <form action="{{ url('profile_image') }}" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="modal-body">
                                            @method('patch')
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <img class="img-fluid"
                                                        src="{{ auth()->guard('visitor')->user()->image }}" alt="">
                                                    <input type="file" class="form-control" name="image">
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
            </div>
            <div class="col-7 ps-5">
                <div class="d-flex align-items-center justify-content-between mb-5">
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
                                                    <div class="row row-cols-3">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Kota
                                                                </label>
                                                                <select class="form-control" name="city"
                                                                    id="">
                                                                    <option>--Pilih Kota--</option>
                                                                    <option value="2">asdf</option>
                                                                    <option value="3">asfd</option>
                                                                    <option value="4">asdf</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Kecamatan
                                                                </label>
                                                                <select class="form-control" name="sub"
                                                                    id="">
                                                                    <option>--Pilih Kecamatan--</option>
                                                                    <option value="1">asdf</option>
                                                                    <option value="2">asfd</option>
                                                                    <option value="3">asdf</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Kelurahan
                                                                </label>
                                                                <select class="form-control" name="area"
                                                                    id="">
                                                                    <option value="">--Pilih Kelurahan--</option>
                                                                    <option value="1">asdf</option>
                                                                    <option value="2">asfd</option>
                                                                    <option value="3">asdf</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Alamat
                                                        </label>

                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            name="address"
                                                            value="{{ auth()->guard('visitor')->user()->address }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Profesi
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            name="profession"
                                                            value="{{ auth()->guard('visitor')->user()->profession }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Jenjang
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            name="level"
                                                            value="{{ auth()->guard('visitor')->user()->level }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Instansi
                                                        </label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            name="instansi"
                                                            value="{{ auth()->guard('visitor')->user()->instansi }}">
                                                    </div>
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
                <div class="row mb-3">
                    <div class="col-3 fw-bold"><img style="width: 20px;" src="{{ asset('web') }}/assets/icon/email.svg"
                            alt="">
                        Email
                    </div>
                    <div class="col-9 fw">: {{ auth()->guard('visitor')->user()->email }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-3 fw-bold"><img style="width: 20px;" src="{{ asset('web') }}/assets/icon/medal.svg"
                            alt="">
                        Medali
                    </div>
                    <div class="col-9">: </div>
                </div>
                <div class="row mb-3">
                    <div class="col-3 fw-bold"><img style="width: 20px;" src="{{ asset('web') }}/assets/icon/pin-2.svg"
                            alt="">
                        Alamat
                    </div>
                    <div class="col-9">: {{ auth()->guard('visitor')->user()->address }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-3 fw-bold"><img style="width: 20px;"
                            src="{{ asset('web') }}/assets/icon/profesi.svg" alt="">
                        Profesi
                    </div>
                    <div class="col-9"> : {{ auth()->guard('visitor')->user()->profession }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-3 fw-bold"><img style="width: 20px;" src="{{ asset('web') }}/assets/icon/toga.svg"
                            alt="">
                        Jenjang
                    </div>
                    <div class="col-9"> : {{ auth()->guard('visitor')->user()->level }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-3 fw-bold"><img style="width: 20px;"
                            src="{{ asset('web') }}/assets/icon/building.svg" alt="">
                        Instansi</div>
                    <div class="col-9"> : {{ auth()->guard('visitor')->user()->instansi }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="profile-banner">
                <div class="col-12 profile-banner-img">
                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/profile-banner.png" alt="">
                </div>
                <div class="profile-banner-tagline">
                    <h2>Selamat Febri sudah mencapai Medali Perunggu</h2>
                    <p>Terus tingkatkan prestasi membacamu dan capai medali Emasnya !</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row profile-list">
            <h5 class="fw-bold">Syarat dan Ketentuan Medali</h5>
            <div class="row">
                <div class="profile-list-item">
                    <div class="number">
                        #1
                    </div>
                    <div class="profile-list-content">
                        <h5 class="fw-bold">Medali Emas</h5>
                        <p>Membaca minimal 100 buku (hingga selesai)</p>
                        <p>Mengunduh minimal 150 buku</p>
                        <p>Membagikan buku kepada teman minimal 20 buku</p>
                    </div>
                </div>
                <div class="profile-list-item">
                    <div class="number">
                        #2
                    </div>
                    <div class="profile-list-content">
                        <h5 class="fw-bold">Medali Perak</h5>
                        <p>Membaca minimal 80 buku (hingga selesai)</p>
                        <p>Mengunduh minimal 100 buku</p>
                        <p>Membagikan buku kepada teman minimal 10 buku</p>
                    </div>
                </div>
                <div class="profile-list-item">
                    <div class="number">
                        #3
                    </div>
                    <div class="profile-list-content">
                        <h5 class="fw-bold">Medali Perunggu</h5>
                        <p>Membaca minimal 50 buku (hingga selesai)</p>
                        <p>Mengunduh minimal 70 buku</p>
                        <p>Membagikan buku kepada teman minimal 10 buku</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
