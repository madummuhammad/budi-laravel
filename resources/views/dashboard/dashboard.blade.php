@extends('dashboard.main')
@section('judul_halaman', 'Aset')

@section('css')
<link href="{{ asset('assets') }}/vendor/daterangepicker-master/daterangepicker.css" rel="stylesheet">
<style>
    .analytics .row .card{
        /* height: 100%; */
    }
</style>
@stop

@section('script')
<script src="{{ asset('assets') }}/vendor/daterangepicker-master/moment.min.js"></script>
<script src="{{ asset('assets') }}/vendor/daterangepicker-master/daterangepicker.js"></script>
<script src="https://cdnout.com/patternomaly    "></script>
<script>

    @php
        $sixStart = new DateTime(date('Y-m-d 00:00:00', strtotime('-6 month')));
        $sixEnd = new DateTime(date('Y-m-d 00:00:00'));

        $inc = DateInterval::createFromDateString('first day of next month');
        $sixEnd->modify('+1 day');
        $sixPeriod = new DatePeriod($sixStart,$inc,$sixEnd);
    @endphp

    const labels = [
        @foreach ($sixPeriod as $keySix => $valueSix)
            '{{$valueSix->format("F")}}',
        @endforeach
    ];

    @php
        $bukuLoop = ['tema', 'jenis', 'jenjang'];
        $bukuLoopData = [$tema, $jenis, $jenjang];
    @endphp

    @for($i=0; $i < count($bukuLoop); $i++)

        const label_{{$bukuLoop[$i]}} = [
            @foreach($bukuLoopData[$i] as $itemTema)
                "{{$itemTema->name}}",
            @endforeach
        ];

        const background_color_{{$bukuLoop[$i]}}_chart = [];
        const border_color_{{$bukuLoop[$i]}}_chart = [];

        for(i=0;i < label_{{$bukuLoop[$i]}}.length; i++){
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);

            background_color_{{$bukuLoop[$i]}}_chart.push('rgba('+r+', '+g+' ,'+b+', 0.8)');
            border_color_{{$bukuLoop[$i]}}_chart.push('rgba('+r+', '+g+' ,'+b+', 1)');
        }

        const data_{{$bukuLoop[$i]}} = {
                                            labels: labels,
                                            datasets: [
                                                @php $z = 0; @endphp
                                                @foreach($bukuLoopData[$i] as $item)
                                                    {
                                                        label: "{{$item->name}}",
                                                        data: [
                                                            @foreach ($sixPeriod as $keySix => $valueSix)
                                                            @php
                                                                if($bukuLoop[$i] == 'tema'){
                                                                    $sixData = \App\Models\Theme::with(['book' => function($query) use ($valueSix){
                                                                        $query->withCount(['book_read_statistics' => function($queryBaca) use ($valueSix){
                                                                            $time = strtotime($valueSix->format("Y-m-d"));
                                                                            $queryBaca->where("created_at" , ">=", $valueSix->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59");
                                                                        }]);
                                                                        $query->withCount(['book_download_statistics' => function($queryBaca) use ($valueSix){
                                                                            $time = strtotime($valueSix->format("Y-m-d"));
                                                                            $queryBaca->where("created_at" , ">=", $valueSix->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59");
                                                                        }]);
                                                                        $query->withCount(['mylibraries' => function($queryBaca) use ($valueSix){
                                                                            $time = strtotime($valueSix->format("Y-m-d"));
                                                                            $queryBaca->where("created_at" , ">=", $valueSix->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59");
                                                                        }]);
                                                                    }])->where('id', $item->id)->first();
                                                                }elseif($bukuLoop[$i] == 'jenis'){
                                                                    $sixData = \App\Models\Book_type::with(['book' => function($query) use ($valueSix){
                                                                        $query->withCount(['book_read_statistics' => function($queryBaca) use ($valueSix){
                                                                            $time = strtotime($valueSix->format("Y-m-d"));
                                                                            $queryBaca->where("created_at" , ">=", $valueSix->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59");
                                                                        }]);
                                                                        $query->withCount(['book_download_statistics' => function($queryBaca) use ($valueSix){
                                                                            $time = strtotime($valueSix->format("Y-m-d"));
                                                                            $queryBaca->where("created_at" , ">=", $valueSix->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59");
                                                                        }]);
                                                                        $query->withCount(['mylibraries' => function($queryBaca) use ($valueSix){
                                                                            $time = strtotime($valueSix->format("Y-m-d"));
                                                                            $queryBaca->where("created_at" , ">=", $valueSix->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59");
                                                                        }]);
                                                                    }])->where('id', $item->id)->first();
                                                                }elseif($bukuLoop[$i] == 'jenjang'){
                                                                    $sixData = \App\Models\Level::with(['book' => function($query) use ($valueSix){
                                                                        $query->withCount(['book_read_statistics' => function($queryBaca) use ($valueSix){
                                                                            $time = strtotime($valueSix->format("Y-m-d"));
                                                                            $queryBaca->where("created_at" , ">=", $valueSix->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59");
                                                                        }]);
                                                                        $query->withCount(['book_download_statistics' => function($queryBaca) use ($valueSix){
                                                                            $time = strtotime($valueSix->format("Y-m-d"));
                                                                            $queryBaca->where("created_at" , ">=", $valueSix->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59");
                                                                        }]);
                                                                        $query->withCount(['mylibraries' => function($queryBaca) use ($valueSix){
                                                                            $time = strtotime($valueSix->format("Y-m-d"));
                                                                            $queryBaca->where("created_at" , ">=", $valueSix->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59");
                                                                        }]);
                                                                    }])->where('id', $item->id)->first();
                                                                }


                                                                $total = $sixData->book->sum('book_read_statistics_count') + $sixData->book->sum('book_download_statistics_count') + $sixData->book->sum('mylibraries_count');
                                                            @endphp
                                                            {{$total}},
                                                            @endforeach
                                                        ],
                                                        borderColor: background_color_{{$bukuLoop[$i]}}_chart[{{$z}}],
                                                        backgroundColor: background_color_{{$bukuLoop[$i]}}_chart[{{$z}}],
                                                    },
                                                @php $z++; @endphp
                                                @endforeach
                                            ]
                                        };

        const config_bar_buku_{{$bukuLoop[$i]}} = {
            type: 'bar',
            data: data_{{$bukuLoop[$i]}},
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'left',
                    },
                    title: {
                        display: true,
                        text: 'Data Ketertarikan Buku Berdasarkan '+'{{$bukuLoop[$i]}}'
                    }
                }
            },
        };

        const chart_bar_buku_{{$bukuLoop[$i]}} = new Chart($("#chart_bar_buku_{{$bukuLoop[$i]}}"),config_bar_buku_{{$bukuLoop[$i]}});


        

        const data_pie_{{$bukuLoop[$i]}}_baca = [
            @foreach($bukuLoopData[$i] as $item)
                {{$item->book->sum('book_read_statistics_count')}},
            @endforeach
        ];

        const data_pie_{{$bukuLoop[$i]}}_unduh = [
            @foreach($bukuLoopData[$i] as $item)
                {{$item->book->sum('book_download_statistics_count')}},
            @endforeach
        ];

        const data_pie_{{$bukuLoop[$i]}}_like = [
            @foreach($bukuLoopData[$i] as $item)
                {{$item->book->sum('mylibraries_count')}},
            @endforeach
        ];

        const dataset_pie_{{$bukuLoop[$i]}}_baca = {
            labels: label_{{$bukuLoop[$i]}},
            datasets: [{
                label: 'Analisis Tema Buku',
                data: data_pie_{{$bukuLoop[$i]}}_baca,
                backgroundColor: background_color_{{$bukuLoop[$i]}}_chart,
                borderColor: border_color_{{$bukuLoop[$i]}}_chart,
                hoverOffset: 4
            }]
        };

        const dataset_pie_{{$bukuLoop[$i]}}_unduh = {
            labels: label_{{$bukuLoop[$i]}},
            datasets: [{
                label: 'Analisis Tema Buku',
                data: data_pie_{{$bukuLoop[$i]}}_unduh,
                backgroundColor: background_color_{{$bukuLoop[$i]}}_chart,
                borderColor: border_color_{{$bukuLoop[$i]}}_chart,
                hoverOffset: 4
            }]
        };

        const dataset_pie_{{$bukuLoop[$i]}}_like = {
            labels: label_{{$bukuLoop[$i]}},
            datasets: [{
                label: 'Analisis Tema Buku',
                data: data_pie_{{$bukuLoop[$i]}}_like,
                backgroundColor: background_color_{{$bukuLoop[$i]}}_chart,
                borderColor: border_color_{{$bukuLoop[$i]}}_chart,
                hoverOffset: 4
            }]
        };

        const config_pie_{{$bukuLoop[$i]}}_unduh = {
            type: 'pie',
            data: dataset_pie_{{$bukuLoop[$i]}}_unduh,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'left',
                    }
                }
            },
        };

        const config_pie_{{$bukuLoop[$i]}}_baca = {
            type: 'pie',
            data: dataset_pie_{{$bukuLoop[$i]}}_baca,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'left',
                    }
                }
            },
            
        };

        const config_pie_{{$bukuLoop[$i]}}_like = {
            type: 'pie',
            data: dataset_pie_{{$bukuLoop[$i]}}_like,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'left',
                    }
                }
            },
        };

        const chart_pie_buku_{{$bukuLoop[$i]}}_baca = new Chart($("#chart_pie_buku_{{$bukuLoop[$i]}}_baca"),config_pie_{{$bukuLoop[$i]}}_baca);
        const chart_pie_buku_{{$bukuLoop[$i]}}_unduh = new Chart($("#chart_pie_buku_{{$bukuLoop[$i]}}_unduh"),config_pie_{{$bukuLoop[$i]}}_unduh);
        const chart_pie_buku_{{$bukuLoop[$i]}}_like = new Chart($("#chart_pie_buku_{{$bukuLoop[$i]}}_like"),config_pie_{{$bukuLoop[$i]}}_like);
    @endfor


    const labels_chart_pengunjung = [
        @foreach ($period as $key => $value)
            @if($to < date('Y-m-d 00:00:00', strtotime('+1 month', strtotime($from))))
            '{{$value->format("Y-m-d")}}',
            @else
            '{{$value->format("F")}}',
            @endif
        @endforeach
    ];

    const data_chart_pengunjung = {
        labels: labels_chart_pengunjung,
        datasets: [
            {
                label: 'Data Pengunjung',
                data: [
                    @foreach ($period as $key => $value)
                        @if($to < date('Y-m-d 00:00:00', strtotime('+1 month', strtotime($from))))
                            '{{count($datapengunjung->where("created_at" , ">=", $value->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", $value->format("Y-m-d")." 23:59:59")->groupBy("session"))}}',
                        @else
                            @php 
                                $time = strtotime($value->format("Y-m-d"));
                            @endphp
                            '{{count($datapengunjung->where("created_at" , ">=", $value->format("Y-m-d")." 00:00:00")->where("created_at" , "<=", date("Y-m-d", strtotime("+1 month", $time))." 23:59:59")->groupBy("session"))}}',
                        @endif
                    @endforeach
                ],
            }
        ]
    };

    const config_chart_pengunjung = {
        type: '{{iterator_count($period) > 1 ? "line" : "bar"}}',
        data: data_chart_pengunjung,
        options: {
            responsive: true,
            plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Chart.js Bar Chart'
            }
            }
        },
    };

    const chart_pengunjung = new Chart($("#Chart-pengunjung"),config_chart_pengunjung);

    $(function() {
        @php
            $periodArray = iterator_to_array($period);
            $startDate = reset($periodArray);
            $endDate = end($periodArray);
        @endphp
        
        var start = moment("{{$startDate->format('m-d-y')}}");
        var end = moment("{{$endDate->format('m-d-y')}}");
        var config = {
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Year': [moment().startOf('year'), moment().endOf('year')],
                'Last Year': [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')]
            }
        };

        function cb(start, end) {
            $('#basic-pengunjung span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        function cb2(start, end) {
            $('#basic-buku span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#basic-pengunjung').daterangepicker(config, cb);
        $('#basic-buku').daterangepicker(config, cb2);

        cb(start, end);
        cb2(start, end);

        $('#basic-pengunjung').on('apply.daterangepicker', function(ev, picker) {
            var startDate = picker.startDate.format('YYYY-MM-DD');
            var endDate = picker.endDate.format('YYYY-MM-DD');
            $("#input-filter-pengunjung").val(startDate+'/'+endDate);
            $("#form-filter-pengunjung").submit();
        });

        $(".table").DataTable();

    });

</script>
@stop

@section('content')

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content text-left">
                                <div class="stat-text">Pengujung online saat ini </div>
                                <div class="stat-digit"> <i class="fa fa-live mr-4"></i> {{number_format($totalActiveUser)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content text-left">
                                <div class="stat-text">Pengunjung hari ini</div>
                                <div class="stat-digit"> <i class="fa fa-user mr-4"></i> {{count($kunjungan->groupBy('session'))}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content text-left">
                                <div class="stat-text">Kunjungan hari ini</div>
                                <div class="stat-digit"> <i class="fa fa-users mr-4"></i> {{count($kunjungan)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content text-left">
                                <div class="stat-text">Pengunjung sepanjang waktu</div>
                                <div class="stat-digit"> <i class="fa fa-users mr-4"></i> {{count($pengunjung)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="stat-widget-two card-body">
                            <div class="stat-content text-left">
                                <div class="stat-text">Kunjungan sepanjang waktu</div>
                                <div class="stat-digit"> <i class="fa fa-users mr-4"></i> {{count($kunjunganAll)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-8 col-md-8">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h3 class="mb-0">
                                    Filter Analisis Pengunjung
                                </h3>
                            </div>
                            <div class="card-body">
                                <div id="basic-pengunjung" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                </div>

                                <form action="" id="form-filter-pengunjung">
                                    <input type="hidden" name="filter_pengunjung" id="input-filter-pengunjung">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-8">
                                    <canvas id="Chart-pengunjung" height="80"></canvas>
                                </div>
                                <div class="col-xl-12 col-lg-8">
                                    <div class="table-responsive">
                                        <h3 class="mt-5">Data Pengunjung</h3>
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Lokasi</th>
                                                    <th>Device</th>
                                                    <th>Browser</th>
                                                    <th>Ip</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i=1; @endphp
                                                @foreach($datapengunjung->groupBy('session') as $itemDatapengunjung)
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$itemDatapengunjung->first()->session_data->user ? $itemDatapengunjung->first()->session_data->user->name : 'Unknow'}}</td>
                                                    <td>
                                                        <span>
                                                        @php
                                                            if($itemDatapengunjung->first()->session_data->user){
                                                                $local = $itemDatapengunjung->first()->session_data->user;
                                                                $location = new \App\Http\Controllers\LocationController;
                                                                $province = $location->detail_province($local->province)->original->nama;
                                                                $city = $location->detail_city($local->city)->original->nama;
                                                                $district = $location->detail_district($local->district)->original->nama;
                                                                $sub_district = $location->detail_sub_district($local->sub_district)->original->nama;

                                                                $localData = $sub_district.', '.$district.', '.$city.', '.$province;

                                                                echo $localData;
                                                            }else{
                                                                echo 'Unknow';
                                                            }
                                                        @endphp
                                                        </span>
                                                    </td>
                                                    <td><span>{{$itemDatapengunjung->first()->device}}</span></td>
                                                    <td><span>{{$itemDatapengunjung->first()->browser}}</span></td>
                                                    <td><span>{{$itemDatapengunjung->first()->ip}}</span></td>
                                                    <td><span>{{$itemDatapengunjung->first()->created_at}}</span></td>
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

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tema Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Jenis Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Jenjang Buku</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <h4 class="card-title mt-4 mb-4">Analisis Buku Berdasarkan Tema</h4>
                    <div class="analytics">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-8">
                                                <canvas id="chart_bar_buku_tema" height="100"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Persentase Baca</h4>
                                        <canvas id="chart_pie_buku_tema_baca" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Persentase Unduh</h4>
                                        <canvas id="chart_pie_buku_tema_unduh" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Persentase Suka</h4>
                                        <canvas id="chart_pie_buku_tema_like" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-4 col-md-4">
                                <div class="card" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <h4>Analisis Tema</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Tema</th>
                                                    <th>Baca</th>
                                                    <th>Unduh</th>
                                                    <th>Suka</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tema as $itemTema)
                                                <tr>
                                                    <td>{{$itemTema->name}}</td>
                                                    <td>{{$itemTema->book ? $itemTema->book->sum('book_read_statistics_count') : 0}}</td>
                                                    <td>{{$itemTema->book ? $itemTema->book->sum('book_download_statistics_count') : 0}}</td>
                                                    <td>{{$itemTema->book ? $itemTema->book->sum('mylibraries_count') : 0}}</td>
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
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <h4 class="card-title mt-4 mb-4">Analisis Buku Berdasarkan Jenis</h4>
                    <div class="analytics">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-8">
                                                <canvas id="chart_bar_buku_jenis" height="100"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chart_pie_buku_jenis_baca" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chart_pie_buku_jenis_unduh" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chart_pie_buku_jenis_like" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-4 col-md-4">
                                <div class="card" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <h4>Analisis Jenis</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Jenis</th>
                                                    <th>Baca</th>
                                                    <th>Unduh</th>
                                                    <th>Suka</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($jenis as $itemJenis)
                                                <tr>
                                                    <td>{{$itemJenis->name}}</td>
                                                    <td>{{$itemJenis->book ? $itemJenis->book->sum('book_read_statistics_count') : 0}}</td>
                                                    <td>{{$itemJenis->book ? $itemJenis->book->sum('book_download_statistics_count') : 0}}</td>
                                                    <td>{{$itemJenis->book ? $itemJenis->book->sum('mylibraries_count') : 0}}</td>
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
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h4 class="card-title mt-4 mb-4">Analisis Buku Berdasarkan Jenjang</h4>
                    <div class="analytics">
                        <div class="row">
                            <div class="col-xl-12 col-lg-8 col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-8">
                                                <canvas id="chart_bar_buku_jenjang" height="100"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chart_pie_buku_jenjang_baca" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chart_pie_buku_jenjang_unduh" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="chart_pie_buku_jenjang_like" height="350"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-4 col-md-4">
                                <div class="card" style="margin-top: 20px;">
                                    <div class="card-body">
                                        <h4>Analisis Jenjang</h4>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Jenjang</th>
                                                    <th>Baca</th>
                                                    <th>Unduh</th>
                                                    <th>Suka</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($jenjang as $itemJenjang)
                                                <tr>
                                                    <td>{{$itemJenjang->name}}</td>
                                                    <td>{{$itemJenjang->book ? $itemJenjang->book->sum('book_read_statistics_count') : 0}}</td>
                                                    <td>{{$itemJenjang->book ? $itemJenjang->book->sum('book_download_statistics_count') : 0}}</td>
                                                    <td>{{$itemJenjang->book ? $itemJenjang->book->sum('mylibraries_count') : 0}}</td>
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

            <h4 class="card-title mt-4 mb-4">Analisis Website</h4>

            <div class="row" style="margin-top:30px">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Perangkat</h4>
                        </div>
                        <div class="card-body">
                            <div class="current-progress">
                                @foreach($kunjunganAll->groupBy('device') as $item)
                                <div class="progress-content py-2">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="progress-text">{{$item->first()->device}}</div>
                                        </div>
                                        <div class="col-lg-4 text-center">
                                            {{count($item)}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Browser</h4>
                        </div>
                        <div class="card-body">
                            <div class="current-progress">
                                @foreach($kunjunganAll->groupBy('country') as $item)
                                <div class="progress-content py-2">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="progress-text">{{$item->first()->browser}}</div>
                                        </div>
                                        <div class="col-lg-4 text-center">
                                            {{count($item)}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Asal Kunjungan</h4>
                        </div>
                        <div class="card-body">
                            <div class="current-progress">
                                @foreach($kunjunganAll->groupBy('source') as $item)
                                <div class="progress-content py-2">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="progress-text">{{$item->first()->source}}</div>
                                        </div>
                                        <div class="col-lg-4 text-center">
                                            {{count($item)}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
          <!--       <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Halaman Yang Dilihat</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Url</th>
                                            <th>Perangkat</th>
                                            <th>Browser</th>
                                            <th>Ip</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach($kunjunganAll as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$item->uri}}</td>
                                            <td>{{$item->device}}</td>
                                            <td>{{$item->browser}}</td>
                                            <td>{{$item->ip}}</td>
                                            <td>{{$item->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

@endsection
