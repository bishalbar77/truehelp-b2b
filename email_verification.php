<?php
// Include config file
require_once "config.php";

if(!empty($_REQUEST["code"]))
{

$code = $_REQUEST["code"];

$query = "SELECT * FROM employers WHERE activationcode='$code'";

$sql = mysqli_query($link, $query) or die(mysqli_error($link));

$num = mysqli_num_rows($sql);

if($num>0)
{
  
$st = 0;

$query1 = "SELECT id FROM employers WHERE activationcode='$code' AND status='$st'";

$result2 = mysqli_query($link, $query1) or die(mysqli_error($link));

$result4 = mysqli_num_rows($result2);  

if($result4>0) 
{

$st = 1;

$query3 = "UPDATE employers SET status='$st' WHERE activationcode='$code'";

$result1 = mysqli_query($link, $query3) or die(mysqli_error($link));

$msg = "Your account is activated"; 

}
 
else

{

$msg ="Your account is already active, no need to activate again";

}

}

else

{

$msg ="Wrong activation code.";

}

?>
<?php include("header-2.php"); ?>

<div class="contact-section overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <div class="details">
                        <!-- Logo -->
                        <a href="index.php">
                        <img src="img/logos/black-logo.png" class="cm-logo" alt="black-logo">
                        </a>
                        <p><?php echo $msg; ?></p>
                        <p><a href="login.php">Click here</a> to login.</p>
                      </div>
                 </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

<?php 
}

?>
