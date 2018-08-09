<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>列表信息</title>
    <style>
    .tb{width:300px;border:1px solid black;text-align:center;}
    .page{text-align:right;}
    .page a{margin-right:3px;}
    .change{width:80px;display:inline-block;}
    </style>
</head>
<body>
    <form action="" method='POST'>
          <input type=text name=alter class=change>
    </form>
        <table class=tb border=1>
        <tr>
        <td>用户名</td><td>密码</td><td>操作</td></tr>
        <?php
            include_once("function.php");
            define('PATH','admin.txt');
            $str=file_get_contents(PATH);
            $msg=json_decode($str);
            $count=count($msg);
            $listNum=5;
            $pages=ceil($count/$listNum);

            //获取页码
            if(isset($_GET['page'])){
                $page=$_GET['page'];
            }else{$page=0;}
            if($page<=0){
                $page=1;
            }else if($page>=$pages){
                $page=$pages-1;
            }

            //删除
            if(isset($_GET['user'])){
                delete($_GET['user']);
                tip('删除成功','http://localhost/html_css_php_pracitce/0716/php/pro/listmsg.php?page='.$page);
            }

            //修改

        
            // $alter=$_POST['alter'];
            if(isset($_GET['alter'])){
                $alter=$_GET['alter'];
                $msg=json_decode($str);
                $count=count($msg);
                $nmsg;
                                // for($i=0;$i<$count;$i++){
                //     if($msg[$i]->user==$alter){
                //         $msg[$i]->password=$_POST['alter'];
                //     }
                //     $nmsg[]=$msg[$i];
                // }
                // $str=json_encode($nmsg);
                // file_put_contents(PATH,$str);
            }
            //页面内容
            $start=$page*$listNum+1;
            $end=($page+1)*$listNum;
            if($end>count($msg)){
                $end=count($msg)-1;
            }
            
            for($i=$start;$i<=$end;$i++){
                echo '<tr>
                        <td>'.$msg[$i]->user.'</td>
                        <td>'.$msg[$i]->password.'</td>
                    <td><a href="?user='.$msg[$i]->user.'" >删除</a>/<a href="?alter='.$msg[$i]->user.'">修改</a>&nbsp;&nbsp;
                        </td>
                    </tr>';
            }
        ?>
        <!-- 生成页码 -->
        <tr class=page>
            <td colspan='3'>
            <?php
               include_once("function.php");
               footPage($page,5);
            ?>
        </td>
        </tr>
        </table>
    <!-- </form> -->
</body>
</html>
<script>
    function alert(){
        this.parentNode.parentNode.ChildNode[1].innerHTML="<input type=text name=change class=change>"
    }
</script>
