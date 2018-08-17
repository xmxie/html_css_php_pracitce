<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href=<?php echo HOST_URI."view/css/pintuer.css";?>>
<link rel="stylesheet" href=<?php echo HOST_URI."view/css/admin.css";?>>
<script src=<?php echo HOST_URI."view/js/jquery.js"; ?>></script>
<script src=<?php echo HOST_URI."view/js/pintuer.js";?>></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 修改会员密码</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="" enctype="multipart/form-data">
      <div class="form-group">
        <div class="label">
          <label for="sitename">用户名：</label>
        </div>
        <div class="field">
            <input type="text" class="input w50" name="user" size="50" placeholder="请输入用户名" data-validate="required:请输入用户名" value="<?=$alter['user'];?>"/>         
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="newpass" size="50" placeholder="请输入新密码" data-validate="required:请输入新密码,length#>=5:新密码不能小于5位" />         
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">确认新密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="renewpass" size="50" placeholder="请再次输入新密码" data-validate="required:请再次输入新密码,repeat#newpass:两次输入的密码不一致" />          
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>头像:</label>
        </div>
        <div class="field">
          <input type="file" class="button bg-blue margin-left" id="image1" value="+ 浏览上传"  name='img' style="float:left;">
          <div class="tipss">图片大小：200kb</div>
        </div>
      </div>   
      <div class="form-group">
        <div class="label">
          <label>发布时间：</label>
        </div>
        <div class="field"> 
          <script src="js/laydate/laydate.js"></script>
          <input type="text" class="laydate-icon input w50" name="datetime" value="<?=date("Y-m-d H:i:s",$alter['settime'])?>"  disabled='disabled' style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" />
          <div class="tips"></div>
        </div>
      </div>  
      <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
           <?php group($group)?>
            <div class="tips"></div>
          </div>
	  </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit" name='up'> 提交</button>   
        </div>
      </div>      
    </form>
  </div>
</div>
</body></html>