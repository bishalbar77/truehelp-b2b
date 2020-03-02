<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Include config file
require_once "config.php";
require 'mail/vendor/autoload.php';
 
$email = "";
$error = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){ 

      if(empty(trim($_POST["email"]))){
          $email_err = "Please enter email address.";
      } else {
          $email = trim($_POST["email"]);	

      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      if (!$email) {
  	$error .="<p>Invalid email address please type a valid email address!</p>";
	}else{
	$sel_query = "SELECT * FROM employers WHERE email='".$email."'";
	$results = mysqli_query($link,$sel_query);
	$row = mysqli_num_rows($results);
	if ($row==""){
		$error .= "No user is registered with this email address!";
		}
	}
	if($error!=""){

	} else {

    	date_default_timezone_set('Asia/Kolkata');       
    	$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
    	$expDate = date("Y-m-d H:i:s",$expFormat);
    	$key = md5(2418*2+$email);
    	$addKey = substr(md5(uniqid(rand(),1)),3,10);
    	$keyes = $key . $addKey;

        // Insert Temp Table
        $queyrs = "INSERT INTO password_reset_temp (email, emailkey, expDate, created_at) VALUES ('$email','$keyes','$expDate','$expDate')";
        $data = mysqli_query ($link, $queyrs)or die(mysqli_error($link));       

        $output='<p>Dear user,</p>';
        $output.='<p>Please click on the following link to reset your password.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="https://enterprise.gettruehelp.com/reset-password.php?key='.$keyes.'&action=reset" target="_blank">https://enterprise.gettruehelp.com/reset-password.php?key='.$keyes.'&action=reset</a></p>';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to copy the entire link into your browser. The link will expire after 1 day for security reason.</p>';
        $output.='<p>If you did not request this forgotten password email, no action is needed, your password will not be reset. However, you may want to log into your account and change your security password as someone may have guessed it.</p>';   	
        $output.='<p>Thanks,</p>';
        $output.='<p>True Help Team</p>';

        $body = $output; 
        $subject = "Password Recovery - TrueHelp Enterprise";		
        $to = $email;
        $emails = 'support@gettruehelp.com';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: no-reply@gettruehelp.com" . "\r\n" ."CC: support@gettruehelp.com";


        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.sendgrid.net';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'project91';
            $mail->Password   = 'EMAIL@P91';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->SMTPDebug  = 0; 

            //Recipients
            $mail->setFrom($emails, 'TrueHelp');
            $mail->addAddress($to, 'TrueHelp');
            $mail->addReplyTo($emails, $fullname);
            // $mail->addCC('jalaj@gettruehelp.com');
            // $mail->addBCC('jalaj@gettruehelp.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = $body;

            if($mail->send() == "1"){
               $msg =  "Mail Sent please check your mailbox.";
            } else {

                $mail1 = new PHPMailer(true);
                $mail1->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail1->isSMTP();
                $mail1->Host       = 'email-smtp.ap-south-1.amazonaws.com';
                $mail1->SMTPAuth   = true;
                $mail1->Username   = 'AKIA4SH5KM3GA65RIVWE';
                $mail1->Password   = 'BNfZSS+z+Is/dNMHLabNXPmI5KRH71CMTh2TYEFWjyh8';
                $mail1->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail1->Port       = 587;
                $mail1->SMTPDebug  = 0; 

                //Recipients
                $mail1->setFrom($emails, 'TrueHelp');
                $mail1->addAddress($to, 'TrueHelp');
                $mail1->addReplyTo($emails, $fullname);
                // $mail->addCC('jalaj@gettruehelp.com');
                // $mail->addBCC('jalaj@gettruehelp.com');

                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail1->isHTML(true);
                $mail1->Subject = $subject;
                $mail1->Body    = $body;
                $mail1->AltBody = $body;

                if($mail1->send()){
                  $msg =  "Mail Sent please check your mailbox.";
                } 

            }

        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    
	}
    
   }

    mysqli_close($link);
}
?>

<?php include("header-2.php"); ?>

<!-- Contact section start -->
<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Logo -->
                        <a href="index.php">
                        <img src="img/logos/black-logo.png" class="cm-logo" alt="black-logo">
                        </a>
                        <!-- Name -->
                        <h3>Recover your password</h3>
                        <span class="help-blockS" style="color:green;"><?php if(!empty($msg)){ echo $msg; } ?></span>
                        <!-- Form start -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <input type="email" name="email" maxlength="40" class="input-text" placeholder="Email Address">
                                <span class="help-block"><?php echo $email_err.''.$error; ?></span>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block" value="forgot">Send Me Email</button>
                            </div>
                        </form>             
                    </div>
                    <!-- Footer -->
                    <div class="footer">
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

