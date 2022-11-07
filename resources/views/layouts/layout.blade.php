<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    {{-- <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">



    <!-- Toastr -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/toastr/toastr.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Range Slider -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/rangSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="{{ config('app.assets_path') }}/assets/css/lib/rangSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bar Rating -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/barRating/barRating.css" rel="stylesheet">
    <!-- Nestable -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/nestable/nestable.css" rel="stylesheet">
    <!-- JsGrid -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
    <link href="{{ config('app.assets_path') }}/assets/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
    <!-- Datatable -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/datatable/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="{{ config('app.assets_path') }}/assets/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <!-- Calender 2 -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <!-- Weather Icon -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/weather-icons.css" rel="stylesheet" />
    <!-- Owl Carousel -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{ config('app.assets_path') }}/assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/select2/select2.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <!-- Calender -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/calendar/fullcalendar.css" rel="stylesheet" />


        <!-- Common -->
        <link href="{{ config('app.assets_path') }}/assets/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="{{ config('app.assets_path') }}/assets/css/lib/themify-icons.css" rel="stylesheet">
        <link href="{{ config('app.assets_path') }}/assets/css/lib/menubar/sidebar.css" rel="stylesheet">
        <link href="{{ config('app.assets_path') }}/assets/css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="{{ config('app.assets_path') }}/assets/css/lib/helper.css" rel="stylesheet">
        <link href="{{ config('app.assets_path') }}/assets/css/style.css" rel="stylesheet"> --}}
    <link href="{{ config('app.assets_path') }}/assets/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- focus style --}}
    <link href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/css/style.css"
        rel="stylesheet">
    <link
        href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/css/jquery.dataTables.min.css"
        rel="stylesheet">
    


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
    <!-- Common -->
    {{-- <script src="{{ config('app.assets_path') }}/assets/js/lib/jquery.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/menubar/sidebar.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/preloader/pace.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/bootstrap.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/scripts.js"></script>

    <!-- Calender -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jquery-ui/jquery-ui.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/moment/moment.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/calendar/fullcalendar.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/calendar/fullcalendar-init.js"></script>

    <!--  Flot Chart -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/excanvas.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/jquery.flot.time.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/jquery.flot.stack.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/jquery.flot.resize.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/curvedLines.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/flot-chart/flot-chart-init.js"></script>

    <!--  Chartist -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/chartist/chartist.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/chartist/chartist-init.js"></script>

    <!--  Chartjs -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/chart-js/chartjs-init.js"></script>

    <!--  Knob -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/knob/jquery.knob.min.js "></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/knob/knob.init.js "></script>

    <!--  Morris -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/morris-chart/raphael-min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/morris-chart/morris.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/morris-chart/morris-init.js"></script>

    <!--  Peity -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/peitychart/jquery.peity.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/peitychart/peitychart.init.js"></script>

    <!--  Sparkline -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/sparklinechart/sparkline.init.js"></script>

    <!-- Select2 -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/select2/select2.full.min.js"></script>

    <!--  Validation -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/form-validation/jquery.validate-init.js"></script>

    <!--  Circle Progress -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/circle-progress/circle-progress-init.js"></script>

    <!--  Vector Map -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.algeria.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.argentina.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.brazil.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.france.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.germany.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.greece.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.iran.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.iraq.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.russia.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.tunisia.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.europe.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/vector-map/country/jquery.vmap.usa.js"></script>

    <!--  Simple Weather -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/weather/weather-init.js"></script>

    <!--  Owl Carousel -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/owl-carousel/owl.carousel-init.js"></script>

    <!--  Calender 2 -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/calendar-2/pignose.init.js"></script>


    <!-- Datatable -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/buttons.dataTables.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/data-table/datatables-init.js"></script>

    <!-- JS Grid -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/db.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/jsgrid.core.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/jsgrid.load-indicator.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/jsgrid.load-strategies.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/jsgrid.sort-strategies.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/jsgrid.field.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/fields/jsgrid.field.text.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/fields/jsgrid.field.number.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/fields/jsgrid.field.select.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/fields/jsgrid.field.checkbox.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/fields/jsgrid.field.control.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/jsgrid/jsgrid-init.js"></script>

    <!--  Datamap -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/datamap/d3.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/datamap/topojson.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/datamap/datamaps.world.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/datamap/datamap-init.js"></script>

    <!--  Nestable -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/nestable/jquery.nestable.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/nestable/nestable.init.js"></script>

    <!--ION Range Slider JS-->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/rangeSlider/moment.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/rangeSlider/moment-with-locales.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/rangeSlider/rangeslider.init.js"></script>

    <!-- Bar Rating-->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/barRating/jquery.barrating.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/barRating/barRating.init.js"></script>

    <!-- jRate -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/rating1/jRate.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/rating1/jRate.init.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/sweetalert/sweetalert.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/sweetalert/sweetalert.init.js"></script>

    <!-- Toastr -->
    <script src="{{ config('app.assets_path') }}/assets/js/lib/toastr/toastr.min.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/lib/toastr/toastr.init.js"></script>


    <!--  Dashboard 1 -->
    <script src="{{ config('app.assets_path') }}/assets/js/dashboard1.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/dashboard2.js"></script> --}}


    {{-- Jquery 3.6.0 --}}
    <script src="{{ config('app.assets_path') }}/assets/js/jQuery3.6.0.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/jquery.dataTables.min.js"></script>
    {{-- Focus --}}
    <script
        src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/global/global.min.js">
    </script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/quixnav-init.js">
    </script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/custom.min.js">
    </script>
    <script
        src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/js/jquery.dataTables.min.js">
    </script>
    <script
        src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/datatables.init.js">
    </script>
    


    @yield('scripts')
</body>

</html>
