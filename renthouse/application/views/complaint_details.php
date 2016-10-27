<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>申诉</title>
    <base href="<?php echo site_url() ;?>">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dialog.css">
    <link rel="stylesheet" href="css/complaint_details.css">
</head>
<body>
<?php $appeals = json_decode($this->input->post('data'));?>
<div id="appeal-detail">
    <div class="title">申&nbsp;&nbsp;&nbsp;诉</div>
    <div id="complaint-content">
        <div class="complaint-content-items clearfix">
            <div class="complaint-content-info clearfix">
                <p>
                    订单编号: <?php echo $appeals[0]->order_id?>
                </p>
                <p>
                    房屋名称: <?php echo $appeals[0]->title?>
                </p>
                <p>
                    房东名字: <?php echo $appeals[0]->last_name?><?php echo $appeals[0]->first_name?>
                </p>
            </div>
            <div class="user-img">
<!--                <img class="user-img-content" style="background: red" src="img/head.png" alt="">-->
                <img class="user-img-content" style="background: red" src="<?php echo $appeals[0]->thumb_img?>" alt="">
            </div>
        </div>
        <div class="show-complaint-info">
            <?php foreach($appeals as $appeal){
            ?>
                <div class="show-complaint-content">
                    <span class="show-complaint-content-title">申诉内容：</span>
                    <p class="show-complaint-content-words"><?php echo $appeal->content?></p>
                </div>
                <div class="show-complaint-reply">
                    <?php if($appeal->reply != NULL){
                        ?>
                        <span class="show-complaint-reply-title">申诉回复：</span>
                        <p class="show-complaint-reply-words"><?php echo $appeal->reply?></p>
                        <?php
                    }?>
                </div>
            <?php
            }?>

        </div>
        <div id="submit-complaint">继&nbsp;续&nbsp;申&nbsp;诉</div>
    </div>
</div>
<div id="appeal-again" style="display: none;">
    <div class="again-title">再&nbsp;次&nbsp;申&nbsp;诉</div>
    <div class="complaint-again">
        <div class="complaint-content-input">
            <textarea name="" class="complaint-content-input-text" cols="30" rows="10" placeholder="请输入反馈内容（不得多于255个字..）"></textarea>
        </div>
        <div class="complaint-again-btn">提&nbsp;交</div>
    </div>
</div>
    <script src="js/jquery.js"></script>
    <script>
        $('#submit-complaint').on('click', function(){
            $("#appeal-detail").hide();
            $("#appeal-again").show();
//            $('#complaint-content, .title').remove();
        });
    </script>
</body>
</html>