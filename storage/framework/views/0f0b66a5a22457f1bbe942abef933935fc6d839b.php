

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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">服務提供商管理</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">服務提供商管理</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <button type="button" style="margin-bottom: 30px;" onclick="addIndividual()"
                                    class="btn btn-rounded btn-outline-primary " id="addIndividual" data-toggle="modal"
                                    data-target="#exampleModalLong">創建賬號
                                </button>
                                <table id="mytable" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>名字</th>
                                            <th>姓名</th>
                                            <th>公司</th>
                                            <th>電郵</th>
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

    <div class="modal fade" id="exampleModalLong">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">編輯</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="mxForm" class="form-valide" onsubmit="return func()" method="post">
                        <div class="form-group">
                            <label><strong>電郵</strong></label>
                            <input id="email" name="email" type="email" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label><strong>密碼</strong></label>
                            <input id="password" name="password" type="password" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label><strong>名字</strong></label>
                            <input id="firstname" name="first_name" type="text" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label><strong>姓名</strong></label>
                            <input id="lastname" name="last_name" type="text" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label><strong>電話</strong></label>
                            <input id="mobile" name="mobile" type="text" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label><strong>常聯係人</strong></label>
                            <input id="contact" name="contact" type="text" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <label for="service_provider">服務提供商</label><span style="color: red">*</span>
                            <select id="company_id" name="company_id" class="form-control">
                                <option id="splist0" value="0" selected>請選擇</option>

                                <?php $__currentLoopData = $splist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option id="splist<?php echo e($v->company_id); ?>" value="<?php echo e($v->company_id); ?>">
                                        <?php echo e($v->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button id="EditOnclick" onclick="Editindividual()" type="button" class="btn btn-primary">確認</button>
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

        let mytable = $('#mytable').DataTable({
            "bLengthChange": true,
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
                url: "<?php echo e(url('individual/splist1')); ?>",
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
                    "data": "company_staff_id"
                },
                {
                    "data": "first_name"
                },
                {
                    "data": "last_name"
                },
                {
                    "data": "name"
                },
                {
                    "data": "email"
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
                    targets: [5],
                    render: function(data, type, row, meta) {
                        if (type === 'display') {
                            // console.log(row);
                            return '<select  value="" id="individualStatus' + row.company_staff_id +
                                '" onchange="individualStatus(' + row.company_staff_id +
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
                    targets: [6],
                    render: function(data, type, row, meta) {
                        if (type === 'display') {
                            // console.log(row);
                            return '<div><button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="individualEdit(' +
                                row.company_staff_id +
                                ');" type="button"  data-toggle="modal" data-target="#exampleModalLong">編輯</button>' +
                                '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-danger " onclick="individualDelete(' +
                                row.company_staff_id +
                                ');" data-toggle="modal" data-target=".bd-example-modal-sm-del" type="button">刪除</button></div>';

                        }
                        return data;
                    },

                },

            ],
        });

        function showText() {
            $("#alertinfo").fadeIn(2000);
            setTimeout(function() {
                $("#alertinfo").fadeOut(2000)
            }, 3000)
        }

        function individualStatus(id) {

            var sta = '#individualStatus' + id + ' option:selected';
            var status = $(sta).val();
            var data = {
                status,
                id
            }
            // console.log(data);

            var obj = {
                type: 'POST',
                url: "<?php echo e(url('individual/spstatus')); ?>",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    data,
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                dataType: "json",
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
                    mytable.ajax.reload();
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }
            $.ajax(obj);
        }


        function addIndividual() {
            $('#mxForm input').val("");
            $('#splist0').prop('selected', 'true')
            $('#email').removeAttr('vid');
            $('#email').removeAttr('readonly');
            $('#email').removeAttr('style');
        }

        function Editindividual() {
            
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
            if ($('#password').val() == "") {
                $('.password-error').remove();
                $('#password').addClass('error');
                $('#password').parent('div').append(
                    '<div class="password-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>');
                var t = $("#password").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.password-error').remove();
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
            if ($('#contact').val() == "") {
                $('.contact-error').remove();
                $('#contact').addClass('error');
                $('#contact').parent('div').append(
                    '<div class="contact-error" class="error" style="color:red" for="newpwd" style="">請輸入</div>'
                );
                var t = $("#contact").offset().top;
                $(window).scrollTop(t);
            } else {
                $('.contact-error').remove();
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
            var id = $('#email').attr('vid');
            if (
                $('#firstname').val() !== "" &&
                $('#lastname').val() !== "" &&
                $('#password').val() !== "" &&
                $('#email').val() !== "" &&
                $('#company_id').val() !== "0" &&
                $('#contact').val() !== ""
            ) {
                $('#EditOnclick').attr('data-dismiss', 'modal');
                $.ajax({
                    type: 'PUT',
                    url: "<?php echo e(url('individual/spcreate')); ?>/" + id,
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
                    }
                });
            }



        }

        function individualEdit(id) {
            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('individual/spshow')); ?>/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    data = data[0];
                    $('#email').val(data.email);
                    $('#email').attr('vid', id)
                    $('#firstname').val(data.first_name);
                    $('#lastname').val(data.last_name);
                    $('#mobile').val(data.mobile);
                    $('#contact').val(data.contact);
                    $('#company_id').find("option").removeAttr('selected');
                    $('#splist' + data.company_id).attr('selected', 'selected')
                    $('#email').attr('readonly', 'readonly');
                    $('#email').css('background', 'rgba(248,249,254)');
                    return false;
                },
                error: function() {
                    alert('调用接口出错了');
                }
            });

        }

        function individualDelete(id) {
            $('#deleOnclick').attr('vid', id);
        }
        $('#deleOnclick').click(function() {
            var id = $('#deleOnclick').attr('vid');
            $('#deleOnclick').attr('data-dismiss', 'modal');
            $.post("<?php echo e(url('individual/spdelete')); ?>/" + id, {
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\phpEnv\www\localhost\resources\views/individual/splist.blade.php ENDPATH**/ ?>