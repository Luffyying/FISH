$(function(){
    var $houseMark = $('ul.houseMark li a');
    var $ownMark = $('ul.ownMark li a');
    $houseMark.on('click',function(){
        var title = $(this).attr("title");
        $houseMark.attr('mark',title);
        $('#mark1').val($houseMark.attr('mark'));
        alert('您给此次服务的评分是' + title);
        var cl = $(this).parent().attr('class');
        $(this).parent().parent().removeClass().addClass('rating' + ' ' + cl + '-star');
        return false;
    });
    $ownMark.on('click',function(){
        var title = $(this).attr("title");
        $ownMark.attr('mark',title);
        $('#mark2').val($ownMark.attr('mark'));
        alert('您给此次服务的评分是' + title);
        var cl = $(this).parent().attr('class');
        $(this).parent().parent().removeClass().addClass('rating' + ' ' + cl + '-star');
        return false;
    });
    //$('.submit').on('click',function(){
    //    var $ownFeel = $('.ownFeel');
    //    var $houseFeel = $('.houseFeel');
    //    $.post('welcome/comment',{
    //        houseMark: $houseMark.attr('mark'),
    //        houseFeel : $houseFeel.val(),
    //        ownMark: $houseMark.attr('mark'),
    //        ownFeel : $ownFeel.val(),
    //    },function(data){
    //        if(data == 'success'){
    //            alert('反馈成功');
    //        }else{
    //            alert('反馈失败');
    //        }
    //    },'text');
    //});
});
