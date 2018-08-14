<?php
    include_once "../model/admin_model.php";
    include_once '../function/function.php';
    if(isset($_POST['up'])){
        $pwd=md5($_POST['pwd']);
        $re=login($_POST['usr'],$pwd);
    }
    // $yzm=yzm();
    include_once "../view/mod/login.html";
?>
