<?php 
session_start();
require_once("../db/db.php");
$data = $_REQUEST['selectedVal'];
$id = $_SESSION['log'];
mysqli_query($con,"UPDATE `taxi` SET `availability`='$data' WHERE `uuid`='$id';");
?>