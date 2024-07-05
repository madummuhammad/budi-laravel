@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ $pustakaku->image }}" alt="">
        <h2 class="ff-kidzone tagline text-white">Pustakaku</h2>
    </div>
    <div class="container">
        <!-- Tab panes -->
        <div class="tab-content mt-3">
            <div class="tab-pane container active" id="buku_bacaan">
                <div class="d-flex">
                    <div class="home-tab bg-white w-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <div class="row">
                                        <div class="col-5 col-md-12">
                                            <p class="fs-6 fw-light">Koleksi Pribadi</p>
                                        </div>
                                        <div class="col-7 col-md-12">
                                            <h3 class="fw-bold fs-5">{{ auth()->guard('visitor')->user()->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="row">
                                        <div class="col-5 col-md-12">
                                            <p class="fs-6 fw-light">Medali</p>
                                        </div>
                                        <div class="col-5 col-md-12">
                                            <h3 class="fw-bold fs-5"> - </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                    <div class="row">
                                        <div class="col-5 col-md-12">
                                            <p class="fs-6 fw-light">Jumlah</p>
                                        </div>
                                        <div class="col-5 col-md-12">
                                            <h3 class="fw-bold fs-5">{{ $number_of_done }} Buku</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="home-tab-body p-0">
                            <div class="input-group input-search mylibrary-search w-100 p-0">
                                <input type="text" class="form-control " id="search" placeholder="Cari">
                                <input type="text" name="filter" value="1" hidden>
                                <button class="btn btn-outline-secondary dropdown-toggle filter text-dark" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Lanjutkan
                                    Membaca</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item filter-item" style="cursor: pointer"
                                            data-value="1">Lanjutkan Membaca</a></li>
                                    <li><a class="dropdown-item filter-item" style="cursor: pointer"
                                            data-value="2">Disukai</a></li>
                                    <li><a class="dropdown-item filter-item" style="cursor: pointer"
                                            data-value="3">Disimpan</a></li>
                                    <li><a class="dropdown-item filter-item" style="cursor: pointer"
                                            data-value="4">Selesai</a></li>
                                </ul>
                                <button class="btn search py-2" style="border-left: 0;" id="search-button"><i
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
        $(".filter-item").on('click', function() {
            var value = $(this).data('value');
            $("[name=filter]").val(value);
            $(".filter").html($(this).html())
        })
        $(document).ready(function() {
            $(".next").on('click', function() {
                alert('asdfsadf')
            })
            var filter = $("[name=filter]").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('mylibrary') }}",
                data: {
                    _method: "POST",
                    _token: token,
                    filter: filter
                },
                success: function(hasil) {
                    $("#my_library").html(hasil);
                    $("#search").keyup(function() {
                        var keyword = $("#search").val();
                        var filter = $("[name=filter]").val();
                        $.ajax({
                            type: 'POST',
                            url: "{{ url('mylibrary') }}",
                            data: {
                                _method: "POST",
                                _token: token,
                                keyword: keyword,
                                filter: filter,
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
