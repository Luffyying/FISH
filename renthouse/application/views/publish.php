<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/publish.css">
    <title>发布房源</title>
</head>
<body>
    <?php include "header.php";?>
    <div class="container">
        <div id="main-content" class="col-md-8">
            <form action="">
                <h1>发布房源</h1>
                <div class="form-group">
                    <label for="house-name">房源名称：</label>
                    <input id="house-name" type="text" class="form-control" name="house-name" placeholder="来给您的取个好听的名字">
                </div>
                <div class="form-group">
                    <label>地理位置：</label>
                    <div class="publish-item row">
                        <div class="btn-group col-md-3 row address">
                            <button type="button" class="btn btn-default col-md-10 address-title">城市</button>
                            <button type="button" class="btn btn-default dropdown-toggle col-md-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu pulldown-list address-city">
                                <?php foreach ($cities as $city){
                                ?>
                                    <li data-id="<?php echo $city->id?>"><?php echo $city->name?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="btn-group col-md-3 row address">
                            <button type="button" class="btn btn-default col-md-10 address-title">街区</button>
                            <button type="button" class="btn btn-default dropdown-toggle col-md-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu pulldown-list address-street">
                            </ul>
                        </div>
                        <div class="btn-group col-md-3 row address">
                            <button type="button" class="btn btn-default col-md-10 address-title">路</button>
                            <button type="button" class="btn btn-default dropdown-toggle col-md-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu pulldown-list address-road">
                            </ul>
                        </div>
                    </div>
                    <input type="text" class="form-control" id="detail-address" placeholder="详细地址" >
                </div>
                <div class="form-group">
                    <label>房屋类型：</label>
                    <div class="row publish-item">
                        <div class="btn-group col-md-5 row">
                            <button type="button" class="btn btn-default col-md-11">房屋类型</button>
                            <button type="button" class="btn btn-default dropdown-toggle col-md-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu pulldown-list">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>出租方式：</label>
                    <div class="row publish-item">
                        <div class="btn-group col-md-5 row">
                            <button type="button" class="btn btn-default col-md-11">出租方式</button>
                            <button type="button" class="btn btn-default dropdown-toggle col-md-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu pulldown-list">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>卧室：</label>
                        <div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">个数</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>床：</label>
                        <div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">个数</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label>卫生间：</label>
                        <div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">个数</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>可容纳人数：</label>
                        <div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">个数</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>租金：</label>
                    <div class="row">
                        <div class="btn-group col-md-3">
                            <button type="button" class="btn btn-default">币种</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu pulldown-list">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>便利设施：</label>
                </div>
                <div class="form-group">
                    <label>请介绍一下你的房屋：</label>
                    <div>
                        <textarea name="" id="" cols="80" rows="8"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>请告诉你的房客应该注意什么：</label>
                    <div>
                        <textarea name="" id="" cols="80" rows="8"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label>添加图片：</label>
                    <div class="clearfix add-img">
                        <div class="add-photo"></div>
                        <button class="add-btn">添加图片</button>
                    </div>
                </div>
                <div class="form-group">
                    <label>添加地图：</label>
                    <div class="clearfix add-img">
                        <div class="add-map"></div>
                        <button class="add-btn">添加图片</button>
                    </div>
                </div>
                <div class="form-group">
                    <div id="rs-btn">
                        <input type="reset" value="重置" id="reset">
                        <input type="submit" value="提交" id="submit">
                    </div>
                </div>
            </form>
        </div>
        <div id="sidebar" class="col-md-4"><img src="img/collect_page/show.jpg"></div>
    </div>
    <?php include "footer.php";?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/require.js" data-main="js/publish.js"></script>
    <script src="js/header.js"></script>
    <script src="js/footer.js"></script>
</body>
</html>