<?php include "header.php"?>
<?php
    $id=$_GET["id"];
    include '../libs/db.php';
    $sql="select * from `category` where `parentid` ='$id'";
    $result=$db->query($sql);
    $result=$result->fetch_all(MYSQLI_ASSOC);
    if(count($result)==0){
        $sql="select * from `content` where `catid`='$id'";
        $r=$db->query($sql);
        $r=$r->fetch_all(MYSQLI_ASSOC);
    }
    if($id==1){
        $sql="select * from `content` where posid=6";
        $row=$db->query($sql);
        $row=$row->fetch_all(MYSQLI_ASSOC);
    }
?>
<div class="container">
    <ul>
        <?php
        foreach ($result as $v) {
                echo "
                    <li>
                        <a href='list.php?id={$v["id"]}'>{$v['cat_name']}</a> 
                    </li>
                ";
            }
        ?>
    </ul>
</div>
<?php
    if(isset($r)){
        echo"<ul>";
            foreach ($r as $v){
                echo "<li>
                           <a href='show.php?id={$v["id"]}'>{$v["title"]}</a>
                    </li>";
            }
        echo"</ul>";
    }
?>
<?php
    if(isset($row)){
        echo"<ul>";
        foreach ($row as $v){
            echo "<li>
                           <a href='show.php?id={$v["id"]}'>{$v["title"]}</a>
                  </li>";
        }
        echo"</ul>";
    }
?>
</body>
</html>