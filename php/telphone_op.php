
<div class="main">
    <div class="sub">
        <div class="title">Telop dashboard</div>
        <div class="sub__taxi">
           <?php 
           $sql = "SELECT hire.*, users.uname AS client_name, taxi.driver AS driver_name, km.tol AS location_name
           FROM hire
           LEFT JOIN users ON hire.clientuuid = users.uuid
           LEFT JOIN taxi ON hire.driverid = taxi.id
           LEFT JOIN km ON hire.locationid = km.id
           where hire.status = 'pending';
           
           ";
           $result = mysqli_query($con, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
            ?>
             <div class='driver' style="margin-top: 
             1rem;">
                    <div class="name"><?php echo $row['client_name']?></div>
                    <div class="model"><?php echo $row['driver_name']?></div>
                    <div class="get">
                        <a href="?page=driver&id=<?php echo $row['id']?>">
                            <button class='driver-btn'>Done</button></div>
                    </a>
                </div>
            <?php
           }
           ?>
            
        </div>
    </div>
</div>