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
        $sql="select * from `category` where `id`='$id'";
        $result=$db->query($sql);
        $result=$result->fetch_array(MYSQLI_ASSOC);
    ?>
</head>
<body>
    <h3 class="text-center">修改栏目</h3>
    <div class="container">
           <form action="checkcategory.php">
               <div class="form-group row col-sm-offset-2">
                   <div class="col-sm-2 text-right">
                       <label for="cat_id" class="control-label">id</label>
                   </div>
                   <div class="col-sm-6">
                       <input id="cat_id" type="text" class="form-control" value="<?php echo $result['id']?>" readonly="readonly" name="id">
                   </div>
               </div>
               <div class="form-group row col-sm-offset-2">
                   <div class="col-sm-2 text-right">
                       <label for="cat_name">栏目名称</label>
                   </div>
                   <div class="col-sm-6">
                       <input id="cat_name" type="text" class="form-control" value="<?php echo $result['cat_name']?>" required="required" name="catname">
                   </div>
               </div>
               <div class="form-group row">
                   <div class="col-sm-2 col-sm-push-4">
                   <input type="submit" class="btn btn-sm btn-default">
                   </div>
                   </div>
               </div>
           </form>
    </div>
</body>
</html>