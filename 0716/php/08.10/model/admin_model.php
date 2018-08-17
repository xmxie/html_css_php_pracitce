<?php
    $link='';
    //数据库连接
    function linkdb(){
        global $link;
        $link=mysqli_connect("localhost",'root','123456','web0716');
        return $link;
    }
    //读取数据
    function get($sql){
        $link=linkdb();
        mysqli_set_charset($link,'utf8');
        $result=mysqli_query($link,$sql);
        $row=null;
        while($tmp=mysqli_fetch_assoc($result)){
            $row[]=$tmp;
        }
        return $row;
    }
    function getdt(){
        // $sql='select * from admin';
        // $result=mysqli_query($link,$sql);
        $sql='select a.*,b.name FROM `admin` a,`group` b where a.`group` = b.`id`;';
        return get($sql);
    }
    function getGrp(){
        $link=linkdb();
        mysqli_set_charset($link,'utf8');
        $sql='select * from `group`';
        // return get($sql);
        $result=mysqli_query($link,$sql);
        $row=null;
        while($tmp=mysqli_fetch_assoc($result)){
            $row[]=$tmp;
        }
        return $row;
    }
    function getMsg(){
        $sql='select * from `message`';
        return get($sql);
    }
    //添加数据
    function baseinsert($data,$table){
        $link=linkdb();
        $sql='insert into `'.$table.'` (ID,';
        foreach ($data as $key => $value) {
            $sql.='`'.$key.'`,';
        }
        $sql=substr($sql,0,-1);
        $sql.=') value("",';
        foreach ($data as $key => $value) {
            $sql.='"'.$value.'",';
        }
      
        $sql=substr($sql,0,-1);
        $sql.=');';
        // echo $sql;
        $re=mysqli_query($link,$sql);
        return $re;
    }
    function insert($data){
        $img=&$data['img'];
        return baseinsert($data,'admin');
    }
    function insertGrp($data){
        return baseinsert($data,'group');
    }
    function insertRpt($data){
        return baseinsert($data,'repeat');
    }


    //删除
    function basedelete($id,$table){
        $link=linkdb();
        $sql='delete from `'.$table.'` where id='.$id;
        $re=mysqli_query($link,$sql);
        return $re;
    }
    function delete($id){
        return basedelete($id,'admin');
    }
    function deleteMsg($id){
        return basedelete($id,'message');
    }

    //读取某一个id的信息
    function getOne($id){
        $link=linkdb();
        $sql='select * from `admin` where id='.$id;
        $re=mysqli_query($link,$sql);
        $data=mysqli_fetch_assoc($re);
        return $data;
    }
    function getAGrp($id){
        $link=linkdb();
        mysqli_set_charset($link,'utf8');
        $sql='select * from `group` where id='.$id;
        $re=mysqli_query($link,$sql);
        $data=mysqli_fetch_assoc($re);
        return $data;
    }
    //修改某一个用户的信息
    function update($id,$data,$table){
        $link=linkdb();
        //编辑sql
        $sql="update web0716.".$table." set ";
        foreach ($data as $key => $value) {
            $sql.='`'.$key.'`="'.$value.'",';
        }
        $sql=substr($sql,0,-1);
        $sql.=' where '.$table.'.id="'.$id.'"';
        $result=mysqli_query($link,$sql);
        if($result){
            tip('修改成功','list.php');
            return true;
        }else{
            tip('修改失败');
            return false;
        }
    }

    
?>