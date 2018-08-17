<?php
    include_once "../../config/config.php";  
    include_once MODEL."reply_model.php";
    $table='reply';
    if(isset($_GET['id'])){
        $msgId=$_GET['id'];
    }
    if(isset($_GET['delete'])){
        delete($_GET['delete'],'reply');
    }
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $pageSize=10;

    include_once VIEW."admin/reply.php";
?>