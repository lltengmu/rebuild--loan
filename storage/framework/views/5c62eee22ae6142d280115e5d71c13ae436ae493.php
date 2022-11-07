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
                                <form id="mxForm" class="form-valide" onsubmit="return func()" method="post">

                                    <label for="exampleInputEmail1">基本個人資料</label>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="exampleInputEmail1">稱謂</label><span style="color: red">*</span>
                                                <select class="form-control" id="donationtitle">
                                                    <option value="0">小姐</option>
                                                    <option value="0">女士</option>
                                                    <option value="0">先生</option>
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
                                                <label for="mobile">座數</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile" name="mobile" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地址第一行</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile" name="mobile" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地址第二行</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile" name="mobile" class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地區</label><span style="color: red">*</span>
                                                <select class="form-control" id="donationtitle">
                                                    <option value="0">地區</option>

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
                                            <div class="col-md-4 mb-2">
                                                <label for="service_provider">服務提供商</label><span style="color: red">*</span>
                                                <input type="tel" id="company_id" name="company_id" class="form-control"
                                                    value="">
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <label for="exampleInputEmail1">就業資料</label><span style="color: red">*</span>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="mobile">職業</label><span style="color: red">*</span>
                                                <select class="form-control" id="donationtitle">
                                                    <option value="0">職業</option>

                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="mobile">HK$每月收入</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile" name="mobile" class="form-control">
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
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <label for="mobile">備注</label><span style="color: red">*</span>
                                            <textarea name="template_text" class="form-control" rows="2" id="remark" readonly></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <label for="mobile">貸款用途</label><span style="color: red">*</span>
                                            <select class="form-control" id="donationtitle">
                                                <option value="0">貸款用途</option>

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
                url: "<?php echo e(url('Individuals/approval')); ?>",
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
                    "data": "name"
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
                targets: [8],
                render: function(data, type, row, meta) {
                    if (type === 'display') {
                        // console.log(row);
                        return '<div><button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="CaseEdit(' +
                            row.id +
                            ');" type="button"  data-toggle="modal" data-target="#exampleModalLong">申請資料</button>' +
                            '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-danger " onclick="caseDelete(' +
                            row.id +
                            ');" data-toggle="modal" data-target=".bd-example-modal-sm-del" type="button">刪除</button></div>';
                    }
                    return data;
                },
            }, ],
        });

        function showText() {
            $("#alertinfo").fadeIn(2000);
            setTimeout(function() {
                $("#alertinfo").fadeOut(2000)
            }, 3000)
        }

        function CaseEdit(id) {
            $('#mxForm input').prop("disabled", true);
            $('#mxForm input').css("background", 'rgba(248,249,254)');
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
                    $('#company_id').val(data.name);
                    $('#remark').val(data.case_remark)
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

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/fullygreatasia.admatrix-ai.com/public_html/laravel3/resources/views/individual/approval.blade.php ENDPATH**/ ?>