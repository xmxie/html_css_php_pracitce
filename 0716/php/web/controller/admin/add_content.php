<?php
    include_once "../../config/config.php";
    $table='content';
    if(isset($_SESSION['id'])){
        $adminId=$_SESSION['id'];
        $admin=$_COOKIE['user'];
    }else{
        tip('请先登录','login.php');
    }
    if(isset($_POST['up'])){
        if(isset($_FILES['img'])){
            echo 'tets';
            $img=upload($_FILES['img']);
        }
        $data['title']=$_POST['title'];
        $data['time']=strtotime($_POST['time']);
        // $data['describe']=$_POST['describe'];
        $data['content']=$_POST['content'];
        $data['author']=$_POST['author'];
        $data['views']=$_POST['views'];
        $data['img']=$img;
        $data['column_id']=$_POST['column_id'];
        $re=insert($data,$table);
        if($re){
            tip('添加成功','list_content.php');
        }else{
            tip('添加失败','');
        }
    }
    include_once VIEW."admin/add_content.php";
?>