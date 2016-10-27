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
        .forg_container{
            position: absolute;
            background-color: #fff;
            padding: 0 15px;
        }
        .forg_header{
            background-color: rgb(57, 88, 154);
            text-align: center;
            color: #fff;
            padding: 20px 0;
        }
        .desc{
            text-indent: 10px;
        }
        .forg_container input{
            width: 100%;
            padding: 15px;
            margin: 5px 0;
        }
        .forg_container button{
            width: 100%;
            padding: 15px;
            margin: 5px 0;    
        }
        .check_btn{
            background-color: #fff;
            border: 1px solid rgb(255, 88, 91);
            color: rgb(255, 88, 91);
        }
        .forg_container input[type="radio"]{
            display: inline-block;
            width: auto;
        }
        #reset{
            background-color: rgb(255, 88, 91);
            border: none;
            color: #fff;
        }
    </style>

</head>
<body>
    <form action="">
            
        <div class="forg_container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row forg_header">忘记密码</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    
                    <p class="desc">
                        请输入与您的账号关联的电话号码，我们会给您发送验证代码来重置密码。
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <input type="text" placeholder="电子邮箱地址/手机号...">
                </div>
                <div class="col-md-4">
                    <button class="check_btn" type="button" >发送验证码</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <input type="number" placeholder="验证码...">
                </div>
                <!-- <div class="col-md-4">
                    <span >验证通过！</span>
                </div> -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" placeholder="请输入密码...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" placeholder="请再次输入密码...">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="reset">重置密码</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <span>已经拥有wellcee账号了吗？</span>
                    <a href="">登陆</a>
                </div>
            </div>
            
        </div>
    </form>


<script>
    
</script>
</body>
</html>

