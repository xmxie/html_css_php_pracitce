<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>列表信息</title>
</head>
<body>

<?php
    include_once('function.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        delete($id);
    }
    if(isset($_GET['update'])){
        echo '<script>location.href="update.php?update='.$_GET['update'].'"</script>';
    }
    $admin=getArr();
    admin($admin);
   
?>
</table>
</body>
</html>