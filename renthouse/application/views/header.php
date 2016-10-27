<div style="width: 100%; height: 65px;"></div>
<div id="header" class="fixed">
    <div class="container">
        <p class="logo1"><img src="img/logo1.png" alt=""></p>
        <p class="logo2"><img src="img/logo2.png" alt=""></p>
        <div id="header-menu">
            <?php
                $login_user = $this -> session -> userdata('login_user');
                if($login_user) {
            ?>
                    <ul id="header-nav" class="header-nav">
                        <li class="hea-list">收信箱<span class="badge">4</span>
                            <ul class="header-list">
                                <li><a href="javascript:;"
                                       style="border-top: 1px solid #2b2d2e; border-bottom: 1px solid #2b2d2e; margin-right: 800px">未读信件</a>
                                </li>
                            </ul>
                        </li>
                        <li class="break">|</li>
                    <?php
                        if($login_user -> is_owner == '1'){
                    ?>
                            <li class="hea-list">房东中心
                                <ul class="header-list">
                                    <li><a href="javascript:;" style="border-top: 1px solid #2b2d2e;">房东主页</a></li>
                                    <li><a href="javascript:;">发布房源</a></li>
                                    <li><a href="admin/mgruser/rooms_mgr">房源管理</a></li>
                                    <li><a href="book/booklist">房源预订信息</a></li>
                                    <li><a href="javascript:;">编辑房东信息</a></li>
                                    <li><a href="javascript:;" style="border-bottom: 1px solid #2b2d2e;">资金管理</a></li>
                                </ul>
                            </li>
                    <?php
                        }else{
                    ?>
                            <li ><a href="javascript:;">成为房东</a><li>
                    <?php
                        }  
                    ?>
                        
                        <li class="break">|</li>
                        <li class="hea-list"><?php echo $login_user -> nick_name ;?>
                            <ul class="header-list">
                                <li><a href="javascript:;" style="border-top: 1px solid #2b2d2e;">我的主页</a></li>
                                <li><a href="book/journey">我的旅程</a></li>
                                <li><a href="javascript:;">我的收藏</a></li>
                                <li><a href="javascript:;">个人资料</a></li>
                                <li><a href="javascript:;" style="border-bottom: 1px solid #2b2d2e;">账号设置</a></li>
                            </ul>
                        </li>
                        <li class="break" style="margin: 0;">|</li>
                        <li style="margin-left: -8px;"><a  id="logout" style="text-decoration: none;">退出</a></li>
                    </ul>
                    <?php
                }else {
                    ?>
                    <ul id="header-nav" class="header-nav">
                        <li><a id="register" href="javascript:;">注册</a></li>
                        <li class="break">|</li>
                        <li><a id="login" href="javascript:;">登录</a></li>
                    </ul>
            <?php
                }
            ;?>
        </div>
    </div>
</div>
