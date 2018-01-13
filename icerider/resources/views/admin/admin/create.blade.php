<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="print">
    <meta name="Keywords" content="TMS后台管理系统">
    <meta name="Description" content="基于bootstrap和jquery搭建的后台管理系统">
    <title>TMS系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui">
    <link rel="stylesheet" href="../css/common/reset.css">  <!-- 样式初始化 -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../css/index.css">  <!-- 页面样式 -->
    <link rel="stylesheet" href="../js/bootstrap/css/bootstrap.min.css"> <!--引入bootstrap3.3-->
    <link rel="stylesheet" href="../css/material-design-iconic-font-2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/pagination.css">
    <style>
        .ules{
            display: flex;
            border: 1px solid #ccc;
            margin: 20px 10px;
        }
        .listUl{
            color: #000;
            font-weight: 800;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            width:20%;
        }
        .listTwo{
            width:80%;
            height:auto;
        }
        .listTable{
            width:100%;
            height:auto;
            /*position: relative;*/
        }
        .listTable td:first-of-type{
            height:35px;
            padding:0 0 0 8%;

        }
        .listTable td span{
            float: left;
            margin-left: 20px;
        }
        .listTable td input{
            margin-left: 5px;
        }

    </style>
</head>
<body>
<div class="content_main container-fluid">
    <div id="iframe_home" class="iframe cur">
        <div class=" nav nav-title">
            位置：
        </div>
        <!--基础信息   部门信息-->
        <div>
            <form class="form-horizontal" role="form" style="margin:0 20px 0 30px;">
                <div class="form-group">
                    <h4>基础信息</h4>
                    <label for="realNaname" class="col-sm-4 control-label">真实姓名：</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="realNaname" placeholder="请输入用户真实姓名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="loginName" class="col-sm-4 control-label">登陆名：</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="loginName" placeholder="请输入用户登录名">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">密码：</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="password" placeholder="请输入密码">
                    </div>
                </div>
                <div class="form-group">
                    <h4>部门信息</h4>
                    <label for="Users post" class="col-sm-4 control-label">用户职务：</label>
                    <div class="col-sm-6">
                        <select name="" id="Users post" class="selectpicker show-tick form-control">
                            <option value="请选择用户职务">请选择用户职务</option>
                            @foreach($position as $posi_val)
                                <option value="{{$posi_val['id']}}">{{$posi_val['position']}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="IClass" class="col-sm-4 control-label">部门级别：</label>
                    <div class="col-sm-6">
                        <select name="" id="IClass" class="selectpicker show-tick form-control">
                            <option value="请选择部门级别">请选择部门级别</option>
                            @foreach($rank as $rank_val)
                                <option value="{{$rank_val['id']}}">{{$rank_val['rank']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Regions" class="col-sm-4 control-label">所属大区：</label>
                    <div class="col-sm-6">
                        <select name="" id="Regions" class="selectpicker show-tick form-control">
                            <option value="请选择部门级别">请选择所属大区</option>
                            @foreach($region as $regi_val)
                                <option value="{{$regi_val['id']}}">{{$regi_val['region_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subordinateCompanie" class="col-sm-4 control-label">所属公司：</label>
                    <div class="col-sm-6">
                        <select name="" id="subordinateCompanie" class="selectpicker show-tick form-control">
                            <option value="请选择所属公司">请选择所属公司</option>
                            @foreach($filiale as $fili_val)
                                <option value="{{$fili_val['id']}}">{{$fili_val['filiale']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-4 control-label">所属城市：</label>
                    <div class="col-sm-6">
                        <select name="" id="city" class="selectpicker show-tick form-control">
                            <option value="请选择所属省份">请选择所属城市</option>
                            @foreach($city as $city_val)
                                <option value="{{$city_val['bianhao']}}">{{$city_val['address']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div style="display: flex">
            <span>权限信息</span>
            <div style="margin-left: 10px">
                <span class="stop" style="cursor: pointer">收起</span>/
                <span class="open" style="cursor: pointer">展开</span>
            </div>
        </div>
    </div>
    <div class="JurisdictionContent">
        <ul>
            <li>
                <ul class="ules">
                    <li class="listUl">
                        <span style="float: left;margin-right: 5px">后台首页</span>
                        <input type="checkbox">
                    </li>
                    <li class="listTwo">
                        <table class="table-bordered listTable">
                            @foreach($menu as $menu_val)
                            <tr>
                                <td style="font-weight: 800"><span>{{$menu_val['menu_name']}}</span><input type="checkbox"></td>
                                <td >
                                    @foreach($menu_val['son'] as $menu_value)
                                    <table class="table-bordered listTable">
                                        <tr>
                                            <td><span style="display: flex">{{$menu_value['menu_name']}}</span><input type="checkbox"></td>
                                            <td>
                                                @foreach($menu_value['son'] as $menu_v)
                                                <span style="display: flex">{{$menu_v['menu_name']}}<input type="checkbox"></span>
                                                @endforeach
                                            </td>
                                        </tr>
                                    </table>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
    <div class="buttons">
        <button type="button" class="btn btn-primary">确认保存</button>
        <a href="{{url('admin/adminIndex')}}">
            <button type="button" class="btn btn-primary">取消</button>
        </a>
    </div>
</div>
</body>
<scrip>
    <script src="../js/jquery-1.9.1.js"></script>
    <script src="../js/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/BootstrapMenu.min.js"></script><!--基于Bootstrap的jQuery右键上下文菜单插件-->
    <script type="text/javascript" src="../js/jquery.pagination.js"></script>
</scrip>
<script>
    $(document).ready(function () {
        $(".JurisdictionContent").hide()
        $(".stop").on("click",function () {
            $(".JurisdictionContent").hide()
        })
        $(".open").on("click",function () {
            $(".JurisdictionContent").show()
        })
    })
</script>
</html>