<?php include_once "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>┌精品電子商務網站」</title>
        <link href="./css/css.css" rel="stylesheet" type="text/css">
        <script src="./js/jquery-1.9.1.min.js"></script>
        <script src="./js/js.js"></script>
</head>

<body>
        <iframe name="back" style="display:none;"></iframe>
        <div id="main">
                <div id="top">
                        <a href="?">
                                <img src="./icon/0416.jpg">
                        </a>
                        <div style="padding:10px;">
                                <a href="?">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=buycart">購物車</a> |
                                <?php
                                if (isset($_SESSION['user'])) {
                                        echo "<a href='./api/logout.php?logout=user'>會員登出</a>|";
                                } else {
                                        echo "<a href='?do=login'>會員登入</a>|";
                                }
                                if (isset($_SESSION['admin'])) {
                                        echo "<a href='backend.php'>回後台</a>";
                                } else {
                                        echo "<a href='?do=admin'>管理登入</a>";
                                }
                                ?>
                        </div>
                        <marquee behavior="" direction=""> 情人節特惠活動 &nbsp;&nbsp; 年終特賣會開跑了 </marquee>
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                                <?= $Type->nav(); ?>
                        </div>
                        <span>
                                <div>進站總人數</div>
                                <div style="color:#f00; font-size:28px;">
                                        00005 </div>
                        </span>
                </div>
                <div id="right">
                        <?php
                        $do = $_GET['do'] ?? 'main';
                        $file = "./view/front/{$do}.php";
                        $table = ucfirst($do);
                        if (isset($$table)) {
                                $$table->front();
                        } else if (file_exists($file)) {
                                include $file;
                        } else {
                                include "./view/front/main.php";
                        }
                        ?>
                </div>
                <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
                        頁尾版權 : <?= $Bottom->find(1)['bottom']; ?></div>
        </div>

</body>

</html>