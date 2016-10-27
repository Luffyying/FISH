$(function(){
    $('.btn-comment').on('click',function () {
        var comments = $(this).data('comments');
        $.get('admin/welcome/get_comments_by_kind',{comments:comments},function (data) {
            $('#commments-list').empty();
            if(data[0] == 'house'){
                var data = data[1];
                var html = '';
                for(var i=0; i<data.length; i++){
                    html += `
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td>`+data[i].house_id+`</td>
                          <td>`+data[i].last_name+``+data[i].first_name+`</td>
                          <td>`+data[i].title+`</td>
                          <td class="am-hide-sm-only">`+data[i].score+`</td>
                          <td class="am-hide-sm-only">`+data[i].comment_date+`</td>
                          <td>
                            <div class="am-btn-toolbar">
                              <div class="am-btn-group am-btn-group-xs">
                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 详情</button>
                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delete"><span class="am-icon-trash-o"></span> 删除</button>
                              </div>
                            </div>
                          </td>
                        </tr>
                    `;
                };
            }else if(data[0] == 'owner'){
                var data = data[1];
                var html = '';
                for(var i=0; i<data.length; i++){
                    html += `
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td>`+data[i].owner_id+`</td>
                          <td>`+data[i].roomer_ln+``+data[i].roomer_fn+`</td>
                          <td>`+data[i].owner_ln+``+data[i].owner_fn+`</td>
                          <td class="am-hide-sm-only">`+data[i].score+`</td>
                          <td class="am-hide-sm-only">`+data[i].comment_date+`</td>
                          <td>
                            <div class="am-btn-toolbar">
                              <div class="am-btn-group am-btn-group-xs">
                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 详情</button>
                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delete"><span class="am-icon-trash-o"></span> 删除</button>
                              </div>
                            </div>
                          </td>
                        </tr>
                    `;
                };
            }else if(data[0] == 'roomer'){
                var data = data[1];
                var html = '';
                for(var i=0; i<data.length; i++){
                    html += `
                        <tr>
                          <td><input type="checkbox" /></td>
                          <td>`+data[i].user_id+`</td>
                          <td>`+data[i].owner_ln+``+data[i].owner_fn+`</td>
                          <td>`+data[i].roomer_ln+``+data[i].roomer_fn+`</td>
                          <td class="am-hide-sm-only">`+data[i].score+`</td>
                          <td class="am-hide-sm-only">`+data[i].comment_date+`</td>
                          <td>
                            <div class="am-btn-toolbar">
                              <div class="am-btn-group am-btn-group-xs">
                                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 详情</button>
                                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only delete"><span class="am-icon-trash-o"></span> 删除</button>
                              </div>
                            </div>
                          </td>
                        </tr>
                    `;
                };
            }
            $('#commments-list').append(html);
        },'json');
    });
    $('#commments-list').on('click','.delete',function () {
        alert(111);
    });
});
