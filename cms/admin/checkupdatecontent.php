<?php
$id=$_GET["id"];
$catid=$_GET["catid"];
$title=$_GET["title"];
$time=$_GET["time"];
$image=$_GET["image"];
$content=$_GET["content"];
$posid=$_GET["posid"];
include "../libs/db.php";
$sql="update `content` set `title`='$title',`time`='$time',`image`='$image',`content`='$content',`posid`='$posid',catid='$catid' where id='$id'";
$db->query($sql);
if($db->affected_rows==1){
    $msg="修改成功";
    $href="showcontent.php";
}else{
    $msg="修改失败";
    $href="showcontent.php";
}
include "message.html";