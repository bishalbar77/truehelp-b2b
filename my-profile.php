<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";

$yourname = $email = $companyname = $phone = "";

$new_password = $confirm_password = "";

$new_password_err = $confirm_password_err = "";

$final_name = "";


$load_profile = 0;

setcookie("loadprofile", "$load_profile", time() + (60 * 20));

$load_pass = 0;

setcookie("loadprofile", "$load_pass", time() + (60 * 20));


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

<style type="text/css">
.error {
    color: red;
}    
</style>

<!-- Dashbord start -->
<div class="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad">
                <div class="dashboard-nav d-nones d-xl-block d-lg-block hide_div">
                <?php include "menu-setting.php"; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Company profile</h4></div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="breadcrumb-nav">
                                        <ul>
                                            <li>
                                                <a href="index.php">Dashboard</a>
                                            </li>
                                            <li class="active">Company profile</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                      <?php if($_COOKIE["loadprofile"]!=0){ ?>
                        <div class="alert alert-success alert-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Profile updated successfully.</strong>
                        </div>
                      <?php } ?>
      
                      <?php if($_COOKIE["loadpass"]!=0){ ?>
                        <div class="alert alert-success alert-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Password has been updated.</strong>
                        </div>                       
                      <?php } ?>
                      
                        <div class="dashboard-list">
                            <h3 class="heading">Profile details</h3>
                            <div class="dashboard-message contact-2 bdr clearfix">                                
                                <form action="submit-profile.php" method="post" name="updateinfo" enctype="multipart/form-data">
				                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                        <!-- Edit profile photo -->
                                        <div class="edit-profile-photo">
                                            <div id="targetLayer"></div>
                                            <div class="imagehidden" id="imagehidden">
                                            <?php
                                            if(!empty($photo)){ ?>
                                            <img src="<?php echo $photo; ?>" alt="profile-photo" class="img-fluid">
                                            <?php } else { ?>
                                            <img src="img/dummy-image.jpg" alt="profile-photo" class="img-fluid">
                                            <?php } ?>
                                            </div>
                                            <div class="change-photo-btn">
                                                <div class="photoUpload">
                                                    <span><i class="fa fa-upload"></i></span>
                                                    <input type="file" class="upload" name="photo" id="photo" accept="image/*" onChange="showPreview(this);" />
                                                    <input type="hidden" name="imageurl" value="<?php echo $photo; ?>" />
                                                </div>                                                 
                                            </div>   
                                                                               
                                        </div>
                                         <?php if(!empty($errors)){ ?>
					                       <span class="help-block"><?php echo $errors; ?></span>      
					                     <?php } ?> 
													 
                                    </div>
                                    <div class="col-lg-9 col-md-9">                                         
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group name">
                                                        <label>Company name</label>
                                                        <input type="text" name="companyname" maxlength="35" class="form-control" placeholder="Company name" value="<?php echo $companyname; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group email">
                                                        <label>Your name</label>
                                                        <input type="text" name="yourname" class="form-control" maxlength="35" placeholder="Your name" value="<?php echo $yourname; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group subject">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone" class="form-control" placeholder="Phone" id="mobile" value="<?php echo $phone; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group number">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group message">
                                                        <label>Personal info</label>
                                                        <textarea class="form-control" name="personalinfo" maxlength="100" placeholder="Personal info"><?php echo $address; ?></textarea>
                                                    </div>
                                                </div>

                    						<div class="col-lg-12">
                    							<div class="send-btn">
                    							   <button type="submit" class="btn btn-md button-theme" name="submit" value="update_info">Save Changes</button>
                    						    	</div>
                    						</div>
                                            </div>                                       
                                            </div>
  											</div>
                              </form>                              
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dashboard-list">
                                    <h3 class="heading">Change password</h3>
                                    <div class="dashboard-message contact-2">
                                        <form action="submit-profile.php" method="post" name="updatepass" id="updatepass"> 
                                            <div class="row">                                                
                                                <div class="col-lg-12">
                                                    <div class="form-group email">
                                                        <label>New password</label>
                                                        <input type="password" name="new_password" class="form-control" maxlength="20" placeholder="New Password" id="newpassword" value="<?php echo $new_password; ?>">
                                                        <span class="help-block"><?php echo $new_password_err; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group subject">
                                                        <label>Confirm new password</label>
                                                        <input type="password" name="confirm_password" class="form-control" maxlength="20" placeholder="Confirm New Password">
														<span class="help-block"><?php echo $confirm_password_err; ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="send-btn">  
													<button type="submit" class="btn btn-md button-theme" name="submit" value="update_pass">Update</button>  
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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

<script type="text/javascript">
function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
         $('#blah').attr('src', e.target.result);
			$("#targetLayer").html('<img src="'+e.target.result+'" height="220" class="upload-preview" />');
			$("#imagehidden").hide();
        }
		fileReader.readAsDataURL(objFileInput.files[0]);
    }
}
</script>


<script>

jQuery(document).ready(function(){	

	jQuery("#mobile").keydown(function (event) {

	  // Allow only backspace and delete

	  if(jQuery(this).val().length <= 9 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 )

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


<script src="js/jquery.validate.js"></script>

<script type="text/javascript">
var validator = $("#updatepass").validate({
    rules: {
        new_password: {
            required: true,
            minlength: 5
        },
        confirm_password: {
            required: true,
            minlength: 5,
            equalTo: "#newpassword"
        }        
    },
    messages: {
        new_password: "Enter new password.",
        confirm_password: "Enter confirm password same as new password."
    }
});    
</script>