@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ url('storage/image') }}/tentang_budi.png" alt="">
        <h2 class="ff-kidzone tagline text-white">Tentang Budi</h2>
    </div>
    <div class="container p-4">
        <div class="row justify-content-center my-2">
            <div class="col-12 col-md-10 d-block d-md-flex justify-content-between align-items-center">
                <p class="my-auto fs-3 fw-bold text-primary">Penjelasan singkat mengenai Budi</p>
                <div>
                    <a href="#" class="text-dark fs-5"><i class="fa-regular fa-heart"></i></a>
                    <a href="#" class="text-dark fs-5"><i class="fa fa-share-nodes"></i></a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <p>
                    Laman Budi merupakan laman yang berisikan buku digital (budi) yang dikembangkan oleh Badan
                    Pengembangan dan Pembinaan Bahasa melalui Kelompok Kepakaran dan Layanan Profesional Literasi (KKLP
                    Literasi). Kelompok kepakaran ini terdiri atas tenaga teknis kebahasaan yang melaksanakan tugas
                    Badan Bahasa sebagai koordinator Gerakan Literasi Nasional (GLN) Kemdikbud, yaitu menyediakan bahan
                    bacaan literasi untuk anak Indonesia.
                    <br><br>
                    Bahan bacaan literasi terbitan Badan Bahasa yang diunggah di laman Budi sudah lolos penilaian Pusat
                    Perbukuan dan dinyatakan layak untuk digunakan di sekolah-sekolah di Indonesia. Bahan bacaan
                    tersebut disesuaikan jenjangnya dengan ketentuan perjenjangan dari Pusat Perbukuan Kemdikbudristek.
                    <br><br>
                    Bahan bacaan Budi dikemas secara digital dan terdiri atas buku digital, buku audio, dan buku video.
                    Bahan ini dapat diunduh dan dipergunakan sesuai keperluan pendidikan dan tidak untuk
                    diperjualbelikan.
                    <br><br>
                    <span class="fw-bold fs-5">Tim Pengembang Budi</span>
                    <br>
                    <span class="fw-bold">Pengarah:</span>
                    <br>
                    <span class="fw-bold">Kepala Badan Pengembangan dan Pembinaan Bahasa</span>
                    <br>
                    E. Aminuddin Azis
                    <br>
                    <br>
                    <span class="fw-bold">Penanggung Jawab</span>
                    <br>
                    <span class="fw-bold">Kepala Pusat Pembinaan Bahasa dan Sastra</span>
                    <br>
                    M. Abdul Khak
                    <br>
                    <br>
                    <span class="fw-bold">Ketua</span>
                    <br>
                    Retno Utami
                    <br>
                    <br>
                    <span class="fw-bold">Anggota</span>
                    <br>
                    Aminulatif
                    <br>
                    Wenny Oktavia
                    <br>
                    Puteri Asmarini
                    <br>
                    Widowati Sumardi
                    <br>
                    Mutiara
                    <br>
                    Laveta Pamela Rianas
                    <br>
                    Yuli Estel
                    <br>
                    Didiek Batubara
                    <br>
                    Herlina Bacin
                    <br>
                    Pani Rizki Utami
                    <br>
                    Raisa
                    <br>
                    Shintia
                    <br><br>
                    <span class="fw-bold">Pengembang Aplikasi</span>
                    <br>
                    Produksi A+
                </p>
            </div>
        </div>
    </div>
@endsection
