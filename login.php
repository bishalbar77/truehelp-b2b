<?php
// Initialize the session
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}

 
// Include config file
require_once "config.php";
 
$email = $password = "";
$email_err = $password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){ 

    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email address.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);        
    }
    
    if(empty($email_err) && empty($password_err)){    

	$username = $_POST['email'];

	$password = $_POST['password'];

	$query = "SELECT * FROM employers WHERE email='$username' AND status = '1' AND source = 'B' AND pass='".md5($password)."'";
	 
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
	$fetch = mysqli_fetch_row($result);
	
	$id = $fetch[0];

	$count = mysqli_num_rows($result);

	if ($count == 1){

	session_start();

	$_SESSION["loggedin"] = true;
	
    $_SESSION["id"] = $id;

	$_SESSION["email"] = $email;

        if($_COOKIE[$cookie_name]==''){

             header("location: index.php");
  
        } else {
	
	     header("location: ".$_COOKIE["regUrl"]);
	
	}

	} else {
	
	  $error= "Invalid Login Credentials.";

	}

    }
    mysqli_close($link);
}
?>

<?php include "header-2.php"; ?>

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
                        <h3>Sign into your account</h3>

		                <span class="help-block"><?php if(!empty($error)){ echo $error; } ?></span>

                        <!-- Form start -->
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group">
                                <input type="email" name="email" id="email" maxlength="38" class="input-text" autocomplete="off" placeholder="Email address" />
				                <span class="help-block" id="email_err"><?php echo $email_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" maxlength="38" class="input-text" autocomplete="off" placeholder="Password" />
				                <span class="help-block" id="password_err"><?php echo $password_err; ?></span>
                            </div>
                            <div class="checkbox">
                                <div class="ez-checkbox pull-left">
                                    <label style="display:none;">
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div>
                                <a href="forgot-password.php" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block" value="Login">login</button>
                            </div>
                        </form>              
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Don't have an account? <a href="signup.php">Register here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<?php include("footer.php"); ?>

<script type="text/javascript">
jQuery(document).ready(function($){

  $('#email').bind("keydown",function(e){
    $("#email_err").html("");
  });

  $('#password').bind("keydown change",function(e){
    $("#password_err").html("");
  }); 

}); 
</script>