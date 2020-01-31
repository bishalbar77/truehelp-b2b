<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

$statuss = $_REQUEST["status"];

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



if ( isset($_REQUEST['workerId']) || empty($_REQUEST['workerId']) ) {


} else {

      $stonevar = $_GET['workerId'] ? $_GET['workerId'] : NULL;

      $stonevar_action = $_GET['onboard'] ? $_GET['onboard'] : NULL;

      if ( $stonevar===NULL || $stonevar_action===NULL) {
      header("Location: employees.php");
      exit();
      }
}


?>

<?php include "header.php"; ?>

<style>
.custom_orderby {
   border-bottom: dashed 1px #d6d6d6;
   margin: 0 0px;
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
label.switch {
    position: absolute;
    left: 10px;
    top: -2px;
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
    width: 550px;
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


.hide {
  display: none;
}
.clear {
  float: none;
  clear: both;
}

.rating {
  width: 100%;
  position: relative;
  display: flex;
  justify-content: flex-end;
  flex-direction: row-reverse;
}
.rating > label {
  float: right;
  display: inline;
  padding: 0;
  margin: 0;
  position: relative;
  width: 1.1em;
  cursor: pointer;
  color: #000;
}
.rating > label:hover,
.rating > label:hover ~ label,
.rating > input.radio-btn:checked ~ label {
    color: transparent;
}
.rating > label:hover:before,
.rating > label:hover ~ label:before,
.rating > input.radio-btn:checked ~ label:before,
.rating > input.radio-btn:checked ~ label:before {
    content: "\2605";
    position: absolute;
    left: 3px;
    color: #FFD700;
}

.rating label {
    font-size: 1.8rem;
    color: #9e9e9e;
}

#reviews_err {
    position: relative;
    color: red;
    font-size: 12px;
}

#rating_err {
    float: left;
    color: red;
    font-size: 12px;
    margin: 3px 0px 5px 0px;
}

form#frm-feedback h4 {
    text-align: center;
}

.form-field.form-text textarea {
    width: 100%;
    min-height: 100px;
    margin: 0;
    padding: 4px;
    border: 1px solid #ddd;
}

.reviews-btn {
    width: 100%;
    margin-top: 8px;
    display: inline-block;
}

button#frm-feedback-submit {
    background: #4393d7;
    border: none;
    padding: 8px 15px;
    margin-right: 5px;
    color: #fff;
}

button#frm-feedback-cancel {
    background: #4393d7;
    border: none;
    padding: 8px 15px;
    margin-right: 5px;
    color: #fff;
}

.input-style.has-icon.input-style-1.input-required input {
    width: auto;
    float: left;
    border: 1px solid #ddd;
    padding: 2px;
}

