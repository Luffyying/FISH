$(function(){
        $('#btn-add').on('click', function(){
            location.href = 'admin/add_owner';
        });
        $('.btn-update').on('click',function(){
            var ownerId = $(this).data('id');
            location.href = 'admin/edit_owner?user_id='+ownerId;
        });
        $('.btn-delete').on('click', function(){
            var that = this;
            if(confirm('是否确定删除该记录，可以在回收站中恢复.')){
                var ownerId = $(this).data('id');
                $.get('admin/delete_owner', {
                    ownerId: ownerId
                }, function(data){
                    if(data == 'success'){
                        alert('删除成功!');
                        $(that).parents('tr').remove();
                    }else{
                        alert('删除失败!');
                    }
                }, 'text');
            }
        });
        $('#btn-delete-selected').on('click', function(){
            if(confirm('是否确定删除这些记录，可以在回收站中恢复.')) {
                var delStr = '';
                var $checked = $(':checked');
                $checked.each(function () {
                    delStr += $(this).data('id') + ',';
                });
                delStr = delStr.substring(0, delStr.length - 1);
                $.get('admin/delete_selected_owner', {ownerIdStr: delStr}, function (data) {
                    if (data == 'success') {
                        $checked.parents('tr').remove();
                    }
                }, 'text');
            }
        });
        $('.btn-forbid').on('click', function(){
            var that = this;
            var ownerId = $(this).data('id');
            if($(this).text() =='禁用'){
            if(confirm('是否确定禁用该记录，可以恢复.')){
                $.get('admin/forbid_owner', {
                    ownerId: ownerId
                }, function(data){
                    if(data == 'success'){
                        alert('禁用成功!');
                        $(that).html('已禁用');
                    }else{
                        alert('禁用失败!');
                    }
                }, 'text');
            }
            }else{
                $.get('admin/relieve_forbid_owner',{ownerId:ownerId},function(data){
                    if(data=='success'){
                         alert('解除禁用成功');
                         $(that).html('<span class="am-icon-trash-o"></span>'+'禁用');
                     }else{
                         alert('解除禁用失败');
                     }
                },'text');
            }
            });
        $('.house-num').on('click',function(){//mergesort

                $('.house-num-detial').size();
                var arr = $('.house-num-detial');
                arr.sort(function(a,b){
                    return a.value>b.value?1:-1;
                });
                // $('#content .house-num-detial').empty();
                //  $('#content').append(arr);
        });
        // $('#btn-forbid-selected').on('click', function(){
        //     alert('sss');
        //     if(confirm('是否确定禁用这些记录，可以恢复.')){
        //         var delStr = '';
        //         var $checked = $(':checked');
        //         $checked.each(function () {
        //             delStr += $(this).data('id') + ',';
        //         });
        //         delStr = delStr.substring(0, delStr.length - 1);
        //         $.get('admin/forbid_selected_owner', {ownerIdStr: delStr}, function (data) {
        //             if(data == 'success') {
        //                 alert('禁用成功!');
        //                  $checked.each(function(){
        //                     $(this).html('已禁用');
        //                 });
        //             }
                        
        //         }, 'text');
        //     }
        // });
    });