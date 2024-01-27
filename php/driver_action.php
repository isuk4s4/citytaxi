<style>
    .flex{
        display: flex;
    }
    .box{
        margin-left: 1rem;
    }
</style>
<?php 
if(isset($_GET['update']))
{
   mysqli_query($con,"UPDATE taxi JOIN hire ON taxi.id = hire.driverid SET taxi.availability = 'busy' WHERE hire.id = 6;");
echo mysqli_affected_rows($con);
}
if(isset($_GET['action'])){
    $id = $_GET['id'];
    mysqli_query($con,"UPDATE taxi, hire SET taxi.availability = 'available', hire.status = 'done' WHERE taxi.id = hire.driverid AND hire.id = '$id'");
    if(!mysqli_affected_rows($con) == 0){
        echo "<script>location.href='?page=home';</script>";
    }
}?>
<div class="main">
    <div class="sub">
        <div class="title">Telop dashboard</div>
        <div class="sub__taxi">
           <?php 
    $id = $_GET['id'];

           $sql = "SELECT
           hire.*,
           km.tol AS location_name,
           km.froml AS froml
       
       FROM
           hire
       LEFT JOIN km ON hire.locationid = km.id
       WHERE
           hire.`id` = '$id';";
           $result = mysqli_query($con, $sql);
           $data = mysqli_fetch_array($result);
           ?>
           
            <div class="flex">
                <div class="name">Passenger location:</div>
                <div class="box"><?php echo $data['froml'] ;?></div>
            </div>
            <div class="flex">
                <div class="name">Passenger destination:</div>
                <div class="box"><?php echo $data['location_name'] ;?></div>
            </div>               <div class="flex"> <a href="?page=driver&id=<?php echo $data['id']; ?>&update=take">
             <button style="padding: 0.4rem 2rem;
  font-weight: 500;
  font-family: 'Poppins', sans-serif; margin-top:1rem">Take</button>
         </a>
            <a href="?page=driver&id=<?php echo $data['id']; ?>&action=active">
             <button style="padding: 0.4rem 2rem;
  font-weight: 500;
  font-family: 'Poppins', sans-serif; margin-top:1rem">Done!</button>
         </a>
         </div>
        
    </div>
</div>