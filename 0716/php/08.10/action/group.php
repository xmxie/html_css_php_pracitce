<?php
    include_once "../model/admin_model.php";
    include_once "function.php";
    if(isset($_GET['update'])){
        echo '<script>location.href="editGroup.php?update='.$_GET['update'].'" </script>';
    }
    $data=getGrp();
    include_once "../view/group.php";
?>  