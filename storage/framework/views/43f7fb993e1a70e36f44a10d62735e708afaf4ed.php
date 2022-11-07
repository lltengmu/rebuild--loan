<!DOCTYPE html>
<html>
<head>
    <title>貸款申請</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
    <div class="card-body">

		<div id='error'>
		</div>
      <form action="<?php echo e(Route('store')); ?>" method="post" name="form">


       
      <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        
        <label for="exampleInputEmail1">基本個人資料</label>
        <div class="form-group">
		  <div class="form-row">
			<div class="col-md-4 mb-3">
          <label for="exampleInputEmail1">稱謂*</label>
             <select class="form-control" id="marital_status">
			         <option value="0">小姐</option>
               <option value="1">女士</option>
               <option value="2">先生</option>
			      </select>
			</div>
			<div class="col-md-4 mb-3">
          <label for="donationfirstname">姓氏</label>
            <input type="text" id="last_name" name="last_name" class="form-control" >
			</div>
      <div class="col-md-4 mb-3">
          <label for="donationfirstname">名字</label>
            <input type="text" id="first_name" name="first_name" class="form-control" >
			</div>
		  </div>
      </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label for="mobile">電話號碼</label>
              <input type="tel" id="mobile" name="mobile" class="form-control" >
            </div>
            <div class="col">
              <label for="mobile">電郵地址</label>
              <input type="tel" id="email" name="email" class="form-control" >
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label for="mobile">國籍</label>
              <input type="tel" id="nationality" name="nationality" class="form-control" >
            </div>
            <div class="col">
              <label for="mobile">出生日期（日/月/年 輸入）</label>
              <input type="tel" id="date_of_birth" name="date_of_birth" class="form-control" >
            </div>
          </div>
        </div>
        <br>
        <label for="exampleInputEmail1">住宅地址</label>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-4 mb-2">
              <label for="mobile">單位</label>
              <input type="tel" id="unit" name="unit" class="form-control" >
            </div>
            <div class="col-md-4 mb-2">
              <label for="mobile">樓層</label>
              <input type="tel" id="floor" name="floor" class="form-control" >
            </div>
            <div class="col-md-4 mb-2">
              <label for="mobile">座數</label>
              <input type="tel" id="building" name="building" class="form-control" >
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
            <div class="col-md-4 mb-2">
              <label for="mobile">地址第一行</label>
              <input type="tel" id="addres" name="addres" class="form-control" >
            </div>
            <div class="col-md-4 mb-2">
              <label for="mobile">地址第二行</label>
              <input type="tel" id="mobile" name="mobile" class="form-control" >
            </div>
            <div class="col-md-4 mb-2">
              <label for="mobile">地區</label>
              <select class="form-control" id="area">
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
              <select class="form-control" id="job_status">
			         <option value="0">職業</option>

			      </select>
            </div>
            <div class="col">
              <label for="mobile">HK$每月收入</label>
              <input type="tel" id="mobile" name="mobile" class="form-control" >
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label for="mobile">公司名稱</label>
              <input type="tel" id="company_name" name="company_name" class="form-control" >
            </div>
            <div class="col">
              <label for="mobile">公司電話</label>
              <input type="tel" id="company_contact" name="company_contact" class="form-control" >
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
              <label for="mobile">公司地址</label>
              <input type="tel" id="company_addres" name="company_addres" class="form-control" >
          </div>
        </div>
        
        <br>
        <label for="exampleInputEmail1">貸款資料</label>
        <div class="form-group">
          <div class="form-row">
            <div class="col">
              <label for="mobile">欲申請之貸款額</label>
              <input type="tel" id="loan_amout" name="loan_amout" class="form-control" >
            </div>
            <div class="col">
              <label for="mobile">還款期</label>
              <input type="tel" id="repayment_period" name="repayment_period" class="form-control" >
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
              <label for="mobile">貸款用途</label>
              <select class="form-control" id="">
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

 </div>
        
      </form>
      <button id="btn_submit" class="btn btn-primary">提交申請</button>
    </div>
  </div>
</div> 

</body>
</html>
<script>
$('#btn_submit').click(function () {
            $check = checkvalue();
            //console.log('result'+$check);
            if ($check == true) {
                //console.log('result'+btnsave);
                console.log('true');
                document.form.submit();
            }
        });

function checkvalue() {
  var last_name = document.getElementById("last_name").value;
  var first_name = document.getElementById("first_name").value;
  var mobile = document.getElementById("mobile").value;
  var email = document.getElementById("email").value;
  var nationality = document.getElementById("nationality").value;
  var date_of_birth = document.getElementById("date_of_birth").value;
  var unit = document.getElementById("unit").value;
  var floor = document.getElementById("floor").value;
  var building = document.getElementById("building").value;
  var addres = document.getElementById("addres").value;
  var area = document.getElementById("area").value;
  var addres = document.getElementById("addres").value;
  var company_name = document.getElementById("company_name").value;
  var company_contact = document.getElementById("company_contact").value;
  var company_addres = document.getElementById("company_addres").value;
  var loan_amout = document.getElementById("loan_amout").value;
  var repayment_period = document.getElementById("repayment_period").value;
  var marital_status = document.getElementById("marital_status").value;
  var area = document.getElementById("area").value;
  var job_status = document.getElementById("job_status").value;
  text = '';
  const result = [];

  if(last_name=="" || first_name=="" || mobile=="" || email=="" || nationality=="" || date_of_birth=="" || unit=="" || floor=="" || building=="" || addres=="" || company_name=="" || company_contact=="" || company_addres=="" || loan_amout=="" || repayment_period==""){
    console.log(marital_status);
    if(last_name==""){result.push("姓氏必須輸入");}
    if(first_name==""){result.push("名字必須輸入");}
    if(mobile==""){result.push("電話必須輸入");}
    if(email==""){result.push("電郵必須輸入");}
    if(nationality==""){result.push("國籍必須輸入");}
    if(date_of_birth==""){result.push("生日日期必須輸入");}
    if(unit==""){result.push("單位必須輸入");}
    if(floor==""){result.push("樓層必須輸入");}
    if(building==""){result.push("座數/大廈必須輸入");}
    if(company_name==""){result.push("公司名字必須輸入");}
    if(company_contact==""){result.push("公司電話必須輸入");}
    if(company_addres==""){result.push("公司地址必須輸入");}
    if(loan_amout==""){result.push("貸款額必須輸入");}
    if(repayment_period==""){result.push("還款期必須輸入");}

    text += '<div class="alert alert-danger"><ul>';
    for (const val of result) {
      text += "<li>" + val + "</li>";
    }
    text += '</ul></div>';
    document.getElementById("error").innerHTML = text;
    document.documentElement.scrollTop = 0;
    return false;
  }

  return true;
}
</script><?php /**PATH /home/customer/www/fullygreatasia.admatrix-ai.com/public_html/laravel3/resources/views/loan.blade.php ENDPATH**/ ?>