<?php include "header.php"?>
<?php
    $id=$_GET["id"];
    include "../libs/db.php";
    $sql="select * from `content` where id='$id'";
    $result=$db->query($sql);
    $result=$result->fetch_array(MYSQLI_ASSOC);
?>
<div class="container">
    <h3><?php echo $result["title"]?></h3>
    <h4><?php echo $result["time"]?></h4>
    <div>
        <img src="<?php echo $result["image"]?>" alt="">
    </div>
    <p>
        <?php echo $result["content"]?>
    </p>
</div>
</body>
</html>