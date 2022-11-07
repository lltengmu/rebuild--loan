<!DOCTYPE html>
<html>

<head>
    <title>貸款申請</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">

        <div class="alert alert-success">

        </div>

        <div class="card">
            <div class="card-header text-center font-weight-bold">

            </div>
            <div class="card-body">

                <div id='error'>


                </div>
                <form name="save-form" id="save-form" method="post" action="{{ url('save-form') }}">





                    <label for="exampleInputEmail1">基本個人資料</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="exampleInputEmail1">稱謂*</label>
                                <select class="form-control" id="donationtitle">
                                    <option value="0">小姐</option>
                                    <option value="0">女士</option>
                                    <option value="0">先生</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="donationfirstname">姓氏</label>
                                <input type="text" id="donationfirstname" name="donationfirstname"
                                    class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="donationfirstname">名字</label>
                                <input type="text" id="donationfirstname" name="donationfirstname"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="mobile">電話號碼</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="col">
                                <label for="mobile">電郵地址</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="mobile">國籍</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="col">
                                <label for="mobile">出生日期（日/月/年 輸入）</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    <label for="exampleInputEmail1">住宅地址</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="mobile">單位</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="mobile">樓層</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="mobile">座數</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4 mb-2">
                                <label for="mobile">地址第一行</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="mobile">地址第二行</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="mobile">地區</label>
                                <select class="form-control" id="donationtitle">
                                    <option value="0">地區</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <br>
                    <label for="exampleInputEmail1">身分證明</label>

                    <br>
                    <label for="exampleInputEmail1">就業資料</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="mobile">職業</label>
                                <select class="form-control" id="donationtitle">
                                    <option value="0">職業</option>

                                </select>
                            </div>
                            <div class="col">
                                <label for="mobile">HK$每月收入</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="mobile">公司名稱</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="col">
                                <label for="mobile">公司電話</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="mobile">公司地址</label>
                            <input type="tel" id="mobile" name="mobile" class="form-control">
                        </div>
                    </div>

                    <br>
                    <label for="exampleInputEmail1">貸款資料</label>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="mobile">欲申請之貸款額</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                            <div class="col">
                                <label for="mobile">還款期</label>
                                <input type="tel" id="mobile" name="mobile" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <label for="mobile">貸款用途</label>
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
                    <button type="submit" class="btn btn-primary">提交申請</button>
            </div>

            </form>
        </div>
    </div>
    </div>

</body>

</html>
