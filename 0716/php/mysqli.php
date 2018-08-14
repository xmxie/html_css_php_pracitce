<meta charset=utf-8>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>mysqli</title>
</head>
<body>
    <table border=1 width=300>
        <tr>
            <td>ID</td><td>用户名</td><td>密码</td><td>操作</td>
        </tr>
    <?php
        
        $link=mysqli_connect('localhost','root','123456','test0716');
        if(!$link){
            die('link failed');
        }
        if(isset($_GET['id'])){
            $sql='delete from admin where id='.$_GET['id'].'';
            mysqli_query($link,$sql);
        }

        
        // $sql="CREATE DATABASE tmp";
        // if(mysql_query($link,$sql)){
        //     echo '创建成功';
        // }
        $sql="select * from  admin";
        $result=mysqli_query($link,$sql);
        // print_r( $tmp);
        while($row=mysqli_fetch_array($result)){
            echo '<tr>
            <td>'.$row['ID'].'</td>
            <td>'.$row['user'].'</td>
            <td>'.$row['password'].'</td>
            <td><a href=?id='.$row['ID'].'>删除</a>/<a href=?alter='.$row['ID'].'>修改</a></td>';
        }

    
        if(isset($_POST['up'])){
            $add="insert into  test0716.admin (
                ID ,
                user ,
                password
                )
                values (
                NULL ,  '".$_POST['user']."',  '".$_POST['password']."'
                );";
            mysqli_query($link,$add);
        }
        $del='delete from admin where id=1';
        $reslut=mysqli_query($link,$del);
        if(isset($_GET['alter'])){
            echo '<script>location.href="alter.php?alter='.$_GET['alter'].'";</script>';
        }
    ?>
    </table>
    <!-- <form action="" method="post">
        <div style='width:400px;height:80px;border:1px solid black;'>
            用户名<input type="text" name='user'><br>
            密&nbsp;&nbsp;&nbsp;&nbsp;码<input type="text" name=password><br>
            <input type="submit" name='up' style='margin-left:100px;' value='注册'>
        </div>
    </form> -->
</body>
</html>