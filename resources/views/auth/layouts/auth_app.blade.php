<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-navbar-fixed layout-menu-fixed"
    data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}"
    data-template="vertical-menu-template-no-customizer-starter">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title> {{env('APP_NAME')}} - {{ $title ?? '' }} </title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{env('APP_NAME')}}">

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

    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}"/>
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}"/>

    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}"/>
    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>

    <script src="{{asset('assets/js/config.js')}}"></script>
    <script src="{{asset('assets/js/pages-auth.js')}}"></script>

    <!--Toaster -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">

    <style>
        /*cairo font*/
        @import "https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap";

        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>
    @stack('styles')
</head>
<body>

<!--Content -->
<div class="authentication-wrapper authentication-cover">
    <div class="navbar-nav align-items-center">
        <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
            <i class="bx bx-sm"></i>
        </a>
    </div>
    <div class="authentication-inner row m-0">
        @yield('content')
    </div>
</div>
<!-- / Content -->


<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
<!--Toaster -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@include('shared.alerts')
@include('shared.helpers')
@stack('scripts')
</body>
</html>
