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
<body>
    <h3 class="text-center">添加推荐位</h3>
    <form action="checkaddposition.php" class="form-horizontal">
        <div class="container">
           <div class="row">
               <div class="form-group">
                   <label for="pos" class="control-label col-sm-2 col-sm-offset-2">推荐位名称</label>
                   <div class="col-sm-4">
                       <input type="text" placeholder="请输入推荐位名称" required name="posname" id="pos" class="form-control">
                   </div>
               </div>
               <div class="form-group">
                   <div class="col-sm-2 col-sm-offset-4">
                       <input type="submit" class="btn btn-default">
                   </div>
               </div>
           </div>
        </div>
    </form>
</body>
</html>