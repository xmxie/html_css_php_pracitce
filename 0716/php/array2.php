<meta charset='utf-8'>
<?php
    $arr=[
        ['name'=>'king','goal'=>10,'time'=>120],
        ['name'=>'king','goal'=>10,'time'=>120],
        ['name'=>'king','goal'=>10,'time'=>120],
        ['name'=>'king','goal'=>10,'time'=>120],
        ['name'=>'king','goal'=>10,'time'=>120]

    ];
   for($i=0;$i<count($arr);$i++){
       foreach($arr[$i] as $key=>$val){
           echo $key.'————'.$val.'<br>';
       }
   }

   echo(json_encode($arr));
   $str='{"name":"king","goal":10,"time":120}';
   $tmp=json_decode($str);
   echo $tmp->goal;
?>