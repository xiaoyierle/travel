<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/4/004
 * Time: 15:37
 */
include "../libs/db.php";
session_start();
$oldpass=$_GET["pass1"];
$newpass=$_GET["pass2"];
$user=$_SESSION["user"];
$sql="select `password` from user where `username`='$user'";
$result=$db->query($sql);
$result=$result->fetch_all(MYSQLI_ASSOC);
if($result[0]['password']!=$oldpass){
    $msg="密码输入错误";
    $href="changepass.php";
    include "message.html";
    exit();
}
$sql="update `user` set `password`='$newpass' where `username`='$user'";
$db->query($sql);
if($db->affected_rows==1){
    $msg="密码修改成功";
    $href="showadmin.php";
    include "message.html";
}else{
    $msg="密码修改失败";
    $href="changepass.php";
    include "message.html";
}