<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5/005
 * Time: 16:46
 */
$id=$_GET["id"];
include "../libs/db.php";
$sql="select * from `category` where `parentid`='$id'";
$result=$db->query($sql);
$result=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($result);