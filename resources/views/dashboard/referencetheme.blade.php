@extends('dashboard.main')
@section('judul_halaman', 'Daftar Tema')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Tema</h4>
                        </div>
                        <div class="card-body">
                            <a href="#tambahbuku" data-toggle="modal" class="btn btn-primary mb-3">Tambah Tema</a>
                            <!-- Modal -->
                            <div class="modal fade" id="tambahbuku" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Tema</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('dashboard/reference_theme') }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @method('POST')
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tema</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cover Tema</label><br>
                                                            <input type="file" class="form-control file-input-custom"
                                                                id="cover-buku" aria-describedby="emailHelp" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Tema</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($themes as $theme)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>
                                                    <img src="{{ $theme->image }}" class="img-fluid w-50" alt="">
                                                </td>
                                                <td>{{ $theme->name }}</td>
                                                <td>
                                                    <button class="btn badge badge-danger" data-toggle="modal"
                                                        data-target="#hapus{{ $theme->id }}"><i
                                                            class="bi bi-trash3"></i></button>
                                                    <div class="modal" tabindex="-1" id="hapus{{ $theme->id }}">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 py-0">
                                                                    <h5 class="modal-title"></h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body py-0">
                                                                    <p class="p-0 m-0 fs-4">Hapus data buku ini?</p>
                                                                </div>
                                                                <div class="modal-footer pt-0 pb-1 border-0">
                                                                    <form action="{{ url('dashboard/reference_theme') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="text" name="id"
                                                                            value="{{ $theme->id }}" hidden>
                                                                        <button type="submit" class="btn badge-danger"><i
                                                                                class="bi bi-trash3"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn badge badge-primary" data-toggle="modal"
                                                        data-target="#edit{{ $theme->id }}"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <div class="modal" tabindex="-1" id="edit{{ $theme->id }}">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header border-0 py-0">
                                                                    <h5 class="modal-title"></h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body py-0">
                                                                    <p class="p-0 m-0 fs-4">Edit {{ $theme->name }}</p>
                                                                </div>
                                                                <div class="modal-footer pt-0 pb-1 border-0">
                                                                    <form action="{{ url('dashboard/reference_theme') }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            @method('patch')
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Tema</label>
                                                                                        <input type="text"
                                                                                            name="id"
                                                                                            value="{{ $theme->id }}"
                                                                                            hidden>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputEmail1"
                                                                                            aria-describedby="emailHelp"
                                                                                            name="name"
                                                                                            value="{{ $theme->name }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="exampleInputEmail1">Cover
                                                                                            Tema</label><br>
                                                                                        <div
                                                                                            class="d-flex justify-content-center">
                                                                                            <img class="img-fluid w-50 mb-2"
                                                                                                src="{{ $theme->image }}"
                                                                                                alt="">
                                                                                        </div>
                                                                                        <input type="file"
                                                                                            class="form-control file-input-custom"
                                                                                            id="cover-buku"
                                                                                            aria-describedby="emailHelp"
                                                                                            name="image">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Tutup</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Kirim</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
