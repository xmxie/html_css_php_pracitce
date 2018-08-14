<?php
    define('LINK','localhost');
    define('ROOT','root');
    define('PASSWORD','123456');
    define('DB','test0716');
    //一个辣鸡弹窗函数
    function tip($msg,$href){
        echo 
        '<script>
            alert("'.$msg.'");
            location.href="'.$href.'";
        </script>';
    }
    //连接数据库
    function linkDB(){
        $link=mysqli_connect(LINK,ROOT,PASSWORD,DB);
        return $link;
    }
    //返回一个记录数据表所有数据的数组
    function getArr(){
        $link=linkDB();
        $sql='select * from admin ';
        $result=mysqli_query($link,$sql);//获得数据
        while($tmp=mysqli_fetch_array($result)){//将数据解析存入数组
            $row[]=$tmp;
        }
        return $row;
    }
    //登录
    function login($yzm,$yzmin,$usr,$pwd,$rmb=false){
        //验证码检验
        if($yzm!=$yzmin){
            tip('验证码错误！');
            return false;
        }
        //检验错误次数
        if($_COOKIE['failTime']>=3){
            tip('您已输入错误三次，请稍后重试','');
            return false;
        }
        if($rmb){
            rmb($_POST['usr'],$_POST['pwd']);
        }else{
            unRmb();
        }
        //链接数据库
        $link=linkDB();
        $data=getArr();
        $count=count($data);
        //逐项检验
        for($i=0;$i<$count;$i++){
            if($usr==$data[$i]['user']&&$pwd==$data[$i]['password']){
                if(isset($_COOKIE['failTime'])){
                    setcookie('failTime',0,time()-3600);
                }
                $_SESSION['usr']=$usr;
                tip('登录成功!','http://localhost/html_css_php_pracitce/0716/php/08.09/frame.php');
                return 1;
            }
        }
        //登录失败，记录失败次数
        if(isset($_COOKIE['failTime'])){
            $date=time()+3600;
            setcookie('failTime',$_COOKIE['failTime']+1,$date);
            if($_COOKIE['failTime']>=2){
                tip('您已输入错误三次，请稍后重试','');
                return false;
            }
        }else{
            $date=time()+3600;
            setcookie('failTime',1,$date);
        }
        
        tip('登录失败','');
        return false;
    }
    //记住密码
    function rmb($usr,$pwd){
        // session_start();
        $_SESSION['usrRmb']=$usr;
        $_SESSION['pwdRmb']=$pwd;
    }
    function unRmb(){
        session_destroy();
    }
    //生成验证码
    function yzm(){
        $range=range('a','z');
        $yzm='';
        for($i=0;$i<4;$i++){
            $yzm=$yzm.$range[rand(0,25)];
        }
        return $yzm;
    }
    //管理列表
    function admin($admin){
        echo '<table width=360 border=1 style="margin:0 auto;">
            <tr><td>ID</td><td>用户名</td><td>密码</td><td>操作</td></tr>';
        $count=count($admin);
        for($i=0;$i<$count;$i++){
            echo '
            <tr>
                <td>'.$admin[$i]['ID'].'</td>
                <td>'.$admin[$i]['user'].'</td>
                <td>'.$admin[$i]['password'].'</td>
                <td><a href=?id='.$admin[$i]['ID'].'>删除</a>/
                    <a href=?update='.$admin[$i]['ID'].'>修改</td>
            </tr>';
        }
    }
    //删除用户
    function delete($id){
        $link=linkDB();
        $sql='delete from admin where id='.$id;
        $result=mysqli_query($link,$sql);
        if($result){
            tip('删除成功!','http://localhost/html_css_php_pracitce/0716/php/08.09/list.php');
            $result=false;
        }else{
            tip('删除失败！','http://localhost/html_css_php_pracitce/0716/php/08.09/list.php');
        }
    }
    //获得id对应用户名
    function getUsr($id){
        $link=linkDB();
        $sql='select * from admin where id='.$id;
        $result=mysqli_query($link,$sql);
        $usr=mysqli_fetch_array($result)['user'];
        if($usr){
            return $usr;
        }else{
            tip('用户不存在！','list.php');
            return 0;
        }
    }
    //获得id对应密码
    function getPwd($id){
        $link=linkDB();
        $sql='select * from admin where id='.$id;
        $result=mysqli_query($link,$sql);
        $pwd=mysqli_fetch_array($result)['password'];
        if($pwd){
            return $pwd;
        }else{
            tip('用户不存在！','list.php');
            return 0;
        }
    }
    //修改用户名及密码
    function update($id,$nusr,$npwd){
        if($nusr==''||$npwd==''){
            tip('用户名或密码不能为空！');
        }
        $link=linkDB();
        $sql="update test0716.admin set password='".$npwd."',user='".$nusr."'where admin.id=".$id;
        $result=mysqli_query($link,$sql);
        if($result){
            tip('修改成功','list.php');
        }else{
            tip('修改失败');
        }
    }
    //添加新用户
    function insert($usr,$pwd){
        if($usr==''||$pwd==''){
            tip('用户名和密码不能为空！');
        }
        $msg=getArr();
        $count=count($msg);
        for($i=0;$i<$count;$i++){
            if($usr==$msg[$i]['user']){
                tip('该用户已存在！');
            }
        }
        $link=linkDB();
        $sql='insert into admin (ID,user,password) value(NULL,"'.$usr.'","'.$pwd.'");';
        $result=mysqli_query($link,$sql);
        if($result){
            tip('添加成功');
        }else{
            tip('添加失败');
        }
    }
?>