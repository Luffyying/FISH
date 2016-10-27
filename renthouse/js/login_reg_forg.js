define(['jquery', 'dialog'], function($, Dialog){
    $(function(){
        
       
        /*---------------------------登陆相关开始------------------------------------*/
        //登陆
        $('#login').on('click', function(){
           var dialog = new Dialog();
            dialog.open({
                title: '登陆',
                width: 400,
                url: 'login'
            }); 
        });
        //退出登录
        $('#logout').on('click', function(){
            $.get('welcome/logout',{}, function(data){
                if(data=='success'){
                    window.location.reload();
                }
            },'text');
        });

        //注册
        $('#register').on('click', function(){
            var dialog = new Dialog();
            dialog.open({
                title: '注册',
                width: 450,
                url: 'register'
            });
        });

        //忘记密码
        $('#forg').on('click', function(){
           var dialog = new Dialog();
            dialog.open({
                title: '忘记密码',
                width: 450,
                url: 'forget_password'
            }); 
        });
    }); 
});