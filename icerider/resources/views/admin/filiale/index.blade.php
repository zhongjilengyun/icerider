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
<style>
    .form-group label {

    }
</style>
<body>
<div class="content_main container-fluid">
    <div id="iframe_home" class="iframe cur">
        <div class=" nav nav-title">
            位置：
        </div>
        <div class="buttons">
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#Addjurisdiction" >添加</button>
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#EditAddjurisdiction">修改</button>
            <button type="button" class="btn btn-primary"  data-toggle="modal"  data-target="#delModeljurisdiction" >删除</button>
        </div>
        <div>
            <form class="form-inline">
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <div class="form-group"  style="margin-left: 20px;">
                            <label for="filiale" >分公司名称</label>
                            <select class="form-control" id="filiale" >
                                <option value="请选择分公司名称">请选择分公司名称</option>
                                @foreach($filiale as $fili_val)
                                    <option value="{{$fili_val['filiale']}}">{{$fili_val['filiale']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group"   style="margin-left: 40px;">
                            <label for="principalName">负责人姓名</label>
                            <input type="text" id="principalName" class="form-control">
                        </div>
                        <div class="form-group"   style="margin-left: 40px;">
                            <label for="principalPhone">负责人电话</label>
                            <input type="text" id="principalPhone" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <div class="form-group"  style="margin-left: 40px;">
                            <label for="Region">所属大区</label>
                            <select class="form-control" id="Region" >
                                <option value="请选择所属大区">请选择所属大区</option>
                                @foreach($region as $regi_val)
                                    <option value="{{$regi_val['region_name']}}">{{$regi_val['region_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="margin-left: 60px;">
                            <label for="provincevarchar">所在省份</label>
                            <select class="form-control" id="provincevarchar" >
                                <option value="请选择所属大区">请选择所在省份</option>
                                @foreach($province as $pro_val)
                                    <option value="{{$pro_val['bianhao']}}">{{$pro_val['address']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="margin-left:100px;">
                            <label for="citys">所在城市</label>
                            <select class="form-control" id="citys" >
                                <option value="请选择所属城市">请选择所在城市</option>
                                @foreach($city as $city_val)
                                    <option value="{{$city_val['bianhao']}}">{{$city_val['address']}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary" style=" margin-left: 100px;">搜索</button>
                        </div>
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
                    <th>分公司名称</th>
                    <th>所属大区</th>
                    <th>省份</th>
                    <th>城市</th>
                    <th>地址</th>
                    <th>负责人</th>
                    <th>负责人电话</th>
                    <th>详情</th>
                </tr>
                </thead>
                <tbody>
                @foreach($filiale as $fili_value)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>{{$fili_value['id']}}</td>
                    <td>{{$fili_value['filiale']}}</td>
                    <td>{{$fili_value['region']}}</td>
                    <td>{{$fili_value['province']}}</td>
                    <td>{{$fili_value['city']}}</td>
                    <td>{{$fili_value['address']}}</td>
                    <td>{{$fili_value['principal']}}</td>
                    <td>{{$fili_value['principal_tel']}}</td>
                    <td data-toggle="collapse" data-target="#details">详情</td>
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
                <a  onclick="urlSubmit()" class="btn btn-success" data-dismiss="modal">确定</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--删除模态框-->
<!--添加分公司开始-->
<div class="modal fade" id="Addjurisdiction">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">添加分公司</h4>
            </div>
            <div class="modal-body" style="width: 650px;">
                <form class="form-inline">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <div>基础信息</div>
                            <div class="form-group">
                                <label for="branchNames">分公司名称：</label>
                                <input type="text" id="branchNames" class="form-control">
                                <label for="Regions">所属大区：</label>
                                <select class="form-control" id="Regions" >
                                    <option value="请选择所属大区" class="form-control">请选择所属大区</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <div class="form-group"style="margin-left: 30px;">
                                <label for="principal" >负 责 人:</label>
                                <input type="text" id="principal" class="form-control">
                                <label for="Provinces">所在省份:</label>
                                <select class="form-control" id="Provinces">
                                    <option value="请选择所属大区" class="form-control">请选择所在省份</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <div class="form-group">
                                <label for="principalPhones"  style="margin-left:10px;">负责任电话:</label>
                                <input type="text" id="principalPhones" class="form-control">
                                <label for="city">所在城市:</label>
                                <select class="form-control" id="city">
                                    <option value="请选择所在城市" class="form-control">请选择所在城市</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <div class="form-group" >
                                <label for="fax" style="margin-left: 40px;">传真：</label>
                                <input type="text" id="fax" class="form-control">
                                <label for="address">具体地址：</label>
                                <input type="text" id="address" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <h4>运输方式</h4>
                            <div class="form-group control-label">
                                <label for="Highwayname">公路名称：</label>
                                <input type="text" id="Highwayname" class="form-control">
                                <label for="Highwayphone">公路电话：</label>
                                <input type="text" id="Highwayphone" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <div class="form-group control-label" >
                                <label for="British">铁路名称：</label>
                                <input type="text" id="British" class="form-control">
                                <label for="Britishphone">铁路电话：</label>
                                <input type="text" id="Britishphone" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <div class="form-group control-label" >
                                <label for="CARRIER">航空名称：</label>
                                <input type="text" id="CARRIER" class="form-control">
                                <label for="CARRIERphone">航空电话：</label>
                                <input type="text" id="CARRIERphone" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a  onclick="urlSubmit()" class="btn btn-info" data-dismiss="modal">提交</a>
                <button type="button"  class="btn btn-info" data-dismiss="modal">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--添加分公司结束-->
<!--修改分公司开始-->
<div class="modal fade" id="EditAddjurisdiction">
    <div class="modal-dialog">
        <div class="modal-content message_align">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">修改分公司</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <div>基础信息</div>
                            <div class="form-group">
                                <label for="EditbranchNames">分公司名称：</label>
                                <input type="text" id="EditbranchNames" class="form-control">
                                <label for="EditRegions">所属大区：</label>
                                <select class="form-control" id="EditRegions" >
                                    <option value="请选择所属大区" class="form-control">请选择所属大区</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <div class="form-group"style="margin-left: 30px;">
                                <label for="Editprincipal" >负 责 人:</label>
                                <input type="text" id="Editprincipal" class="form-control">
                                <label for="EditProvinces">所在省份:</label>
                                <select class="form-control" id="EditProvinces">
                                    <option value="请选择所属大区" class="form-control">请选择所在省份</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <div class="form-group">
                                <label for="EditprincipalPhones"  style="margin-left:10px;">负责任电话:</label>
                                <input type="text" id="EditprincipalPhones" class="form-control">
                                <label for="Editcity">所在城市:</label>
                                <select class="form-control" id="Editcity">
                                    <option value="请选择所在城市" class="form-control">请选择所在城市</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <div class="form-group" >
                                <label for="Editfax" style="margin-left: 40px;">传真：</label>
                                <input type="text" id="Editfax" class="form-control">
                                <label for="Editaddress">具体地址：</label>
                                <input type="text" id="Editaddress" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <h4>运输方式</h4>
                            <div class="form-group control-label">
                                <label for="EditHighwayname">公路名称：</label>
                                <input type="text" id="EditHighwayname" class="form-control">
                                <label for="EditHighwayphone">公路电话：</label>
                                <input type="text" id="EditHighwayphone" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <div class="form-group control-label" >
                                <label for="EditBritish">铁路名称：</label>
                                <input type="text" id="EditBritish" class="form-control">
                                <label for="EditBritishphone">铁路电话：</label>
                                <input type="text" id="EditBritishphone" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom:20px;">
                            <div class="form-group control-label" >
                                <label for="EditCARRIER">航空名称：</label>
                                <input type="text" id="EditCARRIER" class="form-control">
                                <label for="EditCARRIERphone">航空电话：</label>
                                <input type="text" id="EditCARRIERphone" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a  onclick="urlSubmit()" class="btn btn-info" data-dismiss="modal">提交</a>
                <button type="button"  class="btn btn-info" data-dismiss="modal">取消</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--修改分公司结束-->
</body>
<scrip>
    <script src="../js/jquery-1.9.1.js"></script>
    <script src="../js/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="../js/BootstrapMenu.min.js"></script><!--基于Bootstrap的jQuery右键上下文菜单插件-->
    <script type="text/javascript" src="../js/jquery.pagination.js"></script>
</scrip>
<script type="text/javascript">

    $('#provincevarchar').on('change',function(){
        _this=$(this);
        var bianhao = _this.val();

        $.ajax({
            type: "get",
            url: "/admin/getProvince",
            data: {bianhao:bianhao},
            dataType:'json',
            success: function(msg){
                var province = $('#citys');
                province.children().remove();
                province.append('<option value="0">请选择所属城市</option>')
                $.each(msg,function(k,v){
                    str = '<option value="'+ v.address+'" opt="'+ v.bianhao+'">'+ v.address+'</option>'
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