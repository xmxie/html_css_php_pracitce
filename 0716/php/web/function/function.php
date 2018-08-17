<?php

    function tip($content='',$href=''){
        echo '<script>';
                if($content!=''){
                echo 'alert("'.$content.'");';}
        echo '  location.href="'.$href.'"
              </script>
            ';
    }
    //改进版辣鸡弹窗
    function tip2($content,$href=''){
        echo "
        <div style='background:rgba(140, 110, 66, .3);width:100%;height:700px;position:absolute;left:0;top:0;z-index:1000;padding:1px;display:block;' id='tip'>
            <div style='background: powderblue;width:300px;height:200px;margin:auto;margin-top:20%;font-size: 24px;'>
                <p style='position:relative;top:90px;'>".$content."</p>
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
        $admin=get('admin');
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
        $data['img']=upload($data['img']);
        $re=insert($data,'admin');
            if($re){
                tip('注册成功');
                return 1;
            }else{
                tip('注册失败','');
                return false;
            }
    }
    //登录
    function login($user,$password){
        $sql='select `user`,`password`,`id` from `admin` where `user`="'.$user.'" and `password`="'.$password.'"';
        $result=mysqli_fetch_array(query($sql))['id'];
        return $result;
    }
    //验证码
    function code($num=4){
        $codeword=array_merge(range('a','z'),range('A',"Z"));
        shuffle($codeword);
        $code='';
        for($i=0;$i<$num;$i++){
            $code.=$codeword[$i];
        }
        return $code;
    }
    //文件上传
    function upload($file){
        $filesize=200*1024;
        $dir=ROOT.'upload/';
        if($file['name']==''){                        //未选择文件时不进行响应
            return false;
        }
        if($file['error']!=0){                        //文件异常时终结脚本
            die('文件异常！');
            return false;
        }
        if($file['size']>$filesize){                  //限制文件大小
            tip('上传文件不能超过200kb！');
            return false;
        }
        $typeAble=['jpg','jpeg','png','gif'];         //显示文件类型
        list($typeName,$type)=explode('/',$file['type']);
        if(!in_array($type,$typeAble)){
            tip('选择文件格式不符合要求！');
            return false;
        }
        $path=$dir.time().'.'.$type;                  //设置文件路径
        $rst=move_uploaded_file($file['tmp_name'],$path);
        if($rst){                                      //提示
            $dir=HOST_URI.'upload/';    
            $path=$dir.time().'.'.$type;                  //设置文件路径（网址）             
            return $path;
        }else{
            tip("头像上传失败！");
            return false;
        }
    }
    //会员组选择
    function group($data){
        echo '
            <select name="group" class="input w50">';
            for($i=0;$i<count($data);$i++){
                echo '<option value="'.$data[$i]['id'].'">'.$data[$i]['name'].'</option>';  
            }
        echo'</select>
        ';
    }
    //列表信息
    function getStart($pageSize,$page){    //获得当页内容首尾指针
        $start=$pageSize*($page-1);
        return $start;
    }
    function showUser($pageSize,$page){   
        $start=getStart($pageSize,$page);
        $data=getUser($start,$pageSize);
        for($i=0;$i<$pageSize;$i++){
            if(isset($data[$i])){
                echo '
                <tr>
                    <td style="text-align:left; padding-left:20px;">'.$data[$i]['id'].'</td>
                    <td width="10%"><img src="'.$data[$i]['img'].'" alt="" width="60" height="60" style="border-radius: 60px"/></td>
                    <td>'.$data[$i]['user'].'</td>
                    <td>'.$data[$i]['name'].'</td>
                    <td>'.date("Y-m-d H:i:s" ,$data[$i]['settime']).'</td>
                    <td><div class="button-group"> <a class="button border-main" href="alter.php?update='.$data[$i]['id'].'"><span class="icon-edit"></span> 修改</a> 
                        <a class="button border-red" href="?delete='.$data[$i]['id'].'" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> 
                    </div></td>
                </tr>';
            }   
        }
    }
    function showMsg($pageSize,$page){
        $start=getStart($pageSize,$page);
        $data=getMessage($start,$pageSize);
        for($i=0;$i<$pageSize;$i++){
            if(isset($data[$i])){
                echo '
                <tr>
                    <td>'.$data[$i]['id'].'</td>
                    <td>'.$data[$i]['user'].'</td>
                    <td>'.$data[$i]['message'].'</td>     
                    <td>'.date("Y-m-d H:i:s",$data[$i]['time']).'</td>    
                    <td><a href="reply.php?id='.$data[$i]['id'].'">查看回复</a></td>                       
                    <td>
                        <a class="button border-main" href="?reply='.$data[$i]['id'].'"><span class="icon-edit"></span> 回复</a>
                        <a class="button border-red" href="?delete='.$data[$i]['id'].'" ><span class="icon-trash-o"></span> 删除</a>
                    </td>
                </tr>';
            }
        }
    }
    function showReply($msgId,$pageSize,$page){
        $start=getStart($pageSize,$page);
        $data=getReply($msgId,$start,$pageSize);
        if($data==null){echo '没有更多留言';}
        for($i=0;$i<$pageSize;$i++){
            if(isset($data[$i])){
                $admin=getOne($data[$i]['admin_id'],'admin')['user'];
                echo '
                <tr>
                    <td>'.$data[$i]['id'].'</td>
                    <td>'.$admin.'</td>     
                    <td>'.$data[$i]['reply'].'</td>                       
                    <td>'.date("Y-m-d H:i:s",$data[$i]['time']).'</td>    
                    <td>
                        <a class="button border-main" href="alter_reply.php?alter='.$data[$i]['id'].'"><span class="icon-edit"></span> 修改</a>
                        <a class="button border-red" href="?delete='.$data[$i]['id'].'" ><span class="icon-trash-o"></span> 删除</a>
                    </td>
                </tr>';
            }
        }
    }
   
    //修改
    function alter($id,$data,$table){
        $data['img']=upload($data['img']);
        echo $data['img'];
        $result=update($id,$data,$table);
        if($result){
            tip('修改成功','list.php');
            return true;
        }else{
            tip('修改失败');
            return false;
        }
    }
    //页码
    function footpage($table,$pageSize,$page){
        $count=dbCount($table);
        $pages=ceil($count/$pageSize);
        $lastPage=$page-1;
        if($lastPage<1){
            $lastPage=1;
        }
        $nextPage=$page+1;
        if($nextPage>$pages){
            $nextPage=$pages;
        }

        echo '
        <td colspan="1000">
            <div class="pagelist"> ';
            if($page!=1){
            echo '<a href="?page='.$lastPage.'">上一页</a>';}
            for($i=1;$i<=$pages;$i++){
                if($i!=$page){
                    echo '<a href="?page='.$i.'">'.$i.'</a>';
                }else{
                    echo '<span class="current">'.$i.'</span>';
                }
            }
        echo'<a href="?page='.$nextPage.'">下一页</a>
             <a href="?page='.$pages.'">尾页</a> 
             </div>
        </td>';
    }






    function msgRead($msg,$reply){
        for($i=0;$i<count($msg);$i++){
            echo '<li class=messageIn><span>time</span><br><p>'.$msg[$i]['message'].'<p></li>';
            for($j=0;$j<count($reply);$j++){
                if($msg[$i]['id']==$reply[$j]['target']){
                    echo '<li class=messageBack> <span>time</span><br><p>'.$reply[$j]['reply'].'</p></li>';
                }
            }
        }
    }
    function columnRead($column){
        for($i=0;$i<count($column);$i++){
            echo '<li><a href="">'.$column[$i]['name'].'</a></li>';
        }
    }
?>