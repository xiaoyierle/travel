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
                   <option value='{$v["id"]}'>{$line}{$v["cat_name"]}</option>
                ";
            table($db,++$num,$v['id']);
        }
    }
    table($db);
    ?>
</head>
<body>
    <h3 class="text-center">添加栏目</h3>
<div class="container">
    <form action="checkaddcategory.php" class="form-horizontal">
        <div class="form-group">
            <label for="categorys" class="control-label col-sm-2">选择所属分类</label>
            <div class="col-sm-4">
                <select name="parentid" id="categorys" class="form-control">
                    <option value="0">作为一级栏目</option>
                    <?php
                        echo $str;
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label" required>栏目名称</label>
            <div class="col-sm-4">
                <input type="text" placeholder="请输入栏目名称" class="form-control" name='catename'>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 col-sm-offset-2">
                <input type="submit" class="btn btn-default">
            </div>
        </div>
    </form>
</div>
</body>
</html>