<?php 
session_start();
require_once("../db/db.php");
?>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <style>::-webkit-scrollbar {
                                  width: 8px;
                                }
                                /* Track */
                                ::-webkit-scrollbar-track {
                                  background: #f1f1f1; 
                                }
                                 
                                /* Handle */
                                ::-webkit-scrollbar-thumb {
                                  background: #888; 
                                }
                                
                                /* Handle on hover */
                                ::-webkit-scrollbar-thumb:hover {
                                  background: #555; 
                                } body{

	background-color: #f7f6f6;
}

.card{

	width: 350px;
	border: none;
	box-shadow: 5px 6px 6px 2px #e9ecef;
	border-radius: 12px;
}

.circle-image img{

	border: 6px solid #fff;
    border-radius: 100%;
    padding: 0px;
    top: -28px;
    position: relative;
    width: 70px;
    height: 70px;
    border-radius: 100%;
    z-index: 1;
    background: #e7d184;
    cursor: pointer;

}


.dot {
      height: 18px;
    width: 18px;
    background-color: blue;
    border-radius: 50%;
    display: inline-block;
    position: relative;
    border: 3px solid #fff;
    top: -48px;
    left: 186px;
    z-index: 1000;
}

.name{
	margin-top: -21px;
	font-size: 18px;
}


.fw-500{
	font-weight: 500 !important;
}


.start{

	color: green;
}

.stop{
	color: red;
}


.rate{

	border-bottom-right-radius: 12px;
	border-bottom-left-radius: 12px;

}



.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 30px;
    font-weight: 300;
    color: #FFD600;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}


.buttons{
	top: 36px;
    position: relative;
}


.rating-submit{
	border-radius: 15px;
	color: #fff;
	    height: 49px;
}


.rating-submit:hover{
	
	color: #fff;
}</style>
<?php 
$uuid = $_GET['id'];
$query = mysqli_query($con,"SELECT * FROM `hire` where `uuid`='$uuid'");
$row = mysqli_fetch_array($query);
$driverid = $row['driverid'];
$locationid = $row['locationid'];
$driver_data = mysqli_query($con,"SELECT * FROM `taxi` where `id`='$driverid'");
$row_driver = mysqli_fetch_array($driver_data);
$hiredata = mysqli_query($con,"SELECT * FROM `km` where `id`='$locationid'");
$hirerow = mysqli_fetch_array($hiredata);
if(isset($_POST['got'])){
    if(!isset($_POST['rate'])){
        $rate = 0;       
    }else{
        $rate = $_POST['rate'];
    }
    $run =mysqli_query($con,"INSERT INTO `rate`(`driverid`, `rate`) VALUES ('$driverid','$rate')");
    if($run){
        echo "<script>location.href='../index.php';</script>";
    }
}

?>
<div class='snippet-body'>
<div class="container d-flex justify-content-center mt-5">
<div class="card text-center mb-5">

    <div class="circle-image">
        <img src="https://visualpharm.com/assets/17/Driver-595b40b65ba036ed117d43db.svg" width="50">
    </div>

        <span class="dot"></span>

    <span class="name mb-1 fw-500"><?php echo $row_driver['driver']; ?></span>


    <div class="location mt-4">

        <span class="d-block"><i class="fa fa-map-marker start"></i> <small class="text-truncate ml-2"><?php echo $hirerow['froml'];?></small> </span>

        <span><i class="fa fa-map-marker stop mt-2"></i> <small class="text-truncate ml-2"><?php echo $hirerow['tol'];?></small> </span>
        
    </div>


    <div class="rate bg-success py-3 text-white mt-3">

        <h6 class="mb-0">Rate your driver</h6>
        <form action="#" method="post">

        
        <div class="rating"> 
        <input name="got" hidden>    
        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
        </div>


        <div class="buttons px-4 mt-0">

        <button class="btn btn-warning btn-block rating-submit">Submit</button>
        </form>
    </div>

        
    </div>




    
    
</div>
</div></div>