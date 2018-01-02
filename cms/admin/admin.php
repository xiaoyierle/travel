<?php
//header('Content-Type:text/html;charset=utf-8');
    session_start();
    if(!isset($_SESSION["user"])){
        $msg="请登录";
        $href="login.html";
        include "message.html";
    }else{
        $user=$_SESSION["user"];
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <link rel="stylesheet" href="../static/css/admin.css">
</head>
<body>
    <div class="top">
        <div class="welcome">欢迎<?php echo $user;?>登录<a href='exit.php'>退出</a></div>
        <h3 class="text-center">xxx新闻管理系统</h3>
    </div>
    <div class="bottom">
        <div class="left">
            <ul>
                <li>-管理员设置</li>
                <ul>
                    <li><a href="showadmin.php" target="frame">--查看信息</a></li>
                    <li><a href="changepass.php" target="frame">--修改密码</a></li>
                </ul>
            </ul>
            <ul>
                <li>-栏目管理</li>
                <ul>
                    <li><a href="showcategory.php" target="frame">--查看栏目</a></li>
                    <li><a href="addcategory.php" target="frame">--添加栏目</a></li>
                </ul>
            </ul>
            <ul>
                <li>-内容管理</li>
                <ul>
                    <li><a href="showcontent.php" target="frame">--查看内容</a></li>
                    <li><a href="addcontent.php" target="frame">--添加内容</a></li>
                </ul>
            </ul>
            <ul>
                <li>-推荐位管理</li>
                <ul>
                    <li><a href="showposition.php" target="frame">--查看推荐位</a></li>
                    <li><a href="addposition.php" target="frame">--添加推荐位</a></li>
                </ul>
            </ul>
        </div>
        <div class="right">
            <iframe src="" frameborder="0" name="frame"></iframe>
        </div>
    </div>
</body>
<script src="../static/js/jQuery1.10.2.js"></script>
<script src="../static/js/main.js"></script>
</html>