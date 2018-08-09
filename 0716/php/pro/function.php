<?php
     function tip($msg,$href=''){
        echo  '<script>alert("'.$msg.'");
                location.href="'.$href.'"
                </script>';
    }
   
    function login($usr,$pwd){
        // $path='admin.txt';
        // $str=file_get_contents($path);
        // $msg=json_decode($str);
        // $count=count($msg);

        $link=mysqli_connect('localhost','root','123456','test0716');//连接数据库
        if(!$link){
            die("can't connect database");
        }

        if(isset($_COOKIE['failTime'])){
            if($_COOKIE['failTime']>=2){
                tip("已输入错误密码3次！请稍后重试！");
            }
        }

        if(isset($_POST['rmb'])){
            $date=time()+3600;
            setcookie('usrRmb',$_POST['usr'],$date);
            setcookie('pwdRmb',$_POST['pwd'],$date);
        }else{
            $date=time()-3600;
            setcookie('usrRmb',$_POST['usr'],$date);
            setcookie('pwdRmb',$_POST['pwd'],$date);
        }

        $sql="select * from  `admin`";
        $result=mysqli_query($link,$sql);//读取数据库信息
        while($row=mysqli_fetch_array($result)){//检验账号密码
            if($row['user']==$usr&&$row['password']==$pwd){
                setcookie('usr',$usr,time()+3600);
                tip('登录成功！','message.php');
                return 1;
            }
        }

        if(isset($_COOKIE['failTime'])){//登录失败次数记录
            $date=time()+60*15;
            if($_COOKIE['failTime']<3){
            setcookie("failTime",$_COOKIE['failTime']+1,$date);
            }
        }else{
            $date=time()+60*15;
            setcookie("failTime",1,$date);
        }
        tip('登录失败','');
        return 0;

        //调用文件（旧版）  
        // for($i=0;$i<$count;$i++){
        //     if($usr==$msg[$i]->user&&$pwd==$msg[$i]->password)
        //     {
        //         setcookie('usr',$usr,time()+3600);
        //         tip('登录成功','message.php');
        //         break;
        //     }
        //     else if($i==$count-1){
        //         if(isset($_COOKIE['failTime'])){
        //             $date=time()+60*15;
        //             if($_COOKIE['failTime']<3){
        //             setcookie("failTime",$_COOKIE['failTime']+1,$date);
        //             }
        //         }else{
        //             $date=time()+60*15;
        //             setcookie("failTime",1,$date);
        //         }
        //     }
        // }
        
        // tip('登录失败','');
    }
    function register($usr,$pwd,$pwd2){

        $link=mysqli_connect('localhost','root','123456','test0716');//连接数据库
        if($usr==''||$pwd==''||$pwd2==''){
            tip('请完善信息！');
            return 0;
        }
        if($pwd!=$pwd2){
            tip("两次密码不一致！");
            return 0;
        }
        $sql="select * from  `admin`";
        $result=mysqli_query($link,$sql);//读取数据库信息
        while($row=mysqli_fetch_array($result)){//检验账号是否被注册
            if($row['user']==$usr){
                tip('该账号已注册！');
                return 0;
            }
        }
        $add="insert into  `test0716`.`admin` (`ID` ,`user` , `password` )values (NULL ,  '".$usr."',  '".$pwd."');";//将新账号加入数据库
        $result=mysqli_query($link,$add);
        if($result){
            tip("注册成功！",'message.php');
        }


        //调用文件（旧版）
        // $path='admin.txt';
        // $str=trim(file_get_contents($path));
        // $msg=json_decode($str);
        // $count=count($msg)-1;
        // $tmp['user']=$usr;
        // $tmp['password']=$pwd;
    //     for($i=0;$i<=$count;$i++){
    //         if($tmp['user']==trim($msg[$i]->user)){
    //             tip('该账号已注册！');
    //             break;
    //         }
    //         else if($i==$count){
    //             $newData=json_encode($tmp);
    //             $str=substr($str,0,-1);
    //             $str=$str.','.$newData.']';
    //             $tip=file_put_contents($path,$str);
    //             if($tip){
    //             tip('注册成功！','http://www.baidu.com');
    //             }
    //         }
    //     }
    }

    function delete($deleted){
        $str=file_get_contents(PATH);
        $msg=json_decode($str);
        $count=count($msg);
        $nmsg;
        for($i=0;$i<$count;$i++){
            if($msg[$i]->user!=$deleted){
                $nmsg[]=$msg[$i];
            }
        }
        $str=json_encode($nmsg);
        file_put_contents(PATH,$str);
    }
    function alter($alter){
        $str=file_get_contents(PATH);
        $msg=json_decode($str);
        $count=count($msg);
        $nmsg;
        for($i=0;$i<$count;$i++){
            if($msg[$i]->user==$alter){
                $msg[$i]->password=$_POST['alter'];
            }
            $nmsg[]=$msg[$i];
        }
        $str=json_encode($nmsg);
        file_put_contents(PATH,$str);
    }
    function footPage($path,$fname,$listNum=1){
        $str=file_get_contents($path);
        $msg=json_decode($str);
        $count=count($msg);
        $pages=ceil($count/$listNum);
        if(isset($_GET[$fname])){
            $page=$_GET[$fname];
        }else{
            $page=1;
        }
        echo '<li><a href="?page='.lastPage($page).'">上一页</a></li>';
        for($i=1;$i<=$pages;$i++){
            echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
        }
        echo '<li><a href="?page='.nextPage($page,$pages).'">下一页</a></li>';
    }
    function lastPage($page){
        if($page<=1){
            return 1;
        }else{
            return $page-1;
        }
    }
    function nextPage($page,$pages){
        if($page>=$pages){
            return $pages;
        }else{
            return $page+1;
        }
    }
    function msgRead($path,$listNum,$pageid){
        $link=mysqli_connect('localhost','root','123456','test0716');
        if(!$link){
            die('link failed');
        }
        $sql="select * from  `msg`";
        $result=mysqli_query($link,$sql);//读取数据库信息
        $row;
        while($tmp=mysqli_fetch_array($result)){
            $row[]=$tmp;
        }
       
        $row=array_reverse($row);//反转数组使最新的信息位于上方
        //获取页码待调整
        if(isset($_GET[$pageid])){
            $page=$_GET[$pageid];
        }else{
            $page=1;
        }
        $msgNum=count($row)-1;
        $start=($page-1)*$listNum;
        $end=$page*$listNum-1;
        if($end>$msgNum){
            $end=$msgNum;
        }

        for($i=$start;$i<=$end;$i++){
            if($row[$i]['align']==1){
                echo '<li class=messageBack> <span>time</span><br><p>'.$row[$i]['msg'].'</p></li>';
            }
            else{
            echo '<li class=messageIn> <span>time</span><br><p>'.$row[$i]['msg'].'</p></li>';
            }
        }


        // Old Version
        // $str=file_get_contents($path);
        // $msg=json_decode($str);
        // $msg=array_reverse($msg);
        // $msgNum=count($msg)-1;
        // for($i=$start;$i<=$end;$i++){
        //     if(substr($msg[$i]->msg,0,14)=='(*&^%$#$%^&*()'){
        //         echo '<li class=messageBack> <span>time</span><br><p>'.substr($msg[$i]->msg,14).'</p></li>';
        //     }
        //     else{
        //     echo '<li class=messageIn> <span>time</span><br><p>'.$msg[$i]->msg.'</p></li>';
        //     }
        // }
    }
    function leaveMsg($path,$usr,$msgid){
        // $str=trim(file_get_contents($path));
        // $msg=json_decode($str);
        // $nmsg[$msgid]='(*&^%$#$%^&*()'.$_POST[$msgid];
        // if($usr=='root'){
        //     $nstr=','.json_encode($nmsg).']';
        // }else{
        //      $nstr=','.json_encode($nmsg).']';
        //      }
        // $str=substr($str,0,-1).$nstr;
        // $rst=file_put_contents($path,$str);
        // if($rst){
        //     tip("留言成功",'');
        // }
        $link=mysqli_connect('localhost','root','123456','test0716');
        if(!$link){
            die('link failed');
        }
        if($usr=='root'){
            $nstr=$_POST[$msgid];
            $align=1;
        }else{
            $nstr=$_POST[$msgid];
            $align=0;
        }
        $add="insert into  `test0716`.`msg` (`ID` ,`msg` , `align`) values (NULL ,  '".$nstr."',  '".$align."');";
        $result=mysqli_query($link,$add);
        if($result){
            tip('留言成功');
        }else{
            tip("留言失败");
        }
        
    }
    function upload($dir,$file,$filesize){
        //未选择文件时不进行响应
        if($file['name']==''){
            return 0;
        }
        //文件异常时终结脚本
        if($file['error']!=0){
            die('文件异常！');
            return 0;
        }
        //限制文件大小
        if($file['size']>$filesize){
            tip('上传文件不能超过200kb！');
            return 0;
        }
        //显示文件类型
        $typeAble=['jpg','jpeg','png','gif'];
        list($typeName,$type)=explode('/',$file['type']);
        if(!in_array($type,$typeAble)){
            tip('选择文件格式不符合要求！');
            return 0;
        }
        //防止文件重名
        $fileList=scandir($dir);
        $fileName=$file['name'];
        $tmp=repeated($fileName,$fileList);
        //设置文件路径
        $path=$dir.$fileName;
        $rst=move_uploaded_file($file['tmp_name'],$path);
        //提示
        if($rst){
            tip('上传成功！');
            return $rst;
        }else{
            tip("上传失败！");
            return 0;
        }
    }
    function repeated(&$fileName,$file,$repeat=1){//重名时添加后缀
        for($i=0;$i<count($file);$i++){
            if(trim($file[$i])==$fileName){
                if($repeat>1){
                    $fileName=substr($fileName,0,-3);
                }
                // $tmp=explode('.',$file['name']);
                // $typeIndex=count($tmp)-1;
                // $type=$tmp[$typeIndex];
                // $fileName=str_replace($type,'',$fileName);
                $fileName=$fileName.'('.$repeat.')'.$type;
                $repeat++;
                repeated($fileName,$repeat);
            //     return true;
            // }
            // else{
            //     return 0;
            }
        }
    }
?>