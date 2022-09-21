@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ asset('web') }}/assets/img/pustakaku.png" alt="">
        <h2 class="ff-kidzone tagline text-white">Pustakaku</h2>
    </div>
    <div class="container">
        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <div class="d-flex ">
                    <div class="home-tab bg-white w-100 px-5">
                        <div class="row">
                            <div class="col-5">
                                <p class="fs-5 m-0 fw-light">Koleksi Pribadi</p>
                                <h3 class="fw-bold mt-3 mb-5">{{ auth()->guard('visitor')->user()->name }}</h3>
                            </div>
                            <div class="col-4">
                                <p class="fs-5 m-0 fw-light">Medali</p>
                                <h3 class="fw-bold mt-3 mb-5">Perunggu</h3>
                            </div>
                            <div class="col-3">
                                <p class="fs-5 m-0 fw-light">Jumlah</p>
                                <h3 class="fw-bold mt-3 mb-5">{{ $number_of_done }} Buku</h3>
                            </div>
                        </div>
                        <div class="home-tab-body p-0">
                            <div class="input-group input-search w-100 p-0">
                                <input type="text" class="form-control " id="search" placeholder="Cari">
                                <button class="btn" style="border-left: 0;" id="search-button"><i
                                        class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="my_library">

                </div>
            </div>
        </div>
        @csrf
    </div>
    <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
    <script>
        var token = $("input[name=_token]").val();
        $(document).ready(function() {
            $(".next").on('click', function() {
                alert('asdfsadf')
            })
            $.ajax({
                type: 'POST',
                url: "{{ url('mylibrary') }}",
                data: {
                    _method: "POST",
                    _token: token,
                },
                success: function(hasil) {
                    $("#my_library").html(hasil);
                    $("#search").keyup(function() {
                        var keyword = $("#search").val();
                        $.ajax({
                            type: 'POST',
                            url: "{{ url('mylibrary') }}",
                            data: {
                                _method: "POST",
                                _token: token,
                                keyword: keyword,
                            },
                            success: function(hasil) {
                                $("#my_library").html(hasil);
                            }
                        })
                    })
                }
            });
        })
    </script>
@endsection
