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
 
if( (empty($workid)) && empty($companyid) ){
    header("location: verifications.php");
    exit;

}

    	
if(!empty($param_id)){  
    	  	
   $query = "SELECT * FROM employers WHERE id='$param_id'";
	 
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	$fetch = mysqli_fetch_row($result);	
		  
	$current_id = $fetch[0];	

	$photo = $fetch[5];	  
		  
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
                            <div class="col-sm-12 col-md-6"><h4>Upload files</h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="index.php">Index</a>
                                        </li>
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">Add file</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                         <form action="submit-upload.php" method="post">  
                            <h4 class="bg-grea-3">Please upload file</h4>
                            <div class="row pad-20">
                                <div class="col-lg-12">
                                     <div id="myDropZone" class="dropzone dropzone-design">
                                        <div class="dz-default dz-message"><span>Drop files here to upload</span></div>                                   
			             </div>
				    <div id="fileError" class="help-block"></div>
                                </div>
                            </div>
                         
                            <div class="row pad-20">
                            <div class="col-lg-4 col-md-12 col-sm-12">
				    <input type="hidden" name="document" id="alldocs" value="<?php echo $files; ?>" />                                 
                                    <input type="hidden" name="work-id" value="<?php echo $workid; ?>" />
                    <input type="hidden" name="company-id" value="<?php echo $companyid; ?>" />
				    <input type="hidden" name="vType" value="<?php echo $vType; ?>" />
				    <input type="submit" class="btn btn-md button-theme" name="upload" value="Submit" onclick="return formsubmit();" />                                 
                                </div>
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

<script>
//Disabling autoDiscover
Dropzone.autoDiscover = false;

$(function() {
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
                 $("#alldocs").val(txt+response+","); 
                }
	});
 // alert(myDropzone);
});
</script>



<script>

function formsubmit()
{

var er=0;

if(jQuery('#alldocs').val().trim()=='')
{

jQuery("#fileError").html("Please upload file.");

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
