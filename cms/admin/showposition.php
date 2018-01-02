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
        $sql="select * from `position`";
        $result=$db->query($sql);
        $result=$result->fetch_all(MYSQLI_ASSOC);
    ?>
</head>
<body>
    <h3 class="text-center">查看推荐位信息</h3>
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            <table class="table table-bordered">
                <tr>
                    <th>id</th>
                    <th>名称</th>
                    <th>内容条数</th>
                    <th>操作</th>
                </tr>
                <?php
                    foreach ($result as $v){
                        $sql="select count(*) as num from `content` where posid='$v[id]'";
                        $r=$db->query($sql);
                        $r=$r->fetch_array(MYSQLI_ASSOC);
                        echo "
                            <tr>
                                <td>{$v['id']}</td>
                                <td>{$v['name']}</td>
                                <td>{$r['num']}</td>
                                <td>
                                <a href='delposition.php?id={$v["id"]}' class='btn btn-danger btn-sm'>删除</a>
                            <a href='updateposition.php?id={$v["id"]}' class='btn btn-warning btn-sm'>修改</a>
                                </td>
                            </tr>
                        ";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>