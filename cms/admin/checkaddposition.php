<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5/005
 * Time: 14:31
 */
$posiname=$_GET["posname"];
include "../libs/db.php";
$sql="insert into `position` (`name`)values('$posiname')";
$db->query($sql);
if($db->affected_rows==1){
    $msg="插入成功";
    $href="showposition.php";
}else{
    $msg="插入失败";
    $href="addposition.php";
}
include "message.html";