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

$fullname_err = "";

$workertype_err = "";

$aadharnumber_err = "";

$dob_err = "";

$doj_err = "";

$photo_err = "";

$full_name = "";

$aadhar_number = "";

$param_id = $_SESSION["id"]; 

if(!empty($param_id)){ 

  $revQuery      = "SELECT * FROM B2B_company_details WHERE ID='$param_id'";

  $revResult     = mysqli_query($link, $revQuery) or die(mysqli_error($link));
  
  $revAllResult  = $revResult->fetch_all(MYSQLI_ASSOC); 
      
  $current_id    = $revAllResult[0]['ID'];
      
  $yourname      = $revAllResult[0]['rep_full_name'];
  
  $email         = $revAllResult[0]['email'];
  
  $address       = $revAllResult[0]['address'];
   
  $companyname   = $revAllResult[0]['company_name'];
   
  $photo         = $revAllResult[0]['photo'];
  
  $phone         = $revAllResult[0]['phone']; 

  $role          = $revAllResult[0]['role']; 
  
}



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
	     $photo_err = "Please select your photo.";
      }

       if(empty(trim($_POST["fname"]))) {
          $fname_err = "Please enter your first name.";
       } else {
          $fname = trim($_POST["fname"]);
       }

       if(empty(trim($_POST["dob"]))) {
          $dob_err = "Please select date of birth.";
       } else {
          $dob_date     = $_POST["dob"];
       }

       if(empty(trim($_POST["doj"]))) {
          $doj_err = "Please select date of joining.";
       } else {
          $doj_date     = $_POST["doj"];
       }

       if(empty(trim($_POST["email"]))) {
          $email_err = "Please enter your email address.";
       } else {
          $email     = $_POST["email"];
       }

       if(empty(trim($_POST["phone"]))) {
          $phone_err = "Please enter your phone number.";
       } else {
          $phone     = trim($_POST["phone"]);
       }

       if(empty(trim($_POST["gender"]))) {
          $gender_err = "Please choose gender.";
       } else {
          $gender     = trim($_POST["gender"]);
       }

       if(empty(trim($_POST["address"]))) {
          $address_err = "Please enter your address.";
       } else {
          $address     = $_POST["address"];
       }

       if(empty(trim($_POST["village"]))) {
          $village_err = "Please enter your village.";
       } else {
          $village     = $_POST["village"];
       }

       if(empty(trim($_POST["postoffice"]))) {
          $postoffice_err = "Please enter your post office.";
       } else {
          $postoffice     = $_POST["postoffice"];
       }

       if(empty(trim($_POST["policestation"]))) {
          $policestation_err = "Please enter your police station.";
       } else {
          $policestation     = $_POST["policestation"];
       }

       if(empty(trim($_POST["district"]))) {
          $district_err = "Please enter your district.";
       } else {
          $district     = $_POST["district"];
       }
 
       if(empty(trim($_POST["choosestate"]))) {
          $choosestate_err = "Please choose your state.";
       } else {
          $choose_state     = $_POST["choosestate"];
       }

       if(empty(trim($_POST["postalcode"]))) {
          $postalcode_err = "Please enter your postal code.";
       } else {
          $postal_code   = $_POST["postalcode"];
       }


       $company_id        = $_SESSION["id"];    

       $worker_type       = trim($_POST["worktype"]); 

       $doc_type          = trim($_POST["doctype"]);   

       $documentnumber    = $_POST["documentnumber"];    

       $salary            = trim($_POST["salary"]);

       $fname             = trim($_POST["fname"]);

       $mname             = trim($_POST["mname"]);

       $sname             = trim($_POST["sname"]);

       $alias             = trim($_POST["alias"]);

       $careof            = trim($_POST["fathername"]);

       $employed          = trim($_POST["employed"]);

       if(!empty($employed) &&  $employed){
          $employed = $employed;
          $company_ids = $company_id;
       } else {
          $employed = 0;
          $company_ids = 0;
       }

       $paddress          = trim($_POST["paddress"]);

       $pvillage          = trim($_POST["pvillage"]); 

       $ppostoffice       = trim($_POST["ppostoffice"]); 

       $ppolicestation    = trim($_POST["ppolicestation"]); 

       $pdistrict          = trim($_POST["pdistrict"]); 

       $pchoosestate      = trim($_POST["pchoosestate"]);

       $ppostalcode	      = trim($_POST["ppostalcode"]);

       $document          = trim($_POST["document"]);


       $other_details     = trim($_POST["otherdetails"]);

       $amount            = trim($_POST["finalAmount"]);

       $verify_type       = implode(',', $_POST['verify']);

       $tempID            = rand(19999,10000);

       $dateTime          = date('Y-m-d H:i:s');

       $employmentStatus  = '1';

       $createdDate    = date('Y-m-d H:i:s');

       if( empty($fname_err) && empty($dob_err) && empty($doj_err) && empty($email_err) && empty($phone_err) ){ 

          $query = "INSERT INTO B2B_workers (company_id, worker_fullname, worker_type, docTypeId, aadhar_no, dob, doj, gender, salary, contact_name, contact_email, contact_phone, address, paddress, state, postal_code, photo, files, other_details, verification_type, mname, sname, alias, ppostalcode, final_amount, temp_id, source) VALUES ('$company_ids','$fname','$worker_type','$doc_type','$documentnumber','$dob_date','$doj_date','$gender','$salary','$careof','$email','".$phone."','$address','$paddress','$choose_state','$postal_code','$final_name','$document','$other_details','$verify_type','$mname','$sname','$alias','$ppostalcode','".$amount."', '$tempID','B')";

          $data         = mysqli_query ($link, $query)or die(mysqli_error($link));

          $worker_id    = mysqli_insert_id($link);
          
          if(!empty($address)){
            $pAddrQuery   = "INSERT INTO B2B_address (company_id, worker_id, addressType, village, postoffice, policestation, district, near_by, state, pincode, create_date, status) VALUES ('$company_id','$worker_id','PE','$village','$postoffice','$policestation','$district','$address','$choose_state','$postal_code','$dateTime','0')";     
            mysqli_query ($link, $pAddrQuery)or die(mysqli_error($link));
          }
          
          if(!empty($paddress)){
            $cAddrQuery   = "INSERT INTO B2B_address (company_id, worker_id, addressType, village, postoffice, policestation, district, near_by, state, pincode, create_date, status) VALUES ('$company_id','$worker_id','PR','$pvillage','$ppostoffice','$ppolicestation','$pdistrict','$paddress','$pchoosestate','$ppostalcode','$dateTime','0')";    
            mysqli_query ($link, $cAddrQuery)or die(mysqli_error($link));
          }
          
          mysqli_query($link, "INSERT INTO B2B_networks (company_id, worker_id, status) VALUES ('$param_id', '$worker_id', '1')") or die(mysqli_error($link));


          $querySave = "INSERT INTO B2B_employment_history (employeId, companyId, empType, salary, phoneNo, doj, dor, employmentStatus, createdDate) VALUES ('$worker_id', '$company_id', '1', '$salary', '$phone', '$dob_date', '$doj_date', '$employmentStatus', '$createdDate')";
          
          $retData = mysqli_query ($link, $querySave)or die(mysqli_error($link));


          if($data){

            	if($amount!=0){

            	$api = new Instamojo\Instamojo('18e5c4577d1a98abc5c0d87f89bf6a61', '97d89eb5d752f14f0bf69ce5cec2c70f','https://test.instamojo.com/api/1.1/');

            	try {
                		$response = $api->paymentRequestCreate(array(
                    	"purpose" => "True Help Enterprise",
                    	"amount" => $amount,
                    	"buyer_name" => $fname,
                    	"phone" => $phone,
                    	"send_email" => true,
                    	"send_sms" => true,
                    	"email" => $email,
                    	'allow_repeated_payments' => false,
                    	"redirect_url" => "https://enterprise.gettruehelp.com/payment-thankyou.php?temp_id=$tempID",
                   		"webhook" => "https://enterprise.gettruehelp.com/webhook.php"
                    ));
                	//print_r($response);

                	$pay_ulr = $response['longurl'];
                
                	//Redirect($response['longurl'],302); //Go to Payment page

            	$tempID = rand(19999,10000);

               	header("Location: $pay_ulr");
            	
            	}
            	catch (Exception $e) {
                	     //print('Error: ' . $e->getMessage());
            	}    

            	} else {
            	   header("Location: freepayment-thankyou.php?temp_id=$tempID");
            	}

        }             

   }

}


