<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />
    <title>Focus Admin: Widget</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{ config('app.assets_path') }}/assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="{{ config('app.assets_path') }}/assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="{{ config('app.assets_path') }}/assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="{{ config('app.assets_path') }}/assets/css/lib/helper.css" rel="stylesheet">
    <link href="{{ config('app.assets_path') }}/assets/css/style.css" rel="stylesheet">
    <script src="{{ config('app.assets_path') }}/assets/js/jQuery3.6.0.js"></script>

</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo" style="padding-bottom: 30px">
                            {{-- <a href="index.html"><span>Focus</span></a> --}}
                        </div>
                        <div class="login-form">
                            <h4>Individual Login</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger" style="background-color: rgba(242,86,97)">
                                    <ul style="padding-left:2%">
                                        @if (is_object($errors))
                                            @foreach ($errors->all() as $error)
                                                <li style="color: white;list-style:disc">{{ $error }}</li>
                                                @break
                                            @endforeach
                                        @else
                                            <li style="color: white;list-style:disc">{{ $error }}</li>
                                        @endif
                                    </ul>
                                </div>

                            @endif
                            <form id="mxform" action="{{ url('individual/doLogin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>郵箱</label>
                                    <input id="email" type="text" value="" name="email"
                                        class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>密碼</label>
                                    <input id="psw" type="password" name="psw" class="form-control"
                                        placeholder="Password">
                                </div>
                                <label>驗證碼</label>

                                <div class="form-group row" style="margin-left:0 ">
                                    <input id="captcha" style="width:50%" type="text" name="captcha" class="form-control" placeholder="驗證碼">
                                    <img id="captcha1" src="{{ url('captcha') }}" alt="" style="float: right" onclick="this.src=`{{ url('captcha') }}?${Math.random()}`" />
                                </div>

                                <div class="checkbox">
                                    {{-- <label>
                                        <input type="checkbox"> 記住他
                                    </label> --}}
                                    <label class="pull-right">
                                        <a href="#">忘記密碼?</a>
                                    </label>

                                </div>
                                <button id="Login" type="submit"
                                    class=" btn btn-primary btn-flat m-b-30 m-t-30">登錄</button>
                                {{-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button"
                                            class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i
                                                class="ti-facebook"></i>Sign in with facebook</button>
                                        <button type="button"
                                            class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i
                                                class="ti-twitter"></i>Sign in with twitter</button>
                                    </div>
                                </div> --}}
                                {{-- <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                                </div> --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $("#captcha1").attr(
            "src",
            "{{ url('captcha') }}?" + Math.random()
        );
    </script>
    {{-- <script>
        $('#Login').click(function() {
            var email = $('#email').val();
            var psw = $('#psw').val();
            var captcha = $('#captcha').val();
            var obj = {
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: "{{ url('individual/list') }}",
                data: {
                    email: email,   
                    psw: psw,
                    captcha: captcha
                },
                dataType: 'json',
                success: function(res) {
                    console.log(res);
                },
                error: function(res) {
                    console.log('登陆失败');
                }
            }
            $.ajax(obj);
        })
    </script> --}}
</body>

</html>
