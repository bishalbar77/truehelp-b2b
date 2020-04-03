<?php 
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

$fullname_err = "";

$workertype_err = "";

$aadharnumber_err = "";

$full_name = "";

$aadhar_number = "";

$param_ids = $_REQUEST["ID"];

if(empty($param_ids)){
    //header("location: employees.php");
    //exit;
}
 

if(!empty($param_ids)){ 

   $revQuery      = "SELECT * FROM employees WHERE source='B' AND id='$param_ids'";

   $revResult     = mysqli_query($link, $revQuery) or die(mysqli_error($link));
  
   $revAllResult  = $revResult->fetch_all(MYSQLI_ASSOC); 

   $emptype_ID     = $revAllResult[0]["worker_type"]; 
   
   $doctype_ID     = $revAllResult[0]["docTypeId"]; 
   
   $documentnumber = $revAllResult[0]["document_no"]; 

   $worker_ids     = $revAllResult[0]['id'];

   $company_id     = $revAllResult[0]['company_id'];

   if($company_id=='0'){
      $currently = 0;
   } else {
      $currently = 1;
   }

   $worker_name    = $revAllResult[0]['first_name'];

   $gender         = $revAllResult[0]['gender'];
	
   $document_no    = $revAllResult[0]['document_no'];

   $mname          = $revAllResult[0]['middle_name'];

   $sname          = $revAllResult[0]['last_name'];

   $alias          = $revAllResult[0]['alias_name'];

   $dob_date       = $revAllResult[0]['dob'];

   $doj_date       = $revAllResult[0]['doj'];

   $salary         = $revAllResult[0]['salary'];   

   $father_name    = $revAllResult[0]['father_name'];
   
   $contact_email  = $revAllResult[0]['email'];

   $contact_phone  = $revAllResult[0]['mobile'];

   $photos         = $revAllResult[0]['photo']; 
 
   $other_details  = $revAllResult[0]['other_details'];



   $addrQuery     = "SELECT * FROM addresses WHERE worker_id = '$worker_ids' AND addressType='PR' ORDER BY id ASC";
   $addrResult    = mysqli_query($link, $addrQuery) or die(mysqli_error($link));
   $addrAllResult = $addrResult->fetch_all(MYSQLI_ASSOC); 

   $near_by        = $addrAllResult[0]['near_by'];

   $village        = $addrAllResult[0]['village']; 

   $postoffice     = $addrAllResult[0]['postoffice'];

   $policestation  = $addrAllResult[0]['policestation'];

   $state          = trim($addrAllResult[0]['state']); 

   $district       = $addrAllResult[0]['district'];

   $postalcode     = $addrAllResult[0]['pincode'];

   $addrQuery     = "SELECT * FROM addresses WHERE worker_id = '$worker_ids' AND addressType='PE' ORDER BY id ASC";
   $addrResult    = mysqli_query($link, $addrQuery) or die(mysqli_error($link));
   $addrAllResults = $addrResult->fetch_all(MYSQLI_ASSOC);

   $pnear_by       = $addrAllResults[0]['near_by'];

   $pvillage       = $addrAllResults[0]['village'];

   $ppostoffice    = $addrAllResults[0]['postoffice'];

   $ppolicestation = $addrAllResults[0]['policestation'];
   
   $pstate         = $addrAllResults[0]['state'];

   $pdistrict      = $addrAllResults[0]['district'];

   $ppostalcode    = $addrAllResults[0]['pincode'];

   $verification   = $revAllResult[0]['verification_type'];

   $finalamount    = $revAllResult[0]['final_amount'];


   if(!empty($finalamount)){
    
	   $finalamount  = $finalamount; 
   
   } else {

	    $finalamount = 0;

   }


   $addrQuerys     = "SELECT * FROM payment_histories WHERE worker_id = '$worker_ids' AND company_id='$company_id'";

   $addrResults    = mysqli_query($link, $addrQuerys) or die(mysqli_error($link));

   $addrAllResultes = $addrResults->fetch_all(MYSQLI_ASSOC);

   $term_ids = $addrAllResultes[0]['temp_id'];


   $addrQueryes     = "SELECT * FROM uploaded_documents WHERE worker_id = '$worker_ids' AND company_id='$company_id'";

   $addrResultes    = mysqli_query($link, $addrQueryes) or die(mysqli_error($link));

   $addrAllResultess = $addrResultes->fetch_all(MYSQLI_ASSOC);

   $filesName = $addrAllResultess[0]['filesName'];


}


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


?>


<?php include "header.php"; ?>

<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css">

<style>
.file_remove li {
    width: 155px;
    height: 155px;
    overflow: hidden;
    display: inline-block;
}

.file_remove li img {
  width: 100%;
}

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
div#selection {
    width: 100%;
    display: inherit;
}

