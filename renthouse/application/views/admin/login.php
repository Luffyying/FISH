<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Login Page | Amaze UI Example</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>">
  <link rel="alternate icon" type="image/png" href="assets/i/favicon.png">
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <style>
    body{
      background: url(img/admin/login_bg.jpg) no-repeat 0 0;
      color: #fff;
    }
    .header {
      text-align: center;
    }
    .header h1 {
      font-style: italic;
      font-size: 400%;
      color: rgb(109,189,32);
      margin-top: 30px;
    }
    .header p {
      font-size: 25px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>wellcee</h1>
    <p><strong>Well</strong>,it's glod to <strong>cee</strong> you</p>
  </div>
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <form method="post" class="am-form">
      <label for="admin-name">用户名:</label>
      <input type="text" name="" id="admin-name" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="" id="password" value="">
      <br>
      <label for="remember-me">
        <input id="remember-me" type="checkbox">
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
      </div>
    </form>
  </div>
</div>
</body>
</html>
