<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>意见反馈</title>
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

    <!-- 公告列表开始 -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">意见反馈</strong> / <small>Feedback</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" class="am-btn am-btn-default" id="btn-delete-selected"><span class="am-icon-trash-o"></span> 删除</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox" /></th>
                                <th>用户ID</th><th class="table-title">用户名</th>
                                <th class="table-author am-hide-sm-only">反馈内容</th>
                                <th class="table-date am-hide-sm-only">反馈时间</th>
                                <th class="table-set">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($feedbacks as $feedback){
                                ?>
                                <tr>
                                    <td><input type="checkbox" data-id="<?php echo $feedback->feedback_id;?>"/></td>

                                    <td><?php echo $feedback->feedback_id;?></td>
                                    <td><?php echo $feedback->first_name;?><?php echo $feedback->last_name;?></td>
                                    <td class="am-hide-sm-only content">
                                        <div class="am-hide-sm-content" style="height: 19px;width: 240px;overflow: hidden;">
                                            <div class="am-hide-sm-btn" style="width: 0; height: 0; float:right; margin-top: 4px; border: 10px solid transparent;border-top: 10px solid #000;"></div>
                                            <div class="am-hide-sm-content-mini" style="width: 200px; float: left;"><?php echo $feedback->content;?></div>
                                        </div>
                                    </td>
                                    <td class="am-hide-sm-only"><?php echo $feedback->feedback_date;?></td>

                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <button type="button" data-id="<?php echo $feedback->feedback_id;?>" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only btn_delete"><span class="am-icon-trash-o"></span> 删除</button>
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
                            共 15 条记录
                            <div class="am-fr">
                                <ul class="am-pagination">
                                    <li class="am-disabled"><a href="#">«</a></li>
                                    <li class="am-active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <hr />
                    </form>
                </div>

            </div>
        </div>


    </div>
    <!-- 公告列表结束 -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
    $(function(){
        var bHide = false;
        $('.am-hide-sm-content').on('click','.am-hide-sm-btn',function(e){
            if(!bHide){
                $(this).parent().height($('.am-hide-sm-content-mini').height());
            }else{
                $(this).parent().height('19px');
            }
            bHide = !bHide;
        })
        $('.btn_delete').on('click', function(){
            var that = this;
            if(confirm('是否确定删除该记录，可以在回收站中恢复.')){
                var feedbackId = $(this).data('id');
                $.get('admin/delete_feedback', {
                    feedbackId: feedbackId
                }, function(data){
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
                $checked.each(function(){
                    delStr += $(this).data('id') + ',';
                });
                delStr = delStr.substring(0, delStr.length - 1);
                $.get('admin/delete_selected_feedback', {feedbackIdStr: delStr}, function (data) {
                    if (data == 'success') {
                        $checked.parents('tr').remove();
                    }
                }, 'text');
            }
        });
    });
</script>
</body>
</html>
