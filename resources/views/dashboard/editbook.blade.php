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
            <style>
                .card-footer,
                .progress {
                    display: none;
                }
            </style>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Buku {{ $book->name }}</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('dashboard/book') }}" method="POST" enctype="multipart/form-data">
                                <div class="">
                                    @method('patch')
                                    @csrf
                                    <input type="text" name="id" value="{{ $book->id }}" hidden>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Judul</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" name="name" value="{{ $book->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Penulis</label>
                                                <select class="single-select" name="author" placeholder="asdfasdf">
                                                    <option selected disabled>
                                                        --Pilih
                                                        Penulis--</option>
                                                    @foreach ($authors as $author)
                                                        <option value="{{ $author->id }}"
                                                            @if ($author->id == $book->author) selected @endif>
                                                            {{ $author->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tema</label>
                                                <select class="single-select" name="theme">
                                                    <option selected disabled>
                                                        --Pilih
                                                        Tema--</option>
                                                    @foreach ($themes as $theme)
                                                        <option value="{{ $theme->id }}"
                                                            @if ($theme->id == $book->theme) selected @endif>
                                                            {{ $theme->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jumlah
                                                    Halaman</label>
                                                <input type="text" name="page" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp"
                                                    value="{{ $book->page }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sinopsis</label>
                                                <textarea class="sinopsis" name="sinopsis">{{ $book->sinopsis }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jenis
                                                    Buku</label><br>
                                                @foreach ($book_types as $book_type)
                                                    <div class="form-check form-check-inline ">
                                                        <input class="form-check-input book_type" type="radio"
                                                            id="book_type_edit{{ $book_type->id }}"
                                                            value="{{ $book_type->id }}"
                                                            name="book_type_edit{{ $book->id }}"
                                                            @if ($book_type->id == $book->book_type) checked="checked" @endif>
                                                        <label class="form-check-label"
                                                            for="book_type_edit{{ $book_type->id }}">{{ $book_type->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Jenjang</label>
                                                <select class="single-select" name="level">
                                                    <option selected disabled>
                                                        --Pilih
                                                        Jenjang--</option>
                                                    @foreach ($levels as $level)
                                                        <option value="{{ $level->id }}"
                                                            @if ($book->level == $level->id) selected @endif>
                                                            {{ $level->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Bahasa</label>
                                                <select class="single-select" name="language">
                                                    <option selected disabled>
                                                        --Pilih
                                                        Bahasa--</option>
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->id }}"
                                                            @if ($language->id == $book->language) selected @endif>
                                                            {{ $language->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Cover
                                                    Buku</label><br>
                                                <div class="">
                                                    <img class="img-fluid w-25" src="{{ $book->cover }}" alt="">
                                                </div>
                                                <input type="file" class="form-control file-input-custom" id="cover-buku"
                                                    aria-describedby="emailHelp" name="cover">
                                            </div>
                                            <div id="file-edit">
                                                @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">File
                                                            Audio</label><br>
                                                        <input type="file" class="form-control file-input-custom"
                                                            id="content-buku" aria-describedby="emailHelp" name="content">
                                                    </div>
                                                    <div class="form-group " id="versi-pdf">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="versi-pdf-check-edit" value="1" name="having_pdf"
                                                                @if ($book->book_pdfs !== null) checked @endif>
                                                            <label class="form-check-label"
                                                                for="versi-pdf-check-edit">Apakah
                                                                memiliki versi
                                                                pdf?</label>
                                                        </div>
                                                    </div>
                                                    <div id="versi-pdf-container-edit">
                                                        @if ($book->book_pdfs !== null)
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Versi
                                                                    PDF</label><br>
                                                                <input type="file"
                                                                    class="form-control file-input-custom"
                                                                    id="content-versi-pdf-edit"
                                                                    aria-describedby="emailHelp" name="content-versi-pdf">
                                                            </div>
                                                        @endif
                                                    </div>
                                                @elseif($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">File
                                                            Video</label><br>
                                                        <input type="file" name="content" hidden>
                                                        <button id="browseFile" type="button" class="btn btn-primary">
                                                            File Video</button>
                                                        <input type="text" name="content" value=""
                                                            id="value_video" hidden>
                                                        <div class="progress mt-3" style="height: 25px">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 75%; height: 100%">75%
                                                            </div>
                                                        </div>
                                                        <span id="status_upload" class="text-success fw-bold"></span>
                                                    </div>

                                                    <div class="form-group " id="versi-pdf">
                                                        <div class="form-check mb-2">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="versi-pdf-check-edit" value="1"
                                                                name="having_pdf"
                                                                @if ($book->book_pdfs !== null) checked @endif>
                                                            <label class="form-check-label"
                                                                for="versi-pdf-check-edit">Apakah
                                                                memiliki versi
                                                                pdf?</label>
                                                        </div>
                                                    </div>
                                                    <div id="versi-pdf-container-edit">
                                                        @if ($book->book_pdfs !== null)
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Versi
                                                                    PDF</label><br>
                                                                <input type="file"
                                                                    class="form-control file-input-custom"
                                                                    id="content-versi-pdf" aria-describedby="emailHelp"
                                                                    name="content-versi-pdf">
                                                            </div>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">File
                                                            PDF</label><br>
                                                        <input type="file" class="form-control file-input-custom"
                                                            id="content-buku" aria-describedby="emailHelp"
                                                            name="content">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check mb-2" id="display-count">
                                                    <input type="checkbox" class="form-check-input" id="check1"
                                                        value="1" name="display_homepage"
                                                        @if ($book->display_homepage == 1) checked @endif
                                                        @if ($book->display_homepage == 0 and $count >= 12) disabled @endif>
                                                    <label class="form-check-label" for="check1">Tampilkan
                                                        di homepage? ({{ $count }}/12)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('assets') }}/vendor/global/global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
<script>
    $(document).ready(function() {
        var book_type = $('.book_type');
        $("#versi-pdf-check-edit").on('click', function() {
            if (this.checked) {
                $("#versi-pdf-container-edit").html(`
                        <div class="form-group">
                        <label for="exampleInputEmail1">Versi PDF</label><br>
                        <input type="file" class="form-control file-input-custom" id="content-versi-pdf-edit"aria-describedby="emailHelp" name="content-versi-pdf">

                        </div>
                        `)
            } else {
                $("#versi-pdf-container-edit").html(``)
            }
        });
        $("select[name=level]").on('change', function() {
            // paud
            if ($(this).val() == '014453da-54e6-41b5-be05-952bc233f144') {
                $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($book->display_homepage == 1) checked @endif @if ($book->display_homepage == 0 and $paud_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $paud_count }}/12)</label>
                            `);
            }
            // SD
            if ($(this).val() == '0207580f-6a98-477b-a19f-35bfc0f938e9') {
                $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($book->display_homepage == 1) checked @endif @if ($book->display_homepage == 0 and $sd_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $sd_count }}/12)</label>
                            `);
            }
            // SMP
            if ($(this).val() == '2070db95-9133-4aa1-9f3f-f711f10df750') {
                $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($book->display_homepage == 1) checked @endif @if ($book->display_homepage == 0 and $smp_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $smp_count }}/12)</label>
                            `);
            }
            // SMA
            if ($(this).val() == '555c961c-fb2a-4a25-8829-4a12c7d2afc0') {
                $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($book->display_homepage == 1) checked @endif @if ($book->display_homepage == 0 and $sma_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $sma_count }}/12)</label>
                            `);
            }
            // UMUM
            if ($(this).val() == 'a26a4afd-7226-434c-83f3-9ca3ce4af523') {
                $("#display-count").html(`
                            <input type="checkbox" class="form-check-input" id="check1" value="1" name="display_homepage" @if ($book->display_homepage == 1) checked @endif @if ($book->display_homepage == 0 and $umum_count >= 12) disabled @endif>
                            <label class="form-check-label" for="check1">Tampilkan di homepage? ({{ $umum_count }}/12)</label>
                            `);
            }
        })
        for (let i = 0; i < book_type.length; i++) {
            book_type[i].onclick = function() {
                if ($(this).val() == '9e30a937-0d60-49ad-9775-c19b97cfe864') {
                    $("#file-edit").html(`
                        <div class="form-group">
                        <label for="exampleInputEmail1">File Audio</label><br>
                        <input type="file" class="form-control file-input-custom" id="content-buku" aria-describedby="emailHelp" name="content">
                        </div>
                        <div class="form-group " id="versi-pdf-edit">
                        <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input"
                        id="versi-pdf-check-edit" value="1" name="having_pdf">
                        <label class="form-check-label" for="versi-pdf-check-edit">Apakah memiliki versi pdf?</label>
                        </div>
                        </div>
                        <div id="versi-pdf-container-edit"></div>
                                                `);
                    $("#versi-pdf-check-edit").on('click', function() {
                        if (this.checked) {
                            $("#versi-pdf-container-edit").html(`
                                <div class="form-group">
                                <label for="exampleInputEmail1">Versi PDF</label><br>
                                <input type="file" class="form-control file-input-custom" id="content-versi-pdf-edit"aria-describedby="emailHelp" name="content-versi-pdf">

                                </div>
                                `)
                        } else {
                            $("#versi-pdf-container-edit").html(``)
                        }
                    })
                }

                if ($(this).val() == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') {
                    $("#file-edit").html(`
                        <div class="form-group">
                            <label for="exampleInputEmail1">File Video</label><br>
                            <button id="browseFile" type="button" class="btn btn-primary">Pilih File</button>
                            <input type="text" name="content" value="" id="value_video" hidden>
                            <input type="file" name="content" value="" hidden>
                            <div class="progress mt-3" style="height: 25px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75% </div></div>
                            <span id="status_upload" class="text-success fw-bold"></span>
                        </div>

                        <div class="form-group " id="versi-pdf-edit">
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="versi-pdf-check-edit" value="1" name="having_pdf">
                                <label class="form-check-label" for="versi-pdf-check-edit">Apakah memiliki versi pdf?</label>
                                </div>
                                </div>
                        <div id="versi-pdf-container-edit"></div>
                    `);
                    $("#versi-pdf-check-edit").on('click', function() {
                        if (this.checked) {
                            $("#versi-pdf-container-edit").html(`
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Versi PDF</label><br>
                                    <input type="file" class="form-control  file-input-custom" id="content-versi-pdf-edit" aria-describedby="emailHelp" name="content-versi-pdf">

                                </div>
                            `)
                        } else {
                            $("#versi-pdf-container-edit").html(`
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
                        $("#status_upload").html("Video berhasil diunggah");
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
                    $("#file-edit").html(`
                        <div class="form-group">
                        <label for="exampleInputEmail1">File PDF</label><br>
                        <input type="file" class="form-control file-input-custom" id="content-buku" aria-describedby="emailHelp" name="content">
                        </div>
                        `);
                }

                if ($(this).val() == '2fd97285-08d0-4d81-83f2-582f0e8b0f36') {
                    $("#file-edit").html(`
                        <div class="form-group">
                        <label for="exampleInputEmail1">File PDF</label><br>
                        <input type="file" class="form-control file-input-custom" id="content-buku" aria-describedby="emailHelp" name="content">
                        </div>
                        `);
                }
            }
        }
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
            $("#status_upload").html("Video berhasil diunggah");
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
    });
</script>
