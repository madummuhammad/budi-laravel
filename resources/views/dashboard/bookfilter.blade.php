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
                                                <td class="d-flex">
                                                    <button class="btn badge badge-danger mx-1" data-toggle="modal"
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
                                                    <a href="{{ url('dashboard/book/edit/') }}/{{ $book->id }}"
                                                        class="btn badge badge-primary mx-1"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <a href="{{ url('dashboard/book/comment') }}/{{ $book->id }}"
                                                        class="btn badge badge-outline-primary mx-1" href=""><i
                                                            class="fa-regular fa-comments"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <script></script>
