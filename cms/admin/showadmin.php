<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.css">
</head>
<?php
    include "../libs/db.php";
    $sql="select * from user";
    $result=$db->query($sql);
    $result=$result->fetch_all(MYSQLI_ASSOC);
?>
<body>
    <h3 class="text-center">管理员信息</h3>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>用户名</th>
                <th>密码</th>
            </tr>
            <tr>
                <?php
                    foreach ($result as $v){
                        echo "
                            <td>{$v['id']}</td>
                            <td>{$v['username']}</td>
                            <td>{$v['password']}</td>
                        ";
                    }
                ?>
            </tr>
        </table>
    </div>
</body>
</html>