.input-style.has-icon.input-style-1.input-required .help-block {
    clear: both!important;
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


<?php 
if ( $_REQUEST['onboard']==='no' && $_REQUEST['onboard']!='yes' && !empty($_REQUEST['onboard']) ) {     
$workerID = $_REQUEST['workerId'];
$onboard = $_REQUEST['onboard'];
?>


<div id="abc">
    <!-- Popup Div Starts Here -->
        <div id="popupContact">
                  <form action="#" method="POST" id="frm-feedback">
                       <h4 class="bottom-20">Leave feedback</h4> 
                        <div class="input-style has-icon input-style-1 input-required">
                          <h6 class="bottom-20">Select Last Date</h6>
                          <input type="text" class="input-text" name="dor" id="dor" placeholder="Last Date of Job" autocomplete="off" />
                          <span class="help-block" id="dor_err"></span>
                        </div>
                       <div class="rating">
                            <input id="star1" onclick="setValue(this.value)" name="star" type="radio" value="5" class="radio-btn hide" />
                            <label for="star1">☆</label>
                            <input id="star2" onclick="setValue(this.value)" name="star" type="radio" value="4" class="radio-btn hide" />
                            <label for="star2">☆</label>
                            <input id="star3" onclick="setValue(this.value)" name="star" type="radio" value="3" class="radio-btn hide" />
                            <label for="star3">☆</label>
                            <input id="star4" onclick="setValue(this.value)" name="star" type="radio" value="2" class="radio-btn hide" />
                            <label for="star4">☆</label>
                            <input id="star5" onclick="setValue(this.value)" name="star" type="radio" value="1" class="radio-btn hide" />
                            <label for="star5">☆</label>         
                            <div class="clear"></div>
                        </div>
                        <em id="rating_err"></em>
                        <div class="form-field form-text">
                            <input type="hidden" name="rworker_id" id="rworker_id" value="<?php echo $workerID; ?>">
                            <input type="hidden" name="rating" id="rating" value="0">
                            <input type="hidden" name="onboard" id="onboard" value="<?php echo $onboard; ?>">
                            <textarea name="fmessage" id="textarea" class="contactTextarea requiredField" placeholder="Enter feedback message here..." maxlength="250"></textarea>
                            <div id="count"></div>
                        </div>
                        <em id="reviews_err"></em>
                        <div class="reviews-btn">
                          <button id="frm-feedback-submit" type="button" class="button button-s button-center-large button-round-small bg-highlight">Submit</button>
                          <button id="frm-feedback-cancel" type="button" class="close-menu button button-s button-center-large button-round-small bg-highlight" onclick="refreshPage()">Close</button>
                        </div>
                  </form>
        </div>
    <!-- Popup Div Ends Here -->
</div>

<?php
} else {
  header("location: employees.php");
}
?>




<!-- Dashboard start -->
<div class="dashboard submit-property">
    <div class="container-fluid ">
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
                            <div class="col-sm-12 col-md-6"><h4>Employees</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">Employees</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                        <form method="GET">
                            <h4>Employees List</h4>
                                <div class="row pad-20 custom_orderby">
                                <div class="col-sm-2">
                                <label>Filter</label>
                                <?php $filter = $_REQUEST['filter']; ?>
                                <select class="browser-default custom-select" name="sortbyname" id="filter">
                                <option value="all" <?php if($filter=="all"){ echo 'selected="selected"'; } ?>>All employees</option>
                                <option value="verified" <?php if($filter=="verified"){ echo 'selected="selected"'; } ?>>Verified employees</option>
                                <option value="pending" <?php if($filter=="pending"){ echo 'selected="selected"'; } ?>>Pending employees</option>
                                <option value="failed" <?php if($filter=="failed"){ echo 'selected="selected"'; } ?>>Failed employees</option>
                                </select>
                                </div>

                                <div class="col-sm-2">
                                <label>Order by</label>
                                <?php $orderby = $_REQUEST['orderby']; ?>
                                <select class="browser-default custom-select" name="orderby" id="ordering">
                                      <option value="ascending" <?php if($orderby=="ascending"){ echo 'selected="selected"'; } ?>>Ascending</option>
                                      <option value="descending" <?php if($orderby=="descending"){ echo 'selected="selected"'; } ?>>Descending</option>
                                </select>
                                </div>

                                </div>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                  <?php
                                  if(!empty($orderby) && !empty($filter)){

                                      if(empty($statuss)){

                                          if($filter=="verified"){
                                          $filterVal = "1";
                                          } else if($filter=="pending"){
                                          $filterVal = "2";
                                          } else if($filter=="failed"){
                                          $filterVal = "0";
                                          } 

                                          if($orderby=="ascending"){
                                           $order = "ASC";
                                          } else if($orderby=="descending") {
                                           $order = "DESC";
                                          }

                                          if($filter=="all"){                     

                                            $query = "SELECT a.ID as networkId, b.* FROM B2B_networks a LEFT JOIN B2B_workers b ON a.worker_id = b.worker_id WHERE a.company_id = '$current_id' AND b.source='B' AND a.status = '1' GROUP BY a.ID ORDER BY a.ID $order";

                                          } else {

                                            $query = "SELECT a.ID as networkId, b.* FROM B2B_networks a LEFT JOIN B2B_workers b ON a.worker_id = b.worker_id WHERE a.company_id = '$current_id' AND b.status=$filterVal AND b.source='B' AND a.status = '1' GROUP BY a.ID ORDER BY a.ID $order";                              
                                          }

                                      } else {


                                          if($filter=="verified"){
                                              $filterVal = "1";
                                          } else if($filter=="pending"){
                                              $filterVal = "2";
                                          } else if($filter=="failed"){
                                              $filterVal = "0";
                                          } 


                                          if($orderby=="ascending"){
                                          $order = "ASC";
                                          } else if($orderby=="descending") {
                                          $order = "DESC";
                                          }  

                                          if($filter=="all"){

                                           $query = "SELECT a.ID as networkId, b.* FROM B2B_networks a LEFT JOIN B2B_workers b ON a.worker_id = b.worker_id WHERE a.company_id = '$current_id' AND b.source='B' AND a.status = '1' GROUP BY a.ID ORDER BY a.ID $order";

                                          } else {

                                            $query = "SELECT a.ID as networkId, b.* FROM B2B_networks a LEFT JOIN B2B_workers b ON a.worker_id = b.worker_id WHERE a.company_id = '$current_id' AND b.status=$filterVal AND b.source='B' AND a.status = '1' GROUP BY a.ID ORDER BY a.ID $order";                                     

                                          }   

                                      }


                                  } else {


                                        if(empty($statuss)){                              

                                          $query = "SELECT a.ID as networkId, b.* FROM B2B_networks a LEFT JOIN B2B_workers b ON a.worker_id = b.worker_id WHERE a.company_id = '$current_id' AND b.source='B' AND a.status = '1' GROUP BY a.ID ORDER BY a.ID ASC";

                                        } else {


                                        if($statuss=="verified"){
                                        $status= 1; 
                                        } else if($statuss=="pending") {
                                        $status= 2;
                                        } else {
                                        $status= 0;
                                        } 

                                          $query = "SELECT a.ID as networkId, b.* FROM B2B_networks a LEFT JOIN B2B_workers b ON a.worker_id = b.worker_id WHERE a.company_id = '$current_id' AND b.status=$status AND b.source='B' AND a.status = '1' GROUP BY a.ID ORDER BY a.ID ASC";       

                                        }


                                  }

                                  //echo $query;

                                  $result     = mysqli_query($link, $query) or die(mysqli_error($link));
  
                                  $revAllResult  = $result->fetch_all(MYSQLI_ASSOC);   

                                  if ($result->num_rows!=0) {	                                    

                                  foreach ($revAllResult as $key => $values) {                                    

                                  $work_id       = $values['worker_id']; 
                                  $company_id    = $values['company_id']; 

                                  if($company_id=='0'){
                                    $currently = 0;
                                  } else {
                                    $currently = 1;
                                  }

                                  $companyname   = $values['worker_fullname']; 
                                  $work_type_id  = $values['worker_type'];

                                  if(!empty($param_id)){ 
                                  $revQuery      = "SELECT * FROM B2B_employee_type WHERE source ='B' AND ID='$work_type_id'";
                                  $revResult     = mysqli_query($link, $revQuery) or die(mysqli_error($link));                                  
                                  $revAllResult  = $revResult->fetch_all(MYSQLI_ASSOC);                                                                                         
                                  $position      = $revAllResult[0]['emp_type'];
                                  }

                                  $dob_date      = $values['dob']; 
                                  $doj_date      = $values['doj']; 
                                  $name          = $values['contact_name']; 
                                  $mname         = $values['mname']; 
                                  $email         = $values['contact_email']; 
                                  $phone         = $values['contact_phone']; 
                                  $address       = $values['address']; 
                                  $photo         = $values['photo']; 
                                  $verify        = $values['verification_type'];                        
                                  $status        = $values['status']; 
                                  $string        = preg_replace('/[,]/', ' ', $verify);   
                                  $array         = explode(" ",$string);
                                  $date          = $values['regisration_date']; 
                                  $finalamount   = $values['final_amount']; 
                                  $amountstatus  = $values['amount_status']; 
                                  $temp_id       = $values['temp_id']; 
                                  $addtional_temp_id = $values['additional_temp_id']; 

                                  if($amountstatus==0){
                                  $amtstatus ="<span style='color:#ff0000;'>Failed</span>";
                                  } else if($amountstatus==1){
                                  $amtstatus = "<span style='color:#28a745;'>Success</span>";
                                  } else if($amountstatus==2){
                                  $amtstatus = "<span style='color:#4393d7;'>Pending</span>";
                                  }

                                  $newDate = date("H:i A m-d-Y", strtotime($date));

                                  $regDate = date("m-d-Y", strtotime($date));

                                  $sinceDate = date("Y-m-d", strtotime($date));

                                  $queryese = "SELECT * FROM B2B_payment_history WHERE worker_id=$work_id AND company_id=$company_id AND temp_id=$addtional_temp_id";

                                  $resultese = mysqli_query($link, $queryese);

                                  $fetchese = mysqli_fetch_row($resultese);

                                  $additional_amount = $fetchese[3];
                                  ?>  	                                  
                                	
                                    <div class="comment">
                                        <div class="comment-author">                                            
                                            <?php  $base_url = "https://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').''; 
                                            if(!empty($photo)){ ?>
                                            <img src="<?php echo $base_url.'upload/'.$photo; ?>" alt="profile-photo" class="img-fluid">
                                            <?php } else { ?>
                                            <img src="<?php echo $base_url.'img/dummy-image.jpg'; ?>" alt="profile-photo" class="img-fluid">
                                            <?php } ?>                                           
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <h5><?php echo $companyname.' '.$mname; ?></h5>
                                                <div class="comment-meta">
                                                    <?php echo $newDate; ?>
                                                </div>
                                            </div>
                                            <ul>
                                                <?php if(!empty($position)) { ?><li><span class="left-align">Position</span> <span>: 
                                      						<?php echo $position; ?>
                                      						</span></li><?php } ?> 
                                                <?php if(!empty($dob_date)) { ?><li><span class="left-align">Age</span> <span>: <?php
                                                date_default_timezone_set("Asia/Kolkata");  
                                                $date1 = $dob_date;
                                                $date2 = date("Y-m-d");

                                                $diff = abs(strtotime($date2) - strtotime($date1));

                                                $years = floor($diff / (365*60*60*24));

                                      						if($years==1){
                                      						   printf("%d year", $years, $months, $days);
                                      						} else {
                                                   printf("%d years", $years, $months, $days);
						                                      }
                                                ?></span></li><?php } ?> 
						                                    <?php if(!empty($name)) { ?><li><span class="left-align">Father's name:</span> <span>: <?php echo $name; ?></span></li><?php } ?>
                                                <?php if(!empty($regDate)){ ?><li><span class="left-align">Employee since</span> <span>:
						                                    <?php
                                                date_default_timezone_set("Asia/Kolkata");  
                                    						$date1 = $sinceDate;
                                    						$date2 = date("Y-m-d");

                                    						$diff = abs(strtotime($date2) - strtotime($date1));

                                    						$years = floor($diff / (365*60*60*24));
                                    						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                    						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

                                    						printf("%d years, %d months, %d days\n", $years, $months, $days);

						                                    ?></span></li><?php } ?>
						                                    <?php if(!empty($email)){ ?><li><span class="left-align">Email</span> <span>: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a> </span></li><?php } ?>
                                                <?php if(!empty($phone)){ ?><li><span class="left-align">Phone</span> <span>: <a href="tel:+<?php echo $phone; ?>"><?php echo $phone; ?></a></span></li><?php } ?> 
					                                      <?php if(!empty($phone)){ ?><li><span class="left-align">Whatsapp</span> <span>: <a href="https://api.whatsapp.com/send?phone=<?php echo $phone; ?>" target="_blank"><?php echo $phone; ?></a></span></li><?php } ?> 

                                                <li><span class="left-align">Currently employed with you?</span> <span style="position: relative;width: 40%;display: inline-block;">: 
                                                      <label class="switch">
                                                        <input type="checkbox" name="employed" value="1" data-workerid="<?php echo $work_id; ?>" <?php if($currently==1){ echo "checked";} else { echo "";} ?> />
                                                        <span class="slider round"></span>
                                                      </label>
                                                    </span>
                                                </li>

                                            	  <?php if($finalamount!=""){ ?><li><span class="left-align">Final amount</span> <span>: <?php echo "&#x20b9; ".$finalamount; ?></span></li><?php } ?>
                              					         <?php if($amountstatus==1 && $finalamount!=0){ ?>
                                  					 	 <?php if($finalamount!=""){ ?><li><span class="left-align">Payment status</span> <span>: <?php echo $amtstatus; ?></span></li><?php } ?>
                                  					 	 <?php } else if($amountstatus==0){?>
                                  						 <?php if(!empty($finalamount)){ ?><li><span class="left-align">Payment status</span> <span>: <?php echo $amtstatus; ?> | <a href="<?php echo $base_url; ?>repayment.php?name=<?php echo $companyname.' '.$mname; ?>&amount=<?php echo $finalamount; ?>&phone=<?php echo $phone; ?>&email=<?php echo $email; ?>&temp_id=<?php echo $temp_id; ?>" style="color:#4393d7;">Retry for payment</a></span></li><?php } ?>
                                  						 <?php } else if($amountstatus==2){ ?>
                                  						 <?php if(!empty($finalamount)){
                                  						  if(!empty($additional_amount)){ ?>
                                  							<li><span class="left-align">Pending amount</span> <span>: <?php echo "&#x20b9; ".$additional_amount; ?></span></li>
                                  						 <?php } ?>
                                  							<li><span class="left-align">Payment status</span> <span>: <?php echo $amtstatus; ?> | <a href="<?php echo $base_url; ?>repayment.php?name=<?php echo $companyname.' '.$mname; ?>&amount=<?php echo $additional_amount; ?>&phone=<?php echo $phone; ?>&email=<?php echo $email; ?>&temp_id=<?php echo $temp_id; ?>" style="color:#4393d7;">Retry for payment</a></span></li><?php } ?>
                                  						 <?php } ?>
                              						      <li><span class="left-align">Verification type</span> 
                                                    <span class="custom-brack buttons mb-20 <?php if($status==2){ echo "color-blue"; } else if($status==1){ echo "color-green"; } else if($status==0){ echo "color-red"; } ?>"><?php

                                                    $queryess = "SELECT * FROM B2B_verification_type";

                                                    $resultess = mysqli_query($link, $queryess) or die(mysqli_error($link));

                                                    $count = 1;

                                                    if ($resultess->num_rows!=0) {

                                                    while ($row=mysqli_fetch_row($resultess)){

                                                    $ID = $row[0];

                                                    $type = ucfirst($row[1]);

                                                    $amount = $row[2];

                                                    $str_arry = preg_split ("/\,/", $verify); 

                                                    if (in_array($ID, $str_arry)) {

                                                    if($row[3]==1){
                                                  ?>
    				                                    <a href="<?php echo $base_url; ?>slip.php?workerID=<?php echo $work_id; ?>&verificationID=<?php echo $ID; ?>&status=<?php echo $status; ?>" class="btn-1 btn-gray" title="<?php echo ucfirst($type); ?>" style="padding: 2px 10px;" target="_blank"><i class="fa <?php if($status==2){ echo 'fa-clock-o'; }else if($status==1){ echo 'fa-check'; } else if($status==0){ echo 'fa-ban'; } ?>"></i> <?php echo ucfirst($type); ?></a>
    				                                  <?php $count++; } } } } ?>

                                              </span>
    						                            </li>                                            
                                      </ul> 

				                                    <div class="edit_update_button buttons mb-20">
                                                <a href="<?php echo $base_url; ?>view-employee.php?ID=<?php echo $work_id; ?>" style="color: #4393d7;"><i class="fa fa-eye" style="color: #4393d7;"></i> View</a> | <a href="<?php echo $base_url; ?>delete-employee.php?ID=<?php echo $work_id; ?>" onclick="return confirm('Are you sure you want to delete this employee?');"><i class="fa fa-trash"></i> Delete</a>
                                            </ul>

                                            </div>
                                    </div> </div>
                                    
                                     <?php } } else { echo "No record."; }
                                       	?>
                                    </div>
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

<?php include("footer.php"); ?>


<script>
    jQuery(function($){
      $('#filter').on('change', function () {
          var url = $(this).val();
	  var orderby = $("#ordering").val();
          if (url) { 
              window.location = 'employees.php?orderby='+ orderby +"&filter="+ url;
          }
          return false;
      });

      $('#ordering').on('change', function () {
          var url = $(this).val();
          var filter = $("#filter").val();
          if (url) { 
              window.location = 'employees.php?orderby='+ url +"&filter="+ filter;
          }
          return false;
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


<script>
jQuery(document).ready(function($){
      $(".switch input").click(function(){
          
          if($(this).is(":checked")) {
            var values = $(this).data("workerid");
            window.location = "employees.php?workerId="+ values +"&onboard=yes";

           } else {
            
            var values = $(this).data("workerid");
            window.location = "employees.php?workerId="+ values +"&onboard=no";   

          }
     });
});
</script>

<script src="js/jquery-ui.js"></script>

<script type="text/javascript">
    function setValue(setValue){
        $('#rating').val(setValue);
    }

    $('#frm-feedback-submit').on('click', function(e){
        //e.preventdefault();
        var ratings     = $('#rating').val();
        var reviews     = $('#textarea').val();
        var worker_id   = $('#rworker_id').val();
        var dor         = $('#dor').val();
        var onboards    = $('#onboard').val();        
        var status      = false;

        if(dor == ''){
            $('#dor_err').html('Please Select Date of Reliving');
            status = true;
        } else {
            $('#dor_err').html('');
            status = false;
        }

        if(ratings == 0){
            $('#rating_err').html('Please Select Ratings');
            status = true;
        } else {
            $('#rating_err').html('');
            status = false;
        }

        if(reviews == ''){
            $('#reviews_err').html('Please Enter Your Feedback');
            status = true;
        } else {
            $('#reviews_err').html('');
            status = false;
        }

        if(status == false){
            $.ajax({
                url:"post-feedback.php",
                method:"POST",
                data: {
                    'company_id': '<?php echo $param_id ?>',
                    'worker_id' : worker_id,
                    'ratings'   : ratings,
                    'reviews'   : reviews,
                    'onboard'   : onboards,
                    'dor'       : dor,
                },
                success: function(data) {
                    var status = data;
                    if(status.trim() == 'SUCCESS'){            
                      refreshPage();                       
                    }
                }
            });
        }
    });
    
    $(function(){
        $("#dor").datepicker({
            dateFormat  : 'dd-mm-yy',
            changeMonth : true,
            changeYear  : true,
        });
    });

    function askForRelive(){
        $.ajax({
            url:"notification-post.php",
            method:"POST",
            data: {
                'company_id'    : '<?php echo $param_id ?>',
                'notification'  : 'Some One Ask to Relive Mr./Mrs. This. Please Relive him for New Employment.',
            },
            success: function(data) {
              alert(data);
                $('#menu-welcome-bottom .boxed-text-huge').html('<h4 class="bottom-20">Success! <br>You have Askd for Relive This. Please wait for Previous Employers Action.</h4><button id="frm-feedback-cancel" type="button" class="close-menu button button-s button-center-large button-round-small bg-highlight" onclick="refreshPage()">Close</button>');
            }
        });
    }

    function refreshPage(){
        location.href='employees.php';
    }
</script>