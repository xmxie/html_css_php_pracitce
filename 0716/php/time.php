<?php
$date=time();
echo date('Y-m-d H:i:s l');
// echo '<br>'.floor((time()-mktime(0,0,0,8,07,2008))/3600/24);
// echo '<br>'.floor((mktime(0,0,0,10,1,2018)-time())/3600);
// echo '<br>'.floor((time()-mktime(12,0,0,12,28,1998))/3600);
// echo '<br>'.floor((mktime(0,0,0,12,28,2098)-mktime(0,0,0,12,28,1998))/3600);
list($begin)=explode(' ',microtime());
echo '<br>'.$begin;
for($i=0;$i<1000000;$i++){
    echo '<br>'.$i;
}
list($end)=explode(' ',microtime());
echo '<br>'.$end;
echo '<br>'.($end-$begin);
?>