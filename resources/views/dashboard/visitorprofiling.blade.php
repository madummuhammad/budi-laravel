@extends('dashboard.main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Visitor {{ $visitors->name }}</h4>
                            <a href="{{ url('dashboard/visitor/member/profiling/export') }}/{{ $visitors->id }}"
                                class="btn btn-success text-white"><i class="fa-regular fa-file-excel"></i> export</a>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <img class="img-fluid" src="{{ $visitors->image }}" alt="">
                            </div>
                            <div class="col-12 col-md-9 text-dark">
                                <h5><span class="d-inline-block" style="width:120px">Nama</span> :{{ $visitors->name }}</h5>
                                <h5><span class="d-inline-block" style="width:120px">Pos-el</span>: {{ $visitors->email }}
                                </h5>
                                <h5><span class="d-inline-block" style="width:120px">Nama Pengguna</span>:
                                    {{ $visitors->username }}</h5>
                                <h5><span class="d-inline-block" style="width:120px">No Telp</span>:
                                    {{ $visitors->username }}</h5>
                                <h5><span class="d-inline-block" style="width:120px">Alamat</span>:
                                    {{ $address['sub_district'] }}, {{ $address['district'] }}, {{ $address['city'] }},
                                    {{ $address['province'] }}</h5>
                                <h5><span class="d-inline-block" style="width:120px">Profesi</span>:
                                    {{ $visitors->profession }}</h5>
                                <h5><span class="d-inline-block" style="width:120px">Jenjang</span>: {{ $visitors->level }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buku Dibaca</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Jenjang</th>
                                            <th>Tema</th>
                                            <th>Format</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($visitors->book_read_statistics as $read)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                @foreach ($read->books as $book)
                                                    <td><img class="img-fluid" src="{{ $book->cover }}" alt="">
                                                    </td>
                                                @endforeach
                                                @foreach ($read->books as $book)
                                                    <td>{{ $book->name }}</td>
                                                @endforeach
                                                @foreach ($read->books as $book)
                                                    @foreach ($book->levels as $level)
                                                        <td>{{ $level->name }}</td>
                                                    @endforeach
                                                @endforeach
                                                @foreach ($read->books as $book)
                                                    @foreach ($book->themes as $theme)
                                                        <td>{{ $theme->name }}</td>
                                                    @endforeach
                                                @endforeach
                                                @foreach ($read->books as $book)
                                                    @foreach ($book->book_types as $book_type)
                                                        <td>{{ $book_type->name }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buku Disukai</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Jenjang</th>
                                            <th>Tema</th>
                                            <th>Format</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($likeds->mylibraries->where('liked', 1) as $mylibrary)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td><img src="{{ $mylibrary->books->cover }}" alt=""
                                                        class="img-fluid"></td>
                                                <td>{{ $mylibrary->books->name }}</td>
                                                @foreach ($mylibrary->books->levels as $level)
                                                    <td>{{ $level->name }}</td>
                                                @endforeach
                                                @foreach ($mylibrary->books->themes as $theme)
                                                    <td>{{ $theme->name }}</td>
                                                @endforeach
                                                @foreach ($mylibrary->books->book_types as $book_type)
                                                    <td>{{ $book_type->name }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buku Disimpan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Jenjang</th>
                                            <th>Tema</th>
                                            <th>Format</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($likeds->mylibraries->where('saved', 1) as $mylibrary)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td><img src="{{ $mylibrary->books->cover }}" alt=""
                                                        class="img-fluid"></td>
                                                <td>{{ $mylibrary->books->name }}</td>
                                                @foreach ($mylibrary->books->levels as $level)
                                                    <td>{{ $level->name }}</td>
                                                @endforeach
                                                @foreach ($mylibrary->books->themes as $theme)
                                                    <td>{{ $theme->name }}</td>
                                                @endforeach
                                                @foreach ($mylibrary->books->book_types as $book_type)
                                                    <td>{{ $book_type->name }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buku Selesai</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Jenjang</th>
                                            <th>Tema</th>
                                            <th>Format</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($likeds->mylibraries->where('read', 2) as $mylibrary)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td><img src="{{ $mylibrary->books->cover }}" alt=""
                                                        class="img-fluid"></td>
                                                <td>{{ $mylibrary->books->name }}</td>
                                                @foreach ($mylibrary->books->levels as $level)
                                                    <td>{{ $level->name }}</td>
                                                @endforeach
                                                @foreach ($mylibrary->books->themes as $theme)
                                                    <td>{{ $theme->name }}</td>
                                                @endforeach
                                                @foreach ($mylibrary->books->book_types as $book_type)
                                                    <td>{{ $book_type->name }}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buku Diunduh</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Jenjang</th>
                                            <th>Tema</th>
                                            <th>Format</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($downloaded->book_download_statistics as $bds)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                @foreach ($bds->books as $book)
                                                    <td><img class="img-fluid" src="{{ $book->cover }}" alt="">
                                                    </td>
                                                @endforeach
                                                @foreach ($bds->books as $book)
                                                    <td>{{ $book->name }}</td>
                                                @endforeach
                                                @foreach ($bds->books as $book)
                                                    @foreach ($book->levels as $level)
                                                        <td>{{ $level->name }}</td>
                                                    @endforeach
                                                @endforeach
                                                @foreach ($bds->books as $book)
                                                    @foreach ($book->themes as $theme)
                                                        <td>{{ $theme->name }}</td>
                                                    @endforeach
                                                @endforeach
                                                @foreach ($bds->books as $book)
                                                    @foreach ($book->book_types as $book_type)
                                                        <td>{{ $book_type->name }}</td>
                                                    @endforeach
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Komentar</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Jenjang</th>
                                            <th>Tema</th>
                                            <th>Format</th>
                                            <th>Komentar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($comments->comments as $comment)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                @foreach ($comment->books as $book)
                                                    <td><img src="{{ $book->cover }}" alt="" class="img-fluid">
                                                    </td>
                                                @endforeach
                                                @foreach ($comment->books as $book)
                                                    <td>{{ $book->judul }}</td>
                                                @endforeach
                                                @foreach ($comment->books as $book)
                                                    @foreach ($book->levels as $level)
                                                        <td>{{ $level->name }}</td>
                                                    @endforeach
                                                @endforeach
                                                @foreach ($comment->books as $book)
                                                    @foreach ($book->themes as $theme)
                                                        <td>{{ $theme->name }}</td>
                                                    @endforeach
                                                @endforeach
                                                @foreach ($comment->books as $book)
                                                    @foreach ($book->book_types as $book_type)
                                                        <td>{{ $book_type->name }}</td>
                                                    @endforeach
                                                @endforeach
                                                <td>{{ $comment->comment }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buku Dishare</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Jenjang</th>
                                            <th>Tema</th>
                                            <th>Format</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($shared->shares as $share)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                @foreach ($share->books as $book)
                                                    <td><img class="img-fluid" src="{{ $book->cover }}" alt="">
                                                    </td>
                                                @endforeach
                                                @foreach ($share->books as $book)
                                                    <td>{{ $book->name }}</td>
                                                @endforeach
                                                @foreach ($share->books as $book)
                                                    @foreach ($book->levels as $level)
                                                        <td>{{ $level->name }}</td>
                                                    @endforeach
                                                @endforeach
                                                @foreach ($share->books as $book)
                                                    @foreach ($book->themes as $theme)
                                                        <td>{{ $theme->name }}</td>
                                                    @endforeach
                                                @endforeach
                                                @foreach ($share->books as $book)
                                                    @foreach ($book->book_types as $book_type)
                                                        <td>{{ $book_type->name }}</td>
                                                    @endforeach
                                                @endforeach
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
