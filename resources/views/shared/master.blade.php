<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Aetosdata</title>

    <link rel="icon" href="/img/logo-white.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="/argon/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="/argon/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="/argon/css/argon.min.css" type="text/css">
    <link rel="stylesheet" href="/css/bootstrap-select.min.css" type="text/css">

    {{-- Quill CSS --}}
    <link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.snow.css">

    {{-- Dropzone JS --}}
    <link rel="stylesheet" href="/dropzone/dropzone.min.css">

    <style>

        .navbar-vertical .navbar-brand-img, .navbar-vertical .navbar-brand>img {
            max-width: 100% !important;
            max-height: 4rem !important;
        }

        .sidenav .navbar-brand, .sidenav .navbar-heading {
            padding: 1rem !important;
        }

        .navbar-nav .nav .nav-link {
            margin-left: 1.25rem !important;
            margin-right: .5rem !important;
            padding-left: 2rem !important;
        }

        .navbar-nav .nav .nav .nav-link {
            margin-left: 3.25rem !important;
            margin-right: .5rem !important;
            padding-left: 2rem !important;
        }

        .navbar-nav .nav .nav-link.h4 {
            margin-left: 1.25rem !important;
            margin-right: 0rem !important;
            padding-left: 2rem !important;
        }

        .navbar-nav .nav .nav .nav-link.active,
        .navbar-nav .nav .nav-link.active,
        .navbar-nav .nav-link.active {
            font-weight: 800;
            border-radius: .375rem !important;
            background-color: #e9edf2 !important;
        }

    </style>

    @yield('css')

</head>

<body>

    @yield('modal')
    <x-sidebar/>
    <div class="main-content">
        <x-navbar/>
        @yield('content')
    </div>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="/argon/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/argon/vendor/js-cookie/js.cookie.js"></script>
    <script src="/argon/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="/argon/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="/argon/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- Argon JS -->
    <script src="/argon/js/argon.min.js"></script>
    <script src="/argon/assets/js/plugins/chart.js/dist/Chart.min.js"></script>

    <!-- Bootbox -->
    <script src="/js/bootbox.min.js"></script>

    <!-- Select -->
    <script src="/js/bootstrap-select.min.js"></script>

    <!-- Backend JS -->
    <script src="/js/core.js"></script>

    {{-- Quill JS --}}
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    {{-- Dropzone JS --}}
    <script src="/dropzone/dropzone.min.js"></script>

    @yield('scripts')

</body>

</html>
