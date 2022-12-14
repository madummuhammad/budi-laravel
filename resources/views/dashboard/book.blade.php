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
                            <h4 class="card-title">Daftar Buku</h4>
                            <a href="{{ url('dashboard/book/export') }}" class="btn btn-success text-white"><i
                                    class="fa-regular fa-file-excel"></i> export</a>
                        </div>
                        <div class="card-body">
                            <a href="#tambahbuku" data-toggle="modal" class="btn btn-primary mb-3">Tambah Buku</a>
                            <!-- Modal -->
                            <div class="modal fade" id="tambahbuku" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('dashboard/book') }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @method('POST')
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Judul</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Penulis</label>
                                                            <select class="single-select" name="author"
                                                                placeholder="asdfasdf">
                                                                <option selected disabled>--Pilih Penulis--</option>
                                                                @foreach ($authors as $author)
                                                                    <option value="{{ $author->id }}">{{ $author->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tema</label>
                                                            <select class="single-select" name="theme">
                                                                <option selected disabled>--Pilih Tema--</option>
                                                                @foreach ($themes as $theme)
                                                                    <option value="{{ $theme->id }}">{{ $theme->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Jumlah Halaman</label>
                                                            <input type="text" name="page" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Sinopsis</label>
                                                            <textarea class="sinopsis" name="sinopsis"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Jenis Buku</label><br>
                                                            @foreach ($book_types as $book_type)
                                                                <div class="form-check form-check-inline ">
                                                                    <input class="form-check-input book_types"
                                                                        type="radio" id="book_type{{ $book_type->id }}"
                                                                        value="{{ $book_type->id }}" name="book_type">
                                                                    <label class="form-check-label"
                                                                        for="book_type{{ $book_type->id }}">{{ $book_type->name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Jenjang</label>
                                                            <select class="single-select" name="level">
                                                                <option selected disabled>--Pilih Jenjang--</option>
                                                                @foreach ($levels as $level)
                                                                    <option value="{{ $level->id }}">
                                                                        {{ $level->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Bahasa</label>
                                                            <select class="single-select" name="language">
                                                                <option selected disabled>--Pilih Bahasa--</option>
                                                                @foreach ($languages as $language)
                                                                    <option value="{{ $language->id }}">
                                                                        {{ $language->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cover Buku</label><br>
                                                            <input type="file" class="form-control file-input-custom"
                                                                id="cover-buku" aria-describedby="emailHelp" name="cover">
                                                        </div>
                                                        <div id="file">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">File PDF</label><br>
                                                                <input type="file" class="form-control file-input-custom"
                                                                    id="content-buku" aria-describedby="emailHelp"
                                                                    name="content">
                                                            </div>
                                                        </div>
                                                        <style>
                                                            .card-footer,
                                                            .progress {
                                                                display: none;
                                                            }
                                                        </style>
                                                        <div class="form-group">
                                                            <div class="form-check mb-2" id="display-count">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row d-flex justify-content-end filter">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Jenis Buku</label>
                                            <select class="form-control filter-book" name="book_type">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($book_types as $book_type)
                                                    <option value="{{ $book_type->id }}">{{ $book_type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tema</label>
                                            <select class="form-control filter-book" name="theme">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($themes as $theme)
                                                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Jenjang</label>
                                            <select class="form-control filter-book" name="level">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($levels as $level)
                                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Bahasa</label>
                                            <select class="form-control filter-book" name="language">
                                                <option value="">-- Pilih --</option>
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="datatable">
                                @csrf
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('assets') }}/vendor/global/global.min.js"></script> --}}
    <script src="{{ asset('web') }}/assets/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

    <script type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            var token = $(".datatable input[name=_token]").val();
            $.ajax({
                type: 'POST',
                url: "{{ url('dashboard/book_filter') }}",
                data: {
                    _method: "POST",
                    _token: token
                },
                success: function(hasil) {
                    $('.datatable').html(hasil);
                    var table = $('#example').DataTable({
                        createdRow: function(row, data, index) {
                            $(row).addClass('selected')
                        }
                    });

                    table.on('click', 'tbody tr', function() {
                        var $row = table.row(this).nodes().to$();
                        var hasClass = $row.hasClass('selected');
                        if (hasClass) {
                            $row.removeClass('selected')
                        } else {
                            $row.addClass('selected')
                        }
                    })

                    table.rows().every(function() {
                        this.nodes().to$().removeClass('selected')
                    });

                    jQuery(document).ready(function() {
                        $(".single-select").select2();
                        $(".sinopsis").summernote({
                            height: 190,
                            minHeight: null,
                            maxHeight: null,
                            focus: !1
                        }), $(".inline-editor").summernote({
                            airMode: !0
                        })
                    }), window.edit = function() {
                        $(".click2edit").summernote()
                    }, window.save = function() {
                        $(".click2edit").summernote("destroy")
                    };
                }
            });

            $(".filter-book").on('change', function() {
                var book_type = $(".filter-book[name=book_type]").val();
                var theme = $(".filter-book[name=theme]").val();
                var level = $(".filter-book[name=level]").val();
                var language = $(".filter-book[name=language]").val();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('dashboard/book_filter') }}",
                    data: {
                        _method: "POST",
                        _token: token,
                        book_type: book_type,
                        theme: theme,
                        level: level,
                        language: language,
                        status: true
                    },
                    success: function(hasil) {
                        $('.datatable').html(hasil);
                        var table = $('#example').DataTable({
                            createdRow: function(row, data, index) {
                                $(row).addClass('selected')
                            }
                        });

                        table.on('click', 'tbody tr', function() {
                            var $row = table.row(this).nodes().to$();
                            var hasClass = $row.hasClass('selected');
                            if (hasClass) {
                                $row.removeClass('selected')
                            } else {
                                $row.addClass('selected')
                            }
                        })

                        table.rows().every(function() {
                            this.nodes().to$().removeClass('selected')
                        });
                    }
                });
            })

            $("select[name=level]").on('change', function() {
                // paud
                if ($(this).val() == '014453da-54e6-41b5-be05-952bc233f144') {
                    $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($paud_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $paud_count }}/12)</label>
                            `);
                }
                // SD
                if ($(this).val() == '0207580f-6a98-477b-a19f-35bfc0f938e9') {
                    $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($sd_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $sd_count }}/12)</label>
                            `);
                }
                // SMP
                if ($(this).val() == '2070db95-9133-4aa1-9f3f-f711f10df750') {
                    $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($smp_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $smp_count }}/12)</label>
                            `);
                }
                // SMA
                if ($(this).val() == '555c961c-fb2a-4a25-8829-4a12c7d2afc0') {
                    $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($sma_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $sma_count }}/12)</label>
                            `);
                }
                // UMUM
                if ($(this).val() == 'a26a4afd-7226-434c-83f3-9ca3ce4af523') {
                    $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($umum_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $umum_count }}/12)</label>
                            `);
                }
            })

            var book_types = $('.book_types');

            for (let i = 0; i < book_types.length; i++) {
                book_types[i].onclick = function() {
                    if ($(this).val() == '9e30a937-0d60-49ad-9775-c19b97cfe864') {
                        $("#file").html(`
                        <div class="form-group">
                        <label for="exampleInputEmail1">File Audio</label><br>
                        <input type="file" class="form-control file-input-custom" id="content-buku" aria-describedby="emailHelp" name="content">
                        </div>
                        <div class="form-group " id="versi-pdf">
                        <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input"
                        id="versi-pdf-check" value="1" name="having_pdf">
                        <label class="form-check-label" for="versi-pdf-check">Apakah memiliki versi pdf?</label>
                        </div>
                        </div>
                        <div id="versi-pdf-container"></div>
                        `);
                        $("#versi-pdf-check").on('click', function() {
                            if (this.checked) {
                                $("#versi-pdf-container").html(`
                                <div class="form-group">
                                <label for="exampleInputEmail1">Versi PDF</label><br>
                                <input type="file" class="form-control file-input-custom" id="content-versi-pdf"aria-describedby="emailHelp" name="content-versi-pdf">

                                </div>
                                `)
                            } else {
                                $("#versi-pdf-container").html(``)
                            }
                        })
                    }

                    if ($(this).val() == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') {
                        $("#file").html(`
                        <div class="form-group">
                            <label for="exampleInputEmail1">File Video</label><br>
                            <button id="browseFile" type="button" class="btn btn-primary">Pilih File</button>
                            <input type="text" name="content" value="" id="value_video" hidden>
                            <div class="progress mt-3" style="height: 25px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75% </div></div>
                                <span id="status_upload" class="text-success fw-bold"></span>
                        </div>

                        <div class="form-group " id="versi-pdf">
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="versi-pdf-check" value="1" name="having_pdf">
                                <label class="form-check-label" for="versi-pdf-check">Apakah memiliki versi pdf?</label>
                                </div>
                                </div>
                        <div id="versi-pdf-container"></div>
                    `);
                        $("#versi-pdf-check").on('click', function() {
                            if (this.checked) {
                                $("#versi-pdf-container").html(`
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Versi PDF</label><br>
                                    <input type="file" class="form-control  file-input-custom" id="content-versi-pdf" aria-describedby="emailHelp" name="content-versi-pdf">
                                </div>
                            `)
                            } else {
                                $("#versi-pdf-container").html(`
                            `)
                            }
                        });
                        let browseFile = $('#browseFile');
                        let resumable = new Resumable({
                            target: '{{ route('dashboard.upload') }}',
                            query: {
                                _token: '{{ csrf_token() }}'
                            }, // CSRF token
                            fileType: ['mp4'],
                            headers: {
                                'Accept': 'application/json'
                            },
                            testChunks: false,
                            throttleProgressCallbacks: 1,
                        });

                        resumable.assignBrowse(browseFile[0]);

                        resumable.on('fileAdded', function(file) { // trigger when file picked
                            showProgress();
                            resumable.upload() // to actually start uploading.
                        });

                        resumable.on('fileProgress', function(file) { // trigger when file progress update
                            updateProgress(Math.floor(file.progress() * 100));
                        });

                        resumable.on('fileSuccess', function(file,
                            response) { // trigger when file upload complete
                            response = JSON.parse(response)
                            // $('#videoPreview').attr('src', response.path);
                            $("#status_upload").html('Video berhasil di unggah');
                            $('#value_video').val(response.path);
                            $('.card-footer').show();
                            console.log(response.path)
                        });

                        resumable.on('fileError', function(file, response) { // trigger when there is any error
                            alert('file uploading error.')
                        });


                        let progress = $('.progress');

                        function showProgress() {
                            progress.find('.progress-bar').css('width', '0%');
                            progress.find('.progress-bar').html('0%');
                            progress.find('.progress-bar').removeClass('bg-success');
                            progress.show();
                        }

                        function updateProgress(value) {
                            progress.find('.progress-bar').css('width', `${value}%`)
                            progress.find('.progress-bar').html(`${value}%`)
                        }

                        function hideProgress() {
                            progress.hide();
                        }
                    }
                    if ($(this).val() == '31ba455c-c9c7-4a3c-a2b1-62915546eaba') {
                        $("#file").html(`
                        <div class="form-group">
                        <label for="exampleInputEmail1">File PDF</label><br>
                        <input type="file" class="form-control file-input-custom" id="content-buku" aria-describedby="emailHelp" name="content">
                        </div>
                        `);
                    }
                    if ($(this).val() == '2fd97285-08d0-4d81-83f2-582f0e8b0f36') {
                        $("#file").html(`
                        <div class="form-group">
                        <label for="exampleInputEmail1">File PDF</label><br>
                        <input type="file" class="form-control file-input-custom" id="content-buku" aria-describedby="emailHelp" name="content">
                        </div>
                        `);
                    }
                }
            }
        });
    </script>
@endsection
