<?php 
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/

$doc_url = $_SESSION["docurl"];

$pro_url = $_SESSION["prourl"];

 
// Include config file
require_once "config.php";

$fullname_err = $workertype_err = $aadharnumber_err = $dob_err = $doj_err = $photo_err = $full_name = $aadhar_number = $docurl = '';

$param_id = $_SESSION["id"]; 

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


$order_id = $company_id = $worker_id = $verification_type = $verification_amount = $varification = $totalprices = '';

$doc_err = $fname_err = $gender_err = $email_err = $phone_err = $address_err = $village_err = $postoffice_err = $policestation_err = $postalcode_err = $district_err = $choosestate_err = $documentnumber_err = '';



if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    $order_id       = rand(100000, 999999);
    $company_id     = $param_id;
    if(!empty($totalprices)){
        $amount = $totalprices;
    } else {
        $amount = "0";
    }

    $discount       = '';
    $promocode      = '';
    $gst            = '';
    $subTotal       = '';

    $company_id        = $_SESSION["id"]; 
    $worker_type       = trim($_POST["worktype"]);
    $doc_type          = trim($_POST["doctype"]); 
    $documentnumber    = $_POST["documentnumber"];


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

    $employed          = trim($_POST["employed"]);
    if(!empty($employed) &&  $employed){
    $employed = $employed;
    $company_ids = $company_id;
    } else {
    $employed = 0;
    $company_ids = 0;
    }

    $docUrl            = trim($_POST["doc-url"]);

    if(!empty($docUrl)){
    $docUrl = $docUrl;
    } else {
    $docUrl = '';
    }
    $proUrl            = trim($_POST["pro-url"]);

    if(!empty($proUrl)){
    $proUrl = $proUrl;
    } else {
    $proUrl = '';
    }

    $salary           = trim($_POST["salary"]);
    $mname            = trim($_POST["mname"]);
    $sname            = trim($_POST["sname"]);
    $alias            = trim($_POST["alias"]);
    $father_name      = trim($_POST["fathername"]);

    $paddress          = trim($_POST["paddress"]);
    $pvillage          = trim($_POST["pvillage"]); 
    $ppostoffice       = trim($_POST["ppostoffice"]); 
    $ppolicestation    = trim($_POST["ppolicestation"]); 
    $pdistrict          = trim($_POST["pdistrict"]); 
    $pchoosestate      = trim($_POST["pchoosestate"]);
    $ppostalcode       = trim($_POST["ppostalcode"]);

    $document          = trim($_POST["document"]);
    $other_details     = trim($_POST["otherdetails"]);
    $amount            = trim($_POST["finalAmount"]);
    $tempID            = rand(19999,10000);
    $empID             = rand(199999,100000);
    $dateTime          = date('Y-m-d H:i:s');
    $employmentStatus  = '1';
    $createdDate       = date('Y-m-d H:i:s');

    if( empty($fname_err) && empty($dob_err) && empty($doj_err) && empty($email_err) && empty($phone_err) ){ 

      $query = "INSERT INTO employees (employee_id, company_id, first_name, middle_name, last_name, alias_name, father_name, worker_type, docTypeId, document_no, dob, doj, gender, salary, email, mobile, photo, other_details, temp_id, created_at) VALUES ('$empID','$company_ids','$fname','$mname','$sname','$alias','$father_name','$worker_type','$doc_type','$documentnumber','$dob_date','$doj_date','$gender','$salary','$email','".$phone."','$proUrl','$other_details','$tempID','$createdDate')";

    $data         = mysqli_query ($link, $query)or die(mysqli_error($link));
    $worker_id    = mysqli_insert_id($link);


    if(!empty($worker_type)){
        $queryes     = "SELECT * FROM employee_types WHERE source = 'B' AND id=".$worker_type;
        $results     = mysqli_query($link, $queryes) or die(mysqli_error($link));
        $fetchs      = mysqli_fetch_row($results);
        $workertype  = $fetchs[1];
    }

    $notification   = "Your help ".$fname." was just scanned for ".$workertype." by ".$yourname." at delhi.";
    addNotification($link, $param_id, $notification);

    for($i=0;$i<count($_POST['varification']);$i++){

    $verification_type      = $_POST['varification'][$i];        

    $res = mysqli_query($link, "SELECT * FROM verification_types WHERE id='$verification_type'") or die(mysqli_error($link));
    
    $verifications = $res->fetch_all(MYSQLI_ASSOC); 

    $verifications_amount = $verifications[0]['verification_amount'];

    $documentRequired = $verifications[0]['docRequired'];

    $isAddress = $verifications[0]['isAddress'];

    $taskID         = $order_id + $i;

    mysqli_query ($link, "INSERT INTO order_histories (task_id, order_id, company_id, worker_id, verification_type, verification_amount, documentRequired, isAddress, created_at) VALUES ('$taskID', '$order_id', '$company_id', '$worker_id', '$verification_type', '$verifications_amount', '$documentRequired', '$isAddress', '$createdDate')") or die(mysqli_error($link));
    }

    $saveDocQuery = "INSERT INTO employee_pictures (company_id, worker_id, photo, created_at) VALUES ('$param_id', '$worker_id','$proUrl','$createdDate')";
    mysqli_query ($link, $saveDocQuery)or die(mysqli_error($link));

    $DocQuery = "INSERT INTO uploaded_documents (filesName, worker_id, company_id, docTypeId, docNumber, status, orderId, created_at) VALUES ('$docUrl','$worker_id','$param_id','$doc_type','$documentnumber','0','','$createdDate')";
    mysqli_query ($link, $DocQuery)or die(mysqli_error($link)); 

    if($DocQuery){
      unset($_SESSION['prourl']);
      unset($_SESSION['docurl']);
    }

    if(!empty($address)){
    $pAddrQuery   = "INSERT INTO addresses (company_id, worker_id, addressType, village, postoffice, policestation, district, near_by, state, pincode, created_at, status) VALUES ('$company_id','$worker_id','PE','$village','$postoffice','$policestation','$district','$address','$choose_state','$postal_code','$dateTime','0')";     
    mysqli_query ($link, $pAddrQuery)or die(mysqli_error($link));
    }

    if(!empty($paddress)){
    $cAddrQuery   = "INSERT INTO addresses (company_id, worker_id, addressType, village, postoffice, policestation, district, near_by, state, pincode, created_at, status) VALUES ('$company_id','$worker_id','PR','$pvillage','$ppostoffice','$ppolicestation','$pdistrict','$paddress','$pchoosestate','$ppostalcode','$dateTime','0')";    
    mysqli_query ($link, $cAddrQuery)or die(mysqli_error($link));
    }

    mysqli_query($link, "INSERT INTO networks (company_id, worker_id, status, created_at) VALUES ('$param_id', '$worker_id', '1', '$createdDate')") or die(mysqli_error($link));

    $querySave = "INSERT INTO employment_histories (employeId, companyId, empType, salary, phoneNo, doj, dor, employmentStatus, created_at) VALUES ('$worker_id', '$company_id', '1', '$salary', '$phone', '$dob_date', '$doj_date', '$employmentStatus', '$createdDate')";

    $retData = mysqli_query ($link, $querySave)or die(mysqli_error($link));

    mysqli_query ($link, "INSERT INTO payment_histories (worker_id, company_id, additional_amount, temp_id, gst, subTotal, created_at) VALUES ('$worker_id', '$company_id', '$amount', '$order_id','$gst','$subTotal','$createdDate')") or die(mysqli_error($link));


    if($amount>0){

          $key1 = "order_id";
          $key2 = "worker_id";
          $key3 = "amount";
          $text1 = $order_id;
          $text2 = $worker_id;
          $text3 = $amount;
          $orderid = bin2hex(openssl_encrypt($text1,'AES-128-CBC', $key1));
          $workerid = bin2hex(openssl_encrypt($text2,'AES-128-CBC', $key2));
          $amounts = bin2hex(openssl_encrypt($text3,'AES-128-CBC', $key3));

      header('location: pay-process.php?order_id='.$orderid.'&worker_id='.$workerid.'&amount='.$amounts.'');

      } else {

        header("Location: freepayment-thankyou.php?temp_id=".$tempID."");

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

@media screen and (max-width: 1024px) {

  .col-md-12.mar-bottom-10.capture-image {
      text-align: center;
      padding-bottom: 5px;
  }

  .font-size-24 {
    font-size: 24px;
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
    font-size: 10.5px;
    position: absolute;
    right: 40px;
}
</style>

<style>

.tab {
  display: none;
}

#prevBtn {
  background-color: #bbbbbb;
}

.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

.step.finish {
  background-color: #4CAF50;
}

#emp-image {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
#empimages {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

#emp-image + label {
    font-size: 12px;
    padding: 10px 15px 7px 15px;
    cursor: pointer;
    max-width: 100%;
    margin: 0;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: inline-block;
    overflow: hidden;
    border-radius: 65px;
}

.bg-blue2-dark {
    background-color: #4A89DC!important;
    color: #FFFFFF!important;
}
.button-m {
    padding: 10px 20px 8px 20px;
    font-size: 12px;
    line-height: 20px;
    border: none
}
.button-circle {
    border-radius: 65px;
}

button.scanner-btn {
    background: #007bff;
    color: #fff;
    border: none;
    margin-top: 14px;
    padding: 10px 20px 13px 20px;
    width: 100%;
    border-radius: 30px;
    cursor: pointer;
}

</style>

<style>
.loader {
  border: 10px solid #f3f3f3;
  border-radius: 50%;
  border-top: 10px solid #3498db;
  width: 40px;
  height: 40px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

.loader-img {
    width: 100%;
    text-align: center;
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<style type="text/css">
 .capture-image-area {
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100vh;
    z-index: 100000000;
    display: none;
 } 
 .camera-width {
    width: 100%;
    height: 100vh;
    z-index: 100000000;
 }  

 button#capture {
    z-index: 10000000000000;
    position: fixed;
    bottom: 8%;
    left: 50%;
    transform: translate(-50%, -8%);
    background: red;
    width: 70px;
    height: 70px;
    border-radius: 100%;
    color: #fff;
    font-size: 12px;
    border: 2px solid #fff;
    font-weight: bold;
    box-shadow: 0 0 6px #aaa;
}

.custom-btn {
    margin-left: 5px;
    font-size: 12px!important;
    padding: 9px 20px 7px 20px!important;
    line-height: 18px!important;
    background-color: #4A89DC!important;
    color: #FFFFFF!important;
    font-weight: normal!important;
    border-radius: 20px;
}

.col-md-12.mar-bottom-10.capture-image img {
    width: 100%!important;
}

</style>

<div id="captureImage" class="capture-image-area">
  <input type="hidden" id="uploadtype" value="" />
  <div id="camera" class="camera-width">
    <div class="camerarealtime">             
      <div class="camera-overlay"></div>
      <video class="camera-video" id="video" style="height: 100vh;margin: 0 auto;display: flex;"></video>
      <div class="Camera-overlay"></div>
    </div>            
  </div>

  <div id="sourceSelectPanel" style="display:none!important; visibility: hidden !important;">
    <select class="browser-default" id="sourceSelect" style="max-width:400px"></select>
  </div>
  <button id="capture">Capture</button>
</div>

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

                                  <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="row">
                                      <div class="col-lg-12 col-md-12 col-sm-12">
                                        <h4 class="bg-grea-3 control-label">Profile picture</h4>
                                        <div class="edit-profile-photo">
                                              <div id="targetLayer"></div>
                                              <div class="imagehidden" id="imagehidden">
                                              <?php if(!empty($pro_url)){ ?>
                                                <img src="<?php echo $pro_url; ?>" alt="profile-photo" class="img-fluid" />
                                              <?php } else { ?>
                                                <img src="<?php echo $base_url.'img/dummy-image.jpg'; ?>" alt="profile-photo" class="img-fluid" />
                                              <?php } ?>
                                              </div>                             
                                          </div>
                                          <?php if(!empty($errors)){ ?>
                                                <span class="help-block"><?php echo $errors; ?></span>      
                                           <?php } ?> 
                                          <span class="help-block"><?php echo $photo_err; ?></span>
                                        </div>

                                    </div>
                                  </div>

                                  <div class="col-lg-9 col-md-9 col-sm-12">
                                  <div class="row">
                                      <div class="col-lg-4 col-md-4 col-sm-12">
                                          <div class="form-group">
                                              <label>Employee Type (required)</label>
                                              <select class="browser-default custom-select" name="worktype" id="worktype" readonly style="height: 45px;background: #ddd;">
                                                  <?php
                                                      $queryees = "SELECT * FROM employee_types WHERE source ='B' AND id='$worker_ID'";

                                                      $res = mysqli_query($link, $queryees) or die(mysqli_error($link));
                      
                                                      $revAllResultes  = $res->fetch_all(MYSQLI_ASSOC);   

                                                      if ($res->num_rows!=0) {                                     

                                                      foreach ($revAllResultes as $key => $valuess) {

                                                      $ID        = $valuess['id'];
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

                                                      $queryeess = "SELECT * FROM document_types WHERE source ='B' AND id='$doctype_ID'";

                                                      $rese = mysqli_query($link, $queryeess) or die(mysqli_error($link));
                      
                                                      $revAllResultes  = $rese->fetch_all(MYSQLI_ASSOC);   

                                                      if ($rese->num_rows!=0) {                                     

                                                      foreach ($revAllResultes as $key => $valueess) {

                                                      $ID        = $valueess['id'];
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
                                             <input type="text" class="input-text" name="dob" id="dob" autocomplete="off" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="numberMobile(event);" placeholder="Date of birth" />
                                            <span class="help-block" id="dob_msg"><?php echo $dob_err; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">Date of joining</label>
                                             <input type="text" class="input-text" name="doj" id="doj" autocomplete="off" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="numberMobile(event);" placeholder="Date of joining" />
                                            <span class="help-block" id="doj_msg"><?php echo $doj_err; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Salary</label>
                                             <input type="text" class="input-text" name="salary" id="salary" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="numberMobile(event);" autocomplete="off" placeholder="Salary" />
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

                                </div>

                            </div>

                            <h4 class="bg-grea-3">Contact details</h4>
                            <div class="row pad-20">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Father's name</label>
                                        <input type="text" class="input-text" maxlength="35" name="fathername" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" placeholder="Father's name" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                         <input type="email" class="input-text" maxlength="30" id="email" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" name="email" placeholder="Email" />
                                     <span class="help-block" id="email_msg"><?php echo $email_err; ?></span>
                                </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Phone number</label>
                                        <input type="text" class="input-text" id="phone" name="phone" id="phone" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="numberMobile(event);" autocomplete="off" placeholder="Phone" />
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
                                        <input type="text" class="input-text" maxlength="50" name="address" id="address" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" placeholder="Address" />
                                         <span class="help-block" id="address_msg"><?php echo $address_err; ?></span>
                                    </div>
                                </div>
              
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Village</label>
                                        <input type="text" class="input-text" name="village" id="village" maxlength="50" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" placeholder="Village" />
                                        <span class="help-block" id="village_msg"><?php echo $village_err; ?></span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Post Office</label>
                                        <input type="text" class="input-text" name="postoffice" id="postoffice" maxlength="50" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" placeholder="Post Office" />
                                        <span class="help-block" id="postoffice_msg"><?php echo $postoffice_err; ?></span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Police Station</label>
                                        <input type="text" class="input-text" name="policestation" id="policestation" maxlength="50" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" placeholder="Police Station" />
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
                                        <input type="text" class="input-text" name="postalcode" id="postalcode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="numberMobile(event);" autocomplete="off" maxlength="6" placeholder="Postal code">
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
                                        <input type="text" class="input-text" name="paddress" id="paddress" maxlength="50" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" placeholder="Permanent address" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Village</label>
                                        <input type="text" class="input-text" name="pvillage" id="pvillage" maxlength="50" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" placeholder="Village" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Post Office</label>
                                        <input type="text" class="input-text" name="ppostoffice" id="ppostoffice" maxlength="50" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" placeholder="Post Office" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Police Station</label>
                                        <input type="text" class="input-text" name="ppolicestation" id="ppolicestation" maxlength="50" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" placeholder="Police Station" />
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
                                        <input type="text" class="input-text" name="ppostalcode" id="ppostalcode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="numberMobile(event);" autocomplete="off" maxlength="6" placeholder="Postal code">
                                    </div>
                                </div>

                  </div>
        
          </div>

                            </div>
                 
                            <h4 class="bg-grea-3">Other details you know</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <textarea class="input-text" maxlength="250" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="otherdetails" placeholder="Detailed Information"></textarea>
                                </div>
                            </div>
                            <h4 class="bg-grea-3">Verification type</h4>
                            <div class="row pad-20 cust-class">
                             <?php   $count = 1;
                                     $queryess = "SELECT * FROM verification_types WHERE source='B'"; 
                                     $verResult    = mysqli_query($link, $queryess) or die(mysqli_error($link));
                                     $verAllResult = $verResult->fetch_all(MYSQLI_ASSOC);     
                                     foreach($verAllResult as $verification): 
                                     $amount = $verification['verification_amount'];
                                 ?>
                                <div class="col-lg-3 col-md-4 col-sm-6" style="">
                                    <div class="checkbox checkbox-theme checkbox-circle click-checkbox">
                                        <input id="checkbox<?php echo $verification['id'] ?>" type="checkbox" data-amount="<?php echo $verification['verification_amount'] ?>" name="varification[]" value="<?php echo $verification['id'] ?>" <?php if($count==1){ ?>checked<?php } ?> />
                                        <label for="checkbox<?php echo $verification['id'] ?>">
                                            <?php echo $verification['verification_type'] ?> (<?php echo "&#x20b9; ".$amount; ?>)
                                        </label>
                                    </div>
                                </div>
                                <?php $count++; endforeach; ?>
                            
                            </div>
                             <hr>
                            <div class="row pad-20">
                            <div class="col-lg-4 col-md-12 col-sm-12">                                 
                            <input type="hidden" name="document" id="alldocs" />
                            <input type="hidden" name="select-val" id="selectedState" value="" />
                            <input type="hidden" name="finalAmount" id="finalamount" value="0" />   
                            <input type="hidden" name="latitude" id="latitudes" value="" />        
                            <input type="hidden" name="longitude" id="longitudes" value="" />
                            <input type="hidden" name="doc-url" id="DocUrl" value="<?php echo $doc_url; ?>" />
                            <input type="hidden" name="pro-url" id="ProUrl" value="<?php echo $pro_url; ?>" />
                            <input type="hidden" name="addemp" value="addnew" />
                            <span style="display:none;"><b>Payment amount:</b></br> &#x20a8; <span id="finaltotal">0</span></span>
                            <button type="submit" class="btn btn-md button-theme" name="add_worker" id="sub-btn" style="padding: 13px 30px 11px 30px; color: #fff; font-size: 15px; width: 175px; text-align: center;">Pay &#8377;<span id="button_amount" style="color:#fff;">0</span></button> 
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
          <img src="img/loader-img.gif" id="hide_image" width="100" style="padding-top: 20px;margin: 0 auto;display: inherit;" />
          <form action="#" id="frmSelectType" method="post" enctype="multipart/form-data"> 
                <div id="step1" class="tab">
                  <h3 style="text-align: center;" class="font-size-24">Document Verification</h3>
                  <div class="input-style input-style-1 input-required custom-input-style">   
                      <em class="arrow-icons"><i class="fa fa-angle-down" aria-hidden="true" style="color: #fff!important;"></i></em>  
                      <select name="employeetype" id="employeetype">
                          <option value="">Select Employee Type</option>
                          <?php
                              $empTypeQuery = "SELECT * FROM employee_types WHERE source='B'";
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
                          <option value="">Select Document Type</option>
                          <?php
                              $docTypeQuery   = "SELECT * FROM document_types WHERE status = '1' AND source='B'";
                              $docTypeResult  = mysqli_query($link, $docTypeQuery) or die(mysqli_error($link));
                              $allDocResult   = $docTypeResult->fetch_all(MYSQLI_ASSOC);                           
                          ?>
                          <?php if($allDocResult): ?>
                              <?php foreach ($allDocResult as $key => $document): ?>
                                  <option value="<?php echo $document['id']; ?>"><?php echo $document['documentName']; ?></option>
                              <?php endforeach; ?>
                          <?php endif; ?>
                      </select>
                      <span class="help-block" id="employeedoc_err"></span>
                  </div>

                  <div class="input-style input-style-1 input-required custom-input-style" id="hide" style="display: none;">
                      <span id="documentLevel" style="display: none;">Document Number</span>
                      <input type="text" name="documentNumber" id="documentNumber" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autocomplete="off" value="" onkeypress="allowAlphaNumericSpace(event)" class="input-text" placeholder="Document Number" />
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

                  <div class="input-style input-style-1 input-required custom-input-style"> 
                    <button type="button" class="button button-m button-full bg-blue2-dark scanner-btn" id="nextBtn" onclick="return Validate();">Next</button>
                  </div>

                </div>

                <div id="step2" class="tab">

                   <div class="col-md-12 mar-bottom-10 capture-image">
                      <img id="emp-image-show" src="img/camera-capture-icon.png" alt="Take Document Picture" style="width: auto; height: auto!important;" />
                   </div>

                  <div class="col-md-12" style="margin-top: 10px;">
                        <div class="form-group" style="text-align: center;">
                            <!-- <input type="file" name="doc-image" id="emp-image" accept="image/*" capture="environment" /> -->
                            <input type="hidden" name="photos" id="photos_image" value="" />
                            <label data-type="1" id="btn-document-img" class="btn-profile-img button button-3d button-m button-circle bg-blue2-dark bg-red2-light" style="font-size: 12px;padding: 7px 15px 7px 15px;cursor: pointer;max-width: 100%;margin: 0;">Take Document Picture</label>                       
                        </div>
                  </div>  

                  <div class="col-md-12">
                      <div class="form-group">
                        <button type="button" class="button button-m button-full bg-blue2-dark scanner-btn hide-button1 submit-btn2" id="nextBtn" onclick="nextPrev(1)">Next</button>          
                      </div>
                  </div>      

                </div>

                <div id="step3" class="tab">

                    <div class="col-md-12 mar-bottom-10 capture-image">
                        <img id="emp-image-shows" src="img/camera-capture-icon.png" alt="Take Profile Picture" style="width: auto; height: auto!important;" />
                    </div>

                  <div class="col-md-12" style="margin-top: 10px;">
                        <div class="form-group" style="text-align: center;">
                            <!-- <input type="file" name="emp-image" id="empimages" accept="image/*" capture="environment" /> -->    
                            <input type="hidden" name="photos2" id="photos_image2" value="" />                    
                            <label data-type="2" id="btn-profile-img" class="btn-profile-img button button-3d button-m button-circle bg-blue2-dark bg-red2-light" style="font-size: 12px;padding: 7px 15px 7px 15px;cursor: pointer;max-width: 100%;" >Capture Profile Picture</label>
                          <input type="hidden" name="empId" value="<?php echo $empId; ?>" />
                        </div>
                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <button type="submit" name="scan" class="button button-m button-full bg-blue2-dark" id="scanner-btn" onclick="return Validates();">Submit</button>
                  </div>

                </div>

            </form>
    </div>
<!-- Popup Div Ends Here -->
</div>

<?php
}
?>

<?php include("footer.php"); ?>

<script type = "text/javascript">  
jQuery(document).ready(function($) {
    $('#hide_image').css('display','none');
});
</script>


<script type="text/javascript"> 
jQuery(document).ready(function($){
  $(".btn-profile-img").click(function(){
    $("#captureImage").show();
    var vals;
    vals = $(this).attr("data-type");
    $("#capture").attr("data-type", vals);
    $("#uploadtype").val(vals);
  });
}); 
</script>

<script type="text/javascript" src="zxing.min.js"></script>

<script type="text/javascript">

    function decodeOnce(codeReader, selectedDeviceId) {
      codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
      }).catch((err) => {
        console.error(err);
        document.getElementById('result').textContent = err;
      })
    }

    window.addEventListener('load', function () {
      let selectedDeviceId;
      const codeReader = new ZXing.BrowserQRCodeReader()
      console.log('ZXing code reader initialized')

      codeReader.getVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect');
          
          if (videoInputDevices.length == 1) {
            selectedDeviceId = videoInputDevices[0].deviceId
          } else {
            selectedDeviceId = videoInputDevices[1].deviceId
          }
          
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
              decodeOnce(codeReader, selectedDeviceId);
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          decodeOnce(codeReader, selectedDeviceId);

          console.log(`Started decode from camera with id ${selectedDeviceId}`)

        })
        .catch((err) => {
          console.error(err)
        })
    })
  </script>
  <script type="text/javascript">
    (function() {
        "use strict";
     
        var video, $output;
        var scale = .5;
     
        var initialize = function() {
            $output = $("#emp-image-show");
            video = $("#video").get(0);
            $("#capture").click(captureImage);   
        };
     
        var captureImage = function() {
            $("#captureImage").hide(); 
            var canvas = document.createElement("canvas");
            var selectedVals = document.getElementById('uploadtype').value;
            canvas.width = video.videoWidth * scale;
            canvas.height = video.videoHeight * scale;
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            var img = document.createElement("img");
            img.src = canvas.toDataURL();
            $output.prepend(img);

            $.ajax({
                method: 'POST',
                url: 'camsave.php',
                data: {
                    photo: canvas.toDataURL(),
                    uploadtype: selectedVals
                },
                dataType: 'JSON',
                success: function(data) {   
                    var fileUrl = data.file;               
                    var fileupload_type = data.upload_type;  

                    if(fileupload_type==1){
                      $("#emp-image-show").attr('src', fileUrl);   
                      $("#DocUrl").val(fileUrl);   
                      $("#btn-document-img").text('Retake document picture');                
                    }  

                    if(fileupload_type==2){ 
                       $("#emp-image-shows").attr('src', fileUrl);   
                       $("#ProUrl").val(fileUrl); 
                       $("#btn-profile-img").text('Retake profile picture');
                    }             
                    
                    
                }
            });
        };
     
        $(initialize);            
     
    }());
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
  $('#choosestate').bind("change",function(e){
    $("#choosestate_msg").html("");
  });
  $('#district').bind("change",function(e){
    $("#district_msg").html("");
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

        if(documentNumberv == ''){
            alert('Please Put ' + docText +' Number ');
            return false;
        }

        if (checkBox.checked == false){
            alert('Please Accept Terms and Condition');
            return false;
        } 

        nextPrev(1);

    }

    function Validates() {        
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

        if(documentNumberv == ''){
            alert('Please Put ' + docText +' Number ');
            return false;
        }

        if (checkBox.checked == false){
            alert('Please Accept Terms and Condition');
            return false;
        } 

/*        if( document.getElementById("empimages").files.length == 0 ){
            alert('Please upload profile picture.');
            return false;
        }*/


        if(documentType){
            var documentTypeText = document.getElementById("documentType");
            var documentNumber = document.getElementById("documentNumber");
            var docText = documentTypeText.options[documentTypeText.selectedIndex].text;
            document.getElementById("frmSelectType").action = "new-employee.php?employeetype=" + employeetype + "&documenttype=" + documentType + "&documentnumber=" + documentNumberv;
        }
    }
</script>

<!-- <script type="text/javascript">
jQuery(document).ready(function($){
  $(".submit-btn2").click(function(){
      if( document.getElementById("emp-image").files.length == 0 ){
        alert('Please upload profile picture.');
            return false;
      }
  });
}); 
</script> -->

<!-- <script type="text/javascript">
$("#documentNumber").keyup(function() {
  var value = $(this).val();
  value = value.replace(/\D/g, "").split(/(?:([\d]{4}))/g).filter(s => s.length > 0).join("-");
  $(this).val(value);
});

$("#documentNumber").on("change, blur", function() {
  var value = $(this).val();
  var maxLength = $(this).attr("maxLength");
  if (value.length != maxLength) {
    $(this).addClass("highlight-error");
  } else {
    $(this).removeClass("highlight-error");
  }
});  
</script> -->

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
            //document.getElementById("scanner-btn").innerHTML = "Search " + docText + " Number";
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

    function numberMobile(e){
        e.target.value = e.target.value.replace(/[^\d]/g,'');
        return false;
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

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  //if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:

  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted: 
    document.getElementById("frmSelectType").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

</script>



