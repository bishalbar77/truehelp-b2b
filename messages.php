<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

 
// Include config file
require_once "config.php";

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

  $queryes = "UPDATE B2B_messages SET message_status='1' WHERE company_id='$current_id'";

  $dataes = mysqli_query ($link, $queryes);		
    
}

?>

<?php include "header.php"; ?>

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
                            <div class="col-sm-12 col-md-6"><h4>Messages</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">Messages</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                        <form method="GET">
                            <h4>Messages List</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                       <?php
					                                  $query = "SELECT * FROM B2B_messages WHERE company_id='$param_id' AND message_status=1"; 

                                            $result = mysqli_query($link, $query) or die(mysqli_error($link));

                                            if ($result->num_rows!=0) {

                                            while ($row=mysqli_fetch_row($result)){

                              					     $CompanyID = $row[2];

                              					     $WorkerID = $row[1];

                                             $title = ucfirst($row[3]);

                                             $message = $row[4];

                                             $date = $row[5];    

                                             $newDate = date("H:i A m-d-Y", strtotime($date));

					                                   $queryss = "SELECT * FROM B2B_upload_files WHERE company_id='$CompanyID' AND worker_id='$WorkerID'"; 

                                             $resultss = mysqli_query($link, $queryss); 
                                             ?>
                                       <div class="comment">
                                        <div class="comment-author">
                                             <?php  $base_url = "https://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'; 
                                            if(!empty($photo)){ ?>
                                            <img src="<?php echo $base_url.'upload/'.$photo; ?>" width="45" alt="avatar">
                                            <?php } else { ?>
                                            <img src="https://placehold.it/45x45" alt="avatar">
                                            <?php } ?>
                                        </div>
 
                                         <div class="comment-content">
                                            <div class="comment-meta">
                                               <?php if(!empty($title)){ ?>
                                                <h5>
                                                    <?php echo $title; ?>
                                                </h5>
                                                <?php } ?>
                                                <?php if(!empty($date)){ ?>
                                                <div class="comment-meta">
                                                    <?php echo $newDate; ?>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php if(!empty($message)){ ?>
                                            <p><?php echo $message; ?></p>
                                            <?php } ?>
					<?php 
	                                echo "<p><b>File: </b>";
        	                        if ($resultss->num_rows!=0) {
                	                    while ($rowss=mysqli_fetch_row($resultss)){
                        	              $photose = $rowss[1];
                                	      $extension = end(explode(".", $photose));
                                     	      $cleanStr = preg_replace('/[^A-Za-z0-9]/', '', $extension);
                                      	      $base_url = "https://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'; 
                                              if($cleanStr=="pdf"){ ?>  
                                                <a href="<?php echo $base_url.'upload/'.rtrim($photose, ","); ?>" target="_blank" style="color:#4393d7;">View PDF</a></br> 
                                              <?php } else {
                                              if(!empty($photose)){ ?>
                                                <a href="<?php echo $base_url.'upload/'.rtrim($photose, ","); ?>" target="_blank" style="color:#4393d7;">View image</a></br>
                                              <?php } } ?>
                                       <?php } } else  { echo "N/A</br>"; } ?>
					                                </p>
                                        </div>
                                       </div>
                                       <?php } } else { echo "No message found."; } ?>
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
