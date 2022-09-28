@extends('dashboard.main')
@section('judul_halaman', 'Daftar Buku')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            @foreach ($visitors as $visitor_visit)
                                @if ($visitor_visit->visitors == null)
                                    <h4 class="card-title text-danger">Pengunjung Ini Belum Register/Login</h4>
                                @else
                                    <h4 class="card-title">Visitor {{ $visitor_visit->visitors->name }}</h4>
                                @endif
                                <a href="{{ url('dashboard/visitor/profiling/export') }}/{{ $visitor_visit->id }}"
                                    class="btn btn-success text-white"><i class="fa-regular fa-file-excel"></i> export</a>
                            @endforeach
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
                                        @foreach ($visitors as $visitor_visit)
                                            @php
                                                $no = 0;
                                            @endphp
                                            @if (date('Y-m-d', $visitor_visit->time) == date('Y-m-d'))
                                                @foreach ($visitor_visit->book_read_statistics as $brs)
                                                    @php
                                                        $no++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        {{-- @if ($visitor_visit->visitors !== null)
                                                        <td>{{ $visitor_visit->visitors->name }}</td>
                                                    @else
                                                        <td>Unknown</td>
                                                    @endif --}}
                                                        @foreach ($brs->books as $book)
                                                            <td><img class="img-fluid" src="{{ $book->cover }}"
                                                                    alt=""></td>
                                                        @endforeach
                                                        @foreach ($brs->books as $book)
                                                            <td>{{ $book->name }}</td>
                                                        @endforeach
                                                        @foreach ($brs->books as $book)
                                                            @foreach ($book->levels as $level)
                                                                <td>{{ $level->name }}</td>
                                                            @endforeach
                                                        @endforeach
                                                        @foreach ($brs->books as $book)
                                                            @foreach ($book->themes as $theme)
                                                                <td>{{ $theme->name }}</td>
                                                            @endforeach
                                                        @endforeach
                                                        @foreach ($brs->books as $book)
                                                            @foreach ($book->book_types as $book_type)
                                                                <td>{{ $book_type->name }}</td>
                                                            @endforeach
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            @endif
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
                                        @foreach ($likeds as $liked)
                                            @php
                                                $no++;
                                            @endphp
                                            @if (date('Y-m-d', $visitor_visit->time) == date('Y-m-d'))
                                                @if ($liked->visitors !== null)
                                                    @foreach ($liked->visitors->mylibraries->where('liked', 1) as $mylibrary)
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
                                                @endif
                                            @endif
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
                                        @foreach ($likeds as $liked)
                                            @php
                                                $no++;
                                            @endphp
                                            @if (date('Y-m-d', $visitor_visit->time) == date('Y-m-d'))
                                                @if ($liked->visitors !== null)
                                                    @foreach ($liked->visitors->mylibraries->where('saved', 1) as $mylibrary)
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
                                                @endif
                                            @endif
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
                                        @foreach ($likeds as $liked)
                                            @php
                                                $no++;
                                            @endphp
                                            @if (date('Y-m-d', $visitor_visit->time) == date('Y-m-d'))
                                                @if ($liked->visitors !== null)
                                                    @foreach ($liked->visitors->mylibraries->where('read', 2) as $mylibrary)
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
                                                @endif
                                            @endif
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
                                        @foreach ($downloaded as $visitor_visit)
                                            @php
                                                $no = 0;
                                            @endphp
                                            @if (date('Y-m-d', $visitor_visit->time) == date('Y-m-d'))
                                                @foreach ($visitor_visit->book_download_statistics as $bds)
                                                    @php
                                                        $no++;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        {{-- @if ($visitor_visit->visitors !== null)
                                                        <td>{{ $visitor_visit->visitors->name }}</td>
                                                    @else
                                                        <td>Unknown</td>
                                                    @endif --}}
                                                        @foreach ($bds->books as $book)
                                                            <td><img class="img-fluid" src="{{ $book->cover }}"
                                                                    alt=""></td>
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
                                            @endif
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
                                        @foreach ($comments as $visitor_visit)
                                            @php
                                                $no = 0;
                                            @endphp
                                            @if (date('Y-m-d', $visitor_visit->time) == date('Y-m-d'))
                                                @if ($visitor_visit->visitors !== null)
                                                    @foreach ($visitor_visit->visitors->comments as $comment)
                                                        @php
                                                            $no++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $no }}</td>
                                                            @foreach ($comment->books as $book)
                                                                <td><img src="{{ $book->cover }}" alt=""
                                                                        class="img-fluid"></td>
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
                                                @endif
                                            @endif
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
                                        @foreach ($shared as $visitor_visit)
                                            @php
                                                $no = 0;
                                            @endphp
                                            @if (date('Y-m-d', $visitor_visit->time) == date('Y-m-d'))
                                                @if ($visitor_visit->visitors !== null)
                                                    @foreach ($visitor_visit->visitors->shares as $share)
                                                        @php
                                                            $no++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $no }}</td>
                                                            @foreach ($share->books as $book)
                                                                <td><img class="img-fluid" src="{{ $book->cover }}"
                                                                        alt=""></td>
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
                                                @endif
                                            @endif
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
