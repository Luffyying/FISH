<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fonts/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owner_page.css">
    <title>房东主页</title>
</head>
<body>
    <?php include "header.php";?>
    <div class="wrapper container">
        <div id="main-content" class="col-md-8">
        <?php foreach ($houses as $house){
        ?>
            <div id="overview" class="row">
                <div class="house-photo col-md-6"><img src="<?php echo $house->thumb_path;?>" alt="图片加载失败"></div>
                <div class="house-info col-md-6">
                    <h2><?php echo $house->title;?><span>(房源1)</span></h2>
                    <hr>
                    <p><?php echo $house->city;?>，<?php echo $house->street;?>，<?php echo $house->road;?></p>
                    <p>便利设施</p>
                    <ul class="amenities-list">
                        <li><i class="fa fa-television" aria-hidden="true"></i></li>
                        <li><i class="fa fa-university" aria-hidden="true"></i></li>
                        <li><i class="fa fa-bed" aria-hidden="true"></i></li>
                        <li><i class="fa fa-car" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
            <div id="intro" class="row">
                <h3 class="col-md-2">房源介绍</h3>
                <p class="col-md-10"><?php echo $house->intro;?></p>
            </div>
            <div id="grade" class="row">
                <div class="col-md-4">总体评分</div>
                <div class="col-md-4">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    4.5分
                </div>
                <div class="col-md-4"><a href="">全部评价》</a></div>
            </div>
            <div id="comment" class="row">
                <div id="commenter" class="col-md-3">
                    <div id="commenter-avatar"><img src="<?php echo $hcomment->thumb_img;?>" alt="图片加载失败"></div>
                    <span><?php echo $hcomment->last_name;?><?php echo $hcomment->first_name;?></span>
                    <div>
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div id="comment-right" class="col-md-9">
                    <p><?php echo $hcomment->content;?></p>
                    <ul>
                        <li><img src="<?php echo $hcomment->img_first;?>" alt="图片加载失败"></li>
                        <li><img src="<?php echo $hcomment->img_second;?>" alt="图片加载失败"></li>
                        <li><img src="<?php echo $hcomment->img_third;?>" alt="图片加载失败"></li>
                        <li>
                            <?php
                                $arr=explode(' ',$hcomment->comment_date);
                                echo $arr[0];
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        <?php
        }
        ?>
        </div>
        <div id="sidebar" class="col-md-4">
            <div id="owner">
                <div id="owner-title">房东</div>
                <div id="owner-info">
                    <div id="owner-avatar"><img src="<?php echo $owner->thumb_img;?>" alt="图片加载失败"></div>
                    <div id="owner-name">
                        <p><?php echo $owner->last_name;?><?php echo $owner->first_name;?></p>
                        <hr>
                        <p><?php echo $owner->sex;?>/29岁/中文/英文</p>
                    </div>
                    <div id="owner-intro">
                        <h4>房东简介</h4>
                        <p><?php echo $owner->intro;?></p>
                    </div>
                </div>
            </div>
<!--            <div class="message"></div>-->
            <div id="remarks">
                <div id="remarks-title">房客对他的评价<a href="">全部》</a></div>
                <div id="remark-grade" class="clearfix">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    4.5分
                </div>
                <ul id="remarks-list">
                    <?php foreach ($ocomments as $ocomment){
                    ?>
                        <li class="remark clearfix">
                            <hr>
                            <div id="lessee-info">
                                <div id="lessee-avatar"><img src="img/owner_page/comment_avatar.jpg" alt="图片加载失败"></div>
                                <span><?php echo $ocomment->last_name;?><?php echo $ocomment->first_name;?></span>
                                <div>
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                </div>
                                <span>
                                    <?php
                                        $arr=explode(' ',$ocomment->comment_date);
                                        echo $arr[0];
                                    ?>
                                </span>
                            </div>
                            <div id="remark-content"><?php echo $ocomment->content;?></div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/require.js"></script>
    <script src="js/footer.js"></script>
</body>
</html>