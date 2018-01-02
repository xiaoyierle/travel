<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.css">
    <?php
        include "../libs/db.php";
        $str="";
        function table($db,$num=1,$parentid=0){
            global $str;//在函数内部不能使用外部变量，需要定义
            $line=str_repeat("-",$num);
            $sql="select * from `category` where `parentid`='$parentid'";
            $result=$db->query($sql);
            $result=$result->fetch_all(MYSQLI_ASSOC);
            foreach($result as $v){
                $str.="
                    <tr>
                        <td>{$v['id']}</td>
                        <td>{$line}{$v['cat_name']}</td>
                        <td>
                            <a href='delcategory.php?id={$v["id"]}' class='btn btn-danger btn-sm'>删除</a>
                            <a href='updateposition.php?id={$v["id"]}' class='btn btn-warning btn-sm'>修改</a>
                        </td>
                    </tr>
                ";
                table($db,$num+1,$v['id']);
            }
        }
        table($db);
    ?>
</head>
<body>
    <h3 class="text-center">栏目信息</h3>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>栏目名称</th>
                <th>操作</th>
            </tr>
            <?php
                echo $str;
            ?>
        </table>
    </div>
</body>
</html>