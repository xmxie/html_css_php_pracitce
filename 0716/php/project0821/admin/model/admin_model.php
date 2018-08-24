<?php
    // function getList(){
    //     $sql='select a.*,b.name FROM `admin` a,`group` b where a.`group` = b.`id`;';
    //     $re=query($sql);
    //     $data=[];
    //     while($tmp=mysqli_fetch_assoc($re)){
    //         $data[]=$tmp;
    //     }
    //     return $data;
    // }
    function getUser($begin=0,$limit=30){
        $sql="select a.*,b.name FROM `admin` a,`group` b where a.`group` = b.`id` limit $begin,$limit";
        $re=query($sql);
        $data=toAssoc($re);
        return $data;
    }
    
   
?>