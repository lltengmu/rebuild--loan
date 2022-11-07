<!DOCTYPE html>
<html>
<head>
    <title>網上捐款</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container mt-4">
  <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      網上捐款
    </div>
    <div class="card-body">
	<?php echo $__env->make('shared._messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('shared._errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div id='error'>


		</div>
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="<?php echo e(url('store-form')); ?>">
       <?php echo csrf_field(); ?>
        <div class="form-group">
          <label for="donationplan">捐款計劃</label>
             <select class="form-control" id="donationplan">
			  <option selected>請選擇捐款計劃</option>
			  <option value="op1">「愛心獻保良」</option>
			  <option value="op2">保良局文化服務</option>
			  <option value="op3">保良局服飾日</option>
			  <option value="op4">保良局慈善盆菜籌募計劃</option>
			</select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">捐款金額:*</label>
            <input type="text" id="donationvalue" name="donationvalue" class="form-control" >
        </div>
		  <div class="form-row">
			<div class="col-md-4 mb-3">
          <label for="exampleInputEmail1">稱謂*</label>
             <select class="form-control" id="donationtitle">
			  <option selected>請選擇稱謂</option>
			  <option value="MR.">先生</option>
			  <option value="Miss">小姐</option>

			</select>
			</div>
			<div class="col-md-4 mb-3">
			  <label for="donationlastname">善長姓氏*</label>
			   <input type="text" id="donationlastname" name="donationlastname" class="form-control" >
			</div>
			<div class="col-md-4 mb-3">
          <label for="donationfirstname">善長名字*</label>
            <input type="text" id="donationfirstname" name="donationfirstname" class="form-control" >
			</div>
		  </div>

        <div class="form-group">
          <label for="mobile">電話號碼*</label>
            <input type="tel" id="mobile" name="mobile" class="form-control" >
        </div>
        <div class="form-group">
          <label for="donationemail">電郵地址*</label>
            <input type="email" id="email" name="email" class="form-control" >
        </div>
        <div class="form-group">
          <label for="donationeaddress">地址</label>
            <input type="text" id="donationeaddress" name="donationeaddress" class="form-control" >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">為協助本局更有效運用資源，請選出你從哪個媒體知道是項捐款項目：(可選多於一項)</label>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
			  <label class="form-check-label" for="defaultCheck1">
				保良局網頁
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
			  <label class="form-check-label" for="defaultCheck1">
				電子通訊
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
			  <label class="form-check-label" for="defaultCheck1">
				保良局刊物
			  </label>
			</div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">捐款途徑:*</label>
			<div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
			  <label class="form-check-label" for="inlineRadio1">Visa</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
			  <label class="form-check-label" for="inlineRadio2">MasterCard</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
			  <label class="form-check-label" for="inlineRadio3">支付寶HK</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
			  <label class="form-check-label" for="inlineRadio3">八達通</label>
			</div>
			</div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">個人資料收集聲明:</label>
            <div class="form-check">
			  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
			  <label class="form-check-label" for="flexCheckDefault">
				本人不欲收取任何保良局上述的宣傳郵件。
			  </label>
			</div>
        </div>
       <!-- <button type="submit" class="btn btn-primary">提交捐款</button>-->
                <button type="button" onclick="checkvalue()" class="btn btn-primary  btn-sm" id="btn_send"
                        style="width:auto; margin-left:5px;">提交捐款</button>
      </form>
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
 /*           $.ajax({
                type: 'POST',
                url: "<?php echo e(route('checkemailormpbile')); ?>",
                data: {'email': email, 'mobile': mobile},
                dataType: 'text',
                success: function (data) {
                    // $("#org").append(data);
                    console.log('check return', data);
                    if (data) {
                        clickonetime();
                        //console.log('result'+btnsave);
                        document.form.submit();
                    } else {
                       // result.push("Client already exist");
                      //  text += '<div class="alert alert-danger"><ul>';
                       // for (const val of result) {
                       //     text += "<li>" + val + "</li>";
                       // }

                        text += '</ul></div>';
                        document.getElementById("error").innerHTML = text;
                        console.log('false');
						document.getElementById("donationplan").focus();
                    }
                }, error: function () {
                }
            });
 */
 }
    </script>
    <?php echo $__env->make('shared._confirm',['title_send'=>'Confirm','content_send'=>'confirm send?'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp64\htdocs\laravel\resources\views/donate-form.blade.php ENDPATH**/ ?>