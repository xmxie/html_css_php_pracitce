<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改成员信息</title>
    <style>
        .main{width:350px;height:150px;border:1px solid black;margin:0 auto;margin-top:50px;}
        .main p{width:350px;height:30px;padding-left:50px;box-sizing:border-box;}
        .main p:last-child{text-align:center;padding:0;}
    </style>
</head>
<body>
    <?php
        include_once('function.php');
        if(isset($_GET['update'])){
            $id=$_GET['update'];
            $usr=getUsr($id);
            $pwd=getPwd($id);
        }else{
            tip('获取id失败，请重试','list.php');
        }
        if(isset($_POST['up'])){
            $nusr=$_POST['nusr'];
            $npwd=$_POST['npwd'];
            update($id,$nusr,$npwd);
        }
    ?>
    <div class=main>
    <form action="" method='post'>
        <p>用户名<input type="text" value='<?php echo $usr?>' name='nusr'></p>
        <p>密&nbsp;&nbsp;&nbsp;&nbsp;码<input type="password" value='<?php echo $pwd?>' name='npwd'></p>
        <p><input type="submit" value="确认" name='up'></p>
    </form>
    </div>
</body>
</html>