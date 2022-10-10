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
                        <h4 class="card-title">Footer</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-12">
                                      <form action="{{url('dashboard/footer')}}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="form-group">
                                            <label for="">Heading</label>
                                            <textarea id="" cols="30" rows="5" name="heading" class="sinopsis">{{$contact->heading}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Sub Heading</label>
                                            <textarea name="sub_heading" id="" cols="30" rows="5" class="form-control">{{$contact->sub_heading}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control" value="{{$contact->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Telepon</label>
                                            <input type="text" name="phone" class="form-control" value="{{$contact->phone}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" name="email" value="{{$contact->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea name="address" id="" cols="30" rows="5" class="form-control">{{$contact->address}}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim Perubahan</button>
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
@endsection
