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
                url: "{{ url('Clients/Client_Case') }}",
                type: 'GET',
                // 传给服务器的数据，可以添加我们自己的查询参数
                // data: function (paraam) {
                //     return a;
                // },
                //用于处理服务器端返回的数据。 dataSrc是DataTable特有的
                dataSrc: function(myJson) {
                    // console.log(myJson);
                    myJson = myJson.filter(item => {
                        return item.service_provider != 0;
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
            columnDefs: [

                {
                    targets: [8],
                    render: function(data, type, row, meta) {
                        if (type === 'display') {
                            // console.log(row);


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


        function caseDelete(id) {
            $('#deleOnclick').attr('vid', id);
        }
        $('#deleOnclick').click(function() {
            var id = $('#deleOnclick').attr('vid');
            $('#deleOnclick').attr('data-dismiss', 'modal');
            $.post("{{ url('case') }}/" + id, {
                "_method": "delete",
                "_token": "{{ csrf_token() }}"
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
@endsection
