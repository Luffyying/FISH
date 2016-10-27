<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo site_url();?>">
	<title>用户评论房东</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/sendMessage.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/room_mgr.css">
	<link rel="stylesheet" type="text/css" href="css/dialog.css">
	<link rel="stylesheet" type="text/css" href="css/user_comment_owner.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php include "header.php" ;?>
<div id="user_comment_owner">
	<div class="container">
		<div class="row">
			<div id="commentContainer" class="col-xs-8 col-lg-8 col-md-8 col-sm-8">
				<div class="comment_title">
					<hr style="width:100%;margin: 0">
					<div class="row">
						<span class="left col-xs-3 col-lg-3 col-md-3 col-sm-3">总体评分</span>
						<span class="center col-xs-6 col-lg-6 col-md-6 col-sm-6"><i class="fa fa-heart heart" aria-hidden="true"></i><?php echo $average;?>分</span>

					</div>
				</div>
				<hr style="width:100%;margin: 0">
				<ul>
					<?php
							foreach ($datas as $data){
						?>
								<li>
									<div class="comment_content row">
										<div class="content_user col-xs-3 col-lg-3 col-md-3 col-sm-3">
											<div class="user-img"><img src="<?php echo $data->img;?>" alt="图片加载失败"></div>
											<div><?php echo $data->last_name." ".$data->first_name;?></div>
										</div>
										<div class="content_info col-xs-9 col-lg-9 col-md-9 col-sm-9 ">
											<div>
												<?php
													for ($i=0;$i<$data->score;$i++){
														?> <i class="fa fa-heart heart" aria-hidden="true"></i> <?php
													}
												?>
												<?php
												for ($i=0;$i<5-$data->score;$i++){
													?> <i class="fa fa-heart-o" aria-hidden="true"></i></i> <?php
												}
												?>

												<?php echo $data->score;?>分</div>
											<p class="comment_content_info"><?php echo $data->content;?></p>
											<ul>
												<div class="row">
													<li class="col-lg-9 col-md-9 col-sm-9"></li>

													<li class="col-lg-3 col-md-3 col-sm-3 info_date"><?php echo $data->comment_date;?></li>
												</div>
											</ul>
										</div>
									</div>
									<hr style="width:100%;margin: 0">
								</li>
					<?php
							}
					;?>

				</ul>
				<div class="page">
					<div>
						<nav>
							<ul class="pagination">
								<?php echo $this->pagination->create_links();?>

							</ul>
						</nav>
					</div>
				</div>
			</div>
			<div id="sidebar" class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
				<img src="img/right_side.png">
			</div>
		</div>
	</div>

</div>
<?php include "footer.php" ;?>
<script src="js/require.js" data-main="js/house_detail"></script>
</body>
</html>