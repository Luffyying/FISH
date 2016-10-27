<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="<?php echo site_url()?>">
	<script src='js/jquery.js'></script>
	<script src='js/jquery.range.js'></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap-select.min.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="css/ali_icon.css">
	<link rel="stylesheet" href="css/edit_user_infor.css">
	<script src='js/bootstrap.min.js'></script>
	<script src='js/bootstrap-datetimepicker.min.js'></script>
	<script src='js/bootstrap-select.js'></script>
	<meta name='viewport' content='width=device-width,initial-scale=1.0'/>
	<title>Edit information</title>
</head>
<body>
	<?php include 'header.php';?>
	<div class="container">
			<div class="row">
				<div class="col-md-8 " style='padding-left: 40px;min-height: 1000px'><br/><br/>
					 <span class='edit'>编辑个人资料</span>
					 <form action="welcome/save_user_infor" method="post" enctype="multipart/form-data">
					 	<div class='list'>您的真实姓名：<br/><br/>
					 	<input type="text" class='name1' name='name1' placeholder="<?php echo $infor->first_name?$infor->first_name:'名字'?>"/>&nbsp&nbsp&nbsp
					 	<input type="text" class='name1' name='name2' placeholder="<?php echo $infor->last_name?$infor->last_name:'姓氏'?>"/>
					 	</div>
					 	<div class='list'>
					 	性别：&nbsp&nbsp&nbsp<input <?php echo $infor->sex =='女'?"checked='checked'":""?> type="radio" value='女' name='sex'/>女&nbsp&nbsp&nbsp
					 		<input <?php echo $infor->sex =='男'?"checked='checked'":""?> type="radio" value='男' name='sex'/>男
					 	</div>
					 	<div class='list por'>
					 		上传头像：<span class='portrait'>+</span>
					 		<input name='img' type="file" accept="image/*"  class='pa am-input-sm'/>
					 		<div class='imgCrop'>
					 			<img class="<?php echo $infor->thumb_img?'':'hid'?>" src="<?php echo $infor->thumb_img?$infor->thumb_img:'upload/4.jpg'?>" alt="">
					 		</div>
					 	</div>
					 	<div class="list">
					 		出生日期：<br/><br/>
							<input name='birth' style='display:inline-block;border-radius: 0' class=" year form_datetime1 form-control " type="text" placeholder="<?php if($infor->birth_year>0) {?><?php echo $infor->birth_year?>-<?php echo $infor->birth_month?>-<?php echo $infor->birth_day?><?php }else{
									echo '年-月-日...';

								}?>"/>
					 	</div>
					 	<div class="list">
					 		您的电话：<br /><br />
					 		<input type="text" class='tel' name='tel' placeholder="<?php echo $infor->tel?$infor->tel:'电话...'?>"/>
					 	</div>
					 	<div class="list">
					 		您的邮箱：<br /><br />
					 		<input type="text" class='tel' name='e-mail' placeholder="<?php echo $infor->email?$infor->email:'邮箱...'?>"/>
					 	</div>
					 	<div class="list"> 
					 		您的国家：<br /><br />
					 		 <select name='country' class="selectpicker" style='width: 378px;height: 45px'>
  				      	  	  		<option value="国家">国家</option>
  				      	  	  	    <option value="中国" <?php echo $infor->country=="中国"?"selected='selected'":" ";?>>中国</option>
									<option value="法国" <?php echo $infor->country=="法国"?"selected='selected'":" ";?>>法国</option>
									<option value="印度" <?php echo $infor->country=="印度"?"selected='selected'":" ";?>>印度</option>						
   							</select>
					 	</div>
					 	<div class="list">
					 		请输入您的地址：<br /><br />
					 		<input type="text" class='address' name='address' placeholder="<?php echo $infor->address?$infor->address:'地址...'?>"/>
					 	</div>
					 	<div class="list">
					 		首选货币：<br /><br />
					 		 <select name='currency' class="selectpicker">
  				      	  	  		<option value="CNY" <?php echo $infor->currency=="CNY"?"selected='selected'":" ";?>>CNY</option>
  				      	  	  	    <option value="人民币"  <?php echo $infor->currency=="人民币"?"selected='selected'":" ";?>>人民币</option>
									<option value="美元"  <?php echo $infor->currency=="美元"?"selected='selected'":" ";?>>美元</option>	
   							</select>
					 	</div>
					 	<div class="list ">
					 	请选择你的爱好：
						 <ul class="list clearfix block">			
						 <?php foreach ($hobbys as $hobby) {?>					
            				 <li><span class='span-icon'><i data-id='<?php echo
            				 $hobby->hobby_id ?>' class="iconfont-hobby"><?php echo
            				 $hobby->hobby_icon ?></i><span class='brank'><?php echo
            				 $hobby->hobby_name ?></span></span> </li>
            				  <?php }?>
			                </ul>
			                <input type="hidden" value='' name='hobbys'/>
					 	</div>
					 	<div>
					 		请三两句介绍自己：<br/><br>
					 		<textarea class='introduce' name="introduce" placeholder="自我介绍..."></textarea> 
					 	</div>
					 	<br/>
					 	<div>
					 		<button  class='save' type='submit'>保存</button>
					 	</div>
					 </form>
					 <br/><br/>
				</div>
  				<div class="col-md-4"> 				     
  				   <div >
  				   	<img class='pic' src="img/window_bg.jpg" alt="">
  				   </div>
  				</div>
			</div>
	</div>
	<?php include 'footer.php';?>
	<script src="js/edit_user_infor.js"></script>	
</body>
<script type="text/javascript">	
</script>
</html>
