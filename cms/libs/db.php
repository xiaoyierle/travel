<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29/029
 * Time: 10:24
 */
$db=new mysqli("localhost","root","","cms");
$db->query("set names utf8");
if($db->connect_errno){
    echo "数据库连接失败".$db->connect_error;
    exit();
}