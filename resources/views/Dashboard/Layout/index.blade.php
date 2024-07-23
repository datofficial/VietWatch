<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý VietWatch</title>
    <link rel="stylesheet" href="{{ asset('Dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/css/kaiadmin.min.css') }}">
</head>
<body>
    <div class="wrapper">
        @include('Dashboard.Layout.header')
        @include('Dashboard.Layout.sidebar')
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('Dashboard/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/plugin/jsvectormap/world.js') }}"></script>
    <script src="{{ asset('Dashboard/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/kaiadmin.min.js') }}"></script>
</body>
</html>
