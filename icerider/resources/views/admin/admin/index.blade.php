{{--@extends('admin/layouts.master')--}}

{{--@section('content')--}}
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="print">
    <meta name="Keywords" content="TMS后台管理系统">
    <meta name="Description" content="基于bootstrap和jquery搭建的后台管理系统">
    <title>用户管理</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui">  <!-- 手机端 -->
    <link rel="stylesheet" href="../css/common/reset.css">  <!-- 样式初始化 -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../css/index.css">  <!-- 页面样式 -->
    <link rel="stylesheet" href="../js/bootstrap/css/bootstrap.min.css"> <!--引入bootstrap3.3-->
    <link rel="stylesheet" href="../css/material-design-iconic-font-2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../css/pagination.css">
</head>
<body>
<style>
    .form-group {
        margin-bottom: 15px;
        margin-right: 20px;
    }
    .form-group label {
        margin-right: 30px;
    }
</style>
<div class="content_main container-fluid">
    <div id="iframe_home" class="iframe cur">
        <div class=" nav nav-title">
            位置：
        </div>
        <div class="buttons">
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#StartUsing" >启用</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#forbidden">禁用</button>
            <a href="{{url('admin/adminCreate')}}">
                <button type="button" class="btn btn-primary">添加</button>
            </a>
            <a href="editUser.html">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditAddjurisdiction">修改</button>
            </a>
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#delModeljurisdiction">删除</button>
        </div>
        <div>
            <form class="form-inline">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <div class="form-group">
                            <label for="Region" >所属区域</label>
                            <select class="form-control" id="Region" >
                                <option value="请选择所属区域">请选择所属区域</option>
                                @foreach($region as $reg_val)
                                    <option value="{{$reg_val['id']}}">{{$reg_val['region_name']}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Subordinate">所属省份</label>
                            <select class="form-control" id="Subordinate" >
                                <option value="">请选择所属省份</option>
                                @foreach($province as $pro_val)
                                    <option value="{{$pro_val['bianhao']}}">{{$pro_val['address']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="province">所属城市</label>
                            <select class="form-control" id="province" >
                                <option value="请选择所属城市">请选择所属城市</option>
                                @foreach($city as $city_val)
                                    <option value="{{$city_val['bianhao']}}">{{$city_val['address']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <div class="form-group">
                            <label for="subordinatecompanies">所属公司</label>
                            <select class="form-control" id="subordinatecompanies" >
                                <option value="请选择所属公司">请选择所属公司</option>
                                @foreach($filiale as $fili_val)
                                    <option value="{{$fili_val['id']}}">{{$fili_val['filiale']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="initiatemode">启用状态</label>
                            <select class="form-control" id="initiatemode" >
                                <option value="请选择启用状态">请选择启用状态</option>
                                <option value="0">禁用</option>
                                <option value="1">启用</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">姓名</label>
                            <input type="text" id="name" class="form-control" >
                            <button class="btn btn-primary">查询</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox" ></th>
                    <th>序号</th>
                    <th>姓名</th>
                    <th>登录名</th>
                    <th>所属区域</th>
                    <th>所属公司</th>
                    <th>所属省份</th>
                    <th>所属城市</th>
                    <th>职务</th>
                    <th>录入人</th>
                    <th>录入时间</th>
                    <th>启用状态</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admin as $admin_val)
                <tr>
                    <td>
                        <input type="checkbox">
                    </td>
                    <td>{{$admin_val['id']}}</td>
                    <td>{{$admin_val['true_name']}}</td>
                    <td>{{$admin_val['username']}}</td>
                    <td>{{$admin_val['area']}}</td>
                    <td>{{$admin_val['company']}}</td>
                    <td>{{$admin_val['province']}}</td>
                    <td>{{$admin_val['city']}}</td>
                    <td>{{$admin_val['position']}}</td>
                    <td>{{$admin_val['entering']}}</td>
                    <td>{{$admin_val['entering_time']}}</td>
                    @if($admin_val['status']==0)
                    <td>禁用</td>
                        @else
                        <td>启用</td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="content_main container-fluid">
            <div class="" style="float:left; text-align: center;height: 85px;line-height: 85px;margin:0 20px 0 15px;">
                <span>共 45 条记录，</span>
                <span>当前显示第 1 页</span>
            </div>
            <div class="pages">
                <div id="Pagination"></div>
                <div class="searchPage">
                    <span class="page-sum">共<strong class="allPage">15</strong>页</span>
                    <span class="page-go">跳转<input type="text">页</span>
                    <a href="javascript:;" class="page-btn">GO</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--删除模态框-->
<div class="modal fade" id="delModeljurisdiction">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">删除</h4>
            </div>
            <div class="modal-body">
                <p>删除成功！</p>
            </div>
            <div class="modal-footer">
                <a   class="btn btn-default" data-dismiss="modal">确定</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--删除权限模态框-->
<!--启用模态框-->
<div class="modal fade" id="StartUsing">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">启用</h4>
            </div>
            <div class="modal-body">
                <p>启用成功！</p>
            </div>
            <div class="modal-footer">
                <a   class="btn btn-default" data-dismiss="modal">确定</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--启用模态框-->
<!--禁用模态框-->
<div class="modal fade" id="forbidden">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">禁用</h4>
            </div>
            <div class="modal-body">
                <p>禁用成功！</p>
            </div>
            <div class="modal-footer">
                <a   class="btn btn-default" data-dismiss="modal">确定</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--禁用模态框-->

<!--修改用户模态框开始-->
<div class="modal fade" id="EditAddjurisdiction">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">修改用户</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <h4>基础信息</h4>
                        <label for="editrealNaname" class="col-sm-4 control-label">真实姓名：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="editrealNaname" palceholder="请输入用户真实姓名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editloginName" class="col-sm-4 control-label">登陆名：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="editloginName" placeholder="请输入用户登录名">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="editpassword" class="col-sm-4 control-label">密码：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="editpassword" placeholder="请输入密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <h4>部门信息</h4>
                        <label for="EditUserspost" class="col-sm-4 control-label">用户职务：</label>
                        <div class="col-sm-6">
                            <select name="" id="EditUserspost" class="selectpicker show-tick form-control">
                                <option value="请选择用户职务">请选择用户职务</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="EditIClass" class="col-sm-4 control-label">部门级别：</label>
                        <div class="col-sm-6">
                            <select name="" id="EditIClass" class="selectpicker show-tick form-control">
                                <option value="请选择部门级别">请选择部门级别</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="EditRegions" class="col-sm-4 control-label">所属大区：</label>
                        <div class="col-sm-6">
                            <select name="" id="EditRegions" class="selectpicker show-tick form-control">
                                <option value="请选择部门级别">请选择所属大区</option>
                                @foreach($region as $reg_val)
                                    <option value="{{$reg_val['id']}}">{{$reg_val['region_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="EditsubordinateCompanie" class="col-sm-4 control-label">所属公司：</label>
                        <div class="col-sm-6">
                            <select name="" id="EditsubordinateCompanie" class="selectpicker show-tick form-control">
                                <option value="请选择所属公司">请选择所属公司</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Editcity" class="col-sm-4 control-label">所属城市：</label>
                        <div class="col-sm-6">
                            <select name="" id="Editcity" class="selectpicker show-tick form-control">
                                <option value="请选择所属省份">请选择所属城市</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div>
                    <span>权限信息</span>
                    <span>收起/展开</span>
                </div>
            </div>
            <div class="modal-footer">
                <a  onclick="urlSubmit()" class="btn btn-info" data-dismiss="modal">提交</a>
                <button type="button"  class="btn btn-info" data-dismiss="modal">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--修改模态框结束-->
</body>
<scrip>
    <script src="../js/jquery-1.9.1.js"></script>
    <script src="../js/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/BootstrapMenu.min.js"></script><!--基于Bootstrap的jQuery右键上下文菜单插件-->
    <script type="text/javascript" src="../js/jquery.pagination.js"></script>
</scrip>
<script type="text/javascript">
    //获取城市
    $('#Subordinate').on('change',function(){
        _this=$(this);
        var bianhao = _this.val();

        $.ajax({
            type: "get",
            url: "/admin/getProvince",
            data: {bianhao:bianhao},
            dataType:'json',
            success: function(msg){
                var province = $('#province');
                province.children().remove();
                province.append('<option value="0">请选择所属城市</option>')
                $.each(msg,function(k,v){
                    str = '<option value="'+ v.bianhao+'">'+ v.address+'</option>'
                    province.append(str)
                })
            }
        });
    })
    $(document).ready(function() {
        $("#Pagination").pagination("15");
    });

</script>
</html>

{{--@stop--}}