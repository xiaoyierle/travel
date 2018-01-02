<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5/005
 * Time: 11:09
 */
$parentid=$_GET["parentid"];
$catname=$_GET["catename"];
include "../libs/db.php";
$sql="insert into `category` (`cat_name`,`parentid`)values('$catname','$parentid')";
$db->query($sql);
if($db->affected_rows==1){
    $msg="插入成功";
    $href="showcategory.php";
}else{
    $msg="插入失败";
    $href="addcategory.php";
}
include "message.html";