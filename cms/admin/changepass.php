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
        label.error{
            color: #f00;
        }
    </style>
</head>
<body>
    <h3 class="text-center">修改密码</h3>
    <div class="container">
        <form action="checkpass.php">
            <div class="form-group">
                <label for="exampleInputEmail1">密码</label>
                <input type="password" class="form-control" id="oldpassword" placeholder="请输入原始密码" name="pass1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">新密码</label>
                <input type="password" class="form-control" id="password1" placeholder="请输入新密码" name="pass2">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">重新输入密码</label>
                <input type="password" class="form-control" id="password2" placeholder="重新输入新密码" name="pass3">
            </div>
            <button type="submit" class="btn btn-default">提交</button>
<!--            <input type="submit" class="btn btn-default" value="提交">-->
        </form>
    </div>
</body>
<script src="../static/js/jQuery1.10.2.js"></script>
<script src="../static/js/jquery.validate.js"></script>
<script>
    $("form").validate({
        rules:{
            pass1:{
                required:true,
            },
            pass2:{
                required:true,
                rangelength:[6,8],
            },
            pass3:{
                required:true,
                equalTo:"#password1"
            },
        },
        messages:{
            pass1:{
                required:"密码必须填写"
            },
            pass2:{
                required:"密码必须填写",
                rangeLength:"密码的长度必须是六到八位",
            },
            pass3:{
                required:"密码必须填写",
                equalTo:"两次密码不一致"
            },
        },
    })
</script>
</html>