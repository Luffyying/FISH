<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="<?php echo site_url()?>">
	<script src='js/jquery.js'></script>
	<link rel="stylesheet" href="css/jquery.range.css">
	<script src='js/jquery.range.js'></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-select.min.css">
<!-- 	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/normalize.css"> -->
	<link rel="stylesheet" href="font/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
	<script src='js/bootstrap.min.js'></script>
	<script src='js/bootstrap-datetimepicker.min.js'></script>
	<script src='js/bootstrap-select.js'></script>
<!-- 	<link rel="stylesheet" href="assets/css/amazeui.min.css"/> -->
   <!--  <link rel="stylesheet" href="assets/css/admin.css"> -->
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="css/jquery.range.css">
	<link rel="stylesheet" href="css/ali_icon.css">
    <link rel="stylesheet" href="css/search.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- <script src='js/bootstrap-datetimepicker.zh-CN.js'></script> -->
	<meta name='viewport' content='width=device-width,initial-scale=1.0'/>
	<title>Search house</title>

	<style>
		.am-pagination {
    position: relative;
}
.am-pagination {
    padding-left: 0;
    margin: 1.5rem 0;
    list-style: none;
    color: #999;
}
.am-pagination, th {
    text-align: left;
}

.am-pagination:after, .am-pagination:before {
    content: " ";
    display: table;
}
.am-pagination li{
	display: inline-block;
	margin-right: 10px;
	height: 32px;
	width: 30px;
	text-align: center;
	/*background-color: #ccc;*/
	border: 1px solid #ccc;

}
.am-pagination > a{
	height: 20px;
	width: 20px;
	 /*background-color: #0e90d2;*/
}
.am-pagination > .am-active{
	background-color: #0e90d2;
}
.am-pagination >.am-active >a{
	z-index: 2;
    color: #fff;
    background-color: #0e90d2;
    border-color: #0e90d2;
    cursor: default;
}
	</style>
