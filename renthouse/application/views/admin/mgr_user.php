<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台-房客管理</title>
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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">房客管理</strong></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" class="am-btn am-btn-default" id="btn-add"><span class="am-icon-plus"></span> 新增</button>
                            <button type="button" class="am-btn am-btn-default" id="btn-delete-selected"><span class="am-icon-trash-o"></span> 批量删除</button>
                        </div>
                    </div>
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-input-group am-input-group-sm">
                        <input type="text" class="am-form-field" id="search-keyword">
                        <span class="am-input-group-btn">
            <button class="btn-search am-btn am-btn-default" type="button">搜索</button>
          </span>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox" class="check_option"/></th><th class="table-id">用户ID</th><th class="table-title">姓名</th><th class="table-type">性别</th><th class="table-author am-hide-sm-only">年龄</th><th class="table-author am-hide-sm-only">电话</th><th class="table-author am-hide-sm-only">国家</th><th class="table-author am-hide-sm-only">密码</th><th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody class="user-container">
                            <?php
                            foreach ($users as $user){
                                ?>
                                <tr>
                                    <td><input type="checkbox" data-id="<?php echo $user->user_id;?>" /></td>
                                    <td><?php
                                        echo $user->user_id;
                                        ?></td>
                                    <td><a href="#"><?php echo $user->last_name."  ".$user->first_name ;?></a></td>
                                    <td><?php echo $user->sex;?></td>
                                    <td class="am-hide-sm-only"><?php
                                        echo (date('Y',time())-($user->birth_year));
                                        ;?></td>
                                    <td class="am-hide-sm-only"><?php echo $user->tel;?></td>
                                    <td class="am-hide-sm-only"><?php echo $user->country;?></td>
                                    <td class="am-hide-sm-only"><?php echo  $user->pwd;?></td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <button class="btn-edit am-btn am-btn-default am-btn-xs am-text-secondary" data-id="<?php echo $user->user_id;?>"><span class="am-icon-pencil-square-o"></span>
                                                    <a href="admin/mgr_user_update?userId=<?php echo $user->user_id ;?>">编辑</a></button>
                                                <button class="btn-disable am-btn am-btn-default am-btn-xs am-hide-sm-only" data-id="<?php echo $user->user_id;?>"><span class="am-icon-copy"></span> 禁用</button>
                                                <button class="btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" data-id="<?php echo $user->user_id;?>"><span class="am-icon-trash-o" ></span> 删除</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="user-page am-cf">
                            本页共 <?php echo count($users);?> 条记录
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

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>


<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<script>
    $(function () {
        $('#btn-add').on('click',function () {
            location.href = 'admin/mgr_user_add';
        });

        $('.btn-disable').on('click', function(){
            var that = this;
            if(confirm('是否确定禁用该用户，可以在回收站中恢复.')){

                var userId = $(this).data('id');

                $.get('admin/mgrusser/disabled_user', {
                    userId:userId
                }, function(data){
                    console.log(data);
                    if(data == 'success'){
                        alert('禁用成功!');
                        $(that).parents('tr').remove();
                    }else{
                        alert('禁用失败!');
                    }
                }, 'text');
            }
        });



        $('.btn-delete').on('click', function(){
            var that = this;
            if(confirm('是否确定删除该记录，可以在回收站中恢复.')){

                var userId = $(this).data('id');

                $.get('admin/mgruser/delete_user', {
                    userId:userId
                }, function(data){
                    console.log(data);
                    if(data == 'success'){
                        alert('删除成功!');
                        $(that).parents('tr').remove();
                    }else{
                        alert('删除失败!');
                    }
                }, 'text');
            }
        });

        $('#btn-delete-selected').on('click', function(){
            if(confirm('是否确定删除该记录，可以在回收站中恢复.')) {
                var delStr = '';
                var $checked = $(':checked');
                $checked.each(function () {
                    delStr += $(this).data('id') + ',';
                });
                delStr = delStr.substring(0, delStr.length - 1);
                $.get('admin/mgruser/delete_selected_user', {userIdStr: delStr}, function (data) {
                    if (data == 'success') {
                        alert('删除成功！');
                        $checked.parents('tr').remove();
                    }else {
                        alert('删除失败，请重试！');
                    }
                }, 'text');
            }
        });




        $('.btn-search').on('click', function(){
                var keyword=$('#search-keyword').val();  
                $.get('admin/mgruser/search_user', {keyword:keyword}, function (data) {
                    var now = new Date();
                    var html = '';
                    for (var i=0;i<data.length;i++){
                        var user=data[i];
                        html+= `<tr>
                                    <td><input type="checkbox" data-id="`+user.user_id+`" /></td>
                                    <td>`+user.user_id+`</td>
                                    <td>`+user.last_name+" "+user.first_name+`</td>
                                    <td>`+user.sex+`</td>
                                    <td class="am-hide-sm-only">`+((now.getFullYear())-(user.birth_year))+`</td>
                                    <td class="am-hide-sm-only">`+user.tel+`</td>
                                    <td class="am-hide-sm-only">`+user.country+`</td>
                                    <td class="am-hide-sm-only">`+user.pwd+`</td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <button class="btn-edit am-btn am-btn-default am-btn-xs am-text-secondary" data-id="`+user.user_id+`"><span class="am-icon-pencil-square-o"></span>
                                                    <a href="admin/mgr_user_update?userId=`+user.user_id+`">编辑</a></button>
                                                <button class="btn-disable am-btn am-btn-default am-btn-xs am-hide-sm-only" data-id="`+user.user_id+`"><span class="am-icon-copy"></span> 禁用</button>
                                                <button class="btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" data-id="`+user.user_id+`"><span class="am-icon-trash-o" ></span> 删除</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>`
                    }

                    $('.user-container').empty();
                    $('.user-page').empty();
                    $('.user-container').append(html);
                }, 'json');
        });







        $('.check_option').on('click',function () {
            var arr = $('input:checkbox');
            for(var i=1;i<arr.length;i++){
                arr[i].checked = ! arr[i].checked;
            }
        });
    });
</script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>

<script src="assets/js/app.js"></script>

</body>
</html>
