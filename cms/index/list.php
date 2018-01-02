<?php include "header.php"?>
<?php
    $id=$_GET["id"];
    include "../libs/db.php";
    $sql="select * from `content` where `catid`='$id'";
    $result=$db->query($sql);
    $result=$result->fetch_all(MYSQLI_ASSOC);
    $sql="select * from `category` where `id`='$id'";
    $r=$db->query($sql);
    $r=$r->fetch_array(MYSQLI_ASSOC);
?>
<h3><?php echo $r["cat_name"]?></h3>
<div class="container">
    <ul>
        <?php
            foreach ($result as $v){
                echo "<li>
                          <a href='show.php?id={$v["id"]}'>{$v["title"]}</a>
                      </li>";
            }
        ?>
    </ul>
</div>
</body>
</html>