@extends('dashboard.main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$pustakaku->tagline}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="text-center">Banner</h4>
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
                                                            <form action="{{ url('dashboard/blog/banner') }}" method="POST"
                                                                enctype="multipart/form-data">
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
                                                                                    value="{{ $pustakaku->tagline }}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputEmail1">Gambar
                                                                                    Banner</label><br>
                                                                                <input type="file" class="form-control"
                                                                                    id="cover-buku"
                                                                                    aria-describedby="emailHelp" hidden
                                                                                    name="cover">
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
                                            <img class="img-fluid w-100" src="{{ $pustakaku->image }}" alt="">
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
