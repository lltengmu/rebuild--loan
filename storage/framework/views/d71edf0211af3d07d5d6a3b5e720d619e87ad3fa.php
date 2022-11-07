<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>" />
    <title>Focus Admin: Widget</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/css/lib/helper.css" rel="stylesheet">
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/css/style.css" rel="stylesheet">
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/js/jQuery3.6.0.js"></script>

</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo" style="padding-bottom: 30px">
                            
                        </div>
                        <div class="login-form">
                            <h4>Individual Login</h4>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger" style="background-color: rgba(242,86,97)">
                                    <ul style="padding-left:2%">
                                        <?php if(is_object($errors)): ?>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li style="color: white;list-style:disc"><?php echo e($error); ?></li>
                                                <?php break; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <li style="color: white;list-style:disc"><?php echo e($error); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                            <?php endif; ?>
                            <form id="mxform" action="<?php echo e(url('individual/doLogin')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label>郵箱</label>
                                    <input id="email" type="text" value="" name="email"
                                        class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>密碼</label>
                                    <input id="psw" type="password" name="psw" class="form-control"
                                        placeholder="Password">
                                </div>
                                <label>驗證碼</label>

                                <div class="form-group row" style="margin-left:0 ">
                                    <input id="captcha" style="width:50%" type="text" name="captcha" class="form-control" placeholder="驗證碼">
                                    <img id="captcha1" src="<?php echo e(url('captcha')); ?>" alt="" style="float: right" onclick="this.src=`<?php echo e(url('captcha')); ?>?${Math.random()}`" />
                                </div>

                                <div class="checkbox">
                                    
                                    <label class="pull-right">
                                        <a href="#">忘記密碼?</a>
                                    </label>

                                </div>
                                <button id="Login" type="submit"
                                    class=" btn btn-primary btn-flat m-b-30 m-t-30">登錄</button>
                                
                                
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#captcha1").attr(
            "src",
            "<?php echo e(url('captcha')); ?>?" + Math.random()
        );
    </script>
    
</body>

</html>
<?php /**PATH E:\phpEnv\www\localhost\resources\views/individual/login.blade.php ENDPATH**/ ?>