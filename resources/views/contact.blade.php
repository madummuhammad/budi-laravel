@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div class="dash"></div>
    <div class="container mt-5" id="kontak_kami">
        <div class="row">
            <div class="col-12 col-md-5">
                <img class="img-fluid" src="{{ asset('web') }}/assets/img/kontak_kami.png" alt="">
            </div>
            <div class="col-12 col-md-7 ps-5">
                <h1 class="ff-kidzone fs-70px">Kontak Kami</h1>
                <div class="row mt-4">
                    <div class="col-12 col-md-6">
                        <p class="p-0"><img src="{{ asset('web') }}/assets/icon/evelope.svg" alt="">
                            badan.bahasa@kemdikbud.go.id</p>
                        <p><img src="{{ asset('web') }}/assets/icon/pin.svg" alt=""> Jalan Daksinapati Barat IV,
                            Rawamangun,
                            Jakarta
                            13220</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p><img src="{{ asset('web') }}/assets/icon/telephone.svg" alt=""> (021) 4750406</p>
                        <p class="m-0"> <img src="{{ asset('web') }}/assets/icon/clock.svg" alt=""> Jam
                            Operasional:</p>
                        <p class="ps-4 m-0"><span class="fw-bold">Senin - Kamis</span>:
                            09.00 - 17.00 WIB,
                        </p>
                        <p class="ps-4"><span class="fw-bold">Jumat</span>:
                            09.00 - 16.00 WIB
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <p>Media Sosial</p>
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
        <div class="container p-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2 class="fs-40px fw-bold">Kirim Pesan</h2>
                    <form action="">
                        <div class="mb-3">
                            <input type="text" class="form-control py-3" id="exampleFormControlInput1"
                                placeholder="Nama">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control py-3" id="exampleFormControlInput1"
                                placeholder="Alamat Email">
                        </div>
                        <div class="mb-3">
                            <textarea name="" id="" cols="30" rows="10" class="form-control py-3" placeholder="Pesan"></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn bg-blue text-white w-100 py-3">Kirim</button>
                        </div>
                    </form>
                </div>
                <div class="col-12 col-md-6 order-first order-md-last">
                    <img src="{{ asset('web') }}/assets/img/kirim_pesan.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
