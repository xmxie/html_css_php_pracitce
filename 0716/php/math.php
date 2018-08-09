<?php
    // echo pow(10,3).'<br>';
    // echo pow(10000,0.25);
    $arr=['name'=>'fred','age'=>7,'height'=>'170'];
    // foreach($arr as $key=>$value){
    //     echo $value;
    // }
    $brr=[123,456,789,101112];
    list($a,$b,$c,$d)=$brr;
    // echo $a.$b.$c.$d;
    print_r(each($arr));
    while(list($key,$val)=each($arr)){
        echo $key.'=>'.$val.'<br>';
    }
    $drr=['1','2','6','3','6','4','5','6'];
    $crr=array_unique($drr);
    print_r($crr);
    echo 'unique<br>';
    print_r(array_slice($crr,0,6,true));
    echo 'array_slice(true)<br>';
    print_r(array_slice($crr,1,5,false));
    echo 'array_slice(false)<br>';
    shuffle($crr);
    // sort($crr);
    print_r($crr);
    echo 'shuffle<br>';
    print_r(array_reverse($crr));
    echo 'reverse<br>';
    print_r($crr);
    echo 'after reverse the oragin<br>';
    array_pop($crr);
    print_r($crr);
    echo 'pop_test<br>';
    $drr=array_splice($crr,2,6);
    print_r($drr);
    echo 'array_splice without replacement<br>';
    print_r($crr);
    echo 'after array_splice origan array<br>';
    array_splice($crr,2,0,array(4,6,8,10,12,14,16));
    print_r($crr);
    function retn(){
        return $arr=[1,2,3,4,5,6];
    }
    echo '<br>';
    print_r(retn());
    function statict(){
        static $static=1;
        return $static;
        $static++;
    }
    echo statict();
    echo statict();    
?>