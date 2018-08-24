<?php
    include_once "../../admin/config/config.php";
    include_once "../../admin/model/model.php";    
    include_once "../../admin/model/column_model.php";
    include_once "../../admin/model/content_model.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../public/Font-Awesome-3.2.1/css/font-awesome.css">
    <style>
        *{box-sizing:content-box;margin:0;padding:0;}
        .nav-pills > li{background-color:#f5f5f5}
        .floatleft{float:left;}
    </style>
</head>
<body>
    <ul class="nav nav-pills nav-stacked floatleft" style="width:200px;">
        <?php
            $column=getColumn(6);
            $ocolumn='';
            for($i=0,$count=count($column);$i<$count;$i++){
                $ocolumn.= '<li><a href="?id='.$column[$i]["id"].'">'.$column[$i]['name'].'</a></li>';
            }
            echo $ocolumn;
        ?>
    </ul>
    <div class=container style="width:700px;float:left;background:pink;">
        <?php
            if(isset($_GET['id'])){
                $article=getByColumn(intval($_GET['id']));
            }else{
                $article=limitGet('content',0,10);
            }
            $oarticle='';
            for($i=0,$count=count($article);$i<$count;$i++){
                $oarticle.='
                    <div class=row>
                        '.$article[$i]['title'].'
                    </div>';
            }
            echo $oarticle;
        ?>
    </div>

</body>
</html>