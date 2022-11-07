<!DOCTYPE html>
<html lang="<?php echo e(App::getLocale()); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    
    <!-- Retina iPad Touch Icon-->
    
    <!-- Retina iPhone Touch Icon-->
    
    <!-- Standard iPad Touch Icon-->
    
    <!-- Standard iPhone Touch Icon-->
    


    
    

    <link href="<?php echo e(config('app.assets_path')); ?>/assets/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/css/style.css"
        rel="stylesheet">
    <link
        href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/css/jquery.dataTables.min.css"
        rel="stylesheet">

        
    <!-- Daterange picker -->
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus//vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus//vendor/pickadate/themes/default.date.css">

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
    <?php echo $__env->yieldContent('styles'); ?>
    

    

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
        <?php echo $__env->make('header.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('sidebar.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



        <?php echo $__env->yieldContent('content'); ?>
        <!-- /# column -->

        <?php echo $__env->make('footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/js/jQuery3.6.0.js"></script>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/js/jquery.dataTables.min.js"></script>
    
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/global/global.min.js">
    </script>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/quixnav-init.js">
    </script>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/custom.min.js">
    </script>
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/js/jquery.dataTables.min.js">
    </script>
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/datatables.init.js">
    </script>
    <!-- Common -->
    

    
    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/moment/moment.min.js"></script>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- clockpicker -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <!-- asColorPicker -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asColor/jquery-asColor.min.js"></script>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asGradient/jquery-asGradient.min.js"></script>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js"></script>
    <!-- Material color picker -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- pickdate -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/picker.js"></script>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/picker.time.js"></script>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/picker.date.js"></script>
    

    <!-- Daterangepicker -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/bs-daterange-picker-init.js"></script>
    <!-- Clockpicker init -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/clock-picker-init.js"></script>
    <!-- asColorPicker init -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/jquery-asColorPicker.init.js"></script>
    <!-- Material color picker init -->
    
    <!-- Pickdate -->
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/pickadate-init.js"></script>

    <script src="<?php echo e(config('app.assets_path')); ?>/assets/js/timePicker.js"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH /home/customer/www/fullygreatasia.admatrix-ai.com/public_html/laravel3/resources/views/layouts/default.blade.php ENDPATH**/ ?>