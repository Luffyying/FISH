define(['jquery'], function($){
    $(function(){
        var $picContainer = $('.pic_container');
        var $picNum = $picContainer.children('img').length;
        var n = 0;
        var picWidth = 280;
        $picContainer.css({
            width: picWidth*$picNum + 'px',
            left: 0 + 'px'
        });
        $('.pic_next').on('click', function(){
            if(n < ($picNum-2)){
                $picContainer.css({
                    left: -(picWidth*(++n))+'px'
                });
            }
        });
        $('.pic_prev').on('click', function(){
            if(n > 0){
                $picContainer.css({
                    left: -picWidth*(--n)+'px'
                });
            }
        });
    });

});