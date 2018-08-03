<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Array</title>
</head>
<body>
    
</body>
</html>
<?php
    $arr=[111,222,333,444];
    array_push($arr,555,777,888,999);
    $arr[]=666;
    //遍历数组
    function Travesal(&$arr,&$dimen=[]){
        for($i=0;$i<count($arr);$i++){
            if(is_array($arr[$i])){
                array_push($dimen,$i);
                Travesal($arr[$i],$dimen);
                unset($dimen);
                $dimen=[];
            }
            else{            
                echo 'arr';
                for($j=0;isset($dimen[$j]);$j++){
                    echo '['.$dimen[0].']';
                }
                echo '['.$i.']='.$arr[$i].'<br>';
            }
        }
    }
    $arrt=[1,2,[[1,2,3],[4,5,6],[7,8,9]],['30','31'],[4,5,6]];
    $arrt2=[[1,2,3],2,['200','201'],'210','220'];
    Travesal($arrt);
    Travesal($arrt2);
    //数组均值
    function Avg(&$arr){
        for($i=0,$avg=0;$i<count($arr);$i++){
            $avg=$avg*$i/($i+1)+$arr[$i]/($i+1);
            if($i==count($arr)-1){
                echo '<br>Avg='.$avg;
            }
        }
    }
    //数组最大值（max已被命名且不能重载）
    function smax($arr){
        $max=$arr[0];
        for($i=1;$i<count($arr);$i++){
            if($arr[$i]>$max){
                $max=$arr[$i];
            }
        }
        return $max;
    }
    //数组最大值（max已被命名且不能重载）
    function smin($arr){
        $min=$arr[0];
        for($i=1;$i<count($arr);$i++){
            if($arr[$i]<$min){
                $min=$arr[$i];
            }
        }
        return $min;
    }


    Travesal($arr);
    Avg($arr);
    echo '<br>Max='.smax($arr);
    echo '<br>Min='.smin($arr);


    // sort($arr);
    // 选择排序
    function ssort(&$arr){
        $len=count($arr);
        for($i=0;$i<$len;$i++){
            $minIndex=$i;
            for($j=$i;$j<$len;$j++){
                if($arr[$minIndex]>$arr[$j]){
                   $minIndex=$j;
                }
                $tmp=$arr[$minIndex];
                $arr[$minIndex]=$arr[$i];
                $arr[$i]=$tmp;
            }
        }
    }
    // 冒泡排序
    function bsort(&$arr){
        $len=count($arr);
        for($i=0;$i<$len;$i++){
            for($j=$len-1;$j>0;$j--){
                if($arr[$j]<$arr[$j-1]){
                    $tmp=$arr[$j];
                    $arr[$j]=$arr[$j-1];
                    $arr[$j-1]=$tmp;
                }
            }
        }
    }
    //插入排序
    // function isort(&$arr){
    //     $len=count($arr);
    //     for($i=0;$i<$len;$i++){
    //         for($j=$i,$k=$i+1;$j<$len;$j--){
    //             if($arr[$k]>$arr[$j]){
    //                 $arr[$]
    //             }
    //         }
    //     }
    // }

    function merge(&$arr1,&$arr2){
        $arr=[];
        $len1=count($arr1);
        $len2=count($arr2);
        // $len=max($len1,$len2);
        for($i=0;$i<$len1;$i++){
                $arr[]=$arr1[$i];
            if($i==0){
                for($j=0;$j<$len2;$j++){
                    $arr[]=$arr2[$j];
                }
            }
        }
        return $arr;
    }
    function ssplit(&$arr){
        $arr1=[];
        $arr2=[];
        for($i=0;$i<3;$i++){
            $arr1[]=$arr[$i];
        }
        for($i=3;$i<count($arr);$i++){
            $arr2[]=$arr[$i];
        }
        return $arrA=[$arr1,$arr2];
    }

    ssort($arr);
    // bsort($arr);
    echo '<br>';
    print_r($arr);
    // echo '<br>'.max('abcdefghi','abc',0.1);

    $arr1=[1,2,3];
    $arr2=[4,5,6];
    echo '<br>';
    print_r(merge($arr1,$arr2));

    echo '<br>';
    print_r(ssplit(merge($arr1,$arr2)));
?>