?>


<?php include "header.php"; ?>

<link rel="stylesheet" href="css/jquery-ui.css">

<style type="text/css">
  .cust-class input[type=checkbox] {
    display: none;
  }
  div#targetLayer {
      display: flex;
      justify-content: center;
  }
</style>

<style type="text/css">
div#selection {
    width: 100%;
    display: inherit;
}

#abc {
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;   
    position: fixed;
    background-color: rgba(0, 0, 0, 0.8);
    overflow: auto;
    z-index: 10000000;
}

#abc div#popupContact {
    position: absolute;
    left: 50%;
    top: 50%;
    font-family: 'Raleway',sans-serif;
    max-width: 550px;
    margin: 0 10px;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px 30px;
    border-radius: 15px;
}

.input-style.input-style-1.input-required.custom-input-style select {
    height: 40px;
    width: 100%;
    margin-bottom: 15px;
    font-size: 13px;
    padding: 0 10px;
    background: #fff;
}

.checkboxes-demo.bottom-20 {
    margin-top: 15px;
    padding-left: 20px;
}

button#scanner-btn {
    background: #007bff;
    color: #fff;
    border: none;
    margin-top: 14px;
    padding: 10px 20px 13px 20px;
    width: 100%;
    border-radius: 30px;
    cursor: pointer;
}

