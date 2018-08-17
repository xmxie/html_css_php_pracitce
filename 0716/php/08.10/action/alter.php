<?php
    include_once "../model/admin_model.php";
    include_once "../function/function.php";
    if(isset($_GET['update'])){
        $alter=getOne($_GET['update']);
    }
    if(isset($_POST['up'])){
        $data['password']=$_POST['newpass'];
        $data['group']=$_POST['group'];
        $data['img']=$_POST['img'];
        update()
    }
    $group=getGrp();
    include_once "../view/mod/alter.php"
?>