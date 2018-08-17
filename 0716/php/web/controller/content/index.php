<?php
    include_once "../../config/config.php";
    include_once MODEL."column_model.php";
    include_once MODEL."content_model.php";
    
    $column=getColumn();
    include_once VIEW."content/index.php";
?>