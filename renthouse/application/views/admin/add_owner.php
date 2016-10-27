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
    <style>
        .hid{
            margin-top: 20px;


        }
    </style>
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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加房东资料</strong></div>
            </div>
            <hr/>
            <div class="am-g">
                <div style='right:0%' class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                    <form class="am-form am-form-horizontal" action='admin/add_owner_infor' method="post" enctype="multipart/form-data">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">姓名：</label>
                            <ul class="am-u-sm-9">
                                <li style="float:left ;list-style:none;margin-right:20px"><input type="text" name='first_name' id="user-name" placeholder="姓"></li>
                                <li style='float:left;list-style:none'><input type="text" name='last_name' id="user-name" placeholder="名"></li>
                            </ul>
                        </div>
                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">电话：</label>
                            <div class="am-u-sm-9">
                                <input type="email" name='phone' id="user-email" placeholder="电话">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">邮箱：</label>
                            <div class="am-u-sm-9">
                                <input type="tel" id="user-phone" name='email' placeholder="邮箱">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-id" class="am-u-sm-3 am-form-label">证件号码：</label>
                            <div class="am-u-sm-9">
                                <input type="number" name='id' pattern="[0-9]*" id="user-id" placeholder="证件号码">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-bandid" name='bankcard' class="am-u-sm-3 am-form-label">银行卡号：</label>
                            <div class="am-u-sm-9">
                                <input type="text" id="user-bandid" placeholder="银行卡号">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-pass" class="am-u-sm-3 am-form-label">独立密码：</label>
                            <div class="am-u-sm-9">
                                <input type="text" name='password' id="user-pass" placeholder="独立密码">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="confirm_user-pass" class="am-u-sm-3 am-form-label">确认独立密码：</label>
                            <div class="am-u-sm-9">
                                <input type="text" name='confirm_pwd' id="confirm_user-pass" placeholder="确认独立密码"><span id='no'></span>

                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-portrait" class="am-u-sm-3 am-form-label">上传头像图片：</label>
                            <div class="am-u-sm-9">
                                <input type="file" class="am-input-sm" name="img">
                                <div class="imgCrop"><img class='hid' src="" alt=""></div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-9" style='left:60px'>
                                <input  accept="image/*" type="radio" name='agree' value='同意' id="agree">&nbsp&nbsp同意<br><br>
                                <a href='#'>阅读房东协议</a>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-intro" class="am-u-sm-3 am-form-label">简介：</label>
                            <div class="am-u-sm-9">
                                <textarea class="" rows="5" name='intro' id="user-intro" placeholder="输入个人简介"></textarea>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="submit am-btn am-btn-primary">确认提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>

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
<script src='js/admin/edit_owner.js'></script>

<!-- <script src='js/admin/add_owner.js'></script> -->
</body>
</html>
