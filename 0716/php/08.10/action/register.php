<?php
    include_once "../model/admin_model.php";
    include_once "function.php";
   
    if(isset($_POST['up'])){
        $data['user']=trim($_POST['usr']);
        $data['password']=md5($_POST['pwd']);
        $data['group']=$_POST['group'];
        $data['img']=$_FILES['img'];
        $data['settime']=time();
        // insert($data);
        register($data);
    }
    include_once "../view/register.php";
?>