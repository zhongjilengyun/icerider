<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="print">
    <meta name="Keywords" content="TMS后台管理系统">
    <meta name="Description" content="基于bootstrap和jquery搭建的后台管理系统">
    <title>TMS系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui">
    <!-- 手机端 -->
    <link rel="stylesheet" href="css/common/reset.css">
    <!-- 样式初始化 -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/index.css">
    <!-- 页面样式 -->
    <link rel="stylesheet" href="js/bootstrap/css/bootstrap.min.css">
    <!--引入bootstrap3.3-->
    <link rel="stylesheet" href="css/material-design-iconic-font-2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="css/pagination.css">
</head>

<body>
<!--头部导航栏开始-->
<div id="navbar" class="collapse navbar-collapse" style="position: absolute; top: 0; right: 0; z-index: 10;">
    <ul class="nav navbar-nav navbar-right navbar-default" style="background: #ffffff;">
        <li ><a href="#" ><i class="glyphicon glyphicon-user"></i>&nbsp;admin</a></li>
        <li ><a href="#" class="qwer" >总部</a></li>
        <li>
            <a href="#"></i>修改密码&nbsp&nbsp&nbsp&nbsp|</a>
        </li>
        <li><a href="#">退出登陆</a></li>
    </ul>
</div>
<!--头部导航栏结束-->
<div class="all" style="">
    <!-- 左侧导航栏开始-->
    <div class="sidebar1" id="accordion">
        <div class="left-menu nav navbar">
            <ul id="nav-accordion" class="nav nav-tabs nav-stacked sidebar-menu" style="">
                <li class="active first" >
                    <a href="#" class="waves-effect">
                        冰骑士
                    </a>
                </li>
                <li>
                    <a class="nav-header onemenu waves-effect" href="javascript:Tab.addTab('首页', 'home');">
                        <i class="glyphicon glyphicon-home"></i> 首页
                    </a>
                </li>
                <li>
                    <a href="#systemSetting" class="nav-header collapsed" data-toggle="collapse" data-parent="#accordion" >
                        <i class="glyphicon glyphicon-cog"></i> 系统设置
                        <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul id="systemSetting" class="nav nav-list collapse" style="height: 0px;">
                        <li><a>权限管理</a>
                            <ul class="nav menu3">
                                <li><a href="javascript:Tab.addTab('菜单管理', 'system/menu.html');">菜单管理</a></li>
                                <li><a href="javascript:Tab.addTab('权限管理', 'system/jurisdiction.html');">权限管理</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!--架构管理-->
                <li>
                    <a href="#Framework" class=" nav-header collapsed " data-toggle="collapse" data-parent="#accordion" >
                        <i class="glyphicon glyphicon-calendar"></i> 架构管理
                        <span class="pull-right glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul id="Framework" class="nav nav-list collapse fivemenu" style="height: 0px;">
                        <li><a href="javascript:Tab.addTab('大区管理', '{{url('admin/regionIndex')}}');">大区管理</a></li>
                        <li><a href="javascript:Tab.addTab('分公司管理', '{{url('admin/filialeIndex')}}');">分公司管理</a></li>
                        <li><a href="javascript:Tab.addTab('城市管理', '{{url('admin/cityIndex')}}');">城市管理</a></li>
                        <li><a href="javascript:Tab.addTab('职务管理', '{{url('admin/postIndex')}}');">职务管理</a></li>
                        <li><a href="javascript:Tab.addTab('人员管理', '{{url('admin/adminIndex')}}');">人员管理</a></li>
                    </ul>
                </li>
                <!--架构管理-->
            </ul>
        </div>
    </div>
    <!-- 左侧导航栏开始-->
    <!--    内容区开始-->
    <div class="maincontent" style="width: 100%;">
        <section id="content">
            <!--  导航条标签开始-->
            <div class="content_tab">
                <div class="tab_left">
                    <a class="waves-effect waves-light" href="javascript:;"><i class="zmdi zmdi-chevron-left"></i></a>
                </div>
                <div class="tab_right">
                    <a class="waves-effect waves-light" href="javascript:;"><i class="zmdi zmdi-chevron-right"></i></a>
                </div>
                <ul id="tabs" class="tabs">
                    <li id="tab_home" data-index="home" data-closeable="false" class="cur" >

                        <a class="waves-effect waves-light">首页</a>
                    </li>
                </ul>
            </div>


            <!--  导航条标签结束-->
            <div class="content_main container-fluid" style="padding-right: 0px;">
                @yield('content')
                <!--显示首页内容-->
            </div>
        </section>
        <!--<div class="content_main container-fluid">-->
        <!--<div class="pages">-->
        <!--<div id="Pagination"></div>-->
        <!--<div class="searchPage">-->
        <!--<span class="page-sum">共<strong class="allPage">15</strong>页</span>-->
        <!--<span class="page-go">跳转<input type="text">页</span>-->
        <!--<a href="javascript:;" class="page-btn">GO</a>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->

    </div>
    <!--    内容区结束-->
