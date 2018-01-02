<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5/005
 * Time: 9:50
 */
$id=$_GET["id"];
$name=$_GET['catname'];
include "../libs/db.php";
$sql="update `category` set `cat_name`='$name' where `id`='$id'";
$db->query($sql);
if($db->affected_rows==1){
    $msg="修改成功";
    $href="showcategory.php";
}else{
    $msg="修改失败";
    $fref="updatecategory.php?id=$id";
}
include "message.html";