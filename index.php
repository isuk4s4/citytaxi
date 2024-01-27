<?php 
require_once("./db/db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City taxi</title><link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./assets/css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <?php 
  if(isset($_SESSION['log'])){
    if(empty($_SESSION['log'])){
        echo "<script>location.href='/php/login.php';</script>";
    }else{
        $logindetails = mysqli_real_escape_string($con,htmlspecialchars($_SESSION['log']));
        $querycheck  = "SELECT * FROM `users` WHERE `uuid`='".$logindetails."'";
        $result = mysqli_query($con,$querycheck);
        if(mysqli_num_rows($result)> 0){
          $rows = mysqli_fetch_array($result);
            if(isset($_REQUEST['page'])){
                if(empty($_REQUEST['page'])){
                    echo "<script>location.href='?page=home';</script>";
                }else{
                  //page
                  ?>
               <nav class="nav">
                      <div class="img">
                        <div class="logo"><img src="./assets/img/logo.png"></div>
                      </div>
                      <div class="list">
                      <div class="ul">
                        <ul>
                          <a href="?page=home">
                            <li class="nav__item"><i class="bx bx-car"></i></li>
                          </a>
                              <?php 
                              if($rows['role'] == 'taxi'){
                                ?>
                                <select id="test">
                                  <option>Active</option>
                                  <option>Busy</option>
                                </select>
                                <?php
                              }
                              ?>
                              <script>
 $(document).ready(function() { 
            $("#test").change(function() { 
                const selectedVal = 
                        $("#test option:selected").text();

              $.ajax({
                url:"php/status.php",
                method:"POST",
                data:{selectedVal:selectedVal}
              })
            }); 
        }); 
                              </script>
                        </ul>
                      </div>
                    </div>
                        

</nav><?php
                  if($_REQUEST['page'] == 'home'){
                    if($rows['role'] == 'client'){
                     
                      require_once('./php/client_home.php');
                    
                   }
                    if(isset($rows['role'])){
                  
                      if($rows['role'] == 'telphone'){
                       
                        require_once('./php/telphone_op.php');
                      
                     }
                     if($rows['role'] == 'taxi'){
                       
                      require_once('./php/driver_home.php');
                    
                   }
                     }
                  }
                

                  if($_REQUEST['page'] == 'driver'){
                 
                 
                    if(isset($rows['role'])){
                      if($rows['role'] == 'telphone'){
                       
                        require_once('./php/tel_hire.php');
                      
                     }
                     if($rows['role'] == 'client'){
                     
                      require_once('./php/client_taxi.php');
                    
                   } if($rows['role'] == 'taxi'){
                     
                    require_once('./php/driver_action.php');
                  
                 }
                     }
                  }
                }
            }else{
                echo "<script>location.href='?page=home';</script>";

            }
        }else{
    echo "<script>location.href='php/login.php';</script>";

        }
    }
  }else{
    echo "<script>location.href='php/login.php';</script>";
  }
  ?>  
</body>
</html>