.color-unassign {
  background: #4393d7!important;
  color: #fff!important;
}

.color-wip {
  background: #4393d7!important;
  color: #fff!important;
}

.color-escalated {
  background: #4393d7!important;
  color: #fff!important;
}

.color-insufficiencyresponded {
  background: #4393d7!important;
  color: #fff!important;
}

.color-awaitingresponse {
  background: #4393d7!important;
  color: #fff!important;
}

.color-completed {
  background: #28a745!important;
  color: #fff!important;
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
                            <div class="col-sm-12 col-md-6"><h4>Edit</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="employees.php">Employees</a>
                                        </li>
                                        <li class="active">Edit Employee</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                         <form action="update-employee.php" id="form" method="post" enctype="multipart/form-data" onsubmit="return frmValidation()"> 
                            <h4 class="bg-grea-3">Basic Information</h4>
                            <div class="search-contents-sidebar">
                                <div class="row pad-20">
                                  <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">                                          
                                            <label>Employee Type</label>
                                            <select class="browser-default custom-select" name="worktype" id="worktype" readonly style="height: 45px;background: #ddd;">
                                                <?php
                                                    $queryees = "SELECT * FROM employee_types WHERE source ='B' AND id='$emptype_ID'";

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
                                            <label>Document Type</label>
                                            <select class="browser-default custom-select" name="doctype" id="doctype" readonly style="height: 45px;background: #ddd;">
                                                <?php

                                                    $queryeess = "SELECT * FROM document_types WHERE source ='B' AND id='$doctype_ID'";

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
                                            <label>First name</label>
                                            <input type="text" class="input-text" id="fullname" name="fullname" maxlength="35" placeholder="First name" value="<?php echo $worker_name; ?>" readonly style="background: #ddd;" />
					                                  <span class="help-block" id="fullname_err"><?php echo $fullname_err; ?></span>
                                        </div>
                                    </div>
				   
				                            <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Middle name</label>
                                            <input type="text" class="input-text" name="mname" maxlength="35" placeholder="Middle name" value="<?php echo $mname; ?>" readonly style="background: #ddd;" />
                                        </div>
                                    </div>

                                   <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Family/Surname</label>
                                            <input type="text" class="input-text" name="sname" maxlength="35" placeholder="Family/Surname name" value="<?php echo $sname; ?>" readonly style="background: #ddd;" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Alias</label>
                                            <input type="text" class="input-text" name="alias" maxlength="35" placeholder="Alias" value="<?php echo $alias; ?>" readonly style="background: #ddd;" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="browser-default custom-select" name="worktype" id="worktype" style="background: #ddd;">                                               
                                                <option value="">Choose gender</option>
                                                <option value="M" <?php if( $gender=="M"){ echo "selected='selected'"; } ?>>Male</option>
                                                <option value="F" <?php if( $gender=="F"){ echo "selected='selected'"; } ?>>Female</option>
                                              </select>
                                            <span class="help-block" id="worktype_err"><?php echo $workertype_err; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Date of Birth (required)</label>
                                             <input type="text" class="input-text" name="dob" id="dob" maxlength="10" placeholder="Date of birth" value="<?php echo $dob_date; ?>" readonly style="background: #ddd;" />
                                            <span class="help-block" id="dob_err"><?php echo $dob_err; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Date of Joining (required)</label>
                                            <input type="text" class="input-text" name="doj" id="doj" maxlength="10" placeholder="Date of joining" value="<?php echo $doj_date; ?>" readonly style="background: #ddd;" />
                                            <span class="help-block" id="doj_err"><?php echo $doj_err; ?></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label>Salary</label>
                                             <input type="text" class="input-text" name="salary" id="salary" maxlength="16" placeholder="Salary" value="<?php echo $salary; ?>" readonly style="background: #ddd;" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group" style="margin-top: 30px;">
                                            <p class="currently_emp">Currently employed with you?</p>
                                            <label class="switch">
                                              <input type="checkbox" name="employed" value="1" <?php if($currently==1){ echo "checked";} else { echo "";} ?> />
                                              <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div> 

                                </div>
                            </div>
                            <h4 class="bg-grea-3">Contact Details</h4>
                            <div class="row pad-20">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Father's name</label>
                                        <input type="text" class="input-text" maxlength="35" name="name" placeholder="Father's name" value="<?php echo $father_name; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                         <input type="email" class="input-text" maxlength="30" name="email" placeholder="Email" value="<?php echo $contact_email; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" class="input-text" id="phone" name="phone" maxlength="11"  placeholder="Phone" value="<?php echo $contact_phone; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>
                               
                            </div>
                            <h4 class="bg-grea-3">Address</h4>
                            <div class="row pad-20">
                         			<div class="col-lg-12 col-md-12 col-sm-12">
                    	           <h6>Current address</h6>
                    	           <div class="row pad-20">
                                 <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Address</label>
                                        <input type="text" class="input-text" maxlength="50" name="address" id="address" autocomplete="off" placeholder="Address" value="<?php echo $near_by; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>
              
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Village</label>
                                        <input type="text" class="input-text" name="village" id="village" maxlength="50" autocomplete="off" placeholder="Village" value="<?php echo $village; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Post Office</label>
                                        <input type="text" class="input-text" name="postoffice" id="postoffice" maxlength="50" autocomplete="off" placeholder="Post Office" value="<?php echo $postoffice; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Police Station</label>
                                        <input type="text" class="input-text" name="policestation" id="policestation" maxlength="50" autocomplete="off" placeholder="Police Station" value="<?php echo $policestation; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>

                                <div id="selection">
                                   <div class="col-lg-6 col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label class="control-label">State</label>
                                          <select class="browser-default custom-select" name="choosestate" id="choosestate" style="height: 45px; background: #ddd;">                                  
                                            <option value="<?php echo $state; ?>" selected='selected'><?php echo $state; ?></option>
                                          </select>                                            
                                      </div>
                                  </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label">District</label>                           
                                            <select class="browser-default custom-select" name="district" id="district" style="height: 45px; background: #ddd;">                           
                                              <option value="<?php echo $district; ?>" selected='selected'><?php echo $district; ?></option>
                                            </select>                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Postal code</label>
                                        <input type="text" class="input-text" name="postalcode" id="postalcode" autocomplete="off" maxlength="6" placeholder="Postal code" value="<?php echo $postalcode; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>
              			         </div>
              			      </div>
                            
                      				<div class="col-lg-12 col-md-12 col-sm-12">
                      				 <h6>Permanent address</h6>
                      				 <div class="row pad-20">
				                        <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Permanent Address</label>
                                        <input type="text" class="input-text" name="paddress" id="paddress" maxlength="50" autocomplete="off" placeholder="Permanent address" value="<?php echo $pnear_by; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Village</label>
                                        <input type="text" class="input-text" name="pvillage" id="pvillage" maxlength="50" autocomplete="off" placeholder="Village" value="<?php echo $pvillage; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Post Office</label>
                                        <input type="text" class="input-text" name="ppostoffice" id="ppostoffice" maxlength="50" autocomplete="off" placeholder="Post Office" value="<?php echo $ppostoffice; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Police Station</label>
                                        <input type="text" class="input-text" name="ppolicestation" id="ppolicestation" maxlength="50" autocomplete="off" placeholder="Police Station" value="<?php echo $ppolicestation; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>

                                <div id="selection">
                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                      <div class="form-group" id="selVal">
                                          <label>State</label>
                                          <select class="browser-default custom-select" name="pchoosestate" id="pchoosestate" style="height: 45px; background: #ddd;">
                                            <option value="<?php echo $pstate; ?>" selected='selected'><?php echo $pstate; ?></option>
                                          </select>
                                      </div>
                                  </div>

                                  <div class="col-lg-6 col-md-6 col-sm-12">
                                      <div class="form-group">
                                          <label>District</label>
                                          <select class="browser-default custom-select" name="pdistrict" id="pdistrict" style="height: 45px; background: #ddd;">
                                            <option value="<?php echo $pdistrict; ?>" selected='selected'><?php echo $pdistrict; ?></option>
                                          </select>
                                      </div>
                                  </div>

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Postal code</label>
                                        <input type="text" class="input-text" name="ppostalcode" id="ppostalcode" autocomplete="off" maxlength="6" placeholder="Postal code" value="<?php echo $ppostalcode; ?>" readonly style="background: #ddd;" />
                                    </div>
                                </div>
                			       </div>
                			      </div>
                            </div>


                            <div class="row pad-20">
                                <div class="col-lg-3">
                                     <h4 class="bg-grea-3">Profile picture</h4>
                                     <div class="edit-profile-photo">                         
                                            <div class="imagehidden" id="imagehidden">
                                            <?php 
                                            $profileImage   = getProfileImage($link,$worker_ids);
                                            if(!empty($profileImage)){ ?>
                                            <img src="<?php echo $profileImage; ?>" alt="profile-photo" class="img-fluid">
                                            <?php } else { ?>
                                            <img src="<?php echo $base_url.'img/dummy-image.jpg'; ?>" alt="profile-photo" class="img-fluid">
                                            <?php } ?>
                                            </div>                   
                                      </div>
                                </div>
                                <div class="col-lg-9">
                                      <h4 class="bg-grea-3">All documents</h4>
                                      <div id="myDropZone" class="dropzone dropzone-design" style="display: none;">
                                          <div class="dz-default dz-message"><span>Drop files here to upload</span></div>                                   
                                      </div>
				    
                          				    <div class="document_pervious" style="margin-top:10px;">                          		
                          				      <ul class="file_remove">
                          				       <li>
                          				        <?php if($filesName){ ?>
                                           <img src="<?php echo $filesName; ?>" alt="file" class="file_image" />  		
                          				        <?php } ?>
                          				       </li>                          				     
                          				      </ul>
                          				    </div>
                                </div>
                            </div>  
                 
                            <h4 class="bg-grea-3">Other details you know</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <textarea class="input-text" maxlength="250" name="otherdetails" placeholder="Detailed Information" readonly style="background: #ddd;"><?php echo $other_details; ?></textarea>
                                </div>
                            </div>
                            <h4 class="bg-grea-3">Verification History</h4>
                            <div class="row pad-20">
				                        <?php  
                                  $orderQuery     = "SELECT a.*, a.status as orderStatus, b.verification_type FROM order_histories a left join verification_types b ON a.verification_type=b.id WHERE a.company_id='$company_id' AND a.worker_id='$worker_ids'";
                                  $orderResult    = mysqli_query($link, $orderQuery) or die(mysqli_error($link));
                                  $orderAllResult = $orderResult->fetch_all(MYSQLI_ASSOC);
     
                                 if(!empty($orderAllResult)): 
                                ?>

                                  <?php foreach ($orderAllResult as $key => $order): 
                                    $caseID = $order['task_id'];
                                    $create_Dates = $order['created_at'];
                                    
                                    
                                          switch ($order['task_status']) {
                                                case "0":
                                                    $faClass = 'In Progress';
                                                    $statuscolor = "color-unassign"; 
                                                    break;
                                                case "1":
                                                    $faClass = 'In Progress';
                                                    $statuscolor = "color-wip"; 
                                                    break;
                                                case "2":
                                                    $faClass = 'In Progress';
                                                    $statuscolor = "color-escalated"; 
                                                    break;
                                                case "3":
                                                    $faClass = 'In Progress';
                                                    $statuscolor = "color-insufficient"; 
                                                    break;
                                                case "4":
                                                    $faClass = 'In Progress';
                                                    $statuscolor = "color-insufficiencyresponded"; 
                                                    break;
                                                case "5":
                                                    $faClass = 'In Progress';
                                                    $statuscolor = "color-wip"; 
                                                    break;
                                                case "6":
                                                    $faClass = 'In Progress';
                                                    $statuscolor = "color-awaitingresponse"; 
                                                    break;
                                                case "7":
                                                    $faClass = 'Completed';
                                                    $statuscolor = "color-completed"; 
                                                    break;
                                                default:
                                                    $faClass = 'Completed';
                                                    $statuscolor = "color-completed"; 
                                            }
                                    ?>

                                      <div class="col-lg-3 col-md-4 col-sm-6" style="margin-bottom:10px;">
                                          <div class="checkbox checkbox-theme checkbox-circle <?php if(in_array($ID, $arrayVal)){} else { ?> click-checkbox <?php } ?>">
                                              <input id="checkbox<?php echo $count; ?>" type="checkbox" data-amount="<?php echo $amount; ?>" name="verify[]" value="<?php echo $ID; ?>" class="<?php if(in_array($ID, $arrayVal)){ ?>checked_box<?php } else { ?> <?php if($additional_amount_status==0 && $finalamount>1){ echo 'check_payment'; } } ?>" checked />
                                              <label for="checkbox<?php echo $count; ?>">
                                                  <?php echo ucfirst($order['verification_type']); ?>
                                              </label>

                                              <p style="margin: 0;">Case number: <?php echo $caseID; ?></p>

                                              <p style="margin: 0;">Status: <span class="<?php echo $statuscolor; ?>" style="padding:2px 5px;margin:0;"><?php echo $faClass; ?></span></p>
                                              <p style="margin: 0;">Report:
                                              <?php if($order['status'] == '1' && !empty($order['report_file'])){
                                                  $file = $order['report_file']; 
                                              ?>
                                               <a class="fancybox" href="<?php echo $file; ?>" style="color: #4393d7;">View PDF</a>
                                              <?php } else { ?>
                                                <img src="img/pening-icon.png" alt="Status" />
                                              <?php } ?>
                                              </p>

                                              <p style="margin: 0;">Date: <?php echo date('d M Y',strtotime($create_Dates)); ?></p>
                                              
                                          </div>
                                      </div>

                                  <?php endforeach; ?>

                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                    <p class="sub-banner-2 text-center">Copyright 2019, TrueHelp Enterprise.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard end -->

<?php include("footer.php"); ?>

<script src="js/jquery.fancybox.js"></script>

<script>
jQuery(document).ready(function($){
$(".fancybox").fancybox({
    width  : 1200,
    height : 800,
    type   :'iframe'
});
});
</script>
