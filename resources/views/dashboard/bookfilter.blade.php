                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
                                            <th>Jenis Buku</th>
                                            <th>Tema</th>
                                            <th>Jenjang</th>
                                            <th>Action</th>
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
                                                <td>
                                                    <div class="img-container-for-icon">
                                                        <img src="{{ $book->cover }}" class="img-fluid w-50"
                                                            alt="">
                                                        @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                            <div class="icon">
                                                                <img src="{{ asset('web') }}/assets/icon/mic.svg"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                        @if ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                            <div class="icon">
                                                                <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $book->name }}</td>
                                                @foreach ($book->book_types as $book_type)
                                                    <td>{{ $book_type->name }}</td>
                                                @endforeach
                                                @foreach ($book->themes as $theme)
                                                    <td>{{ $theme->name }}</td>
                                                @endforeach
                                                @foreach ($book->levels as $level)
                                                    <td>{{ $level->name }}</td>
                                                @endforeach
                                                <td>
                                                    <button class="btn badge badge-danger" data-toggle="modal"
                                                        data-target="#hapus{{ $book->id }}"><i
                                                            class="bi bi-trash3"></i></button>
                                                    <div class="modal" tabindex="-1" id="hapus{{ $book->id }}">
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
                                                                    <p class="p-0 m-0 fs-4">Hapus data buku ini?</p>
                                                                </div>
                                                                <div class="modal-footer pt-0 pb-1 border-0">
                                                                    <form action="{{ url('dashboard/book') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <input type="text" name="id"
                                                                            value="{{ $book->id }}" hidden>
                                                                        <button type="submit"
                                                                            class="btn badge-danger"><i
                                                                                class="bi bi-trash3"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="btn badge badge-primary" data-toggle="modal"
                                                        data-target="#edit{{ $book->id }}"><i
                                                            class="bi bi-pencil-square"></i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="edit{{ $book->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Tambah
                                                                Buku</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal"><span>&times;</span>
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
                                                                            <label
                                                                                for="exampleInputEmail1">Judul</label>
                                                                            <input type="text" class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                name="name"
                                                                                value="{{ $book->name }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleInputEmail1">Penulis</label>
                                                                            <select class="single-select" name="author"
                                                                                placeholder="asdfasdf">
                                                                                <option selected disabled>--Pilih
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
                                                                            <select class="single-select"
                                                                                name="theme">
                                                                                <option selected disabled>--Pilih
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
                                                                            <input type="text" name="page"
                                                                                class="form-control"
                                                                                id="exampleInputEmail1"
                                                                                aria-describedby="emailHelp"
                                                                                value="{{ $book->page }}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleInputEmail1">Sinopsis</label>
                                                                            <textarea class="sinopsis" name="sinopsis">{{ $book->sinopsis }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Jenis
                                                                                Buku</label><br>
                                                                            @foreach ($book_types as $book_type)
                                                                                <div
                                                                                    class="form-check form-check-inline ">
                                                                                    <input
                                                                                        class="form-check-input book_type"
                                                                                        type="radio"
                                                                                        id="book_type_edit{{ $book_type->id }}"
                                                                                        value="{{ $book_type->id }}"
                                                                                        name="book_type"
                                                                                        @if ($book_type->id == $book->book_type) checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="book_type_edit{{ $book_type->id }}">{{ $book_type->name }}</label>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleInputEmail1">Jenjang</label>
                                                                            <select class="single-select"
                                                                                name="level">
                                                                                <option selected disabled>--Pilih
                                                                                    Jenjang--</option>
                                                                                @foreach ($levels as $level)
                                                                                    <option
                                                                                        value="{{ $level->id }}"
                                                                                        @if ($book->level == $level->id) selected @endif>
                                                                                        {{ $level->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="exampleInputEmail1">Bahasa</label>
                                                                            <select class="single-select"
                                                                                name="language">
                                                                                <option selected disabled>--Pilih
                                                                                    Bahasa--</option>
                                                                                @foreach ($languages as $language)
                                                                                    <option
                                                                                        value="{{ $language->id }}"
                                                                                        @if ($language->id == $book->language) selected @endif>
                                                                                        {{ $language->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">Cover
                                                                                Buku</label><br>
                                                                            <input type="file" class="form-control"
                                                                                id="cover-buku"
                                                                                aria-describedby="emailHelp" hidden
                                                                                name="cover">
                                                                            <div class="">
                                                                                <img class="img-fluid w-25"
                                                                                    src="{{ $book->cover }}"
                                                                                    alt=""><br>
                                                                                <label for="cover-buku"
                                                                                    class="label-upload-custom btn btn-secondary mt-2">Pilih
                                                                                    File</label>
                                                                            </div>
                                                                        </div>
                                                                        <div id="file">
                                                                            @if ($book->book_type == '9e30a937-0d60-49ad-9775-c19b97cfe864')
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleInputEmail1">File
                                                                                        Audio</label><br>
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        id="content-buku"
                                                                                        aria-describedby="emailHelp"
                                                                                        hidden name="content">
                                                                                    <label for="content-buku"
                                                                                        class="label-upload-custom btn btn-secondary">Pilih
                                                                                        File Audio</label>
                                                                                </div>
                                                                                <div class="form-group "
                                                                                    id="versi-pdf">
                                                                                    <div class="form-check mb-2">
                                                                                        <input type="checkbox"
                                                                                            class="form-check-input"
                                                                                            id="versi-pdf-check"
                                                                                            value="1"
                                                                                            name="having_pdf"
                                                                                            @if ($book->book_pdfs !== null) checked @endif>
                                                                                        <label class="form-check-label"
                                                                                            for="versi-pdf-check">Apakah
                                                                                            memiliki versi pdf?</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="versi-pdf-container">
                                                                                    @if ($book->book_pdfs !== null)
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">Versi
                                                                                                PDF</label><br>
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                id="content-versi-pdf"
                                                                                                aria-describedby="emailHelp"
                                                                                                hidden
                                                                                                name="content-versi-pdf">
                                                                                            <label
                                                                                                for="content-versi-pdf"
                                                                                                class="label-upload-custom btn btn-secondary">Pilih
                                                                                                File PDF</label>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            @elseif ($book->book_type == 'bfe3060d-5f2e-4a1b-9615-40a9f936c6cc')
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleInputEmail1">File
                                                                                        Video</label><br>
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        id="content-buku"
                                                                                        aria-describedby="emailHelp"
                                                                                        hidden name="content">
                                                                                    <label for="content-buku"
                                                                                        class="label-upload-custom btn btn-secondary">Pilih
                                                                                        File Video</label>
                                                                                </div>

                                                                                <div class="form-group "
                                                                                    id="versi-pdf">
                                                                                    <div class="form-check mb-2">
                                                                                        <input type="checkbox"
                                                                                            class="form-check-input"
                                                                                            id="versi-pdf-check"
                                                                                            value="1"
                                                                                            name="having_pdf"
                                                                                            @if ($book->book_pdfs !== null) checked @endif>
                                                                                        <label class="form-check-label"
                                                                                            for="versi-pdf-check">Apakah
                                                                                            memiliki versi pdf?</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div id="versi-pdf-container">
                                                                                    @if ($book->book_pdfs !== null)
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                for="exampleInputEmail1">Versi
                                                                                                PDF</label><br>
                                                                                            <input type="file"
                                                                                                class="form-control"
                                                                                                id="content-versi-pdf"
                                                                                                aria-describedby="emailHelp"
                                                                                                hidden
                                                                                                name="content-versi-pdf">
                                                                                            <label
                                                                                                for="content-versi-pdf"
                                                                                                class="label-upload-custom btn btn-secondary">Pilih
                                                                                                File PDF</label>
                                                                                        </div>
                                                                                    @endif
                                                                                </div>
                                                                            @else
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="exampleInputEmail1">File
                                                                                        PDF</label><br>
                                                                                    <input type="file"
                                                                                        class="form-control"
                                                                                        id="content-buku"
                                                                                        aria-describedby="emailHelp"
                                                                                        hidden name="content">
                                                                                    <label for="content-buku"
                                                                                        class="label-upload-custom btn btn-secondary">Pilih
                                                                                        File PDF</label>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="form-check mb-2">
                                                                                <input type="checkbox"
                                                                                    class="form-check-input"
                                                                                    id="check1" value="1"
                                                                                    name="display_homepage"
                                                                                    @if ($book->display_homepage == 1) checked @endif>
                                                                                <label class="form-check-label"
                                                                                    for="check1">Tampilkan
                                                                                    di homepage?</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
