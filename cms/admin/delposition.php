<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5/005
 * Time: 14:55
 */
$id=$_GET["id"];
include "../libs/db.php";
$sql="delete from `position` where id='$id'";
$db->query($sql);
if($db->affected_rows==1){
    $msg="删除成功";
}else{
    $msg="删除失败";
}
$href="showposition.php";
include "message.html";