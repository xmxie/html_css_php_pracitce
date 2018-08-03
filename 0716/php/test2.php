<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .main{width: 500px;height: 200px;border:1px solid black;margin:0 auto;}
        .main p{width:100%;padding-left:100px;}
        .main p:last-child{text-align:center;padding-left:0px;}
    </style>
</head>
<body>
    <!-- <div class=main>
        <form action="" method='post'>
        <p>用户名<input type="text" name='usr'></p>
        <p>密&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'></p>
        <p><input type="submit" value="提交" name='up'></p>
        </form>
    </div> -->
    <div class=main>
        <?php
            echo rand(0,1)/100;
        ?>


        
        <!-- 登录部分 -->
        <form action="" method='post'>
            <p>用户名<input type="text" name='usr'></p>
            <p>密&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'></p>
            <p>
                验证码<input type="text" name='yzm'> 
                <?php
                    $str="adfagqrffdsa";
                    $range=strlen($str)-1;
                    $count=4;
                    $yzm='';
                    for($i=0;$i<$count;$i++){
                        $index=rand(0,$range);
                        $yzm=$yzm.$str[$index];
                    }
                    echo $yzm;
                ?>
            </p>
            <p><input type="submit" value="提交" name='up'></p>
        </form>

        <!-- 注册部分 -->
      <!--   <form action="" method='post'>
            <p>用户名<input type="text" name='usr'></p>
            <p>密&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'></p>
            <p><input type="submit" value="注册" name='up'></p>
        </form> -->
        
    </div>
</body>
</html>


<?php
    if(isset($_POST['up'])){
        $usr=$_POST['usr'];
        $pwd=$_POST['pwd'];
        
        //登录开始
        $_usr='henry';
        $_pwd='123456';
        $yzmin=$_POST['yzm'];
        if($usr==$_usr && $pwd==$_pwd && $yzmin==$yzm){
            echo "登录成功";
        }
        else if($yzmin!=$_yzm){
            echo "验证码错误！";
        }
        else if($pwd!=$_pwd||$usr!=$_usr){
            echo "账户名或密码错误！";
        }
       

        // 注册开始
    //     $usrLen=strlen($usr);
    //     $pwdLen=strlen($pwd);
    //     $usrLegal='qwertyuiopasdfghjklzxcvbnm_';
    //     $pwdLegal='0123456789';
    //     $result=true;
    //     if($usrLen<5||$usrLen>12){
    //         echo"用户名长度应为5-12个字符！";
    //         $result=false;
    //     }
    //     if($pwdLen!=6){
    //         echo '密码长度应为6！';
    //         $result=false;
    //     }
    //     for($i=0;$i<$usrLen;$i++){
    //         if(!strpos($usrLegal,$usr[$i])){
    //             echo"用户名含有非法字符！";
    //             $result=false;
    //             break;
    //         }
    //     }
    //     for($i=0;$i<$pwdLen;$i++){
    //         if(!strpos($pwdLegal,$pwd[$i])){
    //             echo"密码应为纯数字！";
    //             $result=false;
    //             break;
    //         }
    //     }
    //     if($result){
    //         echo "注册成功！";
    //     }
    // 
}
?>