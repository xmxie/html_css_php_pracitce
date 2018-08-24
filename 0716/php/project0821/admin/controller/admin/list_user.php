<?php
    include_once "../../config/config.php";
    include_once MODEL."admin_model.php";
    $table='admin';
    if(isset($_GET['delete'])){
        $re=delete($_GET['delete'],'admin');
        if(!$re){
            tip('删除失败','list.php');
        }
    }
    if(isset($_GET['update'])){
        echo ' <script>localtion.href="alter.php?update='.$_GET['update'].'"</script>';
    }
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $pageSize=10;
    include_once VIEW.'admin/list_user.php';
?>