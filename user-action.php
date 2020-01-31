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

$userID = $_REQUEST["userID"];

if(!empty($userID)){

          $query = "UPDATE B2B_company_details SET role='1' WHERE ID='$userID'";

          $data = mysqli_query ($link, $query)or die(mysqli_error($link));

          if($data)
          {
             header("location: manage-users.php");
          }             

} else {

     header("location: manage-users.php");

}

mysqli_close($link);


?>
