<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言板</title>
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
    <div id='content'>
        <div id='head'>
            <img id='head_img' src="./images/top_r1_c1.jpg" alt="">
            <p style='display:<?php if(isset($_COOKIE['usr'])){echo 'none';}else{echo 'inline';}?>'>游客你好！您还没有
                <a href="login.php">登录</a>，若您不是会员请先免费<a href="register.php">注册</a></p>
            <p style='text-align:right;display:<?php if(isset($_COOKIE['usr'])){echo 'inline';}else{echo 'none';}?>'>
                用户<?php if(isset($_COOKIE['usr'])){echo $_COOKIE['usr'];}?>你好！</p>
            <ul id='head_ioc'>
                <li id='ioc_1'><a href="message.php">留言板</a></li>
                <li id='ioc_2'><a href="">订阅</a></li>
                <li id='ioc_3'><a href="">加入收藏</a></li>
                <li id='ioc_4'><a href="">论坛</a></li>
                <li id='ioc_5'><a href="">English</a></li>
            </ul>
            <ul id='nav'>
                <a href=""><li>关于分会</li></a>
                <a href=""><li>行业动态</li></a>
                <a href=""><li>学术交流</li></a>
                <a href=""><li>业务合作</li></a>
                <a href=""><li>历届年会</li></a>
                <a href=""><li>会员之家</li></a>
                <input type="text" class=nav_input>
            </ul>
        </div>
         <div class=list_1100>
                <div class='newsMid_title' style="width:750px"><div class='title_box'>&nbsp; 留言板</div></div>
               
                <ul>
                <?php
                    include("function.php");
                    define("PATH",'msg.txt');
                    msgRead(PATH,14,'page');
                ?>
                 <!--    <li class=messageIn><span>time</span><br><p>这里有一条留言<p></li>
                    <li class=messageBack> <span>time</span><br><p>这里有一条回复</p></li>
                    <li class=messageIn><span>time</span><br><p>这里有一条留言<p></li>
                    <li class=messageBack> <span>time</span><br><p>这里有一条回复</p></li>
                    <li class=messageIn><span>time</span><br><p>这里有一条留言<p></li>
                    <li class=messageBack> <span>time</span><br><p>这里有一条回复</p></li>
                    <li class=messageIn><span>time</span><br><p>这里有一条留言<p></li>
                    <li class=messageBack> <span>time</span><br><p>这里有一条回复</p></li>
                    <li class=messageIn><span>time</span><br><p>这里有一条留言<p></li>
                    <li class=messageBack> <span>time</span><br><p>这里有一条回复</p></li>
                    <li class=messageIn><span>time</span><br><p>这里有一条留言<p></li>
                    <li class=messageBack> <span>time</span><br><p>这里有一条回复</p></li>
                    <li class=messageIn><span>time</span><br><p>这里有一条留言<p></li>
                    <li class=messageBack> <span>time</span><br><p>这里有一条回复</p></li> -->
                </ul>
                <ul class=page>
                    <?php
                        $link=mysqli_connect('localhost','root','123456','test0716');
                        if(!$link){
                            die("can't link database");
                        }
                        $sql='select * from msg';
                        $result=mysqli_query($link,$sql);
                        $msg;
                        while($tmp=mysqli_fetch_array($result)){
                            $msg=$tmp['msg'];
                        }
                        footPage($msg,14);
                    ?>
                    <!-- <a href=""><li>首页</li></a>
                    <a href=""><li>上一页</li></a>
                    <a href=""><li>1</li></a>
                    <a href=""><li>2</li></a>
                    <a href=""><li>3</li></a>
                    <a href=""><li>4</li></a>
                    <a href=""><li>5</li></a>
                    <a href=""><li>6</li></a>
                    <a href=""><li>7</li></a>
                    <a href=""><li>8</li></a>
                    <a href=""><li>下一页</li></a>
                    <a href=""><li>尾页</li></a>
                    <a href=""><li>...</li></a> -->
                </ul>
        </div>
        <div class=iwannaMessage>
            <div class=newsLeft_title style="width:220px; background-size:210px 40px;">我要留言 <a href="" class=news_more></a></div>
            <form action="" method="post" >
                <!-- <input type="text" name='test' > -->
                <textarea name="msg" id="" cols="30" rows="10" class=iwannaMessage_input1 placeholder='内容'></textarea>
                <input type="text" class=iwannaMessage_input2 placeholder=邮箱>
                <input type="text" class=iwannaMessage_input2 placeholder=QQ>
                <input type="text" class=iwannaMessage_input2 placeholder=电话>
                <input name='yzm' type="text" class=iwannaMessage_input2 placeholder=验证码>
                <img src="./images/iwant_message_r9_c2.jpg" class=iwannaMessage_yzm><a href="">看不清？刷新</a>
                <input type="submit" value="发表留言" name='sbmt' class=iwannaMessage_push></div></a>
            </form>
            <!-- <form action="" method='post'>
            <p>用户名<input type="text" name='usr'></p>
            <p>密&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'></p>
            <p><input type="submit" value="注册" name='up'></p> -->
        </form>
        </div>
</body>
</html>
<?php

    if(isset($_POST['sbmt'])){
        if(isset($_COOKIE['usr'])){
            if($_POST['yzm']=='takakvp'){
                leaveMsg(PATH,$_COOKIE['usr'],'msg');
            }else{
                tip('验证码错误！');
            }
        }else{
            tip('请登录后留言！','login.php');
        }
    }
?>