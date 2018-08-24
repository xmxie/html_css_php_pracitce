<?php
    include_once "../../config/config.php";
    include_once MODEL."admin_model.php";
    include_once MODEL."column_model.php";
    $table='column';
    if(isset($_GET['delete'])){
        $re=delete($_GET['delete'],'column');
        if(!$re){
            tip('删除失败','list_column.php');
        }else{
            tip2('删除成功','list_column.php');
        }
    }
    if(isset($_GET['alter'])){
        echo ' <script>localtion.href="alter_column.php?alter='.$_GET['alter'].'"</script>';
    }
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $pageSize=6;
    $start=getStart($pageSize,$page);
    $data=listColumn($start,$pageSize);


    include_once VIEW.'admin/list_column.php';

?>