div#hide span {
    width: 100%;
    float: left;
    font-size: 13px;
    margin-bottom: 13px;
}

#hide input {
    float: left;
    width: 100%;
    height: 40px;
    margin-bottom: 15px;
    font-size: 13px;
    padding: 0 15px;
    z-index: 10;
}

div#popupContact .checkbox label::before {
    top: 5px!important;
}

@media screen and (max-width: 1024px) {
  #abc div#popupContact {
    position: absolute;
    left: 50%;
    top: 50%;
    font-family: 'Raleway',sans-serif;
    max-width: 100%;
    margin: 0;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px 30px;
    border-radius: 15px;
    width: 90%;
}
}

</style>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

p.currently_emp {
    padding: 0;
    margin: 3px 0 0 0;
    font-size: 14px;
    position: absolute;
    right: 40px;
}
</style>

<!-- Dashboard start -->
<div class="dashboard submit-property">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-nones d-xl-block d-lg-block hide_div">
                <?php include "menu-setting.php"; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>New Employee</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="employees.php">Employees</a>
                                        </li>
                                        <li class="active">New employee</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="submit-address dashboard-list">
                        <?php $worker_ID = $_REQUEST["employeetype"]; 
                         $doctype_ID = $_REQUEST["documenttype"]; 
                         $documentnumber = $_REQUEST["documentnumber"]; 
                        ?>
                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?employeetype=<?php echo $worker_ID; ?>&documenttype=<?php echo $doctype_ID; ?>&documentnumber=<?php echo $documentnumber; ?>" id="form" method="post" enctype="multipart/form-data"> 
                            <h4 class="bg-grea-3">Basic Information</h4>
                            <div class="search-contents-sidebar">
                                <div class="row pad-20">

                                  

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Employee Type (required)</label>
                                            <select class="browser-default custom-select" name="worktype" id="worktype" readonly style="height: 45px;background: #ddd;">
                                                <?php
                                                    $queryees = "SELECT * FROM B2B_employee_type WHERE source ='B' AND ID='$worker_ID'";

                                                    $res = mysqli_query($link, $queryees) or die(mysqli_error($link));
                    
                                                    $revAllResultes  = $res->fetch_all(MYSQLI_ASSOC);   

                                                    if ($res->num_rows!=0) {                                     

                                                    foreach ($revAllResultes as $key => $valuess) {

                                                    $ID        = $valuess['ID'];
                                                    $type      = ucfirst($valuess['emp_type']);                                                                                  
                                                 ?>
                    <option value="<?php echo $ID; ?>" <?php if( strtolower($worker_ID)==strtolower($ID) ){ echo "selected='selected'"; } ?> ><?php echo $type; ?></option>
                                                <?php } } ?>
                                              </select>
                                            <span class="help-block" id="worktype_err"><?php echo $workertype_err; ?></span>
                                        </div>
                                    </div>                                   

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Document Type (required)</label>
                                            <select class="browser-default custom-select" name="doctype" id="doctype" readonly style="height: 45px;background: #ddd;">
                                                <?php

                                                    $queryeess = "SELECT * FROM B2B_documents_type WHERE source ='B' AND ID='$doctype_ID'";

                                                    $rese = mysqli_query($link, $queryeess) or die(mysqli_error($link));
                    
                                                    $revAllResultes  = $rese->fetch_all(MYSQLI_ASSOC);   

                                                    if ($rese->num_rows!=0) {                                     

                                                    foreach ($revAllResultes as $key => $valueess) {

                                                    $ID        = $valueess['ID'];
                                                    $doc_types      = ucfirst($valueess['documentName']);
                                  
                                                 ?>
               <option value="<?php echo $ID; ?>" <?php if( strtolower($doctype_ID)==strtolower($ID) ){ echo "selected='selected'"; } ?>><?php echo $doc_types; ?></option>
                                                <?php } } ?>
                                              </select>
                                            <span class="help-block" id="worktype_err"><?php echo $doc_err; ?></span>
                                        </div>
                                    </div>                                  

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Document number</label>
                                             <input type="text" class="input-text" autocomplete="off" name="documentnumber" id="documentnumber" maxlength="12" placeholder="Document number" value="<?php echo $documentnumber; ?>" readonly style="background: #ddd;"/>
                                            <span class="help-block"><?php echo $documentnumber_err; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">First name</label>
                                            <input type="text" class="input-text" name="fname" id="fname" maxlength="35" autocomplete="off" placeholder="Full name">
					                                  <span class="help-block" id="fname_msg"><?php echo $fname_err; ?></span>
                                        </div>
                                    </div>

				                            <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Middle name</label>
                                            <input type="text" class="input-text" name="mname" maxlength="35" autocomplete="off" placeholder="Middle name" />
                                        </div>
                                    </div>
				
				                            <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Family/Surname</label>
                                            <input type="text" class="input-text" name="sname" maxlength="35" autocomplete="off" placeholder="Family/Surname name" />
                                        </div>
                                    </div>
				   
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Alias</label>
                                            <input type="text" class="input-text" name="alias" maxlength="35" autocomplete="off" placeholder="Alias" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class ="form-group">
                                            <label class="control-label">Gender</label>
                                            <select class="browser-default custom-select" name="gender" id="gender" style="height: 45px;">
                                              <option value="">Choose gender</option>
                                              <option value="M">Male</option>
                                              <option value="F">Female</option>                        
                                            </select>
                                            <span class="help-block" id="gender_msg"><?php echo $gender_err; ?></span>
                                        </div>
                                    </div>  

				                            <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Date of birth</label>
                                             <input type="text" class="input-text" name="dob" id="dob" autocomplete="off" maxlength="10" placeholder="Date of birth" />
                                            <span class="help-block" id="dob_msg"><?php echo $dob_err; ?></span>
                                        </div>
                                    </div>
				    
				                            <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Date of joining</label>
                                             <input type="text" class="input-text" name="doj" id="doj" autocomplete="off" maxlength="10" placeholder="Date of joining" />
                                            <span class="help-block" id="doj_msg"><?php echo $doj_err; ?></span>
                                        </div>
                                    </div>

			                              <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Salary</label>
                                             <input type="text" class="input-text" name="salary" id="salary" maxlength="8" autocomplete="off" placeholder="Salary" />
                                        </div>
                                    </div>  

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group" style="margin-top: 30px;">
                                            <p class="currently_emp">Currently employed with you?</p>
                                            <label class="switch">
                                              <input type="checkbox" name="employed" value="1" checked />
                                              <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div> 

                                  </div>
                            </div>

                            <h4 class="bg-grea-3">Contact details</h4>
                            <div class="row pad-20">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Father's name</label>
                                        <input type="text" class="input-text" maxlength="35" name="fathername" autocomplete="off" placeholder="Father's name" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                         <input type="email" class="input-text" maxlength="30" id="email" autocomplete="off" name="email" placeholder="Email" />
                                   	 <span class="help-block" id="email_msg"><?php echo $email_err; ?></span>
				                        </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Phone number</label>
                                        <input type="text" class="input-text" id="phone" name="phone" id="phone" maxlength="10" autocomplete="off" placeholder="Phone" />
                                    	<span class="help-block" id="phone_msg"><?php echo $phone_err; ?></span>
				                        </div>
                                </div>
                               
                            </div>

                            <h4 class="bg-grea-3">Address</h4>
                            <div class="row">
                      				<div class="col-lg-12 col-md-12 col-sm-12">
                      				<h6 class="custom-padding">Current address</h6>
                             	<div class="row" style="padding: 0; margin: 0 10px;">
				                        <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <input type="text" class="input-text" maxlength="50" name="address" id="address" autocomplete="off" placeholder="Address" />
					                               <span class="help-block" id="address_msg"><?php echo $address_err; ?></span>
                                    </div>
                                </div>
				      
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Village</label>
                                        <input type="text" class="input-text" name="village" id="village" maxlength="50" autocomplete="off" placeholder="Village" />
                                        <span class="help-block" id="village_msg"><?php echo $village_err; ?></span>
				                            </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Post Office</label>
                                        <input type="text" class="input-text" name="postoffice" id="postoffice" maxlength="50" autocomplete="off" placeholder="Post Office" />
                                        <span class="help-block" id="postoffice_msg"><?php echo $postoffice_err; ?></span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Police Station</label>
                                        <input type="text" class="input-text" name="policestation" id="policestation" maxlength="50" autocomplete="off" placeholder="Police Station" />
                                        <span class="help-block" id="policestation_msg"><?php echo $policestation_err; ?></span>
                                    </div>
                                </div>

                                <div id="selection">
                                   <div class="col-lg-6 col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="control-label">State</label>
                                          <select class="browser-default custom-select" name="choosestate" id="choosestate" style="height: 45px;" onchange='selct_district(this.value)'>
                                              
                                          </select>
  					                                <span class="help-block" id="choosestate_msg"><?php echo $choosestate_err; ?></span>
                                      </div>
                                  </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">District</label>                           
                                            <select class="browser-default custom-select" name="district" id="district" style="height: 45px;">
                                              <option value="">Select district</option>
                                            </select>
                                            <span class="help-block" id="district_msg"><?php echo $district_err; ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Postal code</label>
                                        <input type="text" class="input-text" name="postalcode" id="postalcode" autocomplete="off" maxlength="6" placeholder="Postal code">
                                    	<span class="help-block" id="postalcode_msg"><?php echo $postalcode_err; ?></span>
				                            </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12"></div>

				                          <div class="checkbox">
                                    <label for="checkeds" class="custom_check_box" style="margin-bottom: 0px;margin-left: 10px;">
                                         <input id="checkeds" type="checkbox" onclick="SetBilling(this.checked);"> Same As Permanent Address
                                    </label>
				                           </div>
				</div>
      			     </div>

                           <div class="col-lg-12 col-md-12 col-sm-12">
                                <h6 class="custom-padding">Permanent address</h5>
                                <div class="row pad-20">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Permanent Address</label>
                                        <input type="text" class="input-text" name="paddress" id="paddress" maxlength="50" autocomplete="off" placeholder="Permanent address" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Village</label>
                                        <input type="text" class="input-text" name="pvillage" id="pvillage" maxlength="50" autocomplete="off" placeholder="Village" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Post Office</label>
                                        <input type="text" class="input-text" name="ppostoffice" id="ppostoffice" maxlength="50" autocomplete="off" placeholder="Post Office" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Police Station</label>
                                        <input type="text" class="input-text" name="ppolicestation" id="ppolicestation" maxlength="50" autocomplete="off" placeholder="Police Station" />
                                    </div>
                                </div>

                                <div id="selection">
  				                        <div class="col-lg-6 col-md-6 col-sm-12">
                                      <div class="form-group" id="selVal">
                                          <label>State</label>
                                          <select class="browser-default custom-select" name="pchoosestate" id="pchoosestate" style="height: 45px;" onchange='selct_pdistrict(this.value)'>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label>District</label>
                                          <select class="browser-default custom-select" name="pdistrict" id="pdistrict" style="height: 45px;">
                                            <option>Select district</option>
                                          </select>
                                      </div>
                                  </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Postal code</label>
                                        <input type="text" class="input-text" name="ppostalcode" id="ppostalcode" autocomplete="off" maxlength="6" placeholder="Postal code">
                                    </div>
                                </div>

		              </div>
				
			    </div>

                            </div>
   
                            
                            <div class="row pad-20">
                                <div class="col-lg-3">
                                     <h4 class="bg-grea-3 control-label">Profile picture</h4>
                                     <div class="edit-profile-photo">
                                            <div id="targetLayer"></div>
                                            <div class="imagehidden" id="imagehidden">
                                            <img src="<?php echo $base_url.'img/dummy-image.jpg'; ?>" alt="profile-photo" class="img-fluid">
                                            </div>
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input type="file" class="upload" name="photo" id="photo" accept="image/*" onChange="showPreview(this);" /> 
                                                </div>                                                 
                                            </div>   
                                                                               
                                        </div>
                                        <?php if(!empty($errors)){ ?>
                              				        <span class="help-block"><?php echo $errors; ?></span>      
                              					 <?php } ?> 
                              					<span class="help-block"><?php echo $photo_err; ?></span>

                                </div>
                                <div class="col-lg-9">
                                    <h4 class="bg-grea-3">All documents (upload only 4 files)</h4>
                                    <div id="myDropZone" class="dropzone dropzone-design">
                                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>                                   
                                    </div>
                                </div>
                            </div>  
                 
                            <h4 class="bg-grea-3">Other details you know</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <textarea class="input-text" maxlength="250" name="otherdetails" placeholder="Detailed Information"></textarea>
                                </div>
                            </div>
                            <h4 class="bg-grea-3">Verification type</h4>
                            <div class="row pad-20 cust-class">
				                     <?php
                                     $queryess = "SELECT * FROM B2B_verification_type WHERE source='B'";

                                     $resultess = mysqli_query($link, $queryess) or die(mysqli_error($link));

				                             $count = 1;

                                     if ($resultess->num_rows!=0) {

                                     while ($row=mysqli_fetch_row($resultess)){

                                     $ID = $row[0];

                                     $type = ucfirst($row[1]);

                                     $amount = $row[2];

				                             if($row[3]==1){
                                 ?>
                                <div class="col-lg-3 col-md-4 col-sm-6" style="">
                                    <div class="checkbox checkbox-theme checkbox-circle click-checkbox">
                                        <input id="checkbox<?php echo $count; ?>" type="checkbox" data-amount="<?php echo $amount; ?>" name="verify[]" value="<?php echo $ID; ?>" <?php if($count==1){ ?>checked<?php } ?>>
                                        <label for="checkbox<?php echo $count; ?>">
                                            <?php echo ucfirst($type); ?> (<?php echo "&#x20b9; ".$amount; ?>)
                                        </label>
                                    </div>
                                </div>
				                        <?php $count++; } } } ?>
                            
                            </div>
			                       <hr>
                            <div class="row pad-20">
                            <div class="col-lg-4 col-md-12 col-sm-12">                                 
                                    <input type="hidden" name="document" id="alldocs" />
				                            <input type="hidden" name="select-val" id="selectedState" value="" />
	                                  <input type="hidden" name="finalAmount" id="finalamount" value="0" />   
                                    <input type="hidden" name="latitude" id="latitudes">        
                                    <input type="hidden" name="longitude" id="longitudes">
				                            <span style="display:none;"><b>Payment amount:</b></br> &#x20a8; <span id="finaltotal">0</span></span>
				                            <button type="submit" class="btn btn-md button-theme" name="add_worker" id="dropzoneSubmit" style="padding: 13px 30px 11px 30px; color: #fff; font-size: 15px; width: 175px; text-align: center;">Pay &#8377;<span id="button_amount" style="color:#fff;">0</span></button> 
				                           <div class="success_image"><img src="<?php echo $base_url; ?>/img/pay.png" alt="Success" style="width: 180px; margin-top: 10px;" /></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="sub-banner-2 text-center">Copyright 2020, TrueHelp Enterprise.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard end -->

