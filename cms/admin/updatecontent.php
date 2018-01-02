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
    $id = $_GET["id"];
    include "../libs/db.php";
    $sql = "select * from `content` where `id`='$id'";
    $result = $db->query($sql);
    $result = $result->fetch_array(MYSQLI_ASSOC);
    $sql = "select * from `position`";
    $result1 = $db->query($sql);
    $result1 = $result1->fetch_all(MYSQLI_ASSOC);
    ?>
</head>
<body>
<h3 class="text-center">修改内容</h3>
<div class="container">
    <form action="checkupdatecontent.php" class="form-horizontal">
        <div class="form-group">
            <label for="" class="control-label col-sm-2 col-sm-offset-1">id</label>
            <div class="col-sm-6">
                <input type="text"  class="form-control" name="id" required value="<?php echo $result['id']?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2 col-sm-offset-1">所属栏目</label>
            <div class="col-sm-6">
                <input type="text"  class="form-control" name="catid" required value="<?php echo $result['catid']?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2 col-sm-offset-1">修改标题</label>
            <div class="col-sm-6">
                <input type="text" placeholder="请输入内容标题" class="form-control" name="title" required
                       value="<?php echo $result['title'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="control-label col-sm-2 col-sm-offset-1">修改时间</label>
            <div class="col-sm-6">
                <input type="datetime-local" class="form-control" required name="time"
                       value="<?php echo strtr($result['time'],' ','T') ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2 col-sm-offset-1">修改图片</label>
            <div class="col-sm-6">
                <input type="file" id="file" class="form-control">
                <input type="hidden" name="image" id="hidden" value="<?php echo $result["image"] ?>">
                <div class="box form-control"
                     style="width: 100%;height: 100px;border:1px solid #ccc;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;">
                    <img src="<?php echo $result["image"] ?>" alt="" style="width: auto;height: 100%;">
                </div>
                <div class="progress" style="width: 100%;height: 10px;border: 1px solid #ccc; margin: 5px 0;">
                    <div class="inner" style="height: 100%;width: 0;background: green"></div>
                </div>
                <input type="button" value="上传" class="btn btn-success" id="uploadbtn">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2 col-sm-offset-1">修改内容</label>
            <div class="col-sm-6">
                <textarea name="content" id="" cols="30" rows="10" class="form-control" style="resize: none"><?php echo $result["content"]?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="control-label col-sm-2 col-sm-offset-2">推荐位修改</label>
            <div class="col-sm-6">
                <?php
                foreach ($result1 as $v){
                    if($result["posid"]==$v["id"]){
                        echo "{$v['name']}<input type='radio' name='posid' value='{$v["id"]}' checked='checked'>";
                    }else{
                        echo "{$v['name']}<input type='radio' name='posid' value='{$v["id"]}'>";
                    }
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2 container col-sm-offset-5">
                <input type="submit" class="btn btn-default">
            </div>
        </div>
    </form>
</div>
<script src="../static/js/jQuery1.10.2.js"></script>
<script>
    var size=1024*1024*10;
    var reg=/image\/(png|gif|jpg|jpeg)/;
    //   MIME 类型   image/png image/gif image/jpg image/jpeg
    $("#file").change(function(){
        var file=this.files[0];
        if(file.size>size){
            alert("文件大小超出限制");
            return;
        }
        if(!reg.test(file.type)){
            alert("文件类型不符合");
            return;
        }
        var fr=new FileReader();
        fr.readAsDataURL(file);
        fr.onload=function(){
            $(".box").empty();
            $("<img>").attr("src",fr.result).css({
                height:"100%",
                width:"auto"
            }).appendTo(".box");
        }
    });
    $("#uploadbtn").click(function(){
        var file=$("#file")[0].files[0];
        if(!file){
            return;
        }
        var formdata=new FormData();
        formdata.append("file",file);
        var xhr=new XMLHttpRequest();
        xhr.upload.onprogress=function(e){
            var bili=e.loaded/e.total*100+"%";
            $(".inner").css("width",bili);
        }
        xhr.open("post","upload.php");
        xhr.send(formdata);
        xhr.onload=function(){
            $("#hidden").val(xhr.response);
        }
    });
</script>
</body>
</html>