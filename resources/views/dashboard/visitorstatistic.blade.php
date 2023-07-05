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
                        <h4 class="card-title">Pengunjung Hari Ini</h4>
                        <a href="{{ url('dashboard/visitor/today/export') }}" class="btn btn-success text-white"><i
                            class="fa-regular fa-file-excel"></i> export</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="display table-table" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Lokasi</th>
                                            <th>Device</th>
                                            <th>Browser</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 0;
                                        @endphp
                                        @foreach ($today as $visitor_visit)
                                        @if (date('Y-m-d', $visitor_visit->time) == date('Y-m-d'))
                                        @php
                                        $no++;
                                        @endphp
                                        <tr>
                                            <td>{{ $no }}</td>
                                            @if ($visitor_visit->visitors !== null)
                                            <td>{{ $visitor_visit->visitors->name }}</td>
                                            @else
                                            <td>Unknown</td>
                                            @endif
                                            @if ($visitor_visit->visitors !== null)
                                            <td>
                                                {{ $visitor_visit->visitors->city }},
                                                {{ $visitor_visit->visitors->sub }},
                                                {{ $visitor_visit->visitors->area }}
                                            </td>
                                            @else
                                            <td>Unknown</td>
                                            @endif
                                            <td>{{ $visitor_visit->device }}</td>
                                            <td>{{ $visitor_visit->browser }}</td>
                                            <td>{{ date('Y-m-d H:i:s', $visitor_visit->time) }}</td>
                                            <td>
                                                {{-- <button class="btn badge badge-danger" data-toggle="modal"
                                                data-target="#hapus{{ $visitor_visit->id }}"><i
                                                class="bi bi-trash3"></i></button> --}}

                                                <div class="modal" tabindex="-1"
                                                id="hapus{{ $visitor_visit->id }}">
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
                                                        <p class="p-0 m-0 fs-4">Hapus data ini?</p>
                                                    </div>
                                                    <div class="modal-footer pt-0 pb-1 border-0">
                                                        <form action="{{ url('dashboard/visitor') }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="text" name="id"
                                                        value="{{ $visitor_visit->id }}" hidden>
                                                        <button type="submit"
                                                        class="btn badge-danger"><i
                                                        class="bi bi-trash3"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ url('dashboard/statistic/visitor/') }}/{{ $visitor_visit->id }}"
                                        class="btn badge badge-dark"><i
                                        class="fa-solid fa-chart-column"></i></a>
                                    </td>
                                </tr>
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
                    <h4 class="card-title">Pengunjung Sepanjang Waktu</h4>
                    <a href="{{ url('dashboard/visitor/alltime/export') }}" class="btn btn-success text-white"><i
                        class="fa-regular fa-file-excel"></i> export</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Lokasi</th>
                                        <th>Device</th>
                                        <th>Browser</th>
                                        <th>Tanggal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 0;
                                    @endphp
                                    @foreach ($visitors as $visitor_visit)
                                    @php
                                    $no++;
                                    @endphp
                                    <tr>
                                        <td>{{ $no }}</td>
                                        @if ($visitor_visit->visitors !== null)
                                        <td>{{ $visitor_visit->visitors->name }}</td>
                                        @else
                                        <td>Unknown</td>
                                        @endif
                                        @if ($visitor_visit->visitors !== null)
                                        <td>{{ $visitor_visit->visitors->city }},
                                            {{ $visitor_visit->visitors->sub }},
                                            {{ $visitor_visit->visitors->area }}</td>
                                            @else
                                            <td>Unknown</td>
                                            @endif
                                            <td>{{ $visitor_visit->device }}</td>
                                            <td>{{ $visitor_visit->browser }}</td>
                                            <td>{{ date('Y-m-d H:i:s', $visitor_visit->time) }}</td>
                                            <td>
                                                {{-- <button class="btn badge badge-danger" data-toggle="modal"
                                                data-target="#hapus{{ $visitor_visit->id }}"><i
                                                class="bi bi-trash3"></i></button> --}}

                                                <div class="modal" tabindex="-1" id="hapus{{ $visitor_visit->id }}">
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
                                                            <p class="p-0 m-0 fs-4">Hapus data ini?</p>
                                                        </div>
                                                        <div class="modal-footer pt-0 pb-1 border-0">
                                                            <form action="{{ url('dashboard/visitor') }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <input type="text" name="id"
                                                            value="{{ $visitor_visit->id }}" hidden>
                                                            <button type="submit" class="btn badge-danger"><i
                                                                class="bi bi-trash3"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ url('dashboard/statistic/visitor/') }}/{{ $visitor_visit->id }}"
                                                class="btn badge badge-dark"><i
                                                class="fa-solid fa-chart-column"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div>
                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                        <a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous">Previous</a>
                                        @for ($i = 0; $i <= $visitors->perPage(); $i++)
                                        <span>
                                            <a class="paginate_button current" href="{{$visitors->path().'?page='.}}" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">{{$i+1}}</a>
                                        </span>
                                        @endfor
                                        <a class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" id="DataTables_Table_0_next">Next</a>
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
