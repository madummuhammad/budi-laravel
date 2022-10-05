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
                                @if ($id == 'Article')
                                    Karyamu
                                @endif
                                @if ($id == 'News')
                                    Berita
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('dashboard/blog/') . '/' . $id . '/edit' }}/{{ $blogs->id }}"
                                method="POST" enctype="multipart/form-data">
                                <div class="">
                                    @method('patch')
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-dark">Judul @if ($id == 'article')
                                                        Karyamu
                                                    @endif
                                                    @if ($id == 'news')
                                                        Berita
                                                    @endif
                                                </label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="name" value="{{ $blogs->name }}">
                                            </div>
                                            @if ($id == 'Article')
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-dark">Penulis</label>
                                                    <select class="single-select" name="writer" placeholder="asdfasdf">
                                                        <option selected disabled>--Pilih Penulis--</option>
                                                        @foreach ($articlewriters as $articlewriter)
                                                            <option value="{{ $articlewriter->id }}"
                                                                @if ($articlewriter->id == $blogs->writer) selected @endif>
                                                                {{ $articlewriter->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-dark">Gambar Cover</label><br>
                                                <img class="img-fluid mb-3" src="{{ $blogs->cover }}" alt="">
                                                <input type="file" class="form-control file-input-custom"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="cover">
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" id="check1"
                                                        value="1" name="display_homepage"
                                                        @if ($blogs->display_homepage == 1) checked @endif
                                                        @if ($display_number >= 4 and $blogs->display_homepage == 0) disabled @endif>
                                                    <label class="form-check-label" for="check1">Tampilkan
                                                        di homepage? ({{ $display_number }} dari 4)</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input name='tags'
                                                    value="@foreach ($blogs->tags as $tag)
                                                   {{ $tag->tag }}, @endforeach"
                                                    class="form-control pb-4 pt-0">
                                                <label class="form-check-label" for="check1">Tag</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-dark">Isi @if ($id == 'article')
                                                        Karyamu
                                                    @endif
                                                    @if ($id == 'news')
                                                        Berita
                                                    @endif
                                                </label>
                                                <textarea class="blog" name="content">{{ $blogs->content }}</textarea>
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
