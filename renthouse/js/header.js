$(function(){
    $('.hea-list').mouseenter(function(){
        $(this).children().show();
    });
    $('.hea-list').mouseleave(function(){
        $(this).children().hide();
    });
    $('.header-list').find('li').on('click', function(){
        $('.header-list').hide();
    });
});