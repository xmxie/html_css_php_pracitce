<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-key"></span> 修改会员密码</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="" enctype="multipart/form-data">  
      <div class="form-group">
        <div class="label">
          <label for="sitename">管理员账号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" id="mpass" name="usr" size="50" placeholder="请输入用户名" data-validate="required:请输入用户名" />       
        </div>
      </div>      
      <div class="form-group">
        <div class="label">
          <label for="sitename">密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="pwd" size="50" placeholder="请输入新密码" data-validate="required:请输入新密码,length#>=5:新密码不能小于5位" />         
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">确认密码：</label>
        </div>
        <div class="field">
          <input type="password" class="input w50" name="repwd" size="50" placeholder="请再次输入新密码" data-validate="required:请再次输入新密码,repwd#pwd:两次输入的密码不一致" />          
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">所属分组</label>
        </div>
            <?php group($group)?>
      </div>
      <div class="form-group">
        <div class="label">
          <label for="sitename">上传头像</label>
        </div>
        <div class="field">
            <input type="file" name='img' >
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