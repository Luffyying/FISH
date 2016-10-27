<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>房源管理</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <base href="<?php echo site_url();?>">
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>

<?php include "header.php"?>

<div class="am-cf admin-main">

    <?php include "sidebar.php"?>

    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">个人资料</strong> / <small>Personal information</small></div>
            </div>

            <hr/>
            <div class="am-g">

                <div class="am-u-sm-12 am-u-md-8 ">
<!--                    <form action="admin/welcome/save_house" method="post" class="am-form am-form-horizontal">-->
                    <form method="post" class="am-form am-form-horizontal">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">房源标题 / Title</label>
                            <div class="am-u-sm-9">
                                <input name="title" type="text" id="user-name" placeholder="姓名 / Name">
<!--                                <small>输入你的名字，让我们记住你。</small>-->
                            </div>
                        </div>

<!--                        <div class="am-form-group">-->
<!--                            <label for="user-email" class="am-u-sm-3 am-form-label">电子邮件 / Email</label>-->
<!--                            <div class="am-u-sm-9">-->
<!--                                <input type="email" id="user-email" placeholder="输入你的电子邮件 / Email">-->
<!--                                <small>邮箱你懂得...</small>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="am-form-group">-->
<!--                            <label for="user-phone" class="am-u-sm-3 am-form-label">电话 / Telephone</label>-->
<!--                            <div class="am-u-sm-9">-->
<!--                                <input type="tel" id="user-phone" placeholder="输入你的电话号码 / Telephone">-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="am-form-group">-->
<!--                            <label for="user-QQ" class="am-u-sm-3 am-form-label">QQ</label>-->
<!--                            <div class="am-u-sm-9">-->
<!--                                <input type="number" pattern="[0-9]*" id="user-QQ" placeholder="输入你的QQ号码">-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="am-form-group">-->
<!--                            <label for="user-weibo" class="am-u-sm-3 am-form-label">微博 / Twitter</label>-->
<!--                            <div class="am-u-sm-9">-->
<!--                                <input type="text" id="user-weibo" placeholder="输入你的微博 / Twitter">-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="am-form-group">-->
<!--                            <label for="user-intro" class="am-u-sm-3 am-form-label">简介 / Intro</label>-->
<!--                            <div class="am-u-sm-9">-->
<!--                                <textarea class="" rows="5" id="user-intro" placeholder="输入个人简介"></textarea>-->
<!--                                <small>250字以内写出你的一生...</small>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
                        <div class="am-form-group">
                            <div class="am-u-sm-3 am-u-sm-push-3 ">
                                <button type="button"  class="submit-btn am-btn am-btn-primary">保存修改</button>
                            </div>
                            <div class="am-u-sm-3 am-u-md-pull-2 ">
                                <button type="button" id="cancel-btn" class=" am-btn am-btn-primary">返回</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

<!--        <footer class="admin-content-footer">-->
<!--            <hr>-->
<!--            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>-->
<!--        </footer>-->

    </div>



</div>


<!--<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>-->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/house.js"></script>
</body>
</html>
