<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guest home</title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/ali_icon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user_page.css">
</head>
<body>
<?php include 'header.php';?>
    <div class="container row">
        <div class="buyer-content col-md-8">
            <div class="hobby">
                <h3>兴趣爱好:</h3>
                <ul class="icn-hob">
                    <?php
                        foreach($hobbies as $hobby){
                    ?>
                    <li class="iconfont">
                        <span><i class="iconfont-hobby"><?php echo $hobby->hobby_icon;?></i></span>
                        <span><p class="iconfont-name"><?php echo $hobby->hobby_name;?></p></span>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
                <div style="clear: both; display: block;"></div>
            </div>
            <div class="house">
                <h3>分享房源:</h3>
                <?php
                    foreach($shares as $share){
                ?>
                    <div class="house-content">
                        <img src="<?php echo $share->thumb_path;?>" alt="">
                        <div class="content-wrapper">
                            <h4><?php echo $share->title;?></h4>
                            <div class="content"><?php echo $share->content;?></div>
                        </div>
                        <div style="clear: both; display: block"></div>
                    </div>
                <?php
                }
                ?>
                <button type="button">加载更多</button>
            </div>
        </div>
        <div class="buyer-message col-md-4">
            <div class="message">
                <div class="header">房客</div>
                <div class="content">
                    <span><img src="<?php echo $user->thumb_img;?>" alt=""></span>
                    <span class="meg-name">
                        <h4><?php echo $user->first_name;?><?php echo $user->last_name;?></h4>
                        <p ></p>
                        <p class="ifm"><?php echo $user->sex;?>/<?php echo $user->birth_year;?>/<?php echo $user->country;?></p>
                    </span>
                    <div style="clear: both; display: block;"></div>
                    <h4 style="font-weight: bold;">关于</h4>
                    <p><?php echo $user->intro;?></p>
                </div>
            </div>
            <div class="comment-wrapper">
<!--                <input id="sender_id" type="hidden" value="--><?php //echo $->sender_id;?><!--">-->
<!--                <input id="receiver_id" type="hidden" value="--><?php //echo $->receiver_id;?><!--">-->
                <textarea id="content" name="text" id="" cols="20" rows="5" placeholder="发送文字（不超过225个字）..."></textarea>
                <button id="user_send" type="submit">发送站内信</button>
            </div>
        </div>
    </div>
<?php include 'footer.php';?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/require.js"></script>
<script src="js/index.js"></script>
<script src="js/header.js"></script>
<script src="js/footer.js"></script>
<script>
    $(function(){
        $('#user_send').on('click', function(){
            var $content = $('#content');
            $.post("welcome/user_mail", {
                    content:$content.val()
                },function(data){
                console.log(data);
                    if(data == 'success'){
                        alert('评论成功!') ;
                    }else{
                        alert('评论失败!');
                    }
                }, 'text');
        });
    });
</script>
</body>
</html>