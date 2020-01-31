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
    $ratings    	= trim($_POST['ratings']);
    $reviews    	= trim($_POST['reviews']);
    $onboard        =trim($_POST['onboard']);
    $dor        =trim($_POST['dor']);
    $currentdt 		= date('Y-m-d H:i:s');
    $review = mysqli_query($link, "INSERT INTO B2B_employee_review (company_id, worker_id, ratings, reviews, status) VALUES ('$company_id', '$worker_id', '$ratings', '$reviews', '0')") or die(mysqli_error($link));
    if($review){
		$update = mysqli_query($link, "UPDATE B2B_workers SET company_id = '0' WHERE worker_id ='$worker_id'") or die(mysqli_error($link));
		$empupdate = mysqli_query($link, "UPDATE B2B_employment_history SET dor = '$currentdt', employmentStatus = '0' WHERE employeId ='$worker_id' AND companyId = '$company_id'") or die(mysqli_error($link));

            if(!empty($worker_id) || !empty($onboard)){ 
              if($onboard=='yes'){
                    mysqli_query($link, "UPDATE B2B_workers SET company_id = '$param_id' WHERE worker_id ='$worker_id'") or die(mysqli_error($link));
                    mysqli_query($link, "UPDATE B2B_employment_history SET dor = '$dor', employmentStatus = '0' WHERE employeId ='$worker_id'") or die(mysqli_error($link));                
              } 

              if($onboard=='no'){
                    mysqli_query($link, "UPDATE B2B_workers SET company_id = '0' WHERE worker_id ='$worker_id'") or die(mysqli_error($link));                    
              }
            } 

		if($update){
			echo "SUCCESS";
		} else {
			echo "FAIL_STATUS";
		}
    } else {
    	echo "FAIL_REVIEW";
    }
}
exit;