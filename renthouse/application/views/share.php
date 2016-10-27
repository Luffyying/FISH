<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <base href="<?php echo site_url()?>">
   <link rel="stylesheet" href="css/share.css">
</head>
<body>
<?php $appeal = ($this->input->post('data'));
//var_dump($appeal);
?>
    <div class="title">分&nbsp;&nbsp;&nbsp;&nbsp;享</div>
    <div class="share-content">
        <div class="share-content-title">分享内容：</div>
        <div class="share-content-input">
            <textarea class="form-control" rows="3" placeholder="请输分享内容（不得多于255个字..）"></textarea>
        </div>
    </div>

    <div class="row house-info">
        <div class="col-md-4 pic">
<!--            <img class="pic-show-img" src="img/share_picshow.png">-->
            <img class="pic-show-img" src="<?php echo $appeal["thumb_path"];?>">
        </div>
        <div class="col-md-8 intro">
            <p class="intro-title"><?php echo $appeal["title"];?></p>
            <span class="intro-items">
                <span class="items-owner"><?php echo $appeal["last_name"].$appeal["first_name"];?> 出租 /</span>
                <span class="items-address">地址： <?php echo $appeal["city"].$appeal["street"].$appeal["road"].$appeal["address"];?></span>
            </span>
            </div>
        </div>
    <div class="cancleBtns">
        <div class="cancleBtn cancle-share-btn">取&nbsp;消</div>
        <div class="confirmBtn confirm-share-btn">确&nbsp;认&nbsp;分&nbsp;享</div>

    </div>
</body>
</html>
