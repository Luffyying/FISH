require(["jquery"],function ($) {
    $(function () {
        $('.pulldown-list').on('click','li',function () {
            var $address = $(this).text();
            $(this).parents('.address').children('.address-title').html($address);
        });
        $('.address-city > li').on('click',function () {
            $('.address-street').parents('.address').children('.address-title').html('街区');
            $('.address-road').parents('.address').children('.address-title').html('路');
            var cityId = $(this).data('id');
            $.get('admin/house/get_street',{cityId:cityId},function (data) {
                $('.address-street').empty();
                var html='';
                for(var i=0; i<data.length; i++){
                    html += ` <li data-id="`+data[i].id+`">`+data[i].name+`</li> `;
                }
                $('.address-street').append(html);
            },'json');
        });
        $('.address-street').on('click','li',function () {
            $('.address-road').parents('.address').children('.address-title').html('路');
            var streetId = $(this).data('id');
            $.get('admin/house/get_road',{streetId:streetId},function (data) {
                $('.address-road').empty();
                var html='';
                for(var i=0; i<data.length; i++){
                    html += ` <li data-id="`+data[i].id+`">`+data[i].name+`</li> `;
                }
                $('.address-road').append(html);
            },'json');
        });
    });
});
