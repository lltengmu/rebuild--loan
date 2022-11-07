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
                        <span class="ml-1">{{ $clients->first_name }}</span>
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
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">修改簡介</h4>
                        </div>
                        <div class="card-body">
                            <form id="mxForm" onsubmit="return func()" class="form-valide">
                                <div>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">登陸郵箱<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input id="email" type="text" vid='{{ $clients->id }}'
                                                            style="background: #FAFAFA;" readonly="readonly" name="email"
                                                            class="form-control" placeholder=""
                                                            value="{{ $clients->email }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">稱謂</label>
                                                    <select class="form-control" name="appellation">
                                                        @foreach ($applletions as $call)
                                                            @if ($call->id == $clients->appellation)
                                                                <option value="{{ $call->id }}" selected>{{ $call->label_tc }}</option>
                                                            @else
                                                                <option value="{{ $call->id }}">{{ $call->label_tc }}</option>
                                                            @endif  
                                                        @endforeach 
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">
                                                        姓名
                                                    </label>
                                                    <div class="input-group">
                                                        <input type="text" name="last_name" class="form-control nickname"
                                                            placeholder="" style="background: #FAFAFA;"
                                                            value="{{ $clients->last_name }}" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">名字</label>
                                                    <div class="input-group">
                                                        <input type="text" name="first_name" class="form-control"
                                                            style="background: #FAFAFA;"
                                                            value="{{ $clients->first_name }}" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">電話</label>
                                                    <div class="input-group">
                                                        <input type="text" name="mobile" class="form-control phone"
                                                            value="{{ $clients->mobile }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">出生日期</label>
                                                    <div class="input-group">
                                                        <input type="text" name="date_of_birth" class="form-control phone mdate"
                                                            value="{{ $clients->date_of_birth }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">國籍</label>
                                                    <div class="input-group">
                                                        <input type="text" name="nationality" class="form-control phone"
                                                            value="{{ $clients->nationality }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">城市</label>
                                                    <div class="input-group">
                                                        <input type="text" name="area" class="form-control phone"
                                                            value="{{ $clients->area }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">地址</label>
                                                    <div class="input-group">
                                                        <input type="text" name="addres" class="form-control phone"
                                                            value="{{ $clients->addres }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">地區</label>
                                                    <select class="form-control" name="area">
                                                        @foreach ($area as $ar)
                                                            @if ($ar->id == $clients->area)
                                                                <option value="{{ $ar->id }}" selected>{{ $ar->label_tc }}</option>
                                                            @else
                                                                <option value="{{ $ar->id }}">{{ $ar->label_tc }}</option>
                                                            @endif  
                                                        @endforeach 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">建築</label>
                                                    <div class="input-group">
                                                        <input type="text" name="building" class="form-control phone"
                                                            value="{{ $clients->building }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">樓層</label>
                                                    <div class="input-group">
                                                        <input type="text" name="floor" class="form-control phone"
                                                            value="{{ $clients->floor }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">單元</label>
                                                    <div class="input-group">
                                                        <input type="text" name="unit" class="form-control phone"
                                                            value="{{ $clients->unit }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">工作</label>
                                                    <div class="input-group">
                                                        <input type="text" name="job_status" class="form-control phone"
                                                            value="{{ $clients->job_status }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">公司名稱</label>
                                                    <div class="input-group">
                                                        <input type="text" name="company_name" class="form-control phone"
                                                            value="{{ $clients->company_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">職業</label>
                                                    <select class="form-control" name="job_status">
                                                        @foreach ($jobs as $job)
                                                            @if ($job->id == $clients->job_status)
                                                                <option value="{{ $job->id }}" selected>{{ $job->label_tc }}</option>
                                                            @else
                                                                <option value="{{ $job->id }}">{{ $job->label_tc }}</option>
                                                            @endif  
                                                        @endforeach 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">公司電話</label>
                                                    <div class="input-group">
                                                        <input type="text" name="company_contact" class="form-control phone"
                                                            value="{{ $clients->company_contact }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-4">
                                                <div class="form-group">
                                                    <label class="text-label">公司地址</label>
                                                    <div class="input-group">
                                                        <input type="text" name="company_addres" class="form-control phone"
                                                            value="{{ $clients->company_addres }}">
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            
                                            

                                        </div>
                                        <button id="submit" type="button" onclick="submit1()"
                                            class="btn btn-rounded btn-outline-primary" style="float: right;">完成</button>
                                    </section>
                                </div>
                            </form>
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
    <script src="{{ config('app.assets_path') }}/assets/js/jQuery3.6.0.js"></script>
    <script
        src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/js/jquery.dataTables.min.js">
    </script>
    <script>
        function func() {
            return false;
        }

        function showText() {
            $("#alertinfo").fadeIn(2000);
            setTimeout(function() {
                $("#alertinfo").fadeOut(2000)
            }, 3000)
        }

        function submit1() {
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
            var obj = {
                type: 'PUT',
                url: "{{ url('Clients/Profile') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    json1,
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
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }
            $.ajax(obj);
        }
    </script>
@endsection
