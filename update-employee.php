<?php 

// Include config file
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

      if($_FILES['photo']['name']){
      $target_path = $base_url = dirname(__FILE__).'/upload/';      
      $errors= "";
      $file_name = $_FILES['photo']['name'];
      $file_size = $_FILES['photo']['size'];
      $file_tmp = $_FILES['photo']['tmp_name'];
      $file_type = $_FILES['photo']['type'];
      $txt = explode('.', $file_name);
      $file_et = end($txt);
      $file_ext = strtolower($file_et);

      $extensions= array("jpeg","jpg","png");

      if(in_array($file_ext,$extensions)=== false){
         $errors="extension not allowed, please choose a JPEG or PNG file.";
      }

      if($file_size > 2097152){
         $errors='File size must be excately 2 MB';
      }

      if(empty($errors)==true){
        $num = rand(10,100);
        $getfilename =  str_replace(' ', '_', $file_name);
        $final_name = $num.'_'.$getfilename;
        $result = 1;
         move_uploaded_file($file_tmp,$target_path.$final_name);          
      }


      } else {
	     $final_name = trim($_POST["photos"]);
      }


       $full_name = trim($_POST["fullname"]);

       $worker_type = trim($_POST["worktype"]);
       
       $aadhar_number     = $_POST["aadharnumber"];
       
       $company_id        = $_POST["companyID"];            

       $worker_id         = $_POST["workerID"];

       $name              = trim($_POST["name"]);

       $email             = trim($_POST["email"]);

       $phone             = trim($_POST["phone"]);

       $address           = trim($_POST["address"]);

       $choose_state      = trim($_POST["choosestate"]);

       $document          = trim($_POST["document"]);

       $postal_code       = trim($_POST["postalcode"]);

       $other_detailes    = trim($_POST["otherdetails"]);

       $verify_type     = implode(',', $_POST['verify']);

       $mname    = trim($_POST["mname"]);

       $sname    = trim($_POST["sname"]);

       $alias    = trim($_POST["alias"]);

       $paddress    = trim($_POST["paddress"]);

       $street    = trim($_POST["street"]);

       $pstreet    = trim($_POST["pstreet"]);

       $pchoosestate    = trim($_POST["pchoosestate"]);

       $ppostalcode    = trim($_POST["ppostalcode"]);

       $amounts = trim($_POST["finalamount"]);
 
       date_default_timezone_set('Asia/Kolkata');

       $update_datetime = date('Y-m-d h:i:s', time());

	   $queryes = "SELECT * FROM B2B_workers WHERE worker_id='$worker_id'";

           $resultes = mysqli_query($link, $queryes) or die(mysqli_error($link));

           $fetches = mysqli_fetch_row($resultes);     

           $finalamount = $fetches[29];

           if($amounts>$finalamount){

        	 $finalAmount= $amounts;

	         $amountStatus= "2";

		 $additional_amount= $amounts-$finalamount;
	
		 $additional_amount_status= "0";

		 $tempID = rand(19999,10000);

		 $querys = "UPDATE B2B_workers SET company_id='$company_id', worker_fullname='$full_name', worker_type='$worker_type', aadhar_no='$aadhar_number', contact_name='$name', contact_email='$email', contact_phone='".$phone."', address='$address', street='$street', state='$choose_state', postal_code='$postal_code', photo='$final_name', files='$document', other_details='$other_detailes', verification_type='$verify_type', mname='$mname', sname='$sname', alias='$alias', pstreet='$pstreet', ppostalcode='$ppostalcode', pstate='$pchoosestate', last_update='$update_datetime', final_amount='$finalAmount', amount_status='$amountStatus', additional_temp_id='$tempID' WHERE worker_id=$worker_id";

		 $queryes = "INSERT INTO B2B_payment_history (worker_id, company_id, additional_amount, additional_amount_status, temp_id) VALUES ('$worker_id','$company_id','$additional_amount','$additional_amount_status', '$tempID')";

		 $dataes = mysqli_query ($link, $queryes);
 
            } else {

         	 $querys = "UPDATE B2B_workers SET company_id='$company_id', worker_fullname='$full_name', worker_type='$worker_type', aadhar_no='$aadhar_number', contact_name='$name', contact_email='$email', contact_phone='".$phone."', address='$address', street='$street', state='$choose_state', postal_code='$postal_code', photo='$final_name', files='$document', other_details='$other_detailes', verification_type='$verify_type', mname='$mname', sname='$sname', alias='$alias', pstreet='$pstreet', ppostalcode='$ppostalcode', pstate='$pchoosestate', last_update='$update_datetime', final_amount='$amounts' WHERE worker_id=$worker_id";

	    }

       $data = mysqli_query ($link, $querys)or die(mysqli_error($link));
	

       if($data)
       {
             header("location: employees.php");
       }             


}


?>
