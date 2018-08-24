<?php
class Phone{
    const const_var='const';
    public $camera;
    public $player;
    public $ratio;
    public $battery;
    public $phoneBook;
    public $message;
    public $test='test';
    // public $time;
    public $clock;
    public $album;
    public $application;
    public $background;
    public $diary;
    public $voice;


    private $pwd='123456';

    public function getPwd(){
        return $this->pwd;
    }
    public function getCon(){
        return self::const_var;
    }
    public function alterPwd($oldPwd,$newPwd){
        if($oldPwd!=$this->pwd){
            return "your password is wrong";
        }else{
            $this->pwd=$newPwd;
            return "your new password is ".$this->pwd.'<br>you have set your password by function in class';
        }
    }
    public function unLock($pwdin){
        if($pwdin!=$this->pwd){
            return false;
        }else{
            return true;
        }
    }
    public function getTime(){
        return $this->time;
    }
    public function setClock($time){}
    public function ringClock(){}
    public function getAlbum(){}
    public function editAlbum(){}
    public function getCurrentBattery(){}
    public function openPlayer(){}
    public function changePlayerMod(){}
    public function cutSong(){}
    public function lastSong(){}
    public function openCamera(){}
    public function takePhoto(){ }
    public function changeRatio(){}
    public function getPhoneBook(){}
    public function getMessage(){ }
    public function listApp(){}
    public function setBackground(){}
    public function viewDiary(){ }
    public function setDate(){}
    public function turnUpVoice(){}
    public function turnDownVocie(){}
   
}
$phone=new phone();
var_dump($phone);
echo '<br>';
echo phone::const_var." from classname <br>";
echo $phone::const_var." from object <br>";
$phone->player='    set public var by object itself<br>';
echo $phone->player.' get the public var by obj itself<br>';
echo $phone->getPwd().' get the private var by function in class <br>';
echo $phone->echoCon().' get the const by self<br>';
$phone->alterPwd('123456','54321');
?>