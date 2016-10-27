<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo site_url();?>">
    <title>房源展示</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/ali_icon.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/house_detail.css">
    <link rel="stylesheet" type="text/css" href="css/dialog.css">

</head>
<body>
<?php include "header.php" ;?>
<!-- 轮播图 -->
<div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php 
            foreach ($house_imgs as $house_img) {
        ?>
                <div class="item">
                    <img src="<?php echo $house_img -> path?>" alt="">
                </div>
        <?php 
            } 
        ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
<!-- 房源信息 -->
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <!-- owner info -->
            <div class="owner_info row">
                <div class="head-info col-md-3">
                    <!-- <img src="img/house_detail/head.jpg" alt="" class="img-circle"> -->
                    <img src="<?php echo $owner_info -> img ?>" alt="" class="img-circle">
                    <h4><?php echo $owner_info -> nick_name ?></h4>
                    <p><button type="button" class="btn btn-default">联系我</button></p>
                </div>
                <div class="head-info-content col-md-9">
                    <div class="house_title">
                        <h2><?php echo $house -> title ?></h2>
                        <span id="houseId"><?php echo $house -> house_id ?></span>
                        <span>可预定</span>
                    </div>
                    <hr>
                    <h4 class="text-left"><?php echo $house -> city ?>，<?php echo $house -> street ?>，<?php echo $house -> road ?></h4>
                    <h4 class="text-left">发布时间：<?php echo $house -> post_date ?> <span class="like_rate"><span>♥♥♥♥</span> <strong><?php echo $house -> score ?></strong>分</span></h4>
                    <h4 class="text-left">收藏人数：<span><?php echo $house -> collect_num ?></span></h4>
                </div>
            </div>
            <!-- house_detail -->
            <div class="house_detail row">
                <dl class="dl-horizontal">
                    <dt>房源类型</dt><dd><?php echo $house_type -> name ?></dd>

                    <dt>出租类型</dt><dd><?php echo $house_rent_type -> name ?></dd>

                    <dt>房源</dt>
                    <dd >
                        <div class="house_condition">
                            卧室：<?php echo $house -> bedroom_num ?>
                        </div>    
                        <div class="house_condition">
                            床位：<?php echo $house -> bed_num ?>
                        </div>    
                        <div class="house_condition">
                            卫生间：<?php echo $house -> washroom_num ?>
                        </div>    
                        <div class="house_condition">
                            容纳人数：<?php echo $house -> hold_num ?>
                        </div>    
                        
                    </dd>

                    <dt>房屋介绍</dt><dd><?php echo $house -> intro ?></dd>

                    <hr>

                    <dt>便利设施</dt>
                    <dd>
                        <?php 
                            foreach ($conveniences as $convenience) {
                        ?>
                            <div class="asset">
                                <p><i class="iconfont-convenient"><?php echo $convenience -> icon ?></i></p>
                                <p><?php echo $convenience -> name ?></p>
                            </div>
                        <?php
                            }
                         ?>
                    </dd>

                    <dt>房屋守则</dt><dd><?php echo $house -> rules ?></dd>
                    <hr>
                </dl>
            </div>
            <!-- detail_picture -->
            <div class="detail_picture row">
                <h3>图片展示</h3>
                <div id="detail_pic_carousel">
                    <div class="pic_container">
                        <?php 
                            foreach ($house_imgs_small as $house_img) {
                        ?>
                                <img src="<?php echo $house_img -> path?>" alt="">
                        <?php 
                            } 
                        ?>
                    </div>
                    <span class="pic_prev slide_btn">&#10094;</span>
                    <span class="pic_next slide_btn">&#10095;</span>
                </div>
            </div>
            <!-- comments -->
            <div  class="comments row">
                <h3><span class="comNum"><?php echo count($comments_to_house);?></span>条评价<span class="like_rate "><span>♥♥♥♥</span><strong><?php echo $house -> score ?></strong>分</span></h3>

                <div id="comment_lists" class="row">
                    
                    <?php 
                        foreach ($comments_to_house as $comment_to_house) {
                    ?>
                            <div class="comment_list row">

                                <div class="head-info col-md-3">
                                    <img src="<?php echo $comment_to_house -> user_info -> img ?>" alt="" class="img-circle">
                                    <h4><?php echo $comment_to_house -> user_info -> nick_name ?></h4>
                                    <p><span class="red_hearts">♥♥♥♥♥</span></p>
                                </div>

                                <div class="comment_content col-md-9">
                                    <p>
                                        <?php echo $comment_to_house -> content ?>
                                    </p>
                                    <div class="comment_img">
                                        <img src="<?php echo $comment_to_house -> img_first ?>" alt="">
                                        <img src="<?php echo $comment_to_house -> img_second ?>" alt="">
                                    </div>
                                    <p class="comment_time">
                                        <?php echo $comment_to_house -> comment_date ?>
                                    </p>
                                </div>
                            </div>
                            <hr> 
                    <?php 
                        } 
                    ?>
                </div>

                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <button type="button" class="load_more">加载更多...</button>
                    </div>
                </div>
                
            </div>
        </div><!-- col-8 -->

        <div class="col-md-4">
            <div id="calendar">
                <div class="calendar_header">
                    <span class="total_price">￥8909</span>
                </div>
                <?php include 'calendar.php';?>
                <div class='date_list row'>
                    <div class="col-md-6">
                        <input name='start' style='display:inline-block;border-radius: 0' class="form_datetime form-control" type="text" placeholder="入住日期" size="16">
                    </div>
                    <div class="col-md-6">
                        <input name='end' style='display:inline-block;border-radius: 0'' class="form_datetime form-control" type="text" placeholder="退房日期" size="16">
                    </div>
                </div>
                <div class="bookBtn">预定</div>
                <div class="collectBtn">收藏</div>
            </div>

        </div>
    </div><!-- row-end -->
</div>
<?php include "footer.php" ;?>

<script src="js/require.js" data-main="js/house_detail"></script>
<script src="js/jquery.js"></script>
<script src="js/header.js"></script>
</body>
</html>

