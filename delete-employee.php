<?php

// Include config file
require_once "config.php";

if(!empty($_REQUEST["ID"])){

    $workerid = $_REQUEST["ID"];

    $query = "DELETE FROM B2B_workers WHERE worker_id='".$workerid."'";

    $data = mysqli_query($link, $query)or die(mysqli_error($link));

    if($data){
       header("location: employees.php");
    }
} else {
    header("location: employees.php");
}
?>
