<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}"
    data-template="vertical-menu-template-no-customizer-starter">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <title> {{ env('APP_NAME') }} - {{ $title ?? '' }} </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="ATM System">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}"/>
    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <script src="{{asset('assets/js/config.js')}}"></script>
    <!--Toaster -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!--Select2 -->
    <style>
        /*cairo font*/
        @import "https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap";

        body,
        .swal2-title,
        .swal2-actions {
            font-family: 'Cairo', sans-serif !important;
        }
    </style>
    @stack('styles')
</head>

<body>
<!--Loader -->
<div class="overlay__loader">
    <div class="overlay__inner">
        <div class="loader_img">
            <img src="{{asset('assets/img/favicon/favicon.png')}}" style="width: 80%;height: 67px;" alt="Logo">
        </div>
        <div class="loading"></div>
    </div>
</div>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        @include('layouts.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('layouts.navbar')
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>
                <!-- / Content -->

                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <span> {{ env('APP_NAME') }} &reg; </span>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>

            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->

    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('assets/vendor/js/menu.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
<!--Toaster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- sweetalert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.19.0/sweetalert2.all.min.js"></script>
<!--bootstrap-daterangepicker -->
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
@include('shared.alerts')
@include('shared.helpers')


<script>

</script>


@stack('scripts')

</body>
</html>
