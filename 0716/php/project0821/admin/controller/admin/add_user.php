<?php
    include_once "../..//config/config.php";
    
    if(isset($_POST['up'])){
        $data['user']=trim($_POST['usr']);
        $data['password']=md5($_POST['pwd']);
        $data['group']=$_POST['group'];
        $data['img']=$_FILES['img'];
        $data['settime']=time();
        register($data);
    }
    $group=get('group');
    include_once VIEW."admin/add_user.php";
?>