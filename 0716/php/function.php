<?php
     function tip($msg,$href=''){
        echo  '<script>alert("'.$msg.'");
                location.href="'.$href.'"
                </script>';
    }
   
    function login($usr,$pwd){
        $path='admin.txt';
        $str=file_get_contents($path);
        $msg=json_decode($str);
        $count=count($msg);
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
        for($i=0;$i<$count;$i++){
            if($usr==$msg[$i]->user&&$pwd==$msg[$i]->password)
            {
                setcookie('usr',$usr,time()+3600);
                tip('登录成功','message.php');
                break;
            }
            else if($i==$count-1){
                if(isset($_COOKIE['failTime'])){
                    $date=time()+60*15;
                    if($_COOKIE['failTime']<3){
                    setcookie("failTime",$_COOKIE['failTime']+1,$date);
                    }
                }else{
                    $date=time()+60*15;
                    setcookie("failTime",1,$date);
                }
            }
        }
        
        tip('登录失败','');
    }
    function register($usr,$pwd,$pwd2){
        $path='admin.txt';
        $str=trim(file_get_contents($path));
        $msg=json_decode($str);
        $count=count($msg)-1;
        $tmp['user']=$usr;
        $tmp['password']=$pwd;
        if($tmp['user']==''||$pwd==''||$pwd2==''){
            tip('请完善信息！');
        }
        else if($pwd!=$pwd2){
            tip("两次密码不一致！");
        }
        else {
            for($i=0;$i<=$count;$i++){
                if($tmp['user']==trim($msg[$i]->user)){
                    tip('该账号已注册！');
                    break;
                }
                else if($i==$count){
                    $newData=json_encode($tmp);
                    $str=substr($str,0,-1);
                    $str=$str.','.$newData.']';
                    $tip=file_put_contents($path,$str);
                    if($tip){
                    tip('注册成功！','http://www.baidu.com');
                    }
                }
            }
        }
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
        $str=file_get_contents($path);
        $msg=json_decode($str);
        $msg=array_reverse($msg);
        $msgNum=count($msg)-1;
        if(isset($_GET[$pageid])){
            $page=$_GET[$pageid];
        }else{
            $page=1;
        }
        $start=($page-1)*$listNum;
        $end=$page*$listNum-1;
        if($end>$msgNum){
            $end=$msgNum;
        }
        for($i=$start;$i<=$end;$i++){
            if(substr($msg[$i]->msg,0,14)=='(*&^%$#$%^&*()'){
                echo '<li class=messageBack> <span>time</span><br><p>'.substr($msg[$i]->msg,14).'</p></li>';
            }
            else{
            echo '<li class=messageIn> <span>time</span><br><p>'.$msg[$i]->msg.'</p></li>';
            }
        }
    }
    function leaveMsg($path,$usr,$msgid){
        $str=trim(file_get_contents($path));
        $msg=json_decode($str);
        $nmsg[$msgid]='(*&^%$#$%^&*()'.$_POST[$msgid];
        if($usr=='root'){
            $nstr=','.json_encode($nmsg).']';
        }else{
             $nstr=','.json_encode($nmsg).']';
             }
        $str=substr($str,0,-1).$nstr;
        $rst=file_put_contents($path,$str);
        if($rst){
            tip("留言成功",'');
        }
    }
    function upload($dir,$fileId,$filesize){
        if($_FILES[$fileId]['size']>$filesize){
            tip('上传文件不能超过200Kb！');
        }else if(!strstr($_FILES[$fileId]['type'],'image')){
            tip('选择文件不是图片！');
        }else{
            $file=scandir($dir);
            $fileName=$_FILES[$fileId]['name'];
            repeated($fileName,$file);
            $path=$dir.$fileName;
            move_uploaded_file($_FILES[$fileId]['tmp_name'],$path);
            tip('上传成功！');
        }
    }
    function repeated(&$fileName,$file,$repeat=1){
        for($i=0;$i<count($file);$i++){
            if(trim($file[$i])==$fileName){
                if($repeat>1){
                    $fileName=substr($fileName,0,-3);
                }
                $fileName=$fileName.'('.$repeat.')';
                $repeat++;
                repeated($fileName,$repeat);
            }
        }
    }
?>