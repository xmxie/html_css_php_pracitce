 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页面</title>
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <?php
        include_once 'function.php';
        // echo $_POST['usr'];
        if(isset($_POST['up'])){
            $usr=$_POST['usr'];
            $pwd=$_POST['pwd'];
            login($usr,$pwd); 
        }
    ?>
    <div id=content>
        <div id='head'>
            <img id='head_img' src="./images/top_r1_c1.jpg" alt="">
            <p>游客你好！您还没有<a href="login.php">登录</a>，若您不是会员请先免费<a href="register.php">注册</a></p>
            <ul id='head_ioc'>
                <li id='ioc_1'><a href="message.php">留言板</a></li>
                <li id='ioc_2'><a href="">订阅</a></li>
                <li id='ioc_3'><a href="">加入收藏</a></li>
                <li id='ioc_4'><a href="">论坛</a></li>
                <li id='ioc_5'><a href="">English</a></li>
            </ul>
            <ul id='nav'>
                <li><a href="">关于分会</a></li>
                <li><a href="">行业动态</a></li>
                <li><a href="">学术交流</a></li>
                <li><a href="">业务合作</a></li>
                <li><a href="">历届年会</a></li>
                <li><a href="">会员之家</a></li>
            </ul>
        </div>
        <div class=login id=login>
            <div class=loginbar>
                <div class=loginbar_title>
                    <h4>用户登录</h4>&nbsp; User Login
                </div>
                <form action="" method="post">
                    <div class=loginbar_input>
                        用户名 <input type="text" name='usr' 
                        <?php if(isset($_COOKIE['failTime'])){if($_COOKIE['failTime']>=3){echo 'disabled="disabled"';}}?>
                        value= <?php if(isset($_COOKIE['usrRmb'])){echo $_COOKIE['usrRmb'];}?>> 
                        <font class=gray>请填写用户名</font>
                    </div>
                    <div class=loginbar_input>
                        密&nbsp;&nbsp;&nbsp;&nbsp;码 <input type="password" id=password name='pwd'
                        <?php if(isset($_COOKIE['failTime'])){if($_COOKIE['failTime']>=3){echo 'disabled="disabled"';}}?>
                        value=<?php if(isset($_COOKIE['pwdRmb'])){echo $_COOKIE['pwdRmb'];}?>> 
                        <font class=gray id=tip>请输入密码</font>
                    </div>
                    <p style='padding-left:80px;position:relative;top:-10px;color:black;font-size:12px;'><input type="checkbox" name='rmb' checked=true
                    >记住账号密码</p>
                    <div class=loginbar_bottom>
                        <input type='submit' class=loginbar_sure value=登录 name='up'>
                        &nbsp;&nbsp;&nbsp;<a href='register.html'>免费注册</a> &nbsp;&nbsp;&nbsp;<a href=''>找回密码</a>
                    </div>
                </form>
            </div>
            <img src="./images/login_page_img.jpg" class="loginad">
        </div>
        <div id='bottom'>
            <img src="./images/footer_logo.jpg" alt="">
            <p>地址：上海市冰河路151号（201203）&nbsp;&nbsp;电话：86--51320288-5427/5415&nbsp;&nbsp;传真：2654-56456-41563</p>
        </div>
    </div>
</body>
</html>
<script>
    var login=document.getElementById('login').getElementsByTagName("input");
    for(var c=0;c<login.length;c++){
        login[c].onfocus=function(){this.style.background="url('./images/login_page_r3_c3.jpg') no-repeat"}
        login[c].onblur=function(){this.style.background="url('./images/login_page_r5_c3.jpg') no-repeat"}
    }
    var password='123456';
    var push=document.getElementById("push");
    var passwordin=document.getElementById("password");
    var tip=document.getElementById("tip");

    push.onclick=function(){
        if(passwordin.value==password){
            passwordin.style.background='url(./images/login_page_r5_c3_ok.jpg) no-repeat';
            tip.style.color='green';
            tip.innerText='正在登录，请稍候...';
            }else{passwordin.style.background='url(./images/login_page_r5_c3_error.jpg) no-repeat'
                  alert("用户名或密码错误！");
                  tip.innerText="请重新输入用户名或密码！";
                  tip.style.color='red';
        }
    }
</script>
