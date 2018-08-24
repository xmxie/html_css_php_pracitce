<?php
    include_once "../../config/config.php";
    if(!isset($_SESSION['id'])){
        tip("请先登录",'login.php');
    }
    if(isset($_GET['exit'])){
        unset($_SESSION['id']);
        tip('','login.php');
    }
    include_once VIEW."admin/index.php";
?>