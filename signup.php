<?php
// Initialize the session
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

// Include config file
require_once "config.php";

include "getIP.php";

$fullname = "";
$otp = "";
$email = $password = $confirm_password = "";
$fullname_err = $email_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["fullname"]))) {
      $fullname_err = "Please enter your full name.";
    } else {
      $fullname = trim($_POST["fullname"]);
    }

    if(empty(trim($_POST["companyname"]))) {
      $company_err = "Please enter your company name.";
    } else {
      $company = $_POST["companyname"];
    }

    if(empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter your mobile number.";
    } else {
        $mobile     = $_POST["phone"];
        $query      = "SELECT * FROM B2B_company_details WHERE phone = '$mobile' AND mobile_verify = '1'";
        $result     = mysqli_query($link, $query) or die(mysqli_error($link));
        $fetch      = mysqli_fetch_row($result);
        $id         = $fetch[0];
        $count      = mysqli_num_rows($result);

        if ($count == 1){
            $phone_err = "Phone Number Already Registered. Please Login!!";
        } else {
            $phone = $_POST["phone"];
        }
    }

    if(empty(trim($_POST["otp"]))) {
        $otp_err = "Please enter otp code received on your mobile.";
    } else {
        $otp = trim($_POST["otp"]);
    }
 
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email address.";
    } else {
    
        $sql = "SELECT ID FROM B2B_company_details WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
 
            mysqli_stmt_bind_param($stmt, "s", $param_email);            
        
            $param_email = trim($_POST["email"]);            
        
            if(mysqli_stmt_execute($stmt)){
             
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email address is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);        
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($email_err) && empty($company_err) && empty($password_err) && empty($confirm_password_err) && empty($phone_err) && $otp == trim($_COOKIE['TRUE_HELP_OTP'])){
     	
    $current_ip = getUserIpAddr();

	date_default_timezone_set('Asia/Kolkata');

	$activationcode = md5($email.time());

	$query = "INSERT INTO B2B_company_details (rep_full_name, email, company_name, phone, pass, activationcode, registered_ip, mobile_verify) VALUES ('$fullname', '$email', '$company', '$phone', '".md5($password)."', '$activationcode', '$current_ip', '1')";	

	$data = mysqli_query ($link, $query)or die(mysqli_error($link));

	if($data)
	{	
		$to = $email;
		$msg = "Thanks for Registration.";   
		$subject ="Email verification - TrueHelp Enterprise";
		$headers .= "MIME-Version: 1.0"."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
		$headers .= 'From:TrueHelp Enterprise <gettruehelp@gmail.com>'."\r\n";

	    $url_codes= '<a target="_blank" style="text-decoration:none; color:#f9f9f9; display:inline-block; padding:22px 22px;" href="https://enterprise.gettruehelp.com/email_verification.php?code='.$activationcode.'">Activation account</a>';
           
		$ms ="<html xmlns='http://www.w3.org/1999/xhtml'>
	        <head>
		<title>TrueHelp Enterprise</title>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0' />
		<style type='text/css'>
			* {
				-ms-text-size-adjust:100%;
				-webkit-text-size-adjust:none;
				-webkit-text-resize:100%;
				text-resize:100%;
			}
			a{
				outline:none;
				color:#40aceb;
				text-decoration:underline;
			}
			a:hover{text-decoration:none !important;}
			.nav a:hover{text-decoration:underline !important;}
			.title a:hover{text-decoration:underline !important;}
			.title-2 a:hover{text-decoration:underline !important;}
			.btn:hover{opacity:0.8;}
			.btn a:hover{text-decoration:none !important;}
			.btn{
				-webkit-transition:all 0.3s ease;
				-moz-transition:all 0.3s ease;
				-ms-transition:all 0.3s ease;
				transition:all 0.3s ease;
			}
			table td {border-collapse: collapse !important;}
			.ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
			@media only screen and (max-width:500px) {
				table[class='flexible']{width:100% !important;}
				table[class='center']{
					float:none !important;
					margin:0 auto !important;
				}
				*[class='hide']{
					display:none !important;
					width:0 !important;
					height:0 !important;
					padding:0 !important;
					font-size:0 !important;
					line-height:0 !important;
				}
				td[class='img-flex'] img{
					width:100% !important;
					height:auto !important;
				}
				td[class='aligncenter']{text-align:center !important;}
				th[class='flex']{
					display:block !important;
					width:100% !important;
				}
				td[class='wrapper']{padding:0 !important;}
				td[class='holder']{padding:30px 15px 20px !important;}
				td[class='nav']{
					padding:20px 0 0 !important;
					text-align:center !important;
				}
				td[class='h-auto']{height:auto !important;}
				td[class='description']{padding:30px 20px !important;}
				td[class='i-120'] img{
					width:120px !important;
					height:auto !important;
				}
				td[class='footer']{padding:5px 20px 20px !important;}
				td[class='footer'] td[class='aligncenter']{
					line-height:25px !important;
					padding:20px 0 0 !important;
				}
				tr[class='table-holder']{
					display:table !important;
					width:100% !important;
				}
				th[class='thead']{display:table-header-group !important; width:100% !important;}
				th[class='tfoot']{display:table-footer-group !important; width:100% !important;}
			}
		</style>
	</head>
	<body style='margin:0; padding:0;' bgcolor='#eaeced'>	
					<table data-module='module-6' data-thumb='thumbnails/06.png' width='100%' cellpadding='0' cellspacing='0'>
						<tr>
							<td data-bgcolor='bg-module' bgcolor='#eaeced'>
								<table class='flexible' width='600' align='center' style='margin:0 auto;' cellpadding='0' cellspacing='0'>
									<tr>
										<td data-bgcolor='bg-block' class='holder' style='padding:64px 60px 50px;' bgcolor='#f9f9f9'>
											<table width='100%' cellpadding='0' cellspacing='0'>
												<tr>
													<td data-color='title' data-size='size title' data-min='20' data-max='40' data-link-color='link title color' data-link-style='text-decoration:none; color:#292c34;' class='title' align='center' style='font:30px/33px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 23px;'>
														Welcome to TrueHelp Enterprise 
													</td>													
												</tr>
												<tr>												
													<td data-color='title' data-size='size title' data-min='20' data-max='40' data-link-color='link title color' data-link-style='text-decoration:none; color:#292c34;' class='title' align='center' style='font:20px/23px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 23px;'>
														Dear $fullname,
													</td>
												</tr>
												<tr><td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='left' style='font:16px/29px Arial, Helvetica, sans-serif; color:#888; padding:0 0 10px;'>
												Thanks for signing up to keep in touch with TrueHelp Enterprise.</td></tr>
												<tr>
													<td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='left' style='font:16px/29px Arial, Helvetica, sans-serif; color:#888; padding:0 0 21px;'>
														Please click The following link For verifying and activation of your account.
													</td>
												</tr>
												<tr>
													<td style='padding:0 0 20px;'>
														<table width='232' align='center' style='margin:0 auto;' cellpadding='0' cellspacing='0'>
															<tr>
																<td data-bgcolor='bg-button' data-size='size button' data-min='10' data-max='20' class='btn' align='center' style='font:bold 15px/17px Arial, Helvetica, sans-serif; color:#f9f9f9; text-transform:uppercase; mso-padding-alt:22px 10px; border-radius:3px;' bgcolor='#e02d74'>
																".$url_codes."
																</td>
															</tr>												
														</table>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr><td height='28'></td></tr>
								</table>
							</td>
						</tr>
					</table>
				
	</body>
</html>

";

	mail($to,$subject,$ms,$headers);

	header("location: thankyou.php");

	} 
       	
    } else {        
        ?>
        	<script type="text/javascript">
        		document.getElementById("hide").removeAttribute("style");
        	</script>
        <?php 
        $otp_err = "Invalid OTP.";
    }

    mysqli_close($link);
}
?>

