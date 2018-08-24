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
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改内容</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="">  
      <div class="form-group">
        <div class="label">
          <label>标题：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="<?=$content['title']?>" name="title" data-validate="required:请输入标题" />
          <div class="tips"></div>
        </div>
      </div>
      
      <if condition="$iscid eq 1">
        <div class="form-group">
          <div class="label">
            <label>分类标题：</label>
          </div>
          <div class="field">
            <select name="column_id" class="input w50">
              <option value="">请选择分类</option>
              <?php
                $data=get('column');
                $count=count($data);
                for ($i=0; $i <$count; $i++) { 
                  if($data[$i]['id']!=$content['column_id']){
                    echo '<option value="'.$data[$i]['id'].'">'.$data[$i]['name'].'</option>';
                  }else{
                    echo '<option value="'.$data[$i]['id'].'" selected=selected>'.$data[$i]['name'].'</option>';
                  }
                }
              ?>
            </select>
            <div class="tips"></div>
          </div>
        </div>
      </if>
      <div class="form-group">
        <div class="label">
          <label>内容：</label>
        </div>
        <div class="field">
          <textarea name="content" class="content" style="height:450px; border:1px solid #ddd;"><?=$content['content']?></textarea>
          <div class="tips"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="form-group">
        <div class="label">
          <label>发布时间：</label>
        </div>
        <div class="field"> 
          <script src="js/laydate/laydate.js"></script>
          <input type="text" class="laydate-icon input w50" name="time" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="<?=date("Y-m-d H:i:s",$content['time'])?>"  data-validate="required:日期不能为空" style="padding:10px!important; height:auto!important;border:1px solid #ddd!important;" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>作者：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="author" value="<?=$content['author']?>"  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>点击次数：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="views" value="" data-validate="member:只能为数字"  />
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