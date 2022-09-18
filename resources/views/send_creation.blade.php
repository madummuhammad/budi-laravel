@extends('main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{ $banners->image }}" alt="">
        <h2 class="ff-kidzone tagline text-white">{{ $banners->tagline }}</h2>
    </div>
    <div class="container">
        <div class="news-detail">
            <div class="title">
                <h1 class="fw-bold w-100 text-blue">{{ $send_creations->heading }}</h1>
                <div class="share">
                    <a class=""><i class="bi bi-heart"></i></a>
                    <a class=""><i class="bi bi-share"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @foreach ($send_creations->send_creation_images as $send_creation_image)
                    @if ($loop->index == 1)
                        <img class="img-fluid" src="{{ $send_creation_image->image }}" alt="">
                    @endif
                @endforeach
                @php
                    echo $send_creations->sub_heading;
                @endphp


                <div class="row">
                    <div class="col-7">
                        @php
                            echo $send_creations->content;
                        @endphp
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        @foreach ($send_creations->send_creation_images as $send_creation_image)
                            @if ($loop->index == 0)
                                <img class="img-fluid" src="{{ $send_creation_image->image }}" alt="">
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
