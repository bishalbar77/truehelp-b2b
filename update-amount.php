<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedinUser"]) || $_SESSION["loggedinUser"] !== true){
    header("location: login.php");
    exit;
}

$param_id 	= $_SESSION["userid"];
$company_id = $worker_id = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $company_id     = trim($_POST['company_id']);
    $worker_id      = trim($_POST['worker_id']);
    $amount      	= trim($_POST['subTotal']);
    $order_id       = trim($_POST['order_id']);
    $gst    	    = trim($_POST['gst']);
    $subTotal       = trim($_POST['finalTotal']);
    $createdDate	= date('Y-m-d H:i:s');

    $update = mysqli_query($link, "UPDATE payment_histories SET additional_amount='$subTotal', gst = '$gst', subTotal='$subTotal' WHERE temp_id ='$order_id'") or die(mysqli_error($link));
   
}
exit;