
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
    <div class=main>


        <!-- 注册部分 -->
        <form action="" method='post'>
            <p>用户名<input type="text" name='usr'></p>
            <p>密&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'></p>
            <p>
            <p><input type="submit" value="注册" name='up'></p>
        </form>
    </div>
</body>
</html>
<?php
    function regisit($usr,$pwd){                        //注册验证
        global $yzm;
        echo $yzm;
        $usrLen=strlen($usr);                           //获取账号长度
        $pwdLen=strlen($pwd);                           //获取密码长度 
        $yzmin=$_POST['yzm'];                           //获取输入验证码
        $usrLegal='qwertyuiopasdfghjklzxcvbnm_';        
        $pwdLegal='0123456789';                         //指定规则
        $result=true;
        // if($yzmin!=$yzm){
        //     echo "验证码错误！";
        //     $result=false;
        // }
        // else 
          if($usrLen<5||$usrLen>12){
                echo"用户名长度应为5-12个字符！";
                $result=false;
            }
            else if($pwdLen!=6){
                echo '密码长度应为6！';
                $result=false;
            }
            else if(true){
                for($i=0;$i<$usrLen;$i++){
                    if(!strpos($usrLegal,$usr[$i])){
                        echo"用户名含有非法字符！";
                        $result=false;
                        break;
                    }
                }
            }
                for($i=0;$i<$pwdLen;$i++){
                    if(!strpos($pwdLegal,$pwd[$i])){
                        echo"密码应为纯数字！";
                        $result=false;
                        break;
                    }
                }
        if($result){
            $path="login.txt";
            $fileStr=trim(file_get_contents($path));
            $newStr='#'.$usr.'.'.$pwd;
            $fileStr=$fileStr.$newStr;
            // echo $fileStr;
            $rst=file_put_contents($path,$fileStr);
            if($rst){
                echo '注册成功';
            }else{
                echo '注册失败';
            }
        }
    }
    
    //按键事件
    if(isset($_POST['up'])){
        $usr=$_POST['usr'];
        $pwd=$_POST['pwd'];
        //登录开始
       
        
        // login($usr,$pwd);
        // 注册开始
        regisit($usr,$pwd);
    }
        
?>
<?php
    
?>







 