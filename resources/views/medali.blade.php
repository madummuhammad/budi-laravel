    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 bg-aqua py-5">
                <h2 class="text-center ff-andika fw-bold">Sahabat Pilihan Budi ini</h2>
                <div class="row mt-5">
                    <div class="col-12 col-md-7 mt-2 mb-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('web') }}/assets/icon/gold_medal.svg" alt="">
                            <h3 class="ff-andika">Medali Emas</h3>
                        </div>
                        @php
                        $no=0;
                        @endphp
                        @foreach($medal as $medal1)
                        @if($medalC->medal_clasification($medal1->read_count,$medal1->downloaded_count,$medal1->shares_count)=='gold')
                        @php
                        $no++;
                        @endphp
                        @if($no==1)
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <div class="img-gold-medal">
                                <img src="{{ asset('web') }}/assets/img/young.png" alt="">
                                <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                alt="">
                            </div>
                            <div class="ms-2">
                                <h3 class="ff-andika fs-5 text-decoration-underline mb-2">{{$medal1->name}}</h3>
                                <p class="m-0">{{$medal1->read_count}} Buku Dibaca,</p>
                                <p class="m-0">{{$medal1->downloaded_count}} Buku Diunduh</p>
                            </div>
                        </div>
                        @endif
                        @endif
                        @if($no==0 AND $loop->index==0)
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            -
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-12 col-md-5 my-2">
                        <div class="card">
                            <div class="card-body">
                                @php
                                $no=0;
                                @endphp
                                @foreach($medal as $medal2)
                                @if($medalC->medal_clasification($medal2->read_count,$medal2->downloaded_count,$medal2->shares_count)=='gold')
                                @php
                                $no++;
                                @endphp
                                @if($no==2)
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <div class="img-gold-medal">
                                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                        <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                        alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                            {{$medal2->name}}
                                        </h3>
                                        <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                        <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                    </div>
                                </div>
                                @else
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                @endif
                                @if($no==3)
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <div class="img-gold-medal">
                                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                        <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                        alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                            {{$medal2->name}}
                                        </h3>
                                        <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                        <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                    </div>
                                </div>
                                @else
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                @endif
                                @if($no==4)
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    <div class="img-gold-medal">
                                        <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                        alt="">
                                        <img class="gold-medal" src="{{ asset('web') }}/assets/icon/gold_medal.svg"
                                        alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                            {{$medal2->name}}
                                        </h3>
                                        <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                        <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                    </div>
                                </div>
                                @else
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                @endif
                                @endif
                                @if($no==0 AND $loop->index==0)
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                <div class="dash mt-3"></div>
                                <div class="d-flex justify-content-center align-items-center mt-3">
                                    -
                                </div>
                                <div class="dash mt-3"></div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-none d-sm-block">
                    <div class="row">
                        <div class="col-12 col-md-6 my-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="w-25" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                alt="">
                                <h4 class="ff-andika fw-bold">Medali Perak</h4>
                            </div>
                            @php
                            $no=0;
                            @endphp
                            @foreach($medal as $medal2)
                            @if($medalC->medal_clasification($medal2->read_count,$medal2->downloaded_count,$medal2->shares_count)=='silver')
                            @php
                            $no++;
                            @endphp
                            @if($no==1)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal2->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @if($no==2)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal2->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @if($no==3)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal2->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal2->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal2->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @endif
                            @if($no==0 AND $loop->index==0)
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-12 col-md-6 my-2">
                            <div class="d-flex justify-content-center align-items-center">
                                <img class="w-25" src="{{ asset('web') }}/assets/icon/bronze_medal.svg"
                                alt="">
                                <h4 class="ff-andika fw-bold">Medali Perunggu</h4>
                            </div>
                            @php
                            $no=0;
                            @endphp
                            @foreach($medal as $medal3)
                            @if($medalC->medal_clasification($medal3->read_count,$medal3->downloaded_count,$medal3->shares_count)=='bronze')
                            @php
                            $no++;
                            @endphp
                            @if($no==1)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal3->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal3->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal3->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @if($no==2)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal3->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal3->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal3->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @if($no==3)
                            <div class="d-flex justify-content-center align-items-center mt-5 mb-5">
                                <div class="img-gold-medal-2">
                                    <img class="img-fluid" src="{{ asset('web') }}/assets/img/young.png"
                                    alt="">
                                    <img class="gold-medal-2" src="{{ asset('web') }}/assets/icon/silver_medal.svg"
                                    alt="">
                                </div>
                                <div class="ms-2">
                                    <h3 class="ff-andika fs-6 text-decoration-underline mb-2">
                                        {{$medal3->name}}
                                    </h3>
                                    <p class="m-0 fs-6">{{$medal3->read_count}} Buku Dibaca,</p>
                                    <p class="m-0 fs-6">{{$medal3->downloaded_count}} Buku Diunduh</p>
                                </div>
                            </div>
                            @endif
                            @endif
                            @if($no==0 AND $loop->index==0)
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                -
                            </div>
                            <div class="dash mt-3"></div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <button class="d-block d-sm-none text-center mx-auto btn mt-4 text-decoration-underline"
                onclick="(this.previousSibling.previousSibling.classList.toggle('d-none'));">Lihat
            Semua</button>
        </div>
    </div>
</div>