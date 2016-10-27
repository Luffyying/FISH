$(function(){
    $('#confirm_user-pass').blur(function(){
        var pass = $('#user-pass').val();
        var conpass = $('#confirm_user-pass').val();
        if(pass != conpass){
        $('#no').text('两次输入密码不一致');
    }else{
        $('#no').text('');
    }
    });
    var imgs = $(".imgCrop");
    var image = imgs.find("img");
    var img = image[0];
    var width = parseInt(imgs.css("width"));
    var height = parseInt(imgs.css("height"));
    var startX,startY,scale = 1;
    var x = 0,y = 0;
    $("input").on("change",function(){
        var fr = new FileReader();
        var file = this.files[0]
        //console.log(file);
        if(!/image\/\w+/.test(file.type)){
            alert(file.name + "不是图片文件！");
            return;
        }
        image.removeAttr("height width");
        fr.readAsDataURL(file);
        fr.onload = function(){
            img.src = fr.result;
            var widthInit = img.width;
            if(img.width>img.height){
                img.height = height;
                x = (width - img.width)/2;
                y = 0;
            }else{
                img.width = width;
                x = 0;
                y = (height - img.height)/2;
            }
            scale = widthInit/img.width;
            $('.imgCrop').css('height','100px');
            $('.hid').css('height','100px');
            $('.hid').css('width','100px');
        };
    });
})