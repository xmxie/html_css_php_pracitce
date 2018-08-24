<?php
    // header("content-type:text/html;charset=utf-8");
    // $score=[60,70,80,90];
    // $student=['a','b','c','d'];
    // $tmp='';
    // for ($i=0,$count=count($student); $i <$count ; $i++) { 
    //     $tmp.= '学生 '.$student[$i].' 成绩'.$score[$i].'分<br>';
    // }
    // echo $tmp;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .main{width:960px;height:100px;font-size:12px;border:1px solid black;}
        .main li{margin:6px 0;list-style:none;}
        .main li a{color:#333;text-decoration:none;}
        .main li a:hover{color:#970005;text-decoration:underline;}
        .main li em{float:right;margin-right:5px;}
        .nav{width:960px;height:38px;}
        .nav li{width:117px;height:36px;line-height:36px;text-align:center;border:1px solid black;border-right:none;float:left;list-style:none;margin:0;padding:0;}
        .nav li:last-child{border:1px solid black;}
    </style>
</head>
<body>
    <?php   //静态显示单个
        // $rows=[
        //     [1,'网上订蛋糕业务让蛋糕店锦上添花','2013-07-16','热门活动'],
        //     [2,'实体蛋糕店开始推出网络订购业务','2013-07-16','热门活动'],
        //     [3,'生日蛋糕网上购买更方便','2013-07-16','最新动态'],
        //     [4,'网络时代网上订蛋糕更方便','2013-07-16','最新动态'],
        // ];
        // function listnews($rows){
        //     $str='<ul class=main>';
        //     for($i=0,$count=count($rows);$i<$count;$i++){
        //         $str.='<li><a href="?id='.$rows[$i][0].'">'.$rows[$i][1].'</a><em>'.$rows[$i][2].'</em></li>';
        //     }
        //     $str.='</ul>';
        //     return $str;
        // }
        // echo listnews($rows);
    ?>
    <?php   //静态显示批量
         $title=['热门活动','最新动态','行业新闻','红酒知识'];
         $cnt=[
            [1,'网上订蛋糕业务让蛋糕店锦上添花','2013-07-16','热门活动',0],
            [2,'实体蛋糕店开始推出网络订购业务','2013-07-16','热门活动',0],
            [3,'生日蛋糕网上购买更方便','2013-07-16','最新动态',1],
            [4,'网络时代网上订蛋糕更方便','2013-07-16','最新动态',1],
            [5,'网上订蛋糕业务让蛋糕店锦上添花','2013-07-16','行业新闻',2],
            [6,'实体蛋糕店开始推出网络订购业务','2013-07-16','行业新闻',2],
            [7,'生日蛋糕网上购买更方便','2013-07-16','红酒知识',3],
            [8,'网络时代网上订蛋糕更方便','2013-07-16','红酒知识',3]
        ];
        $msg=[
                ['type'=>'热门活动','cnt'=>[
                        [1,'网上订蛋糕业务让蛋糕店锦上添花','2013-07-16','热门活动'],
                        [2,'实体蛋糕店开始推出网络订购业务','2013-07-16','热门活动']
                    ]
                ],
                ['type'=>'最新动态','cnt'=>[
                        [3,'生日蛋糕网上购买更方便','2013-07-16','最新动态'],
                        [4,'网络时代网上订蛋糕更方便','2013-07-16','最新动态'],
                    ]
                ],
                ['type'=>'行业新闻','cnt'=>[
                        [5,'网上订蛋糕业务让蛋糕店锦上添花','2013-07-16','行业新闻'],
                        [6,'实体蛋糕店开始推出网络订购业务','2013-07-16','行业新闻']
                    ]   
                ],
                ['type'=>'红酒知识','cnt'=>[
                        [7,'生日蛋糕网上购买更方便','2013-07-16','红酒知识'],
                        [8,'网络时代网上订蛋糕更方便','2013-07-16','红酒知识']
                    ]
                ]
            ];
        function showmsg4d($msg){                 //four demension
            $str='';
            foreach ($msg as $row) {
                $str.=$row['type'].'<br><ul class=main>';
                foreach($row['cnt'] as $row){
                    $str.='<li><a href="?id='.$row[0].'">'.$row[1].'</a><em>'.$row[2].'</em></li>';
                }
                $str.='</ul>';
            }
            return $str;
        }
        function showmsg2d($title,$cnt){
            $count=count($title);
            $str='';
            for($i=0;$i<$count;$i++){
                $str.=$title[$i].'<br><ul class=main>';
                foreach($cnt as $row){
                    if($row[3]==$title[$i]){
                    $str.='<li><a href="?id='.$row[0].'">'.$row[1].'</a><em>'.$row[2].'</em></li>';
                    }
                }
                $str.='</ul>';
            }
            return $str;
        }
        echo showmsg4d($msg);
        echo showmsg2d($title,$cnt);
    ?>
    <?php   //简单动态显示
        function listNav($title){
            $count=count($title);
            $str='<ul>';
            for ($i=0;$i<$count;$i++) { 
                $str.='<li><a href=?id='.$i.'>'.$title[$i].'</li>';
            }
            $str.='</ul>';
            return $str;
        }
        function listCnt($id,$cnt){
            $str= '<ul>';
            foreach($cnt as $row){
                if($row[4]==$id){
                    $str.='<li><a href="?id='.$row[0].'">'.$row[1].'</a><em>'.$row[2].'</em></li>';
                }
            }
            $str.='</ul>';
            return $str;
        }
    ?>
    <form action="" method="post">
        <div class=nav>
            <?=listNav($title)?>
        </div>
        <div class=main>
            <?php
                if(isset($_GET['id'])){
                   echo listCnt($_GET['id'],$cnt);
                }else{
                   echo listCnt(0,$cnt);
                }
            ?>
        </div>
    </form>
</body>
</html>