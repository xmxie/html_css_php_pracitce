<?php
    include_once "../model/admin_model.php";
    if(isset($_COOKIE['user'])){
        include "function.php";
        // $id=$_GET['update'];
        $preusr=$_COOKIE['user'];
        // $data=getone($id);//获得用户信息
        // if(!$data){
        //     tip('获取用户信息失败','list.php');
        // }
        // $preusr=$data['user'];
    }else{
        tip('信息传递异常！','list.php');
    }

    if(isset($_POST['up'])){
        $ndata['user']=$_POST['usr'];
        $ndata['password']=md5($_POST['pwd']);
        $ndata['group']=$_POST['group'];
        // $ndata['img']=$_FILES['img'];
        updateUsr($id,$ndata);
    }
    include_once "../view/mod/pass.php";
?>