<?php 
$stonevar_action = $_GET['documentnumber'] ? $_GET['documentnumber'] : NULL;

      if ( $stonevar_action===NULL && !isset($_GET['documentnumber']) || empty($_GET['documentnumber']) ) {
     
?>

<div id="abc">
<!-- Popup Div Starts Here -->
<div id="popupContact">
          <form action="#" id="frmSelectType" method="post" enctype="multipart/form-data"> 
                <h3 style="text-align: center;">Document Verification</h3>
                <div class="input-style input-style-1 input-required custom-input-style">   
                    <em class="arrow-icons"><i class="fa fa-angle-down" aria-hidden="true" style="color: #fff!important;"></i></em>  
                    <select name="employeetype" id="employeetype">
                        <option value="">Select Employee Type</option>
                        <?php
                            $empTypeQuery = "SELECT * FROM B2B_employee_type WHERE source='B'";
                            $empTypeResult = mysqli_query($link, $empTypeQuery) or die(mysqli_error($link));
                            if($empTypeResult):
                            while($row = mysqli_fetch_row($empTypeResult)){ ?>
                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                        <?php } endif; ?>
                    </select>
                    <span class="help-block" id="employeetype_err"></span>
                </div>

                <div class="input-style input-style-1 input-required custom-input-style">                      
                    <select name="documentType" id="documentType" onchange="checkDocument(this.value)">
                        <option>Select Document Type</option>
                        <?php
                            $docTypeQuery   = "SELECT * FROM B2B_documents_type WHERE status = '1' AND source='B'";
                            $docTypeResult  = mysqli_query($link, $docTypeQuery) or die(mysqli_error($link));
                            $allDocResult   = $docTypeResult->fetch_all(MYSQLI_ASSOC);
                            $docTypeResult->free_result();
                            $link->close();
                        ?>
                        <?php if($allDocResult): ?>
                            <?php foreach ($allDocResult as $key => $document): ?>
                                <option value="<?php echo $document['ID']; ?>"><?php echo $document['documentName']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                    <span class="help-block" id="employeedoc_err"></span>
                </div>

                <div class="input-style input-style-1 input-required custom-input-style" id="hide" style="display: none;">
                    <span id="documentLevel" style="display: none;">Document Number</span>
                    <input type="text" name="documentNumber" id="documentNumber" maxlength="50" onkeypress="allowAlphaNumericSpace(event)" class="input-text" placeholder="Document Number" />
                    <span class="help-block" id="documentNumber_err"><?php echo $documentNumber_err; ?></span>
                    <input type="hidden" name="latitude" id="latitude">        
                    <input type="hidden" name="longitude" id="longitude">
                </div>
                
                <div class="checkboxes-demo bottom-20">
                    <div class="fac fac-checkbox-round fac-blue"> 
                        <div class="checkbox scan-custom-checkbox checkbox-theme checkbox-circle click-checkbox custom_checkbox_term">
                            <input id="checkboxterm" type="checkbox" name="term" value="1" style="display:none;"/>
                            <label for="checkboxterm" style="margin: 0;"><b>By checking this box, you have recived proper consent from the Aadhar card holder, as required by UIDIA, to verify their Aadhar card. see </br><a style="cursor: pointer;color: #007bff;" href="https://www.gettruehelp.com/terms-of-use/" target="_blank">Term and condition</a></b></label>
                            <span class="help-block" id="employeeterm_err"></span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button type="submit" name="scan" class="button button-m button-full bg-blue2-dark" id="scanner-btn" onclick="return Validate()">Submit</button>
                </div>
            </form>
</div>
<!-- Popup Div Ends Here -->
</div>

<?php
}
?>

