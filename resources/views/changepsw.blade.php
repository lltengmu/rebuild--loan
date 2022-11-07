@extends('layouts.layout');

@section('title')
    修改密码
@endsection

@section('styles')
    <style>
        .test{
            display:block;
            position: absolute;
            left:45%;
            top:30%;
            display:flex;
            justify-content:center;
            align-items:center;
            /* width:300px; */
            height:50px;
            color:#fff;
            font-size:18px;
            border-radius:5px;
            background-color: rgba(0,0,0,.4);
            transition:1s;
        }
    </style>
@endsection
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <form id="fixpsw">
            @csrf
            <div class="form-group">
                <label><strong>舊密碼</strong></label>
                <input type="password" name="Old-Password" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label><strong>新密碼</strong></label>
                <input type="password" name="New-Password" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label><strong>確認新密碼</strong></label>
                <input type="password" name="Confirm-Password" class="form-control" value="" placeholder="">
            </div>
            <div class="text-center mt-4">
                <button id="submit" type="submit" class="btn btn-primary btn-block" style="width: 100px;float:right;">完成</button>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
<script>
    'use strict'
    function Tips(item,message,width=250){

        if(document.querySelector('div[class=test]'))return false;

        item.insertAdjacentHTML(
        'afterend',
        message
        ? `<div class="test" style="width:${width}px;">${message}</div>`
        : `<div class="test" style="width:${width}px;">請輸入${item.previousElementSibling.innerHTML}</div>`
        );
        let disappear = setTimeout(() => {
            item.parentElement.removeChild(item.nextElementSibling);
        }, 1200);
    }
    //監聽input事件
    let inputs = document.querySelectorAll('#fixpsw input[type=password]');
    inputs.forEach(item => {
        item.addEventListener('blur',function(){
            if(this.value == ''){
                Tips(this);
            }
        })
    });
    //監聽表單提交
    document.querySelector('#submit').addEventListener('click', function(e){
        e.preventDefault();
        let data = {};
        inputs.forEach(function(item){
            if(item.value === ''){
                Tips(item);
                return false;
            }
            data[`${item.getAttribute('name')}`] = item.value;
        });

        if(data['New-Password'] != data['Confirm-Password']){
            Tips(document.querySelector('input[name=Confirm-Password]'),"兩次輸入的新密碼不一致，請確認！",500);
            return false;
        }
        console.log(data);
        var obj = {
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
            },
            url: 'changepsw',
            data:data,
            dataType: 'json',
            success: function(res) {
                // console.log(res);
                if(res.success){
                    Tips(document.querySelector('body'),res.success);
                }
                Tips(document.querySelector('body'),res.error,400);
            },
            error: function(res) {
                console.log('接口出錯！');
            }
        }
        if(
            document.querySelector('input[name=Old-Password]').value
            && document.querySelector('input[name=Confirm-Password]').value 
            && document.querySelector('input[name=New-Password]').value
        ){
            $.ajax(obj)
        }else{
            return false;
        }
        
    });

    
</script>
@endsection