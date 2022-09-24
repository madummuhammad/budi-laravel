                    <div class="tab-content mt-5">
                        <div class="tab-pane container active" id="semua">
                            <div class="row row-cols-1 row-cols-md-5">
                                @foreach ($reference_books as $book)
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('reference_book_detail') }}/{{ $book->id }}"
                                                class="text-decoration-none text-dark">
                                                <img src="{{ $book->cover }}" alt="" class="img-fluid w-100">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt=""> 100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $book->name }}
                                                </div>
                                                @foreach ($book->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($book->reference_themes as $theme)
                                                    <p class="card-text">Tema: {{ $theme->name }}</p>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="card-body p-1">

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @foreach ($themes as $theme)
                            <div class="tab-pane container" id="theme{{ $theme->id }}">
                                <div class="row row-cols-5">
                                    @foreach ($reference_books as $book)
                                        @if ($theme->id == $book->theme)
                                            <div class="col mb-4">
                                                <div class="card p-2">
                                                    <a href="{{ url('reference_book_detail') }}/{{ $book->id }}"
                                                        class="text-decoration-none text-dark">
                                                        <img src="{{ $book->cover }}" alt=""
                                                            class="img-fluid">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex">
                                                                <span><img
                                                                        src="{{ asset('web') }}/assets/icon/love.svg"
                                                                        alt="">
                                                                    100</span>
                                                                <span><img
                                                                        src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                        alt=""> 100</span>
                                                            </div>
                                                            <a href=""><i
                                                                    class="bi bi-three-dots-vertical"></i></a>
                                                        </div>
                                                    </a>
                                                    <div class="card-body p-1">
                                                        <div class="card-title fw-bold">
                                                            {{ $book->name }}
                                                        </div>
                                                        @foreach ($book->authors as $author)
                                                            <p class="card-text">Author: {{ $author->name }}</p>
                                                        @endforeach
                                                        @foreach ($book->reference_themes as $theme)
                                                            <p class="card-text">Tema: {{ $theme->name }}</p>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                <div class="card-body p-1">

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- <div class="tab-content mt-5">
                        <div class="tab-pane container active" id="semua">
                            <div class="row row-cols-5">
                                @foreach ($reference_books as $book)
                                    <div class="col mb-4">
                                        <div class="card p-2">
                                            <a href="{{ url('/book') }}/{{ $book->id }}"
                                                class="text-decoration-none text-dark">
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
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <span><img src="{{ asset('web') }}/assets/icon/love.svg"
                                                                alt="">
                                                            100</span>
                                                        <span><img src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                alt="">
                                                            100</span>
                                                    </div>
                                                    <a href=""><i class="bi bi-three-dots-vertical"></i></a>
                                                </div>
                                            </a>
                                            <div class="card-body p-1">
                                                <div class="card-title fw-bold">
                                                    {{ $book->name }}
                                                </div>
                                                @foreach ($book->authors as $author)
                                                    <p class="card-text">Author: {{ $author->name }}</p>
                                                @endforeach
                                                @foreach ($book->themes as $theme)
                                                    <p class="card-text">Tema: {{ $theme->name }}</p>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="card-body p-1">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @foreach ($themes as $theme)
                            <div class="tab-pane container" id="theme{{ $theme->id }}">
                                <div class="row row-cols-5">
                                    @foreach ($books as $book)
                                        @if ($theme->id == $book->theme)
                                            <div class="col mb-4">
                                                <div class="card p-2">
                                                    <a href="{{ url('/book') }}/{{ $book->id }}"
                                                        class="text-decoration-none text-dark">
                                                        <div class="img-container-for-icon">
                                                            <img src="{{ $book->cover }}" alt=""
                                                                class="img-fluid">
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
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex">
                                                                <span><img
                                                                        src="{{ asset('web') }}/assets/icon/love.svg"
                                                                        alt="">
                                                                    100</span>
                                                                <span><img
                                                                        src="{{ asset('web') }}/assets/icon/little-book.svg"
                                                                        alt="">
                                                                    100</span>
                                                            </div>
                                                            <a href=""><i
                                                                    class="bi bi-three-dots-vertical"></i></a>
                                                        </div>
                                                    </a>
                                                    <div class="card-body p-1">
                                                        <div class="card-title fw-bold">
                                                            {{ $book->name }}
                                                        </div>
                                                        @foreach ($book->authors as $author)
                                                            <p class="card-text">Author: {{ $author->name }}</p>
                                                        @endforeach
                                                        @foreach ($book->themes as $theme)
                                                            <p class="card-text">Tema: {{ $theme->name }}</p>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                <div class="card-body p-1">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
