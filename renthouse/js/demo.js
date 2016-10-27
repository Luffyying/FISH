require(['jquery', 'dialog'], function($, Dialog){

	$('#share').on('click', function(){
		//分享个人
		var dialog = new Dialog();
		dialog.open({
			width:450,
			height:455,
			url:'share'
		});
	});
	$('#complaint').on('click', function(){
		//申诉
		var dialog = new Dialog();
		dialog.open({
			width:450,
			height:460,
			url:'complaint'
		});
	});
	$('#complaint_details').on('click', function(){
		//申诉详情
		var dialog = new Dialog();
		dialog.open({
			width:450,
			height:547,
			url:'complaint_details'
		});


	});


});