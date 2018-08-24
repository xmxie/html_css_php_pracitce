<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/flower.css">
</head>
<style>
    body{background: azure;}
    
</style>
<body>
    <?php include_once "user_header.v.php";?>
    <div class=login-main>
        <div class=login-div>
            <form class="form-horizontal login-obj" action="../api/user.api.php?act=login" method="post" role='form'>
                <div class="login-title">
                    <h4>用户登录</h4><a href="">立即注册</a>
                </div>
                <div class='form-group'>
                    <div class='col-sm-12'>
                        <input type="text" class='form-control' name='user' placeholder="邮箱/手机号">
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-sm-12'>
                        <input type="text" class='form-control' name='pwd' placeholder="密码">
                    </div>
                </div>
                <div class='form-group'>
                    <div class='col-sm-4'>
                        <label class='checkbox-inline'>
                            <input type="checkbox" name="rmb" value='rmb'>记住密码
                        </label>
                    </div>
                    <div class='col-sm-8'>
                        <a href="" style="padding-top:7px;">忘记密码</a>
                    </div>
                </div>
                <div class='form-group'>
                    <input type="submit" class="btn btn-default btn-orange" name='up' value="登录">
                </div>
                <font class=gray>使用合作网站账号登录商城</font><br>
                <a href=""><img src="../../public/images/qq.gif" alt=""></a> 
                <a href=""><img src="../../public/images/wechat.gif" alt=""></a> 
            </form>
        </div>
    </div>
    <?php include_once "footer.html"?>
</body>
</html>