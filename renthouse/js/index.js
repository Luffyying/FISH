require(["jquery", "dialog", "login_reg_forg"], function($, Dialog){

    $(function(){
        $('#sub').on('click',function(){
           $pro = $('.text').text();
            $title = $('.tit').val();
            location.href = 'welcome/search?flag=1&c='+$pro+'&title='+$title;
            //$this->db->view('welcome/search',$data);
        });
        $('.caret').on('click', function(){
            $('#position-menu-wrapper').toggle('slow');
            $('.menu-wrapper').find('li').on('click', function(){
                $('.text').html($(this).html());
                $('#position-menu-wrapper').hide();
                $('.town').val($(this).html());
            })
        });

    });



});



