<?php
    include_once "../../config/config.php";
    include_once MODEL."message_model.php";
    include_once MODEL."reply_model.php";
    include_once MODEL."column_model.php";
    $column=getColumn();
    $msg=getMessage();

    include_once VIEW."content/message.php";
?>