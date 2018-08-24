<?php
    include_once "../../config/config.php";
    if(isset($_GET['update'])){
        $id=$_GET['update'];
        $alter=getOne($id,'admin');
    }
    if(isset($_POST['up'])){
        $data['user']=$_POST['user'];
        $data['password']=md5($_POST['newpass']);
        $data['group']=$_POST['group'];
        $data['img']=$_FILES['img'];
        $data['settime']=time();
        alter($id,$data,'admin');
    }
    $group=get('group');
    include_once VIEW."admin/alter.php";
?>