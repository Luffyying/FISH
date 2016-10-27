$(function(){
    $('.bb').find('li').on('click', function(){
        $('.bbb').html($(this).html());
    });
    $('.aa').children('li').on('click', function(){
        $('.aaa').html($(this).html());
    });
});