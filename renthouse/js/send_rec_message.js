require(['jquery','dialog', 'slide_pic', 'login_reg_forg'], function($, Dialog) {
    $(function () {
        //ajax方式查询收件箱
        $('#mailContainer .rec').on('click', function () {
            var that = this;
            var cateId = $(this).data('id');
            if (cateId == 1) {
                $.get('admin/mgruser/get_rec_message', {}, function (datas) {
                    var html = '';
                    var count = datas.count;
                    var name = '';

                    for (var i = 0; i < (datas.datas).length; i++) {
                        var data = datas.datas[i];


                        html += `<li data-num="` + data.mail_id + `">
							<div class="content">
								<div class="row contents">
									<input type="checkbox" name="" data-num="` + data.mail_id + `"
										   class="content_from col-xs-1 col-lg-1 col-md-1 col-sm-1"  value="` + data.mail_id + `">
									<span class="content_from_title col-xs-2 col-lg-2 col-md-2 col-sm-2">` + data.last_name + " " + data.first_name + `</span>
									<span class="content_cont col-xs-4 col-lg-4 col-md-4 col-sm-4">` + data.content + `</span>
									<span class="content_date col-xs-3 col-lg-3 col-md-3 col-sm-3">` + data.mail_date + `</span>
									<div class="opt-container col-xs-2 col-lg-2 col-md-2 col-sm-2">
										<button class="content_opt del"  data-num="` + data.mail_id + `">删除</button>
										 <button class="content_opt rep" data-num="` + data.mail_id + `">回复</button>
									</div>
								</div>
							</div>
							<hr style="width:100%;margin: 0">
						</li>`;
                    }
                    $('#mailContainer .notice span').removeClass('shadow');
                    $('#mailContainer .send span').removeClass('shadow');
                    $('#mailContainer .rec span').addClass('shadow');
                    $('#contentList > li').remove();
                    $('#contentList').append(html);
                    $('#count').empty();
                    $('#count').html(count);
                    $('.title_from_title').empty();
                    $('.title_from_title').html('来自');
                    a();
                    searchRec();
                }, 'json');
            }
        });
        //ajax方式查询发件箱
        $('#mailContainer .send').on('click', function () {
            var that = this;
            var cateId = $(this).data('id');
            if (cateId == 2) {
                $.get('admin/mgruser/get_send_message', {}, function (datas) {
                    var html = '';
                    var count = datas.count;
                    for (var i = 0; i < (datas.datas).length; i++) {
                        var data = datas.datas[i];

                        html += `<li data-num="` + data.mail_id + `">
							<div class="content">
								<div class="row contents">
									<input type="checkbox" name="" data-num="` + data.mail_id + `"
										   class="content_from col-xs-1 col-lg-1 col-md-1 col-sm-1" value="` + data.mail_id + `">
										   
									<span class="content_from_title col-xs-2 col-lg-2 col-md-2 col-sm-2">` + data.last_name + " " + data.first_name + `</span>
									<span class="content_cont col-xs-4 col-lg-4 col-md-4 col-sm-4">` + data.content + `</span>
									<span class="content_date col-xs-3 col-lg-3 col-md-3 col-sm-3">` + data.mail_date + `</span>
									<div class=" col-xs-2 col-lg-2 col-md-2 col-sm-2">
										<button class="content_opt del" data-num="` + data.mail_id + `">删除</button>
									</div>
								</div>
							</div>
							<hr style="width:100%;margin: 0">
						</li>`;
                    }
                    $('#mailContainer .rec span').removeClass('shadow');
                    $('#mailContainer .notice span').removeClass('shadow');
                    $('#mailContainer .send span').addClass('shadow');
                    $('#contentList > li').remove();
                    $('#contentList').append(html);
                    $('#count').empty();
                    $('#count').html(count);
                    $('.title_from_title').empty();
                    $('.title_from_title').html('发给');
                    searchSend();
                    a();
                }, 'json');
            }
        });
        //ajax方式查询公告箱
        $('#mailContainer .notice').on('click', function () {
            var that = this;
            var cateId = $(this).data('id');
            if (cateId == 3) {
                $.get('admin/mgruser/get_notice_message', {}, function (datas) {
                    var html = '';
                    var count = datas.count;

                    for (var i = 0; i < datas.datas.length; i++) {
                        var data = datas.datas[i];


                        html += `<li data-num="` + data.mail_id + `">
							<div class="content">
								<div class="row contents">
									<input type="checkbox" name="" data-num="` + data.mail_id + `"
										   class="content_from col-xs-1 col-lg-1 col-md-1 col-sm-1" value="` + data.mail_id + `">
										   
									<span class="content_from_title col-xs-2 col-lg-2 col-md-2 col-sm-2">` + "公 告" + `</span>
									<span class="content_cont col-xs-4 col-lg-4 col-md-4 col-sm-4">` + data.content + `</span>
									<span class="content_date col-xs-3 col-lg-3 col-md-3 col-sm-3">` + data.mail_date + `</span>
									<div class=" col-xs-2 col-lg-2 col-md-2 col-sm-2">
										<button class="content_opt del" data-num="` + data.mail_id + `">删除</button>
									</div>
								</div>
							</div>
							<hr style="width:100%;margin: 0">
						</li>`;
                    }
                    $('#mailContainer .rec span').removeClass('shadow');
                    $('#mailContainer .send span').removeClass('shadow');
                    $('#mailContainer .notice span').addClass('shadow');
                    $('#contentList > li').remove();
                    $('#contentList').append(html);
                    $('#count').empty();
                    $('#count').html(count);
                    $('.title_from_title').empty();
                    $('.title_from_title').html('来自');
                    searchNotice();
                    a();
                }, 'json');
            }
        });
        //封装该界面的删除与回复的点击事件，主要是应付后生成的元素绑定事件
        function a() {
            //该界面的删除的点击事件
            $('#contentList .del').on('click', function () {
                var that = this;
                if (confirm('是否确定删除该回复，可以在回收站中恢复.')) {
                    var mailId = $(this).data('num');
                    $.get('admin/mgruser/delete_message', {
                        mailId: mailId
                    }, function (data) {
                        if (data == 'success') {
                            alert('删除成功!');
                            $(that).parents('li').remove();
                        } else {
                            alert('删除失败!');
                        }
                    }, 'text');
                }
            });
            //封装该界面的回复的点击事件
            $('#contentList  .rep').on('click', function () {
                var that = this;
                if (confirm('是否确定回复该信息?')) {
                    html = `<div class="contentText">
								<div class="row">
									<div  class="col-xs-7 col-lg-7 col-md-7 col-sm-7 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
										<textarea cols="10" rows="5" name="" id="contentText"></textarea>
									</div>
									<div class="col-xs-2 col-lg-2 col-md-2 col-sm-2">
									    <button class="content_opt repText ">回复</button>
                                    </div>
								</div>
						</div>`;
                    $(that).parents('.opt-container').hide();
                    $(that).parents('.content').append(html);
                    b();
                }
            });

        }

        //封装该界面的回复站内信的具体点击事件，主要是应付后生成的元素绑定事件
        function b() {
            $('#contentList .repText').on('click', function () {
                var that = this;
                var mailId = $(this).parents('li').data('num');
                var content = $('#contentText').val();
                $.get('admin/mgruser/reply_message', {
                    mailId: mailId,
                    content: content
                }, function (data) {
                    if (data == 'success') {
                        alert('回复成功!');
                    } else {
                        alert('回复失败!');
                    }
                }, 'text');
                $('#contentText').remove();
                $('.opt-container').show();
                $('.contentText').hide();
            });
        }

        //封装该界面的查询收件箱的相关事件，主要是应付后生成的元素绑定事件
        function searchRec() {
            $('.search_center').on('keyup', function () {
                var keyword = $('.search_center').val();
                //var userId = $('#message').data('id');
                if (keyword) {
                    $.get('admin/mgruser/search_recMail_by_content', {
                        //userId:userId,
                        keyword: keyword
                    }, function (infos) {
                        var html = '';
                        var name = '';
                        var count = infos.count;
                        for (var i = 0; i < (infos.datas).length; i++) {
                            var data = infos.datas[i];

                            html += `<li data-num="` + data.mail_id + `">
							<div class="content">
								<div class="row contents">
									<input type="checkbox" name="" data-num="` + data.mail_id + `"
										   class="content_from col-xs-1 col-lg-1 col-md-1 col-sm-1"  value="` + data.mail_id + `">
									<span class="content_from_title col-xs-2 col-lg-2 col-md-2 col-sm-2">` + data.last_name + " " + data.first_name + `</span>
									<span class="content_cont col-xs-4 col-lg-4 col-md-4 col-sm-4">` + data.content + `</span>
									<span class="content_date col-xs-3 col-lg-3 col-md-3 col-sm-3">` + data.mail_date + `</span>
									<div class="opt-container col-xs-2 col-lg-2 col-md-2 col-sm-2">
										<button class="content_opt del"  data-num="` + data.mail_id + `">删除</button>
										 <button class="content_opt rep" data-num="` + data.mail_id + `">回复</button>
									</div>
								</div>
							</div>
							<hr style="width:100%;margin: 0">
						</li>`;
                        }
                        $('#contentList > li').remove();
                        $('#contentList').append(html);
                        $('#count').empty();
                        $('#count').html(count);
                        $('.title_from_title').empty();
                        $('.title_from_title').html('来自');
                        a();
                    }, 'json');
                } else {
                    location.reload();
                }
            });
        }

        //封装该界面的查询发件箱的相关事件，主要是应付后生成的元素绑定事件
        function searchSend() {
            $('.search_center').on('keyup', function () {
                var keyword = $('.search_center').val();
                //var userId = $('#message').data('id');
                if (keyword) {
                    $.get('admin/mgruser/search_sendMail_by_content', {
                        //userId:userId,
                        keyword: keyword
                    }, function (infos) {

                        var html = '';
                        var name = '';
                        var count = infos.count;

                        for (var i = 0; i < (infos.datas).length; i++) {
                            var data = infos.datas[i];
                            html += `<li data-num="` + data.mail_id + `">
							<div class="content">
								<div class="row contents">
									<input type="checkbox" name="" data-num="` + data.mail_id + `"
										   class="content_from col-xs-1 col-lg-1 col-md-1 col-sm-1"  value="` + data.mail_id + `">
									<span class="content_from_title col-xs-2 col-lg-2 col-md-2 col-sm-2">` + data.last_name + " " + data.first_name + `</span>
									<span class="content_cont col-xs-4 col-lg-4 col-md-4 col-sm-4">` + data.content + `</span>
									<span class="content_date col-xs-3 col-lg-3 col-md-3 col-sm-3">` + data.mail_date + `</span>
									<div class="opt-container col-xs-2 col-lg-2 col-md-2 col-sm-2">
										<button class="content_opt del"  data-num="` + data.mail_id + `">删除</button>
									</div>
								</div>
							</div>
							<hr style="width:100%;margin: 0">
						</li>`;
                        }
                        $('#contentList > li').remove();
                        $('#contentList').append(html);
                        $('#count').empty();
                        $('#count').html(count);
                        $('.title_from_title').empty();
                        $('.title_from_title').html('发给');
                        a();
                    }, 'json');
                } else {
                    location.reload();
                }
            });
        }

        //封装该界面的查询公告箱的相关事件，主要是应付后生成的元素绑定事件
        function searchNotice() {
            $('.search_center').on('keyup', function () {
                var keyword = $('.search_center').val();
                //var userId = $('#message').data('id');
                if (keyword) {
                    $.get('admin/mgruser/search_noticeMail_by_content', {
                        keyword: keyword
                    }, function (infos) {

                        var html = '';
                        var name = '';
                        var count = infos.count;
                        for (var i = 0; i < (infos.datas).length; i++) {
                            var data = infos.datas[i];

                            html += `<li data-num="` + data.mail_id + `">
							<div class="content">
								<div class="row contents">
									<input type="checkbox" name="" data-num="` + data.mail_id + `"
										   class="content_from col-xs-1 col-lg-1 col-md-1 col-sm-1"  value="` + data.mail_id + `">
									<span class="content_from_title col-xs-2 col-lg-2 col-md-2 col-sm-2">` + "公 告" + `</span>
									<span class="content_cont col-xs-4 col-lg-4 col-md-4 col-sm-4">` + data.content + `</span>
									<span class="content_date col-xs-3 col-lg-3 col-md-3 col-sm-3">` + data.mail_date + `</span>
									<div class="opt-container col-xs-2 col-lg-2 col-md-2 col-sm-2">
										<button class="content_opt del"  data-num="` + data.mail_id + `">删除</button>
										 <button class="content_opt rep" data-num="` + data.mail_id + `">回复</button>
									</div>
								</div>
							</div>
							<hr style="width:100%;margin: 0">
						</li>`;
                        }
                        $('#contentList > li').remove();
                        $('#contentList').append(html);
                        $('#count').empty();
                        $('#count').html(count);
                        $('.title_from_title').empty();
                        $('.title_from_title').html('来自');
                        a();
                    }, 'json');
                } else {
                    location.reload();
                }
            });
        };
        //该界面最上面的复选框勾选事件，可以选择全部或者反选
        $('.check_option').on('click', function () {
            var arr = $('input:checkbox');
            for (var i = 1; i < arr.length; i++) {
                arr[i].checked = !arr[i].checked;
            }
        });
        //该界面的批量删除功能
        $('#btn-delete-selected').on('click', function () {
            if (confirm('是否确定删除该记录，可以在回收站中恢复.')) {
                var delStr = '';
                var $checked = $(':checked');
                $checked.each(function () {
                    delStr += $(this).data('num') + ',';
                });
                delStr = delStr.substring(0, delStr.length - 1);
                $.get('admin/mgruser/delete_selected_mail', {mailIdStr: delStr}, function (data) {
                    if (data == 'success') {
                        alert('删除成功！');
                        $checked.parents('li').remove();
                    } else {
                        alert('删除失败，请重试！');
                    }
                }, 'text');
            }
        });
    });
});