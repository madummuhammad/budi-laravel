        <div class="row tab-book mt-3">
            <div class="d-flex justify-content-center">
                <ul class="nav nav-pills">
                    @foreach ($levels as $level)
                        <li class="nav-item">
                            @if ($loop->first)
                                <a class="nav-link active" data-bs-toggle="pill" href="#theme{{ Str::slug($level->name) }}"
                                    aria-selected="true">{{ $level->name }}</a>
                            @else
                                <a class="nav-link" data-bs-toggle="pill" href="#theme{{ Str::slug($level->name) }}"
                                    aria-selected="false">{{ $level->name }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab-content mt-5">
                @foreach ($levels as $level)
                    @if ($loop->first)
                        <div class="tab-pane container active" id="theme{{ Str::slug($level->name) }}">
                        @else
                            <div class="tab-pane container" id="theme{{ Str::slug($level->name) }}">
                    @endif
                    <div class="row row-cols-6">
                        @foreach ($books as $book)
                            @if ($book->display_homepage == 1)
                                @if ($book->level == $level->id)
                                    <a href="{{ url('/book') }}/{{ $book->id }}">
                                        <div class="col mb-4">
                                            <div class="img-container-for-icon">
                                                <img src="{{ $book->cover }}" alt="" class="img-fluid">
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
                <button class="btn bg-blue text-white rounded-5">Akses Gratis ! <span><i
                            class="fa-solid fa-chevron-right"></i></span></button>
            </div>
            <p class="text-center mt-2">Kapan pun & Di mana pun</p>
        </div>