$(function(){
    $("#conven-btn").on("click", function(){
        $("#conven-content").toggle("fast", "swing");
    });





    $("#house-content").on("click", ".disable-house", function(){
        var $houseLi = $(this).parents("tr");

        if(this.status == undefined){
            this.status = $(this).data('status');
        }
        if(this.bDisable == undefined){
            this.bDisable = ($(this).data('status') == 1) ? true:false;
        }
        this.status = (this.status==$(this).val())?0:$(this).val();
        var self = this;
        $.get("admin/house/change_house_status", {
            status: this.status,
            houseId: $(this).data("id")
        }, function(data){
            if(data == "success"){
                if(self.bDisable){
                    $(self).data('status', 0);
                    $(self).html("<span class='am-icon-toggle-on'></span> 禁用").addClass("am-text-secondary");
                    $(".house-status", $houseLi).html("正常");
                    alert("取消禁用成功");
                }else{
                    $(self).data('status', 1);
                    $(self).html("<span class='am-icon-toggle-off'></span> 取消禁用").removeClass("am-text-secondary").css("color: #aaa");
                    $(".house-status", $houseLi).html("禁用中");
                    alert("禁用成功");
                }
                self.bDisable = !self.bDisable;
            }else{
                console.log("fail");
            }
        }, "text");
    });

    $("#house-content").on("click", ".delete-house", function(){
        //if(this.status == undefined){
        //    this.status = $(this).data('status');
        //}
        //this.status = (this.status==$(this).val())?0:$(this).val();
        var $houseLi = $(this).parents("tr");
        var $execBtn = $(this).parents(".exec-btns");
        var self = this;
        $.get("admin/house/change_house_status", {
            status: 2,
            houseId: $(this).data("id")
        }, function(data){
            if(data == "success"){
                //console.log($(self));
                //console.log('aa');
                console.log($execBtn);
                $execBtn.html('<div class="exec-btn am-btn-group am-btn-group-xs"><button type="button" class="am-btn am-btn-primary " disabled="disabled">已删除</button></div>');
                //$(self).html("<span class='am-icon-toggle-on'></span> 禁用").addClass("am-text-secondary");
                //$(".house-status", $houseLi).html("正常");
                //console.log("success");
                //$houseLi.remove();
                alert("删除成功")
            }else{
                console.log("fail");
            }
        }, "text");
    });



    var searchObj = {}; //搜索条件Object
    function search_house(){
        console.log(searchObj);

        $.get("admin/house/search_house", {
            searchObj: searchObj
        }, function(data){
            console.log(data);
            $("#house-content").empty();
            var houseStr = '';
            data.forEach(function(elem, index){
                console.log(elem);
                houseStr += `<tr>
                  <td><input type="checkbox" value="`+elem.house_id+`"/></td>
                  <td>`+elem.house_id+`</td>
                  <td><a href="admin/house/house_detail?houseId=`+elem.house_id+`">`+elem.title+`</a></td>
                <td class="am-hide-sm-only">`+elem.price+`</td>
                <td><a href="">`+elem.last_name+elem.first_name+`</a></td>
                  <td class="am-hide-sm-only house-status">`;

                if(elem.status == 1){
                    houseStr += `休眠中`;
                }else if(elem.status == 0){
                    houseStr += `正常`;
                }

                houseStr += `</td>
                  <td class="am-hide-sm-only">`+elem.post_date+`</td>
                  <td class="am-text-nowrap ">
                    <div class="am-btn-toolbar">
                      <div class="am-btn-group am-btn-group-xs">`;


                if(elem.status != 2){//0正常&1禁用中


                    houseStr += `<button type="button" class="edit-house am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>`;
                    if(elem.status == 0) {//0正常
                        houseStr += `<button type="button" data-id="`+elem.house_id+`" value="1" data-status="0" class='disable-house am-btn am-btn-default am-btn-xs am-text-secondary'> <span class='am-icon-toggle-on'></span> 禁用</button>`;

                    }else if(elem.status == 1) {
                        houseStr += `<button type="button" data-id="`+elem.house_id+`" value="1" data-status="1" class='disable-house am-btn am-btn-default am-btn-xs'> <span class='am-icon-toggle-off'></span> 取消禁用</button>`;
                    }
                    houseStr += `<button type="button" data-id="`+elem.house_id+`" value="2" class="change-status delete-house am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>`;

                }else if(elem.status == 2) {//2删除
                    houseStr += `<button type="button" class="am-btn am-btn-primary" disabled="disabled">已删除</button>`;
                }
                houseStr += `</div>
                    </div>
                  </td>
                </tr>`;


                //console.log(houseStr);
            });
            $("#house-content").html(houseStr);
        }, "json");
    }
    var val = $(this).val();


    $(".convenience").on("change", function(){
        var checked = $('input:checked');
        var conArr = [];
        //console.log(checked.length);
        for(var i=0; i<checked.length; i++) {
            conArr.push($(checked[i]).data("coid"));
        }
        console.log(conArr);
        searchObj.convenience = conArr;
        search_house();

    });

    $("select").on("change",function(e){
        if(this.className == "city"){
            var cityId = $(this).val();
            $.get("admin/house/get_street", {
                cityId: cityId
            }, function(data){
                //console.log(data);
                var streetStr = '<option value="">街区</option>';
                data.forEach(function(elem, index){
                    streetStr += '<option value='+elem.id+'>'+elem.name+'</option>';
                });
                $(".street").html(streetStr);
            }, "json");
        }else
        if(this.className == "street"){
                var streetId = $(this).val();
            //console.log(streetId);
                $.get("admin/house/get_road", {
                    streetId: streetId
                }, function(data){
                    //console.log(data);
                    var roadStr = '<option value="">道路</option>';
                    data.forEach(function(elem, index){
                        //console.log(elem);
                        roadStr += '<option value='+elem.id+'>'+elem.name+'</option>';
                        //$(".road").html('<option value='+elem.id+'>'+elem.name+'</option>');
                    });
                    $(".road").html(roadStr);
                }, "json");
        }

        var val = $(this).val();
        searchObj[this.className] = val;
        //console.log(searchObj);
        search_house();
    });

    $(".search-btn").on("click", function(){
        var searchTitle = $(".search-title").val();
        searchObj.searchTitle = searchTitle;
        //console.log(searchObj);
        search_house();
    });







//新增房源页面提交按钮开始
    $(".submit-btn").on("click", function(){
        console.log($("input[name='title']").val());
        $.post("admin/house/save_house", {
            title: $("input[name='title']").val()
        }, function(data){
            alert("yyy");
        }, "text");
    });
//新增房源页面提交按钮结束


});