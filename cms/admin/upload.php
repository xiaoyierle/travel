<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5/005
 * Time: 18:32
 */
$f=$_FILES["file"];
$path="../upload/".date("y-m-d");
if(!is_dir($path)){
    if(!is_dir("../upload")){
        mkdir("../upload");
        mkdir($path);
    }else{
        mkdir($path);
    }
}
$arr=explode(".",$f['name']);
$houzhui=array_pop($arr);
$filename=md5(time()).".".$houzhui;
if(is_uploaded_file($f["tmp_name"])){
    move_uploaded_file($f["tmp_name"],$path."/".$filename);
    $fullname=$path."/".$filename;
    $fullname=substr($fullname,3);
    echo "http://localhost/PHP/0904cms/cms/".$fullname;
}