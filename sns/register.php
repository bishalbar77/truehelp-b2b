<?php
require_once "../config.php";
require 'vendor/autoload.php';
use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;

$SnSclient          = new SnsClient([
    'region'        => 'us-east-1',
    'version'       => '2010-03-31',
    'credentials'   => [
        'key'       => 'AKIA4SH5KM3GHHQL5CUF',
        'secret'    => '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',
    ]
]);

$phone          = '';
$otp            = '';
$getIdfetch     = array();

setcookie('TRUE_HELP_OTP', $otp, time() + (86400 * 30), "/");

if($_GET['phone']){
    $phone       = $_GET['phone'];  
    $getIdQuery  = "SELECT ID FROM employers WHERE phone = '$phone' AND source ='B' AND mobile_verify = '1'";
    $getIdResult = mysqli_query($link, $getIdQuery) or die(mysqli_error($link));
    $getIdfetch  = mysqli_fetch_row($getIdResult);
    
    if(empty($getIdfetch[0])){ 
        
        $otp        = rand(1000, 9999);
        $message    = $otp.' is your True Help OTP code. Do Not share the OTP with anyone.';
        $phone      = '+'.$_GET['country'].$_GET['phone'];

        $result = $SnSclient->publish([
            'Message'       => $message,
            'PhoneNumber'   => $phone,
        ]);
        
        if($result['MessageId']){
            setcookie('TRUE_HELP_OTP', $otp, time() + (86400 * 30), "/");
            echo "MSG_SENT";
        } else {
            echo "NOT_SENT";
        }  

    } else {
        echo "ALREADY_EXIST";
    } 
    exit;
}