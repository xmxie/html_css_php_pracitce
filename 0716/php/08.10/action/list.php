<?php
    header("content-type:text/html; charstet=uft-8");
    include_once "../model/admin_model.php";
    include_once "../function/function.php";
    if(isset($_GET['update'])){
        echo '<script>location.href="update.php?update='.$_GET['update'].'";</script>';
    }
    if(isset($_GET['id'])){
        $re=delete($_GET['id']);
        if(!$re){
            tip('删除失败','list.php');
        }
    }
    if(isset($_GET['update'])){
        echo ' <script>localtion.href="update.php"</script>';
    }
    $data=getdt();

    include_once '../view/mod/list.php';

?>