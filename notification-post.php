<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

$company_id = $notification = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$company_id     = trim($_POST['company_id']);
	$notification   = trim($_POST['notification']);
	addNotification($link, $company_id, $notification);
}