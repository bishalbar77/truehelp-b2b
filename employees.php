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


$uploaddoc = $_SESSION["uploaddoc"];

$uploadpro = $_SESSION["uploadpro"];

    	
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

.color-blue {
  color: #fff!important;
  background: #4393d7!important;
}

.color-green {
  color: #fff!important;
  background: #28a745!important;
}

.color-red {
  color: #fff!important;
  background: #ff0000!important;
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

.col-md-12.mar-bottom-10.capture-image img {
  width: 30%!important;
}

.col-md-12.mar-bottom-10.capture-image {
    text-align: center;
}

button#frm-onboard-submit {
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

.varificationllist .color-unassign:hover {
    background: #4393d7!important;
    color: #fff;
}

.varificationllist .color-wip:hover {
    background: #4393d7!important;
    color: #fff;
}

.varificationllist .color-escalated:hover {
    background: #4393d7!important;
    color: #fff;
}

.varificationllist .color-insufficiencyresponded:hover {
    background: #4393d7!important;
    color: #fff;
}

.varificationllist .color-awaitingresponse:hover {
    background: #4393d7!important;
    color: #fff;
}

.varificationllist .color-completed:hover {
    background: #28a745!important;
    color: #fff;
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


<?php 
if ( $_REQUEST['onboard']==='yes' && $_REQUEST['onboard']!='no' && !empty($_REQUEST['onboard']) ) {     
$workerID = $_REQUEST['workerId'];
$onboard = $_REQUEST['onboard'];
?>

<div id="abc">
    <!-- Popup Div Starts Here -->
        <div id="popupContact">                                       
                  <div id="step1" class="tab">
                    <div class="col-md-12 mar-bottom-10 capture-image">
                      <img id="emp-image-show" src="img/camera-capture-icon.png" alt="Take Document Picture" style="width: auto; height: auto!important;" />
                      <span id="profileImg_err"></span>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px;">
                        <div class="form-group" style="text-align: center;">       
                        <?php $uploaddoc = $_SESSION["uploaddoc"]; 
                          if(!empty($uploaddoc)){
                        ?>
                        <input type="hidden" name="photos" id="photos_image" value="<?php echo $uploaddoc; ?>" />
                      <?php } else { ?>
                        <input type="hidden" name="photos" id="photos_image" value="" />
                      <?php } ?>
         
                            <input type="hidden" name="photos" id="photos_image" value="" />
                            <label data-type="1" id="btn-document-img" class="btn-profile-img button button-3d button-m button-circle bg-blue2-dark bg-red2-light" style="font-size: 12px;padding: 7px 15px 7px 15px;cursor: pointer;max-width: 100%;margin: 0;">Take Document Picture</label>                       
                        </div>
                    </div>              

                      <div class="col-md-12 mar-bottom-10 capture-image">
                          <img id="emp-image-shows" src="img/camera-capture-icon.png" alt="Take Profile Picture" style="width: auto; height: auto!important;" />
                          <span id="profileImg2_err"></span>
                      </div>
                      <div class="col-md-12" style="margin-top: 10px;">
                          <div class="form-group" style="text-align: center;">   
                              <?php $uploadpro = $_SESSION["uploadpro"];
                                if(!empty($uploadpro)){
                               ?>                          
                                 <input type="hidden" name="photos2" id="photos_image2" value="<?php echo $uploadpro; ?>" />     
                              <?php } else { ?>
                                 <input type="hidden" name="photos2" id="photos_image2" value="" />
                              <?php } ?>               
                              <label data-type="2" id="btn-profile-img" class="btn-profile-img button button-3d button-m button-circle bg-blue2-dark bg-red2-light" style="font-size: 12px;padding: 7px 15px 7px 15px;cursor: pointer;max-width: 100%;" >Capture Profile Picture</label>
                            <input type="hidden" name="empId" value="<?php echo $empId; ?>" />
                          </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <button class="button button-m button-full bg-blue2-dark submit-btn2" id="frm-onboard-submit">Submit</button>
                      </div>
                  </div> 
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
                                          $filterVal = 1;
                                          } else if($filter=="pending"){
                                          $filterVal = 2;
                                          } else if($filter=="failed"){
                                          $filterVal = 0;
                                          } 

                                          if($orderby=="ascending"){
                                           $order = "ASC";
                                          } else if($orderby=="descending") {
                                           $order = "DESC";
                                          }

                                          if($filter=="all"){                                                    

                                            $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE a.company_id = '$param_id' AND b.source='B' AND a.status='1' AND b.empStatus = '0' GROUP BY b.id ORDER BY b.id $order";

                                          } else {                            

                                            $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE a.company_id = '$param_id' AND b.source='B' AND a.status='1' AND b.empStatus = '$filterVal' GROUP BY b.id ORDER BY b.id $order";                              
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

                                           $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE a.company_id = '$param_id' AND b.source='B' AND a.status='1' AND b.empStatus = '1' GROUP BY b.id ORDER BY b.id $order";

                                          } else {                                 

                                            $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE a.company_id = '$param_id' AND b.source='B' AND a.status='1' AND b.empStatus = $filterVal GROUP BY b.id ORDER BY b.id DESC $order";                                     

                                          }   

                                      }


                                  } else {


                                        if(empty($statuss)){                                                  

                                           $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE a.company_id = '$param_id' AND b.source='B' AND a.status='1' GROUP BY b.id ORDER BY b.id DESC";

                                        } else {

                                            if($statuss=="verified"){
                                            $status= 1; 
                                            } else if($statuss=="pending") {
                                            $status= 2;
                                            } else if($statuss=="failed") {
                                            $status= 0;
                                            }   

                                            $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE a.company_id = '$param_id' AND b.source='B' AND a.status='1' AND b.empStatus = '$status' GROUP BY b.id ORDER BY b.id DESC";                                             

                                        }


                                  }

                                  //echo $query;

                                  $result     = mysqli_query($link, $query) or die(mysqli_error($link));
  
                                  $revAllResult  = $result->fetch_all(MYSQLI_ASSOC);            

                                  if ($result->num_rows!=0) {	                                    

                                  foreach ($revAllResult as $key => $values) {                                    

                                  $work_id       = $values['id']; 
                                  $company_id    = $values['company_id']; 

                                  if($company_id=='0'){
                                    $currently = 0;
                                  } else {
                                    $currently = 1;
                                  }

                                  $companyname   = $values['first_name']; 
                                  $work_type_id  = $values['worker_type'];

                                  if(!empty($param_id)){ 
                                  $revQuery      = "SELECT * FROM employee_types WHERE source ='B' AND id='$work_type_id'";
                                  $revResult     = mysqli_query($link, $revQuery) or die(mysqli_error($link));                                  
                                  $revAllResult  = $revResult->fetch_all(MYSQLI_ASSOC);                                                                                         
                                  $position      = $revAllResult[0]['emp_type'];
                                  }

                                  $dob_date      = $values['dob']; 
                                  $doj_date      = $values['doj']; 
                                  $name          = $values['contact_name']; 
                                  $mname         = $values['middle_name']; 
                                  $email         = $values['email']; 
                                  $phone         = $values['mobile'];                                 
                                  $date          = $values['created_at'];                                

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

                                  $queryese = "SELECT * FROM payment_histories WHERE id=$work_id AND company_id=$company_id AND temp_id=$addtional_temp_id";

                                  $resultese = mysqli_query($link, $queryese);

                                  $fetchese = mysqli_fetch_row($resultese);

                                  $additional_amount = $fetchese[3];


                                  $addrQueryess     = "SELECT * FROM employee_pictures WHERE worker_id = '$work_id'";

                                  $addrResultess    = mysqli_query($link, $addrQueryess) or die(mysqli_error($link));

                                  $addrAllResultess = $addrResultess->fetch_all(MYSQLI_ASSOC);

                                  $profile = $addrAllResultess[0]['photo'];

                                  ?>  	                                  
                                	
                                    <div class="comment">
                                        <div class="comment-author" style="overflow: hidden;display: flex;align-items: center;">                                            
                                            <?php 
                                            if(!empty($profile)){ ?>
                                            <img src="<?php echo $profile; ?>" alt="profile-photo" class="img-fluid">
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
                              						      <li style="margin-top: 10px;" class="varificationllist">
                                                    <?php 
                                                      $orderQuery     = "SELECT a.*, a.status as orderStatus, b.verification_type,b.id as varification_id FROM order_histories a left join verification_types b ON a.verification_type=b.id WHERE a.company_id='$company_id' AND a.worker_id='$work_id'";
                                                      $orderResult    = mysqli_query($link, $orderQuery) or die(mysqli_error($link));
                                                      $orderAllResult = $orderResult->fetch_all(MYSQLI_ASSOC);                                          
                                                    ?>
                                                    <span class="left-align">Verification type</span> 
                                                    <span class="custom-brack buttons mb-20">
                                                    <?php                                                                                 
                                                     if(!empty($orderAllResult)): 
                                                     foreach ($orderAllResult as $key => $order): 

                                                      $status = $order['task_status'];
                                           
                                                      switch ($order['task_status']) {
                                                          case "0":
                                                              $faClass = 'Unassign';
                                                              $statuscolor = "color-unassign"; 
                                                              break;
                                                          case "1":
                                                              $faClass = 'Work in Progress';
                                                              $statuscolor = "color-wip"; 
                                                              break;
                                                          case "2":
                                                              $faClass = 'Escalated';
                                                              $statuscolor = "color-escalated"; 
                                                              break;
                                                          case "3":
                                                              $faClass = 'Insufficient';
                                                              $statuscolor = "color-insufficient"; 
                                                              break;
                                                          case "4":
                                                              $faClass = 'Insufficiency Responded';
                                                              $statuscolor = "color-insufficiencyresponded"; 
                                                              break;
                                                          case "5":
                                                              $faClass = 'Work in Progress';
                                                              $statuscolor = "color-wip"; 
                                                              break;
                                                          case "6":
                                                              $faClass = 'Awaiting Response';
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
    				                                            <a href="javascript:void(0)" class="btn-1 btn-gray <?php echo $statuscolor; ?>" title="<?php echo ucfirst($type); ?>" style="padding: 2px 10px;margin-bottom: 5px;" target="_blank">
                                                        <?php echo ucfirst($order['verification_type']).' - '.$faClass; ?></a>
                    				                        <?php endforeach; ?>
                                                <?php endif; ?>
                                              </span>
    						                            </li>                                            
                                      </ul> 

				                                    <div class="edit_update_button buttons mb-20">
                                                <a href="<?php echo $base_url; ?>view-employee.php?ID=<?php echo $work_id; ?>" style="color: #4393d7;"><i class="fa fa-eye" style="color: #4393d7;"></i> View</a> | <a href="<?php echo $base_url; ?>delete-employee.php?ID=<?php echo $work_id; ?>" onclick="return confirm('Are you sure you want to remove from employees?');"><i class="fa fa-trash"></i> Delete</a>
                                            </ul>

                                            </div>
                                    </div> </div>
                                    
                                     <?php } } else { echo "No record."; } ?>
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


<script type="text/javascript">
$('#frm-onboard-submit').on('click', function(e){
  //e.preventdefault();
  var profileImg     = $('#photos_image').val();
  var profileImg2     = $('#photos_image2').val();
  var status      = false;

  if(profileImg == ''){
      $('#profileImg_err').html('Please upload document picture.');
      status = true;
  } else {
      $('#profileImg_err').html('');
      status = false;
  }

  if(profileImg2 == ''){
      $('#profileImg2_err').html('Please upload profile picture.');
      status = true;
  } else {
      $('#profileImg2_err').html('');
      status = false;
  }

  if(status == false){
      $.ajax({
          url:"upload-profile.php",
          method:"POST",
          data: {
              'company_id': '<?php echo $param_id; ?>',
              'worker_id' : '<?php echo $workerID; ?>',
              'photo1'     : profileImg,   
              'photo2'     : profileImg2,   
              'onboard'   : '<?php echo $onboard; ?>',
     
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
                url: 'camsave-img.php',
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
                      $("#photos_image").val(fileUrl);   
                      $("#btn-document-img").text('Retake document picture');                
                    }  

                    if(fileupload_type==2){ 
                       $("#emp-image-shows").attr('src', fileUrl);   
                       $("#photos_image2").val(fileUrl); 
                       $("#btn-profile-img").text('Retake profile picture');
                    }             
                    
                    
                }
            });
        };
     
        $(initialize);            
     
    }());
  </script>
