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

if(isset($_FILES['file'])) {

    $tempName = md5(rand(100000,999999));
    $fileName = $tempName.$_FILES["file"]["name"]; 

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
        'Key'           => 'img/'.$fileName,
        'SourceFile'    => $_FILES["file"]["tmp_name"],
        'StorageClass'  => 'STANDARD',
        'ACL'           => 'public-read',
        'StorageClass'  => 'REDUCED_REDUNDANCY',
    ));

    if($result){
        echo $filename = $result['ObjectURL'];       
        $_SESSION["prourl"]         = $filename;
    } else {
    	echo $filename = '';
    }

}

?>