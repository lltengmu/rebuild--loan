@extends('layouts.layout')

@section('title')
    Management system
@endsection

@section('content')
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
                                <table id="mytable" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>名字</th>
                                            <th>姓名</th>
                                            <th>電郵</th>
                                            <th>電話</th>
                                            <th>常聯係人</th>
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
                    <div class="form-group">
                        <label><strong>Email</strong></label>
                        <input id="show_email" name="email" type="email" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label><strong>password</strong></label>
                        <input id="show_password" name="password" type="password" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label><strong>First_name</strong></label>
                        <input id="show_firstname" name="first_name" type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label><strong>Last_name</strong></label>
                        <input id="show_lastname" name="last_name" type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label><strong>mobile</strong></label>
                        <input id="show_mobile" name="mobile" type="text" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label><strong>contact</strong></label>
                        <input id="show_contact" name="contact" type="text" class="form-control" value="">
                    </div>
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
    <script src="{{ config('app.assets_path') }}/assets/js/jQuery3.6.0.js"></script>
    <script
        src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/js/jquery.dataTables.min.js">
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
            "scrollX": false,
            // 垂直滚动条
            "scrollY": false,

            "ajax": {
                // url可以直接指定远程的json文件，或是MVC的请求地址 /Controller/Action
                url: "{{ url('Individuals/user') }}",
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
                    "data": "email"
                },
                {
                    "data": "mobile"
                },
                {
                    "data": "contact"
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
                        if (type === 'display') {
                            // console.log(row);
                            return '<select  value="" id="individualStatus' + row.id +
                                '" onchange="individualStatus(' + row.id +
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
                            return '<div><button style="margin-right: 15px;" class="btn btn-rounded btn-outline-primary " onclick="individualEdit(' +
                                row.id +
                                ');" type="button"  data-toggle="modal" data-target="#exampleModalLong">編輯</button>' +
                                '<button style="margin-right: 15px;" class="btn btn-rounded btn-outline-danger " onclick="individualDelete(' +
                                row.id +
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
                url: "{{ url('Individuals/user') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    data,
                    '_token': '{{ csrf_token() }}'
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
            $('#show_email').val('');
            $('#show_firstname').val('');
            $('#show_lastname').val('');
            $('#show_mobile').val('');
            $('#show_contact').val('');
            $('#show_email').removeAttr('vid');
            $('#show_email').removeAttr('readonly');
            $('#show_email').removeAttr('style');
        }

        function Editindividual() {
            $('#EditOnclick').attr('data-dismiss', 'modal');
            var a = $('#show_email').val();
            var b = $('#show_firstname').val();
            var c = $('#show_lastname').val();
            var d = $('#show_mobile').val();
            var f = $('#show_contact').val();
            var p = $('#show_password').val();
            var id = $('#show_email').attr('vid');
            var data1 = {
                email: a,
                first_name: b,
                last_name: c,
                mobile: d,
                contact: f,
                password:p
            }
            $.ajax({
                type: 'PUT',
                url: "{{ url('Individuals/user') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    data1,
                    '_token': '{{ csrf_token() }}'
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

        function individualEdit(id) {
            $.ajax({
                type: 'GET',
                url: "{{ url('Individuals/user') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    data = data[0];
                    $('#show_email').val(data.email);
                    $('#show_email').attr('vid', id)
                    $('#show_firstname').val(data.first_name);
                    $('#show_lastname').val(data.last_name);
                    $('#show_mobile').val(data.mobile);
                    $('#show_contact').val(data.contact);
                    $('#show_email').attr('readonly', 'readonly');
                    $('#show_email').css('background', 'rgba(248,249,254)');
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
            $.post("{{ url('Individuals/user') }}/" + id, {
                "_method": "delete",
                "_token": "{{ csrf_token() }}"
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
@endsection
