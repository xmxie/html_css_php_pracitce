<?php
class User{
    public $user;
    public $pwd;
    public $yzm;
    public $easyPwd=['123456'];
    private $sysYzm;//should get it randly by constructer

    public function checkYzm($yzm){
        if($yzm!=$sysYzm)
    }
    public function checkEmpty($user,$pwd,$yzm){
        if($user==''||$pwd==''||$yzm==''){
            echo 'can not be empty';//should before register,just write here for read
        }
    }
    public function checkPwd($pwd){
        if(strlen($pwd)<6){
            echo 'password should have at least 6 words';
        }
        if(in_array($pwd,$easyPwd)){
            echo 'this password is too easy';
        }
    }
    public function checkuser($user){
        if(strlen($user)<6){
            echo 'user name should have at least 6 words';
        }
    }
    public function repeatUser($user){
        $sql="select `user` from `admin` where `user`=$user";
        $re=query($sql);//假装连接数据库
        if($re){//should be outside ,for read too
            echo 'this user name have been used';
        }
        return $re;
    }
    public function checkMessage(){
        //i don't know how to finish it -.-
    }
    public function checkUpload(){
        //the size the 
    }

    /*注册流程（simple vision) 
    后台
    检验验证码
    获得用户名等相关信息
    防止用户名等必要信息为空
    确认用户名及密码基本规则（长短、包含等）
    防止密码过于简单（数组记录违规简单密码）
    获取数据库防止用户名重名
    邮箱或手机信息确认
    检验上传项目规则符合
    上传头像等上传信息并返回结果（错误报错，上传项目记录为空）
    // 确认用户等级（付费注册）
    连接数据库，添加信息（添加失败报错）
    记录用户id，检查重复（禁止部分付费功能体验）
    提示注册成功 
    */





    

}

?>