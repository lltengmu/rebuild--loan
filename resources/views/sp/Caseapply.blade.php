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
                                {{-- <button type="button" style="margin-bottom: 30px;" onclick="addIndividual()"
                                    class="btn btn-rounded btn-outline-primary " id="addIndividual" data-toggle="modal"
                                    data-target="#exampleModalLong">創建貸款
                                </button> --}}
                                <form action="{{ url('individual/caseImport') }}" method="POST"
                                    enctype="multipart/form-data" style="display:inline">
                                    @csrf
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
                    {{-- <button style="margin-right: 15px;float: right" class="btn btn-rounded btn-outline-primary "
                        onclick="Import_file()" type="button" data-toggle="modal"
                        data-target="#exampleModalCenter">上傳文件</button> --}}
                </div>;
            </div>
            {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
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
                                                <input type="tel" id="email" name="email"
                                                    class="form-control">
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
                                                <input type="tel" id="unit" name="unit"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="floor">樓層</label><span style="color: red">*</span>
                                                <input type="tel" id="floor" name="floor"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile4">座數</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile4" name="mobile4"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地址第一行</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile3" name="mobile3"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="mobile">地址第二行</label><span style="color: red">*</span>
                                                <input type="tel" id="mobile2" name="mobile2"
                                                    class="form-control">
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
                                                <input type="tel" id="HKID" name="HKID" class="form-control"
                                                    value="" style="background-color:rgba(248,249,254);" readonly>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <label for="service_provider">服務提供商</label><span
                                                    style="color: red">*</span>
                                                <input type="company_id" id="company_id" name="company_id"
                                                    class="form-control" value="">
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
                                                <input type="tel" id="mobile1" name="mobile1"
                                                    class="form-control">
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
                                            <select class="form-control" id="donationtitle">
                                                <option value="0">貸款用途</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <label for="mobile">備注</label><span style="color: red">*</span>
                                            <textarea name="template_text" class="form-control" rows="4" id="comment" readonly></textarea>
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
                url: "{{ url('Sp/caseapply') }}",
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
                url: "{{ url('sp/getFileUrl') }}/" + id,
                success: function(data) {

                    // console.log(data);
                    $('#getfile').html('');
                    if (data == '未上傳文件') {
                        $('#getfile').append('<li class="list-group-item">' + data + '</li>');
                        return false;
                    }
                    for (var i = 0; i < data.length; i++) {
                        let fileName = data[i].upload_file.split('/');
                        $('#getfile').append('<a href="{{ config('app.assets_path') }}/' + data[i]
                            .upload_file + '"><li class="list-group-item">'+ fileName[4]+'/' + fileName[5] +
                            '</li></a>');
                    }
                    // if (!data) {
                    //     alert('此用戶未上傳文件');
                    // } else {
                    // window.location.href = "{{ config('app.assets_path') }}/" + data;
                    // }
                },
            });
        }

        function checkBox(id) {
            var obj = {
                type: 'get',
                url: "{{ url('individual/exportLog') }}/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if(data){
                        window.location.href = "{{ url('individual/caseExcel') }}/" + id;
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
                url: "{{ url('individual/getAllid') }}/" + 1,
                success: function(data) {
                    let checkbox = data.join("&");
                    // console.log(checkBox);
                    window.location.href = "{{ url('individual/caseExcel') }}/" + checkbox;
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
            $('#mxForm input').attr('readonly', 'readonly');
            $('#mxForm input').css('background', 'rgba(248,249,254)');
            $.ajax({
                type: 'GET',
                url: "{{ url('case') }}/" + id,
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
                    $('#addres').val(data.addres);
                    $('#address1').val(data.address1);
                    $('#address2').val(data.address2);
                    $('#company_name').val(data.company_name);
                    $('#company_contact').val(data.company_contact);
                    $('#company_name').val(data.company_name);
                    $('#company_addres').val(data.company_addres);
                    $('#loan_amount').val(data.loan_amount);
                    $('#repayment_period').val(data.repayment_period);
                    $('#HKID').attr('vid', id)
                    $('#company_id').val(data.name);
                    $('#comment').val(data.case_remark);
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
    </script>
@endsection
