<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

include "src/instamojo.php";

$amount = $_REQUEST["amount"];

$name = $_REQUEST["name"];

$phone = $_REQUEST["phone"];

$email = $_REQUEST["email"];

$tempID = $_REQUEST["temp_id"];

if($amount!="" && $name!="" && $phone!="" && $email!="" && $tempID!=""){

$api = new Instamojo\Instamojo('18e5c4577d1a98abc5c0d87f89bf6a61', '97d89eb5d752f14f0bf69ce5cec2c70f','https://test.instamojo.com/api/1.1/');


        try {
             	$response = $api->paymentRequestCreate(array(
                "purpose" => "True Help Enterprise",
                "amount" => $amount,
                "buyer_name" => $name,
                "phone" => $phone,
                "send_email" => true,
                "send_sms" => true,
                "email" => $email,
                'allow_repeated_payments' => false,
                "redirect_url" => "http://www.gettruehelp.com/app/payment-thankyou.php?temp_id=$tempID",
                "webhook" => "http://www.gettruehelp.com/app/webhook.php"
        ));
	//print_r($response);

        $pay_ulr = $response['longurl'];
    
        //Redirect($response['longurl'],302); //Go to Payment page

         header("Location: $pay_ulr");
         exit();

       	}
	catch (Exception $e) {
                //print('Error: ' . $e->getMessage());
        }    

} else {

   header("Location: employees.php");

}

 ?>
