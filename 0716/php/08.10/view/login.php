
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{margin:0;padding:0;}
        .main{width: 500px;height: 200px;border:1px solid black;margin:0 auto;}
        .main p{width:100%;height:40px;text-align:center}
        .main p:last-child{text-align:center;padding-left:0px;}
    </style>
</head>
<body>
  
    <div class=main>
        <form action="" method='post'>
            <p>用户名<input type="text" name='usr'></p>
            <p>密&nbsp;&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'></p>
            <p>验证码 <input type="text" name='yzmin' style='width:50px;margin-right:20px;'>
                     <input type="text" disabled=disabled value=<?php echo $yzm;?> style='width:50px;'>
            </p>
            <p><input type="checkbox" name='rmb'>记住密码</p>
            <p><input type="submit" value="提交" name='up'></p>
            <input type="hidden" name="yzm" value=<?php echo $yzm?>>
        </form>
        
    </div>
</body>
</html>







 