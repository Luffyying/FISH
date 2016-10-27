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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">房东管理</strong></div>
            </div>
            <hr>
            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" class="am-btn am-btn-default" id="btn-add"><span class="am-icon-plus"></span> 添加</button>
                             <button type="button" class="am-btn am-btn-default" id="btn-delete-selected"><span class="am-icon-trash-o"></span> 删除</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <form action="admin/owner" method="get">
                    <div class="am-input-group am-input-group-sm">
                          <input type="text" class="am-form-field" name="owner_name">
                          <span class="am-input-group-btn">
                            <button class="am-btn am-btn-default" type="submit">搜索</button>
                          </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-check"><input type="checkbox" /></th><th class="table-id">房东ID</th><th class="table-title">姓名</th><th style='cursor: pointer;' class="table-type">注册时间</th><th style='cursor: pointer;' class="table-type house-num">房源数量</th><th class="table-set">认证card</th><th class="table-set">提现密码</th><th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody id='content'>
                        <?php
                        foreach($owners as $owner){
                            ?>
                            <tr id='content'>
                                <td><input type="checkbox" data-id="<?php echo $owner->user_id;?>"/></td>
                                <td><?php echo $owner->user_id;?></td>
                                <td><a href="admin/owner_detial?owner_id=<?php echo $owner->user_id;?>"><?php echo $owner->first_name;echo $owner->last_name;?></a></td>
                                <td><?php echo $owner->reg_date;?></td>
                                <td class='house-num-detial'><?php echo $owner->room_num;?></td>
                                <td><?php echo $owner->bank_card;?></td>
                                <td><?php echo $owner->owner_pwd;?></td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button type="button" data-id="<?php echo $owner->user_id;?>" class="btn-update am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                                            <button type="button" data-id="<?php echo $owner->user_id;?>" class="btn-forbid am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><?php echo ($owner->status==0)?'<span class="am-icon-trash-o"></span>'.'禁用':'已禁用'?></button>
                                              <button type="button" data-id="<?php echo $owner->user_id;?>" class="btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span>删除</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <div class="am-cf">
                        共 <?php echo count($owners)?> 条记录
                        <div class="am-fr">
                            <ul class="am-pagination">
                                <?php echo $this->pagination->create_links();?>
                            </ul>
                        </div>
                    </div>
                    <hr />
                </form>
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
