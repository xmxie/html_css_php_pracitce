<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
        include_once("./pro/function.php");

        $filesize=200*1024;//规定最大上传大小
        $dir='./upload/';//上传文件目录
        if(isset($_POST['up'])){
            $file=$_FILES['img'];//读取上传文件
            upload($dir,$file,$filesize);
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="img"><br>
        <input type="submit" value="提交" name='up'>
    </form>
</body>
</html>
