<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台框架集</title>
</head>
    <?php
        include("function.php");
        session_start();
        if(!isset($_SESSION['usr'])){
            tip('请先登录！','login.php');
        }
    ?>
    <frameset rows='100px,*'>
        <frame src='top.php' name=top>
        <frameset cols='200px,*'>
            <frame src='left.php' name='left' noresize='noresize'>
            <frame src='right.php' name='right'> 
        </frameset>
    </frameset>

</html>