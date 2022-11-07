<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>設置密碼</title>
    <!-- Favicon icon -->
    <link href="{{ config('app.assets_path') }}/assets/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- focus style --}}
    <link href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/css/style.css"
        rel="stylesheet">
    <link
        href="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/css/jquery.dataTables.min.css"
        rel="stylesheet">

</head>


<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">設置密碼</h4>
                                    <form onsubmit="return func()" method='PUT'>
                                        <div class="form-group">
                                            <label><strong>密碼</strong></label>
                                            <input id="password" type="password" class="form-control " name="password"
                                                placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>重複密碼</strong></label>
                                            <input id="repeated_password" type="password" class="form-control "
                                                name="repeated_password" placeholder="" value="">
                                        </div>

                                        <div class="text-center">
                                            <button id="success" vid='{{ $id }}' type="submit"
                                                class="btn btn-primary btn-block">提交</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container-fluid -->
    <!-- Common JS -->
    <script src="{{ config('app.assets_path') }}/assets/js/jQuery3.6.0.js"></script>
    <script src="{{ config('app.assets_path') }}/assets/js/jquery.dataTables.min.js"></script>
    {{-- Focus --}}
    <script
        src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/global/global.min.js">
    </script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/quixnav-init.js">
    </script>
    <script src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/custom.min.js">
    </script>
    <script
        src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/vendor/datatables/js/jquery.dataTables.min.js">
    </script>
    <script
        src="{{ config('app.assets_path') }}/assets/focus-premium/themes/focus-premium/focus/js/plugins-init/datatables.init.js">
    </script>
</body>
<script>
    function func() {
        return false;
    }
    $(document).ready(function() {

        $('#success').click(function() {

            let psw = $('#password').val();
            let repsw = $('#repeated_password').val();
            let id = $('#success').attr('vid');
            var obj = {
                type: 'PUT',
                url: "{{ url('api/Verification') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
                },
                data: {
                    psw,
                    '_token': '{{ csrf_token() }}'
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    if (data) {
                        alert('設置成功');
                        window.location.replace("{{ url('clients/login') }}");
                    }
                },
                error: function() {
                    console.log('调用接口出错了');
                }
            }
            if (psw && repsw) {
                $('.password-error').remove();
                $('.repeated_password-error').remove();
                if (psw == repsw) {
                    $('.repeated_password-error').remove();
                    $.ajax(obj);
                } else {
                    $('.repeated_password-error').remove();
                    $('#repeated_password').addClass('error');
                    $('#repeated_password').parent('div').append(
                        '<div class="repeated_password-error" class="error" style="color:red" for="newpwd" style="">密碼不一致</div>'
                    );
                    var t = $("#repeated_password").offset().top;
                    $(window).scrollTop(t);
                }

            } else {
                if (!psw) {
                    $('.password-error').remove();
                    $('#password').addClass('error');
                    $('#password').parent('div').append(
                        '<div class="password-error" class="error" style="color:red" for="newpwd" style="">密碼不能爲空</div>'
                    );
                    var t = $("#password").offset().top;
                    $(window).scrollTop(t);
                } else {
                    $('.password-error').remove();
                }
                if (!repsw) {
                    $('.repeated_password-error').remove();
                    $('#repeated_password').addClass('error');
                    $('#repeated_password').parent('div').append(
                        '<div class="repeated_password-error" class="error" style="color:red" for="newpwd" style="">密碼不能爲空</div>'
                    );
                    var t = $("#repeated_password").offset().top;
                    $(window).scrollTop(t);
                } else {
                    $('.repeated_password-error').remove();
                }

            }
        })

    });
</script>

</html>
