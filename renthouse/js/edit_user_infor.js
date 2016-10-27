$(".form_datetime1").datetimepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayBtn: true,
    todayHighlight: true,
    showMeridian: true,
    pickerPosition: "bottom-left",
    language: 'zh-CN',
    startView: 2,
    minView: 2//日期时间选择器所能够提供的最精确的时间选择视图
});
var spans = $('.iconfont-hobby');
spans.each(function(){
    $(this).attr('flag','true');
});
spans.on('click',function(){
    if($(this).attr('flag')=='true'){
        $(this).next().addClass('selected');
        $(this).addClass('selected');
        $(this).attr('flag','false');
    }else{
        $(this).removeClass('selected');
        $(this).next().removeClass('selected');
        $(this).attr('flag','true');
    }
});
//存储在变量中，提升效率
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
        $('.hid').css('height','90px');
        move(image, x, y);

    };
});
function move(ele, x, y){
    ele.css({
        '-webkit-transform' : 'translate3d(' + x + 'px, ' + y + 'px, 0)',
        'transform' : 'translate3d(' + x + 'px, ' + y + 'px, 0)'
    });
}