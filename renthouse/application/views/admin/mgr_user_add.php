<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台-房客管理-添加</title>
    <meta name="description" content="这是一个 user 页面">
    <meta name="keywords" content="user">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <base href="<?php echo site_url();?>">
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="css/ali_icon.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<?php include 'header.php';?>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <?php include 'sidebar.php';?>
    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">添加房客资料</strong></div>
            </div>

            <hr/>

            <div class="am-g">
                <form class="am-form am-form-horizontal" method="post" action="admin/mgruser/mgr_user_save" enctype="multipart/form-data">
                    <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
                        <div class="am-panel am-panel-default">
                            <div class="am-panel-bd">
                                <div class="am-g">
                                    <!--                                <div class="am-u-md-4">-->
                                    <!--                                    <div id="imgdiv"><img id="imgShow" width="50%" height="50%"></div>-->
                                    <!--                                </div>-->
                                    <!--                                <div class="am-u-md-8">-->
                                    <!--                                        <div class="am-form-group">-->
                                    <!--                                            <input type="file" id="user-pic" name="img">-->
                                    <!--                                            <img src="" alt="">-->
                                    <!--                                            <p class="am-form-help">请选择要上传的头像...</p>-->
                                    <!--                                        </div>-->
                                    <!--                                </div>-->

                                    <div class="am-u-sm-8 am-u-md-8">
                                        <!--              文件上传-->
                                        <div class="am-form-group am-form-file">
                                            <button type="button" class="am-btn am-btn-md" style="width:100%">选择新的头像文件</button>
                                            <input id="doc-form-file" type="file" name="img">
                                            <!--图片预览-->
                                            <br/>
                                            <small class="am-badge am-badge-success am-radius">预览图</small>
                                            <div id="imgdiv"><img id="imgShow" width="100%" height="100%" /></div>
                                            <!--图片预览-->
                                        </div>
                                        <div id="file-list"></div>
                                        <!--              文件上传-->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">姓名</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="firstname" placeholder="名字" class="user_firstname" name="firstname">
                                <small>请输入你的名字</small>
                            </div>
                            <div class="am-u-sm-4">
                                <input type="text" id="lastname" placeholder="姓氏" class="user_lastname" name="lastname">
                                <small>请输入你的姓氏</small>
                            </div>
                        </div>





                        <div class="am-form-group am-form-inline">
                            <label for="user-email" class="am-u-sm-3 am-form-label">性别</label>
                            <div class="am-u-sm-9">
                                <div class="am-form-group">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="男" checked>男
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="sex" value="女">女
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">出生日期</label>
                            <div class="am-u-sm-9">
                                <input type="text" class="am-form-field"  id="birth" name="birth" placeholder="出生日期" data-am-datepicker readonly required />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">电子邮件</label>
                            <div class="am-u-sm-9">
                                <input type="email" id="email" name="email" placeholder="输入你的电子邮件">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">电话</label>
                            <div class="am-u-sm-9">
                                <input type="tel" id="tel" name="tel" placeholder="输入你的电话号码">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-Country" class="am-u-sm-3 am-form-label">国家</label>
                            <div class="am-u-sm-9">
                                <select name="country" id="country" data-am-selected>
                                    <option value="中国">中国</option>
                                    <option value="法国" selected>法国</option>
                                    <option value="美国">美国</option>
                                </select>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-address" class="am-u-sm-3 am-form-label">地址</label>
                            <div class="am-u-sm-9">
                                <textarea class="" rows="5" name="address" id="address" placeholder="输入你的地址"></textarea>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-Country" class="am-u-sm-3 am-form-label">首选货币</label>
                            <div class="am-u-sm-9">
                                <select data-am-selected name="currency" id="currency">
                                    <option value="人民币">人民币</option>
                                    <option value="美元" selected>美元</option>
                                    <option value="欧元">欧元</option>
                                </select>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <div>
                                <label for="user-hobby" class="am-u-sm-3 am-form-label">爱好</label>
                            </div>
                            <div class="am-u-sm-9">
                                <?php
                                foreach ($hobbys as $hobby){
                                    ?>
                                    <div class="am-u-sm-3">
                                        <label class="am-checkbox-inline">
                                            <div class="hobby_icon">
                                                <i class="iconfont-hobby <?php echo $hobby->hobby_class;?>"></i>
                                                <input type="checkbox" name="hobby[]" value="<?php echo $hobby->hobby_id;?>"> <?php echo $hobby->hobby_name;?>
                                            </div>
                                        </label>
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-intro" class="am-u-sm-3 am-form-label">自我介绍</label>
                            <div class="am-u-sm-9">
                                <textarea class="" rows="5" name="intro" id="intro" placeholder="输入个人简介"></textarea>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-4">
                                <button type="submit" class="save am-btn am-btn-primary am-btn-xs">确定</button>

                                <button type="button" class="am-btn am-btn-primary am-btn-xs">重置</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>



<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>

<script src="assets/js/app.js"></script>

<!--图片上传预览-->
<script src="js/uploadPreview.min.js"></script>
<script>
    window.onload = function () {
        new uploadPreview({ UpBtn: "doc-form-file", DivShow: "imgdiv", ImgShow: "imgShow" });
    }
</script>
<!--图片上传预览-->

<!--图片上传-->
<!--<script>-->
<!--    $(function() {-->
<!--        $('#doc-form-file').on('change', function() {-->
<!--            var fileNames = '';-->
<!--            $.each(this.files, function() {-->
<!--                fileNames += '<span class="am-badge">' + this.name + '</span> ';-->
<!--            });-->
<!--            $('#file-list').html(fileNames);-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--图片上传-->
</body>
</html>
