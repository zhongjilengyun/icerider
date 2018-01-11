<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Author" content="print">
    <meta name="Keywords" content="TMS后台管理系统">
    <meta name="Description" content="基于bootstrap和jquery搭建的后台管理系统">
    <title>城市管理</title>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditAddjurisdiction">修改</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delModeljurisdiction">删除</button>
        </div>
        <div>
            <form class="form-inline">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <div class="form-group"  style="margin-right:20px;">
                            <label for="CityName">城市名称</label>
                            <input class="form-control" id="CityName" type="text" >
                        </div>
                        <div class="form-group"  style="margin-right:20px;">
                            <label for="citylevel">城市级别</label>
                            <select class="form-control" id="citylevel" >
                                <option value="请选择所属大区">请选择城市级别</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cityBelongs">归属城市</label>
                            <select class="form-control" id="cityBelongs" >
                                <option value="请选择归属城市">请选择归属城市</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <div class="form-group">
                            <label for="Region">所属区域</label>
                            <select class="form-control" id="Region" >
                                <option value="请选择所属区域">请选择所属区域</option>
                            </select>
                        </div>
                        <div class="form-group"  style="margin-left:20px;">
                            <label for="Branch office">所属分公司</label>
                            <input class="form-control" id="Branch office" type="text" >
                        </div>
                        <div class="form-group"  style="margin-left:20px;">
                            <label for="province">所属省份</label>
                            <input class="form-control" id="province" type="text" >
                        </div>
                        <button class="btn btn-primary">搜索</button>
                    </div>
                </div>

            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox"></th>
                    <th>序号</th>
                    <th>城市</th>
                    <th>所属省份</th>
                    <th>所属分公司</th>
                    <th>所属大区</th>
                    <th>城市级别</th>
                    <th>区号</th>
                    <th>邮政编码</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>华北大区</td>
                    <td></td>
                    <td>总部</td>
                    <td>盛春娜</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
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

<!--删除权限模态框-->


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
                <a  onclick="urlSubmit()" class="btn btn-success" data-dismiss="modal">确定</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--删除权限模态框-->
<!--添加城市模态框开始-->
<div class="modal fade" id="Addjurisdiction">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">添加城市</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="cityName" class="col-sm-4 control-label">城市名称：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="cityName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="areaCode" class="col-sm-4 control-label">区号：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="areaCode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postal code" class="col-sm-4 control-label">邮政编码：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="postal code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city level" class="col-sm-4 control-label">城市级别：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="city level">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Regions" class="col-sm-4 control-label">所属大区：</label>
                        <div class="col-sm-6">
                            <select name="" id="Regions" class="selectpicker show-tick form-control">
                                <option value="请选择所属大区">请选择所属大区</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="Branchoffice" class="col-sm-4 control-label" >所属分公司:</label>
                        <div class="col-sm-6">
                            <select class="selectpicker show-tick form-control" id="Branchoffice" >
                                <option value="请选择所属分公司">请选择所属分公司</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="Subordinateprovince"  class="col-sm-4 control-label">所属省份:</label>
                        <div class="col-sm-6">
                            <select  class="selectpicker show-tick form-control"id="Subordinateprovince" >
                                <option value="请选择所属省份">请选择所属省份</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="cityaffiliation" class="col-sm-4 control-label">归属城市：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="cityaffiliation">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a  onclick="urlSubmit()" class="btn btn-primary" data-dismiss="modal">提交</a>
                <button type="button"  class="btn btn-primary" data-dismiss="modal">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--添加权城市模态框结束-->
<!--修改城市模态框开始-->
<div class="modal fade" id="EditAddjurisdiction">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">添加城市</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="EditcityName" class="col-sm-4 control-label">城市名称：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="EditcityName">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="EditareaCode" class="col-sm-4 control-label">区号：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="EditareaCode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Editpostalcode" class="col-sm-4 control-label">邮政编码：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="Editpostalcode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Editcitylevel" class="col-sm-4 control-label">城市级别：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="Editcitylevel">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="EditRegions" class="col-sm-4 control-label">所属大区：</label>
                        <div class="col-sm-6">
                            <select name="" id="EditRegions" class="selectpicker show-tick form-control">
                                <option value="请选择所属大区">请选择所属大区</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="EditBranchoffice" class="col-sm-4 control-label" >所属分公司:</label>
                        <div class="col-sm-6">
                            <select class="selectpicker show-tick form-control" id="EditBranchoffice" >
                                <option value="请选择所属分公司">请选择所属分公司</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="EditSubordinateprovince"  class="col-sm-4 control-label">所属省份:</label>
                        <div class="col-sm-6">
                            <select  class="selectpicker show-tick form-control"id="EditSubordinateprovince" >
                                <option value="请选择所属省份">请选择所属省份</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="Editcityaffiliation" class="col-sm-4 control-label">归属城市：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="Editcityaffiliation">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <a  onclick="urlSubmit()" class="btn btn-primary" data-dismiss="modal">提交</a>
                <button type="button"  class="btn btn-primary" data-dismiss="modal">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--修改城市模态框结束-->

</body>
<scrip>
    <script src="../js/jquery-1.9.1.js"></script>
    <script src="../js/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/BootstrapMenu.min.js"></script><!--基于Bootstrap的jQuery右键上下文菜单插件-->
    <script type="text/javascript" src="../js/jquery.pagination.js"></script>
</scrip>
<script type="text/javascript">

    $(document).ready(function() {
        $("#Pagination").pagination("15");
    });

</script>
</html>
