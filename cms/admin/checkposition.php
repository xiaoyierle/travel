<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5/005
 * Time: 15:04
 */
$id=$_GET["id"];
$name=$_GET["posiname"];
include "../libs/db.php";
$sql="update `position` set `name`='$name' where `id`='$id'";
$db->query($sql);
if($db->affected_rows==1){
    $msg="修改成功";
    $href="showposition.php";
}else{
    $msg="修改失败";
    $href="updateposition.php?id=$id";
}
include "message.html";
