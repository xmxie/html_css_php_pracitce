 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录页面</title>
    <?php include_once "link.php"?>
</head>
<body>
    <div id=content>
        <div id='head'>
            <?php include_once "header.php"?>
        </div>
        <form action="" method="post">
        <div class=login id=login>
            <div class=loginbar>
                <div class=loginbar_title>
                    <h4>用户登录</h4>&nbsp; User Login
                </div>
                <div class=loginbar_input>
                    用户名 <input type="text" name='user'> <font class=gray>请填写用户名</font>
                </div>
                <div class=loginbar_input>
                    &nbsp;&nbsp;&nbsp;密码 <input type="password" id=password name='password'> <font class=gray id=tip>请输入密码(测试密码12346）</font>
                </div>
                <div class=loginbar_input>
                    验证码
                    <input type="text" class="input input-big" name="code" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" style='width:100px;display: inline-block;'/>&nbsp;&nbsp;&nbsp;
                    <input type="text" class="input input-big" disabled='disabled' value=<?=$code?>  style='width:100px;display: inline-block;'/>
                    <input type="hidden" value="<?=$code?>" name='codesys'>
                </div>
                <div class=loginbar_bottom>
                    <input type='submit' class=loginbar_sure style="color:white" id=push name='up' value='登录'>
                    &nbsp;&nbsp;&nbsp;<a href='register.html'>免费注册</a> &nbsp;&nbsp;&nbsp;<a href=''>找回密码</a>
                </div>
            </div>
            <img src="<?=HOST_URI?>view/content/images/login_page_img.jpg" class="loginad">
        </div>
        </form>
       <?php include_once "footer.php"?>
    </div>
</body>
</html>
<script>
    var login=document.getElementById('login').getElementsByTagName("input");
    for(var c=0;c<login.length;c++){
        login[c].onfocus=function(){this.style.background="url('<?=HOST_URI?>view/content/images/login_page_r3_c3.jpg') no-repeat"}
        login[c].onblur=function(){this.style.background="url('<?=HOST_URI?>view/content/images/login_page_r5_c3.jpg') no-repeat"}
    }
    // var password='123456';
    // var push=document.getElementById("push");
    // var passwordin=document.getElementById("password");
    // var tip=document.getElementById("tip");
    // push.onclick=function(){
    //     if(passwordin.value==password){
    //         passwordin.style.background='url(<?=HOST_URI?>view/content/images/login_page_r5_c3_ok.jpg) no-repeat';
    //         tip.style.color='green';
    //         tip.innerText='正在登录，请稍候...';
    //         }else{passwordin.style.background='url(<?=HOST_URI?>view/content/images/login_page_r5_c3_error.jpg) no-repeat'
    //               alert("用户名或密码错误！");
    //               tip.innerText="请重新输入用户名或密码！";
    //               tip.style.color='red';
    //     }
    // }
</script>