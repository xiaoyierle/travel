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
    $id=$_GET["id"];
    include "../libs/db.php";
    $sql="select * from `position` where `id`='$id'";
    $result=$db->query($sql);
    $result=$result->fetch_array(MYSQLI_ASSOC);
    ?>
</head>
<body>
    <h3 class="text-center">修改推荐位</h3>
    <div class="container">
        <form action="checkposition.php" class="form-horizontal col-sm-offset-2">
            <div class="form-group row col-sm-offset-2">
                    <label for="posi_id" class="control-label col-sm-2">id</label>
                <div class="col-sm-6">
                    <input id="posi_id" type="text" class="form-control" value="<?php echo $result['id']?>" readonly="readonly" name="id">
                </div>
            </div>
            <div class="form-group row col-sm-offset-2">
                    <label for="cat_name" class="control-label col-sm-2">推荐位名称</label>
                <div class="col-sm-6">
                    <input id="cat_name" type="text" class="form-control" value="<?php echo $result['name']?>" required name="posiname">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 col-sm-push-2">
                    <input type="submit" class="btn btn-sm btn-default">
                </div>
            </div>
    </div>
        </form>
</body>
</html>