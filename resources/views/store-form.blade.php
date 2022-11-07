<!DOCTYPE html>
<html>
<head>
    <title>網上捐款</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      網上捐款
    </div>
    <div class="card-body">
	@include('shared._messages')
	@include('shared._errors')
		<div id='error'>


		</div>
 
    </div>
  </div>
</div> 
    <script>
        function test() {
            console.log('checkvalue result', checkvalue());

        }

        function checkvalue() {
            var mobile = document.getElementById("mobile").value;
            let email = document.getElementById("email").value;
            let first_name = document.getElementById("donationfirstname").value;
            let last_name = document.getElementById("donationlastname").value;
          //  let nickname = document.getElementById("nickname").value;;
            const result = [];
            text = '';
            var returnresult = false;
            if ((mobile == "" && email == "") || (first_name == "" && last_name == "" )) {
                if (first_name == "" && last_name == "") {
                    result.push("English firsh name / English last name / nickname must be fill in one");
                }
                if (mobile == "" && email == "") {
                    result.push("Mobile / Email must be fill in");
                }



                text += '<div class="alert alert-danger"><ul>';
                for (const val of result) {
                    text += "<li>" + val + "</li>";
                }

                text += '</ul></div>';

                console.log(text);
                document.getElementById("error").innerHTML = text;
                console.log('false');
                document.getElementById("donationplan").focus();

                return false;
            }else{
				//clickonetime();
				//console.log('result'+btnsave);
				$('#add-blog-post-form').submit();
			}
 
 }
    </script>
    @include('shared._confirm',['title_send'=>'Confirm','content_send'=>'confirm send?'])
</body>
</html>