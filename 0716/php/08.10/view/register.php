
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
<?php $group=getGrp();?>
<body>
    <div class=main>
        <form action="" method='post' enctype='multipart/form-data'>
            <p>用户名<input type="text" name='usr'></p>
            <p>密&nbsp;&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd'></p>
            <p>
            <p>
                <?php group($group);?>
                <input type="file" name='img' >
            </p>
            <p><input type="submit" value="注册" name='up'></p>
        </form>
    </div>
</body>
</html>







 