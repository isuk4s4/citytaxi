<?php
require_once("./db/db.php")
?>
<div class="main">
    <div class="sub">
        <div class="title">Book a taxi</div>
        <div class="sub__taxi">
           
            <?php 
            $query = mysqli_query($con,"SELECT * FROM `taxi` where `availability`='available'");
            if(mysqli_num_rows($query) > 0){
            while($rows = mysqli_fetch_assoc($query)){
                ?>
                <div class='driver'>
                    <div class="name"><?php echo $rows['driver']?></div>
                    <div class="model"><?php echo $rows['model']?></div>
                    <div class="get">
                        <a href="?page=driver&id=<?php echo $rows['id']?>">
                            <button class='driver-btn'>Hire</button></div>
                    </a>
                </div>
                <?php
            }
            }
            ?>
        </div>
    </div>
</div>