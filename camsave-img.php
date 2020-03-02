<?php
// Initialize the session
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require 'sns/vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

define('UPLOAD_DIR', './camsave/');
$image_parts = explode(";base64,", $_POST['photo']);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];
$image_base64 = base64_decode($image_parts[1]);
$file = UPLOAD_DIR . uniqid() . '.png';
$filename = uniqid() . '.png';

if(file_put_contents($file, $image_base64)){
	$file;
} else {
	$file;
}

// Set Amazon s3 credentials
$client = S3Client::factory([
'version' => 'latest',
'region'  => 'ap-south-1',
'credentials' => [
'key'    => "AKIA4SH5KM3GHHQL5CUF",
'secret' => "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"
]
]);

$result = $client->putObject(array(
'Bucket'        => 'cdn.gettruehelp.com',
'Key'           => 'img/'.$filename,
'SourceFile'    => $file,
'StorageClass'  => 'STANDARD',
'ACL'           => 'public-read',
'StorageClass'  => 'REDUCED_REDUNDANCY',
));


if($result){
    $filename = $result['ObjectURL'];

    if($_POST['uploadtype']==1){
		$_SESSION["uploaddoc"] = $filename; 	
	} 

	if($_POST['uploadtype']==2) {
		$_SESSION["uploadpro"] = $filename;
	}

    $arrayVal = array(
	  'file' => $filename,
	  'upload_type' => $_POST['uploadtype']
	);
	$account_json = json_encode($arrayVal);
	echo $account_json;
}
