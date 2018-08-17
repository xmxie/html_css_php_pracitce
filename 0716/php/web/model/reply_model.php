<?php
    function getReply($id,$begin=0,$limit=30){
        $sql="select a.*,b.`user` from reply a,admin b  where a.target=".$id." and b.id=a.`admin_id` limit $begin,$limit";
        $re=query($sql);
        $data=toAssoc($re);
        return $data;
    }


?>