<meta charset="UTF-8">
<!-- a <input type="text" value=0><br>
b <input type="text" value=1><br>
c <input type="text" value=2><br>
d <input type='text' value=3><br>
<button onclick=put()>确认</button>
<p>相等时a>b>c>d</p> -->
<?php


    $a =999;
    $b =1000;
    $c =777;
    $d=666;
    $numArr=array($a,$b,$c,$d);
    $strArr=array('a','b','c','d');
    echo'list<br>';
    echo"{{$a}}aaa<br>";
    if($a>$b){
        if($c>$a){
            echo 'c>a>b';
        } 
        else{
            if($b>$c){
            echo 'a>b>c';
            }
            else{
            echo'a>c>b'   ; 
        }
        }
    }
    else{
        if($a>$c){
            echo 'b>a>c';
        } 
        else{
            if($a>$c){
            echo 'b>a>c';
            }
            else{
            echo'b>c>a' ;   
        }
        }
    }
    for($i=0;$i<4;$i++){
        for($x=$i+1;$x<4;$x++){
            if($numArr[$i]<$numArr[$x]){
                $tmpNum=$numArr[$i];
                $tmpStr=$strArr[$i];
                $numArr[$i]=$numArr[$x];
                $strArr[$i]=$strArr[$x];
                $numArr[$x]=$tmpNum;
                $strArr[$x]=$tmpStr;
            }
        }
    }
    echo '<br>',$strArr[0],'>',$strArr[1],'>',$strArr[2],'>',$strArr[3];


    $teststr=$strArr[0].$strArr[1].$strArr[2];
    echo"<br>$teststr"
?>