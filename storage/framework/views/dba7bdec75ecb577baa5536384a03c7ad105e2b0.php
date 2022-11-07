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
                        <span class="ml-1"><?php echo e($user->last_name); ?><?php echo e($user->first_name); ?></span>
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
                                    data-target="#exampleModalLong">申請貸款
                                </button>
                                <form action="<?php echo e(url('clients/Clientcaseimport')); ?>" 
                                    name='iframeForm' 
                                    target="_self"
                                    method="POST" 
                                    enctype="multipart/form-data" 
                                    style="display:inline">
                                    <?php echo csrf_field(); ?>
                                    <input type="file" name="file" id="Import" style="display: none">
                                    <input type="text" name="case_id" id="case_id" style="display: none">
                                    <button id="excelImport" type="submit" style="display: none">確認</button>
                                </form>
                                
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
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div id="IsImport" <?php if(count($errors)): ?> vid='<?php echo e($errors->first()); ?>' <?php endif; ?> style="display: none">
            123123</div>
        <div id="alertinfo" style="width:500px;position:fixed;top:80px;left:82%;z-index:999;display:none">
            <div id="alertinfo1" class="alert alert-success"><strong id="changeText1">成功!</strong>&nbsp;&nbsp;<span
                    id="changeText">修改成功.</span></div>
        </div>

    </div>

    <!-- Button trigger modal -->
    <!-- Modal -->
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
                    <button style="margin-right: 15px;float: right" class="btn btn-rounded btn-outline-primary "
                        onclick="Import_file()" type="button" data-toggle="modal"
                        data-target="#exampleModalCenter">上傳文件</button>
                </div>;
            </div>
            
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
                                <form id="mxForm" class="form-valide" onsubmit="return func()" method="post">
                                    

                                    <input style="display: none" type="tel" id="company_id" name="company_id"
                                        class="form-control" value="0">
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
        function func() {
            return false;
        }

        function IsImport() {
            if ($('#IsImport').attr('vid') == 1) {
                $('#changeText').html('上傳成功');
                $('#changeText1').html('成功!');
                $('#alertinfo1').attr('class', 'alert alert-success')
                showText();
            } else if ($('#IsImport').attr('vid') == 2) {
                $('#changeText').html('上傳失敗,最多上傳五個文件');
                $('#changeText1').html('注意!');
                $('#alertinfo1').attr('class', 'alert alert-warning')
                showText();
            }
        }
        IsImport();
        $('#Import').change(function() {
            $('#excelImport').click();
        })

        let casetable = $('#casetable').DataTable({
            "bLengthChange": true,
            "lengthMenu": [10, 20, 50, 100], //更改显示记录数选项 
            "DisplayLength": 10, //默认显示的记录数  
            "info": true,
            "order": [
                [9, 'desc']
            ],
            "paging": true,
            // "pageLength": 10,
            "autoWidth": true,
            "scrollX": false,
            // 垂直滚动条
            "scrollY": false,

            "ajax": {
                // url可以直接指定远程的json文件，或是MVC的请求地址 /Controller/Action
                url: "<?php echo e(url('Clients/Client_Case')); ?>",
                type: 'GET',
                // 传给服务器的数据，可以添加我们自己的查询参数
                // data: function (paraam) {
                //     return a;
                // },
                //用于处理服务器端返回的数据。 dataSrc是DataTable特有的
                dataSrc: function(myJson) {
                    // console.log(myJson);
                    myJson = myJson.filter(item => {
                        return item.service_provider == 0;
                    })
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
                    "data": "name"
                },
                {
                    "data": "repayment_period"
                },
                {
                    "data": "date_of_pay"
                },
                {
                    "data": "label_tc",
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
                targets: [8],
                render: function(data, type, row, meta) {
                    if (type === 'display') {
                        // console.log(row);
                        return '<div><button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="CaseEdit(' +
                            row.id +
                            ');" type="button"  data-toggle="modal" data-target="#exampleModalLong">編輯</button>' +
                            '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="Import_file1(' +
                            row.id +
                            ');" type="button"  data-toggle="modal" data-target="#exampleModalCenter">文件查看</button></div>';
                    }
                    return data;
                },
            }, ],
        });

        function Import_file1(id) {
            $('#case_id').val(id);
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('clients/GetFile')); ?>/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                success: function(data) {
                    console.log(data);
                    $('#getfile').html('');
                    if (data == '未上傳文件') {
                        $('#getfile').append('<li class="list-group-item">' + data + '</li>');
                        return false;
                    }
                    for (var i = 0; i < data.length; i++) {
                        let fileName = data[i].upload_file.split('/');
                        $('#getfile').append(
                            '<div id="uploadfile' + data[i].id +
                            '" class="row"><a class="col-md-10" href="<?php echo e(config('app.assets_path')); ?>/' +
                            data[i].upload_file + '"><li class="list-group-item">' + fileName[5] +
                            '</li></a><button onclick="delUpload(' + data[i].id +
                            ')" class="btn btn-primary mt-2 mb-3" style="height:30px;">刪除</button></div>');
                    }
                },
                error: function() {
                    alert('调用接口出错了');
                }
            });
        }

        function Import_file() {
            $('#Import').click();
        }

        function delUpload(id) {
            $.post("<?php echo e(url('clients/delupload')); ?>/" + id, {
                "_method": "delete",
                "_token": "<?php echo e(csrf_token()); ?>"
            }, function(data) {
                console.log(data);
                if (data.status == 1) {
                    $('#changeText').html(data.message);
                    $('#changeText1').html('成功!');
                    $('#alertinfo1').attr('class', 'alert alert-success');
                    location.reload(true);
                } else {
                    $('#changeText').html(data.message);
                    $('#changeText1').html('錯誤!');
                    $('#alertinfo1').attr('class', 'alert alert-danger')
                    showText();
                }
            })
        }

        function showText() {
            $("#alertinfo").fadeIn(2000);
            setTimeout(function() {
                $("#alertinfo").fadeOut(2000)
            }, 3000)
        }

        function addIndividual() {
            $('#mxForm input').val("")
            $('#company_id').val('0');
            $('#HKID').removeAttr('vid');
            $('#company_id').find("option").removeAttr('selected');
            $('#splist0').attr('selected', 'selected');
            $('#HKID').removeAttr('readonly');
            $('#HKID').removeAttr('style');
            $('#EditOnclick').removeAttr('vid');
        }


        function EditCase() {
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

            var id = $('#EditOnclick').attr('vid');
            if (!id) {
                var id = undefined;
            }
            // console.log(id);
            var obj = {
                type: 'PUT',
                url: "<?php echo e(url('Clients/Client_Case')); ?>/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    json1,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data.status == 1) {
                        $('#changeText').html('申请成功');
                        $('#changeText1').html('成功!');
                        $('#alertinfo1').attr('class', 'alert alert-success')
                        showText();
                        sendmail(data.clientUser, '您申请了新的贷款', 'client');
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
                $('#lbo_loan_purpose').val() !== "0" &&
                $('#loan_amount').val() !== "" &&
                $('#repayment_period').val() !== ""
            ) {

                $.ajax(obj);
                $('#EditOnclick').attr('data-dismiss', 'modal');
            }
        }

        function sendmail(id, send = '', category) {
            var content = send;
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
                    if (data) {
                        console.log('郵件發送成功');
                    }
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            });
        }

        function CaseEdit(id) {
            $('#EditOnclick').attr('vid', id);
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
                    $('#lbo_loan_purpose').find("option").removeAttr('selected');
                    $('.lbo_loan_purpose' + data.purpose).attr('selected', 'selected');
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/fullygreatasia.admatrix-ai.com/public_html/laravel3/resources/views/clients/case.blade.php ENDPATH**/ ?>