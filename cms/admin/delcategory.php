<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5/005
 * Time: 9:13
 */
$id=$_GET['id'];
include "../libs/db.php";
$sql="select * from `category` where `parentid`='$id'";
$result=$db->query($sql);
if($result->num_rows>0){
    //$result->num_rows结果的条数
    $href="showcategory.php";
    $msg="含有子栏目不能删除";
    include "message.html";
    exit();
}
$sql="delete from `category` where id='$id'";
$db->query($sql);
if($db->affected_rows==1){
    $msg="删除成功";
}else{
    $msg="删除失败";
}
$href="showcategory.php";
include "message.html";