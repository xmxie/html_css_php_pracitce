<?php

    function getContent($begin=0,$limit=30){
        $sql="select b.name,a.*  FROM `content` a,`column` b where a.`column_id` = b.`id` limit $begin,$limit;";
        $re=query($sql);
        $data=[];
        while($tmp=mysqli_fetch_assoc($re)){
            $data[]=$tmp;
        }
        return $data;
    }
    function getContentById($id){
        $sql="select b.name,a.*  FROM `content` a,`column` b where a.`column_id` = b.`id` and a.`id`='.$id'";
        $re=query($sql);
        while($tmp=mysqli_fetch_assoc($re)){
            $data=$tmp;
        }
        if(!isset($data)){
            return false;
        }
        return $data;
    }
    function getByColumn($column,$begin=0,$limit=30){
        if(is_string($column)){
            $column=trim($column);
            $sql="select `id` from `column` where name='$column'";
            $re=query($sql);
            $column=mysqli_fetch_array($re)['id'];
            echo $column;
        }
        $sql='select b.name,a.*  FROM `content` a,`column` b where a.`column_id` = b.`id` and a.`column_id`="'.$column.'"limit '.$begin.','.$limit;
        $re=query($sql);
        $data=toAssoc($re);
        return $data;
    }
    function getColumnKeyword($columnId,$keyword,$begin=0,$limit=30){
        $keyword=trim($keyword);
        $sql='select b.name,a.*  FROM `content` a,`column` b where a.`column_id` = b.`id` and a.`title` like("%'.$keyword.'%") and a.`column_id`="'.$columnId.'"limit '.$begin.','.$limit;
        $re=query($sql);
        $data=[];
        while($tmp=mysqli_fetch_assoc($re)){
            $data[]=$tmp;
        }
        return $data;
    }
    function getKeyword($keyword,$begin=0,$limit=30){
        $keyword=trim($keyword);
        $sql='select b.name,a.*  FROM `content` a,`column` b where a.`column_id` = b.`id` and a.`title` like("%'.$keyword.'%") limit '.$begin.','.$limit;
        $re=query($sql);
        $data=[];
        while($tmp=mysqli_fetch_assoc($re)){
            $data[]=$tmp;
        }
        return $data;
    }

?>