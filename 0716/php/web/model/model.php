<?php
    function links(){
        $link=mysqli_connect(HOST,PASSNAME,PASSWORD,DATABASE);
        mysqli_set_charset($link,'utf8');
        return $link;
    }
    function query($sql){
        $link=links();
        $result=mysqli_query($link,$sql);
        return $result;
    }
    function toArray($result){
        $data=[];
        while($tmp=mysqli_fetch_array($result)){
            $data[]=$tmp;
        }
        return $data;
    }
    function toAssoc($result){
        $data=[];
        while($tmp=mysqli_fetch_assoc($result)){
            $data[]=$tmp;
        }
        return $data;
    }
    function dbCount($table){
        $sql='select count(*) count from `'.$table.'`';
        $re=query($sql);
        $tmp=mysqli_fetch_assoc($re);
        $count=$tmp['count'];
        return $count;
    }
    function get($table='',$order='id'){
        $sql='select * from `'.$table.'` order by`'.$order.'`';
        $re=query($sql);
        $data=toAssoc($re);
        return $data;
    }
    function getOne($id,$table=''){
        $sql='select * from `'.$table.'` where id='.$id;
        $re=query($sql);
        $data=mysqli_fetch_assoc($re);
        return $data;
    }
    function limitGet($table,$begin,$limit){
        $sql='select * from `'.$table.'` limit '.$begin.','.$limit;
        $re=query($sql);
        $data=toAssoc($re);
        return $data;
    }
    function insert($data,$table=''){
        
        $sql='insert into `'.$table.'` (`id`,';
        foreach($data as $key=>$value){
            $sql.='`'.$key.'`,';
        }
        $sql=substr($sql,0,-1).') value("",';
        foreach($data as $key=>$value){
            $sql.='"'.$value.'",';
        }
        $sql=substr($sql,0,-1);
        $sql.=');';
        $re=query($sql);
        return $re;
    }
    function delete($id,$table=''){
        $link=links();
        $sql='delete from `'.$table.'` where id='.$id;
        $re=mysqli_query($link,$sql);
        return $re;
    }
    function update($id,$data,$table=''){
        //编辑sql
        $sql="update web0716.".$table." set ";
        foreach ($data as $key => $value) {
            $sql.='`'.$key.'`="'.$value.'",';
        }
        $sql=substr($sql,0,-1);
        $sql.=' where '.$table.'.id="'.$id.'"';
        $result=query($sql);
        return $result;
    }



?>