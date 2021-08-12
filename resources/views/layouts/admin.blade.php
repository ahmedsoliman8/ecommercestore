<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ecommerce Dashboard">
    <meta name="author" content="Ahmed Mahmoud">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('backend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    <link href="{{asset('backend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/vendor/bootstrap-file-input/css/fileinput.min.css') }}">
    @yield('styles')
</head>
<body id="page-top">

<div id="app">
<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
     @include('partials.backend.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
        @include('partials.backend.navbar')
        <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @include('partials.backend.flash')
                @yield('content')



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->

        @include('partials.backend.footer')
        <!-- End of Footer -->

    </div>

    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Scroll to Top Button-->

    @include('partials.backend.scroll')

<!-- Logout Modal-->

@include('partials.backend.model')

</div>

    <script src="{{ asset('js/app.js') }}" ></script>
{{--
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    --}}
    <script src="{{asset('backend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('backend/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <script src="{{asset('backend/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('backend/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('backend/js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-file-input/js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-file-input/js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-file-input/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-file-input/themes/fas/theme.min.js') }}"></script>

@yield('scripts')
</body>
</html>
