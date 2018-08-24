<?php
    include_once "../../config/config.php";
    if(isset($_SESSION['id'])){
        $adminId=$_SESSION['id'];
    }else{
        tip('请先登录','login.php');
    }
    if(isset($_POST['up'])){
        $data['name']=$_POST['name'];
        $data['time']=time();
        $data['sequence']=$_POST['sequence'];
        $data['describe']=$_POST['describe'];
        $data['display']=$_POST['display'];
        $re=insert($data,'column');
        if($re){
            tip('添加成功','list_column.php');
        }else{
            tip('添加失败','');
        }
    }
    include_once VIEW."admin/add_column.php";
?>