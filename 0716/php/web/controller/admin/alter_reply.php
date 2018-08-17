<?php
    include_once "../../config/config.php";
    if(isset($_SESSION['id'])){
        $adminId=$_SESSION['id'];
        $admin=$_COOKIE['user'];
    }else{
        tip('请先登录','login.php');
    }
    if(isset($_GET['alter'])){
        $reply=getOne($_GET['alter'],'reply');
        $id=$_GET['alter'];
    }else{
        tip('请选择需要修改的留言','book.php');
    }
    if(isset($_POST['up'])){
        $data['reply']=$_POST['reply'];
        $data['time']=time();
        $data['admin_id']=$adminId;
        $re=update($id,$data,'reply');
        if($re){
            tip('修改成功','book.php');
        }else{
            tip('修改失败','');
        }
    }
    include_once VIEW."admin/alter_reply.php";
?>