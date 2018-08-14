<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method='post'>
        <input type="text" name='input'>
        <input type="submit" name='sbmt' value=测试>
    </form>
    
</body>
</html>
<?php
    if(isset($_POST['sbmt'])){
        $path=$_POST['input'];
        echo $path;
        // $omsg=file_get_contents($path);
        echo '<script>alert("'.$path.'")</script>';
    }
   


?>