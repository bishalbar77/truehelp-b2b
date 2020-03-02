<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

require 'sns/vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$yourname = $email = $companyname = $phone = "";

$new_password = $confirm_password = "";

$new_password_err = $confirm_password_err = "";

$final_name = "";

$param_id = $_SESSION["id"]; 

//$load_profile = false;

//$load_pass = false;
    	
if(!empty($param_id)){  
    	  	
  $revQuery      = "SELECT * FROM employers WHERE id='$param_id'";

  $revResult     = mysqli_query($link, $revQuery) or die(mysqli_error($link));
  
  $revAllResult  = $revResult->fetch_all(MYSQLI_ASSOC); 
    
  $current_id    = $revAllResult[0]['id'];
      
  $yourname      = $revAllResult[0]['rep_full_name'];
  
  $email         = $revAllResult[0]['email'];
  
  $address       = $revAllResult[0]['address'];
   
  $companyname   = $revAllResult[0]['company_name'];
   
  $photo         = $revAllResult[0]['photo'];
  
  $phone         = $revAllResult[0]['phone']; 

  $role          = $revAllResult[0]['role'];
		  
}



 
if($_SERVER["REQUEST_METHOD"] == "POST"){	
	
      if($_POST['submit']=='update_info'){
  			  			
          if($_FILES['photo']['name']){
      			
            $tempName = md5(rand(100000,999999));
            $fileName = $tempName.$_FILES["photo"]["name"]; 

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
                'SourceFile'    => $_FILES["photo"]["tmp_name"],
                'StorageClass'  => 'STANDARD',
                'ACL'           => 'public-read',
                'StorageClass'  => 'REDUCED_REDUNDANCY',
            ));


            if($result){
              $filename = $result['ObjectURL'];
            } else {
              $filename = '';
            }
      			
      		}  else {
              $filename = $_POST["imageurl"];
          }
      
			$companyname = trim($_POST["companyname"]); 
			
			$yourname = trim($_POST["yourname"]); 
			
			$phone = trim($_POST["phone"]);
			
			$address = $_POST["personalinfo"];			
		
			$sql = "UPDATE employers SET rep_full_name = '$yourname', address = '$address', photo = '$filename', phone = '$phone', company_name = '$companyname' WHERE id =$current_id"; 
      	  
      $data = mysqli_query($link, $sql)or die(mysqli_error($link));			
	
			$load_profile = 1;

      setcookie("loadprofile", "$load_profile", time() + 10);
			
			if($data){
			    header("location: my-profile.php");
			}
			
	
		} 



    if($_POST['submit']=='update_pass') {
	
	
	 if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);        
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm new the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    if(empty($new_password_err) && empty($confirm_password_err)){
    	
    	  $param_id = $_SESSION["id"];    	  
    	  	
    	  $query = "SELECT * FROM employers WHERE id='$param_id'";
	 
		  $result = mysqli_query($link, $query) or die(mysqli_error($link));
	
		  $fetch = mysqli_fetch_row($result);
	
		  $email = $fetch[2];    	  
    	  
    	  if(!empty($param_id)){
    	  	
    	  	  $load_pass = 1;
          
                  setcookie("loadpass", "$load_pass", time() + 10);
    	  	
    		  $param_password = md5($new_password);
      
      	  $sql = "UPDATE employers SET pass = '$param_password' WHERE email ='$email'";
      	  
      	  $data = mysqli_query($link, $sql)or die(mysqli_error($link));
      	  
           session_destroy();

           header("location: login.php");

           exit();
    	  
    	  } else {
    	     echo "Oops! Something went wrong. Please try again later.";
    	  }
    	
    }  
	
	
}  

    mysqli_close($link);
}

?>
