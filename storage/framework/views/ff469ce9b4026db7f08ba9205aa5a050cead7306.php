

<?php $__env->startSection('title'); ?>
    Management system
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
                                    data-target="#exampleModalLong">創建貸款
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
                                            <th>公司</th>
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
            <div id="alertinfo1" class="alert alert-success"><strong id="changeText1">成功!</strong>&nbsp;&nbsp;<span
                    id="changeText">修改成功.</span></div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="exampleModalLong">
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
                                            <button onclick="IsHKID()" style="padding-left:35px;padding-right:35px;"
                                                type="button" class="btn btn-secondary">查詢</button>
                                        </div>
                                    </div>
                                </div>
                                <form style="display: none" id="mxForm" class="form-valide" onsubmit="return func()"
                                    method="post">

                                    <label for="exampleInputEmail1">基本個人資料</label>
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
                                                <label for="firs_tname">姓氏</label><span style="color: red">*</span>
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
                                                    class="form-control">
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
                                                <label for="mobile4">座數</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile4" name="mobile4" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地址第一行</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile3" name="mobile3" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地址第二行</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile2" name="mobile2" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
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
                                                <input type="tel" id="HKID" name="HKID" class="form-control" value=""
                                                    style="background-color:rgba(248,249,254);" readonly>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="service_provider">服務提供商</label><span style="color: red">*</span>
                                                <select id="company_id" name="company_id" class="form-control">
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
                                                <select id="lbo_employment" name="lbo_employment"
                                                    class="form-control">
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
                                                <input type="tel" id="mobile1" name="mobile1" class="form-control">
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

                                    <br>
                                    <label for="exampleInputEmail1">貸款資料</label>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="loan_amount">欲申請之貸款額</label><span style="color: red">*</span>
                                                <input type="tel" id="loan_amount" name="loan_amount"
                                                    class="form-control">
                                            </div>
                                            <div class="col">
                                                <label for="repayment_period">還款期</label><span style="color: red">*</span>
                                                <input type="tel" id="repayment_period" name="repayment_period"
                                                    pattern="/^(\d{4}-\d{1,2}-\d{1,2})(\s?\d{2}:\d{2}:\d{2})?$/"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <label for="mobile">貸款用途</label><span style="color: red">*</span>
                                            <select id="lbo_loan_purpose" name="lbo_loan_purpose" class="form-control">
                                                <option class="lbo_loan_purpose" value="0" selected>請選擇</option>

                                                <?php $__currentLoopData = $lbo_loan_purpose; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option class="lbo_loan_purpose<?php echo e($v->id); ?>"
                                                        value="<?php echo e($v->id); ?>">
                                                        <?php echo e($v->label_tc); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="form-row">
                                            <input class="form-check-input" type="checkbox">
                                            <label for="exampleInputEmail1">同意xxxxxx</label>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                        <button id="EditOnclick" onclick="EditCase()" type="button"
                                            class="btn btn-primary">保存</button>
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
                    "data": "create_datetime",
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
                        if (type === 'display') {
                            // console.log(row);
                            return '<select  value="" id="individualStatus' + row.id +
                                '" onchange="SpSubmit(' + row.id +
                                ');"  class="form-control form-control-sm">' +
                                '<option value="1" ' + (String)(row.label_tc == '提交' ? "selected" : "") +
                                '>提交</option>' +
                                '<option value="2" ' + (String)(row.label_tc == '轉交到服務提供者' ? "selected" :
                                    "") +
                                '>轉交到服務提供者</option>' +
                                '<option value="3" ' + (String)(row.label_tc == '服務提供者同意' ? "selected" :
                                    "") +
                                '>服務提供者同意</option>' +
                                '<option value="4" ' + (String)(row.label_tc == '申請成功' ? "selected" : "") +
                                '>申請成功</option>' +
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
                                ' <button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="CaseEdit(' +
                                row.id +
                                ');" type="button"  data-toggle="modal" data-target="#exampleModalLong">編輯</button>' +
                                '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-danger " onclick="caseDelete(' +
                                row.id +
                                ');" data-toggle="modal" data-target=".bd-example-modal-sm-del" type="button">刪除</button></div>';

                        }
                        return data;
                    },
                },
            ],
        });


        $("#Importxls").click(function() {
            $('#Import').click();
        });

        $('#Import').change(function() {
            $('#excelImport').click()
        })


        function checkBox(checkbox) {
            // //意思是选择被选中的checkbox
            // var checkbox = "";

            // $.each($('input:checkbox:checked'), function() {
            //     checkbox += ($(this).val()) + '&';
            // });
            // if (checkbox.length == 0) {
            //     console.log('空');
            //     return false;
            // }
            window.location.href = "<?php echo e(url('individual/caseExcel')); ?>/" + checkbox;
        };

        function IsHKID() {
            let IsHKID = $('#IsHKID').val();
            if (IsHKID == '') {
                $('#IsHKID').parent('div').append(
                    '<div class="IsHKID-error" class="error" style="color:red" for="IsHKID" style="">請輸入HKID</div>'
                );
                return false;
            }
            $('.IsHKID-error').remove();
            $('#mxForm').show();
            $.ajax({
                type: "get",
                url: "<?php echo e(url('individual/getcase')); ?>/" + IsHKID,
                success: function(data) {
                    data = data[0];
                    // console.log(data);
                    if (data == undefined) {
                        $('#mxForm input').val("");
                        $('#HKID').val(IsHKID);
                        $('#IsHKID').parent('div').append(
                            '<div class="IsHKID-error" class="error" style="color:red" for="IsHKID" style="">沒有此用戶，請爲新用戶創建貸款</div>'
                        );
                        return false;
                    }
                    $('#mobile,#email,#firstname,#lastname,#nationality,#date_of_birth,#unit,#floor,#company_name,#company_contact,#company_addres,#HKID')
                        .val('');
                    $('#firstname').val(data.first_name);
                    $('#lastname').val(data.last_name);
                    $('#mobile').val(data.mobile);
                    $('#email').val(data.email);
                    $('#nationality').val(data.nationality);
                    $('#date_of_birth').val(data.date_of_birth);
                    $('#unit').val(data.unit);
                    $('#floor').val(data.floor);
                    $('#HKID').val(IsHKID);
                    $('#company_name').val(data.company_name);
                    $('#company_contact').val(data.company_contact);
                    $('#company_addres').val(data.company_addres);
                },
            });
        }


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
                dataType: "json",
                success: function(data) {
                    // console.log(data);
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
            $.ajax(obj)
        }

        function EditCase() {

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
            var a = $("#mxForm").serialize();
            var json1 = $.parseJSON(a);
            console.log(json1);
            var id = $('#HKID').attr('vid');
            var obj = {
                type: 'PUT',
                url: "<?php echo e(url('case')); ?>/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    json1,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    if (data.status == 1) {
                        $('#changeText').html(data.message);
                        $('#changeText1').html('成功!');
                        $('#alertinfo1').attr('class', 'alert alert-success')
                        showText();
                        if (data.email) {
                            sendmail(data.email, 'admin为您添加了一份贷款', 'individual')
                        }
                        if (data.token) {
                            sendmailset(json1.email, data.token, 'individual')
                        }
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
                $('#firstname').val() !== "" &&
                $('#lastname').val() !== ""
                // && $('#mobile').val() !== "" 
                &&
                $('#email').val() !== "" &&
                $('#nationality').val() !== "" &&
                $('#date_of_birth').val() !== "" &&
                $('#unit').val() !== "" &&
                $('#floor').val() !== "" &&
                $('#HKID').val() !== "" &&
                $('#company_id').val() !== "0" &&
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
        }

        function CaseEdit(id) {
            $('#selectHKID').hide();
            $('#mxForm').show();
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('case')); ?>/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                dataType: "json",
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
                    $('#company_name').val(data.company_name);
                    $('#company_contact').val(data.company_contact);
                    $('#company_addres').val(data.company_addres);
                    $('#loan_amount').val(data.loan_amount);
                    $('#repayment_period').val(data.repayment_period);
                    $('#HKID').attr('vid', id)
                    $('#company_id').find("option").removeAttr('selected');
                    $('#splist' + data.company_id).attr('selected', 'selected');
                    $('#lbo_district').find("option").removeAttr('selected');
                    $('.lbo_district' + data.area).attr('selected', 'selected')
                    $('#lbo_loan_purpose').find("option").removeAttr('selected');
                    $('.lbo_loan_purpose' + data.purpose).attr('selected', 'selected')
                    $('#lbo_appellation').find("option").removeAttr('selected');
                    $('.lbo_appellation' + data.appellation).attr('selected', 'selected')
                    $('#lbo_employment').find("option").removeAttr('selected');
                    $('.lbo_employment' + data.job_status).attr('selected', 'selected')
                    $('#HKID').attr('readonly', 'readonly');
                    $('#HKID').css('background', 'rgba(248,249,254)');
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


        function sendmail(id, send = '', category) {
            var content = send;
            var data = {
                content,
                id,
                category
            };
            // console.log(id);
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('mail/send')); ?>",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    data
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            });
        }

        function sendmailset(id, send = '', category) {
            var content = "<?php echo e(url('api/Verification')); ?>/" + send;
            var data = {
                content,
                id,
                category
            };
            console.log(id);
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('mail/send')); ?>",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    data
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    if (data) {
                        console.log('郵件發送成功');
                    }
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpEnv\www\localhost\resources\views/individual/case.blade.php ENDPATH**/ ?>