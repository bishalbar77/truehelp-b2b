<?php
// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// Set Amazon s3 credentials
$client = S3Client::factory([
  'version' => 'latest',
  'region'  => 'ap-south-1',
  'credentials' => [
    'key'    => "AKIA4SH5KM3GHHQL5CUF",
    'secret' => "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"
  ]
]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $tempName = md5(rand(100000,999999));
  $fileName = $tempName.$_FILES["files"]["name"];
  
  if($_FILES){
    try {
      
      $maxDimW = 700;
      $maxDimH = 400;
      list($width, $height, $type, $attr) = getimagesize( $_FILES['files']['tmp_name'] );
      
      if ( $width > $maxDimW || $height > $maxDimH ) {
        $target_filename = $_FILES['files']['tmp_name'];
        $fn     = $_FILES['photo']['tmp_name'];
        $size   = getimagesize( $fn );
        $ratio  = $size[0]/$size[1];
        
        if( $ratio > 1) {
          $width = $maxDimW;
          $height = $maxDimH/$ratio;
        } else {
          $width = $maxDimW*$ratio;
          $height = $maxDimH;
        }

        $src = imagecreatefromstring(file_get_contents($fn));
        $dst = imagecreatetruecolor( $width, $height );
        
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
        imagejpeg($dst, $target_filename);
      }
      
      $result = $client->putObject(array(
        'Bucket'        => 'cdn.gettruehelp.com',
        'Key'           => 'img/'.$fileName,
        'SourceFile'    => $_FILES["files"]["tmp_name"],
        'StorageClass'  => 'STANDARD',
        'ACL'           => 'public-read',
        'StorageClass'  => 'REDUCED_REDUNDANCY',
      ));

      if($result){
        $resData = array(
          'status'  => 'success',
          'data'    => $result['ObjectURL']
        );
        echo json_encode($resData);
      }
    } catch (S3Exception $e) {
      $resData = array(
        'status'  => 'failed',
        'data'    => $e->getMessage()
      );
      echo json_encode($resData);
    }
  }
}