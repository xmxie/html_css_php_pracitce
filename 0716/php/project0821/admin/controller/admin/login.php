<?php
    include_once "../../config/config.php";
    if(isset($_POST['up'])){
        if(strtolower($_POST['code'])==strtolower($_POST['codesys'])){
            $password=md5($_POST['password']);
            $re=login($_POST['user'],$password);
            if($re){
                $_SESSION['id']=$re;
                tip2('登录成功！','index.php');
            }else{
                tip2('登录失败');
            }
        }else{
            tip('验证码错误！');
        }
    }
    $code=code();
    include_once VIEW."admin/login.php";
?>