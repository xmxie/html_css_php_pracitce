<?php
    include_once "../../config/config.php";  
    include_once "../../model/message_model.php";  
    $table='message';
    if(isset($_GET['delete'])){              //删除
        delete($_GET['delete'],'message');
    }
    if(isset($_GET['reply'])){              //跳转留言
        echo '<script>location.href="add_reply.php?reply='.$_GET['reply'].'"</script>';
    }
    if(isset($_GET['page'])){                //获取页码
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $pageSize=10;
    include_once VIEW."admin/book.php";
?>