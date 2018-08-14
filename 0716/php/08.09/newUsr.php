<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加用户</title>
    <style>
        .main{width:350px;height:150px;border:1px solid black;margin:0 auto;margin-top:50px;}
        .main p{width:350px;height:30px;padding-left:50px;box-sizing:border-box;}
        .main p:last-child{text-align:center;padding:0;}
    </style>
</head>
<?php
    include_once("function.php");
    if(isset($_POST['up'])){
        $usr=$_POST['usr'];
        $pwd=$_POST['pwd'];
        insert($usr,$pwd);
    }

?>
<body>
    <div class=main>
        <form action="" method='post'>
            <p>用户名<input type="text" value='' name='usr'></p>
            <p>密&nbsp;&nbsp;&nbsp;&nbsp;码<input type="password" value='' name='pwd'></p>
            <p><input type="submit" value="确认" name='up'></p>
        </form>
    </div>
</body>
</html>