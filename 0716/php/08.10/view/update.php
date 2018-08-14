
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{margin:0;padding:0;}
        .main{width: 500px;height: 250px;border:1px solid black;margin:0 auto;margin-top:100px;}
        .main p{width:100%;height:40px;text-align:center}
        .main p:first-child{margin-top:40px;}
        .main p:last-child{text-align:center;padding-left:0px;}
    </style>
    <?php $group=getGrp();?>
</head>
<body>
  
    <div class=main>
        <form action="" method='post' enctype="multipart/form-data">
            <p>用户名<input type="text" name='usr' value=<?php echo $preusr?>></p>
            <p>密&nbsp;&nbsp;&nbsp;&nbsp;码<input type="password" name='pwd' ></p>
            <p>
                <?php group($group);?>
            </p>
            <p>头像<input type="file" name='img' ></p>
            <p><input type="submit" value="确认" name='up'></p>
        </form>
        
    </div>
</body>
</html>







 