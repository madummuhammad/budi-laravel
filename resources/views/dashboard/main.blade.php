<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Budi - Adminsystem</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets') }}/images/favicon.png">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="{{ asset('assets') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/select2/css/select2.min.css">
    <link href="{{ asset('assets') }}/vendor/summernote/summernote.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/vendor/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet">



</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="./images/logo.png" alt="">
                <img class="logo-compact" src="./images/logo-text.png" alt="">
                <img class="brand-title" src="./images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            {{-- <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div> --}}
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                {{-- <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-bell"></i>
                                    <div class="pulse-css"></div>
                                </a> --}}
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as
                                                        unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="./email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="./page-login.html" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="{{ url('dashboard') }}" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a></li>
                    <li class="nav-label">Buku</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Master Buku</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('dashboard/book') }}">Buku</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Buku
                                    Referensi</a>
                                <ul aria-expanded="false">
                                    <li><a
                                            href="{{ url('dashboard/reference_book/5cbb48f9-aed4-44a9-90c2-71cbcef71264') }}">Buku
                                            Bacaan</a></li>
                                    <li><a
                                            href="{{ url('dashboard/reference_book/220843b8-4f60-4e47-9aca-cf6ea0d54afe') }}">Buku
                                            Video</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('dashboard/theme') }}">Tema</a></li>
                            <li><a href="{{ url('dashboard/author') }}">Author</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Website</li>
                    <li><a href="{{ url('dashboard/homepage') }}" aria-expanded="false"><i
                                class="icon icon-globe-2"></i><span class="nav-text">Homepage</span></a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Jenis Buku</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('dashboard/book_type/2fd97285-08d0-4d81-83f2-582f0e8b0f36') }}">Buku
                                    Digital</a>
                            </li>
                            <li><a href="{{ url('dashboard/book_type/31ba455c-c9c7-4a3c-a2b1-62915546eaba') }}">Buku
                                    Komik</a>
                            </li>
                            <li><a href="{{ url('dashboard/book_type/9e30a937-0d60-49ad-9775-c19b97cfe864') }}">Buku
                                    Audio</a>
                            </li>
                            <li><a href="{{ url('dashboard/book_type/bfe3060d-5f2e-4a1b-9615-40a9f936c6cc') }}">Buku
                                    Video</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Blog</span></a>
                        <ul aria-expanded="false">
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Artikel</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('dashboard/blog/article') }}">Isi Artikel</a></li>
                            <li><a href="{{ url('dashboard/blog/article/writer') }}">Penulis
                                    Artikel</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('dashboard/blog/news') }}">Berita</a>
                    </li>
                </ul>
                </li>
                <li><a href="{{ url('dashboard/send_creation') }}" aria-expanded="false"><i
                            class="icon icon-globe-2"></i><span class="nav-text">Kirimkan Karyamu</span></a></li>
                {{-- <li class="nav-label">Forms</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">Forms</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./form-element.html">Form Elements</a></li>
                            <li><a href="./form-wizard.html">Wizard</a></li>
                            <li><a href="./form-editor-summernote.html">Summernote</a></li>
                            <li><a href="form-pickers.html">Pickers</a></li>
                            <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Table</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">Table</span></a>
                        <ul aria-expanded="false">
                            <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                            <li><a href="table-datatable-basic.html">Datatable</a></li>
                        </ul>
                    </li>

                    <li class="nav-label">Extra</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">Pages</span></a>
                        <ul aria-expanded="false">
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-login.html">Login</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-400.html">Error 400</a></li>
                                    <li><a href="./page-error-403.html">Error 403</a></li>
                                    <li><a href="./page-error-404.html">Error 404</a></li>
                                    <li><a href="./page-error-500.html">Error 500</a></li>
                                    <li><a href="./page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href="./page-lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        @yield('content')






        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                {{-- <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p> --}}
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('assets') }}/js/quixnav-init.js"></script>
    <script src="{{ asset('assets') }}/js/custom.min.js"></script>


    <!-- Vectormap -->
    {{-- <script src="{{ asset('assets') }}/vendor/raphael/raphael.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/morris/morris.min.js"></script>


    <script src="{{ asset('assets') }}/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="{{ asset('assets') }}/vendor/gaugeJS/dist/gauge.min.js"></script> --}}

    <!--  flot-chart js -->
    {{-- <script src="{{ asset('assets') }}/vendor/flot/jquery.flot.js"></script>
    <script src="{{ asset('assets') }}/vendor/flot/jquery.flot.resize.js"></script> --}}

    <!-- Owl Carousel -->
    {{-- <script src="{{ asset('assets') }}/vendor/owl-carousel/js/owl.carousel.min.js"></script> --}}

    <!-- Counter Up -->
    {{-- <script src="{{ asset('assets') }}/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="{{ asset('assets') }}/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{ asset('assets') }}/vendor/jquery.counterup/jquery.counterup.min.js"></script> --}}

    <!-- Datatable -->
    <script src="{{ asset('assets') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins-init/datatables.init.js"></script>

    <script src="{{ asset('assets') }}/vendor/select2/js/select2.full.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins-init/select2-init.js"></script>

    <!-- Summernote -->
    <script src="{{ asset('assets') }}/vendor/summernote/js/summernote.min.js"></script>
    <!-- Summernote init -->
    <script src="{{ asset('assets') }}/js/plugins-init/summernote-init.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>

    <script src="{{ asset('assets') }}/js/script.js"></script>


    {{-- <script src="{{ asset('assets') }}/js/dashboard/dashboard-1.js"></script> --}}

</body>

</html>
