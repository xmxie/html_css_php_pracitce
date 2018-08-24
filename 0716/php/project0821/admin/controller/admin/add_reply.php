<?php
    include_once "../../config/config.php";
    if(isset($_SESSION['id'])){
        $adminId=$_SESSION['id'];
        $admin=$_COOKIE['user'];
    }else{
        tip('请先登录','login.php');
    }
    if(isset($_GET['reply'])){
        $msg=getOne($_GET['reply'],'message');
        $id=$_GET['reply'];
    }else{
        tip('请选择需要回复的留言','book.php');
    }
    if(isset($_POST['up'])){
        $data['target']=$id;
        $data['reply']=$_POST['reply'];
        $data['time']=time();
        $data['admin_id']=$adminId;
        $re=insert($data,'reply');
        if($re){
            tip('回复成功','book.php');
        }else{
            tip('回复失败','');
        }
    }
    include_once VIEW."admin/add_reply.php";
?>