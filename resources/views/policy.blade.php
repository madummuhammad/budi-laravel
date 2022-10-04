@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ url('web/') }}/assets/img/informasi.png" alt="">
        <h2 class="ff-kidzone tagline text-white">Informasi</h2>
    </div>
    <div class="container p-4">
        <div class="row justify-content-center my-2">
            <div class="col-12 col-md-10 d-block d-md-flex justify-content-between align-items-center">
                <p class="my-auto fs-3 fw-bold text-primary">Beberapa pertanyaan umum seputar Budi</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <p class="my-auto fw-bold">Apakah Budi itu?</p>
                <p class="my-auto mb-4">Budi merupakan laman resmi dengan alamat www.budi.kemdikbud.go.id yang
                    berisikan berbagai buku digital (budi) terbitan Badan Pengembangan dan Pembinaan Bahasa.</p>
                <p class="my-auto fw-bold">Apa saja yang bisa diakses dari laman Budi?</p>
                <p class="my-auto mb-4">Budi menyediakan bahan digital berupa buku bacaan, buku komik, buku audio, buku
                    video, dan referensi. Semua bahan dapat diakses secara gratis dan dipergunakan untuk kepentingan
                    peningkatan literasi masyarakat Indonesia, khususnya anak jenjang PAUD sampai dengan jenjang SMA
                    Sederajat. Akses yang diberikan adalah akses membaca dan mengunduh bahan digital dan akses
                    memberikan tanggapan terhadap bahan tersebut.</p>
                <p class="my-auto fw-bold">Siapa saja yang dapat mengakses Budi?</p>
                <p class="my-auto mb-4">Setiap masyarakat, khususnya anak Indonesia, dapat mengakses Budi secara
                    gratis.</p>
                <p class="my-auto fw-bold">Bagaimana cara mengakses Budi?</p>
                <p class="my-auto mb-4">Budi dapat diakses secara gratis dan bebas dengan mendaftar terlebih dahulu.
                    Pendaftar akan mendapatkan akun dan kata sandi yang digunakan untuk mengakses semua layanan di Budi.
                    Pengguna Budi yang sudah terdaftar dapat mengisi menu Pustakaku dengan buku-bku digital yang sudah
                    atau akan dibacanya. Pengguna Budi yang sudah terdaftar juga dapat mengirimkan karyanya untuk
                    dipublikasikan di laman Budi. Budi juga menyediakan medali digital dan komunitas bagi pengguna
                    terdaftar.</p>
                <p class="my-auto fw-bold">Apakah Budi dapat diakses di telepon genggam?</p>
                <p class="my-auto mb-4">Budi dapat diakses di mana pun dan kapan pun melalui gawai pengguna, dapat dari
                    komputer, tablet, dan telepon genggam.</p>
                <p class="my-auto fw-bold">Bagaimana cara memilih bahan digital yang sesuai?</p>
                <p class="my-auto mb-4">Budi berisikan lebih dari 700 bahan digital. Bahan disusun berdasarkan tema dan
                    jenjang pembaca sehingga memudahkan pengguna dalam pencarian. Pengguna dapat melakukan pencarian
                    cepat juga berdasarkan kata kunci judul dan pengarang buku.</p>
                <p class="my-auto fw-bold">Apakah buku digital yang diunduh dapat dicetak?</p>
                <p class="my-auto mb-4">Buku digital di laman Budi dapat diunduh dan dicetak untuk keperluan
                    pendidikan, tetapi tidak untuk diperjualbelikan. Jika memerlukan bahan resolusi tinggi untuk
                    pencetakan, dapat menghubungi kami di menu Kontak Kami. </p>
            </div>
        </div>
    </div>
@endsection
