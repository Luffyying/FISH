<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>申诉</title>
    <base href="<?php echo site_url()?>">
    <link rel="stylesheet" href="css/complaint.css">
</head>
<?php $data = json_decode($this->input->post('data'));?>
<!--获取load函数发送的数据-->
<!--this.$content.load(settings.url, {//url=>需要加载页面的url-->
<!--data: settings.data //data=>页面需要加载的数据-->
<!--}).appendTo(this.$dialogBox);-->
<body>
    <div class="title">申&nbsp;&nbsp;&nbsp;诉</div>
    <div class="complaint_content">
        <div class="complaint_content-info">
            <p>
                <span class="order-number-title">订单编号:</span>
                <span class="order-number-content"><?php echo $data->order_id?></span>
            </p>
            <p>
                <span class="house-name-title">房屋名称:</span>
                <span class="house-name-content"><?php echo $data->title?></span>
            </p>
            <p>
                <span class="house-owner-title">房东名字:</span>
                <span class="house-owner-content"><?php echo $data->last_name?><?php echo $data->first_name?></span>
            </p>
        </div>
        <div class="user-img">
            <img class="user-img-content" style="background: red" src="<?php echo $data->thumb_img?>" alt="">
        </div>
        <div class="complaint-content-input">
            <textarea name="" class="input-text" cols="30" rows="10" placeholder="请输入反馈内容（不得多于255个字..）"></textarea>
        </div>
<!--        <input type="submit">-->
<!--        <input type="text">-->
<!--        <button></button>-->
        <div class="submit-complaint">提&nbsp;交</div>
    </div>
</body>
</html>