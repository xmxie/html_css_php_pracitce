<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/flower.css">
</head>
<script>
    function getElementStyle(obj,attr){
    　　if(obj.currentStyle){
            return obj.currentStyle[attr];
        }else{
            return getComputedStyle(obj,false)[attr];
        }
    }
    var oBox  = document.getElementsByClassName("register-box")[0];
    var tmp  = document.getElementsByClassName("form-group");
    window
    for(var a=0;a<3;a++){
        tmp[a].children[2].style.display='inline';
    }
    function helpMsg(){
        console.log('test');
        console.log(this.postMessage)
        // oBox.style.display='inline';
　　     //结果返回的是空
    }
</script>
<body>
    <?php include_once "register_header.v.php"?>
    <div class=register-box>
        <form role="form" class=form-horizontal action="../api/user.api.php?act=reg" method="post" style="width:540px;margin:0 auto;color:#a4a4a4">
            <div class="form-group">
                <label class="col-sm-3 control-label">邮箱、手机</label>
                <div class=col-sm-6>
                    <input type="text" class=form-control id='test' name="user" placeholder="" onclick="helpMsg()" >
                </div>
                <p class='help-block' style='display:none;'>请输入邮箱或手机</p>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">密码</label>
                <div class=col-sm-6>
                    <input type="text" class=form-control name="pwd" placeholder="">
                </div>
                <p class='help-block'>请输入密码</p>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" name="pwd">确认密码</label>
                <div class=col-sm-6 >
                    <input type="text" class=form-control placeholder="">
                </div>
                <p class='help-block'>请再次输入密码</p>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">图形验证码</label>
                <div class=col-sm-3 >
                    <input type="text" class=form-control placeholder="">
                </div>
                <div class="col-sm-3" >
                    <img src="../../public/images/codetmp.aspx" alt="" style="margin-top:4px;">
                </div>
                <span class='help-block'>看不清？<a href="">刷新</a></span>
                <p></p>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6" style="color:#333">
                    <label class="checkbox-inline" style="background:#fff;">
                        <input type="checkbox" value="1">我已阅读并同意<font style="color:red">会员注册协议</font>
                    </label>
                    <!-- <input type="checkbox" name="" id="">我已阅读并同意<font style="color:red">会员注册协议</font> -->
                </div>
                <p class='help-block'>请先阅读会员注册协议</p>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <input type="submit" class="btn btn-default" value='立即注册' name='up' style="background-color:#ff5e06;width:300px;height:40px;color:white;font-size:20px;line-height:26px;" >
                </div>
            </div>
        </form>
    </div>
    <?php include_once "footer.html"?>
</body>
</html>