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
                {{-- <div class="col-xl-4 col-lg-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pengunjung Hari Ini</h4>
                        </div>
                        <div class="card-body">
                            <div class="recent-comment m-t-15">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object mr-3" src="./images/avatar/4.png"
                                                alt="..."></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-primary">john doe</h4>
                                        <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                        <p class="comment-date">10 min ago</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object mr-3" src="./images/avatar/2.png"
                                                alt="..."></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-success">Mr. John</h4>
                                        <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                        <p class="comment-date">1 hour ago</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object mr-3" src="./images/avatar/3.png"
                                                alt="..."></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-danger">Mr. John</h4>
                                        <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                        <div class="comment-date">Yesterday</div>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object mr-3" src="./images/avatar/4.png"
                                                alt="..."></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-primary">john doe</h4>
                                        <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                        <p class="comment-date">10 min ago</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object mr-3" src="./images/avatar/2.png"
                                                alt="..."></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-success">Mr. John</h4>
                                        <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                        <p class="comment-date">1 hour ago</p>
                                    </div>
                                </div>
                                <div class="media no-border">
                                    <div class="media-left">
                                        <a href="#"><img class="media-object mr-3" src="./images/avatar/3.png"
                                                alt="..."></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading text-info">Mr. John</h4>
                                        <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                        <div class="comment-date">Yesterday</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pengunjung Hari Ini</h4>
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
                                        @foreach ($visitors as $visitor_visit)
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
                                                    <td>Unknown</td>
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
                                                <td>Unknown</td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
