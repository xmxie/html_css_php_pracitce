<?php
class Db{
    private $host;
    private $passname;
    private $password;
    private $db_database;
    private $conn;
    private $sql;
    private $res;
    public function __construct($host,$passname,$password,$db_database,$coding){
        $conf=include(__DIR__."/config.php");
        $this->host=$conf['host'];
        $this->passname=$conf['user'];
        $this->password=$conf['password'];
        $this->db_database=$conf['db'];
        $this->coding=$coding;
        $this->connect();    
    }
    public function connect(){
        $this->conn=mysqli_connect($this->host,$this->passname,$this->password);
        mysqli_select_db($this->conn,$this->db_database);
        mysqli_query($this->conn,"set names $this->coding");
        return $this->conn;
    }
    public function query(){
        if($this->sql==''){
            return false;
        }
        $this->res=mysqli_query($this->conn,$this->sql);
        return $this->affect_rows();
    }
    public function affect_rows(){
        if($this->res){
            return mysqli_affected_rows($this->conn);
        }else{
            return false;
        }
    }
    //选择全部
    public function select($table){
        $this->sql="select * from $table";
        $this->query();
        $rows=null;
        if($this->res){
            while($row=mysqli_fetch_array($this->res)){
                $rows[]=$row;
            }
        }
        return $rows;
    }
    //更新数据
    public function update($table,$sql){
        $this->sql=$sql;
        return $this->query();
    }
    //添加数据
    public function insert($table,$sql){
        $this->sql=$sql;
        return $this->query();
    }
    //删除数据
    public function delete($table,$sql){
        $this->sql=$sql;
        return $this->query();
    }
    public function __Destruct(){
        if($this->conn){
            mysqli_close($this->conn);
        }
    }

    /**
     * ××××的方法
     * @acess public 
     * @param mixed $msg 提示信息
     * @param string $url跳转的url地址
     * @return void;
     */
}
$db=new Db("127.0.0.1",'root','123456','web0716','utf8');
$insert="insert into `admin` (`id`,`user`,`password`,`settime`) value('','insert','password','".time()."')";
$update="update `admin` set(`user`='update',`password`='654321',`settime`='".time()."') where `admin`.`id`=66";
echo $update;
$delete="delete 'admin' where `id`=66";
// echo $db->insert('admin',$insert).'<br>';
echo $db->update('admin',$update).'<br>';
// echo $db->delete('admin',60).'<br>';
var_dump($db->select('admin'));
?>