</head>
<body>
    <?php include 'header.php';?>
	<div class="container">
			<div class="row">
				<div class="col-md-8 " style='padding-left: 40px;min-height: 1000px'>
					 <div class="btn-group top bot">
						<button name='price' type="button" class="btn btn-default">价格 &nbsp</button>
					</div>
					<div class="btn-group top bot">
						<button name='score' type="button" class="btn btn-default">评分&nbsp  </button>
					</div>
					<div class="btn-group top bot">
						<button name='collect' type="button" class="btn btn-default">收藏数</button>
					</div>
					<div class='clearfix'>
						<ul id="house" >
						<?php foreach ($images as $img){?>
						<li class='detial'><a href='house_detial?house_id=<?php echo  $img->house_id?>'><img src='<?php echo $img->path?>'></img><span class='price'>￥<?php echo $img->price?></span></a><span class='top left'><?php echo $img->intro?></span><br/>
						<span class='left'><?php echo $img->type?>/</span>&nbsp&nbsp<span>收藏：<?php echo $img->collect_num?>/</span>&nbsp&nbsp<span>
							<?php
								for ($i=0;$i<$img->score;$i++){
										?> <i class="fa fa-heart heart" aria-hidden="true"></i> <?php
												}
							?>
							<?php
								for ($i=0;$i<5-$img->score;$i++){
										?> <i class="fa fa-heart-o" aria-hidden="true"></i> <?php
												}
							?>
							</span>
						</li>
						<?php }?>
					</ul></div>
					 	<!-- <ul class="am-pagination">
                    		<?php echo $this->pagination->create_links();?>
              			</ul> -->
                        <div class="am-fr">
                            <ul class="am-pagination">
                                <?php echo $this->pagination->create_links();?>
                            </ul>
                        </div>
			</div>
  				<div class="col-md-4"> 				     
  				    <form action="#" >
  				      <div id="search">
  				      	      <button type='button' class='search-btn'>搜  索</button>
	  				      	  <div class='list' style='margin-top: 10px'>位置&nbsp&nbsp&nbsp
	  				      	  	<select style='width: 110px' class='sel pro' name="province"
	  				      	  	onchange="myturn()">
									<option  selected="selected" >请选择省份</option>
								</select>-<select style='width: 110px' class='sel cit' name="city" id="" onchange="turn()">
										<option selected="selected">请选择城市</option>
								</select>
	  				       	  </div>
			  				  <div class='list'>日期/人数 <input name='start' style='display:inline-block;border-radius: 0' class="form_datetime form-control" type="text" placeholder="入住日期" size="16">-
			  				      	  <input name='end' style='display:inline-block;border-radius: 0'' class="form_datetime form-control" type="text" placeholder="退房日期"size="16">
	  				      	  </div>
  				      	      <div class='list'><input style='width:200px;margin-left: 90px' type='text' name='hold-num' placeholder="入住人数" />
  				      	      </div>
  				              <div class='list'>房屋类型
  				      	  	  <select class="selectpicker g">
  				      	  	  	    <option value="房屋类型">选择类型</option>
									<option value="公寓">公寓</option>
									<option value="别墅">别墅</option>
									<option value="海景房">海景房</option>
   							   </select>
  							 </div>
  							 <div class='list'>出租类型
  				      	  	  <select class="selectpicker k">
  				      	  	  		<option value="出租类型">选择类型</option>
  				      	  	  	    <option value="整租">整租</option>
									<option value="床位">床位</option>
									<option value="合租">合租</option>
   							   </select>
  							 </div>
	  				      	  <div class='price-range'>价格区间</div>
	  				      	<div class="range">
								<input type="hidden" class="single-slider" value="23,100000" />
							</div>
	  				      	  <hr/>
	  				      	  <button id='select-addit' type='button' class='sure-btn'>筛选条件</button>
	  				      	   <div class='demo'>
								<input type="hidden" class="slider-input" value="23" />
	  				      	  </div>
	  				  				<div id="search-add">
				  				          <div class='list'>卧室个数&nbsp<input class='condition' type="text" name="room-num" placeholder="个数" /></div>
				  				          <div class='list'>床数&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class='condition' type="text" name="bed-num" placeholder="个数" /></div>
				  				          <div class='list'>卫生间数&nbsp<input type="text" class='condition' name="toilet-num" placeholder="个数" /></div>
				  				          <div class='list'>
											  <ul class="clearfix k">
				  				              <li>&nbsp&nbsp&nbsp&nbsp便利设施</li><br />
				  				              <hr style='width: 90%'/>
				  				             <?php foreach ($cons as $con ) {?>
				  				              <li><span class='span-icon' data-id='<?php echo
			            				 $con->convenience_id ?>'><i  class="iconfont-convenient" aria-hidden="true"><?php echo
			            				 	$con->icon ?></i><span class='brank'><?php echo $con->name?></span></span>
				  				              </li>
				  				         <?php  }?>
											  </ul>
				  				          </div>
				  				          <input type="hidden" value='' name='cons'/>
				  				      	  <button type='button' id='resite' class='resite-btn'>重  置</button>
	  				 			 </div>
	  				      	  <button type='button' class='sure sure-btn'>确  认</button>
  				      </div>
	  				</form>
  				</div>
			</div>
	</div>
	<?php include 'footer.php';?>
