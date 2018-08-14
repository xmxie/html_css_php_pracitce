<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>top</title>
</head>
<body>
    <?php session_start();
    if(isset($_SESSION['usr'])){
        echo 'welcome to this system '.$_SESSION['usr'].'
              <a href="?exit=1">退出</a>';
    }
    if(isset($_GET['exit'])){
        if($_GET['exit']==1){
            unset($_SESSION['usr']);
            echo '
            <script>
                alert("退出成功");
                parent.location.href="http://localhost/html_css_php_pracitce/0716/php/08.09/login.php";
            </script>';
        }
    }
    ?>
</body>
</html>