<?php
session_start();
require_once ("../db/db.php");
$log = $_SESSION['log'];
$name = $_POST['name'];
$model = $_POST['model'];
$price = $_POST['price'];
mysqli_query($con,"INSERT INTO `taxi`(`driver`, `model`, `availability`, `price`, `uuid`) VALUES ('$name','$model','available','$price','$log')");
?>