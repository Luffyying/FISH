<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/dialog.css">
    <style>
        #header{
            position: relative;
            background: transparent;
            box-shadow: 0 0 0 0;
        }
        #header-menu #header-nav li a{
            color: #f0f0f0;
            text-decoration: none;
        }
        #header-menu #header-nav .break{
            color: #fff;
        }
        #header .shadow {
            background: transparent;
        }
        #header-menu #header-nav li{
            float: right;
        }
    </style>
</head>
<body>
    <div id="background">
<?php //include 'header.php';?>
        <div id="header">
            <div class="container">
                <div id="header-menu">
                    <ul id="header-nav" class="header-nav">
                        <li><a id="register" href="javascript:;">注册</a></li>
                        <li class="break">|</li>
                        <li><a id="login" href="javascript:;">登录</a></li>
                    </ul>
                </div>
            </div>
            <div class="shadow"></div>
        </div>
        <div class="container">
            <p class="logo"><img src="img/index_logo.png" alt=""></p>
            <div class="content">
                <div class="content-wrapper">
                    <div class="input">
                        <div id="position">
                            <div class="position-wrapper">
                                <span>法国</span>
                                <div class="text">巴黎</div>
                                <span class="caret"></span>
                            </div>
                        </div>
                        <div id="position-menu-wrapper">
                            <div class="Franch">法国</div>
                            <div class="menu-wrapper">
                                <ul class="menu" role="menu">
                                    <li>巴黎</li>
                                    <li>马赛</li>
                                    <li>里昂</li>
                                    <li>图卢兹</li>
                                    <li>南特</li>
                                    <li>波尔多</li>

                                </ul>
                            </div>
                        </div>
                        <input type="hidden" class="town">
                        <input class='tit' type="text" placeholder="请输入你的学校或位置">
                        <button id='sub' type="button">前往定制&nbsp&nbsp&gt</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php //include 'footer.php';?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/require.js" data-main="js/index.js"></script>
<!--<script src="js/index.js"></script>-->
<script src="js/header.js"></script>
<script src="js/footer.js"></script>
</body>
</html>