<?php
    header("content-type:text/html;charset=utf-8;");
    session_start();
    include_once "../model/Db.class.base.php";
    $db=new Db('localhost','root','123456','web0716','utf8');

    if(!isset($_GET['act'])){
        echo 'wrong';
    }else if($_GET['act']=='login'){
        if($_POST['user']==''||$_POST['pwd']==''){
            die('登录信息不能为空');
        }
        $sql="select `id`,`user`,`password` from `admin` where `user`='".$_POST['user']."'";
        $data=$db->select($sql);
        if(!$data){
            die('用户不存在');
        }
        // echo $data[0]['password'];
        if($data[0]['password']==md5($_POST['pwd'])){
            $_SESSION['user']=$data[0]['user'];
            echo '登录成功';
            header("Location:../view/index.php");
        }else{
            echo '密码错误';
        }
    }else if($_GET['act']=='reg'){
        if($_POST['user']==''||$_POST['pwd']==''){
            die('登录信息不能为空');
        }
        $sql="select `user`,`password` from `admin` where `user`='".$_POST['user']."'";
        $data=$db->select('admin',$sql);
        if($data){
            die('用户已存在');
        }
        $sql="insert into `admin` (`id`,`user`,`password`,`settime`) value('','".$_POST['user']."','".$_POST['pwd']."','".time()."')";
        $res=$db->insert($sql);
        if($res){
            echo '注册成功';
        }else{
            echo '注册失败';
        }
    }else if($_GET['act']=='out'){
        echo 'out';
    }

