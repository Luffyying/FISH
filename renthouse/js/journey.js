$(function(){
    function Dialog(){
    }
    Dialog.prototype.open = function(options){
        var self = this;
        var settings = {
            width: 450,
            height: 460
            //url=>需要加载页面的url
            //data=>页面需要加载的数据
        };
        $.extend(settings, options);
        this.$container = $('<div class="dialog-container"></div>');
        this.$mask = $('<div class="dialog-mask"></div>');
        this.$dialogBox = $('<div class="dialog-box"></div>');
        this.$btnClose = $('<span class="dialog-close-btn">[X]</span>');
        this.$content = $('<div data-orderid='+settings.orderId+' class="dialog-content"></div>');
        //this.$content = $('<div class="dialog-content"></div>');

        this.$container.append(this.$mask);
        this.$dialogBox.css({
            width: settings.width,
            height: settings.height,
            marginLeft: -settings.width/2,
            marginTop: -settings.height/2
        }).appendTo(this.$container);
        this.$btnClose.on('click', function(){
            self.close();
        }).appendTo(this.$container);
        this.$content.load(settings.url, {//url=>需要加载页面的url
            data: settings.data //data=>页面需要加载的数据
        }).appendTo(this.$dialogBox);

        this.$mask.on('click', function(){
            self.close();
        });

        $(document.body).append(this.$container);
    };
    Dialog.prototype.close = function(){
        this.$container.remove();

    };
    var userId = $("#container").data("userid");
    var StatusBar = React.createClass({
        render: function(){
            return (
                <div id="status-bar" onClick={this.props.handleClick}>
                    <ul id="status-btn" className="clearfix">
                        <li className="current" data-status="0">全部</li>
                        <li data-status="1">待付款</li>
                        <li data-status="2">待处理</li>
                        <li data-status="3">进行中</li>
                        <li data-status="4">已完成</li>
                        <li data-status="5">未成功申请</li>
                    </ul>
                </div>
            );
        }
    });
    $(document.body).on("click", ".complaint-again-btn", function(){
        var appealContent = $("textarea").val();
        var orderId = $(".dialog-content").data("orderid");
        $.post("book/user_appeal_again", {
            orderId: orderId,
            appealContent: appealContent
        }, function(data){
            if(data =='success'){
                alert("申诉成功");
                $(".dialog-container").remove();
            }else{
                alert("申诉失败,请重试");
            }
        }.bind(this), "text");
    });
    var StatusApp = React.createClass({
/**
 房客: 我的旅程开始

 1	待付款	1	付款	1 -> 2／1房东
 2	待处理	2	房东处理中
                当前日期>申请日期＋1 	2－> 5房客／4房东
 3	进行中	31	确认入住	31->33房客／22房东
                当前日期 >＝ 结束日期＋5	31房东／41房客
                申诉	31->32房客／23房东
            32	申诉中
            33	入住中
                当前日期 > 结束日期	33->41房客／31房东
 4	已完成	41	评价	41 －> 42
                分享到我的主页	41 －> 43
            42	已评价
                分享到我的主页	42 -> 44
            43	评价	43 -> 44
                已分享
            44	已评价
                已分享
 5	未成功	5	申请未成功
 */


        statusObj: {
            1: <div className="status-btn status-type1 user-pay">付款</div>,
            2: <div className="status-btn status-type3">房东处理中</div>,
            31: <div><div className="status-btn status-type1 user-checkin">确认入住</div><div className="status-btn status-type2 user-appeal">申诉</div></div>,
            32: <div className="status-btn status-type2 user-appeal-detail">申诉中</div>,
            33: <div className="status-btn status-type3">入住中</div>,
            //41: <div><div className="status-btn status-type1 user-comment">
            //    <a href={'comment/evaluate?houseId='+this.props.houseId+'&orderId='+this.props.orderId+'&userSt='+this.props.status} target="_blank">评价</a></div>
            //    <div className="status-btn status-type2 user-share">分享到我的主页</div></div>,
            42: <div><div className="status-btn status-type3">已评价</div><div className="status-btn status-type2 user-share" id="share">分享到我的主页</div></div>,
            //43: <div><div className="status-btn status-type1 user-comment">
            //    <a href={'comment/evaluate?houseId='+this.props.houseId+'&orderId='+this.props.orderId+'&userSt=43'} target="_blank">评价</a></div>
            //    <div className="status-btn status-type3">分享成功</div></div>,
            44: <div><div className="status-btn status-type3">已评价</div><div className="status-btn status-type3">分享成功</div></div>,
            5: <div className="status-btn status-type3">申请未成功</div>
        },
        getInitialState: function(){
            //console.log("getInitialState");

            this.statusObj[41] = <div><div className="status-btn status-type1 user-comment">
                <a href={'comment/evaluate?houseId='+this.props.houseId+'&orderId='+this.props.orderId+'&userSt='+this.props.status} target="_blank">评价</a></div>
                <div className="status-btn status-type2 user-share">分享到我的主页</div></div>;
            this.statusObj[43] = <div><div className="status-btn status-type1 user-comment">
                <a href={'comment/evaluate?houseId='+this.props.houseId+'&orderId='+this.props.orderId+'&userSt='+this.props.status} target="_blank">评价</a></div>
                <div className="status-btn status-type2 user-share">分享到我的主页</div></div>;
            return ({
                statusBtn: this.statusObj[this.props.status]
            })
        },
        componentWillReceiveProps: function(nextProps){
            //console.log("componentWillReceiveProps");

            this.statusObj[41] = <div><div className="status-btn status-type1 user-comment">
                <a href={'comment/evaluate?houseId='+nextProps.houseId+'&orderId='+nextProps.orderId+'&userSt='+nextProps.status} target="_blank">评价</a></div>
                <div className="status-btn status-type2 user-share">分享到我的主页</div></div>;
            this.statusObj[43] = <div><div className="status-btn status-type1 user-comment">
                <a href={'comment/evaluate?houseId='+nextProps.houseId+'&orderId='+nextProps.orderId+'&userSt='+nextProps.status} target="_blank">评价</a></div>
                <div className="status-btn status-type2 user-share">分享到我的主页</div></div>;
            this.setState({
                statusBtn: this.statusObj[nextProps.status]
            })

        },

        render: function(){
            //console.log("render");
            return (
                <div onClick={this.handleClick} style={{display: 'inline-block'}}>
                    {this.state.statusBtn}
                </div>
            );
        },

        handleClick: function(e){

            var orderId = this.props.orderId;
            var houseId = this.props.houseId;
            var userStatus = this.props.status;
            var target = $(e.target);
            //console.log(orderId);

            if(target.hasClass("user-pay")){
                //console.log(1);
                $.get("book/user_pay", {orderId: orderId}, function(data){
                    //console.log(target);

                    if(data == "success"){
                        this.setState({
                            status: this.statusBtn(2)
                        });
                        alert("success!!");
                    }else{
                        alert("fail???");
                    }
                }.bind(this), "text");
            }else
            if(target.hasClass("user-checkin")){
                //console.log(2);
                $.get("book/user_checkin", {orderId: orderId}, function(data) {
                    //console.log(target);
                    if (data == "success") {
                        this.setState({
                            status: this.statusBtn(33)
                        });
                        alert("success!!");
                    } else {
                        alert("fail???");
                    }
                }.bind(this), "text");

            }else
            if(target.hasClass("user-appeal")){
                //console.log(3);
                $.get("book/get_order_info_appeal", {
                    orderId: orderId
                }, function(data){
                    //console.log(data);
                    var dialog = new Dialog();
                    dialog.open({
                        width:450,
                        height:460,
                        url:'complaint',
                        orderId: orderId,
                        data: data
                    });
                }, "text");


                $(document.body).on("click", ".submit-complaint", function(){
                    var appealContent = $("textarea").val();
                    var orderId = $(".dialog-content").data("orderid");
                    $.post("book/user_appeal", {
                        orderId: orderId,
                        appealContent: appealContent
                    }, function(data){
                        if(data =='success'){
                            this.setState({
                                status: this.statusBtn(32)
                            });
                            alert("申诉成功");
                            $(".dialog-container").remove();
                        }else{
                            alert("申诉失败,请重试");
                        }
                    }.bind(this), "text");
                }.bind(this));

            }else
            if(target.hasClass("user-appeal-detail")){
                $.get("book/get_appeal_datail", {
                    orderId: orderId
                }, function(data){
                    var dialog = new Dialog();
                    dialog.open({
                        width:450,
                        height:547,
                        url:'complaint_details',
                        orderId: orderId,
                        data: data
                    });
                }, "text");

            }else
            if(target.hasClass("user-comment")){


                //$.get("book/user_comment", {orderId: orderId, userStatus: userStatus}, function(data){
                //    //console.log(target);
                //    if (data == "success") {
                //        if(userStatus == 41){
                //            this.setState({
                //                status: this.statusBtn(42)
                //            });
                //        }else if(userStatus == 43){
                //            this.setState({
                //                status: this.statusBtn(44)
                //            });
                //        }
                //        alert("success!!");
                //    } else {
                //        alert("fail???");
                //    }
                //}.bind(this), "text");

            }else
            if(target.hasClass("user-share")){
                //console.log("userStatus");
                //console.log(userStatus);

                $.get("book/get_house_info_share", {
                    orderId: orderId
                }, function(data){
                    //console.log(data);
                    var dialog = new Dialog();
                    dialog.open({
                        width:450,
                        //height:'100%',
                        height:455,
                        url:'share',
                        orderId: orderId,
                        data: data
                    });
                }, "json");


                $(document.body).on("click", ".cancle-share-btn", function(){
                    $(".dialog-container").remove();
                });
                $(document.body).on("click", ".confirm-share-btn", function(){
                    var shareContent = $("textarea").val();
                    //console.log(shareContent);
                    var orderId = $(".dialog-content").data("orderid");
                    $.post("book/user_share", {
                        orderId: orderId,
                        houseId: houseId,
                        userId: userId,
                        shareContent: shareContent
                    }, function(data){
                        if(data =='success'){
                            if(userStatus == 41){
                                this.setState({
                                    status: this.statusBtn(43)
                                });
                            }else if(userStatus == 42){
                                this.setState({
                                    status: this.statusBtn(44)
                                });
                            }
                            alert("分享成功");
                            $(".dialog-container").remove();
                        }else{
                            alert("分享失败,请重试");
                        }
                    }.bind(this), "text");
                }.bind(this));







                //43	评价	43 -> 44
                //$.get("book/user_share", {orderId: orderId}, function(data) {
                //    //console.log(target);
                //    if (data == "success") {
                //        this.setState({
                //            status: this.statusBtn(44)
                //        });
                //        alert("success!!");
                //    } else {
                //        alert("fail???");
                //    }
                //}.bind(this), "text");
            }

        }


    });
    var DetailBtn = React.createClass({

        detailHandle: function(e){
            var detailDOM = ReactDOM.findDOMNode(this.refs.detailHandle);
            var detailIcon = $(detailDOM).children(".glyphicon");
            var detailContent = $(detailDOM).parents(".book-desc-content").siblings(".book-desc-content-hide");
            if(detailIcon.hasClass("glyphicon-chevron-down")){
                detailIcon.removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
                detailContent.show(300, "swing");
            }else{
                detailIcon.removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
                detailContent.hide(300, "swing");
            }
            //console.log(detailIcon.hasClass("glyphicon-chevron-down"));
        },

        render: function(){
            return (
                <div ref='detailHandle' className="detailBtn status-btn status-type2" onClick={this.detailHandle}>
                    详情 <span className="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
                </div>
            );
        }
    });


    var HobbyApp = React.createClass({
        getInitialState: function(){
            return ({
                user: this.props.userId,
                hobbyUl: []
            })
        },
        render: function(){
            return (
                <ul user={this.props.userId} className="user-hobby clearfix">{this.state.hobbyUl}</ul>
            );
        },
        componentDidMount: function(){
            $.get("book/get_user_hobby", {userId: this.state.user}, function(data){
                //console.log(data);
                var hobbyArr = [];
                data.forEach(function(elem, index){
                    //console.log(elem);
                    hobbyArr.push(<li key={index}><i className={"iconfont-hobby "+elem.hobby_class}></i><span>{elem.hobby_name}</span></li>)
                });
                this.setState({
                    hobbyUl: hobbyArr
                })
            }.bind(this), "json");
        }

    });

    var JourneyLi = React.createClass({
        getInitialState: function(){
            return ({
                li: this.props.li
            });
        },
        getLi: function(li){
            $.get("book/change_status_user", {
                orderId: li.order_id,
                currOStatus: li.owner_status,
                currUStatus: li.user_status
            }, function(data){
                var list = data;
                this.setState({
                    li: list
                });
            }.bind(this), "json");
        },
        componentWillReceiveProps: function(nextProps) {
            //console.log("componentWillReceiveProps");
            //console.log(nextProps.li);
            var li = nextProps.li;
            this.getLi(li);
            //console.log(this.state.li);
        },
        componentDidMount: function(){
            //console.log("componentDidMount");
            var li = this.props.li;
            this.getLi(li);
            //console.log(this.state.li);

        },
        handleClick: function(e){
            //console.log($(e.target));
        },

        render: function(){
            //console.log("render");

            return (
                <li className="clearfix book-li">
                    <div className="house-img col-md-3">
                        <a href="" className=""><img src={this.state.li.thumb_path} alt=""/></a>
                    </div>
                    <div className="book-ul list-unstyled  col-md-9">
                        <div className="book-info">
                            <span className="col-md-3">订单编号: {this.state.li.order_id}</span>
                            <span className="col-md-4 col-md-offset-5">预定时间: {this.state.li.order_date}</span>
                        </div>
                        <div className="book-desc row">

                            <div className="book-desc-content" >
                                <p className="col-md-12 ">
                                    <span className="col-md-9 house-title">{this.state.li.title}</span>
                                    <span className="col-md-3 house-price">合计：<span style={{color: '#6fbb30', fontSize: 20+'px'}} >¥{this.state.li.price}</span></span>
                                </p>
                                <p className=" col-md-11 ">房东姓名：{this.state.li.first_name}{this.state.li.last_name}</p>
                                <p className=" col-md-11 ">租房日期：{this.state.li.start_date} ~ {this.state.li.end_date}</p>
                                <p className=" col-md-11 ">房屋地址：{this.state.li.city}{this.state.li.street}{this.state.li.road}{this.state.li.address}</p>
                                <div className="book-status">
                                    <DetailBtn />
                                    <StatusApp houseId={this.state.li.house_id} orderId={this.state.li.order_id} status={this.state.li.user_status}/>
                                </div>
                            </div>

                            <div className="col-md-12 book-desc-content-hide" style={{display: "none"}}>
                                <p>预定时间：{this.state.li.order_date}</p>
                                <p>房源描述：{this.state.li.intro}</p>
                                <p>房源评分：{this.state.li.score}</p>
                                <p>房东电话：{this.state.li.tel}</p>
                                <span>房东爱好：</span>
                                <HobbyApp userId={this.state.li.owner_id}/>
                            </div>
                        </div>
                    </div>
                </li>
            );
        }
    });

    var Journey = React.createClass({

        getInitialState: function(){
            return({
                journeyList: ''
            });
        },

        render: function(){
            return (
                <div id="journey">
                    <StatusBar handleClick={this.handleClick}/>
                    <ul id="journey-list">
                        {this.state.journeyList}
                    </ul>
                </div>

            );
        },

        changeStatus: function(data){
            var jourArr = [];
            data.forEach(function(elem, index) {
                //console.log(elem);
                jourArr.push(<JourneyLi li={elem} key={index}/>);
            });

            this.setState({
                journeyList: jourArr
            });
        },


        componentDidUpdate: function(){
            //console.log("componentDidUpdate");
        },

        componentDidMount: function(){
            //console.log("componentDidMount");
            $.get("book/get_journey", {
                userId: userId
            }, function(data){
                this.changeStatus(data);
            }.bind(this), "json");
        },

        handleClick: function(e){
            var status = $(e.target).data("status");
            //console.log(status);
            $(e.target).addClass("current").siblings().removeClass("current");
            $.get("book/get_journey", {
                status: status,
                userId: userId
            }, function(data){
                //console.log(data);
                this.changeStatus(data);
            }.bind(this), "json");
        }

    });

    ReactDOM.render(<Journey />, document.getElementById("container"));


});