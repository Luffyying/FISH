<!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>申诉详情</title>
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
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">申诉详情</strong> / <small>Appeal_content</small></div>
            </div>
            <hr>
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-check"></th>
                                <th>用户ID</th>
                                <th>用户名</th>
                                <th>申诉订单号</th>
                                <th>申诉房源</th>
                                <th>房源标题</th>
                                <th>申诉内容</th>
                                <th>申诉时间</th>
                                <th>回复内容</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td><?php echo $order->user_id;?></td>
                                    <td><?php echo $order->first_name;?> <?php echo $order->last_name;?></td>
                                    <td><?php echo $order->appeal_id;?></td>
                                    <td><?php echo $order->house_id;?></td>
                                    <td>sa<?php echo $order->title;?></td>
                                    <td><?php echo $order->content;?></td>
                                    <td><?php echo $order->appeal_date;?></td>
                                    <td><?php echo $order->reply;?></td>
                                    <td>
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a class="delete" href="#"><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr />
                    </form>
                </div>

            </div>
            <div class="am-tabs am-margin" data-am-tabs>
                <ul class="am-tabs-nav am-nav am-nav-tabs">
                    <li><a href="#tab2">详细描述</a></li>
                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-fade" id="tab2">
                        <form class="am-form">
                            <input id="orderId" type="hidden" value="<?php echo $order->order_id;?>">
                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                  用户id:
                                </div>
                                <div class="am-u-sm-8 am-u-md-4" id="userId">
                                    <?php echo $order->user_id;?>
                                </div>
                                <div class="am-hide-sm-only am-u-md-6"></div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    用户名:
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end" id="username">
                                    <?php echo $order->first_name;?> <?php echo $order->last_name;?>
                                </div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    申诉订单号:
                                </div>
                                <div class="am-u-sm-8 am-u-md-4" id="appealId">
                                   <?php echo $order->appeal_id;?>
                                </div>
                                <div class="am-hide-sm-only am-u-md-6"></div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    申诉房源:
                                </div>
                                <div class="am-u-sm-8 am-u-md-4" id="houseId">
                                    <?php echo $order->house_id;?>
                                </div>
                                <div class="am-u-sm-12 am-u-md-6"></div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    房源标题:
                                </div>
                                <div class="am-u-sm-8 am-u-md-4" id="title">
                                    sds<?php echo $order->title;?>
                                </div>
                                <div class="am-u-sm-12 am-u-md-6"></div>
                            </div>

                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                                    申诉内容:
                                </div>
                                <div class="am-u-sm-12 am-u-md-10">
                                    <textarea rows="10" id="content"> <?php echo $order->content;?></textarea>
                                </div>
                            </div>
                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                                    申诉回复:
                                </div>
                                <div class="am-u-sm-12 am-u-md-10">
                                    <textarea rows="10" placeholder="请使用富文本编辑插件" id="reply">adsadasd</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="am-margin">
                <button  type="button" class="am-btn am-btn-primary am-btn-xs save">提交保存</button>
                <button  type="button" class="am-btn am-btn-primary am-btn-xs cancel">放弃保存</button>
            </div>
        </div>
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
       $('.save').on('click',function(){
            var $userId = $('#userId');
            var $username = $('#username');
            var $appealId = $('#appealId');
            var $houseId = $('#houseId');
            var $title = $('#title');
            var $content = $('#content');
            var $reply = $('#reply');
            var $orderId = $('#orderId');
           $.post('admin/revert',{
               appealId : $appealId.html(),
               content : $content.html(),
               reply : $reply.html(),
               orderId : $orderId.val()
           },function(data){
                if(data == 'success'){
                    alert('评论成功');
                    var now = new Date();
                    var html = `
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td>`+$userId.html()+`</td>
                        <td>`+$username.html()+`</td>
                        <td>`+$appealId.html()+`</td>
                        <td>`+$houseId.html()+`</td>
                        <td>`+$title.html()+`</td>
                        <td>`+$content.html()+`</td>
                        <td>`+now.toLocaleDateString()+`</td>
                        <td>`+$reply.html()+`</td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a class="delete" href="#"><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button></a>
                                </div>
                            </div>
                        </td>
                    </tr>`;
                    $('.list').append(html);
                }else{
                    alert('回复失败');
                }
           },'text');
       })
   })
</script>
</body>
</html>
