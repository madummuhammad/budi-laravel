                    @foreach ($reference_books as $book)
                        <div class="col mb-4">
                            <div class="card p-2">
                                <a href="{{ url('reference_book_detail') }}/{{ $book->id }}"
                                    class="text-decoration-none text-dark">
                                    <img src="{{ $book->cover }}" alt="" class="img-fluid">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <span><img src="{{ asset('web') }}/assets/icon/love.svg" alt="">
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
                                    @foreach ($book->themes as $theme)
                                        <p class="card-text">Tema: {{ $theme->name }}</p>
                                    @endforeach

                                </div>
                            </div>
                            <div class="card-body p-1">

                            </div>
                        </div>
                    @endforeach
