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
//            table($db,++$num,$v['id']);
        }
    }
    table($db);
    $sql="select * from `position`";
    $result=$db->query($sql);
    $result=$result->fetch_all(MYSQLI_ASSOC);
    ?>
</head>
<body>
    <h3 class="text-center">选择栏目</h3>
    <div class="container">
        <form action="content.php" class="form-horizontal">
            <div class="form-group">
                <label for="category1" class="control-label col-sm-2 col-sm-offset-1">所属栏目</label>
                <div class="col-sm-6">
                    <select name="category1" id="category1" class="form-control">
                        <option value="0">先择一级栏目</option>
                        <?php echo $str;?>
                    </select>
                </div>
            </div>
            <div class="form-group" id="erji" style="display: none;">
                <label for="category2" class="control-label col-sm-2 col-sm-offset-1">所属二级栏目</label>
                <div class="col-sm-6">
                    <select name="category2" id="category2" class="form-control">
                        <option value="0">先择二级栏目</option>
                        <?php echo $str;?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
                    <input type="submit" class="btn btn-success" value="提交">
                </div>
            </div>
        </form>
    </div>
</body>
<script src="../static/js/jQuery1.10.2.js"></script>
<script>
    $("#category1").change(function(){
        var val=$(this).val();
        if(val==0){
            return ;
        }
        $.get("getcategory.php",{id:val},function(r){
            if(r.length>0){
                $("#erji").show();
                $("#category2").html('<option value="0">先择二级栏目</option>');
                $.each(r,function(index,value){
                    $("<option>").html(value.cat_name).val(value.id).appendTo("#category2");
                })
            }else{
                $("#erji").hide();
            }
        },"json");
    });
</script>
</html>