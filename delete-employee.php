<?php

// Include config file
require_once "config.php";

if(!empty($_REQUEST["ID"])){

    $workerid = $_REQUEST["ID"];

    $query = "UPDATE networks SET status = '0' WHERE worker_id = '$workerid'";

    $data = mysqli_query($link, $query)or die(mysqli_error($link));

    if($data){
       header("location: employees.php");
    }
} else {
    header("location: employees.php");
}
?>
