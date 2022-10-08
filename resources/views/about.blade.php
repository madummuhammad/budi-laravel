@extends('main')
@section('judul_halaman', 'Homepage')
@section('content')
    <div id="hero">
        <img class="w-100" src="{{$about->banner}}" alt="">
        <h2 class="ms-4 ff-kidzone tagline text-white">{{$about->tagline}}</h2>
    </div>
    <div class="container p-4">
        @php
        echo $about->content;
        @endphp
    </div>
@endsection
