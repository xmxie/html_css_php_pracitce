<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>列表信息</title>
    <style>
    img{width:60px;height:60px;border-radius:60px;}
    </style>
</head>
<body>

    <table width=500 border=1 style="margin:0 auto;">
    <tr><td>ID</td><td>头像</td><td>用户名</td><td>会员组</td><td>操作时间</td><td>操作</td></tr>
    <?php
        show($data);
    ?>
</body>
</html>