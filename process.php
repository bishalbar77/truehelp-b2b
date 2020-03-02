<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

$param_id = $_SESSION["id"];

$workID = trim($_REQUEST["workerid"]);

$companyID = trim($_REQUEST["companyid"]);

$statUS = trim($_REQUEST["status"]);

if((!empty($workID)) && (!empty($companyID)) ){

       $workid = trim($_POST["work-id"]);

       $companyid = trim($_POST["company-id"]);

       if(empty($title_err) && empty($message_err)){    

          $query = "UPDATE employees SET status=$statUS WHERE id='$workID'";

          $data = mysqli_query ($link, $query)or die(mysqli_error($link));

          if($data)
          {
             header("location: verifications.php");
          }             

        }

   mysqli_close($link);

}

 ?>

