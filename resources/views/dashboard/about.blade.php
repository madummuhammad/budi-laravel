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
                        <!-- <h4 class="card-title">Jenis Buku</h4> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="text-center">{{$about->tagline}}</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn badge badge-success mb-2" data-toggle="modal"
                                            data-target="#edit-banner"><i class="bi bi-pencil-square"></i></button>
                                            <div class="modal fade" id="edit-banner" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Banner
                                                        </h5>
                                                        <button type="button" class="close"
                                                        data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                action="{{ url('dashboard/about/') . '/' . $about->id }}"
                                                method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label
                                                                for="exampleInputEmail1">Tagline</label>
                                                                <input type="text" class="form-control"
                                                                id="exampleInputEmail1"
                                                                aria-describedby="emailHelp"
                                                                name="tagline"
                                                                value="{{ $about->tagline }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Gambar
                                                                Banner</label><br>
                                                                <input type="file" class="form-control"
                                                                id="cover-buku"
                                                                aria-describedby="emailHelp" hidden
                                                                name="image">
                                                                <label for="cover-buku"
                                                                class="label-upload-custom btn btn-secondary">Pilih
                                                            File</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Tutup</button>
                                                <button type="submit"
                                                class="btn btn-primary">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="img-fluid w-100" src="{{$about->banner}}" alt="{{$about->banner}}">
            <form action="{{ url('dashboard/about_content/') . '/' . $about->id }}" method="POST" class="mt-5 w-100" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group w-100">
                    <label for="exampleInputEmail1" class="text-dark">Isi
                    </label>
                    <textarea class="blog" name="content">{{ $about->content }}</textarea>
                </div>
                <button class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