<?php include("footer.php"); ?>

<script>
//Disabling autoDiscover
Dropzone.autoDiscover = false;

jQuery(function($) {
      //Dropzone class
      var myDropzone = new Dropzone(".dropzone", {
      url: "upload-files.php",
      paramName: "file",
      maxFilesize: 5,
      maxFiles: 4,
      addRemoveLinks: true,
      acceptedFiles: "image/*,application/pdf",
      success: function(file, response){
      console.log('WE NEVER REACH THIS POINT.');
       var txt = $("#alldocs").val();
       $("#alldocs").val(txt + response + ","); 
      }
  });
 // alert(myDropzone);
});
</script>

<script src="js/state.js"></script>

<script type="text/javascript">
$('#worktype').click(function (event) {
       dialog(this);
       event.preventDefault();
       event.stopPropagation();
});
$('#doctype').click(function (event) {
       dialog(this);
       event.preventDefault();
       event.stopPropagation();
});  
</script>

<script type="text/javascript">
function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
         $('#blah').attr('src', e.target.result);
			$("#targetLayer").html('<img src="'+e.target.result+'" height="230px" class="upload-preview" />');
			$("#imagehidden").hide();
        }
		fileReader.readAsDataURL(objFileInput.files[0]);
    }
}
</script>

<script type="text/javascript">
jQuery(document).ready(function($){
  $('#fname').bind("keydown",function(e){
    $("#fname_msg").html("");
  });
  $('#dob').bind("keydown change",function(e){
    $("#dob_msg").html("");
  });
  $('#doj').bind("keydown change",function(e){
    $("#doj_msg").html("");
  });
  $('#gender').bind("keydown change",function(e){
    $("#gender_msg").html("");
  });
  $('#email').bind("keydown",function(e){
    $("#email_msg").html("");
  });
  $('#phone').bind("keydown",function(e){
    $("#phone_msg").html("");
  });
  $('#address').bind("keydown",function(e){
    $("#address_msg").html("");
  });  
  $('#village').bind("keydown",function(e){
    $("#village_msg").html("");
  });  
  $('#postoffice').bind("keydown",function(e){
    $("#postoffice_msg").html("");
  }); 
   $('#policestation').bind("keydown",function(e){
    $("#policestation_msg").html("");
  }); 
  $('#district').bind("change",function(e){
    $("#district_msg").html("");
  });  
  $('#choosestate').bind("change",function(e){
    $("#choosestate_msg").html("");
  });
  $('#postalcode').bind("keydown",function(e){
    $("#postalcode_msg").html("");
  });  
}); 
</script>


