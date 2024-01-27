<?php 
// session_start();
if($_GET['id']){
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $query = mysqli_query($con,"SELECT * FROM `taxi` WHERE `id`='$id' and `availability`='available'");
    if(mysqli_num_rows($query) > 0){ 
    $_SESSION['id'] = $id;
    // Opening brace for this if block
?>
    <div class="main">
    <div class="sub">
        <div class="title">Call a taxi</div>
        <div class="sub__taxi">
      <div class='input__group group'>
        <form action="php/client_pay.php?id=<?php echo $_GET['id'];?>/" method="get">
        <div class='input'>
        <label for="name">From:</label>
        <select name="from" id="">
            <?php 
            $query = mysqli_query($con,"SELECT DISTINCT `froml`, `tol` FROM km; ");
            while($rows = mysqli_fetch_assoc($query)){
                ?>
                            <option value="<?php echo $rows['froml'];?>"><?php echo $rows['froml']; ?></option>

                <?php
            }
            ?>
        </select>
      </div>
      <div class="input">
        <label for="lastname">To:</label>
        <select name="destination" id="">
            <?php 
            $query = mysqli_query($con,"SELECT DISTINCT `froml`, `tol` FROM km; ");
            while($rows = mysqli_fetch_assoc($query)){
                ?>
                            <option value="<?php echo $rows['tol'];?>"><?php echo $rows['tol']; ?></option>

                <?php
            }
            ?>
        </select>
   <button style='padding: 0.5rem 4rem;
    border: 2px solid #dfdfdf;
    border-radius: 5px;
'>Hire!</button>
      </div>
        </form>
      
    </div>
        
        </div>
      </div>
      </div>
        
    </div>
</div>
<?php } // Closing brace for the if block on line 25
    else { // This else now correctly belongs to the if block on line 25
        echo '<script>location.href="php/Driver_busy.html";</script>';
    }
} else {
    echo '<script>location.href="index.php";</script>';
} ?>