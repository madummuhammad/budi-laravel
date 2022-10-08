@extends('dashboard.main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        {{-- <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Datatable</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div> --}}
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Penulis Bulan Ini
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('dashboard/author_of_the_month') }}" method="POST"
                        enctype="multipart/form-data">
                        <div class="">
                            @method('patch')
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-dark">Penulis</label>
                                        <select class="single-select" name="author" placeholder="asdfasdf">
                                            <option selected disabled>--Pilih Penulis--</option>
                                            @foreach ($authors as $author)
                                            <option value="{{ $author->id }}"
                                                @if ($aotm->author_id == $author->id) selected @endif>
                                                {{ $author->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-dark">Tanggal Upload</label><br>
                                        <input type="date" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="date" value="{{$author->updated_at}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-dark">Gambar</label><br>
                                        <img class="img-fluid mb-3" src="{{ $aotm->cover }}" alt="">
                                        <input type="file" class="form-control file-input-custom"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="cover">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-dark mt-5">
                                            Konten Homepage
                                        </label>
                                        <textarea class="blog" name="content_homepage">{{ $aotm->content_homepage }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="text-dark fs-3 mt-5">Isi
                                            Konten Utama
                                        </label>
                                        <textarea class="blog" name="content">{{ $aotm->content }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
