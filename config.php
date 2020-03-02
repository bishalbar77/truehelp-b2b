<?php
/* Database credentials. */
define('DB_SERVER', 'truehelp.cs0fysp8nud0.ap-south-1.rds.amazonaws.com');
define('DB_USERNAME', 'truehelp');
define('DB_PASSWORD', '4Hf-ZJJ-W6f-zXn');
define('DB_NAME', 'truehelp_pro');
define('DB_PORT', '8306');
 
/* Connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


function addNotification($link,$compId,$msg){
	$created_at     = date('Y-m-d H:i:s');
	$saveDocQuery 	= "INSERT INTO company_notifications (company_id, notification, status, created_at) VALUES ('$compId','$msg','1','$created_at')";
    $retData 		= mysqli_query ($link, $saveDocQuery)or die(mysqli_error($link));
    if($retData){
    	return 'SUCCESS';
    } else {
    	return 'FAIL';
    }
}

function getProfileImage($link,$empId){
	$query      = "SELECT photo FROM employee_pictures WHERE worker_id='$empId' ORDER BY id DESC";
	$result     = mysqli_query($link, $query) or die(mysqli_error($link));
	$fetch      = mysqli_fetch_row($result);

	if(isset($fetch[0]) && !empty($fetch[0])){
		return $fetch[0];
	} else {
		return false;
	}
}

function notificationViewStatus($link,$compId,$status){
    mysqli_query ($link, "UPDATE B2B_company_notifications SET status='$status' WHERE company_id='$compId' AND status='0'")or die(mysqli_error($link));
}

?>


