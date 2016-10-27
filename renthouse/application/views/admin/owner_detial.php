<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin table Examples</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
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
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<?php include 'header.php';?>
<div class="am-cf admin-main">
    <?php include 'sidebar.php';?>

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">房东详情</strong>
                </div>
            </div>
            <hr>
            <div class="am-g">
                <div class="am-u-sm-12">
                    <ul style='list-style: none'>
                        <li>姓名： <?php echo $user_infor->first_name ;echo $user_infor->last_name?></li>
                        <li>性别： <?php echo $user_infor->sex ;?></li>
                        <li>昵称： <?php echo $user_infor->nick_name ;?></li>
                        <li>国家： <?php echo $user_infor->country ;?></li>
                        <li>年龄： <?php $age = 2016-$user_infor->birth_year; echo $age ;?></li>
                        <li>电话： <?php echo $user_infor->tel ;?></li>
                        <li>邮件： <?php echo $user_infor->email ;?></li>
                        <li>注册时间： <?php echo $user_infor->date ;?></li>
                        <li>房源数量： <?php echo $owner_infor->room_num ;?></li>
                        <li>头像：<br /><img src="<?php echo $user_infor->img ;?>"/></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>

</div>
<!-- content end -->
</div>


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script src='js/admin/owner.js'></script>
</body>
</html>
