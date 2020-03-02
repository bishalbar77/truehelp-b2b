<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";    

$param_id 	= $_SESSION["userid"];
$company_id = $worker_id = $ratings = $reviews = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $company_id     = trim($_POST['company_id']);
    $worker_id      = trim($_POST['worker_id']);
    $onboard        = trim($_POST['onboard']);
    $photo1        = trim($_POST['photo1']);
    $photo2        = trim($_POST['photo2']);
    $currentdt 		= date('Y-m-d H:i:s');

    if(!empty($photo1)){    
    	$Val = mysqli_query($link, "INSERT INTO uploaded_documents (worker_id, company_id, filesName, created_at) VALUES ('$company_id', '$worker_id', '$photo1', '$currentdt')") or die(mysqli_error($link));
    } 

    if(!empty($photo2)){
    	$Val = mysqli_query($link, "INSERT INTO employee_pictures (company_id, worker_id, photo, created_at) VALUES ('$company_id', '$worker_id', '$photo2', '$currentdt')") or die(mysqli_error($link));
    }

    if($onboard=='yes'){
		$update = mysqli_query($link, "UPDATE employees SET company_id = '$company_id' WHERE id ='$worker_id'") or die(mysqli_error($link));
		if($update){
			echo "SUCCESS";
		} else {
			echo "FAIL_STATUS";
		}
    } else {
    	echo "FAIL_STATUS";
    }
}
exit;