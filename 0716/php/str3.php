<?php
    $str="ava sdc df ad";
    $arr=explode(' ',$str);    
    $arr2=str_split($str,4);
    $arr3=['avc','def','ghi'];
    $str2=implode('_',$arr3);
    print_r($arr);
    print_r($arr2);
    echo $str2;
    $path='test.txt';
    $strOrg=file_get_contents($path);
    $strAdd="this is a string for add\n";
    file_put_contents($path,$strOrg.$strAdd);
    echo file_get_contents($path);
?>