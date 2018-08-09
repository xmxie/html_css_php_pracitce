
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .main{width: 500px;height: 200px;border:1px solid black;margin:0 auto;}
        .main p{width:100%;text-align:center}
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

        <!-- 登录部分 -->
        <form action="" method='post'>
            <p>用户名<input type="text" name='usr'  disabled="disabled"
            value=<?php if(isset($_COOKIE['usr'])){echo $_COOKIE['usr'];}?>
            /></p>
            <p>密&nbsp;&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'
            value=<?php if(isset($_COOKIE['pwd'])){echo $_COOKIE['pwd'];}?>></p>
            <p ><input type="checkbox" name='rmb'>记住密码</p>
            <p>
                <!-- 验证码<input type="text" name='yzm'>  -->
                <?php
                   /*  $yzm='';
                    function test($count=4,$type=0){
                        global $yzm;
                        // echo $yzm;
                        if($type<=1){
                            $str="qwertyuiopasdfghjklzxcvbnm";
                        }
                        else if($type<=2){
                            $str="0123456789";
                        }
                        else if($tyoe<=3){
                            $str="qwertyuiopasdfghjklzxcvbnm0123456789";
                        }
                        $range=strlen($str)-1;
                        for($i=0;$i<$count;$i++){
                            $index=rand(0,$range);
                            $yzm=$yzm.$str[$index];
                        }
                        echo $yzm;
                        // return $yzm;                        
                        }
                    test(rand(4,8),rand(0,3)); */
                ?> 
            </p>
            <p><input type="submit" value="提交" name='up'></p>
        </form>

        <!-- 注册部分 -->
       <!--  <form action="" method='post'>
            <p>用户名<input type="text" name='usr'></p>
            <p>密&nbsp;&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'></p>
            <p>
                验证码<input type="text" name='yzm'> 
                <?php
                    // test(rand(4,8),rand(0,3));
                    // echo '<br>'.$yzm;
                ?>
            <p><input type="submit" value="注册" name='up'></p>
        </form> -->
        
    </div>
</body>
</html>
<?php
    function login($usr,$pwd){//登录验证
        
        
        if(isset($_COOKIE['test'])){
            setcookie("test",$_COOKIE['test']+1);
            echo $_COOKIE['test'];
        }else{
            setcookie("test",1);
            echo $_COOKIE['test'];
        }



        $oMes=trim(file_get_contents("login.txt"));
        $aMes=explode('#',$oMes);
        $count=count($aMes);
        for($i=0;$i<$count;$i++){
            $rMes[$i]=explode('.',$aMes[$i]);
            $rMes[$i][0]=trim($rMes[$i][0]);
            $rMes[$i][1]=trim($rMes[$i][1]);
        }
        $success=false;
        for($i=0;$i<$count;$i++){
            if($usr==$rMes[$i][0]&&$pwd==$rMes[$i][1]){
                $success=true;
            }
        }
        if(isset($_POST['rmb'])){
            $date=time()+3600;
            setcookie('usr',$_POST['usr'],$date);
            setcookie('pwd',$_POST['pwd'],$date);
        }else{
            $date=time()-3600;
            setcookie('usr',$_POST['usr'],$date);
            setcookie('pwd',$_POST['pwd'],$date);
        }
        if($success){
            echo 'success';
        }else{
            echo 'failed';
        }
        // else if($yzmin!=$yzm){
        //     echo "验证码错误！";
        // }
    }
    function regisit($usr,$pwd){//注册验证
        global $yzm;
        echo $yzm;
        $usrLen=strlen($usr);                           //获取账号长度
        $pwdLen=strlen($pwd);                           //获取密码长度 
        $yzmin=$_POST['yzm'];                          //获取输入验证码
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
       
        
        login($usr,$pwd);
        // 注册开始
        // regisit($usr,$pwd);
    }
        
?>
<?php
    
?>







 