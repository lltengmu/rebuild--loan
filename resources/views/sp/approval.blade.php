@extends('layouts.default')

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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">審批管理</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pending</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {{-- <button type="button" style="margin-bottom: 30px;" onclick="addIndividual()"
                                class="btn btn-rounded btn-outline-primary " id="addIndividual" data-toggle="modal"
                                data-target="#exampleModalLong">創建貸款
                            </button> --}}


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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Approved / Rejected</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                {{-- <button type="button" style="margin-bottom: 30px;" onclick="addIndividual()"
                                class="btn btn-rounded btn-outline-primary " id="addIndividual" data-toggle="modal"
                                data-target="#exampleModalLong">創建貸款
                            </button> --}}
                                <table id="casetable1" class="display" style="min-width: 845px">
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
    <button style="display: none" id="remark" type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#exampleModalCenter">Modal
        centered</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">備注</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-row" id="pay_information">
                            <div class="col-md-6 mb-2">
                                <label for="mobile">支付日期</label><span style="color: red">*</span>
                                <input type="tel" id="date_of_pay" name="date_of_pay" class="form-control mdate">
                            </div>
                            <div class="col-md-6 mb-2 loan_interest">
                                <label for="mobile">貸款利息</label><span style="color: red">*</span>
                                <span style="display: flex;align-items:center;">
                                    <input type="tel" id="loan_interest" name="loan_interest" class="form-control" style="width:90%;"><span style="font-size: 1.3rem;margin-left:5px;">%</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <label for="mobile">備注</label><span style="color: red">*</span>
                    <textarea name="template_text" class="form-control" rows="4" id="comment"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                    <button id="edit1" onclick="edit1()" type="button" class="btn btn-primary">確認</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm-del" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">你確定要驳回這個贷款嗎？</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">請仔細選擇..</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-outline-secondary" id="deleOnclickCancel"
                        data-dismiss="modal">取消
                    </button>
                    <button type="button" class="btn btn-rounded btn-outline-primary" id="rejectOnclick">確認
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
                url: "{{ url('Sp/spapproval') }}",
                type: 'GET',
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
                    "data": "update_datetime",
                    "defaultContent": "",
                    "visible": false,
                }, {
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
                    "width": "280",
                }

            ],
            columnDefs: [

                {
                    targets: [9],
                    render: function(data, type, row, meta) {
                        if (type === 'display') {
                            // console.log(row);
                            return '<div><select style="max-width:200px;display:inline-block;margin-right:3%;"  value="" id="actStatus' +
                                row.id +
                                '" onchange="edit(' + row.id +
                                ');"  class="form-control form-control-sm">' +
                                '<option value="2" ' + (String)(row.status == 2 ? "selected" : "") +
                                '>請選擇</option>' +
                                '<option value="3" ' + (String)(row.status == 3 ? "selected" : "") +
                                '>同意</option>' +
                                '<option value="5" ' + (String)(row.status == 5 ? "selected" : "") +
                                '>拒絕</option>' +
                                '</select><button style="margin-right: 15px;" class="btn btn-rounded btn-outline-danger " onclick="caseReject(' +
                                row.id +
                                ');" data-toggle="modal" data-target=".bd-example-modal-sm-del" type="button">驳回</button></div>';
                        }
                        return data;
                    },
                },
            ],
        });
        let casetable1 = $('#casetable1').DataTable({
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
                url: "{{ url('sp/spapproval') }}",
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
                    "data": "update_datetime",
                    "defaultContent": "",
                    "visible": false,
                }, {
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
                }
            ],
            columnDefs: [{
                targets: [9],
                render: function(data, type, row, meta) {
                    if (type === 'display') {
                        // console.log(row);
                        return '<div><button id="export" type="button" style="margin-right: 15px;" onclick="Cancel(' +
                            row.id +
                            ')" class="btn btn-rounded btn-outline-primary">撤回操作</button>';

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

        function Cancel(id) {
            var obj = {
                type: 'POST',
                url: "{{ url('sp/cancel') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
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
                    casetable.ajax.reload();
                    casetable1.ajax.reload();
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }
            $.ajax(obj);
        }




        $('#rejectOnclick').click(function() {
            var id = $('#rejectOnclick').attr('vid');
            $('#rejectOnclick').attr('data-dismiss', 'modal');

            var obj = {
                type: 'GET',
                url: "{{ url('Sp/spapproval') }}/" + id + '/edit',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    id,
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
                    casetable.ajax.reload();
                    casetable1.ajax.reload();
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }
            $.ajax(obj);
        })

        function caseReject(id) {
            $('#rejectOnclick').attr('vid', id)
        }

        function edit(id) {
            $('#pay_information input').val('');
            $('#comment').val('');
            var sta = '#actStatus' + id + ' option:selected';
            var status = $(sta).val();
            // console.log(status);
            if (status == 5) {
                $('#pay_information').hide()
            }else{
                $('#pay_information').show()
            }
            if (status == 2) {} else {
                $('#remark').click();
                $('#edit1').attr('vid', id);
            }
        }
        document.querySelector("#loan_interest").addEventListener("input",function(event){
            !document.querySelector('.loan_interest-error') && $(".loan_interest").append('<div class="loan_interest-error" class="error" style="color:red;display:none;" for="newpwd" style="">請輸入0~100的数字</div>')
            let istrue = document.querySelector('.loan_interest-error')
            if(Number.isNaN(Number(event.target.value)) || (event.target.value >100 || event.target.value < 0)){
                istrue.style.display = 'block'
            }else{
                istrue.style.display = 'none'
            }
        })
        function edit1() {
            $('#edit1').attr('data-dismiss', 'modal');
            let id = $('#edit1').attr('vid');
            var sta = '#actStatus' + id + ' option:selected';
            var status = $(sta).val();
            let loan_interest = $('#loan_interest').val();
            let date_of_pay = $('#date_of_pay').val();
            var content = $('#comment').val();
            if(Number.isNaN(Number(loan_interest))){
                document.querySelector('.loan_interest-error').style.display = 'block'
                $('#changeText').html("贷款利息输入错误");
                $('#changeText1').html('錯誤!');
                $('#alertinfo1').attr('class', 'alert alert-danger')
                showText();
                return false;
            }else{
                document.querySelector('.loan_interest-error').style.display = 'none'
            }
            // console.log(content);
            var obj = {
                type: 'PUT',
                url: "{{ url('Sp/spapproval') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    status,
                    loan_interest,
                    date_of_pay,
                    content,
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
                        if (data.spagree) {
                            sendmail(data.clientUser, '服務提供商' + data.spagree + '您的贷款,備注：' + content, 'sp');
                        }

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
                    casetable1.ajax.reload();
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }
            $.ajax(obj);
        }


        function sendmail(id, send = '', category) {
            var content = send;
            var data = {
                content,
                id,
                category
            };
            $.ajax({
                type: 'get',
                url: "{{ url('mail/send') }}",
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
    </script>
@endsection
