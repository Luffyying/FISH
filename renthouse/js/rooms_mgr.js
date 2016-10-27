require(['jquery','dialog', 'slide_pic', 'login_reg_forg'], function($, Dialog) {

    $(function () {
        //选择房屋类型
        $('#roomType').on('change', function () {
            var roomType = $('#roomType').val();
            $.get('admin/mgruser/change_room_type', {
                roomType: roomType
            }, function (data) {
                location.reload();

            }, 'text');
        });

        //选择房屋出租类型
        $('#rentType').on('change', function () {
            var rentType = $('#rentType').val();
            $.get('admin/mgruser/change_room_rent_type', {
                rentType: rentType
            }, function (data) {
                location.reload();

            }, 'text')
        })

        //搜索相关房屋
        $('.opt_search ').on('click', function () {
            var keyword = $('#keywords').val();
            $.get('admin/mgruser/change_room_keyword', {
                keyword: keyword
            }, function (data) {
                location.reload();
            }, 'text')
        })

        //删除单个房屋
        $('.opt_dele').on('click', function () {
            var that = this;
            if (confirm('是否确定删除该记录，可以在回收站中恢复.')) {
                var houseId = $(this).data('id');
                $.get('admin/mgruser/delete_house', {
                    houseId: houseId
                }, function (data) {
                    if (data == 'success') {
                        alert('删除成功!');
                        $(that).parents('li').remove();
                    } else {
                        alert('删除失败!');
                    }
                }, 'text');
            }
        })

        //休眠单个房屋
        $('.opt_dormant').on('click', function () {
            var that = this;
            if (confirm('是否确定休眠该房屋，可以在回收站中恢复.')) {

                var houseId = $(this).data('id');

                $.get('admin/mgruser/disabled_house', {
                    houseId: houseId
                }, function (data) {
                    console.log(data);
                    if (data == 'success') {
                        alert('休眠成功!');
                        location.reload();
                    } else {
                        alert('休眠失败!');
                    }
                }, 'text');
            }
        })
        //取消休眠单个房屋
        $('.opt_cancel_dormant').on('click', function () {
            var that = this;
            if (confirm('是否确定取消休眠该房屋.')) {

                var houseId = $(this).data('id');

                $.get('admin/mgruser/cancel_disabled_house', {
                    houseId: houseId
                }, function (data) {
                    if (data == 'success') {
                        alert('取消休眠成功!');
                        location.reload();
                    } else {
                        alert('取消休眠失败!');
                    }
                }, 'text');
            }
        })

        //批量删除选择的房屋
        $('.opt_del').on('click', function () {
            if (confirm('是否确定删除该记录，可以在回收站中恢复.')) {
                var delStr = '';
                var $checked = $(':checked');
                $checked.each(function () {
                    delStr += $(this).data('id') + ',';
                });
                delStr = delStr.substring(0, delStr.length - 1);
                $.get('admin/mgruser/delete_selected_house', {houseIdStr: delStr}, function (data) {
                    if (data == 'success') {
                        alert('删除成功！');
                        $checked.parents('li').remove();
                    } else {
                        alert('删除失败，请重试！');
                    }
                }, 'text');
            }
        });


        //编辑房源（需要房屋的ID，并获得跳转页面）
        $('.opt_edit').on('click', function () {
            location.href = '';
        })

        //编辑房源（需要房东的ID，并获得跳转页面）
        $('.opt_add').on('click', function () {
            location.href = '';
        })
    });
})