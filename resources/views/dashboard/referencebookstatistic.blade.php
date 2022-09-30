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
                            <h4 class="card-title">Analitik Referensi</h4>
                            <a href="{{ url('dashboard/statistic/referensi/export') }}" class="btn btn-success text-white"><i
                                    class="fa-regular fa-file-excel"></i> export</a>
                        </div>
                        <div class="card-body">
                            {{-- <img class="img-fluid mb-3" src="{{ $books->cover }}" alt=""> --}}
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Format</th>
                                            <th>Tema</th>
                                            <th>Jenjang</th>
                                            <th>Unduh</th>
                                            <th>Like</th>
                                            {{-- <th>Share</th> --}}
                                            <th>Komentar</th>
                                            <th>Ratting</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($books as $book)
                                            @php
                                                $no++;
                                            @endphp
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td><img class="img-fluid" src="{{ $book->cover }}" alt=""></td>
                                                <td>{{ $book->name }}</td>
                                                @foreach ($book->reference_book_types as $book_type)
                                                    <td>{{ $book_type->name }}</td>
                                                @endforeach
                                                @foreach ($book->reference_themes as $theme)
                                                    <td>{{ $theme->name }}</td>
                                                @endforeach
                                                @foreach ($book->levels as $level)
                                                    <td>{{ $level->name }}</td>
                                                @endforeach
                                                <td>{{ $book->reference_book_downloads->count() }}</td>
                                                <td>{{ $book->reference_book_likeds->count() }}</td>
                                                {{-- <td></td> --}}
                                                {{-- <td>{{ $book->mylibraries->where('liked', 1)->count() }}</td>
                                                <td>{{ $book->shares->count() }}</td>
                                                <td>{{ $book->mylibraries->where('saved', 1)->count() }}</td> --}}
                                                <td>{{ $book->reference_comments->count() }}</td>
                                                @if ($book->reference_comments->count() == 0)
                                                    <td>0</td>
                                                @else
                                                    <td>{{ number_format($book->reference_comments->sum('star') / $book->reference_comments->count(), 1) }}
                                                    </td>
                                                @endif
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
