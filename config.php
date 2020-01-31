<?php
/* Database credentials. */
define('DB_SERVER', 'truehelp.cs0fysp8nud0.ap-south-1.rds.amazonaws.com');
define('DB_USERNAME', 'truehelp');
define('DB_PASSWORD', '4Hf-ZJJ-W6f-zXn');
define('DB_NAME', 'truehelp');
 
/* Connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


function addNotification($link,$compId,$msg){
	$saveDocQuery 	= "INSERT INTO B2B_company_notifications (company_id, notification) VALUES ('$compId','$msg')";
    $retData 		= mysqli_query ($link, $saveDocQuery)or die(mysqli_error($link));
    if($retData){
    	return 'SUCCESS';
    } else {
    	return 'FAIL';
    }
}

function notificationViewStatus($link,$compId,$status){
    mysqli_query ($link, "UPDATE B2B_company_notifications SET status='$status' WHERE company_id='$compId' AND status='0'")or die(mysqli_error($link));
}

?>


