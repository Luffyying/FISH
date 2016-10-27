<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" rel="stylesheet">

    <title>注册</title>
    <style>
        .login_container{
            position: absolute;
            background-color: #fff;
            width: 400px;
            padding: 0 15px;
        }
        .login_header{
            background-color: rgb(57, 88, 154);
            text-align: center;
            color: #fff;
            padding: 20px 0;
        }
        .login_container input{
            width: 100%;
            padding: 15px;
            margin: 5px 0;
        }
        .login_container button{
            width: 100%;
            padding: 15px;
            margin: 5px 0;    
        }
        .check_btn{
            background-color: #fff;
            border: 1px solid red;
            color: red;
        }
        .login_container input[type="checkbox"]{
            display: inline-block;
            width: auto;
            vertical-align: middle;
        }
        #do_login{
            background-color: rgb(255, 88, 91);
            border: none;
            color: #fff;
        }
        #username{
            background-image: url(img/common/email.png);
            background-repeat: no-repeat;
            background-position: center right;
            background-size: 30px 30px;
            background-origin:content-box;
        }
        #password{
            background-image: url(img/common/password.png);
            background-repeat: no-repeat;
            background-position: center right;
            background-size: 30px 30px;
            background-origin:content-box;
        }
    </style>

</head>
<body>
    <form action="">
            
        <div class="login_container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row login_header">登陆</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <input id="login_username" type="text" placeholder="请输入邮件地址或手机号..." required="required">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input id="login_password" type="password" placeholder="请输入密码..." required="required">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input id="login_rem" type="checkbox" ><span>记住我</span>
                    <a href="">忘记密码</a>
                </div>
            </div>
          
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="do_login">登陆</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <span>还没有账号吗？</span>
                    <a id="to_reg" href="">注册</a>
                </div>
            </div>
            
        </div>
    </form>
<script src="js/jquery.js"></script>
<script>
    $(function(){
        //焦点离开时验证
        $('#login_username').on('blur', function(){
            var $that = $(this);
            var $username = $that.val();
            if( /^(13[0-9]{9})|(15[89][0-9]{8})$/.test($username) ){
                $.post('welcome/check_tel', {
                    tel: $username
                }, function(data){
                    data=='false' ? alert('电话不存在！') : alert('电话存在！');
                }, 'text');
            }else if( /\w+@\w*\.\w+/.test($username) ){
                $.post('welcome/check_email', {
                    email: $username
                }, function(data){
                    console.log($username);
                    data=='false' ? alert('email不存在！') : alert('email存在！');
                }, 'text');
            }else{
                alert('请输入有效邮件地址或手机号');
            }
        });
        //登陆验证
        $('#do_login').on('click', function(){
            if($('#login_username').val()=='' || $('#login_password').val()==''){
                alert('请填写登陆信息');
            }else{
                $.post('welcome/check_login', {
                    username: $('#login_username').val(),
                    password: $('#login_password').val() 
                }, function(data){
                    if(data=='true'){
                        alert('success');
                        window.location.reload(); 
                    }else{
                        alert('您输入的信息有误！');
                    }
                }, 'text');
            } 
        });

    });
</script>
</body>
</html>

