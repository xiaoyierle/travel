<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/6/006
 * Time: 10:14
 */
$category1=$_GET["category1"];
$category2=$_GET["category2"];
if($category2!=0){
    $category=$category2;
}else{
    $category=$category1;
}
$title=$_GET["title"];
$time=$_GET["time"];
$image=$_GET["image"];
$content=$_GET["content"];
$posid=$_GET["posid"];
include "../libs/db.php";
$sql="insert into `content` (`title`,`time`,`image`,`content`,`posid`,`catid`)values('$title','$time','$image','$content','$posid','$category')";
$db->query($sql);
if($db->affected_rows==1){
    $msg="插入成功";
    $href="addcontent.php";
}else{
    $mag="插入失败";
    $href="addcontent.php";
}
include "message.html";