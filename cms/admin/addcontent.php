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
    <h3 class="text-center">添加内容</h3>
    <div class="container">
        <form action="checkaddcontent.php" class="form-horizontal">
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
                <label for="" class="control-label col-sm-2 col-sm-offset-1">内容标题</label>
                <div class="col-sm-6">
                    <input type="text" placeholder="请输入内容标题" class="form-control" name="title" required>
                </div>
            </div>
            <div class="form-group">
                <label for="title" class="control-label col-sm-2 col-sm-offset-1">发布时间</label>
                <div class="col-sm-6">
                    <input id="title" type="datetime-local" placeholder="请输入内容标题" class="form-control" required name="time">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 col-sm-offset-1">内容图片</label>
                <div class="col-sm-6">
                    <input type="file" id="file" class="form-control">
                    <input type="hidden" name="image" id="hidden">
                    <div class="box form-control" style="width: 100%;height: 100px;border:1px solid #ccc"></div>
                    <div class="progress" style="width: 100%;height: 10px;border: 1px solid #ccc; margin: 5px 0;">
                        <div class="inner" style="height: 100%;width: 0;background: green"></div>
                    </div>
                    <input type="button" value="上传" class="btn btn-success" id="upload">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 col-sm-offset-1">内容</label>
                <div class="col-sm-6">
                    <textarea name="content" id="" cols="30" rows="10" class="form-control" style="resize: none"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-sm-2 col-sm-offset-2">推荐位</label>
                <div class="col-sm-4">
                    <?php
                        foreach ($result as $v){
                            echo "{$v['name']}<input type='radio' name='posid' value='{$v["id"]}'>";
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
    var size=1024*1024*10;
    var reg=/image\/(jpeg|jpg|gif|png)/;
    //MIME 类型文本图片应用？  image/png image/gif image/jpg image/jpeg
    $("#file").change(function(){
        var file=this.files[0];
        console.log(file)
        if(file.size>size){
            alert("文件大小超出限制");
            return;
        }
        if(!reg.test(file.type)){
            alert("文件类型不符合要求");
            return;
        }
        var fr=new FileReader(file);//实例化FILEReader对象 读取文件
        fr.readAsDataURL(file);     //设置以哪种方式读取文件 readAsDataURL(); 把文件读取为DATAURLata 就是图片在浏览器里呈现的一种格式
        fr.onload=function(){ //检测读取完成的事件 读取完成后 FileReader 对象会将读取的结果保存到自身的result属性身上
            $("<img>").attr("src",fr.result).css({
                width:"auto",
                height:"100%"
            }).appendTo(".box");
        }

    });
    $("#upload").click(function(){
        var file=$("#file").get(0).files[0];
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
//            $("[type=hidden]").attr("value",xhr.response);
            $("#hidden").val(xhr.response);
        }
        /*$.ajax({
            url:"upload.php",
            type:"post",
            data:"formdata",
            processData:false,//jq会把字符串的格式进行解析转换，在这里不需要对上传的内容进行格式处理
            contentType:false,//不要修改请求头信息
            success:function(r){
                alert(1);
            }
        })*/
    })
</script>
</html>