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
                                
                                <form action="<?php echo e(url('individual/caseImport')); ?>" method="POST"
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
                                            <th></th>
                                            <th>編號</th>
                                            <th>名字</th>
                                            <th>姓名</th>
                                            <th>貸款額度</th>
                                            <th>貸款公司</th>
                                            <th>還款期</th>
                                            <th>付款日期</th>
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
        //import MessagesClass from "<?php echo e(config('app.assets_path')); ?>/assets/js/module/Message.js"
        //let MessageSucess = new MessagesClass('')
        let casetable = $('#casetable').DataTable({
            "bLengthChange": true,
            "ordering": true,
            "order": [
                [0, 'desc']
            ],
            "lengthMenu": [10, 20, 50, 100], //更改显示记录数选项 
            "DisplayLength": 10, //默认显示的记录数  
            "info": true,
            "paging": true,
            // "pageLength": 10,
            "autoWidth": true,
            "scrollX": false,
            // 垂直滚动条
            "scrollY": false,

            "ajax": {
                // url可以直接指定远程的json文件，或是MVC的请求地址 /Controller/Action
                url: "<?php echo e(url('api/getCaseList')); ?>",
                type: 'POST',
                // 传给服务器的数据，可以添加我们自己的查询参数
                // data: function (paraam) {
                //     return a;
                // },
                //用于处理服务器端返回的数据。 dataSrc是DataTable特有的
                dataSrc: function(myJson) {
                    console.log(myJson);
                    return myJson;
                }
            },

            "columns": [{
                    "data": "create_datetime",
                    "defaultContent": "",
                    "visible": false,
                },
                {
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
                }

            ],
            columnDefs: [{
                    targets: [9],
                    render: function(data, type, row, meta) {
                        if (type === 'display') {
                            // console.log(row);
                            return '<div><button id="export" type="button" style="margin-right: 15px;" onclick="checkBox(' +
                                row.id +
                                ')" class="btn btn-rounded btn-outline-primary">匯出xlsx</button>' +
                                '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="ExportFile(' +
                                row.id +
                                ');" type="button" data-toggle="modal" data-target="#exampleModalCenter">查看文件</button>' +
                                '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="CaseEdit(' +
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
                            .upload_file + '"><li class="list-group-item">'+ fileName[4]+'/' + fileName[5] +
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

        function checkBox(id) {
            var obj = {
                type: 'get',
                url: "<?php echo e(url('individual/exportLog')); ?>/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if(data){
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
                url: "<?php echo e(url('individual/getAllid')); ?>/" + 1,
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

        

        $("#Importxls").click(function() {
            $('#Import').click();
        });

        $('#Import').change(function() {
            $('#excelImport').click()
        })

        function addIndividual() {
            $('#repayment_period,#loan_amount,#mobile,#email,#firstname,#lastname,#nationality,#date_of_birth,#unit,#floor,#company_name,#company_contact,#company_addres,#HKID')
                .val('');

            $('#HKID').removeAttr('vid');
            $('#company_id').find("option:selected").removeAttr('selected');
            $('#splist0').attr('selected', 'selected');
            $('#HKID').removeAttr('readonly');
            $('#HKID').removeAttr('style');
        }

        function CaseEdit(id) {
            //$('#mxForm input').attr('readonly', 'readonly');
            $('#mxForm input[readonly]').css('background', 'rgba(248,249,254)');
            $('#mxForm select[disabled]').css('background', 'rgba(248,249,254)');
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
                    $('#repayment_period').val(data.repayment_period);
                    $('#company_id').val(data.name);
                    $('#comment').val(data.case_remark);
                    $('#HKID').attr('readonly', 'readonly');
                    $('#HKID').css('background', 'rgba(248,249,254)');
                    $(`#service_providers>option[id="service_providers-${data.service_provider}"]`).attr('selected', 'selected');
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
                url: "<?php echo e(url('sp/editCaseLoanDetail')); ?>/" + document.querySelector(`input[setid]`).value,
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/fullygreatasia.admatrix-ai.com/public_html/laravel3/resources/views/sp/caseapply.blade.php ENDPATH**/ ?>