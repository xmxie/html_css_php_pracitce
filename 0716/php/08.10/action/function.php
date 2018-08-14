<?php
    header("content-type:text/html; charset=utf-8;");
    //辣鸡弹窗
    function tip($msg,$href){
        echo 
        '<script>
            alert("'.$msg.'");
            location.href="'.$href.'";
        </script>';
    }
    //改进版辣鸡弹窗
    function tip2($content,$href=''){
        echo "
        <div style='background:rgba(140, 110, 66, .3);width:100%;height:700px;position:absolute;left:0;top:0;padding:1px;display:block;' id='tip'>
            <div style='background: powderblue;width:200px;height:50px;margin:auto;margin-top:200px;padding:50px;font-size: 24px;'>
                ".$content."
            </div>
        </div>
        <script>
            setTimeout('location.href=\"".$href."\"',5000);
        </script>
        ";
    }
    //注册
    function register($data){
        foreach ($data as $key => $value) {
            $$key=$value;
        }
        $admin=getdt();
        if($user==''||$password==''){
            tip('用户名及密码不能为空');
            return false;
        }
        for($i=0;$i<count($admin);$i++){
            if($admin[$i]['user']==$data['user']){
                tip('用户名已存在');
                return false;
            }
        }
        $data['img']=upload($img);
        $re=insert($data);
            if($re){
                tip2('注册成功','login.php');
                return 1;
            }else{
                tip2('注册失败','');
                return false;
            }
    }
    //登录
    function login($yzm,$yzmin,$user,$password){
        if($yzm!=$yzmin){
            tip('验证码错误！');
        }
        $data=getdt();
        $count=count($data);
        if($user==''||$password==''){
            tip('用户名和密码不能为空');
        }
        for($i=0;$i<$count;$i++){
            if($data[$i]['user']==$user&&$data[$i]['password']==$password){
                setcookie('user',$user);
                tip2('登录成功！');
                return true;
            }
        }
        tip2('登录失败！');
        return false;
    }
    //删除
    function delete($id){
        $link=linkdb();
        $sql='delete from admin where id='.$id;
        $re=mysqli_query($link,$sql);
        return $re;
    }
    //展示
    function show($data){
        $count=count($data);
        for($i=0;$i<$count;$i++){

            echo '
            <tr>
                <td>'.$data[$i]['ID'].'</td>
                <td><img src="'.$data[$i]['img'].'" alt=""></td>
                <td>'.$data[$i]['user'].'</td>
                <td>'.$data[$i]['name'].'</td>
                <td>'.date("Y-m-d",$data[$i]['settime']).'</td>                
                <td><a href=?id='.$data[$i]['ID'].'>删除</a>/
                    <a href=?update='.$data[$i]['ID'].'>修改</td>
            </tr>';

        }
    }
    function showGrp($data){
        $count=count($data);
        for($i=0;$i<$count;$i++){
            echo '
            <tr>
                <td>'.$data[$i]['id'].'</td>
                <td>'.$data[$i]['name'].'</td>                
                <td><a href=?update='.$data[$i]['id'].'>修改</td>
            </tr>';
        }
    }
    //验证码
    function yzm(){
        $range=range('a','z');
        $yzm='';
        for($i=0;$i<4;$i++){
            $yzm=$yzm.$range[rand(0,25)];
        }
        return $yzm;
    }
    //上传头像
    function upload($file){
        $filesize=200*1024;
        $dir='../upload/';
        //未选择文件时不进行响应
        if($file['name']==''){
            return false;
        }
        //文件异常时终结脚本
        if($file['error']!=0){
            die('文件异常！');
            return false;
        }
        //限制文件大小
        if($file['size']>$filesize){
            tip('上传文件不能超过200kb！');
            return false;
        }
        //显示文件类型
        $typeAble=['jpg','jpeg','png','gif'];
        list($typeName,$type)=explode('/',$file['type']);
        if(!in_array($type,$typeAble)){
            tip('选择文件格式不符合要求！');
            return false;
        }
        //设置文件路径
        $path=$dir.time().'.'.$type;
        $rst=move_uploaded_file($file['tmp_name'],$path);
        //提示
        if($rst){
            return $path;
        }else{
            tip("头像上传失败！");
            return false;
        }
    }

    //会员组
    function group($data){
        echo '
            <select name="group" id="">';
            for($i=0;$i<count($data);$i++){
                echo '<option value="'.$data[$i]['id'].'">'.$data[$i]['name'].'</option>';  
            }
        echo'</select>
        ';
    }
    //页码
    function footPage($msg,$listNum=1){
        $count=count($msg);
        $pages=ceil($count/$listNum);
        if(isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        echo '<li><a href="?page='.lastPage($page).'">上一页</a></li>';
        for($i=1;$i<=$pages;$i++){
            echo '<li><a href="?page='.$i.'">'.$i.'</a></li>';
        }
        echo '<li><a href="?page='.nextPage($page,$pages).'">下一页</a></li>';
    }
?>