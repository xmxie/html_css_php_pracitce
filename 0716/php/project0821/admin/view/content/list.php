<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>列表</title>
    <link rel="stylesheet" href="<?=HOST_URI?>view/pro/css/global.css">
</head>
<body>
    
    <div id='content'>
        <?php include_once "header.php"?>
        <div class=list_sidebar>
            <div id='sidebar2' style="margin-top:10px;height: 220px;">
                <ul>
                    <li class=sidebar_list1><p>业务合作<br><font>Bussniess Cooperation</font></p></li>
                    <a href=""><li class=sidebar_list2><p>培训信息<br></li></a>
                    <a href=""><li class=sidebar_list2><p>培训信息<br></li></a>
                    <a href=""><li class=sidebar_list2><p>培训信息<br></li></a>
                </ul>
            </div>
            <div id='newsRight' style="height:200px;width:220px;margin-left: 3px;">
                <div class="newsRight_title" style="width:219px">资源中心</div>
                <ul class="newRight_content" style="height:150px;">
                    <a href=""><li><img src="<?=HOST_URI?>view/pro/images/zy_icon_s_r5_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</li></a>
                    <a href=""><li><img src="<?=HOST_URI?>view/pro/images/zy_icon_s_r7_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</li></a>
                    <a href=""><li><img src="<?=HOST_URI?>view/pro/images/zy_icon_s_r1_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</li></a>
                    <a href=""><li><img src="<?=HOST_URI?>view/pro/images/zy_icon_s_r7_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</li></a>
                    <a href=""><li><img src="<?=HOST_URI?>view/pro/images/zy_icon_s_r1_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</li></a>
                </ul>
            </div>
            <div id='newsRight' style="width:220px;margin-left: 3px;">
                <div class="newsRight_title" style="width:219px;">学术交流</div>
                <div class=newsRightMid> 
                    <img src="<?=HOST_URI?>view/pro/images/pic1.jpg" alt="">
                    <h5>行业动态标题</h5><p>这里是一段测试文本 尚有待调整<a href="">详情>></a></p>
                </div>
                <ul class=newsLeftBottom style="margin-top:-8px;">
                    <a href=""><li>某莫某教授赴华中科</li></a>
                    <a href=""><li>某莫某教授赴华中科</li></a>
                    <a href=""><li>某莫某教授赴华中科</li></a>
                    <a href=""><li>某莫某教授赴华中科</li></a>
                </ul>
            </div>
            <img src="<?=HOST_URI?>view/pro/images/list_r7_c1.jpg" class=list_sidebar_img>
            <img src="<?=HOST_URI?>view/pro/images/list_r9_c1.jpg" class=list_sidebar_img>
        </div>
        <ul class=list> 
            <div class='newsMid_title' style="width:750px">
                <div class='title_box'><?=columnName($_GET['column_id'])?> </div>
            </div>
            <br><br>
            <?php
                for($i=0;$i<count($content);$i++){
                    echo '
                        <li><a href="content.php?id='.$content[$i]['id'].'">'.$content[$i]['title'].'</a><font class=list_time>'.date("Y-m-d ",$content[$i]['time']).'</font></li>
                    ';
                }
            ?>
        </ul>
        <?php include_once "footer.php"?>
    </div>
</body>
</html>
<script >
    var search=document.getElementById('search');
    search.onfocus=function(){this.style.background="url('<?=HOST_URI?>view/pro/images/search_r1_c1.jpg') no-repeat,url('<?=HOST_URI?>view/pro/images/search_r1_c5.jpg'"}
    search.onblur=function(){
    if(search.value==''){
    this.style.background="url('<?=HOST_URI?>view/pro/images/search_r1_c1.jpg') no-repeat,url('<?=HOST_URI?>view/pro/images/search_r1_c9.jpg') no-repeat right,url('<?=HOST_URI?>view/pro/images/search_r1_c5.jpg'"}
    }
</script>