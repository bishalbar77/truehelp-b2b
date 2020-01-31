<?php 
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

$title = "";

$message = "";

$param_id = $_SESSION["id"];

$workid = $_REQUEST["workerid"];

$companyid = $_REQUEST["companyid"];

$vType = $_REQUEST["vType"];
 
if(empty($workid) || empty($companyid)){
    header("location: verifications.php");
    exit;
}

    	
if(!empty($param_id)){  
    	  	
    $revQuery      = "SELECT * FROM B2B_company_details WHERE ID='$param_id'";

    $revResult     = mysqli_query($link, $revQuery) or die(mysqli_error($link));
  
    $revAllResult  = $revResult->fetch_all(MYSQLI_ASSOC); 		  

    $current_id    = $revAllResult[0]['ID'];	

	$photo         = $revAllResult[0]['photo'];	 
		  
}

?>

<?php include "header.php"; ?>

<!-- Dashboard start -->
<div class="dashboard submit-property">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                <?php include "menu-setting.php"; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4>New message</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="verifications.php">Verifications</a>
                                        </li>
                                        <li class="active">New message</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                         <form action="submit-message.php" method="post">  
                             <h4 class="bg-grea-3">Title</h4>                         
                            <div class="row pad-20">
                                <div class="col-lg-12">                                   
                                    <input type="text" class="input-text" maxlength="100" name="title" id="title" placeholder="Enter title">
				                    <div id="titleError" class="help-block"></div>
                                </div>
                            </div>

                            <h4 class="bg-grea-3">Enter your message</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                    <textarea class="input-text" name="message" maxlength="250" id="message" placeholder="Enter message here..."></textarea>
				                    <div id="messageError" class="help-block"></div>
                                </div>
                            </div>
                         
                            <div class="row pad-20">
                            <div class="col-lg-4 col-md-12 col-sm-12">                                 
                                    <input type="hidden" name="work-id" value="<?php echo $workid; ?>" />
                				    <input type="hidden" name="company-id" value="<?php echo $companyid; ?>" />
                                    <input type="hidden" name="vType" value="<?php echo $vType; ?>" />
                				    <input type="submit" class="btn btn-md button-theme" name="add_message" value="Submit" onclick="return formsubmit();" />
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

function formsubmit()
{

var er=0;

if(jQuery('#title').val().trim()=='')
{

jQuery("#titleError").html("Please enter your title.");

er=er+1; 

}

if(jQuery('#message').val().trim()=='')
{

jQuery("#messageError").html("Please enter your message.");

er=er+1; 

}


if(er>0)

{

return false;

}

else

{

return true;

}

}



function checkEmail(e){return splitVal=e.split("@"),splitVal.length<=1?!1:splitVal[0].length<=0||splitVal[1].length<=0?!1:(splitDomain=splitVal[1].split("."),splitDomain.length<=1?!1:splitDomain[0].length<=0||splitDomain[1].length<=1?!1:!0)}

function removeError(e){jQuery("#"+e+"Error").html("")}

</script>