</div>

<!--删除菜单模态框-->

<div class="modal fade" id="delModel">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">删除菜单</h4>
            </div>
            <div class="modal-body">
                <p>确定要删除/排序菜单吗？</p>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="url" />
                <a onclick="urlSubmit()" class="btn btn-success" data-dismiss="modal">确定</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--删除菜单模态框-->
<!--添加修改权限模态框开始-->
<div class="modal fade" id="Addjurisdiction">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">添加修改权限</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="menuName" class="col-sm-2 control-label">菜单名：</label>
                        <div class="col-sm-10">
                            <a class="cleanIcon glyphicon glyphicon-remove btn form-control-feedback" style="pointer-events: auto"></a>
                            <input type="text" class="form-control" id="menuName" placeholder="导航菜单名称&nbsp 例如 &nbsp 系统管理">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link" class="col-sm-2 control-label">链接：</label>
                        <div class="col-sm-10">
                            <a class="cleanIcon glyphicon glyphicon-remove btn form-control-feedback" style="pointer-events: auto"></a>
                            <input type="text" class="form-control" id="link" placeholder="输入模块/控制器/方法即可&nbsp 例如&nbsp Admin/Nav/index">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="col-sm-2 control-label">图标：</label>
                        <div class="col-sm-10">
                            <a class="cleanIcon glyphicon glyphicon-remove btn form-control-feedback" style="pointer-events: auto"></a>
                            <input type="text" class="form-control" id="icon" placeholder="例如&nbsplefticon01.png">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selectCar" class="col-sm-2 control-label">选项卡：</label>
                        <div class="col-sm-10">
                            <select name="" class="form-control" id="selectCar">
                                <option value="请选择">请选择</option>
                                <option value="开">开</option>
                                <option value="关">关</option>

                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="url" />
                <a onclick="urlSubmit()" class="btn btn-info" data-dismiss="modal">提交</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--添加修改权限模态框结束-->
</body>
<scrip>
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/BootstrapMenu.min.js"></script>
    <!--基于Bootstrap的jQuery右键上下文菜单插件-->
    <script type="text/javascript" src="js/jquery.pagination.js"></script>
</scrip>
<script type="text/javascript">
    $(document).ready(function() {
        $("#Pagination").pagination("15");
//          sessionStorage.name=$(".qwer").html();
    });
    $(document).on('click', '.collapsed', function(event) {
        event.stopPropagation();
        var $this = $(this);
        var parent = $this.data('parent');
        var actives = parent && $(parent).find('.collapse.in');
        // From bootstrap itself
        if (actives && actives.length) {
            hasData = actives.data('collapse');
            //if (hasData && hasData.transitioning) return;
            actives.collapse('hide');
        }
        var target = $this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, ''); //strip for ie7
        $(target).collapse('toggle');
    })
</script>
</html>