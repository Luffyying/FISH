<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>评价</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/evaluate.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
    <?php include 'header.php';?>
    <div id="evaluate">
        <div class="container">
            <div class="col-md-8 row-left">
                <form action="comment/save_comment" method="post" enctype="multipart/form-data">
                    <div class="row first-row">
                        <div class="col-md-8">
                            <h3>评价一下您居住的感受...</h3>
                        </div>
                        <div class="col-md-8 space">
<!--                            订单编号：<span class="content">--><?php //echo $house -> order_id;?><!--</span>-->
                            订单编号：<span class="content"><?php echo $order_id;?></span>
                            <input type="hidden" value="<?php echo $order_id;?>" name="orderId">
                            <input type="hidden" value="<?php echo $user_status;?>" name="userStatus">
                        </div>
                        <div class="col-md-8 space">
                            房屋名称：<span class="content"><?php echo $house -> title;?></span>
                        </div>
                        <div class="col-md-4 space">
                            房屋编号：<span class="content"><?php echo $house -> house_id;?></span>
                            <input type="hidden" value="<?php echo $house -> house_id;?>" name="houseId">
                        </div>
                        <div class="col-md-8 space">
                            房东名字：<span class="content"><?php echo $house -> first_name;?> <?php echo $house -> last_name;?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 space houseMark">
                            房源评分：
                        </div>
                        <div class="col-md-8 space">
                            <ul class="rating no-star houseMark">
                                <li class="one"><a title="1" href="javascript:;"></a></li>
                                <li class="two"><a title="2" href="javascript:;"></a></li>
                                <li class="three"><a title="3" href="javascript:;"></a></li>
                                <li class="four"><a title="4" href="javascript:;"></a></li>
                                <li class="five"><a title="5" href="javascript:;"></a></li>
                            </ul>
                        </div>
                        <div class="col-md-8 space">
                            请两三句话介绍一下你的感受：
                        </div>
                        <div class="col-md-12 space">
                            <textarea name="houseFeel" class="comment houseFeel" cols="90" rows="4" placeholder="对房源的感受"></textarea>
                        </div>
                        <div class="col-md-2 space">
                            上传图片：
                        </div>
                        <div class="col-md-2 space">
                            <img class="choose" id="imgPre" src="" style="display: block;" />
                        </div>
                        <div class="col-md-2 space">
                            <img class="choose" id="imgPre1" src="" style="display: block;" />
                        </div>
                        <div class="col-md-2 space">
                            <img class="choose" id="imgPre2" src="" style="display: block;" />
                        </div>
                        <div class="col-md-2 space">
                            <div>(最多三张)</div>
                            <div><input type="file" id="imgOne" name="imgOne" onchange="preImg(this.id,'imgPre');"/></div>
                            <div><input type="file" id="imgTwo" name="imgTwo" onchange="preImg(this.id,'imgPre1');"/></div>
                            <div><input type="file" id="imgThree" name="imgThree" onchange="preImg(this.id,'imgPre2');"/></div>
                            <input type="hidden" id="mark1" name="mark1">
                            <input type="hidden" id="mark2" name="mark2">
                        </div>
                        <div class="col-md-2 space">

                        </div>
                        <div class="col-md-8 space ownerMark">
                            房东评分：
                        </div>
                        <div class="col-md-8 space">
                            <ul class="rating no-star ownMark">
                                <li class="one"><a title="1" href="javascript:;"></a></li>
                                <li class="two"><a title="2" href="javascript:;"></a></li>
                                <li class="three"><a title="3" href="javascript:;"></a></li>
                                <li class="four"><a title="4" href="javascript:;"></a></li>
                                <li class="five"><a title="5" href="javascript:;"></a></li>
                            </ul>
                        </div>
                        <div class="col-md-8 space">
                            请两三句话介绍一下你的感受：
                        </div>
                        <div class="col-md-12 space">
                            <textarea name="ownFeel" class="comment ownFeel" cols="90" rows="4" placeholder="对房源的感受"></textarea>
                        </div>
                        <div class="col-md-12 space">
                            <button class="submit" type="submit">提交</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 row-right">
                <img src="img/evaluate.png" alt="">
            </div>
        </div>
    </div>
        <?php include 'footer.php';?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/require.js"></script>
<!--    <script src="js/index.js"></script>-->
    <script src="js/footer.js"></script>
    <script src="js/evaluate.js"></script>
    <script src="js/header.js"></script>
    <link rel="stylesheet" href="assets/kindeditor/themes/default/default.css"/>
    <script charset="utf-8" src="assets/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="assets/kindeditor/lang/zh_CN.js"></script>
    <script>
        var editor;
        KindEditor.ready(function (K) {
            editor = K.create('textarea[name="houseFeel"]',{
                resizeType: 1,
                allowPreviewEmoticons: false,
                allowImageUpload: true,
                items: [
                    'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                    'insertunorderedlist', '|', 'emoticons', 'image', 'link']
            });
        });
        KindEditor.ready(function (K) {
            editor = K.create('textarea[name="ownFeel"]',{
                resizeType: 1,
                allowPreviewEmoticons: false,
                allowImageUpload: true,
                items: [
                    'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                    'insertunorderedlist', '|', 'emoticons', 'image', 'link']
            });
        });

        /**
         * 从 file 域获取 本地图片 url
         */
        function getFileUrl(sourceId){
            var url;
            if (navigator.userAgent.indexOf("MSIE")>=1) { // IE
                url = document.getElementById(sourceId).value;
            } else if(navigator.userAgent.indexOf("Firefox")>0) { // Firefox
                url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0));
            } else if(navigator.userAgent.indexOf("Chrome")>0) { // Chrome
                url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0));
            }
            return url;
        }
        /**
         * 将本地图片 显示到浏览器上
         */
        function preImg(sourceId, targetId) {
            var url = getFileUrl(sourceId);
            var imgPre = document.getElementById(targetId);
            imgPre.src = url;
        }
    </script>
</body>
</html>