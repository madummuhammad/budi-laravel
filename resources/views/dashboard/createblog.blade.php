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
                                @if ($id == 'article')
                                    Karyamu
                                @endif
                                @if ($id == 'news')
                                    Berita
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('dashboard/blog/') . '/' . $id . '/create' }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    @method('POST')
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
                                                    aria-describedby="emailHelp" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1" class="text-dark">Gambar Cover</label>
                                                <input type="file" class="form-control file-input-custom"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="cover">
                                            </div>
                                            @if ($id == 'article')
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="text-dark">Penulis</label>
                                                    <select class="single-select" name="writer" placeholder="asdfasdf">
                                                        <option selected disabled>--Pilih Penulis--</option>
                                                        @foreach ($articlewriters as $articlewriter)
                                                            <option value="{{ $articlewriter->id }}">
                                                                {{ $articlewriter->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" id="check1"
                                                        value="1" name="display_homepage">
                                                    <label class="form-check-label" for="check1">Tampilkan
                                                        di homepage?</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input name='tags' value='' class="form-control pb-4 pt-0">
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
                                                <textarea class="blog" name="content"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
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
