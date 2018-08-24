<?php
    include_once "../../config/config.php";
    include_once MODEL."column_model.php";
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
    $column=getColumn();
    $code=code();
    include_once VIEW."content/login.php";
?>