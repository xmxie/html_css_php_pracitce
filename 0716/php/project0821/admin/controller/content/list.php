<?php
    include_once "../../config/config.php";
    include_once MODEL."column_model.php";
    include_once MODEL."content_model.php";

    $column=getColumn();
    $content=getByColumn($_GET['column_id']);
    include_once VIEW."content/list.php";
?>