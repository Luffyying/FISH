
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台-房客管理-更改</title>
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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">修改房客资料</strong></div>
            </div>

            <hr/>

            <div class="am-g">
                <form class="am-form am-form-horizontal" method="post" action="admin/mgruser/mgr_user_edit" enctype="multipart/form-data">


                    <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
                        <div class="am-panel am-panel-default">
                            <div class="am-panel-bd">
                                <div class="am-g">
                                    <div class="am-u-md-4">
                                        <img class="am-img-circle am-img-thumbnail" src="<?php echo $user->img;?>" alt=""/>
                                        <input type="hidden"  value="<?php echo $user->img;?>" name="oldImg">
                                    </div>
                                    <div class="am-u-md-8">
                                        <div class="am-form-group">
                                            <input type="file" id="img" name="img">
                                            <p class="am-form-help">请选择要上传的头像</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                        <div class="am-form-group">
                            <label for="user-id" class="am-u-sm-3 am-form-label">编号：</label>
                            <div  ><?php echo $user->user_id;?></div>
                            <input type="hidden" id="userId" name="userId" value="<?php echo $user->user_id;?>">
                        </div>

                        <div class="am-form-group">

                            <label for="user-name" class="am-u-sm-3 am-form-label">姓名</label>
                            <div class="am-u-sm-4">
                                <input type="text" id="firstname" class="user_firstname" name="firstname" value="<?php echo $user->last_name;?>">
                                <small>请输入你的名字</small>
                            </div>
                            <div class="am-u-sm-4">
                                <input type="text" id="lastname" class="user_lastname" name="lastname" value="<?php echo $user->first_name;?>" >
                                <small>请输入你的姓氏</small>
                            </div>
                        </div>
                        <div class="am-form-group am-form-inline">
                            <label for="user-email" class="am-u-sm-3 am-form-label">性别</label>
                            <div class="am-u-sm-9">
                                <div class="am-form-group" >
                                    <label class="am-radio-inline userSex">
                                        <input  type="radio" name="sex"   value="男" <?php echo $user->sex =='男'?"checked='checked'":""?>>男
                                    </label>
                                    <label class="am-radio-inline userSex">
                                        <input type="radio" name="sex" value="女" <?php echo $user->sex =='女'?"checked='checked'":""?>>女
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">出生日期</label>
                            <div class="am-u-sm-9">
                                <input type="text" class="am-form-field"  id="birth" name="birth" value="<?php echo $user->birth_year;?>-<?php echo $user->birth_month;?>-<?php echo $user->birth_day;?>" "出生日期"  data-am-datepicker readonly required />
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">电子邮件</label>
                            <div class="am-u-sm-9">
                                <input type="email" id="email" name="email"  value="<?php echo $user->email;?>" >
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">电话</label>
                            <div class="am-u-sm-9">
                                <input type="tel" id="tel" name="tel"  value="<?php echo $user->tel;?>">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-Country" class="am-u-sm-3 am-form-label">国家</label>
                            <div class="am-u-sm-9">
                                <select name="country" id="country" data-am-selected >
                                    <option value="中国" <?php echo $user->country=="中国"?"selected='selected'":" ";?>>中国</option>
                                    <option value="法国" <?php echo $user->country=="法国"?"selected='selected'":" ";?>>法国</option>
                                    <option value="美国" <?php echo $user->country=="美国"?"selected='selected'":" ";?>>美国</option>
                                </select>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-address" class="am-u-sm-3 am-form-label">地址</label>
                            <div class="am-u-sm-9">
                                <textarea class="" rows="5" name="address" id="address" ><?php echo $user->address;?></textarea>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-Country" class="am-u-sm-3 am-form-label">首选货币</label>
                            <div class="am-u-sm-9">
                                <select data-am-selected name="currency" id="currency">
                                    <option value="人民币" <?php echo $user->currency=="人民币"?"selected='selected'":" ";?>>人民币</option>
                                    <option value="美元" <?php echo $user->currency=="美元"?"selected='selected'":" ";?>>美元</option>
                                    <option value="欧元" <?php echo $user->currency=="欧元"?"selected='selected'":" ";?>>欧元</option>
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
                                               <input type="checkbox" name="hobby[]"
                                                   <?php
                                                   foreach ($user_hobbys as $user_hobby){
                                                       echo $hobby->hobby_id==$user_hobby->hobby_id?"checked='checked'":"";
                                                   }
                                                   ?>
                                                      value="<?php echo $hobby->hobby_id;?>"> <?php echo $hobby->hobby_name;?>
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
                                <textarea class="" rows="5" name="intro" id="intro"><?php echo $user->intro;?></textarea>
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
<script>
</script>
</body>
</html>
