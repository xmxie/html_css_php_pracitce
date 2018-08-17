<?php
    include_once "/var/www/html/html_css_php_pracitce/0716/php/web/config/config.php";
    if(!isset($_SESSION['id'])){
        tip("请先登录",HOST_URI.'controller/admin/login.php');
    }
    if(isset($_GET['exit'])){
        unset($_SESSION['id']);
        tip('','login.php');
    }
    include_once VIEW."admin/index.php";
?>