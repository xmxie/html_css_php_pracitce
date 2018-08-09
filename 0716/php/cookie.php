<?php
    echo '<a href=cookie2.php>turn</a>';
    setcookie("test",'luffy',time()+10);
    echo $_COOKIE['test'];
    unset($_COOKIE['test']);
?>