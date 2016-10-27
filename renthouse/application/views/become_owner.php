<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>编辑房东信息</title>
    <base href="<?php echo site_url()?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/become_owner.css">

</head>
<body>
<?php include 'header.php' ;?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="edit-area">
                <h3>想要成为Wellcee房东，您需要完善一些信息</h3>
                <form class="edit-area-content">
                    <div class="edit-area-group">
                        <label class="username-tips">您的真实姓名：</label>
                        <ul class="username-info">
                            <li ><input type="text" class='first_name'  placeholder="名字"></li>
                            <li ><input type="text" class='last_name'  placeholder="姓氏"></li>
                        </ul>
                    </div>
                    <div class="edit-area-group">
                        <label class="userphone-tips">您的电话：</label>
                        <div class="userphone-info">
                            <input type="email" name='phone' class="phone" placeholder="电话..">
                        </div>
                    </div>

                    <div class="edit-area-group">
                        <label class="useremail-tips">您的邮箱：</label>
                        <div class="useremail-info">
                            <input type="tel" name='email' class="email" placeholder="邮箱..">
                        </div>
                    </div>

                    <div class="edit-area-group">
                        <label class="userid-tips">请输入您的证件号：</label>
                        <div class="userid-info">
                            <input type="text" name='id' class="idnumber" placeholder="证件号..">
                        </div>
                    </div>

                    <div class="edit-area-group">
                        <label class="bandid-tips">请输入您的银行卡号：</label>
                        <div class="bandid-info">
                            <input type="text"  class="bandid" placeholder="银行卡号..">
                        </div>
                    </div>
                    <div class="edit-area-group">
                        <label  class="userpassword-tips">请设置您的房东独立密码：</label>
                        <div class="userpassword-info">
                            <input type="text" class='password'  placeholder="独立密码">
                        </div>
                    </div>
                    <div class="edit-area-group">
                        <label class="confirmpass-tips">请确认您的房东独立密码：</label>
                        <div class="confirmpass-info">
                            <input type="text" class='confirm_pwd' placeholder="确认独立密码">
                        </div>
                    </div>

                    <div class="edit-area-group">
                        <label class="userintro-tips" >请三两句话介绍一下你的房东：</label>
                        <div class="userintro-info">
                            <textarea cols="30" rows="10" class="intro" placeholder="对房东说的话.."></textarea>
                        </div>
                    </div>

                    <div class="edit-area-radio">
                        <input type="radio" class='agree' value=''>同意房东条约<br><br>
                    </div>

                    <div class="edit-area-button">
                        <button type="button" class="submit ">提&nbsp;交</button>
                    </div>
                </form>
            </div>

        </div>
        <div class="col-md-4">
            <div id="house-img" >
                <img src="img/becomehost.png" alt="&lt;">
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ;?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/require.js"></script>
<script src="js/footer.js"></script>
<script src="js/become_owner.js"></script>
</body>
</html>