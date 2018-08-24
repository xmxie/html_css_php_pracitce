<?php
    include_once "Db.class.php";
    $web0716=new Db_test('localhost','root','123456','web0716','utf8');
    // $data=['user'=>'god','password'=>md5('654321')];
    // $res=$web0716->insert($data,'admin');
    // for($i=46;$i<50;$i++){
    // $res=$web0716->delete($i,'admin');
    // }
    $admin=$web0716->get('admin');
    $aAdmin=$web0716->getOne(45,'admin');
    $user=$web0716->getUser();
    echo "<br/>";
    print_r($admin);
    echo "<br/><br/>    ";
    print_r($aAdmin);
    echo "<br><br>";
    print_r($user);
    // if($res){
    //     echo 'success';
    // }
?>