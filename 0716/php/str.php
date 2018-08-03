<?php
    echo "<!DOCTYPE html><meta charset='UTF-8'>";

    $href='http://www.baidu.com';
    $name='百度';
    $str="<a href=\"$href\">$name</a><br>";
    $str2='<a href="'.$href.'">'.$name.'</a>';
    echo $str;
    echo $str2;
    $a='b';
    $b='c';
    // $c='<br>something like this';
    echo $$$a;
    $alaph='abcdefg hijklmnopqrstuvwxyz>rb<';
    $alaph2='zyxwvutsrqponmlkjih gfedcba';
    $len=strlen($alaph)-1;
    for($c=$len;$c>=0;$c--){
        echo $alaph[$c];
    }
    for($c=$len;$c>0;$c--){
        if($alaph[$c]!=' '){
        echo $alaph[$c];}
        else{$c=0;}
    }
    echo ' ';
    for($c=0;$c<$len;$c++){
        if($alaph[$c]!=' '){
        echo $alaph[$c];}
        else{$c=$len;}
    }
    echo'<br>';
    for($c=0;$c<$len;$c++){
        echo $alaph[$c].$alaph2[$c];
    }
    $black="<td style='background:black'>";
    $white="<td style='background:white'>";
    echo'<table width=500px height=500px border=1 cellspacing=0 cellpadding=0>';
    for($c=0;$c<=10;$c++){
        echo '<tr>';
        if($c%2==0){
            for($cc=0;$cc<5;$cc++){
                echo $black.$white;
            }
        }
        else{
            for($cc=0;$cc<5;$cc++){
                echo $white.$black;
            }
        }
        echo'</tr>';
    }
    echo '</table>';
?>