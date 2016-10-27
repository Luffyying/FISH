require(['jquery', 'bootstrap-datetimepicker.min', 'slide_pic', 'login_reg_forg'], function($, Dialog){
    require(['bootstrap.min'],function () {
        //轮播图
        $('.item').eq(0).addClass('active');
        $('.carousel').carousel();

    })

    $(function(){

        /*//日历固定定位 
                var $calendar = $('#calendar');
                var $offset = $calendar.offset();
                var calendar = document.getElementById('calendar');
                var bFixed = false;//标识是否已经固定定位
                $(window).on('scroll', function(){
                    var iScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                    if(iScrollTop >= $offset.top && !bFixed){
                        calendar.className = 'fixed';               
                        bFixed = true;
                    }else{
                        if(iScrollTop < $offset.top && bFixed){
                            calendar.className = "";
                            bFixed = false;
                        }
                    }
        });*/ 

        //加载更多
        var comOffset = 0;
        var $loadMore = $('.load_more');
        var houseId = $('#houseId').html();
        $loadMore.on('click', function(){
            $loadMore.hide();
            var html = '';
            $.get('welcome/get_more?houseId='+houseId,{
                offset: comOffset+=6
            }, function(data){
                if(data){
                    for (var i = 0; i < data.length; i++) {
                        var comment = data[i];
                        if(data.length<6){
                            $loadMore.html('没有更多评论了!').prop('disabled', true);
                        }
                        html += `<div class="comment_list row">
                                <div class="head-info col-md-3">
                                    <img src="`+comment.user_info.img+`" alt="" class="img-circle">
                                    <h4>`+comment.user_info.nick_name+`</h4>
                                    <p><span class="red_hearts">♥♥♥♥♥</span></p>
                                </div>

                                <div class="comment_content col-md-9">
                                    <p>
                                        `+comment.content+`
                                    </p>
                                    <div class="comment_img">
                                        <img src="`+comment.img_first+`" alt="">
                                        <img src="`+comment.img_second+`" alt="">
                                    </div>
                                    <p class="comment_time">
                                        `+comment.comment_date+`
                                    </p>
                                </div>
                            </div>
                            <hr> `;                           
                    }
                }else{
                    alert('加载失败！');
                }
                $('#comment_lists').append(html);
                //更新评论数
                var commentNum = $('.comment_list').length;
                $('.comNum').text(commentNum);
                
                $loadMore.show();
            },'json');
        });


        // 日期选择
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


     



    });
});
