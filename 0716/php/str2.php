<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Str_pra</title>
</head>
<body>
    
</body>
</html>
<?php
    $str='   中国万岁 人民万岁   中国万岁   ';
    echo mb_substr(trim(str_replace(' ','',str_replace('中国','人民',$str))),0,10,"UTF-8");
    
    $str=<<<bg
    <p>this is a test text</p>
    <script>
        alert("successful");
    </script>
bg;
    echo $str;
    define('NAME','kousei');
    echo constant("NAME");
    // $str_const='change';

?>