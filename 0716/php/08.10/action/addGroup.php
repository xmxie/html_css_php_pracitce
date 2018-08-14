<?php
    include_once 'function.php';
    include_once '../model/admin_model.php';
    if(isset($_POST['up'])){
        $data['name']=$_POST['name'];
        insertGrp($data);
    }

    include_once "../view/editGroup.php";
?>