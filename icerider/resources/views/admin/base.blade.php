<script>
    function urlSubmit(obj){
        $(obj).parents(".modal").find("form").submit();
    }
    $(document).on('click','#del',function(){
        var is_del = confirm('您确定要删除吗');
        if(is_del==false){
            return;
        }
        var url = $(this).attr('url');
        var region = $('.region_id');
        var str="";
        $.each(region,function(k,v){
            if(v.checked){
//                console.log(v);
                var id = $(v).attr('opt');
                str+=','+id;
            }
        })
        if(str==""){
            alert('请选择大区！')
        }else {
            var ids = str.substr(1);
            $.ajax({
                url:url, //你的路由地址
                type:"get",
                data:{id:str},
                success:function(data){
                    window.location.reload();
                }
            });
        }
    })




</script>