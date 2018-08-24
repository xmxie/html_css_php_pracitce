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
        *{margin:0;padding:0;}
        .article-main{width:1200px;margin: 0 auto;color: #545454;overflow: hidden;font-size:12px;}
        .nav-pills > li{background-color:#f5f5f5;height:40px;line-height:40px;font-size:18px;width:210px;text-indent: 20px;}
        .content-box{width:955px;height:350px;float:left;margin-left: 10px;border:1px solid black;}
        .content-title{width:100%;height:50px;}
        .content-main{width:100%;height:250px;}
        .content-main li{height:25px;margin-left:35px;}
        .left_nav{float:left;}
    </style>
</head>
<?php
    include_once "../model/Db.class.base.php";
    $db=new Db();
?>
<body>
    <div class="article-main">
        <div class='left_nav'>
            <ul class="nav nav-pills">
                <li>文章中心</li>
            </ul>
            <ul class="nav nav-pills nav-stacked" style="width:210px;text-indent: 20px;">
                <?php
                    $sql='select `id`,`name` from `column` where `display`=1 limit 0,6';
                    $column=$db->select($sql);
                    $ocolumn='';
                    for($i=0,$count=count($column);$i<$count;$i++){
                        $ocolumn.= '<li><a href="?id='.$column[$i]["id"].'">'.$column[$i]['name'].'</a></li>';
                    }
                    echo $ocolumn;
                ?>
            </ul>
        </div>
        <div class="content-box">
            <div class=content-title>

            </div>
            <ul class=content-main>
                <?php
                    if(isset($_GET['id'])){
                        $sql="select `title` from `content` where `column_id`=".$_GET['id']." limit 0,10";
                    }else{
                        $sql="select `title` from `content` limit 0,10";
                    }
                    $article=$db->select($sql);
                    $oarticle='';
                    for($i=0,$count=count($article);$i<$count;$i++){
                        $oarticle.='
                            <li>
                                '.$article[$i]['title'].'
                            </li>';
                    }
                    echo $oarticle;
                ?>
            </ul>
        </div>

    </div>

</body>
</html>