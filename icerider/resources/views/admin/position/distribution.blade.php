<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="print">
    <meta name="Keywords" content="TMS后台管理系统">
    <meta name="Description" content="基于bootstrap和jquery搭建的后台管理系统">
    <title>冰骑士系统</title>
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
        }
        .listTable td{
            border-bottom:1px solid #ccc;
        }
        .listTable td:first-of-type{
            height:35px;
            /*padding:0 0 0 8%;*/

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
        <h1 style="text-align: center">为<span style="color: red;">{{$position}}</span>分配权限</h1>
    </div>
    <div>
        <ul>
            <li>
                <ul class="ules">
                    <li class="listUl">
                        <span style="float: left;margin-right: 5px">后台首页</span>
                        <input type="checkbox">
                    </li>
                    <li class="listTwo">
                        <table class="table-bordered listTable">
                            @foreach($auth as $menu_val)
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
        <a href="/admin/postIndex">
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

</html>