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
        $category1=$_GET['category1'];
        $category2=$_GET['category2'];
        if($category2==0){
            $catid=$category1;
        }else{
            $catid=$category2;
        }
        include "../libs/db.php";
        $sql="select * from `content` where `catid`='$catid'";
        $result=$db->query($sql);
        $result=$result->fetch_all(MYSQLI_ASSOC);
    ?>
</head>
<body>
    <h3 class="text-center">查看内容</h3>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <td>id</td>
                <td>标题</td>
                <td>时间</td>
                <td>图片</td>
                <td>内容</td>
                <td>posid</td>
                <td>操作</td>
            </tr>
            <?php
                foreach ($result as $v){
                    $content=mb_substr($v['content'],0,10,'utf-8')."...";
                    echo "
                        <tr>
                            <td>{$v['id']}</td>
                            <td>{$v['title']}</td>
                            <td>{$v['time']}</td>
                            <td><img src='{$v["image"]}' alt='' width='50px' height='50'></td>
                            <td>{$content}</td>
                            <td>{$v['posid']}</td>
                            <td>
                                <a href='delcontent.php?id={$v["id"]}' class='btn btn-danger'>删除</a>
                                <a href='updatecontent.php?id={$v["id"]}' class='btn btn-warning'>修改</a>
                            </td>
                        </tr>
                    ";
                }
            ?>
        </table>
    </div>
</body>
</html>