<script>

jQuery(document).ready(function(){	

	jQuery("#phone, #salary").on("keydown", function (event) {

	  // Allow only backspace and delete

	  if(jQuery(this).val().length <= 10 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )

	  {

	      if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {

	          // let it happen, don't do anything

	      } else {

	          // Ensure that it is a number and stop the keypress

	          if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {

	              event.preventDefault();

	          }

	      }

	  }else{

	      event.preventDefault();

	  }      
	  
	});

});	

</script>


<script>

jQuery(document).ready(function(){	

	jQuery("#aadhar").keydown(function (event) {

	  // Allow only backspace and delete

	  if(jQuery(this).val().length <= 16 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )

	  {

	      if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {

	          // let it happen, don't do anything

	      } else {

	          // Ensure that it is a number and stop the keypress

	          if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {

	              event.preventDefault();

	          }

	      }

	  }else{

	      event.preventDefault();

	  }      
	  
	});

});	

</script>


<script>

jQuery(document).ready(function(){	

	jQuery("#postalcode, #postalcodes").keydown(function (event) {

	  // Allow only backspace and delete

	  if(jQuery(this).val().length <= 6 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )

	  {

	      if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {

	          // let it happen, don't do anything

	      } else {

	          // Ensure that it is a number and stop the keypress

	          if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {

	              event.preventDefault();

	          }

	      }

	  }else{

	      event.preventDefault();

	  }      
	  
	});

});	

