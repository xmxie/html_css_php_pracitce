<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    *{margin:0;padding:0;}
    html{height:100%;}body{height:100%}
    .nav{width:15%;height:100%;border-right:1px solid black;position:relative;float:left;padding-left:2%;box-sizing:border-box;font-size:18px;}
    .nav li:first-child{margin-top:15%;}
    </style>
</head>
<body height=100%>
    <ul class=nav>
        <?php
            $path=__DIR__;
            $arr=scandir($path);
            for($i=0;$i<count($arr);$i++){
                echo '<li><a href="'.$arr[$i].'" target=iframe>'.$arr[$i].'</a></li>';  
            }
        ?>
    </ul>
    <iframe src="http://www.baidu.com" frameborder="0" width=85% height=100% style='position:absolute;left:15%;' name=iframe></iframe>
</body>
</html>