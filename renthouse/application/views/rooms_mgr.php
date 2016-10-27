
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo site_url();?>">
	<title>房源管理</title>
	<!-- Bootstrap -->

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/dialog.css">
	<link rel="stylesheet" type="text/css" href="css/room_mgr.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php include "header.php" ;?>
<div id="room_mgr">
	<div class="container">
		<div class="row">
			<div id="roomContainer" class="col-xs-8 col-lg-8 col-md-8 col-sm-8">
				<div class="row">
					<div class="nav_title col-xs-3 col-lg-3 col-md-3 col-sm-3">
						<span class="navTitle">房源管理：</span>
					</div>
				</div>
				<div class="nav">
					<div class="row">
						<div class="am-dropdown room col-xs-2 col-lg-2 col-md-2 col-sm-2" data-am-dropdown>
							<select name="roomType" id="roomType">
								<option value="">房屋类型</option>
                                <option value="">全部</option>
								<?php
								foreach ($house_types as $house_type){
									?>
									<option value="<?php echo $house_type->type_id;?>"><?php echo $house_type->name;?></option>
									<?php
								}
								;?>
							</select>
						</div>
						<div class="am-dropdown rent col-xs-2 col-lg-2 col-md-2 col-sm-2" data-am-dropdown>
							<select name="rentType" id="rentType">
								<option value="">出租类型</option>
                                <option value="">全部</option>
								<?php
								foreach ($rent_types as $rent_type){
									?>
									<option value="<?php echo $rent_type->rent_type_id;?>"><?php echo $rent_type->name;?></option>
									<?php
								}
								;?>
							</select>
						</div>
						<!--<ul>
                            <li class="rec col-xs-2 col-lg-2 col-md-2 col-sm-2 col-md-offset-2">
                                <a href="#">房源管理<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <span class="shadow"></span>
                            </li>
                            <li class="send col-xs-2 col-md-2 col-md-offset-1">
                                <a href="#">出租类型<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <span class="shadow"></span>
                            </li>
                        </ul>-->
					</div>
				</div>
				<hr style="width: 100%;margin: 0">
				<div class="search">
					<div class="row">
						<div class="col-xs-3 col-lg-3 col-md-3 col-sm-3">
							<span class="search_left ">现有房间：<span class="roomCount"><?php echo $total_rows;?></span>个</span>
						</div>
						<div class="col-xs-3 col-lg-3 col-md-3 col-sm-3">
							<input id="keywords" type="text" name="keywords" value="" placeholder="搜索" class="search_center "/>
						</div>
						<div class="col-xs-1 col-lg-1 col-md-1 col-sm-1">
							<button class="room_search_opt opt_search">搜索</button>
						</div>
						<div class="col-xs-1 col-lg-1 col-md-1 col-sm-1">
							<button class="room_search_opt opt_add ">新增</button>
						</div>
						<div class="col-xs-1 col-lg-1 col-md-1 col-sm-1 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
							<button class="room_search_opt opt_del ">删除</button>
						</div>
					</div>
				</div>
				<hr style="width: 100%;margin: 0">
				<ul>
					<?php
						foreach ($datas as $data){
						?>
							<li>
								<div class="content title col-xs-12 col-lg-12 col-md-12 col-sm-12">
									<div class="row">
										<div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
											<input type="checkbox" name=""  class="room_from" data-id="<?php echo $data->house_id;?>">
											<img src="img/room.png" class="room_img">
										</div>
										<div class="room_info col-xs-4 col-lg-6 col-md-6 col-sm-6">
											<span>房源ID：<?php echo $data->house_id;?></span><br>
											<span>类型：</span>&nbsp;&nbsp;<span><?php echo $data->name;?></span><br>
											<span>状态：<?php echo $data->status==0?"正常":"禁用";?></span>
											<br>
											<br>
											<span class="room_info_date"><?php echo $data->post_date;?></span>
										</div>
										<div  class="col-xs-2 col-lg-2 col-md-2 col-sm-2">
											<button class="room_opt opt_edit opt_active" data-id="<?php echo $data->house_id;?>">编辑</button>
											<button class="room_opt opt_dele" data-id="<?php echo $data->house_id;?>">删除</button>
											<button class="room_opt <?php echo $data->status==0?"opt_dormant":"opt_cancel_dormant";?>" data-id="<?php echo $data->house_id;?>"><?php echo $data->status==0?"休眠":"取消休眠";?></button>
										</div>
									</div>
								</div>
								<hr style="width: 100%;margin: 0">
							</li>
							<?php
						}
					?>

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
			<div id="sidebar"  class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
				<img src="img/right_side.png">
			</div>
		</div>
	</div>
</div>
<?php include "footer.php" ;?>
<script src="js/require.js" data-main="js/rooms_mgr"></script>
</body>
</html>

