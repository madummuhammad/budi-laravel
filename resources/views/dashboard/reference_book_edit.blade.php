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
                            @foreach ($book->reference_book_types as $reference_book_types)
                                <h4 class="card-title">Edit Referensi {{ $reference_book_types->name }} {{ $book->name }}
                                </h4>
                            @endforeach
                        </div>
                        <div class="card-body">
                            <form action="{{ url('dashboard/reference_book/edit/') }}/{{ $book->id }}" method="POST"
                                enctype="multipart/form-data">
                                <div class="">
                                    @method('patch')
                                    @csrf
                                    <input type="text" name="reference_book_type"
                                        value="{{ $book->reference_book_type }}" hidden>
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
                                                @if ($book->reference_book_type == '5cbb48f9-aed4-44a9-90c2-71cbcef71264')
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">File
                                                            PDF</label><br>
                                                        <input type="file" class="form-control file-input-custom"
                                                            id="content-buku" aria-describedby="emailHelp" name="content">
                                                    </div>
                                                @elseif($book->reference_book_type == '220843b8-4f60-4e47-9aca-cf6ea0d54afe')
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">File Video</label><br>
                                                        <button id="browseFile" type="button" class="btn btn-primary">Pilih
                                                            File</button>
                                                        <input type="text" name="content" value="" id="value_video"
                                                            hidden>
                                                        <input type="file" name="content" value="" hidden>
                                                        <div class="progress mt-3" style="height: 25px">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                role="progressbar" aria-valuenow="75" aria-valuemin="0"
                                                                aria-valuemax="100" style="width: 75%; height: 100%">75%
                                                            </div>
                                                        </div>
                                                        <span id="status_upload" class="text-success fw-bold"></span>
                                                    </div>
                                                @else
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary mr-3"
                                        data-dismiss="modal">Close</button>
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
    <script src="{{ asset('assets') }}/vendor/global/global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>
    <script>
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
    </script>
@endsection
