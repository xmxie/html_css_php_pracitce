<?php
    include_once "../model/admin_model.php";
    include_once "../function/function.php";
    if(isset($_GET['delete'])){
        deleteMsg($_GET['delete']);
    }
    if(isset($_GET['repeat'])){
        echo '<script>location.href="repeat.php?repeat='.$_GET['repeat'].'"</script>';
    }
    $data=getMsg();
    include_once "../view/mod/book.php";
?>