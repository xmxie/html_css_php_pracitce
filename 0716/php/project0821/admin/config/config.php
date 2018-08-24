<?php

    session_start();
    header("Content-Type:text/html; charset=UTF-8");

    define("ROOT",substr(__DIR__,0,-6));

    define("VIEW",ROOT."view/");
    define("MODEL",ROOT."model/");
    define("CONTROLLER",ROOT.'controller/');
    define("FUN",ROOT.'function/');
    
    define("HOST",'localhost');
    define("PASSNAME",'root');
    define("PASSWORD",'123456');
    define("DATABASE",'web0716');

    $project="/admin/";
    $host='http://'.$_SERVER['SERVER_NAME'].$project;

    define("HOST_URI",$host);

    include_once MODEL."model.php";
    include_once FUN.'function.php';
?>