<!DOCTYPE html>
<html>

<head>
    <title>貸款申請</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    
    
    
    <link rel="stylesheet" href="<?php echo e(config('app.assets_path')); ?>/assets/bootstrap-4.6.1-dist/css/bootstrap.min.css">

    
    <!-- Daterange picker -->
    <link
        href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-daterangepicker/daterangepicker.css"
        rel="stylesheet">
    <!-- Clockpicker -->
    <link
        href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/clockpicker/css/bootstrap-clockpicker.min.css"
        rel="stylesheet">
    <!-- asColorpicker -->
    <link
        href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asColorPicker/css/asColorPicker.min.css"
        rel="stylesheet">
    <!-- Material color picker -->
    <link
        href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet"
        href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/themes/default.css">
    <link rel="stylesheet"
        href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/themes/default.date.css">
    <!-- animati.css -->
    <link rel="stylesheet" href="<?php echo e(config('app.assets_path')); ?>/assets/animate.css/animate.css">


    
</head>
<script src="<?php echo e(config('app.assets_path')); ?>/assets/js/jQuery3.6.0.js"></script>
<script src="<?php echo e(config('app.assets_path')); ?>/assets/bootstrap-4.6.1-dist/js/bootstrap.bundle.min.js"></script>
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

<body>
    <div class="container mt-4">
        <div id="alertinfo" style="width:500px;position:fixed;top:0px;left:82%;z-index:999;display:none">
            <div id="alertinfo1" class="alert alert-success"><strong id="changeText1">成功!</strong>&nbsp;&nbsp;<span
                    id="changeText">修改成功.</span></div>
        </div>
        <div class="alert alert-success">

        </div>

        <div class="card">

            <div class="card-body">
                <div id='error'>
                </div>
                <form id="mxForm" class="form-valide">


                    <label for="exampleInputEmail1">基本個人資料</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="exampleInputEmail1">稱謂</label><span style="color: red">*</span>
                                <select id="lbo_appellation" name="lbo_appellation" class="form-control" validate>
                                    <option class="lbo_appellation0" value="0" selected>請選擇</option>
                                    <?php $__currentLoopData = $lbo_appellation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option class="lbo_appellation<?php echo e($v->id); ?>"
                                            value="<?php echo e($v->id); ?>">
                                            <?php echo e($v->label_tc); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="firs_tname">姓氏</label><span style="color: red">*</span>
                                <input type="text" id="firstname" name="first_name" class="form-control" validate>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="last_name">名字</label><span style="color: red">*</span>
                                <input type="text" id="lastname" name="last_name" class="form-control" validate>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="mobile">電話號碼</label><span style="color: red">*</span>
                                <input type="tel" id="mobile" name="mobile" class="form-control" validate>
                            </div>
                            <div class="col">
                                <label for="email">電郵地址</label><span style="color: red">*</span>
                                <input type="tel" id="email" name="email" class="form-control" validate>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="nationality">國籍</label><span style="color: red">*</span>
                                <input type="tel" id="nationality" name="nationality" class="form-control" validate>
                            </div>
                            <div class="col">
                                <label for="date_of_birth">出生日期（日/月/年 輸入）</label><span style="color: red">*</span>
                                <input type="tel" id="date_of_birth" name="date_of_birth" class="form-control mdate" validate>
                            </div>
                        </div>
                    </div>
                    <br>
                    <label for="exampleInputEmail1">住宅地址</label><span style="color: red">*</span>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="unit">單位</label><span style="color: red">*</span>
                                <input type="tel" id="unit" name="unit" class="form-control" validate>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="floor">樓層</label><span style="color: red">*</span>
                                <input type="tel" id="floor" name="floor" class="form-control" validate>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="mobile4">座數</label><span style="color: red">*</span>
                                <input type="tel" id="building" name="building" class="form-control" validate>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="mobile">地址第一行</label><span style="color: red">*</span>
                                <input type="tel" id="address1" name="address1" class="form-control" validate>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="mobile">地址第二行</label><span style="color: red">*</span>
                                <input type="tel" id="address2" name="address2" class="form-control" validate>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="mobile">地區</label><span style="color: red">*</span>
                                <select id="lbo_district" name="lbo_district" class="form-control" validate>
                                    <option class="lbo_district0" value="0" selected>請選擇</option>

                                    <?php $__currentLoopData = $lbo_district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option class="lbo_district<?php echo e($v->id); ?>" value="<?php echo e($v->id); ?>">
                                            <?php echo e($v->label_tc); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="HKID">身分證明</label><span style="color: red">*</span>
                                <input type="tel" id="HKID" name="HKID" class="form-control" value="" validate>
                            </div>
                            <div class="col-md-4 mb-2" style='display: none'>
                                <label for="service_provider">服務提供商</label><span style="color: red">*</span>
                                <input id="company_id" name="company_id" class="form-control" value="0" validate />
                            </div>
                        </div>
                    </div>

                    <br>
                    <label for="exampleInputEmail1">就業資料</label><span style="color: red">*</span>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="mobile">職業</label><span style="color: red">*</span>
                                <select id="lbo_employment" name="lbo_employment" class="form-control" validate>
                                    <option class="lbo_employment" value="0" selected>請選擇</option>

                                    <?php $__currentLoopData = $lbo_employment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option class="lbo_employment<?php echo e($v->id); ?>"
                                            value="<?php echo e($v->id); ?>">
                                            <?php echo e($v->label_tc); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="mobile">HK$每月收入</label><span style="color: red">*</span>
                                <input type="tel" id="mobile1" name="mobile1" class="form-control" validate>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="company_name">公司名稱</label><span style="color: red">*</span>
                                <input type="tel" id="company_name" name="company_name" class="form-control" validate>
                            </div>
                            <div class="col">
                                <label for="company_contact">公司電話</label><span style="color: red">*</span>
                                <input type="tel" id="company_contact" name="company_contact" class="form-control" validate>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="company_addres">公司地址</label><span style="color: red">*</span>
                            <input type="tel" id="company_addres" name="company_addres" class="form-control" validate>
                        </div>
                    </div>

                    <br>
                    <label for="exampleInputEmail1">貸款資料</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="loan_amount">欲申請之貸款額</label><span style="color: red">*</span>
                                <input type="tel" id="loan_amount" name="loan_amount" class="form-control" validate>
                            </div>
                            <div class="col">
                                <label for="repayment_period">還款期</label><span style="color: red">*</span>
                                <input type="tel" id="repayment_period" name="repayment_period"
                                    pattern="/^(\d{4}-\d{1,2}-\d{1,2})(\s?\d{2}:\d{2}:\d{2})?$/" class="form-control" validate>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="mobile">貸款用途</label><span style="color: red">*</span>
                            <select id="lbo_loan_purpose" name="lbo_loan_purpose" class="form-control" validate>
                                <option class="lbo_loan_purpose" value="0" selected>請選擇</option>

                                <?php $__currentLoopData = $lbo_loan_purpose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="lbo_loan_purpose<?php echo e($v->id); ?>" value="<?php echo e($v->id); ?>">
                                        <?php echo e($v->label_tc); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row ml-3">
                            <input class="form-check-input" id="agree" type="checkbox">
                            <label for="exampleInputEmail1">同意xxxxxx</label>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                        <button id="EditOnclick" type="submit" class="btn btn-primary">保存</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function showText() {
            $("#alertinfo").fadeIn(2000);
            setTimeout(function() {
                $("#alertinfo").fadeOut(2000);
                window.location.replace("<?php echo e(url('clients/login')); ?>");
            }, 3000)
        }

        function func() {
            return false;
        }

    </script>
    <script type="module">
        import FormValidate from "<?php echo e(config('app.assets_path')); ?>/assets/js/module/FormValidate.js";
        new FormValidate('#mxForm')
        document.querySelector('#EditOnclick').addEventListener('click',function(e){
            console.log(1);
            
            if (!$('#agree').is(':checked')) {
                alert('未同意');
            }
            $.extend({
                /* 解析为JSON */
                "parseJSON": function(str) {
                    var strArr = str.split("&");
                    var searchJSON = {};
                    $.each(strArr, function(index, item) {
                        var item = item.split("=");
                        searchJSON[item[0]] = decodeURIComponent(item[1]);
                    });
                    return searchJSON;
                }
            });
            var a = $("#mxForm").serialize();
            var json1 = $.parseJSON(a);
            console.log(json1);
            var obj = {
                type: 'PUT',
                url: "<?php echo e(url('case')); ?>/" + undefined,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    json1,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 1) {
                        $('#changeText').html(data.message);
                        $('#changeText1').html('成功!');
                        $('#alertinfo1').attr('class', 'alert alert-success')
                        showText();
                    } else if (data.status == 3) {
                        $('#changeText').html(data.message);
                        $('#changeText1').html('注意!');
                        $('#alertinfo1').attr('class', 'alert alert-warning')
                        showText();
                    } else {
                        $('#changeText').html(data.message);
                        $('#changeText1').html('錯誤!');
                        $('#alertinfo1').attr('class', 'alert alert-danger')
                        showText();
                    }
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }

            if (
                $('#firstname').val() !== "" &&
                $('#lastname').val() !== ""
                // && $('#mobile').val() !== "" 
                &&
                $('#email').val() !== "" &&
                $('#nationality').val() !== "" &&
                $('#date_of_birth').val() !== "" &&
                $('#unit').val() !== "" &&
                $('#floor').val() !== "" &&
                $('#agree').is(':checked') &&
                $('#HKID').val() !== "" &&
                $('#lbo_district').val() !== "0" &&
                $('#lbo_loan_purpose').val() !== "0" &&
                $('#lbo_appellation').val() !== "0" &&
                $('#lbo_employment').val() !== "0" &&
                $('#company_name').val() !== "" &&
                $('#company_contact').val() !== "" &&
                $('#company_addres').val() !== "" &&
                $('#loan_amount').val() !== "" &&
                $('#repayment_period').val() !== ""
            ) {
                $('#EditOnclick').attr('data-dismiss', 'modal');
                $.ajax(obj);

            }
        })
    </script>
    
    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/moment/moment.min.js">
    </script>
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-daterangepicker/daterangepicker.js">
    </script>
    <!-- clockpicker -->
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/clockpicker/js/bootstrap-clockpicker.min.js">
    </script>
    <!-- asColorPicker -->
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asColor/jquery-asColor.min.js">
    </script>
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asGradient/jquery-asGradient.min.js">
    </script>
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js">
    </script>
    <!-- Material color picker -->
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>
    <!-- pickdate -->
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/picker.js">
    </script>
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/picker.time.js">
    </script>
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/pickadate/picker.date.js">
    </script>


    <!-- Daterangepicker -->
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/bs-daterange-picker-init.js">
    </script>
    <!-- Clockpicker init -->
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/clock-picker-init.js">
    </script>
    <!-- asColorPicker init -->
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/jquery-asColorPicker.init.js">
    </script>
    <!-- Material color picker init -->
    
    <!-- Pickdate -->
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/pickadate-init.js">
    </script>

    <script src="<?php echo e(config('app.assets_path')); ?>/assets/js/timePicker.js"></script>
</body>

</html>
<?php /**PATH E:\phpEnv\www\localhost\resources\views/form.blade.php ENDPATH**/ ?>