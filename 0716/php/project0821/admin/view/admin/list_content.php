<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title>列表</title>
    <link rel="stylesheet" href=<?php echo HOST_URI."view/css/pintuer.css";?>>
    <link rel="stylesheet" href=<?php echo HOST_URI."view/css/admin.css";?>>
    <script src=<?php echo HOST_URI."view/js/jquery.js"; ?>></script>
    <script src=<?php echo HOST_URI."view/js/pintuer.js";?>></script>  
</head>
<body>
<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
				<li> <a class="button border-main icon-plus-square-o" href="add_content.php"> 添加内容</a> </li>
				<li>
            <select name="columnId" class="input" style="width:200px; line-height:17px;" onchange="changesearch()">
							<option value="0">请选择分类</option>
						<?php
                $column=get('column');
                $count=count($column);
                for ($i=0; $i <$count ; $i++) { 
                  if($column[$i]['display']==1){
                  echo '<option value="'.$column[$i]['id'].'">'.$column[$i]['name'].'</option>';}
                }
              ?>
            </select>
          </li>
				<li>
          <input type="text" placeholder="请输入搜索关键字" name="keywords" class="input" style="width:250px; line-height:17px;display:inline-block" />
					<input type="submit" name='search' class="button border-main icon-search" value=搜索>
				</li>

    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
				<th>栏目名称</th>
				<th width='250'>标题</th>
				<th>作者</th>
				<th>创建时间</th>
				<!-- <th>描述</th> -->
				<th>点击量</th>
        <th >操作</th>
      </tr>
      <volist name="list" id="vo">
			 <?php 
					for ($i=0; $i <count($data) ; $i++) { 
							echo '
							<tr>
								<td>'.$data[$i]['id'].'</td>
								<td>'.$data[$i]['name'].'</td>     
								<td>'.$data[$i]['title'].'</td>     
								<td>'.$data[$i]['author'].'</td>                       
								<td>'.date("Y-m-d H:i:s",$data[$i]['time']).'</td>   
								<!--<td>'.$data[$i]['describe'].'</td> -->  
								<td>'.$data[$i]['views'].'</td>   
								<td>
										<a class="button border-main" href="alter_content.php?alter='.$data[$i]['id'].'"><span class="icon-edit"></span> 修改</a>
										<a class="button border-red" href="?delete='.$data[$i]['id'].'" ><span class="icon-trash-o"></span> 删除</a>
								</td>
							</tr>';
					}
			 ?>
      <tr>
        <?php footpage($table,$pageSize,$page);?>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

//搜索
function changesearch(){	
		
}

//单个删除
function del(id,mid,iscid){
	if(confirm("您确定要删除吗?")){
		
	}
}

//全选
$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

//批量删除
function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false;		
		$("#listform").submit();		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

//批量排序
function sorts(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		return false;
	}
}


//批量首页显示
function changeishome(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}

//批量推荐
function changeisvouch(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");	
		
		return false;
	}
}

//批量置顶
function changeistop(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();	
	}
	else{
		alert("请选择要操作的内容!");		
	
		return false;
	}
}


//批量移动
function changecate(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){		
		
		$("#listform").submit();		
	}
	else{
		alert("请选择要操作的内容!");
		
		return false;
	}
}

//批量复制
function changecopy(o){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){	
		var i = 0;
	    $("input[name='id[]']").each(function(){
	  		if (this.checked==true) {
				i++;
			}		
	    });
		if(i>1){ 
	    	alert("只能选择一条信息!");
			$(o).find("option:first").prop("selected","selected");
		}else{
		
			$("#listform").submit();		
		}	
	}
	else{
		alert("请选择要复制的内容!");
		$(o).find("option:first").prop("selected","selected");
		return false;
	}
}

</script>
</body>
</html>