</body>
<script type="text/javascript">
				$.get('welcome/city',{},function(data){
					for(i=0;i<data.length;i++){
					newoption = new Option(data[i].name,data[i].id);
					$("select[name='province']")[0].options.add(newoption);
				}
				},'json');
				function myturn(){
				    $("select[name='city']")[0].options.length =0;
				    if($('.pro option:selected').val()=='请选择省份'){
				    	newoption = new Option('请选择城市','请选择城市');
						$("select[name='city']")[0].options.add(newoption);
				    }else{
					$.get('welcome/street',{id:$('.pro option:selected').val()},function(data){

						for(i=0;i<data.length;i++){
						newoption = new Option(data[i].name,data[i].id);
						$("select[name='city']")[0].options.add(newoption);
						}
					},'json');
					}
				}
			// function turn(){
			// 	$start= $("input[name='start']").val();
		 //    	$end= $("input[name='end']").val();
		 //    	if($start>$end){
		 //    		alert('no');
		 //    	}
			// }
			$("button[name='price']").on('click',function(){
				location.href='welcome/search?orderby=price';
			});
			$("button[name='score']").on('click',function(){
				location.href='welcome/search?orderby=score';
			});
			$("button[name='collect']").on('click',function(){
				location.href='welcome/search?orderby=collect';
			});
		     $(".form_datetime").datetimepicker({
		        format: "yyyy-mm-dd",
		        autoclose: true,
		        todayBtn: true,
		        todayHighlight: true,
		        showMeridian: true,
		        pickerPosition: "bottom-left",
		        language: 'zh-CN',
		        startView: 2,//月视图
		        minView: 2//日期时间选择器所能够提供的最精确的时间选择视图
		    });
			  $('.single-slider').jRange({
				from: 1000,
				to: 100000,
				step: 100,
				scale: [1000,25750,50500,75250,100000],
				format: '%s',
				width: 300,
				showLabels: true,
				showScale: true
			});
			var input = $("input[name='cons']");
			var spans = $('.span-icon');
			spans.each(function(){
				$(this).attr('flag','true');
			});
			spans.on('click',function(){
				var flag =0;
				var list='';
		        if($(this).attr('flag')=='true'){
		        	$(this).addClass('selected');
		        	$(this).attr('flag','false');
		        }else{
		        	$(this).removeClass('selected');
		        	$(this).attr('flag','true');
		        }
		         spans.each(function(){
					    if($(this).is('.selected')){
					        //s.push($(this).attr('data-id'));
					        if(flag==0){
					            list+=$(this).attr('data-id');
					            flag =1;
					        }else{
					            list+=','+$(this).attr('data-id');
					        }
					    }
					});
		          input.val(list);
		     });


		    $('#select-addit').on('click',function(){
		    	if($('#search-add').css('display')=='block'){
		    		$('#search-add').css('display','none');
		    	}else{
		    		$('#search-add').css('display','block');
		    	}
		    });
		   $('#resite').on('click',function(){
		    	$('.span-icon').each(function(){
		    		$(this).removeClass('selected');
		    	});
		    	$("input[type='text']").val('');
		    });
		    $('.sure').on('click',function(){
		    	$pro = $('.pro option:selected').text();
		    	$cit = $('.cit option:selected').text();
		    	$start= $("input[name='start']").val();
		    	$end= $("input[name='end']").val();
		    	$hold = $("input[name='hold-num']").val();
		    	$house_type = $('.g option:selected').val();
		    	$rent_type = $('.k option:selected').val();
		    	$price = $(".single-slider").val();
		    	$room = $("input[name='room-num']").val();
		    	$bed = $("input[name='bed-num']").val();
		    	$toilet = $("input[name='toilet-num']").val();
		    	$conv = $("input[name='cons']").val();
		    	location.href='welcome/search/?pro='+$pro+'&cit='+$cit+'&start='+$start+'&end='+
		    	$end+'&hold='+$hold+'&house_type='+$house_type+'&rent_type='+$rent_type+'&price='+$price+'&room='+$room+'&bed='+$bed+'&toilet='+$toilet+'&conv='+$conv;
		    	// $.post('welcome/search',{pro:$pro,cit:$cit,start:$start,end:$end,hold:$hold,
		    	// 	house_type:$house_type,rent_type:$rent_type,price:$price},function(data){
		    	// 	$('.detial').remove();
	      // 			var html = '';
	      // 			console.log(data.length);
	      // 			console.log(data);
	      // 			//redirect('search.php');
	      // 			for(var i=0;i<data.length;i++){
	      // 				var $img= data[i];
	      // 				html+= "<li class='detial'><a href='#'><img src='"+$img.path+"'></img><span class='price'>￥"+$img.price+"</span></a><span class='top left'>"+$img.intro+"</span><br/><span class='left'>"+$img.type+'/</span>&nbsp&nbsp<span>收藏：'+$img.collect+"/</span>&nbsp&nbsp<span>五颗星/</span></li>"
	      // 			}
      	// 		$('#house').append(html);
		    	// },'json');
		    	//location.href='welcome/search'
		    });

</script>
</html>

