<?php

    function getMessage($begin=0,$limit=30){
        $sql="select a.*,b.`user` from message a,admin b where a.`user_id`=b.`id` limit $begin,$limit";
        $re=query($sql);
        $data=toAssoc($re);
        return $data;
    }

?>