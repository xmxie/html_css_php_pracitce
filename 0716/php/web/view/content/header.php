

<div id='head'>
    <a href="index.php"><img id='head_img' src="<?=HOST_URI?>view/content/images/top_r1_c1.jpg" alt=""></a>
    <?php
        if(!isset($_SESSION['id'])){
            echo '<p>游客你好！您还没有<a href="login.php">登录</a>，若您不是会员请先免费<a href="register.php">注册</a></p>';
        }else{
            $user=getOne($_SESSION['id'],'admin')['user'];
            echo '<p>用户'.$user.'您好！</p>';
        }
    ?>
    <ul id='head_ioc'>
        <li id='ioc_1'><a href="message.php">留言板</a></li>
        <li id='ioc_2'><a href="">订阅</a></li>
        <li id='ioc_3'><a href="">加入收藏</a></li>
        <li id='ioc_4'><a href="">论坛</a></li>
        <li id='ioc_5'><a href="">English</a></li>
    </ul>
    <ul id='nav'>
        <?php 
            for($i=0;$i<count($column);$i++){
                echo '<li><a href="list.php?column_id='.$column[$i]['id'].'">'.$column[$i]['name'].'</a></li>';
            }
        ?>
        <input type="text" class=nav_input>
    </ul>
</div>