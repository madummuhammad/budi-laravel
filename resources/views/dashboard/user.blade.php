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
                            <h4 class="card-title">Admin</h4>
                        </div>
                        <div class="card-body">
                            <a href="#tambahbuku" data-toggle="modal" class="btn btn-primary mb-3">Tambah Admin</a>
                            <!-- Modal -->
                            <div class="modal fade" id="tambahbuku" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('dashboard/admin') }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @method('POST')
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nama</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email</label>
                                                            <input type="email" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="email">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Password</label>
                                                            <input type="password" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="password">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Role</label>
                                                            <select class="form-control" name="role" id="">
                                                                <option value=""></option>
                                                                <option value="1">Super Admin</option>
                                                                <option value="2">Admin</option>
                                                            </select>
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label for="exampleInputEmail1">Cover Tema</label><br>
                                                            <input type="file" class="form-control file-input-custom"
                                                                id="cover-buku" aria-describedby="emailHelp" name="image">
                                                        </div> --}}
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($users as $user)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <button class="btn badge badge-danger" data-toggle="modal"
                                                        data-target="#hapus{{ $user->id }}"><i
                                                            class="bi bi-trash3"></i></button>
                                                    <div class="modal" tabindex="-1" id="hapus{{ $user->id }}">
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
                                                                    <form action="{{ url('dashboard/admin') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="text" name="id"
                                                                            value="{{ $user->id }}" hidden>
                                                                        <button type="submit" class="btn badge-danger"><i
                                                                                class="bi bi-trash3"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn badge badge-primary" data-toggle="modal"
                                                        data-target="#edit{{ $user->id }}"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                        Admin</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ url('dashboard/admin') }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        @method('patch')
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleInputEmail1">Nama</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="exampleInputEmail1"
                                                                                        aria-describedby="emailHelp"
                                                                                        name="name"
                                                                                        value="{{ $user->name }}">
                                                                                    <input type="text" name="id"
                                                                                        value="{{ $user->id }}"
                                                                                        hidden>
                                                                                </div>
                                                                                {{-- <div class="form-group">
                                                                                    <label
                                                                                        for="exampleInputEmail1">Email</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="exampleInputEmail1"
                                                                                        aria-describedby="emailHelp"
                                                                                        name="email"
                                                                                        value="{{ $user->email }}">
                                                                                </div> --}}
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleInputEmail1">Password</label>
                                                                                    <input type="password"
                                                                                        class="form-control"
                                                                                        id="exampleInputEmail1"
                                                                                        aria-describedby="emailHelp"
                                                                                        name="password">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleInputEmail1">Role</label>
                                                                                    <select class="form-control"
                                                                                        name="role" id="">
                                                                                        <option value="">--Pilih
                                                                                            Role--</option>
                                                                                        <option value="1"
                                                                                            @if ($user->role == 1) selected @endif>
                                                                                            Super Admin
                                                                                        </option>
                                                                                        <option value="2"
                                                                                            @if ($user->role == 2) selected @endif>
                                                                                            Admin
                                                                                        </option>
                                                                                    </select>
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
