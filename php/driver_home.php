<?php 

$log = $_SESSION['log'];
$query = mysqli_query($con,"SELECT
`users`.*,
taxi.uuid AS uuid,
taxi.id AS idt
FROM
users
LEFT JOIN taxi ON users.uuid = taxi.uuid
WHERE
users.`uuid` = '$log' AND taxi.driver IS NOT NULL");
if(mysqli_num_rows($query) == 0){
   echo "<script>location.href='php/driver_wiz.php';</script>";
}else{
    $rowsdriver = mysqli_fetch_array($query);
    $id = $rowsdriver['idt'];

    ?>
    
<div class="main">
    <div class="sub">
        <div class="title">Notifications</div>
        <div class="sub__taxi">
           <?php 
           $sql = "SELECT hire.*, km.tol AS location_name,km.froml
           FROM hire
           LEFT JOIN taxi ON hire.driverid = taxi.id
           LEFT JOIN km ON hire.locationid = km.id
           where hire.status = 'active' and hire.driverid = '$id';
           ";
           $result = mysqli_query($con, $sql);
           while ($row = mysqli_fetch_assoc($result)) {
            ?>
             <div class='driver' style="margin-top: 
             1rem;">
                    <div class="name"><?php echo $row['location_name']?></div>
                    <div class="model"><?php echo $row['froml']?></div>
                    <div class="get">
                        <a href="?page=driver&id=<?php echo $row['id']?>">
                            <button class='driver-btn'>Active</button></div>
                    </a>
                </div>
            <?php
           }
           ?>
            
        </div>
    </div>
</div>
    <?php
}
?>