<?php include "header-2.php"; ?>

<link rel="stylesheet" type="text/css" href="css/intlTelInput.css">
<style type="text/css">
.iti {
    position: relative;
    display: inline-block;
    width: 100%!important;
}	
#resend-link {
    color: #4393d7;
    font-size: 12px;
    margin: 0;
    padding: 0;
    cursor: pointer;
}
</style>

<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo-->
                        <a href="index.php">
                            <img src="img/logos/black-logo.png" class="cm-logo" alt="black-logo">
                        </a>
                        <!-- Name -->
                        <h3>Create an account</h3>
                        <!-- Form start-->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			                <div class="form-group">
                                <input type="text" name="companyname" class="input-text" maxlength="40" placeholder="Company name" autocomplete="off" value="<?php echo $company; ?>" />
                                <span class="help-block"><?php echo $company_err; ?></span>
                            </div>

                            <div class="form-group">
                                <input type="text" name="fullname" class="input-text" maxlength="38" placeholder="Representative name" autocomplete="off" value="<?php echo $fullname; ?>" />
				                <span class="help-block"><?php echo $fullname_err; ?></span>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" class="input-text" maxlength="38" placeholder="Email address" autocomplete="off" value="<?php echo $email; ?>" />
				                <span class="help-block"><?php echo $email_err; ?></span>
                            </div>

                            <div class="form-group">
                            	<input type="hidden" id="country" name="country" value="91" />
                                <input type="text" name="phone" class="input-text" maxlength="10" placeholder="Mobile number" id="phone" autocomplete="off" value="<?php echo $phone; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength); sendotp(this.value)" onkeyup="numberMobile(event);" style="padding: 10px 15px 10px 44px;" />
				                <span class="help-block" id="phone_err"><?php echo $phone_err; ?></span>
                            </div>

                            <div class="form-group" id="hide" <?php echo !empty($otp_err) ? '' : 'style="display: none;"'; ?>>
                                <input type="number" name="otp" class="input-text" maxlength="4" placeholder="OTP code" autocomplete="off" value="<?php echo $otp; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength)" onkeyup="numberMobile(event);" />
				                <span class="help-block" id="otp_err"><?php echo $otp_err; ?></span>
                            </div>

                            <div class="form-group">
	                            <div class="resend-section">
				                    <p id="resend-timer" style="text-align: left;"></p>
				                    <p style="text-align: left;"><a id="resend-link" onclick="resendOtp()" style="display: none;" href="javascript:void(0)">Resend OTP Again</a></p>
				                </div>
				            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="input-text" maxlength="20" placeholder="Password" autocomplete="off" value="<?php echo $password; ?>" />
				                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>

                            <div class="form-group">
                                <input type="password" name="confirm_password" class="input-text" maxlength="20" autocomplete="off" placeholder="Confirm password" value="<?php echo $confirm_password; ?>" />
				                <span class="help-block"><?php echo $confirm_password_err; ?></span>
                            </div>

                            <div class="form-group mb-0">                 
		                        <input type="submit" class="btn-md button-theme btn-block" value="AGREE & SIGN UP" />			
                            </div>

                        </form>
  
                    </div>
                    <!-- Footer -->
                    <div class="footer">
			<span>You agree to <b>TrueHelp's</b> </br><a href="https://gettruehelp.com/service-agreement" target="_blank">Service Agreement</a>,</br> <a href="https://www.gettruehelp.com/privacy-statement/" target="_blank">Privacy Policy</a>, and <a href="https://www.gettruehelp.com/cookie-policy/" target="_blank">Cookie Policy</a>.</br></span>
                        <span>Already a member? <a href="login.php">Login here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<?php include("footer.php"); ?>

