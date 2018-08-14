<?php
include_once "../model/admin_model.php";
include_once "function.php";
if(isset($_GET['update'])){
    $name=getAGrp($_GET['update'])['name'];
}
if(isset($_POST['up'])){
    $data['name']=$_POST['name'];
    updateGrp($_GET['update'],$data);
}
include_once "../view/editGroup.php";
?>