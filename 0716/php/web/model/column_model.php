<?php

    function getColumn($num=6){
        $sql="select * from `column` where `display`=1 order by `sequence` limit 0,$num";
        $re=query($sql);
        $data=toArray($re);
        return $data;
    }

    function listColumn($begin=0,$limit=30){
        $sql="select * from `column` order by `sequence` limit $begin,$limit";
        $re=query($sql);
        $data=toAssoc($re);
        return $data;
    }

    function columnName($id){
        $sql="select * from `column` where `id`=$id";
        $re=query($sql);
        $data=toAssoc($re);
        if(isset($data[0])){
            $name=$data[0]['name'];
        }else{
            return '不存在该栏目id';
        }
        return $name;
    }


?>