<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="<?=HOST_URI?>view/css/pintuer.css">
<link rel="stylesheet" href="<?=HOST_URI?>view/css/admin.css">
<script src="<?=HOST_URI?>view/js/jquery.js"></script>
<script src="<?=HOST_URI?>view/js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 回复留言</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">    
      <div class="form-group">
          <div class="label">
            <label>用户名：</label>
          </div>
          <div class="field"> 
            <script src="js/laydate/laydate.js"></script>
            <input type="text" class="laydate-icon input w50" name="datetime" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="<?=$admin?>"  data-validate="required:日期不能为空" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" disabled=disabled/>
            <div class="tips"></div>
          </div>
      </div>  
       <div class="form-group">
          <div class="label">
            <label>发布时间：</label>
          </div>
          <div class="field"> 
            <script src="js/laydate/laydate.js"></script>
            <input type="text" class="laydate-icon input w50" name="datetime" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="<?=date("Y-m-d H:i:s",$msg['time'])?>"  data-validate="required:日期不能为空" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" disabled=disabled/>
            <div class="tips"></div>
          </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea name="reply" style="width:500px;height:200px;"></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>
        <div class="field">
          <input class="button bg-main icon-check-square-o" type="submit" name='up' value='提交'>
        </div>
      </div>
    </form>
  </div>
</div>
</body></html>