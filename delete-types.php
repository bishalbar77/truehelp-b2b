<?php

// Include config file
require_once "config.php";

if(!empty($_REQUEST["ID"])){

    $del_id = $_REQUEST["ID"];

    $queryes = "SELECT * FROM B2B_employee_type WHERE ID='".$del_id."'";

    $resultes = mysqli_query($link, $queryes) or die(mysqli_error($link));
 
    $fetchVal = mysqli_fetch_row($resultes);

    $type = $fetchVal[1];

    $querye = "SELECT * FROM B2B_workers WHERE worker_type= '$type'";

    $resultee = mysqli_query($link, $querye) or die(mysqli_error($link));

    if(!$resultee->num_rows==1){

    $query = "DELETE FROM B2B_employee_type WHERE ID='".$del_id."'";

    $data = mysqli_query($link, $query)or die(mysqli_error($link));

   	if($data){
            header("location: manage-types.php?status=success");
    	} 
    
    } else {
   	header("location: manage-types.php?status=error");
    }

} else {
     header("location: manage-types.php?status=error");
}

?>
