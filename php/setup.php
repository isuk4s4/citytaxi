<?php
$log = $_SESSION['log'];
$name = $_GET['name'];
$model = $_GET['model'];
$price = $_GET['price'];
mysqli_query($con,"INSERT INTO `taxi`(`driver`, `model`, `availability`, `price`, `uuid`) VALUES ('$name','$model','available','$price','$log')");
?>