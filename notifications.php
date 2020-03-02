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

$queryes = "UPDATE company_notifications SET status='1' WHERE company_id='$current_id'";

$dataes = mysqli_query ($link, $queryes); 

?>

<?php include "header.php"; ?>

<style type="text/css">
.comment-author img {
  width: 100%;
} 
</style>

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
					                                  $query = "SELECT * FROM company_notifications WHERE company_id='$param_id' ORDER BY id DESC"; 

                                            $result = mysqli_query($link, $query) or die(mysqli_error($link));                         

                                            if ($result->num_rows!=0) {

                                            $rowes = $result->fetch_all(MYSQLI_ASSOC);

                                            foreach ($rowes as $values) {
                                             
                              					     $CompanyID = $values['company_id'];                                         

                                             $message = $values['notification'];   

                                             $date = $values['created_at'];                               

                                             $newDate = date("H:i A m-d-Y", strtotime($date));
					         
                                             ?>
                                       <div class="comment">
                                        <div class="comment-author" style="overflow: hidden;display: flex;align-items: center;">
                                             <?php 
                                            if(!empty($photo)){ ?>
                                            <img src="<?php echo $photo; ?>" width="80" alt="avatar">
                                            <?php } else { ?>
                                            <img src="img/dummy-image.jpg" alt="avatar">
                                            <?php } ?>
                                        </div>
 
                                         <div class="comment-content">                                            
                                            <div class="comment-meta">
                                              <?php if(!empty($message)){ ?>
                                                <p style="margin: 0;"><?php echo $message; ?></p>
                                              <?php } ?>
                                                <div class="comment-meta">
                                                    <?php echo $newDate; ?>
                                                </div>                                        
                                            </div>	
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