<script  src="js/intlTelInput.js"></script>
<script type="text/javascript">
    var input = $('#phone');
    var country = $('#country');
    var iti = intlTelInput(input.get(0));
    input.on('countrychange', function(e) {
        var countryCode = 91;
        switch(iti.getSelectedCountryData().iso2) {
            case 'us':
                countryCode = 1;
                break;
            case 'ae':
                countryCode = 971;
                break;
            case 'in':
                countryCode = 91;
                break;
            case 'pk':
                countryCode = 92;
                break;
            case 'bd':
                countryCode = 880;
                break;
            default:
                countryCode = 91;
                break;
        }
        country.val(countryCode);
    });

    function numberMobile(e){
        e.target.value = e.target.value.replace(/[^\d]/g,'');
        return false;
    }
</script>

<script>
    jQuery(document).ready(function(){
       $('#phone').on("cut copy paste",function(e) {
          e.preventDefault();
       });

        $("#phone").keypress(function (e) {
         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            $("#phone_err").html("Digits Only").show().fadeOut("slow");
                   return false;
        }
       });

    });
</script>

<script type="text/javascript">
    function sendotp(mobile){
        var country = $('#country').val();
        if(mobile.length == 10){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200 && xhttp.responseText.trim() == 'MSG_SENT') {
                    document.getElementById('phone_err').innerHTML = 'OTP Sent to this Number';
                    timer(31);
                    document.getElementById("hide").removeAttribute("style");
                    document.getElementById("phone").readOnly = true;                  
                } else if(this.readyState == 4 && this.status == 200 && xhttp.responseText.trim() == 'NOT_EXIST'){
                    document.getElementById('phone_err').innerHTML = 'Mobile Number Not Registered! Please Register and try again!';
                } else {
                    //document.getElementById('mobile_err').innerHTML = 'Somthing Wrong!!';
                }
            };
            xhttp.open("get", "sns/index.php?phone=" + mobile + '&country=' + country , true);
            xhttp.send();
        } 
    }

    function checkLength(){
        var textbox = document.getElementById("otp");
        if(textbox.value.length <= 4 && textbox.value.length >= 4){
            return true;
        } else {
            return false;
        }
    }

    function resendOtp(timeLeft){
        var country = $('#country').val();
        $('#resend-link').hide();
        $('#resend-timer').show();
        var mobile = $("#phone").val();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200 && xhttp.responseText.trim() == 'MSG_SENT') {
                document.getElementById('phone_err').innerHTML = 'OTP Sent to this Number';
                timer(31);
                document.getElementById("hide").removeAttribute("style");
                document.getElementById("phone").readOnly = true;               
            } else if(this.readyState == 4 && this.status == 200 && xhttp.responseText.trim() == 'NOT_EXIST'){
                document.getElementById('phone_err').innerHTML = 'Mobile Number Not Registered! Please Register and try again!';
            } 
        };
        xhttp.open("get", "sns/index.php?phone=" + mobile + '&country=' + country , true);
        xhttp.send();
    }

    function timer(counter) {
        var interval = setInterval(function() {
            counter--;
            if (counter == 0) {
                clearInterval(interval);
                counter = 30;
                $('#resend-timer').hide();
                $('#resend-timer').text('');
                $('#resend-link').show();
                return;
            } else {
                $('#resend-timer').text('Resend OTP in ' + counter + ' Seconds.');
            }
        }, 1000);
    }
</script>