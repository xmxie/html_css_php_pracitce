<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    a{display:block}
    </style>
</head>
<body>
</body>
</html>
<?php
    $arr=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18];
   
   function pages($arr,$pageNum=5){
        $conLen=count($arr);
        $pages=ceil($conLen/$pageNum);
        //输出内容
        if(isset($_GET['page'])){
            $page=$_GET['page'];
            echo $page.'<br>';
        }else{
            $page=1;
        }
        $start=$pageNum*($page-1);
        $end=$pageNum*$page;
        if($end>$conLen){
            $end=count($arr);
        }
        for($i=$start;$i<$end;$i++){
            echo $arr[$i].'<br>';
        }
    
        //上下页
        $last=$page-1;
        $next=$page+1;
        if($last<1){
            $last=$page;
        }
        if($next>$pages+1){
            $next=$page;
        }
    
        //显示超链接
        echo '<a href="?page='.$last.'">last page</a>';
        for($i=1;$i<=round($pages);$i++){
            echo '<a href="?page='.$i.'">page'.$i.'</a>';
        }
        echo '<a href="?page='.$next.'">next page</a>';
    }

    pages($arr,5);
   
    
?>