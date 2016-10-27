<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>预定页面</title>
    <base href="<?php echo site_url()?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/order.css">
</head>
<body>
<?php include 'header.php';?>
<div class="container">
        <div class="row">
            <div class="col-md-8">
                <div id="edit-area">
                    <div id="title1">
                        <span class="title1">1.关于您的旅程</span>
                    </div>
                    <form action="" class="edit-area-info">
                        <div class="edit-area-info-items">
                            <label class="items-title">谁将前来</label>
                            <div class="guest">
                                <input type="text" class="guest-number" placeholder="1位房客">
                            </div>
                        </div>
                        <div class="edit-area-info-items">
                            <label class="items-title">和房东打声招呼，告诉他们您为什么来到这里：</label>
                            <div class="sayhi">
                                <textarea name="sayhi" id="sayhi" cols="5" rows="10" placeholder="提前做一下准备和介绍.."></textarea>
                            </div>
                        </div>
                        <div class="edit-area-info-items">
                            <div class="housr-rule">
                                <textarea name="house-rule" id="house-rule" cols="10" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="edit-area-button">
                            <button type="button" class="submit ">下一步</button>
                        </div>

                    </form>
                </div>

            </div>
            <div class="col-md-4 box">
                <div id="house-info">
                    <div id="house-info-img">
                        <img src="img/reserve_img.png" alt="">
                    </div>
                    <div class="house-info-items">
                        <span class="house-info-owner">房东:&nbsp;&nbsp;joysi</span>
                        <span class="house-info-introduce">English tudor suite , with parking . Chestnut Hill</span>
                        <ul class="house-info-message">
                            <li class="house-info-type">独立房型&nbsp;/&nbsp;</li>
                            <li class="house-info-commentcount">15条评论&nbsp;/&nbsp;</li>
                            <li class="house-info-commentrank">5分</li>
                        </ul>
                        <span class="house-info-address">Wallis Road , 布鲁克莱恩，马塞诸塞州 02467，美国</span>
                        <hr class="rules"/>
                    </div>
                    <div class="house-info-time">
                        <ul class="in">
                            <li class="intitle">入住</li>
                            <li class="intime">2016年09月21日</li>
                        </ul>
                        <span class="gt">&gt;</span>
                        <ul class="out">
                            <li class="outitle">退房</li>
                            <li class="outtime">2016年09月21日</li>
                        </ul>
                        <div class="clear2"></div>
                        <hr class="rules"/>
                    </div>
                    <div class="house-info-money">
                        <span class="count" style="margin-top: 15px">
                            <span class="unit-price">&yen;8175</span>
                            <span class="multiplication">&times;</span>
                            <span class="number">2晚</span>
                        </span>
                        <span class="total-price">&yen;16350</span>
                        <span class="service-fee">服务费</span>
                        <span class="service-fee-num">&yen;2173</span>
                        <span class="coupons" style="margin-bottom: 15px">优惠券</span>
                        <span class="coupons-num"></span>
                        <hr class="rules" style="margin-left:0"/>
                        <span class="final-price">总价</span>
                        <span class="final-price-num">&yen;192839</span>
                    </div>
                </div>
            </div>

        </div>

</div>
<?php include 'footer.php' ;?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/require.js"></script>
<script src="js/footer.js"></script>
</body>
</html>