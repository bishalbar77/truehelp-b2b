<?php

// Include config file
require_once "config.php";

if(!empty($_REQUEST["ID"])){

    $del_id = $_REQUEST["ID"];

    $queryes = "SELECT * FROM B2B_verification_type WHERE ID='".$del_id."'";

    $resultes = mysqli_query($link, $queryes) or die(mysqli_error($link));
 
    $fetchVal = mysqli_fetch_row($resultes);

    $typeID = $fetchVal[0];

    $queryee = "SELECT * FROM B2B_workers WHERE FIND_IN_SET($typeID, verification_type)";

    $resultees = mysqli_query($link, $queryee) or die(mysqli_error($link));

    $fetchdata = mysqli_fetch_row($resultees);

    $arry = $fetchdata[18];

    $str_arr = preg_split ("/\,/", $arry);
  
    if (!in_array($typeID, $str_arr)) { 

    $query = "DELETE FROM B2B_verification_type WHERE ID='".$del_id."'";

    $data = mysqli_query($link, $query)or die(mysqli_error($link));

   	if($data){
            header("location: manage-verification-type.php?status=success");
    	} 
    
    } else {
   	header("location: manage-verification-type.php?status=error");
    }

} else {
     header("location: manage-verification-type.php?status=error");
}

?>
