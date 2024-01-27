<?php 
session_start();
require_once('../db/db.php');

if(isset($_SESSION['log'])){
$id = $_SESSION['id'];
if(empty($id)){
  echo '<script>location.href="Driver_busy.html";</script>';

}
}else{
  echo '<script>location.href="Driver_busy.html";</script>';
}
$query = mysqli_query($con,"SELECT * FROM `taxi` where `id`='$id' and `availability`='available'");
if(mysqli_num_rows($query) > 0){
?>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");


body{
 background-color:#f5eee7;
 font-family: "Poppins", sans-serif;
 font-weight: 300;
}

.container{

 height: 100vh;

}

.card{

 border: none;
}

.card-header {
     padding: .5rem 1rem;
     margin-bottom: 0;
     background-color: rgba(0,0,0,.03);
     border-bottom: none;
 }

 .btn-light:focus {
     color: #212529;
     background-color: #e2e6ea;
     border-color: #dae0e5;
     box-shadow: 0 0 0 0.2rem rgba(216,217,219,.5);
 }

 .form-control{

   height: 50px;
border: 2px solid #eee;
border-radius: 6px;
font-size: 14px;
 }

 .form-control:focus {
color: #495057;
background-color: #fff;
border-color: #039be5;
outline: 0;
box-shadow: none;

}

.input{

position: relative;
}

.input i{

   position: absolute;
top: 16px;
left: 11px;
color: #989898;
}

.input input{

text-indent: 25px;
}

.card-text{

font-size: 13px;
margin-left: 6px;
}

.certificate-text{

font-size: 12px;
}


.billing{
font-size: 11px;
}  

.super-price{

   top: 0px;
font-size: 22px;
}

.super-month{

   font-size: 11px;
}


.line{
color: #bfbdbd;
}

.free-button{

   background: #1565c0;
height: 52px;
font-size: 15px;
border-radius: 8px;
}


.payment-card-body{

flex: 1 1 auto;
padding: 24px 1rem !important;

}
</style>
<?php
$froml = $_GET['from'];
$tol = $_GET['destination']; 
if(isset($_GET['from']) and isset($_GET['destination']) and isset($_POST['date']) and  isset($_POST['card']) and isset($_POST['cv'])){
  
  $query2 = mysqli_query($con,"SELECT * FROM `km` where `froml`='$froml'  and `tol`='$tol'");
  $row2 = mysqli_fetch_array($query2);
  $queryt2 = mysqli_query($con,"SELECT * FROM `taxi` where `id`='$id'");
  $row12 = mysqli_fetch_array($queryt2);
  $clientid = $_SESSION['log'];
  function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
  }
  $uuid = guidv4();
  mysqli_query($con,"INSERT INTO `hire`(`clientuuid`, `driverid`, `locationid`, `price`, `status`,`uuid`) VALUES ('$clientid','$id','".$row2['id']."',".$row2['distance']*$row12['price'].",'pending','$uuid')");
  echo "<script>location.href='rate.php?id=$uuid';</script>";
}
?>
<div class="container d-flex justify-content-center mt-5 mb-5">

            

            <div class="row g-3">

              <div class="col-md-6">  
                
                <span>Payment Method</span>
                <div class="card">

                  <div class="accordion" id="accordionExample">
                    
                 
                    <div class="card">
                      <div class="card-header p-0">
                        <h2 class="mb-0">
                          <button class="btn btn-light btn-block text-left p-3 rounded-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="d-flex align-items-center justify-content-between">

                              <span>Credit card</span>
                              <div class="icons">
                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                <img src="https://i.imgur.com/35tC99g.png" width="30">
                                <img src="https://i.imgur.com/2ISgYja.png" width="30">
                              </div>
                              
                            </div>
                          </button>
                        </h2>
                      </div>
                      <form action="#" method="post">
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body payment-card-body">
                          
                          <span class="font-weight-normal card-text">Card Number</span>
                          <div class="input">

                            <i class="fa fa-credit-card"></i>
                            <input type="text" class="form-control" name="card" placeholder="0000 0000 0000 0000" id='card'>
                            
                          </div> 

                          <div class="row mt-3 mb-3">

                            <div class="col-md-6">

                              <span class="font-weight-normal card-text">Expiry Date</span>
                              <div class="input">

                                <i class="fa fa-calendar"></i>
                                <input type="text" name="date" class="form-control" placeholder="MM/YY" id="date"  />
                                
                              </div> 
                              
                            </div>


                            <div class="col-md-6">

                              <span class="font-weight-normal card-text">CVC/CVV</span>
                              <div class="input">

                                <i class="fa fa-lock"></i>
                                <input type="text"  name='cv' class="form-control" placeholder="000" id='cv'>
                                
                              </div> 
                              
                            </div>
                            

                          </div>

                          <span class="text-muted certificate-text"><i class="fa fa-lock"></i> Your transaction is secured with ssl certificate</span>
                         
                        </div>
                      </div>

                      
                    </div>
                    
                  </div>
                  
                </div>

              </div>

              <div class="col-md-6">
                  <span>Summary</span>

                  <div class="card">

                    <div class="d-flex justify-content-between p-3">

                      <div class="d-flex flex-column">

                        <span>Pay <i class="fa fa-caret-down"></i></span>
                        <a href="#" class="billing"</a>
                        
                      </div>

                      <div class="mt-1">
                        <sup class="super-price"><?php 
                        
                        $query = mysqli_query($con,"SELECT * FROM `km` where `froml`='$froml'  and `tol`='$tol'");
                        $row = mysqli_fetch_array($query);
                        $queryt = mysqli_query($con,"SELECT * FROM `taxi` where `id`='$id'");
                        $row1 = mysqli_fetch_array($queryt);
                        echo $row1['price'] * $row['distance'];
                        
                        ?></sup>
                        <span class="super-month">/km</span>
                      </div>
                      
                    </div>

                    <hr class="mt-0 line">

                    <div class="p-3">

                      <div class="d-flex justify-content-between mb-2">

                        <span>Refferal Bonouses</span>
                        <span>-$2.00</span>
                        
                      </div>

                      <div class="d-flex justify-content-between">

                        <span>Vat <i class="fa fa-clock-o"></i></span>
                        <span>-20%</span>
                        
                      </div>
                      

                    </div>

                    <hr class="mt-0 line">


                    <div class="p-3 d-flex justify-content-between">

                      <div class="d-flex flex-column">

                        <span>Today you pay(US Dollars)</span>                        
                      </div>
                      <span>$7.0</span>

                      

                    </div>


                    <div class="p-3">

                    <button class="btn btn-primary btn-block free-button">Hire</button> 
                    </div>



                    
                  </div>
              </div>
              
            </div>
            
</div>
          </div>
          
          <?php }else{
            echo '<script>location.href="/Driver_busy.html";</script>';
          }?> 