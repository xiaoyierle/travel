<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/6/006
 * Time: 10:57
 */
$id=$_GET["id"];
include "../libs/db.php";
$sql="delete from `content` where id='$id'";
$db->query($sql);
if($db->affected_rows==1){
    $msg="删除成功";
    $href="showcontent.php";
}else{
    $msg="删除失败";
    $href="showcontent.php";
}
include "message.html";