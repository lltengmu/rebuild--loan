<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/css/style.css" rel="stylesheet">
    {{-- TimePickerStyle --}}
    <!-- Daterange picker -->
    <link href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus//vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus//vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus//vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus//vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus//vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus//vendor/pickadate/themes/default.date.css">
    <style>
        body {
            padding: 0 !important;
            margin: 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            border-radius: 50%;
            color: #593bdb !important;
            background: rgba(89, 59, 219, 0.1);
            border: 0 !important;
        }


        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            border-radius: 50%;
            color: #593bdb !important;
            background: rgba(89, 59, 219, 0.1);
            border: 1px solid #fff;
        }

        thead tr th:last-child {
            text-align: left;
        }

        tbody tr td:last-child {
            text-align: left;
        }

        thead tr th {
            color: #373757;
        }

        tbody tr td {
            color: #BDBDC7;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 10px 10px;
            border-bottom: 0px solid #111;
        }

        table.dataTable tfoot th,
        table.dataTable tfoot td {
            padding: 10px 10px;
            border-top: 0px solid #111;
        }

        .dataTables_wrapper.no-footer .dataTables_scrollBody {
            border-bottom: unset;
        }
    </style>
    @yield('styles')
    {{-- <link rel="shortcut icon" href="{{ config('app.assets_path') }}/assets/images/favicon.svg" type="image/x-icon"> --}}

    {{-- <link rel="stylesheet" href="{{ config('app.assets_path') }}/assets/vendors/databaseTable/jquery.dataTables.min.css">
    <script src="{{ config('app.assets_path') }}/assets/vendors/databaseTable/jquery-3.6.0.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/vendors/databaseTable/jquery.dataTables.min.js"></script> --}}

</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('header.header')

        @include('sidebar.sidebar')



        @yield('content')
        <!-- /# column -->

        @include('footer.footer')

    </div>
    <script src="{{ config('app.assets_path') }}/assets/js/jQuery3.6.0.js"></script>

    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/global/global.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/quixnav-init.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/raphael/raphael.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/morris/morris.min.js"></script>


    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/flot/jquery.flot.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    {{--<script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/dashboard/dashboar-d1.js"></script>--}}

    {{-- TimePickerScript --}}
    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/moment/moment.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/picker.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/picker.time.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/picker.date.js"></script>
    

    <!-- Daterangepicker -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    {{--<script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/material-date-picker-init.js"></script>--}}
    <!-- Pickdate -->
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/pickadate-init.js"></script>

    <script src="{{ config('app.assets_path') }}/assets/js/timePicker.js"></script>
    @yield('scripts')
</body>

</html>
