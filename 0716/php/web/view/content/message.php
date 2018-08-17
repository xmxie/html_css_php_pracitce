<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言板</title>
    <link rel="stylesheet" href="<?=HOST_URI?>view/pro/css/global.css">
</head>
<body>
    <div id='content'>
        <?php
            include_once "header.php";
        ?>
         <div class=list_1100>
                <div class='newsMid_title' style="width:750px"><div class='title_box'>&nbsp; 留言板</div></div>
               
                <ul>
                <?php
                    for($i=0;$i<count($msg);$i++){
                        echo '<li class=messageIn><span>'.$msg[$i]['user'].' 于 '.date("Y-m-d H:i:s",$msg[$i]['time']).'</span><br><p>'.$msg[$i]['message'].'<p></li>';
                        $reply=getReply($msg[$i]['id']);
                        for($j=0;$j<count($reply);$j++){
                            echo '<li class=messageBack> <span>'.$reply[$j]['user'].' 于 '.date("Y-m-d H:i:s",$reply[$j]['time']).'</span><br><p>'.$reply[$j]['reply'].'</p></li>';
                        }
                    }
                ?>
                </ul>
                <ul class=page>
                    <a href=""><li>首页</li></a>
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
                    <a href=""><li>...</li></a>
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
                <img src="<?=HOST_URI?>view/pro/images/iwant_message_r9_c2.jpg" class=iwannaMessage_yzm><a href="">看不清？刷新</a>
                <input type="submit" value="发表留言" name='sbmt' class=iwannaMessage_push>
            </form>
            <!-- <form action="" method='post'>
            <p>用户名<input type="text" name='usr'></p>
            <p>密&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'></p>
            <p><input type="submit" value="注册" name='up'></p> -->
        </div>
        <?php include_once "footer.php";?>
    </div>
</body>
</html>
<?php

?>