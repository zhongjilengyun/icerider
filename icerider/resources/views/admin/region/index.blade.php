<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="print">
    <meta name="Keywords" content="TMS后台管理系统">
    <meta name="Description" content="基于bootstrap和jquery搭建的后台管理系统">
    <title>TMS系统</title>
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
</style>
<div class="content_main container-fluid">
    <div id="iframe_home" class="iframe cur">
        <div class=" nav nav-title">
            位置：
        </div>
        <div class="buttons">
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#Addjurisdiction" >添加</button>
            <button type="button" class="btn btn-primary" id="upd" url="/admin/regionUpd" >修改</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delModeljurisdiction" id="del" url="/admin/regionDel">删除</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox"></th>
                    <th>序号</th>
                    <th>大区名称</th>
                    <th>隶属</th>
                    <th>录入人</th>
                    <th>录入时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($region as $region_val)
                <tr>
                    <td><input type="checkbox" class="id" opt="{{$region_val['id']}}"></td>
                    <td>{{$region_val['id']}}</td>
                    <td>{{$region_val['region_name']}}</td>
                    <td>总部</td>
                    <td>{{$region_val['entering']}}</td>
                    <td>{{$region_val['enter_time']}}</td>
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

{{--<div class="modal fade" id="delModeljurisdiction">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content message_align">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>--}}
                {{--<h4 class="modal-title">删除</h4>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<p>删除成功！</p>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<input type="hidden" id="url"/>--}}
                {{--<a  onclick="urlSubmit()" class="btn btn-success" data-dismiss="modal">确定</a>--}}
            {{--</div>--}}
        {{--</div><!-- /.modal-content -->--}}
    {{--</div><!-- /.modal-dialog -->--}}
{{--</div><!-- /.modal -->--}}
<!--删除模态框-->
<!--添加模态框开始-->
<div class="modal fade" id="Addjurisdiction">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">添加区域名</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" action="{{url('admin/regionAdd')}}" method="post">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label for="menuName" class="col-sm-2 control-label">大区名：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="menuName" name="region_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a  onclick="urlSubmit(this)" class="btn btn-primary" data-dismiss="modal">提交</a>
                <button type="button"  class="btn btn-primary" data-dismiss="modal">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--添加模态框结束-->
<!--修改模态框开始-->
<div class="modal fade" id="EditAddjurisdiction">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">修改区域名</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" action="{{url('admin/regionUpdate')}}" method="post" id="edit">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="region_id" id="up_id">
                        <label for="EditmenuName" class="col-sm-2 control-label">大区名：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="EditmenuName" name="region_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a  onclick="urlSubmit(this)" class="btn btn-primary" data-dismiss="modal">提交</a>
                <button type="button"  class="btn btn-primary" data-dismiss="modal">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--添加模态框结束-->
</body>
<scrip>
    <script src="../js/jquery-1.9.1.js"></script>
    <script src="../js/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/BootstrapMenu.min.js"></script><!--基于Bootstrap的jQuery右键上下文菜单插件-->
    <script type="text/javascript" src="../js/jquery.pagination.js"></script>
</scrip>
@include('admin.base')
<script type="text/javascript">

    $(document).ready(function() {
        $("#Pagination").pagination("15");
    });


    $(document).on('click','#upd',function(){
        var is_del = confirm('您确定要修改吗？');
        if(is_del==false){
            return;
        }
        var url = $(this).attr('url');
        var region = $('.id');
        var str="";
        $.each(region,function(k,v){
            if(v.checked){
//                console.log(v);
                var id = $(v).attr('opt');
                str+=','+id;
            }
        })
        if(str.lastIndexOf(',')>0){
            alert('只能选择一个');
            return;
        }
        if(str==""){
            alert('请选择大区！');
            return;
        }
        var ids = str.substr(1)
        $.ajax({
            url:url, //你的路由地址
            type:"get",
            data:{id:ids},
            dataType:'json',
            success:function(data){
//                console.log(data)
                $('#up_id').val(data.id);
                $('#EditmenuName').val(data.region_name);
                $("#EditAddjurisdiction").modal("show"); //显示提示框
            }
        });

    })



</script>
</html>
