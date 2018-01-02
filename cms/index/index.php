<?php include "header.php"?>
<?php include '../libs/db.php';
    $sql="select * from `content` where `posid`=1";
    $result=$db->query($sql);
    $result=$result->fetch_all(MYSQLI_ASSOC);

?>
<div class="container">
    <h3>新闻推荐</h3>
    <ul>
        <?php
        foreach ($result as $v) {
                echo "
                    <li><a href='show.php?id={$v["id"]}'>{$v["title"]}</a></li>
                ";
            }
        ?>
    </ul>
</div>
</body>
</html>