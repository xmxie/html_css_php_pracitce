<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{margin:0;padding:0;}
        .main{width: 500px;height: 100px;border:1px solid black;margin:0 auto;margin-top:10px;}
        .main p{width:100%;height:40px;text-align:center;margin-top:10px;}
        .main p:last-child{text-align:center;padding-left:0px;}
    </style>
</head>
<body>
  
    <div class=main>
        <form action="" method='post'>
            <p>新会员组<input type="text" name='name' <?php if(isset($name)){echo 'value='.$name;}?>  ></p>
            <p><input type="submit" value="提交" name='up'></p>
        </form>
    </div>
</body>
</html>







 