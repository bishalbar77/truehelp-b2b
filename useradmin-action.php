<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

$param_id 		= $_SESSION["id"];
$userID 		= $_GET["roleUserId"];
$role 			= $_GET["role"];
$currStatus 	= $_GET["currStatus"];

if(!empty($userID)){
	if($role == '-1'){
		$query = "UPDATE B2B_company_details SET status='$role' WHERE ID='$userID'";	
	} else if($currStatus == '-1'){
		$query = "UPDATE B2B_company_details SET status='1', role='$role' WHERE ID='$userID'";
	} else {
		$query = "UPDATE B2B_company_details SET role='$role' WHERE ID='$userID'";
	}	
	$data = mysqli_query ($link, $query)or die(mysqli_error($link));
	if($data) {
		header("location: manage-users.php");
	}
} else {
	header("location: manage-users.php");
}
mysqli_close($link);
?>