<?php
    include_once "../../config/config.php";
    include_once MODEL.'column_model.php';
    include_once MODEL.'content_model.php';
    $table='content';
    if(isset($_SESSION['id'])){
        $adminId=$_SESSION['id'];
    }else{
        tip('请先登录','login.php');
    }
    if(isset($_GET['alter'])){
        $id=$_GET['alter'];
        $content=getContentByID($id);
    }else{
        tip('请选择需要修改的内容','list_content.php');
    }
    if(isset($_POST['up'])){
        $data['title']=$_POST['title'];
        $data['time']=strtotime($_POST['time']);
        // $data['describe']=$_POST['describe'];
        $data['content']=$_POST['content'];
        $data['author']=$_POST['author'];
        $data['views']=$_POST['views'];
        $data['column_id']=$_POST['column_id'];
        $re=update($id,$data,$table);
        if($re){
            tip('添加成功','list_content.php');
        }else{
            tip('添加失败','');
        }
    }
   
    include_once VIEW."admin/alter_content.php";
?>