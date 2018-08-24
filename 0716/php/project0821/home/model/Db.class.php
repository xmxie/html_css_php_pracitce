<?php
class Db{
    private $db=[];
    private $result;
    private $sql;
    private $row;
    private $coding;
    // private $table=array();

    function __construct($host,$passname,$password,$dbname,$coding){
        $this->db['host']=$host;
        $this->db['passname']=$passname;
        $this->db['password']=$password;
        $this->db['dbname']=$dbname;
        $this->db['coding']=$coding;
    }
    private function getDb(){
        return $this->db;
    }
    public function connect(){
        $db=$this->getDb();
        $link=mysqli_connect($db['host'],$db['passname'],$db['password'],$db['dbname']);
        mysqli_set_charset($link,$db['coding']);
        return $link;
    }
    public function query($sql){
        $link=$this->connect();
        $result=mysqli_query($link,$sql);
        return $result;
    }
    public function toArray($result){
        $data=[];
        while($tmp=mysqli_fetch_array($result)){
            $data[]=$tmp;
        }
        return $data;
    }
    public function toAssoc($result){
        $data=null;
        while($tmp=mysqli_fetch_assoc($result)){
            $data[]=$tmp;
        }
        return $data;
    }
    public function dbCount($table){
        $sql="select count(*) count from `$table`";
        $re=$this->query($sql);
        $tmp=mysqli_fetch_assoc($re);
        $count=$tmp['count'];
        return $count;
    }
    public function get($table='',$order='id'){
        $sql='select * from `'.$table.'` order by`'.$order.'`';
        $re=$this->query($sql);
        $data=$this->toAssoc($re);
        return $data;
    }
    public function getOne($id,$table=''){
        $sql='select * from `'.$table.'` where id='.$id;
        $re=$this->query($sql);
        $data=mysqli_fetch_assoc($re);
        return $data;
    }
    public function limitGet($table,$begin,$limit){
        $sql='select * from `'.$table.'` limit '.$begin.','.$limit;
        $re=$this->query($sql);
        $data=$this->toAssoc($re);
        return $data;
    }
    public function insert($data,$table=''){
        
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
        $re=$this->query($sql);
        return $re;
    }
    public function delete($id,$table=''){
        $link=$this->connect();
        $sql='delete from `'.$table.'` where id='.$id;
        $re=mysqli_query($link,$sql);
        return $re;
    }
    public function update($id,$data,$table=''){
        //编辑sql
        $sql="update web0716.".$table." set ";
        foreach ($data as $key => $value) {
            $sql.='`'.$key.'`="'.$value.'",';
        }
        $sql=substr($sql,0,-1);
        $sql.=' where '.$table.'.id="'.$id.'"';
        $result=$this->query($sql);
        return $result;
    }
}
class Db_Admin extends Db {
    public function __construct($host,$passname,$password,$dbname,$coding){
        parent::__construct($host,$passname,$password,$dbname,$coding);
    }
    public function getUser($begin=0,$limit=30){
        $sql="select a.*,b.name FROM `admin` a,`group` b where a.`group` = b.`id` limit $begin,$limit";
        $re=$this->query($sql);
        $data=$this->toAssoc($re);
        return $data;
    }
}

class Db_test extends Db_Admin{
    public function __construct($host,$passname,$password,$dbname,$coding){
        parent::__construct($host,$passname,$password,$dbname,$coding);
    }
}
?>