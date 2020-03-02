<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";


$param_id   = $_SESSION["id"];

$order_ID   = $_REQUEST["temp_id"];
$payment_id = $_REQUEST["payment_request_id"];
$worker_id  = $_REQUEST['worker_id'];
$base_url   = "https://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?'); 

$key = "worker_id";
$text = $worker_id;
$encrypted = bin2hex(openssl_encrypt($text,'AES-128-CBC', $key));

if(!empty($param_id)){  
    $query_employers    = "SELECT * FROM employers WHERE id='$param_id'";
    $employer_result    = mysqli_query($link, $query_employers) or die(mysqli_error($link));
    $emp_result         = $employer_result->fetch_all(MYSQLI_ASSOC);
    $current_id         = $emp_result[0]['id'];
    $yourname           = $emp_result[0]['rep_full_name'];
    $email              = $emp_result[0]['email'];
    $photo              = $emp_result[0]['photo'];
    $phone              = $emp_result[0]['phone'];    
    $role               = $emp_result[0]['role'];
}

if(!empty($order_ID)){

 $update = mysqli_query($link, "UPDATE payment_histories SET additional_amount_status = '1', payment_request_id = '$payment_id' WHERE temp_id ='$order_ID'") or die(mysqli_error($link));

}

include "header-2.php";

$base_url = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'; 
?>
<div class="jumbotron text-center" style="height:100vh;">
  <div class="success_image"><img src="<?php echo $base_url; ?>/img/success.png" alt="Success" /></div>
  <h1 class="display-3">Payment successful.</h1>
  <p class="lead">Your submission has been received. Thank you!</p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="<?php echo $base_url; ?>employees.php" role="button" style="background:#41AD49;border:none;">Continue to Employees list page</a>
  </p>
<p class="lead">
<span id="timer"></span></div>
</p>
<script type="text/javascript">
var count = 6;
var redirect = "<?php echo $base_url; ?>employees.php";
function countDown(){
    var timer = document.getElementById("timer");
    if(count > 0){
        count--;
        timer.innerHTML = "This page will redirect in "+count+" seconds.";
        setTimeout("countDown()", 1000);
}else{
      	window.location.href = redirect;
    }
}
countDown();
</script>
</div>

<?php include "footer.php";  ?>
