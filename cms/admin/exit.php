<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29/029
 * Time: 10:30
 */
session_start();
unset($_SESSION["user"]);
if(isset($_SESSION["user"])){
    $msg="退出失败";
    $href="admin.php";
}else{
    $msg="退出成功";
    $href="login.html";
}
include('message.html');