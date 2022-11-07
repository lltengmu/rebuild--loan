<?php $__env->startSection('title'); ?>
    Management system
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>

    <!-- Daterange picker -->
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus//vendor/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus//vendor/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus//vendor/jquery-asColorPicker/css/asColorPicker.min.css" rel="stylesheet">
    <!-- Material color picker -->
    <link href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus//vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus//vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus//vendor/pickadate/themes/default.date.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>歡迎回來！</h4>
                        <span class="ml-1">用戶管理</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">用戶管理</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">用戶管理</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button type="button" style="margin-bottom: 30px;" onclick="addIndividual()"
                                    class="btn btn-rounded btn-outline-primary " id="addIndividual" data-toggle="modal"
                                    data-target="#exampleModalLong">創建賬號
                                </button>
                                <button type="button" style="margin-bottom: 30px;margin-left:10px;float: right;"
                                    class="btn btn-rounded btn-outline-primary " onclick="checkBoxAll()"
                                    id="ExportAllxls">匯出所有
                                </button>

                                <table id="mytable" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>編號</th>
                                            <th>名字</th>
                                            <th>姓名</th>
                                            <th>電郵</th>
                                            <th>電話</th>
                                            <th>國籍</th>
                                            <th>狀態</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="alertinfo" style="width:500px;position:fixed;top:80px;left:82%;z-index:999;display:none">
            <div id="alertinfo1" class="alert alert-success"><strong id="changeText1">成功!</strong>&nbsp;&nbsp;<span
                    id="changeText">修改成功.</span></div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="exampleModalLong">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">基本個人資料</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container mt-4">

                        <div class="card">
                            <div class="card-body">
                                
                                <form id="mxForm" class="form-valide" onsubmit="return func()" method="post">

                                    
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="exampleInputEmail1">稱謂</label><span style="color: red">*</span>
                                                <select id="lbo_appellation" name="lbo_appellation" class="form-control">
                                                    <option class="lbo_appellation0" value="0" selected>請選擇</option>
                                                    <?php $__currentLoopData = $lbo_appellation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option class="lbo_appellation<?php echo e($v->id); ?>"
                                                            value="<?php echo e($v->id); ?>">
                                                            <?php echo e($v->label_tc); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="first_name">姓氏</label><span style="color: red">*</span>
                                                <input type="text" id="firstname" name="first_name" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="last_name">名字</label><span style="color: red">*</span>
                                                <input type="text" id="lastname" name="last_name" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="mobile">電話號碼</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile" name="mobile" class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="email">電郵地址</label><span style="color: red">*</span>
                                                <input type="tel" id="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="nationality">國籍</label><span style="color: red">*</span>
                                                <input type="tel" id="nationality" name="nationality"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="date_of_birth">出生日期（日/月/年 輸入）</label><span
                                                    style="color: red">*</span>
                                                <input type="tel" id="date_of_birth" name="date_of_birth"
                                                    class="form-control mdate">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <label for="exampleInputEmail1">住宅地址</label><span style="color: red">*</span>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-2">
                                                <label for="unit">單位</label><span style="color: red">*</span>
                                                <input type="tel" id="unit" name="unit" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="floor">樓層</label><span style="color: red">*</span>
                                                <input type="tel" id="floor" name="floor" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="building">座數</label><span style="color: red">*</span>
                                                <input type="text" id="building" name="building" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-2">
                                                <label for="addres">地址</label><span style="color: red">*</span>
                                                <input type="text" id="addres" name="addres" class="form-control">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="mobile">地區</label><span style="color: red">*</span>
                                                <select id="lbo_district" name="lbo_district" class="form-control">
                                                    <option class="lbo_district0" value="0" selected>請選擇</option>

                                                    <?php $__currentLoopData = $lbo_district; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option class="lbo_district<?php echo e($v->id); ?>"
                                                            value="<?php echo e($v->id); ?>">
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
                                                <input type="tel" id="HKID" name="HKID" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <label for="exampleInputEmail1">就業資料</label><span style="color: red">*</span>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="mobile">職業</label><span style="color: red">*</span>
                                                <select class="form-control" id="lbo_employment">
                                                    <?php $__currentLoopData = $lbo_employment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option class="lbo_employment<?php echo e($v->id); ?>" value="<?php echo e($v->id); ?>"><?php echo e($v->label_tc); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="company_name">公司名稱</label><span style="color: red">*</span>
                                                <input type="tel" id="company_name" name="company_name"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="company_contact">公司電話</label><span style="color: red">*</span>
                                                <input type="tel" id="company_contact" name="company_contact"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <label for="company_addres">公司地址</label><span style="color: red">*</span>
                                            <input type="tel" id="company_addres" name="company_addres"
                                                class="form-control">
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                        <button id="EditOnclick" onclick="Editclient()" type="button"
                                            class="btn btn-primary">確認</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm-del" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">你確定要删除這個帳戶嗎？</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">請仔細選擇..</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-outline-secondary" id="deleOnclickCancel"
                        data-dismiss="modal">取消
                    </button>
                    <button type="button" class="btn btn-rounded btn-outline-primary" id="deleOnclick">確認
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(config('app.assets_path')); ?>/assets/js/jQuery3.6.0.js"></script>
    <script
        src="<?php echo e(config('app.assets_path')); ?>/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/js/jquery.dataTables.min.js">
    </script>

    <script>
        let mytable = $('#mytable').DataTable({
            "bLengthChange": true,
            "lengthMenu": [10, 20, 50, 100], //更改显示记录数选项 
            "DisplayLength": 10, //默认显示的记录数  
            "info": true,
            "paging": true,
            // "pageLength": 10,
            "autoWidth": true,
            "order": [
                [1, 'asc']
            ],
            "scrollX": false,
            // 垂直滚动条
            "scrollY": false,

            "ajax": {
                // url可以直接指定远程的json文件，或是MVC的请求地址 /Controller/Action
                url: "<?php echo e(url('Individuals/client')); ?>",
                type: 'GET',
                // 传给服务器的数据，可以添加我们自己的查询参数
                // data: function (paraam) {
                //     return a;
                // },
                //用于处理服务器端返回的数据。 dataSrc是DataTable特有的
                dataSrc: function(myJson) {
                    //console.log(myJson);
                    return myJson;
                }
            },

            "columns": [{
                    "data": "id"
                },
                {
                    "data": "first_name"
                },
                {
                    "data": "last_name"
                },
                {
                    "data": "email"
                },
                {
                    "data": "mobile"
                },
                {
                    "data": "nationality"
                },
                {
                    "data": "status",
                },
                {
                    "data": "",
                    "defaultContent": "",
                },

            ],
            columnDefs: [

                {
                    targets: [6],
                    render: function(data, type, row, meta) {
                        if (data) {
                            // console.log(row);
                            return '<select  value="" id="adminStatus' + row.id +
                                '" onchange="adminStatus(' + row.id + ',' + row.status +
                                ');"  class="form-control form-control-sm">' +
                                '<option value="1" ' + (String)(row.status == 1 ? "selected" : "") +
                                '>啓用</option>' +
                                '<option value="0" ' + (String)(row.status == 0 ? "selected" : "") +
                                '>禁用</option>' +
                                '</select>';
                        }
                        return data;
                    },

                },
                {
                    targets: [7],
                    render: function(data, type, row, meta) {
                        if (type === 'display') {
                            // console.log(row);
                            return '<div><button id="export" type="button" style="margin-right: 15px;" onclick="checkBox(' +
                                row.id +
                                ')" class="btn btn-rounded btn-outline-primary">匯出xlsx</button>' +
                                '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="individualEdit(' +
                                row.id +
                                ');" type="button"  data-toggle="modal" data-target="#exampleModalLong">個人資料</button>' +


                                '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="individualEdit1(' +
                                row.id +
                                ');" type="button"  data-toggle="modal" data-target="#exampleModalLong">查看</button>' +

                                '<button id="deleteclient" style="margin-right: 15px;" vid="' + row.id +
                                '" class="btn btn-rounded btn-outline-danger " onclick="individualDelete(' +
                                row.id +
                                ');" data-toggle="modal" data-target=".bd-example-modal-sm-del" type="button">刪除</button></div>';

                        }
                        return data;
                    },

                },

            ],
        });

        function checkBox(checkbox) {
            //选择被选中的checkbox
            // var checkbox = "";

            // $.each($('input:checkbox:checked'), function() {
            //     checkbox += ($(this).val()) + '&';
            // });
            // if (checkbox.length == 0) {
            //     console.log('空');
            //     return false;
            // }
            window.location.href = "<?php echo e(url('individual/clientExcel')); ?>/" + checkbox;
        };

        function showText() {
            $("#alertinfo").fadeIn(2000);
            setTimeout(function() {
                $("#alertinfo").fadeOut(2000)
            }, 3000)
        }

        function addIndividual() {
            $('#mxForm input').val("");
            $('#HKID').removeAttr('vid');
            $('#lbo_district').find("option").removeAttr('selected');
            $('#lbo_district0').attr('selected', 'selected');
            $('#lbo_appellation').find("option").removeAttr('selected');
            $('#lbo_appellation0').attr('selected', 'selected');
        }

        function Editclient() {
            if ($('#firstname').val() == "") {
                $('.firstname-error').remove();
                $('#firstname').addClass('error');
                $('#firstname').parent('div').append(
                    '<div class="firstname-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#firstname").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.firstname-error').remove();
            }
            if ($('#lastname').val() == "") {
                $('.lastname-error').remove();
                $('#lastname').addClass('error');
                $('#lastname').parent('div').append(
                    '<div class="lastname-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#lastname").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.lastname-error').remove();
            }
            if ($('#mobile').val() == "") {
                $('.mobile-error').remove();
                $('#mobile').addClass('error');
                $('#mobile').parent('div').append(
                    '<div class="mobile-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#mobile").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.mobile-error').remove();
            }
            if ($('#lbo_district').val() == "0") {
                $('.lbo_district-error').remove();
                $('#lbo_district').addClass('error');
                $('#lbo_district').parent('div').append(
                    '<div class="lbo_district-error" class="error" style="color:red" for="newpwd" style="">請選擇</div>');
                var t = $("#lbo_district").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.lbo_district-error').remove();
            }
            if ($('#lbo_appellation').val() == "0") {
                $('.lbo_appellation-error').remove();
                $('#lbo_appellation').addClass('error');
                $('#lbo_appellation').parent('div').append(
                    '<div class="lbo_appellation-error" class="error" style="color:red" for="newpwd" style="">請選擇</div>'
                );
                var t = $("#lbo_appellation").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.lbo_appellation-error').remove();
            }
            if ($('#email').val() == "") {
                $('.email-error').remove();
                $('#email').addClass('error');
                $('#email').parent('div').append(
                    '<div class="email-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#email").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.email-error').remove();
            }
            if ($('#nationality').val() == "") {
                $('.nationality-error').remove();
                $('#nationality').addClass('error');
                $('#nationality').parent('div').append(
                    '<div class="nationality-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#nationality").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.nationality-error').remove();
            }
            if ($('#date_of_birth').val() == "") {
                $('.date_of_birth-error').remove();
                $('#date_of_birth').addClass('error');
                $('#date_of_birth').parent('div').append(
                    '<div class="date_of_birth-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#date_of_birth").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.date_of_birth-error').remove();
            }
            if ($('#unit').val() == "") {
                $('.unit-error').remove();
                $('#unit').addClass('error');
                $('#unit').parent('div').append(
                    '<div class="unit-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#unit").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.unit-error').remove();
            }
            if ($('#floor').val() == "") {
                $('.floor-error').remove();
                $('#floor').addClass('error');
                $('#floor').parent('div').append(
                    '<div class="floor-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#floor").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.floor-error').remove();
            }
            if ($('#HKID').val() == "") {
                $('.HKID-error').remove();
                $('#HKID').addClass('error');
                $('#HKID').parent('div').append(
                    '<div class="HKID-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#HKID").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.HKID-error').remove();
            }
            if ($('#company_id').val() == "0") {
                $('.company_id-error').remove();
                $('#company_id').addClass('error');
                $('#company_id').parent('div').append(
                    '<div class="company_id-error" class="error" style="color:red" for="newpwd" style="">請選擇</div>');
                var t = $("#company_id").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.company_id-error').remove();
            }
            if ($('#company_name').val() == "") {
                $('.company_name-error').remove();
                $('#company_name').addClass('error');
                $('#company_name').parent('div').append(
                    '<div class="company_name-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#company_name").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.company_name-error').remove();
            }
            if ($('#company_contact').val() == "") {
                $('.company_contact-error').remove();
                $('#company_contact').addClass('error');
                $('#company_contact').parent('div').append(
                    '<div class="company_contact-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>'
                );
                var t = $("#company_contact").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.company_contact-error').remove();
            }
            if ($('#company_addres').val() == "") {
                $('.company_addres-error').remove();
                $('#company_addres').addClass('error');
                $('#company_addres').parent('div').append(
                    '<div class="company_addres-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#company_addres").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.company_addres-error').remove();
            }
            if ($('#loan_amount').val() == "") {
                $('.loan_amount-error').remove();
                $('#loan_amount').addClass('error');
                $('#loan_amount').parent('div').append(
                    '<div class="loan_amount-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#loan_amount").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.loan_amount-error').remove();
            }
            if ($('#repayment_period').val() == "") {
                $('.repayment_period-error').remove();
                $('#repayment_period').addClass('error');
                $('#repayment_period').parent('div').append(
                    '<div class="repayment_period-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>'
                );
                var t = $("#repayment_period").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.repayment_period-error').remove();
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
            var id = $('#HKID').attr('vid')
            // console.log(json1);
            var obj = {
                type: 'PUT',
                url: "<?php echo e(url('Individuals/client')); ?>/" + id,
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
                        mytable.ajax.reload();

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
                    $('#changeText').html('請聯係管理!');
                    $('#changeText1').html('錯誤!');
                    $('#alertinfo1').attr('class', 'alert alert-danger')
                    showText();
                }
            };
            if (
                $('#firstname').val() !== "" &&
                $('#lastname').val() !== ""
                // && $('#mobile').val() !== "" 
                &&
                $('#lbo_district').val() !== "0" &&
                $('#lbo_appellation').val() !== "0" &&
                $('#email').val() !== "" &&
                $('#nationality').val() !== "" &&
                $('#date_of_birth').val() !== "" &&
                $('#unit').val() !== "" &&
                $('#floor').val() !== "" &&
                $('#HKID').val() !== "" &&
                $('#company_name').val() !== "" &&
                $('#company_contact').val() !== "" &&
                $('#company_addres').val() !== ""
            ) {
                $('#EditOnclick').attr('data-dismiss', 'modal');
                $.ajax(obj);
            }
        }

        function individualEdit1(id) {
            $('#HKID').attr('vid', id)
            $('#mxForm input').prop("disabled", false);
            $('#mxForm input').css("background", 'white');
            $('#EditOnclick').show();
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('Individuals/client')); ?>/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                dataType: "json",
                success: function(data) {
                     console.log(data[0]);
                    data = data[0];
                    $('#show_email').val(data.email);
                    $('#firstname').val(data.first_name);
                    $('#lastname').val(data.last_name);
                    $('#mobile').val(data.mobile);
                    $('#contact').val(data.contact);
                    $('#email').val(data.email);
                    $('#nationality').val(data.nationality);
                    $('#date_of_birth').val(data.date_of_birth);
                    $('#unit').val(data.unit);
                    $('#addres').val(data.address1);
                    $('#HKID').val(data.HKID);
                    $('#floor').val(data.floor);
                    $('#building').val(data.building);
                    $('#company_name').val(data.company_name);
                    $('#lbo_district').find("option").removeAttr('selected');
                    $('.lbo_district' + data.area).attr('selected', 'selected')
                    $('#lbo_appellation').find("option").removeAttr('selected');
                    $('.lbo_appellation' + data.appellation).attr('selected', 'selected')
                    $('#company_contact').val(data.company_contact);
                    $('#company_addres').val(data.company_addres);
                    document.querySelector(`.lbo_employment${data.job_status}`).setAttribute('selected','selected')
                    // $('#email').attr('readonly', 'readonly');
                    // $('#email').css('background', 'rgba(248,249,254)');
                    return false;
                },
                error: function() {
                    alert('调用接口出错了');
                }
            });
        }

        function individualEdit(id) {
            $('#mxForm input').prop("disabled", true);
            $('#mxForm input').css("background", 'rgba(248,249,254)');
            $('#EditOnclick').hide();
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('Individuals/client')); ?>/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                dataType: "json",
                success: function(data) {
                    console.log(data[0]);
                    data = data[0];
                    $('#show_email').val(data.email);
                    $('#firstname').val(data.first_name);
                    $('#lastname').val(data.last_name);
                    $('#mobile').val(data.mobile);
                    $('#contact').val(data.contact);
                    $('#email').val(data.email);
                    $('#nationality').val(data.nationality);
                    $('#date_of_birth').val(data.date_of_birth);
                    $('#unit').val(data.unit);
                    $('#addres').val(data.addres);
                    $('#HKID').val(data.HKID);
                    $('#floor').val(data.floor);
                    $('#company_name').val(data.company_name);
                    $('#company_contact').val(data.company_contact);
                    $('#company_addres').val(data.company_addres);
                    // $('#email').attr('readonly', 'readonly');
                    // $('#email').css('background', 'rgba(248,249,254)');
                    return false;
                },
                error: function() {
                    alert('调用接口出错了');
                }
            });

        }
        $('#deleOnclick').click(function() {
            var id = $('#deleteclient').attr('vid');
            $('#deleOnclick').attr('data-dismiss', 'modal');
            $.post("<?php echo e(url('Individuals/client')); ?>/" + id, {
                "_method": "delete",
                "_token": "<?php echo e(csrf_token()); ?>"
            }, function(data) {
                console.log(data);
                if (data.status == 1) {
                    $('#changeText').html(data.message);
                    $('#changeText1').html('成功!');
                    $('#alertinfo1').attr('class', 'alert alert-success')
                    showText();
                    mytable.ajax.reload();
                } else {
                    $('#changeText').html(data.message);
                    $('#changeText1').html('錯誤!');
                    $('#alertinfo1').attr('class', 'alert alert-danger')
                    showText();
                }
            })
        })


        function checkBoxAll() {
            $.ajax({
                type: "get",
                url: "<?php echo e(url('individual/getAllid')); ?>/" + 2,
                success: function(data) {
                    let checkbox = data.join("&");
                    // console.log(checkBox);
                    window.location.href = "<?php echo e(url('individual/clientExcel')); ?>/" + checkbox;
                },
            });


        }
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
        
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/fullygreatasia.admatrix-ai.com/public_html/laravel3/resources/views/individual/clientlist.blade.php ENDPATH**/ ?>