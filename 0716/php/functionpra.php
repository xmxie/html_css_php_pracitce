<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Function</title>
</head>
<body>
    
</body>
</html>
<?php 

    $global='this is a global arg';
    function test(){
        global $global;
        echo '<p>'.$global.'</p>';
    }
    test();
    function plus($num1=0,$num2){
        return $num1+$num2;
    }

    $num1=1;
    $num2=10;
    // echo plus($num1,$num2);
    // function plusArr($num=[]){
    //     $result=0;
    //     echo count($num);
    //     for($i=0;$i<count($num);$i++){
    //         // $result=$result+$num[$i];
    //         echo $num[$i];
    //     }
    //     return $result;
    // }
    // plusArr($num1,$num2,1,2,3,4);

    $str1='abcdefghijklmn';
    $str2='opqrstuvwxyz';
    function show($str){
        $len=strlen($str)-1;
        // $result='';
        for($i=$len;$i>=0;$i--){
            $result=$result.$str[$i];
        }
        echo $result.'<br>';
    }
    echo show($str1);
    echo show($str2);
?>