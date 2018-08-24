<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>内容页</title>
    <?php include_once "link.php";?>
</head>
<body>
    <div id='content'>
       <?php include_once "header.php" ?>
        <div class=list_sidebar>
            <div id='sidebar2' style="margin-top:10px;height: 220px;">
                <ul>
                    <!-- <a href=""><li class=sidebar_list1><p>业务合作<br><font>Bussniess Cooperation</font></p></li></a> -->
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
        <div class=list>
            <div class='newsMid_title'  style="width:750px">
                <div class='title_box'>行业动态 </div>
                <div class='title_nav'><a href="">首页</a>&nbsp;&nbsp;&lt;&nbsp;&nbsp;<a href="">培训合作</a>
                    &nbsp;&nbsp;&lt;&nbsp;&nbsp;<a href="">培训信息</a></div>
            </div>
            <h3><?=$content['title']?></h3>
            <div class=content_time>发布时间：<?=date("Y-m-d H:i:s",$content['time'])?> 浏览次数：<?=$content['views']?></div> <br>
            <p>  
                <?=$content['content']?>
            </p>
            <div class=content_last><a href="">上一页：习近平出访比勒陀利亚</a></div>
            <div class=content_next><a href="">下一页：习近平回国</a></div>
        </div>
        <?php include_once "footer.php"?>
    </div>
</body>
</html>