</script>

<script src="js/jquery-ui.js"></script>

<script>
var maxBirthdayDate = new Date();
maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18 );
maxBirthdayDate.setMonth(11,31);

  jQuery( function() {
    jQuery( "#dob" ).datepicker({
      dateFormat: 'd-m-yy',
      maxDate: maxBirthdayDate,
      yearRange: '1900:'+maxBirthdayDate.getFullYear(),
      changeMonth: true,
      changeYear: true
    });
  } );
</script>
<script>
  jQuery( function() {
    jQuery( "#doj" ).datepicker({
      dateFormat: 'd-m-yy',
      changeMonth: true,
      changeYear: true
    });
  } );
</script>


<script>
function SetBilling(checked) {
      var selectedVal = document.getElementById('choosestate').value;        
      var districtselected = document.getElementById('district').value;  
        if (checked) {  
            document.getElementById('paddress').value = document.getElementById('address').value;
		        document.getElementById('pvillage').value = document.getElementById('village').value;
            document.getElementById('ppostoffice').value = document.getElementById('postoffice').value;
            document.getElementById('ppolicestation').value = document.getElementById('policestation').value;
		        document.getElementById('ppostalcode').value = document.getElementById('postalcode').value;		      

		        jQuery("#pchoosestate").val(selectedVal).find("option[value=" + selectedVal +"]").attr('selected', true);

            jQuery("#pdistrict").html("<option selected='selected' value='"+districtselected+"'>"+districtselected+"</option");

          } else {  
        document.getElementById('paddress').value = '';  
		    document.getElementById('pvillage').value = ''; 
		    document.getElementById('ppostoffice').value = '';  
        document.getElementById('ppolicestation').value = '';   
        document.getElementById('ppostalcode').value = '';  
        jQuery("#pdistrict").html("");
        jQuery("#pchoosestate").val(selectedVal).find("option[value=" + selectedVal +"]").removeAttr('selected', true);
          }  
}

