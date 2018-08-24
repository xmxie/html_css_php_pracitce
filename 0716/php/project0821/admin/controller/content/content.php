<?php
    include_once "../../config/config.php";
    include_once MODEL."column_model.php";
    include_once MODEL."content_model.php";
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        echo '<script>location.href=index.php</script>';
    }
    $content=getContentById($id);

    $column=getColumn();
    include_once VIEW."content/content.php";
?>