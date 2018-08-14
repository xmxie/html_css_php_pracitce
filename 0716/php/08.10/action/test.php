
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    include_once "../model/admin_model.php";
    $data=getOne(14);
    echo $data['img'];
    if($data['img']){
        echo ' <img src="'.$data['img'].'" alt="">';
    }

?>
</body>
</html>