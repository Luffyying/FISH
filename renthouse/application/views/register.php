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
        .reg_container{
            position: absolute;
            background-color: #fff;
            padding: 0 15px;
        }
        .reg_header{
            background-color: rgb(57, 88, 154);
            text-align: center;
            color: #fff;
            padding: 20px 0;
        }
        .reg_container input{
            width: 100%;
            padding: 15px;
            margin: 5px 0;
        }
        .reg_container button{
            width: 100%;
            padding: 15px;
            margin: 5px 0;    
        }
        .check_btn{
            background-color: #fff;
            border: 1px solid rgb(255, 88, 91);
            color: rgb(255, 88, 91);
        }
        .reg_container input[type="radio"]{
            display: inline-block;
            width: auto;
        }
        #do_reg{
            background-color: rgb(255, 88, 91);
            border: none;
            color: #fff;
        }
    </style>

</head>
<body>
    <form action="">
            
        <div class="reg_container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row reg_header">注册</div>
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
                    <input type="text" placeholder="请输入昵称...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="text" placeholder="请输入密码...">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="radio">
                    <span>
                        注册即表示表示我同意wellcee的服务条款，支付服务条款、隐私、房客退款政策和房东保障金计划条款。我也同意遵守wellcee的非歧视政策。帮助我们社区打造一个包容并且尊重各种背景的人们的世界。
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" id="do_reg">注册</button>
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

