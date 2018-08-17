<?php
    include_once "../../config/config.php";
    include_once MODEL."content_model.php";
    $table='content';
    if(isset($_GET['delete'])){
        $re=delete($_GET['delete'],$table);
        if(!$re){
            tip('删除失败','list_content.php');
        }else{
            tip2('删除成功','list_content.php');
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
    if(isset($_POST['search'])){
        $columnId=$_POST['columnId'];
        $keywords=$_POST['keywords'];
        if($columnId){
            if($keywords){
                $data=getColumnKeyword($columnId,$keywords,$start,$pageSize);
            }else{
                $data=getByColumn($columnId,$start,$pageSize);
            }            
        }else if($keywords){
            $data=getKeyword($keywords,$start,$pageSize);
        }else{
            $data=getContent();
        }
    }else{
        $data=getContent($start,$pageSize);
    }

    
    include_once VIEW.'admin/list_content.php';

?>