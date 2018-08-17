<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>中国医药生物协会</title>
    <link rel="stylesheet" href="<?=HOST_URI?>view/content/css/global.css">
</head>
<body>
    <div id='content'>
        <?php include_once "header.php"?>
        <div id=allbanner>
            <div class='banner'>
                <div class='banner_pic' id=banner style='left:0px;'>
                    <?php 
                        $ad=getByColumn(10,0,4);
                        for ($i=0,$count=count($ad); $i <$count ; $i++) { 
                            echo ' <img src="'.$ad[$i]['img'].'" alt=" " title='.$i.'>';
                        }
                    ?>
                </div>
                <button class=buttonLeft  onmouseover="bright(event)" onmouseout="dark(event)" id=left>&#8678;</button>
                <button class=buttonRight onmouseover="bright(event)" onmouseout="dark(event)" onclick="turnright()" id=right>&#8680;</button>
                <ul class='thum' id=thum>
                    <li id=0 onmouseover="thumclick(event)">1</li>
                    <li id=1 onmouseover="thumclick(event)">2</li>
                    <li id=2 onmouseover="thumclick(event)">3</li>
                    <li id=3 onmouseover="thumclick(event)">4</li>
                </ul>
            </div>
            <div id='sidebar' style="margin-top:4px;">
                <ul>
                    <li id=sidebar_1><a href=""></a></li>
                    <li id=sidebar_2><a href=""><p>样本分会入会申请<br>
                        <font class=gray>Application</font></p><br></a></li>
                    <li id=sidebar_2><a href=""><p>样本分会入会申请<br>
                        <font class=gray>Application</font></p><br></a></li>
                    <li id=sidebar_2><a href=""><p>样本分会入会申请<br>
                        <font class=gray>Application</font></p><br></a></li>
                </ul>
            </div>
        </div>
        <div id='newsLeft' style="margin-right: 8px">
            <div class=newsLeft_title>关于分会 <a href="" class=news_more></a></div>
            <a href=""><div class=newsLeft_content>
                <img src="<?=HOST_URI?>view/content/images/about_fh_pic.jpg">
                <p>中国医药技术协会成立于1993年，由国家卫生部部长陈敏等发起，得到了当时医药管理部门的大力的支持</p></a></div>
        </div>
        <div class='newsMid'>
            <div class='newsMid_title'>
                <div class='title_box'><?=columnName(6)?></div>
            </div>
            <ul class=newsMid_content>
                <?php
                    $mid=getByColumn(6);
                    for ($i=0; $i <count($mid) ; $i++) { 
                        echo ' <a href="content.php?id='.$mid[$i]['id'].'"><li>'.$mid[$i]['title'].'</a></li> ';
                    }
                    
                ?>
            </ul>
            <a href="">
            <dl class=newsMid_content2 style="margin-top:20px;" >
                <dt><img src="<?=HOST_URI?>view/content/images/hydt_pic_r1_c1.jpg"></dt>
                <dd><h3>分会赴湖北省肿瘤</h3>周主任从生物样本库的建设原则总体设计</dd>
            </dl></a>
            <a href="">
                <dl class=newsMid_content2 >
                    <dt><img src="<?=HOST_URI?>view/content/images/hydt_pic_r1_c1.jpg"></dt>
                    <dd><h3>分会赴湖北省肿瘤</h3>周主任从生物样本库的建设原则总体设计</dd>
                </dl></a>
        </div>
        <div id='newsRight'>
            <div class="newsRight_title">分会新闻<a href="" class=news_more></a></div>
            <div class="newRight_content">
                <a href=""><img src="<?=HOST_URI?>view/content/images/news_fh.jpg" alt="">
                <h3>某某某教授赴华中科技大学</h3>
                中国医药技术协会成立于1993年，由国家卫生部部长陈敏等发起，
                        得到了当时医药管理部门的大力支持</a>
            </div>
        </div>
        <div id='sidebar2' style="margin-top:10px;">
            <ul>
               <li id=sidebar_3> <a href=""><p>样本分会入会申请<br>
                    <font class=gray>Application</font></p><br></a></li>
               <li id=sidebar_3> <a href=""><p>样本分会入会申请<br>
                    <font class=gray>Application</font></p><br></a></li>
               <li id=sidebar_3> <a href=""><p>样本分会入会申请<br>
                    <font class=gray>Application</font></p><br></a></li>
               <li id=sidebar_3> <a href=""><p>样本分会入会申请<br>
                    <font class=gray>Application</font></p><br></a></li>
            </ul>
        </div>
        <div class='newsMid'>
            <div class=newsMid_title>  <div class='title_box'>业务交流 </div></div>
            <ul class=column_iamges>
                <li style="margin-left: 14px;"><img src="<?=HOST_URI?>view/content/images/ywhz_pic_r1_c1.jpg" class='column_img'></li>
                <li><img src="<?=HOST_URI?>view/content/images/ywhz_pic_r1_c12.jpg" class='column_img'></li>
                <li><img src="<?=HOST_URI?>view/content/images/ywhz_pic_r1_c15.jpg" class='column_img'></li>
                <li><img src="<?=HOST_URI?>view/content/images/ywhz_pic_r1_c19.jpg" class='column_img'></li>
                <li><img src="<?=HOST_URI?>view/content/images/ywhz_pic_r1_c23.jpg" class='column_img'></li>
            </ul>
            <div class='column_news'>
                <a href=""><h4>分会赴湖北省</h4><p>周主任从生物样本库的建立原则总设计、功能区域周主任从生物样本库的建立原则总设计周主任从生物样本库的建立原则总设计</p></a>
            </div>
        </div>
        <div id='newsRight'>
            <div class="newsRight_title">学术交流<a href="" class=news_more></a></div>
            <div class=newsRightMid> 
                <img src="<?=HOST_URI?>view/content/images/pic1.jpg" alt="">
                <h5>行业动态标题</h5><p>这里是一段测试文本 尚有待调整<a href="">详情>></a></p>
            </div>
            <ul class=newsLeftBottom style="margin-top:-8px;">
                    <li><a href="">某莫某教授赴华中科</a></li>
                    <li><a href="">某莫某教授赴华中科</a></li>
                    <li><a href="">某莫某教授赴华中科</a></li>
                    <li><a href="">某莫某教授赴华中科</a></li>
            </ul>
        </div>
        <div id='newsLeft' style="height: 200px;">
                <div class=newsLeft_title>会员之家<a href="" class=news_more></a></div>
                <ul class=newsLeftBottom>
                        <li><a href="">某莫某教授赴华中科</a></li>
                        <li><a href="">某莫某教授赴华中科</a></li>
                        <li><a href="">某莫某教授赴华中科</a></li>
                        <li><a href="">某莫某教授赴华中科</a></li>
                        <li><a href="">某莫某教授赴华中科</a></li>
                        <li><a href="">某莫某教授赴华中科</a></li>
                    </ul>
            </div>
        <img src="<?=HOST_URI?>view/content/images/bottom_ad_pic.jpg" class=newsMid style="height: 187px;margin-top:18px; margin-left:7px;margin-right: 8px;">
        <div id='newsRight' style="height:200px;">
                <div class="newsRight_title">资源中心<a href="" class=news_more></a></div>
                <ul class="newRight_content" style="height:150px;">
                    <li><a href=""><img src="<?=HOST_URI?>view/content/images/zy_icon_s_r5_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</a></li>
                    <li><a href=""><img src="<?=HOST_URI?>view/content/images/zy_icon_s_r7_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</a></li>
                    <li><a href=""><img src="<?=HOST_URI?>view/content/images/zy_icon_s_r1_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</a></li>
                    <li><a href=""><img src="<?=HOST_URI?>view/content/images/zy_icon_s_r7_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</a></li>
                    <li><a href=""><img src="<?=HOST_URI?>view/content/images/zy_icon_s_r1_c1.jpg">&nbsp;&nbsp;&nbsp;这是一个新闻</a></li>
                </ul>
        </div>
        <?php include_once "footer.php";?>
        <div class='inform' id=inform>
            <div class='inform_title' style="left:12px">通知</div>
            <a href="javascript::"><div class='inform_title' style="right:0px" id='close'>关闭</div></a>
            <div class='inform_content'>
                <h4>通知标题</h4>
                <font>2012年12月24日</font>
                <p>这里有一段文本和一段文本这里有一段文本和一段文本这里有一段文本和一段文本这里有一段文本和一段文本</p>
            </div>
        </div>
</div>
</body>
</html>
<script  src='<?=HOST_URI?>view/content/pro.js'></script>