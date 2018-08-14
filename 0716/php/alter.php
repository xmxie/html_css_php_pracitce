<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改密码</title>
    <style>
        .main{width:500px;height:200px;border:1px solid black;margin:0 auto;}
        .main li{width:500px;height:50px;line-height:50px;padding-left:100px;box-sizing:border-box;list-style:none;}
        .main li:last-child{text-align:center;padding:0;}
    </style>
</head>
<body>
    <div class=main>
        <?php
            define('LINK','localhost');
            define("ROOT",'root');
            define("PASSWORD",'123456');
            define("DB",'test0716');
            
            function getUsr($id){
                $link=mysqli_connect(LINK,ROOT,PASSWORD,DB);
                if(!$link){
                    tip('无法连接服务器，请稍候重试','mysqli.php');
                }

                $sql='select * from admin where id='.$id;

                $result=mysqli_query($link,$sql);
                while($tmp=mysqli_fetch_array($result)){
                    if($tmp['ID']==$id){
                        $usr=$tmp['user'];
                    }
                }
                if(!$usr){
                    tip('用户名异常');
                }
                return $usr;
            }


            if(!isset($_GET['alter'])){
               tip('出现异常！请稍后重试','mysqli.php');
            }

            $link=mysqli_connect(LINK,ROOT,PASSWORD,DB);
            if(!$link){
                tip("数据库连接失败！请稍候重试",'mysqli.php');
            }

            $id=$_GET['alter'];
            $usr=getUsr($id);
        ?>
        <form action="" method="post">
            <li>用户名：<?php echo $usr?> </li>
            <li>新密码：<input type="text" name=newPassword></li>
            <li><input type="submit" value="确认" name='up'></li>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['up'])){
        $password=$_POST['newPassword'];
        alter($link,$password,$id);
    }

    function tip($cont,$href=''){
        echo 
        '<script>
            alert("'.$cont.'");
            location.href="'.$href.'";
        </script>';
    }
    function alter($link,$password,$id){
        if($password==''){
            tip("请输入新密码！",'');
        }
        $sql="update test0716.admin set password='".$password."' where admin.ID=".$id."";
        $result=mysqli_query($link,$sql);
        if($result){
            tip('修改成功','mysqli.php');
        }
    }
?>