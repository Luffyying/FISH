<?php
$login_user = $this -> session -> userdata('login_user');
if($login_user) {
    $user_id = $login_user->user_id;
}
else {
    redirect("welcome/index");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>我的旅程</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?php echo site_url();?>">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/booklist.css">
    <link rel="stylesheet" href="css/journey.css">
    <link rel="stylesheet" href="css/ali_icon.css">
    <link rel="stylesheet" href="css/dialog.css">
    <link rel="stylesheet" href="css/share.css">
    <link rel="stylesheet" href="css/complaint.css">
    <link rel="stylesheet" href="css/complaint_details.css">

</head>
<body>
<?php include "header.php";?>
<div class="container" id="container" data-userid="<?php echo $user_id;?>">
</div>
<?php include "footer.php";?>

<script src="js/jquery.js"></script>
<script src="js/header.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/react.js"></script>
<script src="js/react-dom.js"></script>
<script src="js/browser.js"></script>
<script type="text/babel" src="js/journey.js" ></script>
<script src="js/require.js" data-main="js/demo"></script>
</body>
</html>