jQuery(document).ready(function($){

    $("#choosestate").change(function(){

        var selectedCountry = $(this).children("option:selected").val();

        $("#selectedState").val(selectedCountry);

    });

}); 
 
</script>

<script>
jQuery(document).ready(function($){

	$(".click-checkbox input").click(function(){
	   if($(this).is(":checked")) {
   	   var finalamount = $(this).data("amount");
	   var totalprices = parseFloat($("#finalamount").val());
           $("#finalamount").val(totalprices + finalamount);
	   $("#finaltotal").text(totalprices + finalamount);
	   $("#button_amount").text(totalprices + finalamount);
           } else {
	   
	   var finalamount = $(this).data("amount");     
           var totalprices = parseFloat($("#finalamount").val());
           $("#finalamount").val(totalprices - finalamount);
           $("#finaltotal").text(totalprices - finalamount);
	   $("#button_amount").text(totalprices - finalamount);
	   }
});
});
</script>

<script type="text/javascript">
jQuery(document).ready(function($){
	document.onkeydown = function(e) {
	if(event.keyCode == 123) {
	return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
	return false;
	}
	if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
	return false;
	}
	}

	//Disable right click script
	var message = "";
	///////////////////////////////////
	function clickIE() {
	    if (document.all) {
	        (message);
	        return false;
	    }
	}

	function clickNS(e) {
	    if (document.layers || (document.getElementById && !document.all)) {
	        if (e.which == 2 || e.which == 3) {
	            (message);
	            return false;
	        }
	    }
	}
	if (document.layers) {
	    document.captureEvents(Event.MOUSEDOWN);
	    document.onmousedown = clickNS;
	} else {
	    document.onmouseup = clickNS;
	    document.oncontextmenu = clickIE;
	}

	document.oncontextmenu = new Function("return false");


});
</script>

<script type="text/javascript">

// Validating Empty Field
function check_empty() {
if (document.getElementById('name').value == "" || document.getElementById('email').value == "" || document.getElementById('msg').value == "") {
alert("Fill All Fields !");
} else {
document.getElementById('form').submit();
alert("Form Submitted Successfully...");
}
}
//Function To Display Popup
function div_show() {
document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
document.getElementById('abc').style.display = "none";
}
  
</script>

<script type="text/javascript">
    function Validate() {        
        var documentType    = document.getElementById("documentType").value;
        var documentNumberv = document.getElementById("documentNumber").value;
        var employeetype    = document.getElementById("employeetype").value;
        var documentTypeText = document.getElementById("documentType");
        var documentNumber = document.getElementById("documentNumber");
        var docText = documentTypeText.options[documentTypeText.selectedIndex].text;
        var checkBox = document.getElementById("checkboxterm");

        if(employeetype == ''){
            alert('Please Select Employee Type ');
            return false;
        }

        if(documentType == ''){
            alert('Please Select Document Type ');
            return false;
        }

        if(documentNumberv == '' && documentType != 1){
            alert('Please Put ' + docText +' Number ');
            return false;
        }

        if (checkBox.checked == false){
            alert('Please Accept Terms and Condition');
            return false;
        }


        if(documentType){
            var documentTypeText = document.getElementById("documentType");
            var documentNumber = document.getElementById("documentNumber");
            var docText = documentTypeText.options[documentTypeText.selectedIndex].text;
            document.getElementById("frmSelectType").action = "new-employee.php?employeetype=" + employeetype + "&documenttype=" + documentType + "&documentnumber=" + documentNumberv;
        }
    }
</script>

<script type="text/javascript">
    function checkDocument(){
        var documentType    = document.getElementById("documentType").value;
        var documentNumberv  = document.getElementById("documentNumber").value;
        var employeetype    = document.getElementById("employeetype").value;
        var documentTypeText = document.getElementById("documentType");
        var documentNumber = document.getElementById("documentNumber");
        var docText = documentTypeText.options[documentTypeText.selectedIndex].text;

        if(documentType){            
            document.getElementById("hide").removeAttribute("style");
            documentNumber.setAttribute("placeholder", "Enter " + docText + " Number");
            document.getElementById("documentLevel").innerHTML = "Enter " + docText + " Number";      
            document.getElementById("scanner-btn").innerHTML = "Search " + docText + " Number";
        }
    }

    function allowAlphaNumericSpace(e) {
      var code = ('charCode' in e) ? e.charCode : e.keyCode;
      if (!(code == 32) && // space
        !(code > 47 && code < 58) && // numeric (0-9)
        !(code > 64 && code < 91) && // upper alpha (A-Z)
        !(code > 96 && code < 123)) { // lower alpha (a-z)
        e.preventDefault();
      }
    }
</script>

<script>
    getLocation();
    function getLocation() {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }
    function showPosition(position) {
        document.getElementById("latitude").value = position.coords.latitude;
        document.getElementById("longitude").value = position.coords.longitude;
        document.getElementById("latitudes").value = position.coords.latitude;
        document.getElementById("longitudes").value = position.coords.longitude;
    }
</script>

