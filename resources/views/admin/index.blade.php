<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>

    <!-- Fontfaces CSS-->
    <link href="{{ url('assets/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ url('assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ url('assets/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ url('assets/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="{{ url('assets/css/theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ url('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="{{ url('assets/index.html') }}">
                            <img src="{{ url('assets/images/icon/logo.png') }}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="{{ url('#') }}">
                                <i class="fas fa-copy"></i>Data Master</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{ url('product') }}">
                                        <i class="fas fa-table"></i>Data Barang</a>
                                </li>
                                <li>
                                    <a href="{{ url('category') }}">
                                        <i class="fas fa-table"></i>Data Kategori</a>
                                </li>
                                <li>
                                    <a href="{{ url('assets/table.html') }}">
                                        <i class="fas fa-table"></i>Data Pemesanan</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        @include('admin.sidebar')

        <!-- PAGE CONTAINER-->
        <div class="page-container">

            @include('admin.header')

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        @if (session()->has('status'))
                            <div class="bg-info p-2 mb-2">
                                <p class="text-white">{{ session()->get('status') }}</p>
                            </div>
                        @endif

                        @yield('content')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                            href="{{ url('assets/https://colorlib.com') }}">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    @yield('modal')

    <!-- Jquery JS-->
    <script src="{{ asset('assets/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ url('assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ url('assets/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ url('assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ url('assets/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ url('assets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ url('assets/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ url('assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/select2/select2.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script src="{{ url('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('assets/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('assets/js/jszip.min.js') }}"></script>
    <script src="{{ url('assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ url('assets/js/vfs_fonts.js') }}"></script>
    <script src="{{ url('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('assets/js/buttons.print.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    @yield('footerjs')

</body>

</html>
<!-- end document-->
