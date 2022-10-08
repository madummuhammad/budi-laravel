@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div class="dash"></div>
    <div class="container mt-5 p-lg-5" id="kontak_kami">
        <div class="row">
            <div class="col-12 col-md-5">
                <img class="img-fluid d-none d-md-block" src="{{ asset('web') }}/assets/img/kontak_kami.png" alt="">
            </div>
            <div class="col-12 col-md-7">
                <h1 class="ff-kidzone fs-70px">Kontak Kami</h1>
                <img class="img-fluid d-md-none" src="{{ asset('web') }}/assets/img/kontak_kami.png" alt="">
                <div class="row mt-4 text-center text-lg-start">
                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start">
                            <img src="{{ asset('web') }}/assets/icon/evelope.svg" class="mb-2 mb-lg-0 mr-lg-2 me-lg-2"
                                style="max-height: 20px">
                            <span class="text-break">{{$contact->email}}</span>
                        </div>
                        <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start mt-4">
                            <img src="{{ asset('web') }}/assets/icon/pin.svg" class="mb-2 mb-lg-0 mr-lg-2 me-lg-2"
                                style="max-height: 20px">
                            <span>{{$contact->address}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start mt-4 mt-md-0">
                            <img src="{{ asset('web') }}/assets/icon/telephone.svg" class="mb-2 mb-lg-0 mr-lg-2 me-lg-2"
                                style="max-height: 20px">
                            <span>{{$contact->phone}}</span>
                        </div>

                        <div class="d-flex flex-column flex-lg-row align-items-center align-items-lg-start mt-4">
                            <img src="{{ asset('web') }}/assets/icon/clock.svg" class="mb-2 mb-lg-0 mr-lg-2 me-lg-2"
                                style="max-height: 20px">
                            <div>
                                <span>Jam Operasional:</span>
                                <p class="m-0"><b>Senin - Jumat : </b>09.00 - 16.00 WIB</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 my-5 text-center text-md-start">
                    <p class="fw-bold">Media Sosial</p>
                    <a class="d-inline-block" href="https://www.instagram.com/badanbahasakemendikbud/" target="_blank"><img
                            class="mx-2" src="{{ asset('web') }}/assets/icon/instagram.svg" alt=""></a>
                    <a class="d-inline-block" href="https://www.facebook.com/Badan.Bahasa/" target="_blank"><img
                            class="mx-2" src="{{ asset('web') }}/assets/icon/facebook.svg" alt=""></a>
                    <a class="d-inline-block" href="https://twitter.com/badanbahasa" target="_blank"><img class="mx-2"
                            src="{{ asset('web') }}/assets/icon/twitter.svg" alt=""></a>
                    <a class="d-inline-block" href="https://www.youtube.com/BadanBahasa" target="_blank"><img class="mx-2"
                            src="{{ asset('web') }}/assets/icon/youtube.svg" alt=""></a>
                    <a class="d-inline-block" href="https://www.tiktok.com/@badanbahasa" target="_blank"><img class="mx-2"
                            src="{{ asset('web') }}/assets/icon/tiktok.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div id="kontak-section-1">
        <div class="container p-lg-5 py-5 px-4">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2 class="fs-40px fw-bold text-center text-md-start mb-4">Kirim Pesan</h2>
                    <img src="{{ asset('web') }}/assets/img/kirim_pesan.png" alt="" class="img-fluid d-md-none">
                    @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ url('email') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <input type="text" class="form-control py-3 @error('name') is-invalid @enderror"
                                name="name" id="exampleFormControlInput1" placeholder="Nama"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email"
                                class="form-control py-3 @error('email')
                                is-invalid
                            @enderror "
                                id="exampleFormControlInput1" placeholder="Alamat Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <textarea name="pesan" id="" cols="30" rows="10"
                                class="form-control py-3 @error('pesan')
                                is-invalid
                            @enderror "
                                placeholder="Pesan">{{ old('pesan') }}</textarea>
                            @error('pesan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn bg-blue text-white w-100 py-3">Kirim</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 order-first order-md-last">
                    <img src="{{ asset('web') }}/assets/img/kirim_pesan.png" alt=""
                        class="img-fluid d-none d-md-block">
                </div>
            </div>
        </div>
    </div>
@endsection
