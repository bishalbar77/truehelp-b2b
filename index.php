<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

$base_urls = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?');


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


if(isset($_COOKIE['visit']) && $_COOKIE['visit'] == "true"){
    $load = false;
} else {
    $load = true;
    setcookie("visit", "true", time()+60*60*24*600);
}

?>

<?php include "header.php"; ?>

<!-- Dashbord start -->
<div class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-nones hide_div d-xl-block d-lg-block">
                    <?php include "menu-setting.php"; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">                            
                            <?php                             
                            $val = "";
                             ?>
                                <div class="col-sm-12 col-md-6"><h4>Hello, <?php echo ucfirst($yourname); ?></h4></div>
                                <div class="col-sm-12 col-md-6">
                                    
                                </div>
                            </div>
                        </div>
                        
                      <?php if($load == true){ ?>
                        <div class="alert alert-success alert-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Hello, <?php echo $yourname; ?> </strong> Welcome to TrueHelp.
                        </div>      
                      <?php } ?>                 
                        
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                               <a href="<?php echo $base_urls; ?>employees.php">
                                  <div class="ui-item bg-dark">
                                    <div class="left">
                                      <?php  $param_id = $_SESSION["id"]; 
    	 
						               if(!empty($param_id)){  

                                        $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE b.company_id = '$param_id' AND b.source='B' AND a.status='1' GROUP BY b.id ORDER BY b.id DESC";
	 
                    						$result = mysqli_query($link, $query) or die(mysqli_error($link));	
                    			
                    		  				$rowcount = mysqli_num_rows($result);

                    						} 
                    					?>
					                   <h4><?php echo $rowcount; ?></h4>
                                        <p>Registered<br />Employees</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                  </div>
				                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                               <a href="<?php echo $base_urls; ?>employees.php?status=verified">
				 <div class="ui-item bg-success">
                                    <div class="left">
                                         <?php  $param_id = $_SESSION["id"]; 

                                                if(!empty($param_id)){  

                                                $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE b.company_id = '$param_id' AND b.source='B' AND a.status='1' AND b.empStatus = '1' GROUP BY b.id ORDER BY b.id DESC";

                                                $result = mysqli_query($link, $query) or die(mysqli_error($link));      

                                                $rowcount = mysqli_num_rows($result);

                                                } 
                                        ?>
                                        <h4><?php echo $rowcount; ?></h4>
                                        <p>Verified<br />Employees</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-check"></i>
                                    </div>
                                </div>
				</a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo $base_urls; ?>employees.php?status=pending">
				   <div class="ui-item bg-active">
                                    <div class="left">
                                         <?php  $param_id = $_SESSION["id"]; 

                                                if(!empty($param_id)){  

                                                $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE b.company_id = '$param_id' AND b.source='B' AND a.status='1' AND b.empStatus = '2' GROUP BY b.id ORDER BY b.id DESC";

                                                $result = mysqli_query($link, $query) or die(mysqli_error($link));      

                                                $rowcount = mysqli_num_rows($result);

                                                } 
                                        ?>
                                        <h4><?php echo $rowcount; ?></h4>
                                        <p>Pending<br />Verifications</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                               <a href="<?php echo $base_urls; ?>employees.php?status=failed">
				    <div class="ui-item" style="background:#ff0000;">
                                    <div class="left">
                                         <?php  $param_id = $_SESSION["id"]; 

                                                if(!empty($param_id)){  

                                                $query = "SELECT a.id as networkId, b.* FROM networks a LEFT JOIN employees b ON a.worker_id = b.id WHERE b.company_id = '$param_id' AND b.source='B' AND a.status='1' AND b.empStatus = '0' GROUP BY b.id ORDER BY b.id DESC";

                                                $result = mysqli_query($link, $query) or die(mysqli_error($link));      

                                                $rowcount = mysqli_num_rows($result);

                                                } 
                                        ?>
                                        <h4><?php echo $rowcount; ?></h4>
                                        <p>Failed<br />Verifications</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-ban"></i>
                                    </div>
                                </div>
				</a>
                            </div>
                        </div>
                        
                    </div>
                    <p class="sub-banner-2 text-center">Copyright 2020, TrueHelp Enterprise.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dashbord end -->

<?php include("footer.php"); ?>
