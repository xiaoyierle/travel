<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <style>
        nav ul{
            width:800px;
            height:30px;
            background-color: #ccc;
            margin:30px auto;
            list-style:none;
        }
        nav li{
            width: 100px;
            height:30px;
            float: left;
            line-height:30px;
            margin-left: 30px;
        }
    </style>
    <?php
        include "../libs/db.php";
        $sql="select * from `category` where parentid=0";
        $result=$db->query($sql);
        $result=$result->fetch_all(MYSQLI_ASSOC);
    ?>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">首页</a></li>
        <?php
            foreach ($result as $v){
                echo "
                        <li>
                            <a href='category.php?id={$v["id"]}'>{$v["cat_name"]}</a>
                        </li>
                     ";
            }
        ?>
    </ul>
</nav>