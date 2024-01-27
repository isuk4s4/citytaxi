<style>
    .flex{
        display: flex;
    }
    .box{
        margin-left: 1rem;
    }
</style>
<?php 
if(isset($_GET['action'])){
    $id = $_GET['id'];
    $sql = "UPDATE `hire` SET `status`='active' WHERE  `id`='$id'";
    $query = mysqli_query($con,$sql);
    if(mysqli_affected_rows($con) > 0){echo "<script>location.href='?page=home';</script>";}

}?>
<div class="main">
    <div class="sub">
        <div class="title">Telop dashboard</div>
        <div class="sub__taxi">
           <?php 
           $id = $_GET['id'];
           $sql = "SELECT
           hire.*,
           users.uname AS client_name,
           taxi.driver AS driver_name,
           km.tol AS location_name,
           km.froml AS froml
       
       FROM
           hire
       LEFT JOIN users ON hire.clientuuid = users.uuid
       LEFT JOIN taxi ON hire.driverid = taxi.id
       LEFT JOIN km ON hire.locationid = km.id
       WHERE
           hire.`id` = '$id';";
           $result = mysqli_query($con, $sql);
           $data = mysqli_fetch_array($result);
           ?>
            <div class="flex">
                <div class="name">Passenger:</div>
                <div class="box"><?php echo $data['client_name'] ;?></div>
            </div>
            <div class="flex">
                <div class="name">driver:</div>
                <div class="box"><?php echo $data['driver_name'] ;?></div>
            </div>            <div class="flex">
                <div class="name">from:</div>
                <div class="box"><?php echo $data['froml'] ;?></div>
            </div>            <div class="flex">
                <div class="name">tol:</div>
                <div class="box"><?php echo $data['location_name'] ;?></div>
            </div>   <div class="flex">
                <div class="name">price:</div>
                <div class="box"><?php echo $data['price'] ;?></div>
            </div>
            <a href="?page=driver&id=<?php echo $data['id']; ?>&action=active">
             <button style="padding: 0.4rem 2rem;
  font-weight: 500;
  font-family: 'Poppins', sans-serif; margin-top:1rem">Conform</button>
         </a>
         </div>
        
    </div>
</div>