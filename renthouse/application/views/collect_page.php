<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/collect_page.css">
    <title>收藏页</title>
</head>
<body>
    <?php include "header.php";?>
    <div class="container" style="background: #ccc;">
        <div id="main-content" class="col-md-8" style="background: #a14c09;">
            <div id="houses-list" class="row">
                <div class="col-md-6">
                    <div class="house-photo"><img src="img/collect_page/house_photo1.jpg" alt="图片加载失败"></div>
                    <div>
                        <p>English tudor suite, with parking</p>
                        <span>Simon Wolf 出租/地址:和兴路250号</span>
                        <a href="">查看详情</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="house-photo"><img src="img/collect_page/house_photo2.jpg" alt="图片加载失败"></div>
                    <div>
                        <p>English tudor suite, with parking</p>
                        <span>Simon Wolf 出租/地址:和兴路250号</span>
                        <a href="">查看详情</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="sidebar" class="col-md-4" style="background: #00a0f0;"><img src="img/collect_page/show.jpg" alt="图片加载失败"></div>
    </div>
    <?php include "footer.php";?>
</body>
</html>