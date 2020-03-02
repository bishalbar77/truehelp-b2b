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
                            <div class="col-sm-12 col-md-6"><h4>Admin</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">Admin</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
<!-- 			<div class="col-sm-12 submenu_mobile">
			     <select class="browser-default custom-select actionID" name="actionOptions">
       				 <option value="">Select an option</option>  
				 <option value="manage-users.php">Manage users</option>
        			 <option value="manage-types.php">Manage employee types</option>
				 <option value="manage-verification-type.php">Manage verification types</option>
        			 <option value="verifications.php">Verifications</option>
			     </select>
			</div> -->
                       <h4 class="bg-grea-3">Welcome to admin panel.</h4>
                    </div>
                    <p class="sub-banner-2 text-center">Copyright 2019, TrueHelp Enterprise.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashboard end -->

<?php include("footer.php"); ?>


<script>
    jQuery(function($){

      $('.actionID').on('change', function () {

          var url = $(this).val();

          if (url=='manage-types.php') { 
              window.location = url;
          } else if(url=='verifications.php'){
              window.location = url;
          } else if(url=='manage-users.php'){
              window.location = url;
          } else if(url=='manage-verification-type.php'){
	      window.location = url;
	  }

          return false;
      });

    });
</script>
