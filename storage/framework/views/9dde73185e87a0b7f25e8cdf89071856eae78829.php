

<?php $__env->startSection('title'); ?>
    Management system
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    
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
    <link rel="stylesheet" href="<?php echo e(config('app.assets_path')); ?>/assets/animate.css/animate.css">
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
                            <h4 class="card-title">CASE</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button type="button" style="margin-bottom: 30px;" onclick="addIndividual()"
                                    class="btn btn-rounded btn-outline-primary " id="addIndividual" data-toggle="modal"
                                    data-target="#exampleModalLong-createCase">創建貸款
                                </button>


                                <form action="<?php echo e(url('individual/individualcaseImport')); ?>" method="POST"
                                    enctype="multipart/form-data" style="display:inline">
                                    <?php echo csrf_field(); ?>
                                    <input type="file" name="file" id="Import" style="display: none">
                                    <button type="button" style="margin-bottom: 30px;margin-left:10px" s
                                        class="btn btn-rounded btn-outline-primary " id="Importxls">匯入Excel
                                    </button>
                                    <button id="excelImport" type="submit" style="display: none">確認</button>
                                </form>
                                <button type="button" style="margin-bottom: 30px;margin-left:10px;float: right;"
                                    class="btn btn-rounded btn-outline-primary " onclick="checkBoxAll()"
                                    id="ExportAllxls">匯出所有
                                </button>
                                <table id="casetable" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>編號</th>
                                            <th>名字</th>
                                            <th>姓名</th>
                                            <th>貸款額度</th>
                                            <th>貸款公司</th>
                                            <th>還款期</th>
                                            <th>付款日期</th>
                                            <th>狀態</th>
                                            <th>操作</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>

                                </table>
                                <table id="tablelist" class="table table-striped table-bordered table-hover"></table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="alertinfo" style="width:500px;position:fixed;top:80px;left:82%;z-index:999;display:none">
            <div id="alertinfo1" class="alert alert-success">
                <strong id="changeText1">成功!</strong>&nbsp;&nbsp;<span id="changeText">修改成功.</span>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">已上傳的文件</h5>

                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="basic-list-group">
                        <ul id="getfile" class="list-group">
                        </ul>
                    </div>
                    
                </div>;
            </div>
            
        </div>
    </div>
    <?php echo $__env->make('common.viewCaseDeatailForm', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="modal fade bd-example-modal-lg" id="exampleModalLong-createCase">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">編輯</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container mt-4">

                        <div class="card">

                            <div class="card-body">
                                <div id="selectHKID" class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-10 mb-3">
                                            <label for="HKID">HKID</label><span style="color: red">*</span>
                                            <input type="tel" id="IsHKID" name="HKID" class="form-control">

                                        </div>
                                        <div class="col-md-2" style="margin-top: 28.75px">
                                            <button style="padding-left:35px;padding-right:35px;" type="button" class="btn btn-secondary">查詢</button>
                                        </div>
                                    </div>
                                </div>
                                <form style="display: none" id="mxForm-createCase" class="form-valide" onsubmit="return func()" method="post">

                                    <label for="exampleInputEmail1">基本個人資料</label>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="exampleInputEmail1">稱謂</label><span
                                                    style="color: red">*</span>
                                                <select id="lbo_appellation" name="lbo_appellation" class="form-control" validate>
                                                    <option class="lbo_appellation0" value="0" selected>請選擇</option>
                                                    <?php $__currentLoopData = $lbo_appellation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option class="lbo_appellation<?php echo e($v->id); ?>" value="<?php echo e($v->id); ?>">
                                                            <?php echo e($v->label_tc); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="firs_tname">姓氏</label><span style="color: red">*</span>
                                                <input type="text" id="firstname" name="first_name" validate class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="last_name">名字</label><span style="color: red">*</span>
                                                <input type="text" id="lastname" name="last_name" validate class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="mobile">電話號碼</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile" name="mobile" validate class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="email">電郵地址</label><span style="color: red">*</span>
                                                <input type="tel" id="email" name="email" validate class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="nationality">國籍</label><span style="color: red">*</span>
                                                <input type="tel" id="nationality" name="nationality" validate class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="date_of_birth">出生日期（日/月/年 輸入）</label><span
                                                    style="color: red">*</span>
                                                <input type="tel" id="date_of_birth" name="date_of_birth" validate class="form-control mdate" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <label for="exampleInputEmail1">住宅地址</label><span style="color: red">*</span>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-2">
                                                <label for="unit">單位</label><span style="color: red">*</span>
                                                <input type="tel" id="unit" name="unit" validate class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="floor">樓層</label><span style="color: red">*</span>
                                                <input type="tel" id="floor" name="floor" validate class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile4">座數</label><span style="color: red">*</span>
                                                <input type="tel" id="building" name="building" validate class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地址第一行</label><span style="color: red">*</span>
                                                <input type="tel" id="address1" name="address1" validate class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地址第二行</label><span style="color: red">*</span>
                                                <input type="tel" id="address2" name="address2" validate class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地區</label><span style="color: red">*</span>
                                                <select id="lbo_district" name="lbo_district" class="form-control" validate>
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
                                                <input type="tel" id="HKID" name="HKID" class="form-control" value="" style="background-color:rgba(248,249,254);" readonly>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="service_provider">服務提供商</label><span
                                                    style="color: red">*</span>
                                                <select id="company_id" name="company_id" class="form-control" validate>
                                                    <option id="splist0" value="0" selected>請選擇</option>

                                                    <?php $__currentLoopData = $splist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option id="splist<?php echo e($v->company_id); ?>"
                                                            value="<?php echo e($v->company_id); ?>">
                                                            <?php echo e($v->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
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
                                                <input type="tel" id="mobile1" name="mobile1" validate class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="company_name">公司名稱</label><span style="color: red">*</span>
                                                <input type="tel" id="company_name" name="company_name" validate class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="company_contact">公司電話</label><span style="color: red">*</span>
                                                <input type="tel" id="company_contact" name="company_contact" validate class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <label for="company_addres">公司地址</label><span style="color: red">*</span>
                                            <input type="tel" id="company_addres" name="company_addres" validate class="form-control">
                                        </div>
                                    </div>

                                    <br>
                                    <label for="exampleInputEmail1">貸款資料</label>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="loan_amount">欲申請之貸款額</label><span style="color: red">*</span>
                                                <input type="tel" id="loan_amount" name="loan_amount" validate class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="repayment_period">還款期</label><span style="color: red">*</span>
                                                <input type="tel" id="repayment_period" name="repayment_period"
                                                    validate
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <label for="mobile">貸款用途</label><span style="color: red">*</span>
                                            <select id="lbo_loan_purpose" name="lbo_loan_purpose" class="form-control" validate>
                                                <option class="lbo_loan_purpose" value="0">請選擇</option>

                                                <?php $__currentLoopData = $lbo_loan_purpose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option class="lbo_loan_purpose<?php echo e($v->id); ?>"
                                                        value="<?php echo e($v->id); ?>">
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
                                        <button id="EditOnclick-createCase" type="submit" class="btn btn-primary">保存</button>
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
        let casetable = $('#casetable').DataTable({
            "bLengthChange": true,
            "lengthMenu": [10, 20, 50, 100], //更改显示记录数选项 
            "DisplayLength": 10, //默认显示的记录数  
            "info": true,
            "paging": true,
            "order": [
                [9, 'desc']
            ],
            // "pageLength": 10,
            "autoWidth": true,
            "scrollX": false,
            // 垂直滚动条
            "scrollY": false,

            "ajax": {
                // url可以直接指定远程的json文件，或是MVC的请求地址 /Controller/Action
                url: "<?php echo e(url('case')); ?>",
                type: 'GET',
                // 传给服务器的数据，可以添加我们自己的查询参数
                // data: function (paraam) {
                //     return a;
                // },
                //用于处理服务器端返回的数据。 dataSrc是DataTable特有的
                dataSrc: function(myJson) {
                    // console.log(myJson);
                    myJson = myJson.filter(item => {
                        return item.case_status <= 2 || item.case_status == 5;
                    })
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
                    "data": "loan_amount"
                },
                {
                    "data": "name",
                    "defaultContent": "",
                },
                {
                    "data": "repayment_period"
                },
                {
                    "data": "date_of_pay"
                },
                {
                    "data": "label_tc"
                },
                {
                    "data": "",
                    "defaultContent": "",
                },
                {
                    "data": "update_datetime",
                    "defaultContent": "",
                    "visible": false,
                }

            ],
            columnDefs: [{
                    targets: [4],
                    render: function(data, type, row, meta) {
                        if (row.service_provider == 0) {
                            // console.log(row);
                            return '<div>未選擇服務提供商</div>';
                        } else {
                            return '<div>' + row.name + '</div>';
                        }
                        return data;
                    },

                }, {
                    targets: [7],
                    render: function(data, type, row, meta) {
                        if (row.case_status == 5) {
                            return '<div style="color:red">申請失敗，請重新選擇服務提供商</div>';
                        } else {
                            return '<select  value="" id="individualStatus' + row.id +
                                '" onchange="SpSubmit(' + row.id +
                                ');"  class="form-control form-control-sm">' +
                                '<option value="1" ' + (String)(row.label_tc == '提交' ? "selected" : "") +
                                '>提交</option>' +
                                '<option value="2" ' + (String)(row.label_tc == '轉交到服務提供者' ? "selected" :
                                    "") +
                                '>轉交到服務提供者</option>' +
                                // '<option value="3" ' + (String)(row.label_tc == '服務提供者同意' ? "selected" :
                                //     "") +
                                // '>服務提供者同意</option>' +
                                // '<option value="4" ' + (String)(row.label_tc == '申請成功' ? "selected" : "") +
                                // '>申請成功</option>' +
                                '<option value="5" ' + (String)(row.label_tc == '申請失敗' ? "selected" : "") +
                                '>申請失敗</option>' +
                                '</select>';
                        }
                        return data;
                    },

                },

                {
                    targets: [8],
                    render: function(data, type, row, meta) {
                        if (type === 'display') {
                            // console.log(row);
                            return '<div><button id="export" type="button" style="margin-right: 15px;" onclick="checkBox(' +
                                row.id +
                                ')" class="btn btn-rounded btn-outline-primary">匯出xlsx</button>' +
                                '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="ExportFile(' +
                                row.id +
                                ');" type="button" data-toggle="modal" data-target="#exampleModalCenter">文件查看</button>' +
                                ' <button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="CaseEdit(' +
                                row.id +
                                ');" type="button"  data-toggle="modal" data-target="#exampleModalLong">查看</button>' +
                                '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-danger " onclick="caseDelete(' +
                                row.id +
                                ');" data-toggle="modal" data-target=".bd-example-modal-sm-del" type="button">刪除</button></div>';
                        }
                        return data;
                    },
                },
            ],
        });

        function ExportFile(id) {
            $.ajax({
                type: "get",
                url: "<?php echo e(url('sp/getFileUrl')); ?>/" + id,
                success: function(data) {

                    // console.log(data);
                    $('#getfile').html('');
                    if (data == '未上傳文件') {
                        $('#getfile').append('<li class="list-group-item">' + data + '</li>');
                        return false;
                    }
                    for (var i = 0; i < data.length; i++) {
                        let fileName = data[i].upload_file.split('/');
                        $('#getfile').append('<a href="<?php echo e(config('app.assets_path')); ?>/' + data[i]
                            .upload_file + '"><li class="list-group-item">' + fileName[4] + '/' + fileName[
                                5] +
                            '</li></a>');
                    }
                    // if (!data) {
                    //     alert('此用戶未上傳文件');
                    // } else {
                    // window.location.href = "<?php echo e(config('app.assets_path')); ?>/" + data;
                    // }
                },
            });
        }

        $("#Importxls").click(function() {
            $('#Import').click();
        });

        $('#Import').change(function() {
            $('#excelImport').click()
        })


        function checkBox(id) {
            var obj = {
                type: 'get',
                url: "<?php echo e(url('individual/exportLog')); ?>/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data) {
                        window.location.href = "<?php echo e(url('individual/caseExcel')); ?>/" + id;
                    }
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }
            $.ajax(obj)
        };



        function checkBoxAll() {
            $.ajax({
                type: "get",
                url: "<?php echo e(url('individual/getAllid')); ?>/" + undefined,
                success: function(data) {
                    let checkbox = data.join("&");
                    // console.log(checkBox);
                    window.location.href = "<?php echo e(url('individual/caseExcel')); ?>/" + checkbox;
                },
            });
        }




        function showText() {
            $("#alertinfo").fadeIn(2000);
            setTimeout(function() {
                $("#alertinfo").fadeOut(2000)
            }, 3000)
        }



        function addIndividual() {
            $('#selectHKID').show();
            $('#mxForm').hide();
            $('#mxForm input').val("");
            $('.IsHKID-error').remove();
            $('#HKID').removeAttr('vid');
            $('#company_id').find("option").removeAttr('selected');
            $('#splist0').attr('selected', 'selected');
            $('#lbo_district').find("option").removeAttr('selected');
            $('#lbo_district0').attr('selected', 'selected');
            $('#lbo_loan_purpose').find("option").removeAttr('selected');
            $('#lbo_loan_purpose0').attr('selected', 'selected');
            $('#lbo_appellation').find("option").removeAttr('selected');
            $('#lbo_appellation0').attr('selected', 'selected');
            $('#lbo_employment').find("option").removeAttr('selected');
            $('#lbo_employment0').attr('selected', 'selected');

        }

        function SpSubmit(id) {
            var sta = '#individualStatus' + id + ' option:selected';
            var status = $(sta).val();
            var obj = {
                type: 'POST',
                url: "<?php echo e(url('case')); ?>",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    id,
                    status,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                // dataType: "json",
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
                    casetable.ajax.reload();

                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }
            $.ajax(obj)
        }

        
         //個人信息表單提交處理函數
         document.querySelector('#EditOnclick').addEventListener('click', function(e){
            e.preventDefault();
            let checkbox = document.querySelector(`input[class="form-check-input"]`)
            if (!checkbox.checked) {
                alert('未同意');
                return false;
            }
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
            if ($('#lbo_loan_purpose').val() == "0") {
                $('.lbo_loan_purpose-error').remove();
                $('#lbo_loan_purpose').addClass('error');
                $('#lbo_loan_purpose').parent('div').append(
                    '<div class="lbo_loan_purpose-error" class="error" style="color:red" for="newpwd" style="">請選擇</div>'
                );
                var t = $("#lbo_loan_purpose").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.lbo_loan_purpose-error').remove();
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
            if ($('#lbo_employment').val() == "0") {
                $('.lbo_employment-error').remove();
                $('#lbo_employment').addClass('error');
                $('#lbo_employment').parent('div').append(
                    '<div class="lbo_employment-error" class="error" style="color:red" for="newpwd" style="">請選擇</div>'
                );
                var t = $("#lbo_employment").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.lbo_employment-error').remove();
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
            let data = {
                'loan_amount':document.querySelector(`input[name="loan_amount"]`).value,
                'repayment_period':document.querySelector(`input[name="repayment_period"]`).value,
                'case_remark':document.querySelector(`textarea[name="case_remark"]`).value,
                'service_provider':Array.from(document.querySelectorAll(`#company > option`)).filter(item => { if(item.selected)return item })[0].value,
                'lbo_loan_purpose':Array.from(document.querySelectorAll(`#lbo_loan_purpose > option`)).filter(item => { if(item.selected)return item })[0].value,
                '_token': '<?php echo e(csrf_token()); ?>'
            }
            console.log(data);
            var obj = {
                type: 'POST',
                url: "<?php echo e(url('individual/editCaseLoanDetail')); ?>/" + document.querySelector(`input[setid]`).value,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: data,
                success: function(data) {
                    //console.log(data);
                    if (data.success) {
                        $('#changeText').html(data.success);
                        $('#changeText1').html('成功!');
                        $('#alertinfo1').attr('class', 'alert alert-success')
                        showText();
                        casetable.ajax.reload();

                    } else {
                        $('#changeText').html(data.error);
                        $('#changeText1').html('錯誤!');
                        $('#alertinfo1').attr('class', 'alert alert-warning')
                        showText();
                    }
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }
            $.ajax(obj);
        })
        function CaseEdit(id) {
            $('#selectHKID').hide();
            $('#mxForm').show();
            $('#mxForm select[disabled]').css('background', 'rgba(248,249,254)');
            $('#mxForm input[readonly]').css('background', 'rgba(248,249,254)');
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('case')); ?>/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                // dataType: "json",
                success: function(data) {
                    console.log(data);
                    data = data[0];
                    $('#mobile').val(data.mobile);
                    $('#HKID').val(data.HKID);
                    $('#email').val(data.email);
                    $('#firstname').val(data.first_name);
                    $('#lastname').val(data.last_name);
                    $('#nationality').val(data.nationality);
                    $('#date_of_birth').val(data.date_of_birth);
                    $('#unit').val(data.unit);
                    $('#floor').val(data.floor);
                    $('#building').val(data.building);
                    $(`#area > option[id="area-${data.area}"]`).attr('selected', 'selected');
                    $(`#job_status > option[id="job_status-${data.job_status}"]`).attr('selected', 'selected');
                    $('#addres').val(data.addres);
                    $('#address1').val(data.address1);
                    $('#address2').val(data.address2);
                    $('#company_name').val(data.company_name);
                    $('#company_contact').val(data.company_contact);
                    $('#company_name').val(data.company_name);
                    $('#company_addres').val(data.company_addres);
                    $('#loan_amount').val(data.loan_amount);
                    $(`select > option[id="purpose-${data.purpose}"]`).attr('selected', 'selected');
                    $(`#service_providers > option[id="service_providers-${data.service_provider}"]`).attr('selected', 'selected');
                    $('#repayment_period').val(data.repayment_period);
                    $('#company_id').val(data.name);
                    $('#comment').val(data.case_remark);
                    $('#HKID').attr('readonly', 'readonly');
                    $('#HKID').css('background', 'rgba(248,249,254)');
                    $(`input[setid]`).val(data.id)
                    return false;
                },
                error: function() {
                    alert('调用接口出错了');
                }
            });
        }

        function caseDelete(id) {
            $('#deleOnclick').attr('vid', id);
        }
        $('#deleOnclick').click(function() {
            var id = $('#deleOnclick').attr('vid');
            $('#deleOnclick').attr('data-dismiss', 'modal');
            $.post("<?php echo e(url('case')); ?>/" + id, {
                "_method": "delete",
                "_token": "<?php echo e(csrf_token()); ?>"
            }, function(data) {
                console.log(data);
                if (data.status == 1) {
                    $('#changeText').html(data.message);
                    $('#changeText1').html('成功!');
                    $('#alertinfo1').attr('class', 'alert alert-success')
                    showText();
                    casetable.ajax.reload();
                } else {
                    $('#changeText').html(data.message);
                    $('#changeText1').html('錯誤!');
                    $('#alertinfo1').attr('class', 'alert alert-danger')
                    showText();
                }
            })
        })

        function func() {
            return false;
        }
    </script>
    <script type="module">
        "use strict";
        import FormValidate from "<?php echo e(config('app.assets_path')); ?>/assets/js/module/FormValidate.js";
        
        
        document.querySelector('#selectHKID button').addEventListener('click',function(){
            let IsHKID = $(`#exampleModalLong-createCase input[id="IsHKID"]`).val();
            console.log(IsHKID);
            if (IsHKID == '') {
                $(`#exampleModalLong-createCase input[id="IsHKID"]`).parent('div').append(
                    '<div class="IsHKID-error" class="error" style="color:red" for="IsHKID" style="">請輸入HKID</div>'
                );
                return false;
            }
            $('.IsHKID-error').remove();
            $('#mxForm-createCase').show();
            new FormValidate('#mxForm-createCase')
            $.ajax({
                type: "get",
                url: "<?php echo e(url('individual/getcase')); ?>/" + IsHKID,
                success: function(data) {
                    data = data[0];
                    // console.log(data);
                    if (data == undefined) {
                        $('#mxForm-createCase input').val("");
                        $(`#mxForm-createCase input[id="HKID"]`).val(IsHKID);
                        $(`#exampleModalLong-createCase input[id="IsHKID"]`).parent('div').append(
                            '<div class="IsHKID-error" class="error" style="color:red" for="IsHKID" style="">沒有此用戶，請爲新用戶創建貸款</div>'
                        );
                        return false;
                    }
                    $('#mobile,#email,#firstname,#lastname,#nationality,#date_of_birth,#unit,#floor,#company_name,#company_contact,#company_addres,#HKID')
                        .val('');
                    $('#mxForm-createCase #firstname').val(data.first_name);
                    $('#mxForm-createCase #lastname').val(data.last_name);
                    $('#mxForm-createCase #mobile').val(data.mobile);
                    $('#mxForm-createCase #email').val(data.email);
                    $('#mxForm-createCase #nationality').val(data.nationality);
                    $('#mxForm-createCase #date_of_birth').val(data.date_of_birth);
                    $('#mxForm-createCase #unit').val(data.unit);
                    $('#mxForm-createCase #floor').val(data.floor);
                    $('#mxForm-createCase #HKID').val(IsHKID);
                    $('#mxForm-createCase #company_name').val(data.company_name);
                    $('#mxForm-createCase #company_contact').val(data.company_contact);
                    $('#mxForm-createCase #company_addres').val(data.company_addres);
                },
            });
        })
        document.querySelector('#EditOnclick-createCase').addEventListener('click',function(){
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
            var a = $("#mxForm-createCase").serialize();
            var json1 = $.parseJSON(a);
            console.log(json1);
            var id = $('#HKID').attr('vid');
            var obj = {
                type: 'PUT',
                url: "<?php echo e(url('case')); ?>/" + json1.HKID,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    json1,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                // dataType: "json",
                success: function(data) {
                    //console.log(data);
                    if (data.status == 1) {
                        $('#changeText').html(data.message);
                        $('#changeText1').html('成功!');
                        $('#alertinfo1').attr('class', 'alert alert-success')
                        showText();
                        casetable.ajax.reload();

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
                $('#mxForm-createCase #firstname').val() !== "" &&
                $('#mxForm-createCase #lastname').val() !== ""
                // && $('#mobile').val() !== "" 
                &&
                $('#mxForm-createCase #email').val() !== "" &&
                $('#mxForm-createCase #nationality').val() !== "" &&
                $('#mxForm-createCase #date_of_birth').val() !== "" &&
                $('#mxForm-createCase #unit').val() !== "" &&
                $('#mxForm-createCase #floor').val() !== "" &&
                $('#mxForm-createCase #agree').is(':checked') &&
                $('#mxForm-createCase #HKID').val() !== "" &&
                $('#mxForm-createCase #company_id').val() !== "0" &&
                $('#mxForm-createCase #lbo_district').val() !== "0" &&
                $('#mxForm-createCase #lbo_loan_purpose').val() !== "0" &&
                $('#mxForm-createCase #lbo_appellation').val() !== "0" &&
                $('#mxForm-createCase #lbo_employment').val() !== "0" &&
                $('#mxForm-createCase #company_name').val() !== "" &&
                $('#mxForm-createCase #company_contact').val() !== "" &&
                $('#mxForm-createCase #company_addres').val() !== "" &&
                $('#mxForm-createCase #loan_amount').val() !== "" &&
                $('#mxForm-createCase #repayment_period').val() !== ""
            ) {
                $('#EditOnclick-createCase').attr('data-dismiss', 'modal');
                $.ajax(obj);
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\phpEnv\www\localhost\resources\views/individual/case.blade.php ENDPATH**/ ?>