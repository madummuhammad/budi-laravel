                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cover</th>
                                            <th>Judul</th>
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
                                                        @if ($book->reference_book_type == '220843b8-4f60-4e47-9aca-cf6ea0d54afe')
                                                            <div class="icon">
                                                                <img src="{{ asset('web') }}/assets/icon/play.svg"
                                                                    alt="">
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $book->name }}</td>
                                                @foreach ($book->reference_themes as $theme)
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
                                                                    <form
                                                                        action="{{ url('dashboard/reference_book/') . '/' . $book->reference_book_type }}"
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
                                                    <a href="{{ url('dashboard/reference_book/edit') }}/{{ $book->id }}"
                                                        class="btn badge badge-primary"><i
                                                            class="bi bi-pencil-square"></i></a>
                                                    <a href="{{ url('dashboard/statistic/referensi/comment') }}/{{ $book->id }}"
                                                        class="btn badge badge-outline-primary mx-1" href=""
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        title="Komentar"><i class="fa-regular fa-comments"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
