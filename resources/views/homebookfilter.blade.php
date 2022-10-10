        <div class="row tab-book mt-3">
            <div class="d-flex justify-content-center">
                <div class="row w-100 justify-content-center">
                    <div class="col-12 col-md-6">
                        <ul class="nav nav-pills w-100">
                            <div class="container">
                                <div class="row row-cols-3 row-cols-md-5 justify-content-center">
                                    @foreach ($levels as $level)
                                        {{-- <li class="nav-item"> --}}
                                        @if ($loop->first)
                                            <div class="col">
                                                <a class="nav-link active text-center" data-bs-toggle="pill"
                                                    href="#theme{{ Str::slug($level->name) }}"
                                                    aria-selected="true">{{ $level->name }}</a>
                                            </div>
                                        @else
                                            <div class="col">
                                                <a class="nav-link text-center" data-bs-toggle="pill"
                                                    href="#theme{{ Str::slug($level->name) }}"
                                                    aria-selected="false">{{ $level->name }}</a>
                                            </div>
                                        @endif
                                        {{-- </li> --}}
                                    @endforeach
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tab panes -->
            <div class="tab-content mt-5">
                @foreach ($levels as $level)
                    @if ($loop->first)
                        <div class="tab-pane container active" id="theme{{ Str::slug($level->name) }}">
                        @else
                            <div class="tab-pane container" id="theme{{ Str::slug($level->name) }}">
                    @endif
                    <div class="row row-cols-2 row-cols-md-6">
                        @foreach ($books as $book)
                            @if ($book->display_homepage == 1)
                                @if ($book->level == $level->id)
                                    <a href="{{ url('/book') }}/{{ $book->id }}">
                                        <div class="col mb-4">
                                            <div class="img-container-for-icon">
                                                <img src="{{ $book->cover }}" alt="" class="img-fluid w-100">
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
                                        </div>
                                    </a>
                                @endif
                            @endif
                        @endforeach
                    </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center">
                <a href="{{ url('book_type/2fd97285-08d0-4d81-83f2-582f0e8b0f36') }}"
                    class="btn bg-blue text-white rounded-5">Akses Gratis ! <span><i
                            class="fa-solid fa-chevron-right"></i></span></a>
            </div>
            <p class="text-center mt-2">Kapan pun dan Di mana pun</p>
        </div>
