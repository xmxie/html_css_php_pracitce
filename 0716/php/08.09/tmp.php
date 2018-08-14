<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>弹窗 </title>
    <style>
        *{margin:0;padding:0;}
    </style>
</head>
<body>
    嘤嘤嘤
    <?php
    function tip2($content,$href){
        echo "
        <div style='background:rgba(140, 110, 66, .3);width:100%;height:700px;position:absolute;left:0;top:0;padding:1px;display:block;' id='tip'>
            <div style='background: powderblue;width:200px;height:50px;margin:auto;margin-top:200px;padding:50px;font-size: 24px;'>
                <p style='font-size:10px';>Xs后离开</p>
                ".$content."
            </div>
        </div>
        <script>
            //setTimeout('location.href=\"".$href."\"',5000);
        </script>
        ";
    }
    tip2('提示','frame.php');
?>

        <!-- <script>
            setTimeout('location.href="frame.php"',5000);
        </script> -->